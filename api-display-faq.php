<?php
require './myclass.php';

$response = array();

$selectq = mysqli_query($connection, "select * from tbl_faq") or die(mysqli_error($connection));


$count = mysqli_num_rows($selectq);



if($count > 0){
while($row = mysqli_fetch_array($selectq)){
    $data['faq_id'] = $row['faq_id'];
    $data['faq_question'] = $row['faq_question'];
    $data['faq_answer'] = $row['faq_answer'];
  
    $fetch_array[] = $data;
    
    }
    $response['faq'] = $fetch_array;
    $response['flag'] = 1;

    
}

else{
  
$response['flag'] = 0;
$response['message'] = "Record not show";
}

echo json_encode($response);

?>