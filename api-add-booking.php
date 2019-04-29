<?php
require './class/myclass.php';

$response = array();
if(isset($_POST['date']) && isset($_POST['slot_id']))

{
    $date= mysqli_real_escape_string($connection, $_POST['date']);
  
    $slot= mysqli_real_escape_string($connection, $_POST['slot_id']);
 
    
   $query = mysqli_query($connection,"insert into tbl_booking(date,slot_id)values('{$date}','{$slot}')")or die(mysqli_error($connection));
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
