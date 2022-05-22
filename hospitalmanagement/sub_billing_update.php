<?php
    include('db_connect.php');

    $mainId = mysqli_real_escape_string($con,$_POST['mainId']);
    $pid = mysqli_real_escape_string($con,$_POST['pid']);
    $pName = mysqli_real_escape_string($con,$_POST['pName']);
    $did = mysqli_real_escape_string($con,$_POST['did']);
    $dName = mysqli_real_escape_string($con,$_POST['dName']);
    $dCharge = mysqli_real_escape_string($con,$_POST['dCharge']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $lCharge = mysqli_real_escape_string($con,$_POST['lCharge']);
    $oCharge = mysqli_real_escape_string($con,$_POST['oCharge']);
    $hCharge = mysqli_real_escape_string($con,$_POST['hCharge']);
    $tAmount = mysqli_real_escape_string($con,$_POST['tAmount']);
    $tax = mysqli_real_escape_string($con,$_POST['tax']);
    $nAmount = mysqli_real_escape_string($con,$_POST['nAmount']);
    $payType = mysqli_real_escape_string($con,$_POST['payType']);

    $createToday = new DateTime('now', new DateTimeZone('Asia/Colombo'));
    $date= $createToday->format('Y-m-d');
    $time= $createToday->format('H:i:s');
    $datetime= $createToday->format('Y-m-d H:i:s');


    $sql1 = "UPDATE `billing_details` SET `pid`='$pid',`pName`='$pName',`did`='$did',`dName`='$dName',`dCharge`='$dCharge',`date`='$date',`lCharge`='$lCharge',`oCharge`='$oCharge',`hCharge`='$hCharge',`tAmount`='$tAmount',`tax`='$tax',`nAmount`='$nAmount',`payType`='$payType' WHERE `id`='$mainId' ";
    $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));

?>