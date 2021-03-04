<?php require 'header.php'?>

<?php 
if(!isset($_SESSION['user_login'])){
    die(header("location: 404.php"));
}
?>

<?php



if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con,$_GET['type']);


if($type=="delete"){
 
  $book_id=mysqli_real_escape_string($con,$_GET['book_id']);
 
  $delete_sql="delete from wishlist where book_id='$book_id'";
  mysqli_query($con,$delete_sql);

    }
    header('Location: wishlist.php');

}
  



$sql="select * from wishlist order by book_id desc";

$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);


?>




<div class="container"  style="width: 70%;" style="float:right;">

<h1>Wishlist</h1>


<table class="table">
  <thead>
  <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">price</th>
      <th scope="col">Details</th>
      <th scope="col">Operation</th> 
      

    </tr>
  </thead>
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php echo $row['book_name'] ;?></td>
      <td scope="col">	<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" class="card-img-top" alt="..." style="width:50px; heigth:50px;"> </td>
      <td scope="col"><?php echo $row['price']; ?></td>
      <td scope="col"><a href="book.php?book_id=<?php $book_name=$row['book_name'] ;
      $book_result=mysqli_query($con,"select * from book where book_name='$book_name'");
        $book_row=mysqli_fetch_assoc($book_result);
        echo $book_row['book_id'];?>" class="btn btn-primary">Details</a></td>
      <td scope="col">    
      <?php echo "<a href='?type=delete&book_id=".$row['book_id']."' > Delete </a>"; ?>

      </td>
    </tr>

  <?php } ?>

   
  </tbody>
</table>


</div>




<?php require 'footer.php'?>