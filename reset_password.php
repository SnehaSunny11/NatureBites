<?php
include 'database.php';
session_start();

$message = ""; 

if (!isset($_SESSION['reset_email'])) {
    header("Location: forget_password.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['reset'])) {
        $new_password = trim($_POST['new_password']);
        $confirm_password = trim($_POST['confirm_password']);

        if ($new_password !== $confirm_password) {
            $message = "<p style='color:red;'>Passwords do not match!</p>";
        } elseif (strlen($new_password) < 6) {
            $message = "<p style='color:red;'>Password must be at least 6 characters long.</p>";
        } else {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $email = $_SESSION['reset_email'];

            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashed_password, $email);

            if ($stmt->execute()) {
                unset($_SESSION['reset_email']);
                echo "<script>
                    alert('Password reset successful! Redirecting to login page...');
                    window.location.href = 'Login.php';
                </script>";
                exit();
            } else {
                $message = "<p style='color:red;'>Error updating password.</p>";
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgb(210, 242, 213);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        h1 {
            margin-bottom: 20px;
            color: #000;
        }
        .input-field {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .btn-submit {
            background-color: #087659;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 55px;
            font-size: 16px;
            cursor: pointer;
            width: 50%;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <?php echo $message; ?>
        <form method="POST" action="reset_password.php">
            <input type="password" name="new_password" class="input-field" placeholder="New Password" required>
            <input type="password" name="confirm_password" class="input-field" placeholder="Confirm Password" required>
            <button type="submit" name="reset" class="btn-submit">Reset Password</button>
        </form>
    </div>
</body>
</html>
