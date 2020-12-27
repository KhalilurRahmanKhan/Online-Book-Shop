<?php require 'include/connection.inc.php'?>


<?php


require '../vendor/autoload.php';








  
$html='<h4 style="text-align:center;">Customer receipt</h4>


<p style="text-align:center;">Online Book Shop</p>';

if(isset($_GET['user_id']) && $_GET['user_id']!=''){
    $user_id=mysqli_real_escape_string($con,$_GET['user_id']);
  
  
  
  $sql="select * from book_order where user_id=$user_id";
  
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  }

$html.='<b>Customer name: <span style="font-weight:normal;">'.$row['name'].'</span></b><br>
<b>Address: <span style="font-weight:normal;">'.$row['address'].'</span></b><br>
<b>Phone: <span style="font-weight:normal;">'.$row['phone'].'</span></b><br><br>



<table class="table"  style=" border: 1px solid black; width:100%; text-align:center;">
<br><br>
  <thead>
  <tr>
      <th scope="col">Book name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>

    
      

    </tr>
  </thead>
  <tbody>';
  $total=0;
  if(isset($_GET['user_id']) && $_GET['user_id']!=''){
    $user_id=mysqli_real_escape_string($con,$_GET['user_id']);
  
  
  
  $sql="select * from book_order where user_id=$user_id";
  
  $result=mysqli_query($con,$sql);
  }
  while ($row = mysqli_fetch_assoc($result)) {

  $html.='<tr>'; 
       $book_id=$row['book_id'] ;
       $book_result=mysqli_query($con,"select * from book where book_id=$book_id ");
       $book_row = mysqli_fetch_assoc($book_result);
       $html.='<td scope="col">
        '.$book_row['book_name'].'
      </td>
      <td scope="col">'.$row['quantity'].'</td>
      ';
        $price=$row['quantity']*$book_row['price'];
       
          $total=$total+$price;
          $date=date("Y/m/d");
		$pt=array(
			'price'=>$price,
            'total'=>$total,
            'date'=>$date

        );
      $html.='<td scope="col">'.$pt['price'].'</td>
     
     
    </tr>';

   } 

   

 $html.=' </tbody>
</table>
<br><br><br>
<h5>Total: '.$pt['total'].'</h5>


<br><br><br>
<b>Signature:</b>
<br><br>
<b>Date: '.$pt['date'].'</b>'; 



$mpdf= new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file=time().'.pdf';
$mpdf->output($file,'I');

?>