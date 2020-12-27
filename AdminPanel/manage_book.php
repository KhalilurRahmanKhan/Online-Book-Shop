<?php require 'template.php'?>
<?php
require 'include/connection.inc.php';
$img_required='required';

$msg='';
$category_id='';
$book_name='';
$author='';
$publishing_year='';

$price='';
$quantity='';

$title='';
$description='';

if(isset($_GET['book_id']) && $_GET['book_id']!=''){
    $book_id=mysqli_real_escape_string($con,$_GET['book_id']);
    $result=mysqli_query($con,"select * from book where book_id='$book_id'");
    $check=mysqli_num_rows($result);
    if($check>0){
        $row=mysqli_fetch_assoc($result);

        $img_required='';

        $cat_id=$row['category_id'];
        $book_name=$row['book_name'];
        $author=$row['author'];
        $publishing_year=$row['publishing_year'];

        $price=$row['price'];
        $quantity=$row['quantity'];
        $title=$row['title'];
        $description=$row['description'];
      
    }
    else{
        header('location:book.php');
    }
   
    
}

if(isset($_POST['submit'])){
    $category_id=mysqli_real_escape_string($con,$_POST['category_id']);
    $book_name=mysqli_real_escape_string($con,$_POST['book_name']);
    $author=mysqli_real_escape_string($con,$_POST['author']);
    $publishing_year=mysqli_real_escape_string($con,$_POST['publishing_year']);
    $price=mysqli_real_escape_string($con,$_POST['price']);
    $quantity=mysqli_real_escape_string($con,$_POST['quantity']);
    $title=mysqli_real_escape_string($con,$_POST['title']);
    $description=mysqli_real_escape_string($con,$_POST['description']);
  
    $result=mysqli_query($con,"select * from book where book_name='$book_name'");
    $check=mysqli_num_rows($result);
    if($check>0){
        if(isset($_GET['book_id']) && $_GET['book_id']!=''){

        $row=mysqli_fetch_assoc($result);
        if($book_id!=$row['book_id']){
            $msg=true;
        }
        else{
            header('location:book.php');

        }
    }
    else{
        $msg=true;
    }
        
    }
    else{
       
        if(isset($_GET['book_id']) && $_GET['book_id']!=''){
            if($_FILES['image']['name']!=''){
                $image=$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$_FILES['image']['name']);
                
                $update_sql="update book set category_id='$category_id',book_name='$book_name',author='$author',publishing_year='$publishing_year',image='$image',price='$price',quantity='$quantity',
                title='$title',description='$description' where book_id='$book_id' ";
            }
            else{
                $update_sql="update book set category_id='$category_id',book_name='$book_name',author='$author',publishing_year='$publishing_year',price='$price',quantity='$quantity',
                title='$title',description='$description' where book_id='$book_id' ";
            }
            mysqli_query($con,$update_sql);
    
        }
        else{
            $image=$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$_FILES['image']['name']);
            mysqli_query($con,"insert into book(category_id,book_name,author,publishing_year,image, price,quantity,title,description,status)
             values('$category_id','$book_name','$author','$publishing_year','$image','$price','$quantity','$title','$description','1')");
    
        }
        header('location:book.php');
    }
   


}










?>


<div class="container"  style="width: 65%;">

<form method="post" enctype="multipart/form-data" >
<br><br>
<div class="form-group">
 <label for="category_id">Category</label>
    <select class="form-control" name="category_id"  required >
       
        <option value="" disabled selected hidden>Select category</option>
        
        <?php
        $sql="select category_id,category_name from category order by category_name asc";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result)){
            if($cat_id==$row['category_id']){
                echo "<option value=".$row['category_id']." selected >".$row['category_name']." </option>";
            }
            else{
                echo "<option value=".$row['category_id']."  >".$row['category_name']." </option>";
            }
           
        }
        
        ?>
        
    </select>
    <label for="book_name">Book</label>
    <input type="text" name="book_name" class="form-control"  required value="<?php echo $book_name; ?>"> 
    <label for="author">Author</label>
    <input type="text" name="author" class="form-control"  required value="<?php echo $author; ?>"> 
    <label for="publishing_year">Year</label>
    <input type="text" name="publishing_year" class="form-control"  required value="<?php echo $publishing_year; ?>"> 
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control"  <?php echo $img_required; ?>> 
    <label for="price">Price</label>
    <input type="text" name="price" class="form-control"  required value="<?php echo $price; ?>"> 
    <label for="quantity">Quantity</label>
    <input type="text" name="quantity" class="form-control"  required value="<?php echo $quantity; ?>"> 
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control"  required value="<?php echo $title; ?>"> 
    <label for="description">Description</label>
    <textarea name="description" class="form-control"  required><?php echo $description; ?></textarea>
    
    
    
</div>
<?php 
    if($msg){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Book already exists
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
       </div>';
    }
  ?>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
</div>