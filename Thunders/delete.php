<?php

include('config.php');
$tarikh = $_GET['tarikh'];
$result = mysqli_query($connect, "DELETE FROM jadual_thunders WHERE tarikh='$tarikh'");

	 ?>