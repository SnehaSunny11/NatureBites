<?php
session_start();
include 'database.php'; // Ensure this file has your database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['email'] = $email;
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id'];

            header("Location: index.php"); // Redirect to homepage
            exit();
        } else {
            header("Location: login.php?error=Incorrect password");
            exit();
        }
    } else {
        header("Location: login.php?error=User not found");
        exit();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgb(60,179,113);
        }

        .login-container {
            background-color: #c8e6c9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }

        .logo {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        .login-container h1 {
            margin-bottom: 20px;
            color: #000;
        }

        .input-field {
            margin-bottom: 15px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
            width: 100%;
        }

        .input-wrapper .icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #6cb471;
            font-size: 16px;
        }

        .input-wrapper input {
            width: 85%;
            padding: 10px 40px 10px 10px;
            border: 1px solid #8dc891;
            border-radius: 35px;
            font-size: 14px;
        }

        .input-wrapper input::placeholder {
            color: #666;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            color: #004d40;
        }

        .remember-me input {
            margin-right: 5px;
        }

        .forgot-password {
            color: #00695c;
            cursor: pointer;
        }

        .forgot-password i {
            margin-right: 5px;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .login-button {
            background-color: #063c27;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 52px;
            font-size: 14px;
            cursor: pointer;
            width: 65%;
        }

        .login-button:hover {
            background-color: #00332c;
        }

        .register-link {
            font-size: 12px;
            color: #004d40;
            display: block;
            margin-top: 10px;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .back-home-btn {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="images/Logo.png" alt="Website Logo" class="logo">

        <h1>Login</h1>
        <?php if (isset($_GET['error'])): ?>
            <p class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="input-field">
                <div class="input-wrapper">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="fas fa-user icon"></i>
                </div>
            </div>
            <div class="input-field">
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fas fa-lock icon"></i>
                </div>
            </div>
            <div class="options">
                <div class="remember-me">
                    <input type="checkbox" id="rememberMe">
                    <label for="rememberMe">Remember Me</label>
                </div>
                <a href="forget_password.php" class="forgot-password"><i class="fas fa-question-circle"></i> Forgot Password?</a>
            </div>
            <button type="submit" class="login-button">Login</button>
        </form>
        <a href="signup.php" class="register-link"><i class="fas fa-user-plus"></i> Create an Account? Register</a>
        <div class="back-home-btn">
            <a href="index.php" id="backHomeBtn">Back to Home</a>
        </div>
    </div>
</body>
</html>
