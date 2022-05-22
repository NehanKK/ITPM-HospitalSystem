<?php
	include "db_connect.php";


	$itemcode = mysqli_real_escape_string($con,$_POST['itemcode']);

	$sql ="DELETE FROM `item` WHERE itemCode='$itemcode'";
	$result = mysqli_query($con,$sql);


	if ($result) {
		echo "Successfully Deleted";
	}
?>