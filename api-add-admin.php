<?php
require './myclass.php';

$response = array();

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $password= mysqli_real_escape_string($connection, $_POST['password']);
    
   $query = mysqli_query($connection,"insert into tbl_admin(admin_email, admin_pass)values('{$email}','{$pass}')")or die(mysqli_error($connection));

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
  


