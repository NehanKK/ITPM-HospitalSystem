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

    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>

<script>
    function getXmlHttpRequestObject() {
        if (window.XMLHttpRequest) {
            return new XMLHttpRequest();
        }
        else if(window.ActiveXObject) {
            return new ActiveXObject("Microsoft.XMLHTTP");
        }else {
            }
    }
</script>


<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic);

body {
	margin: 0;
	padding: 0;
	font: 100%/1 'Lato', Arial, sans-serif;
	color: #333;
	background: #fff;
}
.button {
	/* background-color:#f5f5f5; */
	/* border:1px solid #dcdcdc; */
	/* color:#666; */
	cursor:pointer;
	display:inline-block;
	vertical-align:middle;
	font-size:13px;
	font-weight: bold;
	/* font-family: 'Lato', Arial, sans-serif; */
	text-transform: uppercase;
	height:27px;
	line-height:27px;
	min-width:54px;
	padding:0 8px;
	text-align:center;
	text-decoration:none;
	border-radius:2px;
	/* background:linear-gradient(top,#f5f5f5,#f1f1f1); */
}

.trigger, #output {
	padding: 1em;
	margin: 0;
}

/*= Confirm Box */

#confirm-wrapper {
	width: 100%;
	position: fixed;
	top: 0;
	left: 0;
	z-index: 1000000;
	background: rgba( 204, 204, 204, 0.6 );
	display: none;
	transition: opacity 1s ease-in;
}

#confirm-box {
	width: 300px;
	background: #fff;
	min-height: 200px;
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -100px 0 0 -150px;
}

#confirm-buttons {
	position: absolute;
	width: 100%;
	text-align: center;
	bottom: 0;
	left: 0;
	padding-bottom: 1em;
}

#confirm-buttons button {
	display: inline-block;
	background: transparent;
	color: #000;
	font-size: 1em;
	font-family: 'Lato', Arial, sans-serif;
	font-weight: bold;
	cursor: pointer;
	text-transform: uppercase;
	border: 2px solid;
	margin: 0 0.5em;
	padding: 0.6em 0;
	width: 120px;
}

#confirm-header {
	text-align: center;
	font-size: 1em;
	font-weight: bold;
	text-transform: uppercase;
	margin: 2.5em 0 1.5em 0;
}

#confirm-header:after {
	content: ' ';
	display: block;
	width: 1em;
	border-top: 1px solid;
	margin: 0.4em auto;
}

</style>

<script>
    (function() {
	
	function ConfirmBox( element, params ) {
		this.element = element;
		this.params = params || {};
		this.params.ok = params.ok || function() {};
		this.params.cancel = params.cancel || function() {};
		
		this.init();
	}
	
	ConfirmBox.prototype = {
		init: function() {
			this.instance = null;
			this.create();
			this.layout();
			this.actions();
		},
		create: function() {
		  if( document.querySelector( "#confirm-wrapper" ) === null ) {
			var wrapper = document.createElement( "div" );
				wrapper.id = "confirm-wrapper";
			var html = "<div id='confirm-box'><h2 id='confirm-header'></h2>";
				html += "<div id='confirm-buttons'><button id='confirm-ok'>OK</button><button type='button' id='confirm-cancel'>Cancel</button></div>";
				html += "</div>";
				
				wrapper.innerHTML = html;
				document.body.appendChild( wrapper );
		  }
		  
		  this.instance = document.querySelector( "#confirm-wrapper" );
		},
		layout: function() {
			var wrapper = this.instance;
			var winHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
			
			wrapper.style.height = winHeight + "px";	
		},
		show: function( element ) {
			element.style.display = "block";
			element.style.opacity = 1;
		},
		hide: function( element ) {
			element.style.opacity = 0;
			setTimeout(function() {
				element.style.display = "none";
			}, 1000);
		},
		actions: function() {
			var self = this;
			self.element.addEventListener( "click", function() {
				self.instance.querySelector( "#confirm-header" ).innerHTML = self.element.dataset.question;
				self.show( self.instance );
			}, false);
			
			self.instance.querySelector( "#confirm-ok" ).
			addEventListener( "click", function() {
				self.hide( self.instance );
				setTimeout(function() {
					self.params.ok();
				}, 1000);
			}, false);
			
			
			self.instance.querySelector( "#confirm-cancel" ).
			addEventListener( "click", function() {
				self.hide( self.instance );
				setTimeout(function() {
					self.params.cancel();
				}, 1000);
			}, false);
		}
	};
	
	document.addEventListener( "DOMContentLoaded", function() {
		var confirm = document.querySelector( "#confirm" );
		var output = document.querySelector( "#output" );
		var confBox = new ConfirmBox( confirm, {
			ok: function() {
				deleteBillHandler();
			},
			cancel: function() {
				// output.innerHTML = "Cancel";
			}
			
		});
	});
	
})();

</script>



