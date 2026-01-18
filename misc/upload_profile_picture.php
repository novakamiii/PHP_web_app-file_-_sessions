<?php
include 'db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to upload a profile picture.']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Check if file was uploaded
if (!isset($_FILES['profile_picture']) || $_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'No file uploaded or upload error occurred.']);
    exit;
}

$file = $_FILES['profile_picture'];

// Validate file type
$allowed_types = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
$file_type = mime_content_type($file['tmp_name']);

if (!in_array($file_type, $allowed_types)) {
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Only JPEG, PNG, and GIF images are allowed.']);
    exit;
}

// Validate file size (max 5MB)
$max_size = 5 * 1024 * 1024; // 5MB in bytes
if ($file['size'] > $max_size) {
    echo json_encode(['success' => false, 'message' => 'File size exceeds 5MB limit.']);
    exit;
}

// Create uploads directory if it doesn't exist
$upload_dir = __DIR__ . '/../uploads/profile_pictures/';
if (!file_exists($upload_dir)) {
    if (!mkdir($upload_dir, 0777, true)) {
        echo json_encode(['success' => false, 'message' => 'Failed to create upload directory.']);
        exit;
    }
}

// Generate unique filename
$file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = 'profile_' . $user_id . '_' . time() . '.' . $file_extension;
$file_path = $upload_dir . $filename;

// Move uploaded file
if (!move_uploaded_file($file['tmp_name'], $file_path)) {
    echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file.']);
    exit;
}

// Get old profile picture path to delete it later
$old_picture_query = "SELECT profile_picture FROM users WHERE id = ? LIMIT 1";
$old_stmt = mysqli_prepare($conn, $old_picture_query);
mysqli_stmt_bind_param($old_stmt, "i", $user_id);
mysqli_stmt_execute($old_stmt);
$old_result = mysqli_stmt_get_result($old_stmt);
$old_user = mysqli_fetch_assoc($old_result);
mysqli_stmt_close($old_stmt);

// Update database with new profile picture path
$relative_path = 'uploads/profile_pictures/' . $filename;
$update_query = "UPDATE users SET profile_picture = ? WHERE id = ?";
$update_stmt = mysqli_prepare($conn, $update_query);
mysqli_stmt_bind_param($update_stmt, "si", $relative_path, $user_id);

if (mysqli_stmt_execute($update_stmt)) {
    // Delete old profile picture if it exists
    if ($old_user && !empty($old_user['profile_picture']) && file_exists('../' . $old_user['profile_picture'])) {
        @unlink('../' . $old_user['profile_picture']);
    }
    
    echo json_encode([
        'success' => true, 
        'message' => 'Profile picture uploaded successfully!',
        'image_path' => $relative_path
    ]);
} else {
    // Delete uploaded file if database update fails
    @unlink($file_path);
    echo json_encode(['success' => false, 'message' => 'Failed to update database.']);
}

mysqli_stmt_close($update_stmt);
mysqli_close($conn);
?>
