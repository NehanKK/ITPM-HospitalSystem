<?php 
session_start();
include "db_connect.php";

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js
"></script>
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
   function printinvoice(c){
    var rep_id = c;

    window.open('print_grn.php?rep_id='+rep_id, '_blank').focus();

    // var formData = new FormData();
    // formData.append('rep_id', rep_id);
        

            

 //                var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
 //                    if (req) {
 //                        req.onreadystatechange = function() {
 //                    if (req.readyState == 4) { //data is retrieved from server
 //                        if (req.status == 200) { // which reprents ok status 
 //                           // alert(req.responseText);
                                             
 //                    }            
 //                } 
 //            } 
 //                req.open("POST", '', true); //open url using get method, get_GrnBill.php
 //                req.send(formData); 
 //            }

}
    function getitemrep(b) {
           
            
        var rep_id = b;

    var formData = new FormData();
    formData.append('rep_id', rep_id);
        

            

                var req = getXmlHttpRequestObject(); // fuction to get xmlhttp object
                    if (req) {
                        req.onreadystatechange = function() {
                    if (req.readyState == 4) { //data is retrieved from server
                        if (req.status == 200) { // which reprents ok status 
                           // alert(req.responseText);
                           document.getElementById('getmodaldata').innerHTML = req.responseText;
                          // location.reload
                          $('#exampleModalCenter').modal('show');                       
                    }            
                } 
            } 
                req.open("POST", 'getiteminv_rep_item.php', true); //open url using get method, get_GrnBill.php
                req.send(formData); 
            }
        }

        $(document).ready(function() {
    $('#example').DataTable();
} );
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
                                <h1><span>Item Stock View List</span></h1>
      <a href="item_stock.php"><button type="button" class="btn btn-primary">Add Item</button></a>
      <!-- <input type="text" name="" style="width: 50px;margin-left: 5%;"> -->

                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item">Item Stock</li>
                                    <li class="breadcrumb-item active">View List</li>

                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!-- methana indan thamai oyalage individual code tika ptan ganna -->
                <div id="color" style="background: linear-gradient(to right,#b6ebfc ,#33ccff);">
                <!--     <div class="row"style="" >
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="">
        </div>
    </div> -->
    <div class="row"style="" >
        <div class="col-sm-12 col-md-12 col-lg-12">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th width="20%" style="text-align:center">GRN No</th>
                <th width="20%" style="text-align:center">GRN Date</th>
                <th width="10%" style="text-align:center">Report</th>
                <th width="10%" style="text-align:center">View Items</th>
                <th width="10%" style="text-align:center">Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sqlgetdet = "SELECT * FROM  grn_sum";
            $resultgetdet = mysqli_query($con,$sqlgetdet);
            while($rowgetdet = mysqli_fetch_array($resultgetdet)){
                $grn_No  = $rowgetdet['grnno'];
                $date  = $rowgetdet['grndate'];
         

     
            ?>
            <tr>
                <td><?php echo $grn_No?></td>
                <td><?php echo $date?></td>
                 <td align="center"><button type="button" class="btn btn-warning" onclick="printinvoice(<?php echo $grn_No ?>);"style="width: 100px;">PRINT</button></td>
             <td align="center"><button type="button" class="btn btn-success" onclick="getitemrep(<?php echo $grn_No ?>);"style="width: 100px;">VIEW</button></td>
                <td align="center"><a href="item_stock_det_edit.php?grn=<?php echo $grn_No ?>"><button type="button" style="width: 100px;" class="btn btn-danger">Edit</button></a></td>

            </tr>
        <?php }?>
    </tbody>
</table>
<div id="getmodaldata">
        </div>
    </div>
</div>
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
</div>

    <!-- jquery vendor -->
    
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