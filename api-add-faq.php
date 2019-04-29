<?php
require './class/myclass.php';

$response = array();

if(isset($_POST['faq_question']) && isset($_POST['faq_answer']))
{
    $faq_question= mysqli_real_escape_string($connection, $_POST['faq_question']);
    $faq_answer= mysqli_real_escape_string($connection, $_POST['faq_answer']);
    
   $query = mysqli_query($connection,"insert into tbl_faq(faq_question, faq_answer)values('{$faq_question}','{$faq_answer}')")or die(mysqli_error($connection));

 if($query)
     {
     $response['flag'] = '1';
     $response["message"] = "Record Inserted";
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
  


