<?php 
session_start();
include "db_connect.php";

$sqlitem = mysqli_query($con,"SELECT MAX(grnno) AS max_value FROM grn_sum ");
$resultitem = mysqli_fetch_assoc($sqlitem);
    $max_itemid = $resultitem["max_value"];
    if ($max_itemid <= 0) {
        $itemcode = '1001';
        // $newitemid = 'MED'.$itemcode;
    } else {
        $itemcode = $max_itemid+1;
        // $newitemid = $itemcode;
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FamDoc Hospital</title>
    <!-- ================= Favicon ================== -->
      <!-- Date Piker -->
<link href="plugins/DatePiker/css/jquery-ui.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="plugins/DatePiker/js/jquery-ui.js"></script>
<!-- Date Piker -->
<script type="text/javascript" src="plugins/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
var receiveReq = getXmlHttpRequestObject();

jQuery.noConflict()(function ($) {  // jQuery Work Separately
    $(function() {
        $('#grnDate').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: "2014:2030",
            dateFormat:"yy-mm-dd",
            maxDate:0
        });
        $("#grnDate").datepicker().datepicker("setDate", new Date());
    });
});
    function submitdet(){
        var itemname = document.getElementById('itemname').value;
        var icode = document.getElementById('icode').value;
        var iprice = document.getElementById('iprice').value;
        var rno = document.getElementById('rno').value;
        var tarea = document.getElementById('tarea').value;
    var formData = new FormData();
            formData.append('itemname', itemname);
            formData.append('icode', icode);
            formData.append('iprice', iprice);
            formData.append('rno', rno);
            formData.append('tarea', tarea);
     var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                           alert(req.responseText);
                            // document.getElementById('gramaNiladhari').innerHTML = req.responseText;
                          location.reload();
                       
                    }            
                } 
            } 
                req.open("POST", 'item_det_submit.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
        }
        function itemamountcal(a){


var thenum = a.replace( /^\D+/g, '');

var newstocknew = "newstock"+thenum;
var unitPricenew = "unitPrice"+thenum;

    var aa=document.getElementById(newstocknew).value;
    var cc=document.getElementById(unitPricenew).value;


    var quannew = (aa * cc );
    var getamount = "getamount"+thenum;
    document.getElementById(getamount).value = quannew;

}


function submitnewgrn() {
              
                  
            var grnDate = document.getElementById('grnDate').value;
            var grnno = document.getElementById('grnno').value;
            var rowcountn = document.getElementById('rowcountn').value;

    var formData = new FormData();
            formData.append('grnDate', grnDate);
            formData.append('grnno', grnno);
            formData.append('rowcountn', rowcountn);
for (var i = 1; i <= rowcountn; i++) {

    var itemnamenew = "itemname"+i;
    var itemcodenew = "itemcode"+i;
    var newstocknew = "newstock"+i;
    var unitPricenew = "unitPrice"+i;
    var getamountnew = "getamount"+i;


    var itemnam= document.getElementById(itemnamenew).value;
    var itemcod = document.getElementById(itemcodenew).value;
    var newstk = document.getElementById(newstocknew).value;
    var uprice = document.getElementById(unitPricenew).value;
    var uamount = document.getElementById(getamountnew).value;

            formData.append(itemnamenew, itemnam);
            formData.append(itemcodenew, itemcod);
            formData.append(newstocknew, newstk);
            formData.append(unitPricenew, uprice);
            formData.append(getamountnew, uamount);



            
            
            
}
            

                var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                           alert(req.responseText);
                            // document.getElementById('gramaNiladhari').innerHTML = req.responseText;
                          location.reload();
                       
                    }            
                } 
            } 
                req.open("POST", 'newgrninsert.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
     
}
function checkbat(){

var itemname = document.getElementById('itemname').value;

 var formData = new FormData();
    formData.append('itemname', itemname);
 

                var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                     if (req) {
                        req.onreadystatechange = function() {
                     if (req.readyState == 4) { //data is retrieved from server
                         if (req.status == 200) { // which reprents ok status 
                        // alert(req.responseText);
                              document.getElementById('get_item_det').innerHTML = req.responseText;
                          // location.reload();
                       
                     }            
                } 
             } 
                 req.open("POST", 'get_item_details.php', true); //open url using get method, get_GrnBill.php
                 req.send(formData); 
             }
}
</script>
<style type="text/css">
@media only screen and (max-width: 1800px) {
  #validlabel {
    display: none;
    }
    @media only screen and (max-width: 762px) {
  #validlabel {
    display: block;
  }
    @media only screen and (max-width: 1800px) {
  .margtop {
    margin-top: 2%;
  }
    @media only screen and (max-width: 762px) {
  .margtop {
    margin-top: 6%;
  }
}
</style>
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
                                <!-- <h1><span>Item Stock Update</span></h1>
      <a href="Itemstock_view.php"><button type="button" class="btn btn-primary">View List</button></a> -->

                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Item Search</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!-- methana indan thamai oyalage individual code tika ptan ganna -->
                <div id="color" style="background: linear-gradient(to right,#b6ebfc ,#33ccff);">
    <div class="row"style="" >
        <div class="col-sm-3 col-md-3 col-lg-3">
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
   <select name="itemname" id="itemname" class="js-example-basic-multiple form-control js-example-basic-single1" style="width:100%" onchange="checkbat()">
                                              <option value="" selected="selected">Select the Item</option>
                                            <?php
                                                $select_item = mysqli_query($con,"SELECT id,itemName,itemCode,itemPrice,rack_no,usage_details FROM item");
                                                while ($result_item = mysqli_fetch_array($select_item)) {
                                                            echo "<option value='".$result_item[0]."'>".$result_item[1].' | '.$result_item[2]."</option>";
                                                        }
                                              ?>
                                              </select>
                                            
                                            <script type="text/javascript">
    jQuery(document).ready(function ($) {

                    $('.js-example-basic-single1').select2({
                      placeholder: 'Please Select'
                    });

                });     
</script>
<script src="plugins/validation/Validater/assets/js/jquery.validate.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      </div>
       <div class="col-sm-1 col-md-1 col-lg-1">
        <button type="button" class="btn btn-success">Search</button>
       </div>
       <div class="col-sm-3 col-md-3 col-lg-3" align="left">
<img src="assets/images/newdoc.png" style="height: 100px;">
       </div>

</div>
<div id="get_item_det">
                <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label><strong>Item Name</strong></label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iname" id="iname" value="" class="form-control">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
              <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label><strong>Price</strong></label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iprice" id="iprice" value="" class="form-control">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label><strong>Usage of the Item</strong></label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iusage" id="iusage" value="" class="form-control">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label><strong>Rack Details</strong></label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="irack" id="irack" value="" class="form-control">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
                    <div class="row" style="margin-top: 2%">
                            <div class="col-sm-4 col-md-4 col-lg-4"align="right">
                                <label><strong>Avb. Qty</strong></label>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4" align="left">
                                <input type="text" readonly name="iaqty" id="iaqty" value="" class="form-control">
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                       
                        </div>
                    </div>
                </div>
               
<!--     <div class="row"style="margin-top: 2%;" align="center" >
        <div class="col-sm-4 col-md-4 col-lg-4" align="center">
      <button type="button" class="btn btn-success" onclick="submitdet()">SUBMIT</button>

       </div>
 

</div> -->

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