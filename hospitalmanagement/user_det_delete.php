<?php
	include "db_connect.php";


	$uid = mysqli_real_escape_string($con,$_POST['uid']);

	$sql ="DELETE FROM `users` WHERE id='$uid'";
	$result = mysqli_query($con,$sql);


	if ($result) {
		echo "Successfully Deleted";
	}
?>