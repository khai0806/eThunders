<?php 
include ('config.php');
$angka_giliran = $_GET['angka_giliran'];
$result = mysqli_query($connect, "DELETE FROM kehadiran WHERE angka_giliran='$angka_giliran'");

echo "<script>alert('Adakah Anda Pasti?');". "window.location='kehadiran.php'</script>";
?>