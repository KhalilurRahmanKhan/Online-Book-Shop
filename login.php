<?php require 'header.php'?>

<?php
$msg='';
if(isset($_POST['submit'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
  
	$sql="select * from user where email='$email' and password='$password'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count>0){
	  session_start();
	  $_SESSION['user_login']=true;
	  $_SESSION['email']=$email;

	  header('location:index.php');
	  die();
	}
	else{
	  $msg="true";
	}
  }

?>



<div class="container"style="width:40%; margin-top:10px; background-color: #E9ECEF; padding:30px;">
<form method="post">

  

  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control"  name="email" placeholder="Enter your e-mail" required>

  

  <label for="password" class="form-label">Password</label>
  <input type="password" class="form-control"  name="password" placeholder="Enter your password" required>

  <br>


<button type="submit" name="submit" class="btn btn-primary">Submit</button>
<br><br>

<?php

if($msg!=""){
	?>
	Enter correct information or  <a href="signup.php">Sign up</a> here.
 <?php
}
else{
	?>
	If you are not registered then <a href="signup.php">Sign up</a> here.
<?php
}
?>




</form>
</div>
<br>


<?php require 'footer.php'?>