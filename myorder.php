<?php require 'header.php'?>
<?php 
if(!isset($_SESSION['user_login'])){
    die(header("location: 404.php"));
}
?>
<?php
if(isset( $_SESSION['user_login'])){
    $email=$_SESSION['email'];
    $result=mysqli_query($con,"select * from user where email='$email' ");
    $row=mysqli_fetch_assoc($result);
    $user_id=$row['user_id'];
    $order_result=mysqli_query($con,"select * from book_order where user_id=$user_id and status='0' ");

    
   }
?>



<div class="container"  style="width: 70%;" style="float:right;">

<h1>Cash on delivery</h1> 
<a href="myorder_bkash.php"><h4 style="float:right">Ordered by bkash</h4></a>


<table class="table">
  <thead>
  <tr>
      
      <th scope="col">Name</th>
      
      <th scope="col">Quantity</th>
      <th scope="col">Price</th> 
      

    </tr>
  </thead>
  <tbody>

  <?php
  $total=0;
  while ($order_row = mysqli_fetch_assoc($order_result)) { ?>

  <tr>
      <td scope="col"><?php
         $book_id=$order_row['book_id'] ;
         $result=mysqli_query($con,"select * from book where book_id=$book_id ");
         $row = mysqli_fetch_assoc($result);
         echo $row['book_name'];
       ?></td>
      <td scope="col"><?php echo $order_row['quantity']; ?></td>

      <td scope="col"><?php
      $price=$order_row['quantity']*$row['price'];
      echo $price; 
     
        $total=$total+$price;
      ?></td>
        

      </td>
    </tr>
  

  <?php } ?>

  <h4>Total: <?php echo $total; ?> </h4>
  </tbody>
</table>


</div>



















<?php require 'footer.php'?>