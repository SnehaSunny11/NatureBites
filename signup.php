<?php
include 'database.php';

$message = ""; // To store messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_user = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check_user->bind_param("s", $email);
    $check_user->execute();
    $result = $check_user->get_result();

    if ($result->num_rows > 0) {
        $message = "<p style='color:red;'>Email already registered.</p>";
    } else {
        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $password);

        if ($stmt->execute()) {
            echo "<script>
                alert('Registration successful! Redirecting to login page...');
                window.location.href = 'Login.php';
            </script>";
            exit();
        } else {
            $message = "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .btn-signup {
            background-color: #087659;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 55px;
            font-size: 16px;
            cursor: pointer;
            width: 40%;
        }
        .login-link {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }
        .login-link a {
            text-decoration: none;
            color: #2b635e;
            font-weight: bold;
        }
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <?php echo $message; ?>
        <form id="signupForm" method="POST" action="signup.php">
            <input type="text" id="name" name="name" class="input-field" placeholder="Name" required>
            <div id="nameError" class="error"></div>

            <input type="email" id="email" name="email" class="input-field" placeholder="Email" required>
            <div id="emailError" class="error"></div>

            <input type="tel" id="phone" name="phone" class="input-field" placeholder="Phone Number" required>
            <div id="phoneError" class="error"></div>

            <input type="password" id="password" name="password" class="input-field" placeholder="Password" required>
            <div id="passwordError" class="error"></div>

            <button type="submit" class="btn-signup">Sign Up</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="Login.php">Log in</a>
        </div>
    </div>

    <script>
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            let isValid = true;

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const phone = document.getElementById('phone').value.trim();
            const password = document.getElementById('password').value.trim();

            const nameError = document.getElementById('nameError');
            const emailError = document.getElementById('emailError');
            const phoneError = document.getElementById('phoneError');
            const passwordError = document.getElementById('passwordError');

            nameError.textContent = '';
            emailError.textContent = '';
            phoneError.textContent = '';
            passwordError.textContent = '';

            if (name === '') {
                nameError.textContent = 'Name is required';
                isValid = false;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                emailError.textContent = 'Enter a valid email address';
                isValid = false;
            }

            const phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone)) {
                phoneError.textContent = 'Enter a valid 10-digit phone number';
                isValid = false;
            }

            if (password.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
