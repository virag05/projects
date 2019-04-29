<?php
require './class/myclass.php';

$response = array();
if(isset($_POST['catname']) && isset($_POST['catimgurl']))
{
    $catname= mysqli_real_escape_string($connection, $_POST['catname']);
    $catimgurl= mysqli_real_escape_string($connection, $_POST['catimgurl']);
   
    
   $query = mysqli_query($connection,"insert into tbl_category(cat_name,cat_imgurl)values('{$catname}','{$catimgurl}')")or die(mysqli_error($connection));

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

?>