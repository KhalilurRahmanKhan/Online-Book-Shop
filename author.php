<?php require 'header.php'?>
<?php
if(isset($_GET['author']) && $_GET['author']!=''){
    $author=mysqli_real_escape_string($con,$_GET['author']);
    $result=mysqli_query($con,"select * from book where author='$author'");
    $row=mysqli_fetch_assoc($result);
}
  	
		 
?>


<div class="container">
	<hr><hr>
    <center><h4>Book by <?php echo $row['author'] ?></h4></center>

	<br>

	<div class="row row-cols-1 row-cols-md-3 g-4">
	<?php while($row=mysqli_fetch_assoc($result)){ ?>

		<div class="col">
		  <div class="card">
			<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" class="card-img-top" alt="..."   height="200">
			<div class="card-body">
			  <h5 class="card-title"><?php echo $row['book_name'] ?></h5>
			  <p class="card-text"><?php echo $row['title'] ?></p>
			  <a href="book.php?book_id=<?php echo $row['book_id'] ?>" class="btn btn-primary">Details</a>
			</div>
		  </div>
		</div>

	<?php } ?>
		
	
		
		
	  </div>
	  <br>
	 
</div>
<br>



























<?php require 'footer.php'?>