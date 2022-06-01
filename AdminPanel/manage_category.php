<?php require 'template.php'?>
<?php
require 'include/connection.inc.php';
$msg='';
$category_name='';
if(isset($_GET['category_id']) && $_GET['category_id']!=''){
    $category_id=mysqli_real_escape_string($con,$_GET['category_id']);
    $result=mysqli_query($con,"select * from category where category_id='$category_id'");
    $check=mysqli_num_rows($result);
    if($check>0){
        $row=mysqli_fetch_assoc($result);
        $category_name=$row['category_name'];
    }
    else{
        header('location:category.php');
    }
   
    
}

if(isset($_POST['submit'])){
    $category_name=mysqli_real_escape_string($con,$_POST['category_name']);

    $result=mysqli_query($con,"select * from category where category_name='$category_name'");
    $check=mysqli_num_rows($result);
    if($check>0){
        if(isset($_GET['category_id']) && $_GET['category_id']!=''){

        $row=mysqli_fetch_assoc($result);
        if($category_id!=$row['category_id']){
            $msg=true;
        }
        else{
            header('location:category.php');

        }
    }
    else{
        $msg=true;
    }
        
    }
    else{
        if(isset($_GET['category_id']) && $_GET['category_id']!=''){
            mysqli_query($con,"update category set category_name='$category_name' where category_id='$category_id' ");
    
        }
        else{
            mysqli_query($con,"insert into category(category_name,status) values('$category_name','1')");
        }
        header('location:category.php');
    }


}






?>


<div class="container"  style="width: 65%;">

<form method="post">
<br><br>
<div class="form-group">
    <label for="name">Catagory name</label>
    <input type="text" name="category_name" class="form-control" id="name" required value="<?php echo $category_name; ?>"> 
</div>
<?php 
    if($msg){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Category alreadt exists
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       </div>';
    }
  ?>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
</div>