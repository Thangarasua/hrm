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
    $mail->setFrom('notify@acte.in', 'MARKERZ');
    $mail->isHTML(true);

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

        $flag = $_POST['flag'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $encryptedID = base64_encode($id);
        $encryptedMail = base64_encode($email);

        if ($flag === "recruitmentForm") {

            $name = $_POST['candidateName'];
            $link = "https://actecrm.com/hrm/interview-schedule?id=$encryptedID&mail=$encryptedMail";
            $hrName = $_POST['hrName'];
            //Recipients
            $mail->addAddress($_POST['email'], 'Joe User');

            $mail->Subject = 'Job Application form';
            $mail->Subject = mb_encode_mimeheader("Job Application form! 📧📝", 'UTF-8');
            //Content
            $htmlContent = file_get_contents('./templates/candidate-invite1.html');
            $htmlContent = str_replace('{{Name}}', $name, $htmlContent);
            $htmlContent = str_replace('{{Link}}', $link, $htmlContent);
            $htmlContent = str_replace('{{HR Name}}', $hrName, $htmlContent);

            $mail->Body = $htmlContent;
            $mail->send();

            $response = array(
                'status' => 'success',
                'message' => 'Email sent successfully.'
            );
        }
    } else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['interview_status'])) { 
        $interview_status = $_POST['interview_status']; 
        $encryptID = base64_encode($_POST['candidate_id']);
        $candidate_name = $_POST['candidate_name'];
        $email = $_POST['email'];
        $interview_date = $_POST['interview_date'];
        $job_position = $_POST['job_position']; 
        $user_name = $_POST['user_name'];
        //Recipients
        $mail->addAddress($_POST['email'], 'Joe User');
 
        $mail->Subject = mb_encode_mimeheader("Congratulations! You Have Been Shortlisted 🎉🎊", 'UTF-8');
        //Content
        $htmlContent = file_get_contents('./templates/shortlist-mail.html');
        $htmlContent = str_replace('{{id}}', $encryptID, $htmlContent);
        $htmlContent = str_replace('{{Name}}', $candidate_name, $htmlContent);
        $htmlContent = str_replace('{{Job Position}}', $job_position, $htmlContent);
        $htmlContent = str_replace('{{Date}}', $interview_date, $htmlContent);
        $htmlContent = str_replace('{{HR Name}}', $user_name, $htmlContent);

        $mail->Body = $htmlContent;
        $mail->send();

        $response = array(
            'status' => 'success',
            'message' => 'Email sent successfully.'
        );

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
