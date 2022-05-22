<?php
	include "db_connect.php";


	$did = mysqli_real_escape_string($con,$_POST['did']);

	$sql ="DELETE FROM `doctor_det` WHERE did='$did'";
	$result = mysqli_query($con,$sql);


	if ($result) {
		echo "Successfully Deleted";
	}
?>