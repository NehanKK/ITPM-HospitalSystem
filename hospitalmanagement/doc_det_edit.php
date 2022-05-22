<?php 
session_start();
include "db_connect.php";
$did = mysqli_real_escape_string($con,$_GET['did']);

$sqlitem = mysqli_query($con,"SELECT MAX(itemCode) AS max_value FROM item ");
$resultitem = mysqli_fetch_assoc($sqlitem);
    $max_itemid = $resultitem["max_value"];
    if ($max_itemid <= 0) {
        $itemcode = '1001';
        // $newitemid = 'MED'.$itemcode;
    } else {
        $itemcode = $max_itemid+1;
        // $newitemid = $itemcode;
    }

    $itemdetsql ="SELECT * FROM doctor_det WHERE did='$did'";
    $itemdetresult = mysqli_query($con,$itemdetsql);
    $itemdetrow = mysqli_fetch_assoc($itemdetresult);
    $name = $itemdetrow['name'];
    $date = $itemdetrow['date'];
    $mail = $itemdetrow['mail'];
    $regno = $itemdetrow['regno'];
    $description = $itemdetrow['description'];
    $fromDate = $itemdetrow['fromDate'];
    $toDate = $itemdetrow['toDate'];
    $special = $itemdetrow['special'];
    $id = $itemdetrow['id'];


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
<script type="text/javascript">
function getXmlHttpRequestObject() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    else {
    }
}
    function editdet(){
       var name = document.getElementById('name').value;
        var date = document.getElementById('date').value;
        var mail = document.getElementById('mail').value;
        var regno = document.getElementById('regno').value;
        var special = document.getElementById('special').value;
        var did = document.getElementById('did').value;
        var desc = document.getElementById('desc').value;
        var from = document.getElementById('from').value;
        var to = document.getElementById('to').value;
    var formData = new FormData();
           formData.append('name', name);
            formData.append('date', date);
            formData.append('mail', mail);
            formData.append('regno', regno);
            formData.append('special', special);
            formData.append('did', did);
            formData.append('desc', desc);
            formData.append('from', from);
            formData.append('to', to);
     var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                           alert(req.responseText);
                          
                       window.location.href = "docRegister_view.php";

                    }            
                } 
            } 
                req.open("POST", 'doc_det_edit_submit.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
        }
</script>
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
                                <h1><span>Doctors Edit</span></h1>
      <a href="docRegister_view.php"><button type="button" class="btn btn-primary">View List</button></a>

                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item">Doctors Register</li>
                                    <li class="breadcrumb-item active">Item Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!-- methana indan thamai oyalage individual code tika ptan ganna -->
                <div id="color" style="background: linear-gradient(to right,#b6ebfc ,#33ccff);">
       <div class="row"style="" >
        <div class="col-sm-4 col-md-4 col-lg-4">
        <label>Add Photo</label>
        <input type="file" name="photo" id="photo" class="form-control" value="" >
      </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $name ?>">
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <label>Date</label>
        <input type="date" name="date" id="date" class="form-control" value="<?php echo $date ?>" >
      </div>

</div>
        <div class="row"style="" >
        <div class="col-sm-4 col-md-4 col-lg-4">
        <label>Email</label>
        <input type="" name="mail" id="mail" class="form-control" value="<?php echo $mail ?>" >
      </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <label>MBBS Reg No.</label>
        <input type="text" name="regno" id="regno" class="form-control" value="<?php echo $regno ?>">
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        <label>Specialization</label>
        <input type="text" name="special" id="special" class="form-control" value="<?php echo $special ?>" >
      </div>

</div>
        <div class="row"style="" >
        <div class="col-sm-4 col-md-4 col-lg-4">
        <label>Doctor ID</label>
        <input type="" name="did" id="did" class="form-control" value="<?php echo $did ?>" readonly >
      </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
          <label>Discription</label>
        <input type="text" name="desc" id="desc" class="form-control" value="<?php echo $description ?>">
      </div>
      <div class="col-sm-4 col-md-4 col-lg-4">
        
    </div>
</div>
    <h5 align="center" style="margin-top: 3%"><strong>Available Time Slot</strong></h5>

<div class="row" style="margin-top: 2%;">
    <div class="col-sm-2 col-md-2 col-lg-2">
    </div>
      <div class="col-sm-1 col-md-1 col-lg-1" align="right">
        <label>From</label>
    </div>
      <div class="col-sm-3 col-md-3 col-lg-3"align="left">
        <input type="Time" name="from" id="from" class="form-control" value="<?php echo $fromDate ?>">

      </div>
       <div class="col-sm-1 col-md-1 col-lg-1" align="right">
        <label>To</label>
    </div>
      <div class="col-sm-3 col-md-3 col-lg-3" align="left">
        <input type="Time" name="to" id="to" class="form-control" value="<?php echo $toDate ?>">

      </div>
</div>
<div class="row"style="margin-top: 2%;" align="center" >
        <div class="col-sm-4 col-md-4 col-lg-4" align="center">
      <button type="button" class="btn btn-danger" onclick="editdet()">UPDATE</button>

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