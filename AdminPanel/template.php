
<?PHP
session_start();
if(!isset($_SESSION['admin_login']) && $_SESSION['admin_login']==''){
 
    header('location:login.php');
  
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


<nav class="navbar navbar-dark bg-dark " style="position:fixed; width:100%;">
  <span class="navbar-brand mb-0 h1">Admin Panel</span>
  <span class="navbar-text">
      Welcome <?php  echo $_SESSION['admin_name']?>
  </span>
</nav>
<br><br>



<div class="p-3 mb-2 bg-dark text-white" style="position:fixed;">
<nav class="nav flex-column" >
  <a class="nav-link " href="home.php">Home</a>
  <a class="nav-link " href="order.php">Order</a>

  <a class="nav-link " href="category.php">Category</a>
  <a class="nav-link" href="book.php">Book</a>
  <a class="nav-link" href="user.php">User</a>
  <a class="nav-link " href="contact.php">Contact</a>

  <br><br><br> <br><br><br> <br><br><br> <br><br><br> 

  
 <a href="logout.php"> <button type="button"  class="btn btn-secondary btn-sm">Log out</button> </a>

</nav>
</div>





















<script src="../js/jquery-3.5.1.min.js"> </script>

<script src="../js/bootstrap.bundle.min.js"> </script>

<script>










</script>
</body>
</html>