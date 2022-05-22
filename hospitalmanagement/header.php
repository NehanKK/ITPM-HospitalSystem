    <?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$uname = $_SESSION['newusername'];
if (isset($_SESSION['newusername'])){
 
?>
<script type="text/javascript">
    function logout() {
       window.location.href = "http://localhost/ITPM-HospitalSystem-main/Sprint2_sourcefile_hospitalmanagement/index.php";
    }
</script>
<div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                      
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar"><?php echo $uname ?>
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                   <!--  <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div> -->
                                    <div class="dropdown-content-body">
                                        <ul>
                                           
                                            <li>
                                                <button type="button" class="btn btn-primary" onclick="logout()">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
}
 else{
        header("http://localhost/ITPM-HospitalSystem-main/Sprint2_sourcefile_hospitalmanagement/login_page.php");
  } 
  ?>