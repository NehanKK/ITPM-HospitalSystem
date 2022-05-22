<?php
			// User Type (Admin, User, etc..)
	
	include "db_connect.php";
	$itemname = mysqli_real_escape_string($con,$_POST['itemname']);
$sql1 =  "SELECT * FROM item WHERE id='$itemname'";
	$result1 = mysqli_query($con,$sql1);
	$row1 =mysqli_fetch_assoc($result1);
	$itemName = $row1['itemName'];
	$itemCode = $row1['itemCode'];
	$itemPrice = $row1['itemPrice'];
	$rack_no = $row1['rack_no'];
	$usage_details = $row1['usage_details'];

	$sql =  "SELECT * FROM item_stock WHERE item_name='$itemName' AND item_code='$itemCode'";
	$result = mysqli_query($con,$sql);
	$row =mysqli_fetch_assoc($result);

	 $stock = $row['stock'];
?>
                          					<div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label>Item Name</label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iname" id="iname" value="<?php echo $itemName ?>" class="form-control"style="text-align: center;">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
              <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label>Price</label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iprice" id="iprice" value="<?php echo $itemPrice ?>" class="form-control"style="text-align: center;">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label>Usage of the Item</label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iusage" id="iusage" value="<?php echo $usage_details ?>" class="form-control"style="text-align: center;">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label>Rack Details</label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="irack" id="irack" value="<?php echo $rack_no ?>" class="form-control"style="text-align: center;">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label>Avb. Qty</label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iaqty" id="iaqty" value="<?php echo $stock ?>" class="form-control"style="text-align: center;">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>