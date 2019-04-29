 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['sub_id'])&& isset($_POST['sub_name'])&& isset($_POST['cat_id'])&& isset($_POST['sub_imgurl'])) 
{    
    $sub_id= mysqli_real_escape_string($connection, $_POST['sub_id']);
    $sub_name= mysqli_real_escape_string($connection, $_POST['sub_name']);
    $cat_id= mysqli_real_escape_string($connection, $_POST['cat_id']);
    $sub_imgurl= mysqli_real_escape_string($connection, $_POST['sub_imgurl']);
 
$selectquery = mysqli_query($connection, "select * form tbl_sub_category where sub_id = {$sub_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_sub_category set sub_name = '{$sub_name}', cat_id = '{$cat_id}', sub_imgurl = '{$sub_imgurl}' where sub_id = '{$sub_id}'");
    
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



