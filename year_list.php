<?php require 'header.php'?>
<?php
	$result=mysqli_query($con,"select DISTINCT publishing_year from book");
   
		 
?>




<div class="container"style="width:53%;  margin:20px auto; background-color: #E9ECEF; padding:30px; text-align:cener;">
<?php 
 while($row=mysqli_fetch_assoc($result)){ ?>

    <a href="year.php?year=<?php echo $row['publishing_year']?>" style="    font-size: 40px;
    margin: 10px;
    padding: 10px;"><?php echo $row['publishing_year']; ?></a>
    
 
   
<?php }
?>

</div>


















<?php require 'footer.php'?>