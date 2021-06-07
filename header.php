
<?php 
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');

$cartArr=getUserFullCart();
$totalCartDish=count($cartArr); //counting my cart product


//for finding total price
$totalPrice=0;
foreach($cartArr as $list){
    $totalPrice=$totalPrice+($list['qty']*$list['price']);
}

 ?>


<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo FRONT_SITE_NAME ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/animate.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/slick.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/chosen.min.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo FRONT_SITE_PATH?>assets/css/responsive.css">

        <!--  my arf icon -->
        <link rel="icon" type="image/jpg" href="<?php echo FRONT_SITE_PATH?>images/myLogo.jpg">

        <script src="<?php echo FRONT_SITE_PATH?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-top black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                            <div class="welcome-area">
                                <!-- <p>Default welcome msg! </p> -->
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 col-sm-8">
                            <div class="account-curr-lang-wrap f-right">
                                <?php
                                if(isset($_SESSION['FOOD_USER_NAME'])){
                                ?>
                                <ul>
                                    <li class="top-hover"><a href="#"><?php echo "Welcome ".$_SESSION['FOOD_USER_NAME'];?>  <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="<?php echo FRONT_SITE_PATH?>profile">Profile  </a></li>
                                            <li><a href="<?php echo FRONT_SITE_PATH?>order_history">Order History</a></li>
                                            <li><a href="<?php echo FRONT_SITE_PATH?>logout">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                <a href="<?php echo FRONT_SITE_PATH?>">
                                    <img alt="" src="assets/img/logo/front logo.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                            <div class="header-middle-right f-right">
                                <div class="header-login">
                                    
            <!--      if we are not login then show the icon -->


                                  <?php
                                    if(!isset($_SESSION['FOOD_USER_NAME'])){
                                        ?>



                                    <a href="<?php echo FRONT_SITE_PATH?>login_register">
                                        <div class="header-icon-style">
                                            <i class="icon-user icons"></i>
                                        </div>
                                        <div class="login-text-content">
                                            <p>Register <br> or <span>Sign in</span></p>
                                        </div>
                                    </a>


                                        <?php
                                            }
                                            ?>



                                </div>
                                <div class="header-wishlist">
                                   &nbsp;
                                </div>
                                

                                <div class="header-cart">
                                    <a href="#">
                                        <div class="header-icon-style">
                                            <i class="icon-handbag icons"></i>
                                            <span class="count-style" id="totalCartDish"><?php echo $totalCartDish?></span>
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                            <span class="cart-digit-bold" id="totalPrice">
                                            <?php 
                                            if($totalPrice!=0){
                                                echo $totalPrice.' BDT';
                                            }
                                            ?></span>
                                        </div>
                                    </a>
                                    <?php if($totalPrice!=0){?>
                                    <div class="shopping-cart-content">
                                        <ul id="cart_ul">
                                            <?php foreach($cartArr as $key=>$list){ ?>
                                                <li class="single-shopping-cart" id="attr_<?php echo $key?>">
                                                    <div class="shopping-cart-img">
                                                        <a href="javascript:void(0)"><img alt="" src="<?php echo SITE_DISH_IMAGE.$list['image']?>"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a href="javascript:void(0)">
                                                        <?php echo $list['dish']?>
                                                        </a></h4>
                                                        <h6>Qty: <?php echo $list['qty']?></h6>
                                                        <span><?php echo 
                                                        $list['qty']*$list['price'];?> BDT</span>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="javascript:void(0)" onclick="delete_cart('<?php echo $key?>')"><i class="ion ion-close"></i></a>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Total : <span class="shop-total" id="shopTotal">
                                            <?php echo $totalPrice?> BDT
                                            </span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            <a href="<?php echo FRONT_SITE_PATH?>cart">view cart</a>
                                            <a href="<?php echo FRONT_SITE_PATH?>checkout">checkout</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        
                                        <li><a href="<?php echo FRONT_SITE_PATH?>shop">Shop</a></li>
                                        <li><a href="<?php echo FRONT_SITE_PATH?>about-us">about</a></li>
                                        <li><a href="<?php echo FRONT_SITE_PATH?>contact-us">contact us</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area-start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul class="menu-overflow" id="nav">
										 
										 <li><a href="<?php echo FRONT_SITE_PATH?>shop">Shop</a></li>
                                         <li><a href="<?php echo FRONT_SITE_PATH?>about-us">about</a></li>
                                         <li><a href="<?php echo FRONT_SITE_PATH?>contact-us">contact us</a></li>

									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
        </header>
