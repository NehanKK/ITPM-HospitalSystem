<?php
	include "db_connect.php";


	$name = mysqli_real_escape_string($con,$_POST['name']);
	$date = mysqli_real_escape_string($con,$_POST['date']);
	$mail = mysqli_real_escape_string($con,$_POST['mail']);
	$regno = mysqli_real_escape_string($con,$_POST['regno']);
	$special = mysqli_real_escape_string($con,$_POST['special']);
	$did = mysqli_real_escape_string($con,$_POST['did']);
	$desc = mysqli_real_escape_string($con,$_POST['desc']);
	$from = mysqli_real_escape_string($con,$_POST['from']);
	$to = mysqli_real_escape_string($con,$_POST['to']);
	


	

	$sqlinsertsum = "UPDATE `doctor_det` SET `name`='$name',`date`='$date',`mail`='$mail',`regno`='$regno',`special`='$special',`description`='$desc',`fromDate`='$from',`toDate`='$to' WHERE `did`='$did'";
		$resultinsertsum = mysqli_query($con,$sqlinsertsum);



	
if ($resultinsertsum) {
 echo "Successfully Updated";
}else{
	echo "Enter Correct Details";
}