<style>
    .button {
        /* background-color:#f5f5f5; */
        /* border:1px solid #dcdcdc; */
        /* color:#666; */
        cursor:pointer;
        display:inline-block;
        vertical-align:middle;
        font-size:13px;
        font-weight: bold;
        /* font-family: 'Lato', Arial, sans-serif; */
        text-transform: uppercase;
        height:27px;
        line-height:27px;
        min-width:54px;
        padding:0 8px;
        text-align:center;
        text-decoration:none;
        border-radius:2px;
        /* background:linear-gradient(top,#f5f5f5,#f1f1f1); */
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
                                <h1><span>Billing and Payment</span></h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Billing and Payment</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div>

                <div class="container">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div id="msgSuc" class="col-sm-12 col-md-12 col-lg-12" style="font-family: 'Lato', Arial, sans-serif; background: #4bff00; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; text-align: center; color: #000000; font-weight: 800; border: 1px solid #c8c5c5; padding: 10px; font-size: 18px; border-radius: 5px; display: none; ">
                                
                            </div>
                        </div>

                        <div class="row">
                            <div id="msgErr" class="col-sm-12 col-md-12 col-lg-12" style="font-family: 'Lato', Arial, sans-serif; background: #ff0707; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px; text-align: center; color: #ffffff; font-weight: 800; border: 1px solid #c8c5c5; padding: 10px; font-size: 18px; border-radius: 5px; display: none; ">
                                
                            </div>
                        </div>
                    </div>
                </div>


                <!-- methana indan thamai oyalage individual code tika ptan ganna -->
                <div id="color" style="background: linear-gradient(to right,#b6ebfc ,#33ccff); color: #000000;">

                <div class="container-fluid">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        
                        <div class="row" style="margin-top: 1%">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label for="pid">Patient ID</label>
                                <input type="text" class="form-control" id="pid" value="" onkeyup="getPatient();">
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label for="pName">Patient Name</label>
                                <input type="text" class="form-control" id="pName" value="" readonly>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 2%;">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label for="pid">Report Type</label>
                                    <select class="form-control" name="type1" id="type1">
                                        <option value="">Select Report Type</option>
                                        <option value="blood">FBC - Blood Test</option>
                                        <option value="suger">Suger Test</option>
                                        <option value="lipid">Lipid Test</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <label for="pName">Fee</label>
                                    <input type="text" class="form-control" id="fee1" value="">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label for="pName">Description</label>
                                    <input type="text" class="form-control" id="desc1" value="">
                                </div>

                                <div class="col-sm-12 col-md-1 col-lg-1">
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </div>
                        </div>

                        <div class="row"  id="tech_table">
                                

                        </div>

                        <div class="row">
                            <button class="btn btn-success btn-sm" onclick="addMore()">Add More</button>
                            <input type="hidden" name="num" id="num" value="1" />
                        </div>

                        <div class="row" style="margin-top: 3%">
                            <button class="button btn btn-primary" onclick="saveBillDetails()">Save</button>
                        </div>
                        


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

    <script>

        const saveBillDetails = () => {
            let pid = document.getElementById(`pid`).value;
            let pName = document.getElementById(`pName`).value;
            let num = document.getElementById(`num`).value;

            let type = "";
            let fee = "";
            let desc = "";
            let typeName = "";
            let feeName = "";
            let descName = "";

            if(pName == "") {
                document.getElementById(`msgErr`).innerHTML = "Please Select Patient";
                document.getElementById(`msgErr`).style.display = 'block';
                document.getElementById("msgErr").scrollIntoView();
                return;
            }

            var formData = new FormData();
            formData.append('pid', pid);
            formData.append('pName', pName);
            formData.append('num', num);

            for(let i = 1; i <= num; i++) {
                typeName = `type${i}`;
                feeName = `fee${i}`;
                descName = `desc${i}`;
                type = document.getElementById(`type${i}`).value;
                fee = document.getElementById(`fee${i}`).value;
                desc = document.getElementById(`desc${i}`).value;

                formData.append(typeName, type);
                formData.append(feeName, fee);
                formData.append(descName, desc);
            }

            var req = getXmlHttpRequestObject();
                        if (req) {
                            req.onreadystatechange = function() {
                                    if (req.readyState == 4) { 
                                        if (req.status == 200) {  
                                            // alert(req.responseText);
                                            document.getElementById(`msgSuc`).innerHTML = "Update Record Successfully";
                                            document.getElementById(`msgErr`).style.display = 'none';
                                            document.getElementById(`msgSuc`).style.display = 'block';
                                            document.getElementById("msgSuc").scrollIntoView();

                                            setTimeout(() => {
                                                location.reload();
                                            }, 2000);
                                            
                                            
                                        }       
                                    } 
                            }  
                            req.open("POST", "sub_lab_save.php", true);
                            req.send(formData);
                        }
        }

        function addMore(){
	
            var type = new Array();
            var typeTxt = new Array();
            var fee = new Array();
            var desc = new Array();
            var drop = "";
            var tech_tab = "";


            num_rows = document.getElementById("num").value;	// Field Counter
            int_num_rows = parseInt(num_rows);
            total_rows = int_num_rows+1;

            
            for (i=2; i<total_rows; i++) {
                type[i] = document.getElementById("type"+i).value;	
                drop = document.getElementById("type"+i);	
                typeTxt[i] = drop.options[drop.selectedIndex].text;
                fee[i] = document.getElementById("fee"+i).value;		
                desc[i] = document.getElementById("desc"+i).value;		
            }

            document.getElementById("tech_table").innerHTML = "";
            
            for (i=2; i<=total_rows; i++) {
                if (i == total_rows) {	// Create New Row

                    tech_tab += `<div class="col-sm-12 col-md-4 col-lg-4">
                                    <select class="form-control" name="type${i}" id="type${i}">
                                        <option value="">Select Report Type</option>
                                        <option value="blood">FBC - Blood Test</option>
                                        <option value="suger">Suger Test</option>
                                        <option value="lipid">Lipid Test</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <input type="text" class="form-control" id="fee${i}" value="">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" id="desc${i}" value="">
                                </div>
                                <div class="col-sm-12 col-md-1 col-lg-1">
                                    <button class="btn btn-danger btn-sm" onclick="deleteRow(${i})">Delete</button>
                                </div>`;
                
                    
                }
                
                else {	// Create New Row With Value
                
                    
                    
                    
                    
                    tech_tab += `<div class="col-sm-12 col-md-4 col-lg-4">
                                    <select class="form-control" name="type${i}" id="type${i}">
                                        <option value="${type[i]}">${typeTxt[i]}</option>
                                        <option value="blood">FBC - Blood Test</option>
                                        <option value="suger">Suger Test</option>
                                        <option value="lipid">Lipid Test</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <input type="text" class="form-control" id="fee${i}" value="${fee[i]}">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" id="desc${i}" value="${desc[i]}">
                                </div>
                                <div class="col-sm-12 col-md-1 col-lg-1">
                                    <button class="btn btn-danger btn-sm" onclick="deleteRow(${i})">Delete</button>
                                </div>`;
                
                }
            }
            

            document.getElementById("tech_table").innerHTML = tech_tab;
            document.getElementById("num").value = total_rows;

        }


        function deleteRow(row) {
	
            var type = new Array();
            var typeTxt = new Array();
            var fee = new Array();
            var desc = new Array();
            var drop = "";
            var tech_tab = "";
            
            num_rows = document.getElementById("num").value;
            int_num_rows = parseInt(num_rows);
            row = parseInt(row);
            

            k = 2;
            m = k;
            for (; k<=int_num_rows; k++) {
                if (k == row) {		
                }
                else {

                    type[m] = document.getElementById("type"+k).value;	
                    drop = document.getElementById("type"+k);	
                    typeTxt[m] = drop.options[drop.selectedIndex].text;
                    fee[m] = document.getElementById("fee"+k).value;		
                    desc[m] = document.getElementById("desc"+k).value;	
                
                    m++;
                }	
            }
            document.getElementById("tech_table").innerHTML = '';
            
            i = 2;
            j = i;
            
            for (; i<=int_num_rows; i++) {		
                if (i == row) {
                }
                else {
                    
                    
                    
                    tech_tab += `<div class="col-sm-12 col-md-4 col-lg-4">
                                    <select class="form-control" name="type${j}" id="type${j}">
                                        <option value="${type[j]}">${typeTxt[j]}</option>
                                        <option value="blood">FBC - Blood Test</option>
                                        <option value="suger">Suger Test</option>
                                        <option value="lipid">Lipid Test</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <input type="text" class="form-control" id="fee${j}" value="${fee[j]}">
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" id="desc${j}" value="${desc[j]}">
                                </div>
                                <div class="col-sm-12 col-md-1 col-lg-1">
                                    <button class="btn btn-danger btn-sm" onclick="deleteRow(${j})">Delete</button>
                                </div>`;
                    
                    j++;
                }
            }
            
                document.getElementById("tech_table").innerHTML = tech_tab;
                document.getElementById("num").value = int_num_rows-1;
        }


    function getPatient(){

        jQuery.noConflict()(function ($) { 	// jQuery Work Separately
        $(function() {
                $("#pid").autocomplete ({
                    source: "get_patient_details.php",	// Value Get Page
                    minLength: 1,
                    
                    select: function(event, ui) {	// Fill Value
                        $('#pName').val(ui.item.name);	// Item 
                    }
                });
            });
        });

    }

    function getDoctor(){

        jQuery.noConflict()(function ($) { 	// jQuery Work Separately
        $(function() {
                $("#did").autocomplete ({
                    source: "get_doc_details.php",	// Value Get Page
                    minLength: 1,
                    
                    select: function(event, ui) {	// Fill Value
                        $('#dName').val(ui.item.name);	// Item 
                        $('#dCharge').val(ui.item.charge);	// Item 

                        calTotal();
                    }
                });
            });
        });

    }

    
</script>

    <!-- jquery vendor -->
    <!-- <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script> -->
    <!-- nano scroller -->
    <!-- <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script> -->
    <!-- sidebar -->

    <!-- <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script> -->
    <!-- bootstrap -->

    <!-- <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script> -->


    <!-- <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script> -->
    <!-- scripit init-->
    <!-- <script src="assets/js/dashboard2.js"></script> -->
</body>

</html>