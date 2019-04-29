 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['slot_id'])&& isset($_POST['slot_name'])) 
{
    $slot_id= mysqli_real_escape_string($connection, $_POST['slot_id']);
    $slot_name= mysqli_real_escape_string($connection, $_POST['slot_name']);
   
 
$selectquery = mysqli_query($connection, "select * form tbl_slot_master where slot_id = {$slot_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_slot_master set slot_name = '{$slot_name}' where slot_id = '{$slot_id}'");
    
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



