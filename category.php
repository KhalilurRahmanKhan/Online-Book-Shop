<?php require 'header.php'?>

<?php
if(isset($_GET['category_id']) && $_GET['category_id']!=''){
	$category_id=mysqli_real_escape_string($con,$_GET['category_id']);
	if($category_id>0){
	$result=mysqli_query($con,"select * from book where status=1 and category_id=$category_id order by book_id desc");
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




<?php
$check=mysqli_num_rows($result);
if($check>0){



?>




<div class="container">
	<hr><hr>
	
	<center><h4>
		<?php
		
			$res=mysqli_query($con,"select * from category where category_id=$category_id");
			$row=mysqli_fetch_assoc($res);
			echo $row['category_name'];
		 
		?>
	</h4></center>
	<br>

	<div class="row row-cols-1 row-cols-md-3 g-4">
	<?php while($row=mysqli_fetch_assoc($result)){ ?>

	
		<div class="col">
		  <div class="card">
			<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" class="card-img-top" alt="..."   height="200">
			<div class="card-body">
			  <h5 class="card-title"><?php echo $row['book_name'] ?></h5>
			  <p class="card-text"><?php echo $row['title'] ?></p>
			  <a href="book.php?book_id=<?php echo $row['book_id'] ?>&category_id=<?php echo $row['category_id'] ?>" class="btn btn-primary">Details</a>
			</div>
		  </div>
		</div>

	<?php } ?>
		
	
		
		
	  </div>
	  <br>
	 
</div>

	<?php } 
	
	else{ ?>
		<div style=" height:500px; text-align:center;">
		<br><br><br><br><br>
	<?php	echo "<h1 >Product is out of stock</h1>";  ?>
		</div>
<?php	}
	
	?>




<?php require 'footer.php'?>