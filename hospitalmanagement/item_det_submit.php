<?php
	include "db_connect.php";


	$itemname = mysqli_real_escape_string($con,$_POST['itemname']);
	$icode = mysqli_real_escape_string($con,$_POST['icode']);
	$iprice = mysqli_real_escape_string($con,$_POST['iprice']);
	$rno = mysqli_real_escape_string($con,$_POST['rno']);
	$tarea = mysqli_real_escape_string($con,$_POST['tarea']);
	


	
	$sqlitem = mysqli_query($con,"SELECT MAX(itemCode) AS max_value FROM item ");
$resultitem = mysqli_fetch_assoc($sqlitem);
    $max_itemid = $resultitem["max_value"];
    if ($max_itemid <= 0) {
        $itemcode = '1001';
        // $newitemid = 'MED'.$itemcode;
    } else {
        $itemcode = $max_itemid+1;
        // $newitemid = $itemcode;
    }

	$sqlinsertsum = "INSERT INTO `item`( `itemName`, `itemCode`, `itemPrice`, `rack_no`, `usage_details`, `active`) VALUES ('$itemname','$itemcode','$iprice','$rno','$tarea','yes')";
		$resultinsertsum = mysqli_query($con,$sqlinsertsum);



	
if ($resultinsertsum) {
 echo "Successfully Inserted";
}else{
	echo "Enter Correct Details";
}



