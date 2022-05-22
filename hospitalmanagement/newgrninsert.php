<?php
	include "db_connect.php";


	$rowcountn = mysqli_real_escape_string($con,$_POST['rowcountn']);
	$grnDate = mysqli_real_escape_string($con,$_POST['grnDate']);
	$grnno = mysqli_real_escape_string($con,$_POST['grnno']);

 $sqlinsert = "INSERT INTO `grn_sum`(`grndate`, `grnno`,`last_update`) VALUES ('$grnDate','$grnno','')";
		$resultinsert = mysqli_query($con,$sqlinsert);

for ($i=1; $i <= $rowcountn ; $i++) { 
	
	 $newa = mysqli_real_escape_string($con,$_POST['itemname'.$i]);
	 $newb = mysqli_real_escape_string($con,$_POST['itemcode'.$i]);
	 $newc = mysqli_real_escape_string($con,$_POST['newstock'.$i]);
	 $newd = mysqli_real_escape_string($con,$_POST['unitPrice'.$i]);
	 $newe = mysqli_real_escape_string($con,$_POST['getamount'.$i]);

	if ($newc !='') {
		

	 $sqlinsertlist = "INSERT INTO `grn_det`(`grn_No`, `date`, `itemName`, `itemCode`, `stock`, `unit_Price`, `total_price`) VALUES ('$grnno','$grnDate','$newa','$newb','$newc','$newd','$newe')";
		$resultinsertlist = mysqli_query($con,$sqlinsertlist);

 $qsql = "SELECT * FROM item_stock WHERE item_name='$newa' AND item_code='$newb'";
		$qresult=mysqli_query($con,$qsql) or die(mysqli_error());
		$rowcount =mysqli_num_rows($qresult);
		$newrowcount = mysqli_fetch_assoc($qresult);
		$stock =$newrowcount['stock'];
		if ($rowcount > 0) {
			$newstockcount = $stock+$newc;
			$sqlinsert3 = "UPDATE `item_stock` SET `stock`='$newstockcount' WHERE item_name='$newa' AND item_code='$newb'";
		$resultinsert3 = mysqli_query($con,$sqlinsert3);
		}else if ($rowcount == 0) {
			$sqlinsert2 = "INSERT INTO `item_stock`(`item_name`,`item_code`, `stock`) VALUES ('$newa','$newb','$newc')";
		$resultinsert2 = mysqli_query($con,$sqlinsert2);
		}
			

	
	} else {
		// echo "else";	
	}


}


if ($resultinsert AND $resultinsertlist) {
 echo "Successfully Inserted";
}else{
	echo "Enter Correct Details";
}








?>