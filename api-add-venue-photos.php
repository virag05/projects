<?php

require './class/myclass.php';

$response = array();

if(isset($_POST['ven']) && isset($_POST['ppath']))
    
{
    $ven= mysqli_real_escape_string($connection, $_POST['ven']);
    $ppath= mysqli_real_escape_string($connection, $_POST['ppath']);
 
    
   $query = mysqli_query($connection,"insert into tbl_venue_photos(ven_id,photopath)values('{$ven}','{$ppath}')")or die(mysqli_error($connection));
   
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
 