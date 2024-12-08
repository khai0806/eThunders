<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Thunders";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $database);

if (!$connect) {
    die("gagal disambung ke db" . mysqli_connect_error());
}
?>
