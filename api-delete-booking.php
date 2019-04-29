 <?php
 
require './class/myclass.php';
$response = array();
    if(isset($_POST['booking_id']))
    {
     $booking_id = mysqli_real_escape_string($connection,$_POST['booking_id']);
                    
    $deleteq = mysqli_query($connection, "delete from tbl_booking where booking_id = '{$booking_id}'")or die(mysqli_error($connection));
          if($deleteq)
     {
     $response['flag'] = '1';
     $response["message"] = "Record Deleted";
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