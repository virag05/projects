 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['payment_id'])&& isset($_POST['booking_id'])&& isset($_POST['amount'])&& isset($_POST['method'])&& isset($_POST['details'])) 
{    
    $payment_id= mysqli_real_escape_string($connection, $_POST['payment_id']);
    $booking_id= mysqli_real_escape_string($connection, $_POST['booking_id']);
    $amount= mysqli_real_escape_string($connection, $_POST['amount']);
    $method= mysqli_real_escape_string($connection, $_POST['method']);
    $details= mysqli_real_escape_string($connection, $_POST['details']);

$selectquery = mysqli_query($connection, "select * form tbl_payment where payment_id = {$payment_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_payment set booking_id = '{$booking_id}', amount = '{$amount}', method = '{$method}', details = '{$details}' where payment_id = '{$payment_id}'");
    
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



