<?php
    include('db_connect.php');

    $pid = mysqli_real_escape_string($con,$_POST['pid']);
    $pName = mysqli_real_escape_string($con,$_POST['pName']);
    $num = mysqli_real_escape_string($con,$_POST['num']);

    $createToday = new DateTime('now', new DateTimeZone('Asia/Colombo'));
    $date= $createToday->format('Y-m-d');
    $time= $createToday->format('H:i:s');
    $datetime= $createToday->format('Y-m-d H:i:s');

    $sql1 = "INSERT INTO `lab_main`( `pid`, `pName`,`date`, `time`) VALUES ( '$pid', '$pName',  '$date', '$time')";
    $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
    $last_id = mysqli_insert_id($con);

    $total_amount = 0;
    for($i = 1; $i <= $num; $i++) {
        $type = mysqli_real_escape_string($con,$_POST['type'.$i]);
        $fee = mysqli_real_escape_string($con,$_POST['fee'.$i]);
        $desc = mysqli_real_escape_string($con,$_POST['desc'.$i]);

        $total_amount = $total_amount + $fee;

        $sql2 = "INSERT INTO `lab_sub`(`type`, `fee`, `description`, `mainId`) VALUES ('$type', '$fee', '$desc', '$last_id')";
        $result2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
    }

    $sql3 = "UPDATE `lab_main` SET `amount`='$total_amount' WHERE id = '$last_id'";
    $result3 = mysqli_query($con,$sql3) or die(mysqli_error($con));

    