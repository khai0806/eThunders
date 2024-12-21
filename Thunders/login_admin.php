<?php
    include('config.php');

    $error = '';
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = "Username or password is invalid";
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $query = mysqli_query($connect, "SELECT * FROM users WHERE password = '$password' AND username = '$username'");
            $rows = mysqli_num_rows($query);
            if ($rows == 1) {
                header('location: admin_page.php');
                exit;
            } else {
                $error = "Username or password is invalid";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rekod Kehadiran</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url('1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
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

        input[type="text"], 
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            background-color: #dcdde1;
            outline: none;
        }

        input[type="submit"] {
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

        input[type="submit"]:hover {
            background-color: #a50e0e;
            transform: scale(1.05);
        }

        .extra-links {
            margin-top: 15px;
        }

        .extra-links a {
            color: #dcdde1;
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-block;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        .extra-links a:hover {
            color: #74b9ff;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if ($error != '') { ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>
