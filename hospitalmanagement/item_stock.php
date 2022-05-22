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
                                <h1><span>Item Stock Update</span></h1>
      <a href="Itemstock_view.php"><button type="button" class="btn btn-primary">View List</button></a>

                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Item Stock Update</li>
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
          <label>Date</label>
        <input type="date" name="grnDate" id="grnDate" class="form-control" >

       <!--      <select name="itemname" id="itemname" class="form-control" onchange="openbox()">
                                                                  
                                                  <option  selected="selected">- Please Select -</option>
                                                  <?php
                                                    $re_inv = mysqli_query($con,"SELECT id,itemName FROM item");
                                                    while ($row_inv = mysqli_fetch_assoc($re_inv)) {
                                                        ?><option value = "<?php echo $row_inv['id'];?>" ><?php echo$row_inv['itemName'];?></option><?php
                                                    }
                                                  ?>
                                                </select> -->
      </div>
      <div class="col-sm-3 col-md-3 col-lg-3">
        <label>GRN No</label>
        <input type="text" name="grnno" id="grnno" class="form-control" value="<?php echo $itemcode ?>" readonly>
      </div>

</div>

           
                                            <h3 align="center" style="margin-top: 3%;"><font style="background-color:yelllow;">Item Details</font></h3>
                                     
                                        <div class="row"style="margin-top: 3%;">
                                              
                                                <div class="col-sm-2 col-md-2 col-lg-2" align="center">
                                                    <label><strong>Item Name</strong></label>
                                                </div>
                                                <div class="col-sm-1 col-md-1 col-lg-1" align="center">
                                                    <label><strong>Item Code</strong></label>
                                                </div>
                                                 <div class="col-sm-2 col-md-2 col-lg-2" align="center">
                                                    <label><strong>Rem Stock</strong></label>
                                                </div>
                                                 <div class="col-sm-2 col-md-2 col-lg-2" align="center">
                                                    <label><strong>New Stock</strong></label>
                                                </div>
                                                <div class="col-sm-2 col-md-2 col-lg-2" align="center">
                                                        <label><strong>Unit Price(Rs.)</strong></label>
                                                </div>
                                                <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                                                    <label><strong>Total Amount (Rs.)</strong></label>
                                                </div>
                                        </div>
                                       
                                            <?Php
                                
                                            

                                                        $sqlitemname="SELECT * FROM item";
                                            $resultitemname = mysqli_query($con,$sqlitemname)or die(mysqli_error($con));
                                            $rowcount =mysqli_num_rows($resultitemname);
                                            $i = 1;
                                            while ($rowitemname=mysqli_fetch_array($resultitemname)) {
                                                $itemName = $rowitemname['itemName'];
                                            $itemCode = $rowitemname['itemCode'];
                                            $itemPrice = $rowitemname['itemPrice'];
                                          
                                          $sqlstock = "SELECT * FROM item_stock WHERE item_name='$itemName'";
                                          $resultstock = mysqli_query($con,$sqlstock);
                                          $rowstock = mysqli_fetch_assoc($resultstock);
                                          $stockcount = $rowstock['stock'];
                                          if ($stockcount=='') {
                                              $stockcount='0';
                                          }
                                                ?>
 <div class="row" style="padding:5px;">
                                            
                                                <div class="col-sm-2 col-md-2 col-lg-2"style="padding:5px;">
                                                    <input type="text" name="itemname<?php echo $i ?>" class="form-control" id="itemname<?php echo $i ?>" readonly="readonly" value="<?php echo $itemName ?>">
                                                    <input type="hidden" id="rowcountn" name="rowcountn" value="<?php echo $rowcount ?>">
                                                </div>
                                                  <div class="col-sm-1 col-md-1 col-lg-1"style="padding:5px;">
                                                    <input type="text" name="itemcode<?php echo $i ?>" class="form-control" id="itemcode<?php echo $i ?>" readonly="readonly" value="<?php echo $itemCode ?>">
                                                
                                                </div>
                                                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2"style="padding:5px;">
                                                    <label id="validlabel"><strong>Rem Stock</strong></label>
                                                    <input type="number" name="remstock<?php echo $i ?>"class="form-control" id="remstock<?php echo $i ?>"  value="<?php echo $stockcount ?>"style="text-align: center;" readonly>
                                                </div>
                                                 <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2"style="padding:5px;">
                                                    <label id="validlabel"><strong>New Stock</strong></label>
                                                    <input type="number" name="newstock<?php echo $i ?>"class="form-control" id="newstock<?php echo $i ?>" onkeyup="itemamountcal(id);"   value=""style="text-align: center;">
                                                </div>
                                                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2"style="padding:5px;">
                                                    <label id="validlabel"><strong>Unit Price</strong></label>
                                                    <input type="text" name="unitPrice<?php echo $i ?>" class="form-control" id="unitPrice<?php echo $i ?>" readonly="readonly" value="<?php echo $itemPrice?>" style="text-align: right;">
                                                </div>
                                                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3"style="padding:5px;">
                                                    <label id="validlabel"><strong>Amount (Rs)</strong></label>
                                                    <input type="text" name="getamount<?php echo $i ?>" class="form-control" id="getamount<?php echo $i ?>" style="text-align: right;">
                                                </div>
    </div>
                                                <?php
                                        $i++;   }   
                                                ?>
                                        
                                    
 

</div>
   <div class="form-group col-lg-12" align="center">
<input type="hidden" name="dcheck" id="dcheck" value="<?php echo $checkdate ?>">
    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success" onclick="submitnewgrn()" />
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