<?php
    include('db_connect.php');

    $mainId = mysqli_real_escape_string($con,$_POST['mainId']);

    $sql1 = "DELETE FROM `billing_details` WHERE id = '$mainId' ";
    $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));