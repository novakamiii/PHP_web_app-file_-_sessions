<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastName  = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
    $fullName  = trim("$firstName $lastName");
    $address   = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    $email     = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $contact   = filter_input(INPUT_POST, "number", FILTER_SANITIZE_SPECIAL_CHARS);
    $password  = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    // ✅ Check for existing email/contact
    $checkQuery = "SELECT email, contact FROM users WHERE email = ? OR contact = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($stmt, "ss", $email, $contact);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $email) {
            echo "<script>alert('Email already exists!'); window.history.back();</script>";
            exit;
        }
        if ($row['contact'] === $contact) {
            echo "<script>alert('Contact number already registered!'); window.history.back();</script>";
            exit;
        }
    }

    // ✅ Hash password
    $hashedPass = password_hash($password, PASSWORD_BCRYPT);

    // ✅ Use prepared statements for insertion
    $insertUser = "INSERT INTO users (name, email, contact, password, address) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = mysqli_prepare($conn, $insertUser);
    mysqli_stmt_bind_param($insertStmt, "sssss", $fullName, $email, $contact, $hashedPass, $address);

    if (mysqli_stmt_execute($insertStmt)) {
        echo "<script>alert('Account created successfully!');</script>";
    } else {
        echo "<script>alert('Error creating account. Please try again.'); window.history.back();</script>";
    }

    mysqli_stmt_close($insertStmt);
    mysqli_close($conn);
}
?>
