<?php
    include "db_connect.php";


   $rep_id = mysqli_real_escape_string($con,$_GET['rep_id']);
   $sql3 = "SELECT * FROM grn_det WHERE grn_No='$rep_id'";
            $result3= mysqli_query($con,$sql3)or die(mysqli_error());
            $numrows = mysqli_num_rows($result3);
           $row3=mysqli_fetch_assoc($result3);
           $date = $row3['date'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<style type="text/css">
    table, th, td {
  border: 1px solid black;
}

</style>
<body onload="printPage();">
         <table class="table" style="width: 100%;border: none;">
    <tr>
        <th style="border: none;"></th>
        <th style="border: none;"><h1>FAM-DOC HOSPITAL</h1></th>
        <th style="border: none;"></th>

    </tr>
     <tr>
        <th style="border: none;text-align:left;"><font>T.P : <font>0472 222 214</font></font></th>
        <th style="border: none;"></th>
    </tr>
    <tr>
        <th style="border: none;text-align:left;"><font>Address : <font style="text-size:50px">FamDoc,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No.36,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kirulapana<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Colombo<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></font></th>
        <th style="border: none;"></th>
        <th style="border: none;"><img style="height: 100px;width:100px;padding: 0px;" src="assets/images/hoslogo.png"></th>
    </tr>
</table>
<hr>
     <h2>Item Stock Update Report &nbsp;&nbsp;</h2>
       <h3>DATE - &nbsp;&nbsp;<?php echo $date ?>&nbsp;&nbsp;/&nbsp;&nbsp;GRN NO- &nbsp;&nbsp;<?php echo $rep_id ?></h3> 
<!--         <h3>GRN NO. - &nbsp;&nbsp;<?php echo $rep_id ?></h3>  -->
           <h2 align="center">Item Details</h2> 
      <table class="table" style="width: 100%;margin-top:3%; ;">

    <tr style="text-align:left">

      <th scope="col">Item Name</th>
      <th scope="col">Last Stock</th>
      <th scope="col">Sold Quantity</th>
      <th scope="col">Unit Price (Rs)</th>
      <th scope="col">Amount (Rs)</th>
      

    
    </tr>

   <tr style="text-align:left">
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
       

</body>

<script type="text/javascript">
    function printPage() {
        window.print();
    }
</script>
</html>