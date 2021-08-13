<?php 
include('top.php');
$msg="";
$name="";
$email="";
$mobile="";
$password="";
$id="";

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$row=mysqli_fetch_assoc(mysqli_query($con,"select * from delivery_boy where id='$id'"));
	$name=$row['name'];
	$email=$row['email'];
	$password=$row['password'];
	$mobile=$row['mobile'];
}

if(isset($_POST['submit'])){
	$name=get_safe_value($_POST['name']);
	$email=get_safe_value($_POST['email']);
	$password=get_safe_value($_POST['password']);
	$mobile=get_safe_value($_POST['mobile']);
	$added_on=date('Y-m-d h:i:s');
	
	if($id==''){
		$sql="select * from delivery_boy where email='$email'";
	}else{
		$sql="select * from delivery_boy where email='$email' and id!='$id'";
	}	
	if(mysqli_num_rows(mysqli_query($con,$sql))>0){
		$msg="Delivery boy or email already added";
	}else{
		if($id==''){
			
			mysqli_query($con,"insert into delivery_boy(name,password,mobile,status,added_on,email) values('$name','$password','$mobile',1,'$added_on','$email')");
		}else{
			mysqli_query($con,"update delivery_boy set name='$name', password='$password' , mobile='$mobile',email='$email' where id='$id'");
		}
		
		redirect('delivery_boy.php');
	}
}
?>
<div class="row">
			<h1 class="grid_title ml10 ml15">Manage Delivery Boy</h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" placeholder="name" name="name" required value="<?php echo $name?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">EMAIL</label>
                      <input type="email" class="form-control" placeholder="email" name="email" required value="<?php echo $email?>">
                      <div class="error mt8"><?php echo $msg?></div>

                    </div>






					<div class="form-group">
                      <label for="exampleInputName1">Mobile</label>
                      <input type="text" class="form-control" placeholder="mobile" name="mobile" required value="<?php echo $mobile?>">
					</div>

                    <div class="form-group">
                      <label for="exampleInputEmail3" required>Password</label>
                      <input type="textbox" class="form-control" placeholder="Password" name="password"  value="<?php echo $password?>">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            
		 </div>
        
<?php include('footer.php');?>