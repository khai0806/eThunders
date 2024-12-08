<?php

// Hardcoded credentials for the admin
$admin_username = "admin";
$admin_password = "123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header("Location: login_admin.php");
        exit();
    } else {
        header("Location: login_admin.php?error=invalid_credentials");
        exit();
    }
} else {
    header("Location: login_admin.php");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eThunders Admin Login</title>
    <style>
        body {
            background-image: url('Team_Thunders.jpg');
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .container {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #4a90e2;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            text-align: center;
        }
        .header {
            font-size: 1.5em;
            color: white;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 0.9em;
            color: white;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
        }
        input[type="submit"] {
            width: 95%;
            padding: 10px;
            background-color: white;
            color: #4a90e2;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #2176c7;
            color: white;
        }
        .admin-view {
            color: white;
            font-size: 0.9em;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">eThunders ADMIN</div>
        <form action="login_admin.php" method="post">
            <div class="form-group">
                <label for="username">USERNAME</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Submit">
        </form>
        <div class="admin-view">ADMIN VIEW</div>
    </div>
</body>
</html>
