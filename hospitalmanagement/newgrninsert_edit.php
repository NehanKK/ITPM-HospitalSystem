<?php
	include "db_connect.php";
$createToday = new DateTime('now', new DateTimeZone('Asia/Colombo'));
	$today= $createToday->format('Y-m-d');
	$time= $createToday->format('H:i:s');

	$rowcountn = mysqli_real_escape_string($con,$_POST['rowcountn']);
	$grnDate = mysqli_real_escape_string($con,$_POST['grnDate']);
	$grnno = mysqli_real_escape_string($con,$_POST['grnno']);

 $sqlinsert = "UPDATE `grn_sum` SET `last_update`='$today' WHERE grnno='$grnno'";
		$resultinsert = mysqli_query($con,$sqlinsert);

for ($i=1; $i <= $rowcountn ; $i++) { 
	
	 $newa = mysqli_real_escape_string($con,$_POST['itemname'.$i]);
	 $newb = mysqli_real_escape_string($con,$_POST['itemcode'.$i]);
	 $newc = mysqli_real_escape_string($con,$_POST['newstock'.$i]);
	 $newd = mysqli_real_escape_string($con,$_POST['unitPrice'.$i]);
	 $newe = mysqli_real_escape_string($con,$_POST['getamount'.$i]);
	 $newf = mysqli_real_escape_string($con,$_POST['dnewstock'.$i]);


	if ($newc !='') {
		

	 $sqlinsertlist = "UPDATE `grn_det` SET `stock`='$newc',`unit_Price`='$newd',`total_price`='$newe' WHERE grn_No='$grnno' AND itemName='$newa' AND itemCode='$newb'";
		$resultinsertlist = mysqli_query($con,$sqlinsertlist);

 $qsql = "SELECT * FROM item_stock WHERE item_name='$newa' AND item_code='$newb'";
		$qresult=mysqli_query($con,$qsql) or die(mysqli_error());
		$rowcount =mysqli_num_rows($qresult);
		$newrowcount = mysqli_fetch_assoc($qresult);
		$stock =$newrowcount['stock'];
			$oldstock = $stock-$newf;
			$newstockcount = $oldstock+$newc;
			$sqlinsert3 = "UPDATE `item_stock` SET `stock`='$newstockcount' WHERE item_name='$newa' AND item_code='$newb'";
		$resultinsert3 = mysqli_query($con,$sqlinsert3);
		
			

	
	} else {
		// echo "else";	
	}


}


if ($resultinsert AND $resultinsertlist) {
 echo "Successfully Updated";
}else{
	echo "Enter Correct Details";
}








?>