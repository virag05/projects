<?php
require './class/myclass.php';

$response = array();
if(isset($_POST['ven']) && isset($_POST['user']) && isset($_POST['date']) && isset($_POST['slot']) && isset($_POST['status']))
{
    $ven= mysqli_real_escape_string($connection, $_POST['ven']);
    $user= mysqli_real_escape_string($connection, $_POST['user']);
    $date= mysqli_real_escape_string($connection, $_POST['date']);
    $slot= mysqli_real_escape_string($connection, $_POST['slot']);
    $status= mysqli_real_escape_string($connection, $_POST['status']);
    
   $query = mysqli_query($connection,"insert into tbl_venue_inquiry(ven_id,user_id,date,slot_id,status)values('{$ven}','{$user}','{$date}','{$slot}','{$status}')")or die(mysqli_error($connection));

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