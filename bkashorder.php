<?php require 'header.php'?>
<?php 
if(!isset($_SESSION['user_login'])){
    die(header("location: 404.php"));
}
?>
<?php
if(isset($_POST['submit'])){
	$user_id=mysqli_real_escape_string($con,$_POST['user_id']);
    $name=mysqli_real_escape_string($con,$_POST['name']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $phone=mysqli_real_escape_string($con,$_POST['phone']);
    $bkash_num=mysqli_real_escape_string($con,$_POST['bkash_num']);
    $tran_id=mysqli_real_escape_string($con,$_POST['tran_id']);
    $category_id=mysqli_real_escape_string($con,$_POST['category_id']);

    
    
    if(isset($_SESSION['cart'])){

        $quantity=array_column($_SESSION['cart'],"quantity");

      
        $book_id=array_column($_SESSION['cart'],"book_id");          
       foreach($book_id as $id){
        foreach($quantity as $qty){


   mysqli_query($con,"insert into book_order_bkash(user_id,book_id,category_id,quantity,name,address,email,phone,bkash_num,tran_id,status) values('$user_id','$id','$category_id','$qty','$name','$address','$email','$phone','$bkash_num','$tran_id','0')");
   
        }
       }


    }


    //mysqli_query($con,"delete from book_order
     //  where order_id not in (
       //   select max(order_id)
        //    from book_order
       //   group by book_id)");
      
    
    
    
    
    
    
    
    

             
             
           unset($_SESSION['cart']); 

         header("Location: myorder.php");
              
       
          
        
}
?>

<br>
<div class="container" style="width:70%; margin:10px auto; background-color: #E9ECEF; padding:30px;">
<center><h4>Fill up the detailes to complete the order</h4></center>
<form method="post">

  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" name="name" placeholder="Enter your name" required>

  <label for="address" class="form-label">Address</label>
  <textarea  class="form-control"  name="address" rows="3" required></textarea>

  <label for="email" class="form-label">Email</label>
  <input type="email" class="form-control"  name="email" placeholder="Enter your e-mail" required>

  <label for="phone" class="form-label">Phone</label>
  <input type="number" class="form-control"  name="phone" placeholder="Enter your phone" required>

  <label for="bkash_num" class="form-label">Bkash number</label>
  <input type="text" class="form-control"  name="bkash_num" placeholder="Enter your Bkash number" required>

  <label for="tran_id" class="form-label">Transaction Id</label>
  <input type="number" class="form-control"  name="tran_id" placeholder="Enter your Transaction Id" required>

  <input type="hidden" class="form-control"  name="user_id" value="<?php  
   if(isset( $_SESSION['user_login'])){
    $email=$_SESSION['email'];
    $result=mysqli_query($con,"select * from user where email='$email' ");
    $row=mysqli_fetch_assoc($result);
    echo $row['user_id'];
    
   }
  ?>" required>

  <input type="hidden" class="form-control"  name="book_id" value="<?php
       if(isset( $_SESSION['cart'])){
        $book_id=array_column($_SESSION['cart'],"book_id");            
         foreach($book_id as $id){
             echo "$id"."<br>";
         }

        
        
       }
  ?>" required>
  
    <input type="hidden" class="form-control"  name="category_id" value="<?php
       if(isset( $_SESSION['cart'])){
        $category_id=array_column($_SESSION['cart'],"category_id");            
         foreach($category_id as $id){
             echo "$id"."<br>";
         }

        
        
       }
  ?>" required>

  
  <input type="hidden" class="form-control"  name="quantity" value="<?php
     if(isset( $_SESSION['cart'])){
        $quantity=array_column($_SESSION['cart'],"quantity");            
         foreach($quantity as $id){
             echo "$id"."<br>";
         }

        
        
       }
  ?>" required>
  
  


  <br>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>




</form>
</div>
<br>





<?php require 'footer.php'?>