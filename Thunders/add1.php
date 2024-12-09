<?php
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka_giliran = htmlspecialchars($_POST['angka_giliran']);
    $nama = htmlspecialchars($_POST['nama']);
    $hadir = isset($_POST['hadir']) ? 'Hadir' : 'Tidak Hadir'; // Check if the radio button is checked

    // Save data to a file (optional)
    $file = fopen("attendance_records.txt", "a");
    fwrite($file, "Angka Giliran: $angka_giliran\nNama: $nama\nStatus: $hadir\n---\n");
    fclose($file);

    // Redirect or display success message
    echo "<h1>Data submitted successfully!</h1>";
    echo "<p>Angka Giliran: $angka_giliran</p>";
    echo "<p>Nama: $nama</p>";
    echo "<p>Status Kehadiran: $hadir</p>";
    exit; // Stop further processing
}
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
            color: #0056b3; /* Blue color */
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #0056b3; /* Blue border */
            border-radius: 5px;
            transition: border-color 0.3s;
            font-size: 1em;
        }
        input[type="text"]:focus {
            border-color: #ff3737; /* Red border on focus */
            outline: none;
        }
        input[type="radio"] {
            margin: 10px 0;
            width: 20px;
            height: 20px;
        }
        input[type="submit"] {
            padding: 12px 20px;
            background: linear-gradient(90deg, #ff3737, #0056b3); /* Red to Blue gradient */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1em;
            transition: background 0.3s;
            margin-top: 20px; /* Add some space above the button */
        }
        input[type="submit"]:hover {
            background: linear-gradient(90deg, #0056b3, #ff3737); /* Blue to Red gradient on hover */
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            text-align: left;
            color: #0056b3; /* Blue color for labels */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>eThunders Kehadiran</h2>
        <form action="process.php" method="post">
            <label>ANGKA GILIRAN</label>
            <input type="text" name="angka_giliran" required>

            <label>NAMA</label>
            <input type="text" name="nama" required>

            <label>KEHADIRAN</label>
            <input type="radio" name="hadir" value="1"> Hadir
            <input type="radio" name="hadir" value=" 2"> Tidak Hadir
        
        <label></label>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>