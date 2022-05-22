<?php 
session_start();
include "db_connect.php";
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FamDoc Hospital</title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php include 'sidemenu.php' ?>
    <!-- /# sidebar -->

<?php include 'header.php' ?>


    <div class="content-wrap">
        <div class="main">
           
               <div class="container-fluid">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1><span>Account Details</span></h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Account Details</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!-- methana indan thamai oyalage individual code tika ptan ganna -->
                <div id="color">

                <table class="table table-bordered">
                    <thead>
                        <tr style="background-color: #000000; color: #ffffff;">
                            <th width="5%" style="border: 0; padding: 1%; text-align: center; color: #ffffff !important;" scope="col">#</th>
                            <th width="20%" style="border: 0; padding: 1%; text-align: center; color: #ffffff !important;" scope="col">Patient</th>
                            <th width="20%" style="border: 0; padding: 1%; text-align: center; color: #ffffff !important;" scope="col">Doctor</th>
                            <th width="20%" style="border: 0; padding: 1%; text-align: center; color: #ffffff !important;" scope="col">Date</th>
                            <th width="20%" style="border: 0; padding: 1%; text-align: center; color: #ffffff !important;" scope="col">Amount</th>
                            <th width="15%" style="border: 0; padding: 1%; text-align: center; color: #ffffff !important;" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql1 = "SELECT * FROM `billing_details`";
                            $result1 = mysqli_query($con,$sql1) or die(mysqli_error($con));
                            $index = 1;
                            while ($row1 = mysqli_fetch_array($result1)) {
                        ?>
                        <tr>
                            <td style="color: #000000 !important;"><?php echo $index ?></td>
                            <td style="color: #000000 !important;"><?php echo $row1['pName'] .' - '. $row1['pid'] ?></td>
                            <td style="color: #000000 !important;"><?php echo $row1['dName'] .' - '. $row1['did'] ?></td>
                            <td style="color: #000000 !important;"><?php echo $row1['date']  ?></td>
                            <td style="color: #000000 !important;" align="right"><?php echo number_format($row1['nAmount'], 2, '.', ',')  ?></td>
                            <td style="color: #000000 !important;">
                                <button style="width: 100%" onclick="viewBillHandler('<?php echo $row1['id'] ?>')" class="btn btn-primary btn-sm"> View </button>
                                <button style="width: 100%" onclick="updateBillHandler('<?php echo $row1['id'] ?>')" class="btn btn-success btn-sm"> Updates </button>
                                <button style="width: 100%" onclick="deleteBillHandler('<?php echo $row1['id'] ?>')" class="btn btn-danger btn-sm"> Delete </button>
                            </td>
                        </tr>
                        <?php 
                                $index++;
                            }
                        ?>
                    </tbody>
                    </table>

                <!-- methanata enakam  -->
                </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2022 © Deep Wave Group - SLIIT</p>
                            </div>
                        </div>
                    </div>
              
            </div>
        </div>
    </div>

    <script>
        const viewBillHandler = (billId) => {
            window.location.href = `billing.php?billId=${billId}&action=view`;
        }

        const updateBillHandler = (billId) => {
            window.location.href = `billing.php?billId=${billId}&action=update`;
        }

        const deleteBillHandler = (billId) => {
            window.location.href = `billing.php?billId=${billId}&action=delete`;
        }
    </script>

    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
</body>

</html>