<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// $email = $_POST['email'];
//     $flag = $_POST['flag'];
// if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

//     $email = $_POST['email'];
//     $flag = $_POST['flag'];

//     if ($flag === "recruitmentForm") {
//     }
// }else{
//     echo "else part";
//     exit;
// }

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username = 'server@acte.in';
    $mail->Password = 'wonlprkyskanwqrd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('notify@acte.in', 'ACTE');
    $mail->addAddress($_POST['email'], 'Joe User');
    // $mail->addAddress('ellen@example.com');               
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Candidate register form <a href="http://localhost/actecrm/hrm/test" target="_blank"> </a> <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->Body = $htmlContent;

    $mail->send();
    // Prepare the response
    $response = array(
        'status' => 'success',
        'message' => 'Email sent successfully.'
    );
} catch (Exception $e) {
    // Prepare the response in case of error
    $response = array(
        'status' => 'error',
        'message' => 'Email could not be sent. Error: ' . $mail->ErrorInfo
    );
}

// Send the response back to the AJAX call
header('Content-Type: application/json');
echo json_encode($response);
