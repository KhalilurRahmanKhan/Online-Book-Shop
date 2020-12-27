<?php require 'header.php'?>
<?php
if(isset($_GET['book_id']) && $_GET['book_id']!=''){
	$book_id=mysqli_real_escape_string($con,$_GET['book_id']);
	if($book_id>0){
		$result=mysqli_query($con,"select * from book where book_id=$book_id");
		$row=mysqli_fetch_assoc($result);

	}
	else{
		?>
		
		<script>
		window.location.href='index.php';
		</script>
	
		<?php

	}
}
?>








<div class=container style=" height:500px; text-align:center;  overflow:auto;>

<div class="card mb-3" style="width: 1000px; height:500px;">
  <div class="row g-0">
    <div class="col-md-7">
      <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" alt="..." height="500px" width="500px">
    </div>
    <div class="col-md-4" >
      <div class="card-body" >
        <h5 class="card-title"><?php echo $row['book_name'] ?></h5>
		by <a href="author.php?author=<?php echo $row['author']?>"><?php echo $row['author']?></a><br>
		published in <a href="year.php?year=<?php echo $row['publishing_year']?>"><?php echo $row['publishing_year']?></a>


		<p class="card-text" ><?php echo "Price: ".$row['price'] ?></p>
		<p class="card-text" >
		<?php 
			$count=$row['quantity'];
		if($count>0){
			echo "Availablity: Available"; 

		}
		?>
		</p>

		<p class="card-text" >
		<?php 
			if(isset($_GET['book_id']) && $_GET['book_id']!=''){
				$book_id=mysqli_real_escape_string($con,$_GET['book_id']);
				$result=mysqli_query($con,"select book.*,category.category_name from book,category where book.category_id=category.category_id ");
				$row=mysqli_fetch_assoc($result);
				?>
				Category: <a href="category.php?category_id=<?php echo $row['category_id']?>"><?php echo $row['category_name']?></a>

	<?php		}
		
		?>
		</p>



<?php 
if(isset($_POST['cart'])){
	if(isset($_SESSION['cart'])){
		$item_array_id=array_column($_SESSION['cart'],"book_id");
		if(in_array($_POST['book_id'],$item_array_id)){
			echo "<script>alert('Book is already added in the cart')</script>";
			

		}
		else{
			$count=count($_SESSION['cart']);
			$item_array=array(
				'book_id'=>$_POST['book_id'],
				'quantity'=>$_POST['quantity']

			);
			$_SESSION['cart'][$count]=$item_array;
			header('Location: '.$_SERVER['REQUEST_URI']);

		}
	}

	else{
		
		$item_array=array(
			'book_id'=>$_POST['book_id'],
			'quantity'=>$_POST['quantity']

		);
		$_SESSION['cart'][0]=$item_array;
		header('Location: '.$_SERVER['REQUEST_URI']);

	}
}




?>

			

		<form method="post">
		<?php


	if(isset( $_SESSION['user_login'])){ 
		$email=$_SESSION['email'];
		$user_result=mysqli_query($con,"select * from user where email='$email'");
		$user_row=mysqli_fetch_assoc($user_result);



	

    if(isset($_GET['book_id'])){
		$book_id=mysqli_real_escape_string($con,$_GET['book_id']);
		$book_result=mysqli_query($con,"select * from book where book_id=$book_id");
		$book_row=mysqli_fetch_assoc($book_result);
		
	}
	if(isset($_POST['wishlist'])){
	
		$user_id=mysqli_real_escape_string($con,$_POST['user_id']);
		$book_name=mysqli_real_escape_string($con,$_POST['book_name']);
		$image=mysqli_real_escape_string($con,$_POST['image']);
		$price=mysqli_real_escape_string($con,$_POST['price']);

	
		
		mysqli_query($con,"insert into wishlist(user_id,book_name,image,price) values('$user_id','$book_name','$image','$price')");
		


	}
		
		?>

     <input type="hidden" name="book_id" value="
		<?php 
		if(isset($_GET['book_id']) && $_GET['book_id']!=''){
		$book_id=mysqli_real_escape_string($con,$_GET['book_id']);

		echo $book_id ;
		}
		?>">	
		      <input type="number" name="quantity"  min="1" value="1"  style="width:50px;">

			<button type="submit" name="cart" class="btn btn-primary">Add to cart</button>


      <a href='?action=wishlist&book_id=<?php echo $row['book_id'] ?>'><button type="submit" name="wishlist" class="btn btn-primary">Add to wishlist</button></a>
	  	<input type="hidden" name="user_id" class="form-control"  required value="<?php echo $user_row['user_id'] ?>"> 
		<input type="hidden" name="book_name" class="form-control"  required value="<?php echo $book_row['book_name'] ?>"> 
		<input type="hidden" name="image" class="form-control"  required value="<?php echo $book_row['image'] ?>"> 
		<input type="hidden" name="price" class="form-control"  required value="<?php echo $book_row['price']; ?>"> 

<?php }
else{ ?>
		<input type="hidden" name="book_id" value="
		<?php 
		if(isset($_GET['book_id']) && $_GET['book_id']!=''){
		$book_id=mysqli_real_escape_string($con,$_GET['book_id']);

		echo $book_id ;
		}
		?>">
		      <input type="number" name="quantity"  min="1" value="1"  style="width:50px;">

		<button type="submit" name="cart" class="btn btn-primary">Add to cart</button>


<?php }

?>
		  


		<br>
		
		</form>
		<br>

	
        <p class="card-text" ><?php echo $row['description'] ?></p>
       
      </div>
    </div>
  </div>
</div>
</div>







<?php require 'footer.php'?>