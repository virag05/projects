<?php
require './class/myclass.php';

$response = array();

if(isset($_POST['uname']) && isset($_POST['group1']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['pass']) && isset($_POST['addr']) && isset($_POST['contact_no']))
{
    
    $uname= mysqli_real_escape_string($connection, $_POST['uname']);
    $group1= mysqli_real_escape_string($connection, $_POST['group1']);
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $date= mysqli_real_escape_string($connection, $_POST['date']);
    $pass= mysqli_real_escape_string($connection, $_POST['pass']);
    $addr= mysqli_real_escape_string($connection, $_POST['addr']);
  
    $contact_no= mysqli_real_escape_string($connection, $_POST['contact_no']);
    
   
   
   $query = mysqli_query($connection, "insert into tbl_user(user_name,gender,email,dob,password,address,contact_no)values('{$uname}','{$group1}','{$email}','{$date}','{$pass}','{$addr}','{$contact_no}')")or die(mysqli_error($connection));
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