<?php require 'template.php'?>

<?php require 'include/connection.inc.php'?>
<?php



if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con,$_GET['type']);

  if($type=="status"){
 
$operation=mysqli_real_escape_string($con,$_GET['operation']);
$order_id=mysqli_real_escape_string($con,$_GET['order_id']);
if($operation=="pending"){
  $status=1;
}
else{
  $status=0;
}

$status_sql="update book_order set status='$status' where order_id='$order_id'";
mysqli_query($con,$status_sql);
  }

if($type=="delete"){
 
  $order_id=mysqli_real_escape_string($con,$_GET['order_id']);
 
  $delete_sql="delete from book_order where order_id='$order_id'";
  mysqli_query($con,$delete_sql);
    }
  
}
  



$sql="select * from book_order";

$result=mysqli_query($con,$sql);

?>




<div class="container"  style="width: 70%;" style="float:right;">

<h1>Order</h1>

<br>


<table class="table">
  <thead>
  <tr>
      <th scope="col">User ID</th>
      <th scope="col">Book ID</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th> 
      <th scope="col">Customer name</th> 
      <th scope="col">Address</th> 
      <th scope="col">Phone</th>  
      <th scope="col">Status</th> 
      <th scope="col">Operation</th> 

      

    </tr>
  </thead>
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php echo "<a href='order_detailes.php?user_id=".$row['user_id']."'>".$row['user_id']."</a>" ;?></td>
      <td scope="col"><?php echo $row['book_id']; ?></td>
      <td scope="col"><?php echo $row['quantity']; ?></td>
      <td scope="col"><?php echo "price" ?></td>
      <td scope="col"><?php echo "name" ?></td>

      <td scope="col"><?php echo $row['address']; ?></td>

      <td scope="col"><?php echo $row['phone']; ?></td>
     
      
   
      <td scope="col">
      <?php 
      if($row['status']==1){
        echo "<a href='?type=status&operation=complete&order_id=".$row['order_id']."' > Complete </a>";
      }
      else{
        echo "<a href='?type=status&operation=pending&order_id=".$row['order_id']."' > Pending </a>";
      }

      ?>
      
      
      </td>
      <td scope="col">    
      <?php echo "<a href='?type=delete&order_id=".$row['order_id']."' > Delete </a>"; ?>

      </td>
    </tr>

  <?php } ?>

   
  </tbody>
</table>


</div>
