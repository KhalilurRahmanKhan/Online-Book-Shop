<?php require 'template.php'?>

<?php require 'include/connection.inc.php'?>
<?php



if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con,$_GET['type']);


if($type=="delete"){
 
  $user_id=mysqli_real_escape_string($con,$_GET['user_id']);
 
  $delete_sql="delete from user where user_id='$user_id'";
  mysqli_query($con,$delete_sql);
    }
  
}
  



$sql="select * from user order by user_name desc";

$result=mysqli_query($con,$sql);

?>




<div class="container"  style="width: 70%;" style="float:right;">

<h1>User</h1>


<table class="table">
  <thead>
  <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone</th>
      <th scope="col">Operation</th> 
      

    </tr>
  </thead>
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php echo $row['user_id'] ;?></td>
      <td scope="col"><?php echo $row['user_name']; ?></td>
      <td scope="col"><?php echo $row['email']; ?></td>
      <td scope="col"><?php echo $row['phone']; ?></td>
     
      <td scope="col">    
      <?php echo "<a href='?type=delete&user_id=".$row['user_id']."' > Delete </a>"; ?>

      </td>
    </tr>

  <?php } ?>

   
  </tbody>
</table>


</div>
