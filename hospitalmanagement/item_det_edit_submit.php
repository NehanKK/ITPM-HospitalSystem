<?php
	include "db_connect.php";


	$itemname = mysqli_real_escape_string($con,$_POST['itemname']);
	$icode = mysqli_real_escape_string($con,$_POST['icode']);
	$iprice = mysqli_real_escape_string($con,$_POST['iprice']);
	$rno = mysqli_real_escape_string($con,$_POST['rno']);
	$tarea = mysqli_real_escape_string($con,$_POST['tarea']);
	


	

	$sqlinsertsum = "UPDATE `item` SET `id`='[value-1]',`itemName`='$itemname',`itemPrice`='$iprice',`rack_no`='$rno',`usage_details`='$tarea',`active`='yes' WHERE `itemCode`='$icode'";
		$resultinsertsum = mysqli_query($con,$sqlinsertsum);



	
if ($resultinsertsum) {
 echo "Successfully Updated";
}else{
	echo "Enter Correct Details";
}



