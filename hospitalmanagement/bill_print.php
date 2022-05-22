<?php 
    include('db_connect.php');
    $mainId = $_GET['billId'];
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<title>Yashoda</title>
<link rel="shortcut icon"  href="images/logo.png" type="DPL">
</head>
<body onLoad="javascript:print();">

<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr >
    <td align="center" valign="top" >
      <table width="752" border="0" cellspacing="1" cellpadding="0" bgcolor="#666666" >
        <tr style="border:none;">
          <td bgcolor="#ffffff" style="border:none;background:;"> 
		  <table width="750" border="0" cellspacing="2" cellpadding="0" style="border:none;background:#ffffff;">
           <tr> 
              <td bgcolor="#FFFFFF"><table width="748" border="0" cellspacing="2" cellpadding="6" bgcolor="#ffffff">
                <tr>
                  <td bgcolor="#FFFFFF"><table width="740" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: Tahoma, Geneva, sans-serif; font-size: 10px; padding: 0; margin: 0;">
                   <tr>
                  <td><table width="100%" cellspacing="1" cellpadding="1">
                    <tr>
                      <td align="left"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                          <tbody>
                            <tr>
                              <td width="77%" style="font-size:16px; text-decoration:none; font-weight:bold;">
                              <span style="font-size:12px; font-weight:normal">
								<strong>Famdoc Hospital</strong><br>
                              <span style="font-size:12px; font-weight:normal">
							  </span>No 70, Kandy Road, Malabe <br> 011 589 8658</td>
                              <td width="23%" align="right"><img src="assets/images/hoslogo.png" width="169" height="70" alt=""/></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                    <tr>                    
                    <tr>
                      <td align="right" style="border-bottom:1px; border-bottom-style:solid;"></td>
                    </tr>
                    <tr>
                      <td align="center" style="text-align:center;padding-top:10px;padding-bottom:10px;"><b>Billing Details</b></td>
                    </tr>
					
                    
                    <tr>
                      <td align="">
					  
					  <table width="100%" cellspacing="1" cellpadding="1" style="font-size:12px;">

                                <?php 
                                    $sql1 = "SELECT * FROM `billing_details` WHERE id = '$mainId'";
                                    $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
                                    $row1 = mysqli_fetch_assoc($result1);
                                ?>
								 <tr>
                                <td align="center" style="text-align:left;width:20%;"><b> Number</b></td>
                                <td align="center" style="text-align:center;width:1%;">:</td>																
                                <td align="center" style="text-align:left;width:20%;"><?php echo $row1['id'] ?></td>					  
                                <td align="center" style="text-align:left;width:8%;">&nbsp;</td>								
                                <td align="center" style="text-align:left;width:15%;"><b>Doctor</b></td>
                                <td align="center" style="text-align:center;width:1%;">:</td>																
                                <td align="right" style="text-align:left;width:20%;"><?php echo $row1['dName'] ?></td>					  								
                              </tr>
                              <tr>
                                <td align="center" style="text-align:left;width:20%;"><b>Patient Name</b></td>
                                <td align="center" style="text-align:center;width:1%;">:</td>																
                                <td align="center" style="text-align:left;width:20%;"><?php echo $row1['pName'] ?></td>					  
                                <td align="center" style="text-align:left;width:8%;">&nbsp;</td>								
                                <td align="center" style="text-align:left;width:15%;"><b>Date</b></td>
                                <td align="center" style="text-align:center;width:1%;">:</td>																
                                <td align="right" style="text-align:left;width:20%;"><?php echo $row1['date'] ?></td>					  								
                              </tr>
                                                        				  							   				  
                                                  				  							   				  						  
                        
                        </table>
					  </td>
                    </tr>					
					
                    <tr>
                      <td align="center" style="font-size:14px; font-weight:bold; ">&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="100%" style="font-size:14px;" valign="top">
                      	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;">
                      		<tr>
                      			<td bgcolor="#999999">
                      				<table width="100%" border="1" cellspacing="0"  style="font-size:12px;">
										<tr>
										  <td width="5%" align="center" bgcolor="#FFFFFF"><strong>#</strong></td>
										  <td width="25%" align="center" bgcolor="#FFFFFF"><strong>Service</strong></td>
										  <td width="10%" align="center" bgcolor="#FFFFFF"><strong>Price</strong></td>
										</tr>	
                                        
                                        <tr>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">1</td>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">Doctor Charges</td>
										  <td style="padding-right: 3%;" align="right" bgcolor="#FFFFFF"><?php echo number_format($row1['dCharge'], 2, '.', ',') ?></td>
										</tr>
                                        
                                        <tr>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">2</td>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">Lab Charges</td>
										  <td style="padding-right: 3%;" align="right" bgcolor="#FFFFFF"><?php echo number_format($row1['lCharge'], 2, '.', ',') ?></td>
										</tr>

                                        <tr>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">3</td>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">Hospital Charges</td>
										  <td style="padding-right: 3%;" align="right" bgcolor="#FFFFFF"><?php echo number_format($row1['hCharge'], 2, '.', ',') ?></td>
										</tr>

                                        <tr>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">4</td>
										  <td style="padding-left: 3%;" bgcolor="#FFFFFF">Other Charges</td>
										  <td style="padding-right: 3%;" align="right" bgcolor="#FFFFFF"><?php echo number_format($row1['oCharge'], 2, '.', ',') ?></td>
										</tr>

                                        <tr>
                                            <td colspan="2" align="right" style="padding-right: 3%;" bgcolor="#FFFFFF">Total Amount</td>
                                            <td style="padding-right: 3%;" align="right" bgcolor="#FFFFFF"><?php echo number_format(($row1['oCharge'] + $row1['dCharge'] + $row1['lCharge'] + $row1['hCharge']), 2, '.', ',') ?></td>
                                        </tr>

									</table>
                      			</td>
                      		</tr>
                        <tr>           
                </tr>
                          
                          <tr>
                            <td>&nbsp;
                              </td>
                          </tr>
                          
                          
                        
                          
                      	</table> 
					  </td>
                    </tr>		
                     		<tr>
                      <td width="100%" align="center">Thank You</td>
                      
                      </tr>	
					
 			
                  </table></td>
                </tr>
				
				 
              </table>
			  </td>
                </tr>
              </table>
			  </td>
           </tr> 
          </table>
		 </td> 
        </tr>
    </table></td>
  </tr>
</table>

</body>
</html>