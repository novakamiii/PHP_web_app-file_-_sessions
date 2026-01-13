<?php
session_start();
require_once __DIR__ . '/../misc/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } else {
        $sql = "SELECT id, name, email, password, role, is_admin FROM users WHERE email = ? LIMIT 1";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($user = $result->fetch_assoc()) {
                if (password_verify($password, $user['password'])) {
                    $isAdmin = (isset($user['role']) && strtolower((string)$user['role']) === 'admin') || (!empty($user['is_admin']));
                    if ($isAdmin) {
                        $_SESSION['admin_id'] = $user['id'];
                        $_SESSION['admin_name'] = $user['name'];
                        $_SESSION['admin_email'] = $user['email'];
                        header('Location: dashboard.php');
                        exit;
                    } else {
                        $error = 'This account is not authorized for admin access.';
                    }
                } else {
                    $error = 'Incorrect password.';
                }
            } else {
                $error = 'No admin account found for that email.';
            }
            $stmt->close();
        } else {
            $error = 'Login temporarily unavailable. Please try again later.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #f6f7fb 0%, #eef1f8 100%);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 32px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .login-header .brand-circle {
            margin: 0 auto 12px auto;
        }

        .login-header h2 {
            font-size: 1.5rem;
            margin-bottom: 6px;
            color: #111;
        }

        .login-header p {
            color: #555;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #222;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1px solid #dce1eb;
            background: #f9fafb;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.12);
            background: #fff;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #4f46e5;
            border: none;
            color: #fff;
            border-radius: 8px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn-primary:hover {
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.25);
            transform: translateY(-1px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .helper-text {
            margin-top: 14px;
            font-size: 0.9rem;
            color: #6b7280;
            text-align: center;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 0.95rem;
        }

        .error-alert {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecdd3;
        }

        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper .form-control {
            padding-right: 44px;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            cursor: pointer;
            color: #6b7280;
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .toggle-password:focus {
            outline: none;
            color: #4f46e5;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="brand-circle">E</div>
            <h2>Admin Login</h2>
            <p>Sign in with your admin credentials</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert error-alert"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="post" action="login.php" autocomplete="off">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="admin@example.com" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                    <button type="button" class="toggle-password" aria-label="Show or hide password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-primary">Sign In</button>
        </form>

        <div class="helper-text">
            <i class="fas fa-lock"></i> Your credentials are securely processed.
        </div>
    </div>

    <script>
        const toggleBtn = document.querySelector('.toggle-password');
        const passwordInput = document.getElementById('password');
        const icon = toggleBtn.querySelector('i');

        toggleBtn.addEventListener('click', () => {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
