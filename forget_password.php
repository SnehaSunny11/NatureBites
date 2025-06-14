<?php
include 'database.php';

$message = ""; // Message for status updates

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['verify'])) {
        // Step 1: Verify Email & Phone
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND phone = ?");
        $stmt->bind_param("ss", $email, $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            session_start();
            $_SESSION['reset_email'] = $email; // Store email for next step
            header("Location: reset_password.php");
            exit();
        } else {
            $message = "<p style='color:red;'>Invalid email or phone number.</p>";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
            background-color:rgb(96, 17, 123);
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
        <h1>Forgot Password</h1>
        <?php echo $message; ?>
        <form method="POST" action="forget_password.php">
            <input type="email" name="email" class="input-field" placeholder="Enter your Email" required>
            <input type="tel" name="phone" class="input-field" placeholder="Enter your Phone Number" required>
            <button type="submit" name="verify" class="btn-submit">Verify</button>
        </form>
    </div>
</body>
</html>
