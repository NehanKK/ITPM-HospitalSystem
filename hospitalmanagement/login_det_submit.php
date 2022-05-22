<?php
	include "db_connect.php";
 session_start(); 

	$uname = mysqli_real_escape_string($con,$_POST['uname']);
	$pward = mysqli_real_escape_string($con,$_POST['pward']);
	



	$sqllogin = "SELECT * FROM users WHERE Username='$uname' AND Passward='$pward'";
	$resultlogin = mysqli_query($con,$sqllogin);
	$rowcount = mysqli_num_rows($resultlogin);

	if ($rowcount!='') {
		echo $deciasion = 'yes';
		$_SESSION['newusername'] = $uname;
	}else{
		echo $deciasion = 'Enter Correct Login Details';
	}

	