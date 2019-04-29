 <?php
 
require './class/myclass.php';
$response = array();
    if(isset($_POST['slot_id']))
    {
     $slot_id = mysqli_real_escape_string($connection,$_POST['slot_id']);
                    
    $deleteq = mysqli_query($connection, "delete from tbl_slot_master where slot_id = '{$slot_id}'")or die(mysqli_error($connection));
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