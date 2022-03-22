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
                                <h1><span>Item Register</span></h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Item Register</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!-- methana indan thamai oyalage individual code tika ptan ganna -->
                <div id="color" style="background: linear-gradient(to right,#b6ebfc ,#33ccff);">
    <div class="row"style="" >
        <div class="col-sm-6 col-md-6 col-lg-6">
          <label>Item Name</label>
            <select name="itemname" id="itemname" class="form-control" onchange="openbox()">
                                                                  
                                                  <option  selected="selected">- Please Select -</option>
                                                  <?php
                                                    $re_inv = mysqli_query($con,"SELECT id,itemName FROM item");
                                                    while ($row_inv = mysqli_fetch_assoc($re_inv)) {
                                                        ?><option value = "<?php echo $row_inv['id'];?>" ><?php echo$row_inv['itemName'];?></option><?php
                                                    }
                                                  ?>
                                                </select>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <label>Item Code</label>
        <input type="text" name="icode" id="icode" class="form-control" readonly>
      </div>

</div>
    <div class="row"style="margin-top: 2%;" >
        <div class="col-sm-6 col-md-6 col-lg-6">
          <label>Item Price (Rs.)</label>
       <input type="text" name="iprice" id="iprice" class="form-control">
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <label>Rack No.</label>
        <input type="text" name="rno" id="rno" class="form-control">
      </div>

</div>
    <div class="row"style="margin-top: 2%;" >
        <div class="col-sm-6 col-md-6 col-lg-6">
          <label>Usage Details</label>
 <textarea class="form-control" id="tarea" name="tarea" rows="30" style="height:100px"></textarea>
       </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
      
      </div>

</div>
    <div class="row"style="margin-top: 2%;" align="center" >
        <div class="col-sm-4 col-md-4 col-lg-4" align="center">
      <button type="button" class="btn btn-success">SUBMIT</button>

       </div>
 

</div>
</div>
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