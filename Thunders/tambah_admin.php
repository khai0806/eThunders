<?php
// Include configuration file (if necessary, update with your config details)
include_once('config.php');

// Check if the request method is POST
if(isset($_POST['hantar']))
{
	$tarikh = $_POST["tarikh"];
	$hari =$_POST["hari"];
	$masa = $_POST["masa"];
	$aktiviti = $_POST["aktiviti"];

	$result = mysqli_query($connect,"INSERT INTO jadal_thunders(tarikh, hari, masa, aktiviti)"."VALUES('$tarikh','$hari','$masa','$aktiviti')");
	echo "Berjaya Daftar";
	header('location:admin_page.php');
}

    // Display success message
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Data Submitted</title>
        <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap' rel='stylesheet'>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                text-align: center;
                padding: 20px;
                background-color: #f4f4f9;
            }
            h1 {
                color: #28a745; /* Green for success */
            }
            p {
                font-size: 1.1em;
            }
        </style>
    </head>
    </html>";
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eThunders Kehadiran</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('Team_Thunders.jpg'); /* Replace with your image file */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .form-container {
            width: 90%;
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #0056b3;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #0056b3;
            border-radius: 5px;
            transition: border-color 0.3s;
            font-size: 1em;
        }
        input[type="text"]:focus {
            border-color: #ff3737;
            outline: none;
        }
        input[type="submit"] {
            padding: 12px 20px;
            background: linear-gradient(90deg, #ff3737, #0056b3);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1em;
            transition: background 0.3s;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background: linear-gradient(90deg, #0056b3, #ff3737);
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            text-align: left;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>eThunders Kehadiran</h2>
        <form action="admin_page.php" method="post">
            <label for="tarikh">TARIKH</label>
            <input type="text" name="angka_giliran" id="tarikh" required>

            <label for="hari">HARI</label>
            <input type="text" name="nama" id="hari" required>

            <label for="masa">MASA</label>
            <input type="text" name="masa" id="masa" required>

            <label for="aktiviti">AKTIVITI</label>
            <input type="text" name="aktivit" id="aktiviti" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
