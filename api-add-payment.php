<?php
require './class/myclass.php';

$response = array();
if(isset($_POST['booking']) && isset($_POST['amount']) && isset($_POST['grup2']) && isset($_POST['details']))
{
     $booking= mysqli_real_escape_string($connection, $_POST['booking']);
    $amount= mysqli_real_escape_string($connection, $_POST['amount']);
    $grup2= mysqli_real_escape_string($connection, $_POST['grup2']);
    $details= mysqli_real_escape_string($connection, $_POST['details']);
   
    
   $query = mysqli_query($connection,"insert into tbl_payment(booking_id,amount,method,details)values('{$booking}','{$amount}','{$grup2}','{$details}')")or die(mysqli_error($connection));

   if($query)
     {
     $response['flag'] = '1';
     $response["message"] = "Record Inserted";
     }
 else {
         
 
     $response['flag'] = '0';
     $response["message"] = "Error in Query";
 }
 }
 else
  {
     $response['flag'] = '0';
     $response["message"] = "Required field is missing";  
  }
 echo json_encode($response); 

?>
