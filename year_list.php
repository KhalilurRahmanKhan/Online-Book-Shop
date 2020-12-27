<?php require 'header.php'?>
<?php
	$result=mysqli_query($con,"select DISTINCT publishing_year from book");
   
		 
?>


<br><br>
<div class="container">

<?php 
 while($row=mysqli_fetch_assoc($result)){ ?>

    <a href="year.php?year=<?php echo $row['publishing_year']?>"><div style="
    height: 53px;
    width: 30%;
    float: left;
    background-color: #E9ECC8;
    text-align: center;
    border:2px solid #E9EB6E"><?php echo $row['publishing_year']; ?></div></a>

    

<?php }
?>
  <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> <br><br>

</div>


















<?php require 'footer.php'?>