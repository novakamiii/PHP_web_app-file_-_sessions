<?php
include 'db.php';


//Login Session
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email) || empty($password)) {
        echo "Please fill in both fields.";
        exit;
    }

    $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $user['password'])) {
            //Starts the session for the user.
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            $update = "UPDATE users SET last_session = NOW() WHERE id = ?";
            $stmt2 = mysqli_prepare($conn, $update);
            mysqli_stmt_bind_param($stmt2, "i", $user['id']);
            mysqli_stmt_execute($stmt2);

            echo "Login successful!";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No account found with that email.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
