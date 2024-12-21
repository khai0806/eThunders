<?php
// Include the database configuration
include("config.php");

// Handle form submission
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    // Check for duplicate username
    $query = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($query) > 0) {
        $message = "Username already exists. Try another one!";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $result = mysqli_query($connect, "INSERT INTO users (username, password, email) VALUES ('$username', '$hashed_password', '$email')");
        if ($result) {
            echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
        } else {
            $message = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('Team_Thunders.jpg');
            background-size: cover;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 {
            text-align: center;
            font-weight: normal;
            color: #325d87;
            margin-bottom: 20px;
            padding: 15px;
            background-color: white;
            border-radius: 20px;
        }
        form {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            width: 280px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 4px;
            color: #525252;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            outline: none;
            background-color: #fafafa;
        }
        input[type="submit"] {
            background-color: #325d87;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 100%;
        }
        input[type="submit"]:hover {
            transform: scale(1.05);
        }
        .message {
            margin-top: 10px;
            color: #ff0000;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" name="register" value="Register">
        </form>

        <?php if (!empty($message)): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
