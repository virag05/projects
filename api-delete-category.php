 <?php
 
require './class/myclass.php';
$response = array();
    if(isset($_POST['category_id']))
    {
     $category_id = mysqli_real_escape_string($connection,$_POST['category_id']);
                    
    $deleteq = mysqli_query($connection, "delete from tbl_category where cat_id = '{$category_id}'")or die(mysqli_error($connection));
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