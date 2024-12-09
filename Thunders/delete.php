<?php
	
	include('config.php');
	$tarikh = $_GET['tarikh'];

	$query = "DELETE FROM latihan WHERE tarikh = '$tarikh'";
	$result = mysqli_query($con, $query);

	// Go back to the homepage.php
    echo "<script>window.location.href = 'latihan.php';</script>";
?>