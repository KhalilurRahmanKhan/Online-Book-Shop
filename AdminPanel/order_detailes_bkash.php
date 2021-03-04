<?php require 'template.php'?>

<?php require 'include/connection.inc.php'?>



<div class="container"  style="width: 70%;" style="float:right;">
<br>


  
<h4 style="text-align:center;">Customer receipt</h4>


<p style="text-align:center;">Online Book Shop</p>


<?php 


if(isset($_GET['user_id']) && $_GET['user_id']!=''){
  $user_id=mysqli_real_escape_string($con,$_GET['user_id']);



$sql="select * from book_order_bkash where user_id=$user_id";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

}
  echo "<b>Customer name: <span style='font-weight:normal;'>".$row['name']."</span></b><br>";
  echo "<b>Address: <span style='font-weight:normal;'>".$row['address']."</span></b><br>";
  echo "<b>Phone: <span style='font-weight:normal;'>".$row['phone']."</span></b><br>";


?>



<table class="table">
<br><br>
  <thead>
  <tr>
      <th scope="col">Book name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>

    
      

    </tr>
  </thead>
  <tbody>
  <?php 
  $total=0;
  
if(isset($_GET['user_id']) && $_GET['user_id']!=''){
  $user_id=mysqli_real_escape_string($con,$_GET['user_id']);



$sql="select * from book_order_bkash where user_id=$user_id";

$result=mysqli_query($con,$sql);
}

  while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php 
       $book_id=$row['book_id'] ;
       $book_result=mysqli_query($con,"select * from book where book_id=$book_id ");
       $book_row = mysqli_fetch_assoc($book_result);
       echo $book_row['book_name'];
      ?></td>
      <td scope="col"><?php echo $row['quantity']; ?></td>
      <td scope="col"><?php 
        $price=$row['quantity']*$book_row['price'];
        echo $price; 
       
          $total=$total+$price;
      ?></td>
     
     
    </tr>

  <?php } ?>

   
  </tbody>
</table>
<br><br><br>
<h5>Total: <?php echo $total; ?></h5>
<h4>Payment done by Bkash</h4>


<br><br><br>
<b>Signature:</b>
<br><br>
<b>Date:</b> <?php echo date("Y/m/d"); ?>

<br><br><br>
<a href="pdf_bkash.php?user_id=<?php
$sql="select * from book_order_bkash";

$result=mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
echo $row['user_id'];

?>"><button type="submit" >Print</button></a>



