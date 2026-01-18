<?php
/**
 * Setup script to add profile fields to users table
 * Run this once to add the new columns
 */
include 'db.php';

if (!$conn || !($conn instanceof mysqli)) {
    die("Database connection error. Please check your database configuration.");
}

// Check if columns exist and add them if they don't
$columns_to_add = [
    'profile_picture' => "ALTER TABLE users ADD COLUMN profile_picture VARCHAR(255) DEFAULT NULL",
    'date_of_birth' => "ALTER TABLE users ADD COLUMN date_of_birth DATE DEFAULT NULL",
    'gender' => "ALTER TABLE users ADD COLUMN gender VARCHAR(20) DEFAULT NULL",
    'bio' => "ALTER TABLE users ADD COLUMN bio TEXT DEFAULT NULL"
];

$added = [];
$skipped = [];

foreach ($columns_to_add as $column => $sql) {
    // Check if column exists
    $check_query = "SHOW COLUMNS FROM users LIKE '$column'";
    $result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($result) == 0) {
        // Column doesn't exist, add it
        if (mysqli_query($conn, $sql)) {
            $added[] = $column;
        } else {
            echo "Error adding column $column: " . mysqli_error($conn) . "<br>";
        }
    } else {
        $skipped[] = $column;
    }
}

if (!empty($added)) {
    echo "Successfully added columns: " . implode(', ', $added) . "<br>";
}
if (!empty($skipped)) {
    echo "Columns already exist (skipped): " . implode(', ', $skipped) . "<br>";
}
if (empty($added) && empty($skipped)) {
    echo "No changes needed. All columns already exist.<br>";
}

mysqli_close($conn);
?>
