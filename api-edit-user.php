 <?php
 
require './class/myclass.php';
$response = array();

if(isset($_POST['user_id'])&& isset($_POST['user_name'])&& isset($_POST['gender'])&& isset($_POST['email'])&& isset($_POST['dob'])&& isset($_POST['password'])&& isset($_POST['address'])&& isset($_POST['area_id'])&& isset($_POST['contact_no'])) 
{    
    $user_id= mysqli_real_escape_string($connection, $_POST['user_id']);
    $user_name= mysqli_real_escape_string($connection, $_POST['user_name']);
    $gender= mysqli_real_escape_string($connection, $_POST['gender']);
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $dob= mysqli_real_escape_string($connection, $_POST['dob']);
     $password= mysqli_real_escape_string($connection, $_POST['password']);
    $address= mysqli_real_escape_string($connection, $_POST['address']);
    $area_id= mysqli_real_escape_string($connection, $_POST['area_id']);
    $contact_no= mysqli_real_escape_string($connection, $_POST['contact_no']);
    

$selectquery = mysqli_query($connection, "select * form tbl_user where user_id = {$user_id}") or die(mysqli_error($connection));
$count = mysqli_num_rows($selectquery);
        
if($count > 0)
    {
   $updatequery = mysqli_query($connection ,"update tbl_user set user_name = '{$user_name}', gender = '{$gender}', email= '{$email}', dob = '{$dob}', password = '{$password}', address = '{$address}', area_id = '{$area_id}', contact_no = '{$contact_no}' where payment_id = '{$payment_id}'");
    
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



