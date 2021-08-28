<?php
include ("header.php");

?>
<a href="walletfailed.php" align="middle"><u>Payment Error?Click here</u></a>


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
//$txn_id=$data['balance_transaction'];
//$oid=$_SESSION['ORDER_ID'];

 if($data['status']=='succeeded')

{     

if(isset($_SESSION['AMOUNT'])){
			manageWallet($_SESSION['FOOD_USER_ID'],$_SESSION['AMOUNT'],'in','User recharge',$payment_id);
			unset($_SESSION['AMOUNT']);
			redirect(FRONT_SITE_PATH.'wallet');
		}
		






} 




}
?>









