<?php require 'header.php'?>

<?php
if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$phone=mysqli_real_escape_string($con,$_POST['phone']);
	$comment=mysqli_real_escape_string($con,$_POST['comment']);

	$result=mysqli_query($con,"insert into contact(name,email,phone,comment) values('$name','$email','$phone','$comment')");
    


}
?>



<div class="container" style="width:40%; margin-top:10px; background-color: #E9ECEF; padding:30px;">
<form method="post">

  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" name="name" placeholder="Enter your name" required>

  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control"  name="email" placeholder="Enter your e-mail" required>

  <label for="phone" class="form-label">Phone</label>
  <input type="text" class="form-control"  name="phone" placeholder="Enter your phone" required>

  <label for="comment" class="form-label">Comment</label>
  <textarea  class="form-control"  name="comment" rows="3" required></textarea>
  <br>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>




</form>
</div>
<br>


<?php require 'footer.php'?>