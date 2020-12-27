<?php require 'header.php'?>
<?php
	$result=mysqli_query($con,"select DISTINCT author from book");
  		
		 
?>

<br><br><br>

<div class="container">
<ul class="list-group">
<?php 
 while($row=mysqli_fetch_assoc($result)){ ?>
    <a href="author.php?author=<?php echo $row['author']?>" style="text-decoration:none;"><li class="list-group-item"><?php echo $row['author']; ?></li></a>

<?php }
?>
  
</ul>
</div>





















<br><br><br>





<?php require 'footer.php'?>