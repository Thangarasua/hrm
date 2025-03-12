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
    $mail->Username = 'notify@acte.in';
    $mail->Password = 'kaizxqhrltqzsxgr';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('info@acte.in', 'MARKERZ GLOBAL SOLUTION');
    $mail->isHTML(true);

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

        $flag = $_POST['flag'];

        if ($flag === "welcomeMail") {
            $employeeId = $_POST['employeeId'];
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            //Recipients
            $mail->addAddress($_POST['email'], $_POST['fullName']);

            $mail->Subject = mb_encode_mimeheader("🎉Welcome to Markerz! 💌🎊", 'UTF-8');
            //Content
            $htmlContent = file_get_contents('./templates/employee-welcome-mail.html');
            $htmlContent = str_replace('{{Name}}', $fullName, $htmlContent);
            $htmlContent = str_replace('{{Employee ID}}', $employeeId, $htmlContent);
            $htmlContent = str_replace('{{Password}}', $password, $htmlContent);

            $mail->Body = $htmlContent;
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
