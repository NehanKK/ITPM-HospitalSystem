<?php 
session_start();
include "db_connect.php";

// $sqlitem = mysqli_query($con,"SELECT MAX(itemCode) AS max_value FROM item ");
// $resultitem = mysqli_fetch_assoc($sqlitem);
//     $max_itemid = $resultitem["max_value"];
//     if ($max_itemid <= 0) {
//         $itemcode = '1001';
//         // $newitemid = 'MED'.$itemcode;
//     } else {
//         $itemcode = $max_itemid+1;
//         // $newitemid = $itemcode;
//     }
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
    function submitdet(){
        var uname = document.getElementById('uname').value;
        var pward = document.getElementById('pward').value;

    var formData = new FormData();
            formData.append('uname', uname);
            formData.append('pward', pward);

     var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                           if (req.responseText=='yes') {
                            window.location.href = "http://localhost/Sprint2_sourcefile_hospitalmanagement/dashboard.php";
                           }else{
                            alert(req.responseText);
                           }
                       
                    }            
                } 
            } 
                req.open("POST", 'login_det_submit.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
        }
        
</script>

<body>




    <div class="content-wrap">
        <div class="main"style="background: linear-gradient(to right,#b6ebfc ,#33ccff);">
           
               <div class="container-fluid">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                               
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                          <!--       <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Item Register</li> -->
                            <!--     </ol> -->
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!-- methana indan thamai oyalage individual code tika ptan ganna -->
                <div id="color" >
    <div class="row" >
        <div class="col-sm-4 col-md-4 col-lg-4" align="right">
        <label>User Name</label>
      </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <input type="text" name="uname" id="uname" class="form-control" placeholder="@enter the username">
      </div>
    </div>
     <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4" align="right">
        <label>Passward</label>
      </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
        <input type="password" name="pward" id="pward" class="form-control" placeholder="@enter the passward">
      </div>
    </div>
 <div class="row"style="margin-top: 2%;" align="center" >
    <div class="col-sm-4 col-md-4 col-lg-4" align="center">

       </div>
        <div class="col-sm-4 col-md-4 col-lg-4" align="center">
      <button type="button" class="btn btn-success" style="width:100%" onclick="submitdet()">Login</button>
       </div>
 
</div>
 <div class="row"style="margin-top: 2%;" align="center" >
    <div class="col-sm-4 col-md-4 col-lg-4" align="center">

       </div>
        <div class="col-sm-4 col-md-4 col-lg-4" align="center">
  
      <label>Not a Member Yet  <a href="user_reg.php">Sign Up</a></label>
       </div>
 
</div>
  
   

</div>
</div>
<!-- methanata enakam  -->
</div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2022 ?? Deep Wave Group - SLIIT</p>
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