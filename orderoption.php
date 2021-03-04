<?php require 'header.php'?>
<?php 
if(!isset($_SESSION['user_login'])){
    die(header("location: 404.php"));
}
?>
<div class="container">
<center><h1 >Payment option</h1><center>
<div style="    background-color: #E9ECEF;
    width: 150px;
    height: 100px;
    
   margin: 30px auto;
    text-align:center;">
   <a href="order.php"><h3>Cash on delivery</h3></a>
    
    </div>


    <div style="    background-color: #E9ECEF;
    width: 150px;
    height: 100px;
    
    
   margin: 30px auto;
    text-align:center;">
     <a href="bkashorderdetailes.php"><h3>Bkash payment</h3></a>
    
    </div>

</div>



<?php require 'footer.php'?>