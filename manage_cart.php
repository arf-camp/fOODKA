<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');


// prx($_POST);
$attr=get_safe_value($_POST['attt']);
$qty=get_safe_value($_POST['qty']);
$type=get_safe_value($_POST['type']);

if($type=='add'){
	if(isset($_SESSION['FOOD_USER_ID'])){ //if login
		$uid=$_SESSION['FOOD_USER_ID'];
		manageUserCart($uid,$qty,$attr); // passing details to function
	}else{ //if not login
		$_SESSION['cart'][$attr]['qty']=$qty;
	}
}




?>