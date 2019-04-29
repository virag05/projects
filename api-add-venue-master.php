<?php

require './class/myclass.php';


$response = array();
if (isset($_POST['title']) && isset($_POST['capacity']) && isset($_POST['cat_id']) && isset($_POST['area_id']) && isset($_POST['email']) && isset($_POST['contact_no']) &&
        isset($_POST['address']) && isset($_POST['apxamount'])) {
    $title = mysqli_real_escape_string($connection, $_POST['title']);

    $capacity = mysqli_real_escape_string($connection, $_POST['capacity']);
    $cat_id = mysqli_real_escape_string($connection, $_POST['cat_id']);
    $area_id = mysqli_real_escape_string($connection, $_POST['area_id']);


    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $contact_no = mysqli_real_escape_string($connection, $_POST['contact_no']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

//    $parking= mysqli_real_escape_string($connection, $_POST['parking']);
//    $open= mysqli_real_escape_string($connection, $_POST['open']);
//    $wifi= mysqli_real_escape_string($connection, $_POST['wifi']);

    $apxamount = mysqli_real_escape_string($connection, $_POST['apxamount']);


    $query = mysqli_query($connection, "insert into tbl_venue_master(title,capacity,cat_id,area_id,email,contact_no,address,apxamount)values('{$title}','{$capacity}','{$cat_id}','{$area_id}','{$email}','{$contact_no}','{$address}','{$apxamount}')")or die(mysqli_error($connection));


    if ($query) {
        $response['flag'] = '1';
        $response["message"] = "Record Inserted";
    } else {


        $response['flag'] = '0';
        $response["message"] = "Error in Query";
    }
} else {
    $response['flag'] = '0';
    $response["message"] = "Required field is missing";
}
echo json_encode($response);
?>
