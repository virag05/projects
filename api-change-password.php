<?php

require './myclass.php';

$response = array();
if (isset($_POST['opass']) && !empty($_POST['opass']) && isset($_POST['npass']) && !empty($_POST['npass']) && isset($_POST['cpass']) && !empty($_POST['cpass']) && isset($_POST['user_id']) && !empty($_POST['user_id'])) {

    $opass = mysqli_real_escape_string($connection, $_POST['opass']);
    $npass = mysqli_real_escape_string($connection, $_POST['npass']);
    $cpass = mysqli_real_escape_string($connection, $_POST['cpass']);
    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);



    $check_user = mysqli_query($connection, "select password from  tbl_user where user_id = '{$user_id}'") or die(mysqli_error($connection));
    $count = mysqli_num_rows($check_user);

    if ($count > 0) {

        $check_old_password = mysqli_query($connection, "select * from  tbl_user where user_id = '{$user_id}' and password = '{$opass}'") or die(mysqli_error($connection));
        $oldpassfromdb = mysqli_fetch_array($check_old_password);
        $count = mysqli_num_rows($check_old_password);


        if ($oldpassfromdb['password'] == $opass) {

            if ($npass == $cpass) {

                if ($count > 0) {

                    $updatequery = mysqli_query($connection, "update tbl_user set password='{$npass}' where user_id='{$user_id}'") or die(mysqli_error($connection));

                    if ($updatequery) {
                        $response['flag'] = 1;
                        $response['message'] = "Password Changed success.";
                    } else {
                        $response['flag'] = 0;
                        $response['message'] = "Please Try Again Query Issue";
                    }
                } else {
                    $response['flag'] = 0;
                    $response['message'] = "Old Password Not Match.";
                }
            } else {
                $response['flag'] = 0;
                $response['message'] = "New and Confirm Password Not Match.";
            }
        } else {
            $response['flag'] = 0;
            $response['message'] = "Old Password Not Match.";
        }
    } else {
        $response['flag'] = 0;
        $response['message'] = "User Not Found";
    }
} else {

    $response['flag'] = 0;
    $response['message'] = "Required fields missing";
}
echo json_encode($response);
?>