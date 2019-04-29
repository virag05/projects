 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['ven_review_id'])&& isset($_POST['review'])&& isset($_POST['user_id'])&& isset($_POST['ven_id'])) 
{    
    $ven_review_id= mysqli_real_escape_string($connection, $_POST['ven_review_id']);
    $review= mysqli_real_escape_string($connection, $_POST['review']);
    $user_id= mysqli_real_escape_string($connection, $_POST['user_id']);
    $ven_id= mysqli_real_escape_string($connection, $_POST['ven_id']);

 
$selectquery = mysqli_query($connection, "select * form tbl_venue_review where ven_review_id = {$ven_review_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_venue_review set review = '{$review}',user_id = '{$user_id}', ven_id = '{$ven_id}' where ven_review_id = '{$ven_review_id}'");
    
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



