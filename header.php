<?php require 'connection.php'?>
<?php
$cat_result=mysqli_query($con,"select * from category where status=1");
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Book Shop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="stylesheet" href="css/responsive.css">
</head>
<body>


	<div class="container">


	<nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light bg-light" >
		<a class="navbar-brand" href="#">Online Book Shop</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="all_book.php">Books</a>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Category
			  </a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				
				<?php while($row=mysqli_fetch_assoc($cat_result)){ ?>
					<a class="dropdown-item" href="category.php?category_id=<?php echo $row['category_id']?>"><?php echo $row['category_name']?></a>
				
				<?php } ?>
			
			  </div>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="author_name.php">Author</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="year_list.php">Year</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="contact.php">Contact us</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="#">About</a>
			</li>
		
		  </ul>

<?php
session_start();


if(isset( $_SESSION['user_login'])){ ?>
	<a href="myorder.php"><button type="button" class="btn btn-light" >My order</button></a>
	<a href="cart.php"><button type="button" class="btn btn-light" >Cart(<?php 
	if(isset($_SESSION['cart'])){
		$count=count($_SESSION['cart']);
		echo $count;
	}
	else{
		echo "0";
	}
	 ?>)</button></a>	<a href="wishlist.php"><button type="button" class="btn btn-light" >Wishlist(<?php
					
			$sql="select * from wishlist";

			$result=mysqli_query($con,$sql);
			$count=mysqli_num_rows($result);
			echo $count;
		 ?>)</button></a>
	<a href="logout.php"><button type="button" class="btn btn-danger" >Log out</button></a>

<?php }
else{ ?>
	<a href="cart.php"><button type="button" class="btn btn-light" >Cart(<?php 
	if(isset($_SESSION['cart'])){
		$count=count($_SESSION['cart']);
		echo $count;
	}
	else{
		echo "0";
	}
	 ?>)</button></a>
	<a href="login.php"><button type="button" class="btn btn-primary" >Log In</button></a>

<?php }

?>
		  
		 


      </div>
	  </nav>
	  



