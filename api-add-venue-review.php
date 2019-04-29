<?php
require './class/myclass.php';

$response = array();

if(isset($_POST['review']) && isset($_POST['ven']) && isset($_POST['user']))

{
    $review= mysqli_real_escape_string($connection, $_POST['review']);
    $ven= mysqli_real_escape_string($connection, $_POST['ven']);
    $user= mysqli_real_escape_string($connection, $_POST['user']);
   
   $query = mysqli_query($connection,"insert into tbl_venue_review(review,ven_id,user_id)values('{$review}','{$ven}','{$user}')")or die(mysqli_error($connection));

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