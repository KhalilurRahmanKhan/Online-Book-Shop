<?php require 'template.php'?>

<?php require 'include/connection.inc.php'?>
<?php



if(isset($_GET['type']) && $_GET['type']!=''){
  $type=mysqli_real_escape_string($con,$_GET['type']);


if($type=="delete"){
 
  $contact_id=mysqli_real_escape_string($con,$_GET['contact_id']);
 
  $delete_sql="delete from contact where contact_id='$contact_id'";
  mysqli_query($con,$delete_sql);
    }
  
}
  



$sql="select * from contact order by name desc";

$result=mysqli_query($con,$sql);

?>




<div class="container"  style="width: 70%;" style="float:right;">

<h1>Contact</h1>


<table class="table">
  <thead>
  <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Phone</th>
      <th scope="col">Comment</th>
      <th scope="col">Operation</th> 
      

    </tr>
  </thead>
  <tbody>

  <?php while ($row = mysqli_fetch_assoc($result)) { ?>

  <tr>
      <td scope="col"><?php echo $row['contact_id'] ;?></td>
      <td scope="col"><?php echo $row['name']; ?></td>
      <td scope="col"><?php echo $row['email']; ?></td>
      <td scope="col"><?php echo $row['phone']; ?></td>
      <td scope="col"><?php echo $row['comment']; ?></td>
      <td scope="col">    
      <?php echo "<a href='?type=delete&contact_id=".$row['contact_id']."' > Delete </a>"; ?>

      </td>
    </tr>

  <?php } ?>

   
  </tbody>
</table>


</div>
