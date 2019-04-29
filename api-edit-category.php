 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['cat_id'])&& isset($_POST['cat_name']) && isset($_POST['cat_imgurl'])) 
{ 
    $cat_id= mysqli_real_escape_string($connection, $_POST['cat_id']);
    $cat_name= mysqli_real_escape_string($connection, $_POST['cat_name']);
    $cat_imgurl= mysqli_real_escape_string($connection, $_POST['cat_imgurl']);
 
$selectquery = mysqli_query($connection, "select * form tbl_category where cat_id = {$cat_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_category set cat_name = '{$cat_name}',cat_imgurl = '{$cat_imgurl}' where cat_id = '{$cat_id}'");
    
if($updatequery)
   {
    $response['flag'] = '1';
     $response["message"] = "Record Upadated";
     }
 else 
     {
     $response['flag'] = '0';
     $response["message"] = "Error in Query";
     }
    }
}
 else
  {
     $response['flag'] = '0';
     $response["message"] = "Required field is missing";  
  }
 echo json_encode($response);



?>



