<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings 
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username = 'server@acte.in';
    $mail->Password = 'wonlprkyskanwqrd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('notify@acte.in', 'ACTE');
    $mail->isHTML(true);

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

        $email = $_POST['email'];
        $flag = $_POST['flag'];

        if ($flag === "recruitmentForm") {

            //Recipients
            $mail->addAddress($_POST['email'], 'Joe User');

            //Content
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'Candidate register form <a href="http://localhost/actecrm/hrm/interview-schedule" target="_blank">click the Link </a> <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            $response = array(
                'status' => 'success',
                'message' => 'Email sent successfully.'
            );
        }
    } else {
        $response = array(
            'status' => 'failure',
            'message' => 'Email not sent, something went wrong may be wrong inputs.'
        );
    }
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
exit;
