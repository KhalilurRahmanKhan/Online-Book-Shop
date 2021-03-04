<?php require 'template.php'?>

<?php require 'include/connection.inc.php'?>
<?php



if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con,$_GET['type']);

  if($type=="status"){
 
$operation=mysqli_real_escape_string($con,$_GET['operation']);
$id=mysqli_real_escape_string($con,$_GET['id']);
if($operation=="pending"){
  $status=1;
}
else{
  $status=0;
}

$status_sql="update book_order_bkash set status='$status' where id='$id'";
mysqli_query($con,$status_sql);
  }

if($type=="delete"){
 
  $id=mysqli_real_escape_string($con,$_GET['id']);
 
  $delete_sql="delete from book_order_bkash where id='$id'";
  mysqli_query($con,$delete_sql);
    }
  
}
  



$sql="select * from book_order_bkash";

$result=mysqli_query($con,$sql);

?>




<div class="container"  style="width: 70%;" style="float:right;">

<h1>Payment on bkash</h1>


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
      <th scope="col">Bkash number</th> 
      <th scope="col">Transaction Id</th> 
      <th scope="col">Status</th> 
      <th scope="col">Operation</th> 

      

    </tr>
  </thead>
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php echo "<a href='order_detailes_bkash.php?user_id=".$row['user_id']."'>".$row['user_id']."</a>" ;?></td>
      <td scope="col"><?php echo $row['book_id']; ?></td>
      <td scope="col"><?php echo $row['quantity']; ?></td>
      <td scope="col"><?php 
         $book_id=$row['book_id'];
        $sql="select * from book where book_id=$book_id";

        $res=mysqli_fetch_assoc(mysqli_query($con,$sql));
      echo $res['price']; ?></td>
      <td scope="col"><?php echo "name" ?></td>

      <td scope="col"><?php echo $row['address']; ?></td>

      <td scope="col"><?php echo $row['phone']; ?></td>
      <td scope="col"><?php echo $row['bkash_num']; ?></td>
      <td scope="col"><?php echo $row['tran_id']; ?></td>
   
      <td scope="col">
      <?php 
      if($row['status']==1){
        echo "<a href='?type=status&operation=complete&id=".$row['id']."' > Complete </a>";
      }
      else{
        echo "<a href='?type=status&operation=pending&id=".$row['id']."' > Pending </a>";
      }

      ?>
      
      
      </td>
      <td scope="col">    
      <?php echo "<a href='?type=delete&id=".$row['id']."' > Delete </a>"; ?>

      </td>
    </tr>

  <?php } ?>

   
  </tbody>
</table>


</div>
