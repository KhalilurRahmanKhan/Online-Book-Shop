<?php require 'header.php'?>


<?php
//Delete from cart
if(isset($_SESSION['cart'])){

  if(isset($_GET['action']) && $_GET['action']!=''){
    $action=mysqli_real_escape_string($con,$_GET['action']);
    $book_id=mysqli_real_escape_string($con,$_GET['book_id']);
  
      if($action=='delete'){
  
      foreach($_SESSION['cart'] as $key=>$value){
        if($value['book_id']==$book_id){
          unset($_SESSION['cart'][$key]);
          header('Location: '.$_SERVER['REQUEST_URI']);
  
        }
      }
    }
  }
    
  }
  
  


//order button filter
if(isset($_GET['msg'])){
  $msg=mysqli_real_escape_string($con,$_GET['msg']);
  if($msg=='add'){
echo "Add something to cart";
  }
  else{
    echo "Login to order";

  }

}








?>








<div class="container"  style="width: 70%;" style="float:right;">

<center><h1>Cart</h1></center><br>

<table class="table">
  <thead>
  <tr>
      <th scope="col">Name</th>
      <th scope="col">image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Operation</th> 
      

    </tr>
  </thead>
  <tbody>
  <?php
  $count=0;
  $total=0;
if(isset($_SESSION['cart'])){
  $quantity=array_column($_SESSION['cart'],"quantity");

  $book_id=array_column($_SESSION['cart'],"book_id");
  $result=mysqli_query($con,'select * from book');
  while($row=mysqli_fetch_assoc($result)) { 
    
  foreach($book_id as $id){

    if($row['book_id']==$id){  ?>

  <tr>
 
      <td scope="col"><?php echo $row['book_name'] ?></td>
      <td scope="col">	<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" class="card-img-top" alt="..." style="width:50px; heigth:50px;"> </td>
      <td scope="col">
      <?php 
      $qty=$quantity[$count];
      echo $qty;
      
      ?>
      </td>
      <td scope="col">
      <?php  
      $price=$row['price'];
      $price=$price*$qty;
      echo $price;
      ?>
      </td>
      <td scope="col">    
      
        <a href="?action=delete&book_id=<?php echo $row['book_id'] ?>">Delete</a>
      </td>
    </tr>
  
   
    <?php 
    $total=$total+$price;
    $count++;
    }
    
  }
  }
  
} 
echo "<h4>Total: $total</h4>";

?>


   
  </tbody>
</table>
<hr>



 <a href="<?php
 if(isset($_SESSION['cart'])){
 if(isset( $_SESSION['user_login'])){
  
    $count=count($_SESSION['cart']);
    if($count>0){
     echo "order.php";
    }
  }
  else{
    echo "?msg=login";


  }
 
  
}
else{
  echo "?msg=add";

}

 ?>"><button type="submit" name="order" value="Order" style="float:right;">Order</button></a>



</div>
<br><br>
<br>




<?php require 'footer.php'?>