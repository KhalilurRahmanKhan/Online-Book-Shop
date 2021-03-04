<?php require 'header.php'?>

<?php
$new_book=mysqli_query($con,"select * from book where status=1 and quantity>0 order by book_id desc limit 6");
?>


	 


	  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img src="images/1.jpg" class="d-block w-100" alt="...">
		  </div>
		  <div class="carousel-item">
			<img src="images/2.jpg" class="d-block w-100" alt="...">
		  </div>
		  <div class="carousel-item">
			<img src="images/3.jpg" class="d-block w-100" alt="...">
		  </div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	</div>





<div class="container">
	<hr><hr>
	
	<center><h4>New arrivals</h4></center>
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