<?php
    include "db_connect.php";


   $did = mysqli_real_escape_string($con,$_GET['did']);
  
            $sqlgetdet1 = "SELECT * FROM doctor_det";
            $resultgetdet1 = mysqli_query($con,$sqlgetdet1);
            while($rowgetdet1 = mysqli_fetch_array($resultgetdet1)){
                $name1  = $rowgetdet1['name'];
                $date1  = $rowgetdet1['date'];
                $regno1  = $rowgetdet1['regno'];
                $mail1  = $rowgetdet1['mail'];
                $special1  = $rowgetdet1['special'];
                $did1  = $rowgetdet1['did'];
                $description1  = $rowgetdet1['description'];
                $fromDate1  = $rowgetdet1['fromDate'];
                $toDate1  = $rowgetdet1['toDate'];

     }
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
     <h2>Doctor Details Report &nbsp;&nbsp;</h2>
<!--         <h3>GRN NO. - &nbsp;&nbsp;<?php echo $rep_id ?></h3>  -->
      <table class="table" style="width: 100%;margin-top:3%; ;">
        <tr>
<th style="border: none;text-align:left;">Time Slot : From&nbsp;&nbsp;<?php echo $fromDate1?>&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;<?php echo $toDate1 ?></th>
</tr>
</table>

      <table class="table" style="width: 100%;margin-top:3%; ;">
        <tr>
<th>Name</th>
<th>Register No</th>
<th>Specialization</th>
<th>Registered Date</th>
</tr>
  <?php 
            $sqlgetdet = "SELECT * FROM doctor_det";
            $resultgetdet = mysqli_query($con,$sqlgetdet);
            while($rowgetdet = mysqli_fetch_array($resultgetdet)){
                $name  = $rowgetdet['name'];
                $date  = $rowgetdet['date'];
                $regno  = $rowgetdet['regno'];
                $mail  = $rowgetdet['mail'];
                $special  = $rowgetdet['special'];
                $did  = $rowgetdet['did'];
                $description  = $rowgetdet['description'];
                $fromDate  = $rowgetdet['fromDate'];
                $toDate  = $rowgetdet['toDate'];

     
            ?>
<tr>
    <td align="center"><?php echo $name ?></td>
    <td align="center"><?php echo $regno ?></td>
    <td align="center"><?php echo $special ?></td>
    <td align="center"><?php echo $date ?></td>

</tr>
<?php } ?>

</table>


    
 

</body>

<script type="text/javascript">
    function printPage() {
        window.print();
    }
</script>
</html>