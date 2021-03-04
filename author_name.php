<?php require 'header.php'?>
<?php
	$result=mysqli_query($con,"select DISTINCT author from book");
  		
		 
?>



<div class="container"style="width:70%; margin:10px auto; background-color: #E9ECEF; padding:30px;">
<ul class="list-group">
<?php 
 while($row=mysqli_fetch_assoc($result)){ ?>
    <a href="author.php?author=<?php echo $row['author']?>" style="text-decoration:none;"><li class="list-group-item"><?php echo $row['author']; ?></li></a>

<?php }
?>
  
</ul>
</div>


























<?php require 'footer.php'?>