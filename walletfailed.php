<?php
include ("header.php");

?>

<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?php echo FRONT_SITE_PATH?>shop">Home</a></li>
                        <li class="active">Order Placed </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-us-area pt-50 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-7 d-flex align-items-center">
                        <div class="overview-content-2">
                            <h2>Payment <span>Failed</span>..Please<span>Recharge again </span> after some time <br/></h2>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

<?php
unset($_SESSION['AMOUNT']);
include("footer.php");
?>