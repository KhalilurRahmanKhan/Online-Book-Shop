<?PHP
require'include/connection.inc.php';

$msg="";

if(isset($_POST['submit'])){
  $admin_name=mysqli_real_escape_string($con,$_POST['admin_name']);
  $password=mysqli_real_escape_string($con,$_POST['password']);

  $sql="select * from admin where admin_name='$admin_name' and password='$password'";
  $result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0){
    session_start();
    $_SESSION['admin_login']='yes';
    $_SESSION['admin_name']=$admin_name;

    header('location:home.php');
    die();
  }
  else{
    $msg=true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

  
</head>
<body>

<div class="container"  style="width:40%; margin-top:110px;">
<form method="post">
<div class="form-group">
    <label for="admin_name">Admin name</label>
    <input type="text" name="admin_name" class="form-control" id="name" required>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>

  <?php 
    if($msg){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Admin name or password is not correct
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       </div>';
    }
  ?>
  

  <button type="submit" name="submit" class="btn btn-primary">Log In</button>
</form>
</div>
















<script src="../js/jquery-3.5.1.min.js"> </script>

<script src="../js/bootstrap.bundle.min.js"> </script>





<script>










</script>
</body>
</html>