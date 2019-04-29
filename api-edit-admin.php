 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['admin_id'])&& isset($_POST['admin_email']) && isset($_POST['admin_pass']))
    
    $admin_id= mysqli_real_escape_string($connection, $_POST['admin_id']);
    $admin_email= mysqli_real_escape_string($connection, $_POST['admin_email']);
    $admin_pass= mysqli_real_escape_string($connection, $_POST['admin_pass']);
 
$selectquery = mysqli_query($connection, "select * from tbl_admin where admin_id = {$admin_id} ") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_admin set admin_email = '{$admin_email}',admin_pass = '{$admin_pass}' where admin_id = '{$admin_id}'");
    
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
 else
  {
     $response['flag'] = '0';
     $response["message"] = "Required field is missing";  
  }
 echo json_encode($response);



?>



