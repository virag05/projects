 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['ven_inq_id'])&& isset($_POST['ven_id'])&& isset($_POST['user_id'])&& isset($_POST['date'])&& isset($_POST['slot_id'])&& isset($_POST['status'])) 
{    
    $ven_inq_id= mysqli_real_escape_string($connection, $_POST['ven_inq_id']);
    $ven_id= mysqli_real_escape_string($connection, $_POST['ven_id']);
    $user_id= mysqli_real_escape_string($connection, $_POST['user_id']);
    $date= mysqli_real_escape_string($connection, $_POST['date']);
    $slot_id= mysqli_real_escape_string($connection, $_POST['slot_id']);
    $status= mysqli_real_escape_string($connection, $_POST['status']);
 
$selectquery = mysqli_query($connection, "select * form tbl_venue_inquiry where ven_inq_id = {$ven_inq_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_venue_inquiry set ven_id = '{$ven_id}',user_id = '{$user_id}',date = '{$date}', slot_id = '{$slot_id}', status = '{$status}' where ven_inq_id = '{$ven_inq_id}'");
    
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



