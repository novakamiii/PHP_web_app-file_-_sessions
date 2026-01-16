<?php
include 'db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to update your profile.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName  = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
    $fullName  = trim("$firstName $lastName");
    $address   = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    $email     = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $contact   = filter_input(INPUT_POST, "contact", FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id   = $_SESSION['user_id'];

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($contact) || empty($address)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Check if email or contact is already taken by another user
    $checkQuery = "SELECT id, email, contact FROM users WHERE (email = ? OR contact = ?) AND id != ? LIMIT 2";
    $stmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmt, "ssi", $email, $contact, $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $emailTaken = false;
    $contactTaken = false;

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['email'] === $email && $row['id'] != $user_id) {
            $emailTaken = true;
        }
        if ($row['contact'] === $contact && $row['id'] != $user_id) {
            $contactTaken = true;
        }
    }
    mysqli_stmt_close($stmt);

    if ($emailTaken) {
        echo "Email already exists!";
        exit;
    }

    if ($contactTaken) {
        echo "Contact number already registered!";
        exit;
    }

    // Update user information
    $updateQuery = "UPDATE users SET name = ?, email = ?, contact = ?, address = ? WHERE id = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "ssssi", $fullName, $email, $contact, $address, $user_id);

    if (mysqli_stmt_execute($updateStmt)) {
        // Update session variables
        $_SESSION['user_name'] = $fullName;
        $_SESSION['user_email'] = $email;
        
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile. Please try again.";
    }

    mysqli_stmt_close($updateStmt);
    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
