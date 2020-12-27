<?php require 'template.php'?>

<?php require 'include/connection.inc.php'?>
<?php



if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con,$_GET['type']);

  if($type=="status"){
 
$operation=mysqli_real_escape_string($con,$_GET['operation']);
$book_id=mysqli_real_escape_string($con,$_GET['book_id']);
if($operation=="active"){
  $status=1;
}
else{
  $status=0;
}

$status_sql="update book set status='$status' where book_id='$book_id'";
mysqli_query($con,$status_sql);
  }

if($type=="delete"){
 
  $book_id=mysqli_real_escape_string($con,$_GET['book_id']);
 
  $delete_sql="delete from book where book_id='$book_id'";
  mysqli_query($con,$delete_sql);
    }
  
}
  



$sql="select book.*,category.category_name from book,category where book.category_id=category.category_id order by book.book_id desc";

$result=mysqli_query($con,$sql);

?>




<div class="container"  style="width: 70%;" style="float:right;">

<h1>Book</h1>
<h4><a href="manage_book.php
" >Add </a></h4>
<br>


<table class="table">
  <thead>
  <tr>
      <th scope="col">Id</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th> 
      <th scope="col">Author</th> 
      <th scope="col">Year</th> 

      <th scope="col">Price</th> 
      <th scope="col">Quantity</th> 
 
      <th scope="col">Status</th> 
      <th scope="col">Operation</th> 

      

    </tr>
  </thead>
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php echo $row['book_id'] ;?></td>
      <td scope="col"><?php echo $row['category_name']; ?></td>
      <td scope="col"><?php echo $row['book_name']; ?></td>
      <td scope="col"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']; ?>" width="30px" heigth="30px"></td>
      <td scope="col"><?php echo $row['author']; ?></td>
      <td scope="col"><?php echo $row['publishing_year']; ?></td>

      <td scope="col"><?php echo $row['price']; ?></td>
      <td scope="col"><?php echo $row['quantity']; ?></td>
     
      
   
      <td scope="col">
      <?php 
      if($row['status']==1){
        echo "<a href='?type=status&operation=deactive&book_id=".$row['book_id']."' > Active </a>";
      }
      else{
        echo "<a href='?type=status&operation=active&book_id=".$row['book_id']."' > Deactive </a>";
      }

      ?>
      
      
      </td>
      <td scope="col">    
      <?php echo "<a href='manage_book.php?book_id=".$row['book_id']."' > Edit </a>"; ?>|| 
      <?php echo "<a href='?type=delete&book_id=".$row['book_id']."' > Delete </a>"; ?>

      </td>
    </tr>

  <?php } ?>

   
  </tbody>
</table>


</div>
