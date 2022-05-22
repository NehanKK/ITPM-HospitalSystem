<?php
    session_start();
	include('db_connect.php');
	
	$return_arr = array();	// Create Array
	$search = mysqli_real_escape_string($con, $_GET['term']);	// Search String 


$get_query1 = mysqli_query($con,"SELECT * FROM doctor WHERE `code` LIKE '%$search%' OR `name` LIKE '%$search%' ");
$row_query = mysqli_num_rows($get_query1);
if($row_query<=0){
	$get_query1  = mysqli_query($con,"SELECT * FROM doctor WHERE `code` LIKE '%$search%' OR `name` LIKE '%$search%'");
}


	while ($row = mysqli_fetch_array($get_query1)) {
		
			
			$row_array['value']		= $row['code'];
			$row_array['name']	= $row['name'];
            $row_array['charge']	= $row['charge'];
			// $row_array['price']		= $resultstock[0];
			// $row_array['stock']		= '';
			// $row_array['item_code']	= $row[2];
			
		/*}*/
		
        array_push($return_arr,$row_array);	// Fill Array
    }
	
	echo json_encode($return_arr);	// Display Values
?>