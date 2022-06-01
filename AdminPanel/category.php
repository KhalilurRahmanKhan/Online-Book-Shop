<?php require 'template.php'?>

<?php require 'include/connection.inc.php'?>
<?php



if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con,$_GET['type']);

  if($type=="status"){
 
$operation=mysqli_real_escape_string($con,$_GET['operation']);
$category_id=mysqli_real_escape_string($con,$_GET['category_id']);
if($operation=="active"){
  $status=1;
}
else{
  $status=0;
}

$status_sql="update category set status='$status' where category_id='$category_id'";
mysqli_query($con,$status_sql);
  }

if($type=="delete"){
 
  $category_id=mysqli_real_escape_string($con,$_GET['category_id']);
 
  $delete_sql="delete from category where category_id='$category_id'";
  mysqli_query($con,$delete_sql);
    }
  
}
  



$sql="select * from category order by category_name asc";

$result=mysqli_query($con,$sql);

?>




<div class="container"  style="width: 70%;" style="float:right;">

<h1>Category</h1>
<h4><a href="manage_category.php
" >Add </a></h4>
<br>

<table class="table">
  <thead>
  <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Operation</th> 
      

    </tr>
  </thead>
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php echo $row['category_id'] ;?></td>
      <td scope="col"><?php echo $row['category_name']; ?></td>
      <td scope="col">
      <?php 
      if($row['status']==1){
        echo "<a href='?type=status&operation=deactive&category_id=".$row['category_id']."' > Active </a>";
      }
      else{
        echo "<a href='?type=status&operation=active&category_id=".$row['category_id']."' > Deactive </a>";
      }

      ?>
      
      
      </td>
      <td scope="col">    
      <?php echo "<a href='manage_category.php?category_id=".$row['category_id']."' > Edit </a>"; ?>|| 
      <?php echo "<a href='?type=delete&category_id=".$row['category_id']."' > Delete </a>"; ?>

      </td>
    </tr>

  <?php } ?>

   
  </tbody>
</table>


</div>
