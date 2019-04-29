 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['booking_id'])&& isset($_POST['date'])&& isset($_POST['user_id'])&& isset($_POST['ven_id'])&& isset($_POST['slot_id'])&& isset($_POST['status'])&& isset($_POST['price'])) 
{    
   $booking_id= mysqli_real_escape_string($connection, $_POST['booking_id']);
   $date= mysqli_real_escape_string($connection, $_POST['date']);
   $user_id= mysqli_real_escape_string($connection, $_POST['user_id']);
   $ven_id= mysqli_real_escape_string($connection, $_POST['ven_id']);
   $slot_id= mysqli_real_escape_string($connection, $_POST['slot_id']);
   $status= mysqli_real_escape_string($connection, $_POST['status']);
   $price= mysqli_real_escape_string($connection, $_POST['price']);
 
$selectquery = mysqli_query($connection, "select * form tbl_booking where booking_id = {$booking_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_category set date = '{$date}', user_id = '{$user_id}', ven_id = '{$ven_id}', slot_id = '{$slot_id}', status = '{$status}', price = '{$price}' where booking_id = '{$booking_id}'");
    
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



