<?php
    session_start();
	include('db_connect.php');
	
	$return_arr = array();	// Create Array
	$search = mysqli_real_escape_string($con, $_GET['term']);	// Search String 


$get_query1 = mysqli_query($con,"SELECT * FROM patient WHERE `code` LIKE '%$search%' OR `name` LIKE '%$search%' ");
$row_query = mysqli_num_rows($get_query1);
if($row_query<=0){
	$get_query1  = mysqli_query($con,"SELECT * FROM patient WHERE `code` LIKE '%$search%' OR `name` LIKE '%$search%'");
}


	while ($row = mysqli_fetch_array($get_query1)) {

			$userCode = $row['code'];

			$sql1 = "SELECT SUM(amount) AS amount FROM `lab_main` WHERE pid = '$userCode' ";
			$result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
			$row1 = mysqli_fetch_assoc($result1);

			if($row1['amount'] == "") {
				$amount = 0;
			} else {
				$amount = $row1['amount'];
			}
			
			$row_array['value']		= $row['code'];
			$row_array['name']	= $row['name'];
			$row_array['amount']	= $amount;
			// $row_array['price']		= $resultstock[0];
			// $row_array['stock']		= '';
			// $row_array['item_code']	= $row[2];
			
		/*}*/
		
        array_push($return_arr,$row_array);	// Fill Array
    }
	
	echo json_encode($return_arr);	// Display Values
?>