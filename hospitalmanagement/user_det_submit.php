<?php
	include "db_connect.php";


	$uname = mysqli_real_escape_string($con,$_POST['uname']);
	$pward = mysqli_real_escape_string($con,$_POST['pward']);
	$mail = mysqli_real_escape_string($con,$_POST['mail']);
	$address = mysqli_real_escape_string($con,$_POST['address']);




	$sqlinsertsum = "INSERT INTO `users`( `userName`, `passward`, `telephone`, `addresss`) VALUES ('$uname','$pward','$mail','$address')";
		$resultinsertsum = mysqli_query($con,$sqlinsertsum);



	
if ($resultinsertsum) {
 echo "Successfully Inserted";
}else{
	echo "Enter Correct Details";
}



