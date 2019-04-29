<?php

require './class/myclass.php';

$response = array();

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])) 
    {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['pass']);

    $loginquery = mysqli_query($connection, "select * from tbl_user where email='{$email}' and password='{$password}'") or die(mysqli_error($connection));
    $fetchrow = mysqli_fetch_array($loginquery);
    $count = mysqli_num_rows($loginquery);

    if ($count > 0) {
        $response['userdata'] = $fetchrow;
        $response['flag'] = 1;
        $response['message'] = "Login Success";
    } else {
        $response['flag'] = 0;
        $response['message'] = "Login Failed";
    }
} else {
    $response['flag'] = 0;
    $response['message'] = "Required fields missing";
}
echo json_encode($response);
