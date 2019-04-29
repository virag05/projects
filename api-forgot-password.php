<?php

require './class/myclass.php';

if (isset($_POST['email']) && !empty($_POST['email'])) {

    $email = $_POST['email'];
    $forgotquery = mysqli_query($connection, "SELECT * FROM `tbl_user` WHERE `email`='{$email}'") or die(mysqli_error($connection));
    $userdata = mysqli_fetch_array($forgotquery);
    $count = mysqli_num_rows($forgotquery);

    if ($count > 0) {

        $to = $email;
        $subject = "Forgot Password";
        $body = "Hi Your Password is {$userdata['password']}";
        $sendemail = sendemail($to, $subject, $body);
                
        if ($sendemail == TRUE) {

            $response["flag"] = 1;
            $response["message"] = "Password Sent on Email ID";
        } else {
            $response["flag"] = 0;
            $response["message"] = "Email Function Not Working";
        }
    } else {
        $response["flag"] = 0;
        $response["message"] = "No Record found";
    }
} else {
    $response["flag"] = 0;
    $response["message"] = "Required Field Missing";
}
echo json_encode($response);



//Change your Email ID and Password 
//For Gmail Email ID 
//SMTP: smtp.gmail.com
//Email : youremail@gmail.com
//Password : Your Password
//To Send an Email Allow Less pp Secure on https://myaccount.google.com/lesssecureapps

function sendemail($to, $subject, $body) {
    require './class/PHPMailerAutoload.php';

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.akashsir.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sonu@akashsir.com';                 // SMTP username
    $mail->Password = 'sonu@akash$9898';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('sonu@akashsir.com', 'Spa');
    $mail->addAddress($to, $to);     // Add a recipient

    $mail->addReplyTo('info@example.com', 'Information');
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AltBody = $body;

    if (!$mail->send()) {
        echo 'Email Could not Be Sent';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        return 'EMail has been sent';
    }
}
