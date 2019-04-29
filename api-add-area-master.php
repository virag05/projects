<?php   
require './class/myclass.php';

$response = array();

if(isset($_POST['aname']))
{
    $aname= mysqli_real_escape_string($connection, $_POST['aname']);
   
    $query = mysqli_query($connection,"insert into tbl_area_master(area_name)values('{$aname}')")or die(mysqli_error($connection));

    
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