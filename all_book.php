<?php require 'header.php'?>

<?php
$new_book=mysqli_query($con,"select * from book where status=1 and quantity>0 order by book_id desc");
?>


	 


	 





<div class="container">
	<hr><hr>
	
	<center><h4></h4></center>
	<br>

	<div class="row row-cols-1 row-cols-md-3 g-4">
	<?php while($row=mysqli_fetch_assoc($new_book)){ ?>

	
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
<br>
	
	





<?php require 'footer.php'?>