<?php
	include "db_connect.php";


	$rep_id = mysqli_real_escape_string($con,$_POST['rep_id']);

?>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header"style="background-color: #39B3D7;">
        <h5 class="modal-title" id="exampleModalLongTitle">Item Details&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size:15px;"></font>&nbsp;&nbsp;&nbsp;GRN No - <?php echo $rep_id?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" margin-top: -19px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <table class="table" >

    <tr>

      <th scope="col">Item Name</th>
      <th scope="col">Item Code</th>
      <th scope="col">New Stock</th>
      <th scope="col">Unit Price (Rs)</th>
      <th scope="col">Amount (Rs)</th>
      
      

    
    </tr>

   <tr>
    	<?php
   $itemsql = "SELECT * FROM grn_det WHERE grn_No='$rep_id'";
        $itemresult = mysqli_query($con,$itemsql)or die(mysqli_error());
        while ($itemrow =mysqli_fetch_array($itemresult)) {
            $itemName = $itemrow['itemName'];
            $itemCode = $itemrow['itemCode'];
        $stock = $itemrow['stock'];
        $unit_Price = $itemrow['unit_Price'];
        $total_price = $itemrow['total_price'];
    		?>

 <td align="center"><?php echo $itemName ?></td>
        <td align="center"><?php echo $itemCode ?></td>
        <td align="center"><?php echo $stock ?></td>
        <td align="right"><?php echo $unit_Price.'.00' ?></td>
        <td align="right"><?php echo $total_price.'.00' ?></td>
      

   </tr>
    		<?php
    	}
    	?>
    
 

</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>



	

