<?php require 'template.php'?>
<?php require 'include/connection.inc.php'?>

<?php
 $total=0;
 $total_book=0;


$book=mysqli_num_rows(mysqli_query($con,"select * from book"));
$user=mysqli_num_rows(mysqli_query($con,"select * from user"));

$contact=mysqli_num_rows(mysqli_query($con,"select * from contact"));
$wishlist=mysqli_num_rows(mysqli_query($con,"select * from wishlist"));

?>



   
 
  <div class="container"  style="width: 55%;" style="float:right;">
  <h1>Home</h1>
    


    <div style="    background-color: #343A40;
    width: 150px;
    height: 100px;
    float: left;
    color:white;
    margin:10px;
    text-align:center;">
    Book:
    <?php echo "<h1>$book</h1>"; ?>
    </div>
    
    <div style="    background-color: #343A40;
    width: 150px;
    height: 100px;
    float: left;
    color:white;margin:10px;text-align:center;">
    User
    <?php echo "<h1>$user</h1>"; ?>
    </div>
    <div style="    background-color: #343A40;
    width: 150px;
    height: 100px;
    float: left;
    color:white;margin:10px;text-align:center;">
    Contact
    <?php echo "<h1>$contact</h1>"; ?>
    </div>
    <div style="    background-color: #343A40;
    width: 150px;
    height: 100px;
    float: left;
    color:white;margin:10px;text-align:center;">
    Wishlist
    <?php echo "<h1>$wishlist</h1>"; ?>
    </div>
    <br><br><br><br>
    <br><br><br><br>

    <div>
    <form method="post">
    <b>Starting date: </b><input type="date" name="start" >
    <b>Ending  date: </b><input type="date" name="end" >&nbsp;&nbsp;&nbsp;
    <input type="submit" value="Generate report" name="report">
    </form>
    </div>
    <br>

    <div>
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
    
      

    </tr>
  </thead>
  <tbody>

  <?php 
  if(isset($_POST['report'])){
    $start=mysqli_real_escape_string($con,$_POST['start']);
    $end=mysqli_real_escape_string($con,$_POST['end']);

    function database_formatted_date($value)
    {
        $date = null; 
        
        if ($value) {
            $date = date('Y-m-d h:i:s', strtotime($value));
        }

        return $date;
    }
    $start=database_formatted_date($start);
    $end=database_formatted_date($end);
   

    $sql = "select * from book_order where book_order.time between '$start' and '$end' ";
    $res=mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($res)) {
  
      
   ?>

  <tr>
      <td scope="col"><?php echo $row['user_id']; ?></td>
      <td scope="col"><?php echo $row['book_id']; 
     
      	
		   
      
      ?></td>
      <td scope="col"><?php 
      
      $qty=$row['quantity'];
      $total_book=$total_book+$qty;
      echo $row['quantity']; ?></td>

      <td scope="col"><?php 
     
      $book_id=$row['book_id'];
      $rowp=mysqli_fetch_assoc(mysqli_query($con,"select * from book where book_id=$book_id"));

       $price=$rowp['price'];
       $total=$total+$price*$qty;
       echo $rowp['price'];
       ?></td>
      <td scope="col"><?php echo $row['name']; ?></td>
      <td scope="col"><?php echo $row['address']; ?></td>
      <td scope="col"><?php echo $row['phone']; ?></td>
    
    </tr>

  <?php }
  }
   ?>

   
  </tbody>
  
  </div>
    <div style="    background-color: #343A40;    margin-left: 140px !important;
    width: 200px;
    height: 200px;
    float: left;
    color:white;margin:10px;text-align:center;border-radius:50%;"><br><br>
    Total price:
    <?php echo "<h1>$total tk</h1>"; ?>
    </div>

    <div style="    background-color: #343A40;
    width: 200px;
    height: 200px;
    float: left;
    color:white;margin:10px;text-align:center;border-radius:50%;"><br><br>
    Total book:
    <?php echo "<h1>$total_book </h1>"; ?>
    </div> 
    
</table>
    
    </div>

  
    </div>
 


   
  