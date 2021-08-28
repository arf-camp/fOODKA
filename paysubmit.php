<?php
include ("header.php");

?><a href="payfailed.php" align="middle"><u>Payment Error?Click here</u></a>


<?php

require('paykey.php'); 
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);
//$amount=;
	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>5000000,
		"currency"=>"BDT",
		"description"=>"online food ordering payment",
		"source"=>$token,
	));

	//echo "<pre>";
	//print_r($data);



//echo $data['balance_transaction']; echo "<br/>";
 //echo $data['status'];  echo "<br/>";
 // echo $data['id']; echo "<br/>";
	          
//	echo $_SESSION['FOOD_USER_ID']; echo "<br/>";
	     

//echo $_SESSION['ORDER_ID'];


////////////////
$uid=$_SESSION['FOOD_USER_ID'];
$payment_id=$data['id'];
$txn_id=$data['balance_transaction'];
$oid=$_SESSION['ORDER_ID'];

 if($data['status']=='succeeded')

{     mysqli_query($con,"update  order_master set payment_status='success',payment_id='$payment_id',txn_id='$txn_id' where id='$oid'");

$getUserDetailsBy=getUserDetailsByid();
	$email=$getUserDetailsBy['email'];

	$emailHTML=orderEmail($oid);
		include('smtp/PHPMailerAutoload.php');
		send_email($email,$emailHTML,'Order Placed');
		

redirect(FRONT_SITE_PATH.'paysucces.php');  die();




} else{

mysqli_query($con,"update  order_master set payment_status='transaction failed' where id='$oid'");
redirect(FRONT_SITE_PATH.'payfailed.php');  die();




}




}
?>









