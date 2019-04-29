 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['area_id'])&& isset($_POST['area_name'])) 
{
    $area_id= mysqli_real_escape_string($connection, $_POST['area_id']);
    $area_name= mysqli_real_escape_string($connection, $_POST['area_name']);
  
 
$selectquery = mysqli_query($connection, "select * from tbl_area_master where area_id = {$area_id} ") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,  "update tbl_area_master set area_name = '{$area_name}' where area_id = '{$area_id}'");
    
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



