<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
include('smtp/PHPMailerAutoload.php');


$type=get_safe_value($_POST['type']);
$added_on=date('Y-m-d h:i:s');

//value register
if($type=='register')
{

$name=get_safe_value($_POST['name']);
$email=get_safe_value($_POST['email']);
$mobile=get_safe_value($_POST['mobile']);
$password=get_safe_value($_POST['password']);



	$check=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email'"));
	
	if($check>0){ //if email exist on our database
		$arr=array('status'=>'error','msg'=>'Email id already registered','field'=>'email_error');
	}


	 else{    // otherwise insert  

// $new_password=password_hash($password,PASSWORD_BCRYPT);   //for password hasshing
$rand_str=rand_str(); //calling made up function for verification random string


	 
		mysqli_query($con,"insert into user(name,email,mobile,password,status,email_verify,added_on,rand_str) values('$name','$email','$mobile','$password','1','0','$added_on','$rand_str')");
                               //$new_password

        $id=mysqli_insert_id($con);   //this function will retrieve the recent inserting id


//on registration giving wallet amount to customers

$getSetting=getSetting();
		$wallet_amt=$getSetting['wallet_amt'];  //fetching amount what admin define
		if($wallet_amt>0){
			manageWallet($id,$wallet_amt,'in','Register');
		}

////////////////////////////////////////////////


		$html=FRONT_SITE_PATH."verify/".$rand_str;
		send_email($email,$html,'Verify your email id');




		//success mssg
		    $arr=array('status'=>'success','msg'=>'Thank you for register. Please check your email id, to verify your account','field'=>'form_msg');
	}
	echo json_encode($arr);
}


//value login
if($type=='login')
{
	$email=get_safe_value($_POST['user_email']);
	$password=get_safe_value($_POST['user_password']);
	
	$res=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($res);
	
	if($check>0){ //if email exist on our database

        $row=mysqli_fetch_assoc($res);
		$status=$row['status'];
		$email_verify=$row['email_verify'];
		// $dbpassword=$row['password'];  //for password decrypt
		$loginpass=$row['password'];

if($email_verify==1) {  if($status==1){  

//if(password_verify($password,$dbpassword)){  //for password decryption
if($loginpass==$password){

                    $_SESSION['FOOD_USER_ID']=$row['id'];
					$_SESSION['FOOD_USER_NAME']=$row['name'];
					$arr=array('status'=>'success','msg'=>'');

                    // after login if user have cart session then pass the data to function......

                 if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
						foreach($_SESSION['cart'] as $key=>$val){
							manageUserCart($_SESSION['FOOD_USER_ID'],$val['qty'],$key);
						}
					}






 } else{$arr=array('status'=>'error','msg'=>'Please enter correct password'); }

// } else{$arr=array('status'=>'error','msg'=>'Please enter correct password'); }


}else{ $arr=array('status'=>'error','msg'=>'your Account is deactivated');    }  

                      
} else{  $arr=array('status'=>'error','msg'=>'please verify your email id');  }
	
	



	}



	else{   

$arr=array('status'=>'error','msg'=>'please enter valid email details');



	}


	
	echo json_encode($arr);


}



if($type=='forgot'){
	$email=get_safe_value($_POST['user_email']);
	
	$res=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){	
		$row=mysqli_fetch_assoc($res);
		$status=$row['status'];
		$email_verify=$row['email_verify'];
		$id=$row['id'];

		if($email_verify==1){
			if($status==1){
				
				$rand_password=rand(11111,99999);
				// $new_password=password_hash($rand_password,PASSWORD_BCRYPT);


				$new_password=$rand_password;
				mysqli_query($con,"update user set password='$new_password' where id='$id'");
				

				$html="your new generated password from foodka: ".$rand_password;

				send_email($email,$html,'New Password');
				$arr=array('status'=>'success','msg'=>'Password has been reset and send it to your email id');// success mssg
				
			}else{
				$arr=array('status'=>'error','msg'=>'Your account has been deactivated.');
			}
		}else{
			$arr=array('status'=>'error','msg'=>'You have not verify your email id');
		}
	}else{
		$arr=array('status'=>'error','msg'=>'Please enter registered email id');	
	}
	echo json_encode($arr);
}
?>

