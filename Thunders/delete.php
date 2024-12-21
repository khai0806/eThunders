<?php
include('config.php');
$tarikh = $_GET['tarikh'];
$result = mysqli_query($connect, "DELETE FROM jadual_thunders WHERE tarikh='$tarikh'");
echo "<script> window.location.href = 'admin_page.php';</script>";
?>