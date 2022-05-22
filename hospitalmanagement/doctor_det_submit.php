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




	$sqlinsertsum = "INSERT INTO `doctor_det`(`name`, `date`, `mail`, `regno`, `special`, `did`, `description`, `fromDate`, `toDate`) VALUES ('$name','$date','$mail','$regno','$special','$did','$desc','$from','$to')";
		$resultinsertsum = mysqli_query($con,$sqlinsertsum);



	
if ($resultinsertsum) {
 echo "Successfully Inserted";
}else{
	echo "Enter Correct Details";
}



