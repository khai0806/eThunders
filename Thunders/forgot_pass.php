<?php
// Check if token exists in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "thunder";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verify token
    $sql = "SELECT * FROM users WHERE reset_token='$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if (isset($_POST['reset_password'])) {
            $new_password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                $update_sql = "UPDATE users SET password='$hashed_password', reset_token=NULL WHERE reset_token='$token'";
                if ($conn->query($update_sql) === TRUE) {
                    echo "<script>alert('Password has been reset successfully!'); window.location.href='index.php';</script>";
                } else {
                    echo "<script>alert('Error resetting password.');</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match.');</script>";
            }
        }
    } else {
        echo "<script>alert('Invalid or expired token.'); window.location.href='index.php';</script>";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Rekod Kehadiran</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url('Team_Thunders.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-container {
            background-color: #2176c7;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px #2176c7;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 1.8rem;
        }

        .error-message {
            background-color: #ff6b6b;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 5px;
            color: #dcdde1;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            background-color: #dcdde1;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #a50e0e;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
        }

        button:hover {
            background-color: #c30e0e;
            transform: scale(1.05);
        }

        .back-button {
            background-color: #888888;
            margin-top: 15px;
        }

        .back-button:hover {
            background-color: #666666;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <h2>Reset Your Password</h2>

        <form method="POST">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your new password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Re-enter your password">
            </div>
            <button type="submit" name="reset_password">Reset Password</button>
        </form>

        <button class="back-button" onclick="window.location.href='index.php';">Back to Home</button>
    </div>
</body>
</html>
