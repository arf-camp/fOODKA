<?php
include ("header.php");
if(!isset($_SESSION['ORDER_ID'])){
	redirect(FRONT_SITE_PATH.'shop');
}
if(isset($_SESSION['COUPON_CODE'])){
    unset($_SESSION['COUPON_CODE']);
    unset($_SESSION['FINAL_PRICE']);
}

$oid=$_SESSION['ORDER_ID'];
mysqli_query($con,"delete from  order_master where id='$oid'");
mysqli_query($con,"delete from  order_detail where order_id='$oid'");
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
                            <h2>Payment <span>Failed</span>.Order not placed.Please<span> Order again </span> after some time <br/></h2>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

<?php
unset($_SESSION['ORDER_ID']);
include("footer.php");
?>