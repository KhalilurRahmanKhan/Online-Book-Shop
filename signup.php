<?php require 'header.php'?>
<?php
$msg='';
if(isset($_POST['submit'])){
	$user_name=mysqli_real_escape_string($con,$_POST['user_name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$phone=mysqli_real_escape_string($con,$_POST['phone']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

	$check_sql=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($check_sql);
	if($check>0){
		 $msg='Email already exist';
	}
	else{
		$result=mysqli_query($con,"insert into user(user_name,email,phone,password) values('$user_name','$email','$phone','$password')");

	}


}
?>



<div class="container">
<form method="post">

  <label for="user_name" class="form-label">Name</label>
  <input type="text" class="form-control" name="user_name" placeholder="Enter your name" required>

  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control"  name="email" placeholder="Enter your e-mail" required>

  <label for="phone" class="form-label">Phone</label>
  <input type="number" class="form-control"  name="phone" placeholder="Enter your phone" required>

  <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control"  name="password" placeholder="Enter your password" required>

  <br>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
<br><br>

<?php
if($msg!=''){
  echo $msg ; 

}
?>




</form>
</div>
<br>


<?php require 'footer.php'?>