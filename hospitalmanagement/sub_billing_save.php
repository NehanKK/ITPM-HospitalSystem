<?php
    include('db_connect.php');

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


    $sql1 = "INSERT INTO `billing_details`(`pid`, `pName`, `did`, `dName`, `dCharge`, `date`, `lCharge`, `oCharge`, `hCharge`, `tAmount`, `tax`, `nAmount`, `payType`, `dateAndTime`) VALUES ('$pid', '$pName', '$did', '$dName', '$dCharge', '$date', '$lCharge', '$oCharge', '$hCharge', '$tAmount', '$tax', '$nAmount', '$payType', '$datetime')";
    $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));


    $sql2 = "UPDATE `lab_main` SET `amount`='0' WHERE pid = '$pid' ";
    $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));

?>