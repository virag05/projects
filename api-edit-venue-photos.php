 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['ven_photos_id'])&& isset($_POST['ven_id'])&& isset($_POST['photopath'])) 
{    
    $ven_photos_id= mysqli_real_escape_string($connection, $_POST['ven_photos_id']);
    $ven_id= mysqli_real_escape_string($connection, $_POST['ven_id']);
    $photopath= mysqli_real_escape_string($connection, $_POST['photopath']);
    
 
$selectquery = mysqli_query($connection, "select * form tbl_venue_photos where ven_photos_id = {$ven_photos_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_venue_photos set ven_id = '{$ven_id}', photopath = '{$photopath}' where ven_photos_id = '{$ven_photos_id}'");
    
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



