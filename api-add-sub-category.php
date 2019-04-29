<?php
require './class/myclass.php';

$response = array();

if(isset($_POST['aname']))
{
    $subname= mysqli_real_escape_string($connection, $_POST['subname']);
    $cat= mysqli_real_escape_string($connection, $_POST['cat']);
    $subimgurl= mysqli_real_escape_string($connection, $_POST['subimgurl']);
    
   $query = mysqli_query($connection,"insert into tbl_sub_category(sub_name,cat_id,sub_imgurl)values('{$subname}','{$cat}','{$subimgurl}')")or die(mysqli_error($connection));

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