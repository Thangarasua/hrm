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
    $mail->setFrom('info@acte.in', 'Markerz Global Solution');
    $mail->isHTML(true);

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

        $flag = $_POST['flag'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $encryptedID = base64_encode($id);
        $encryptedMail = base64_encode($email);

        if ($flag === "recruitmentForm") {

            $name = $_POST['candidateName'];
            $jobTitle = $_POST['jobTitle'];
            $link = "https://actecrm.com/hrm/interview-schedule?id=$encryptedID&mail=$encryptedMail";
            $hrName = $_POST['hrName'];
            $HRphone = $_POST['HRphone'];
            $companyName = 'Markerz Global Solution';
            $companyAddress = 'Velachery, Chennai, Tamil Nadu 600042';

            //Recipients
            $mail->addAddress($_POST['email'], $_POST['candidateName']);

            $mail->Subject = mb_encode_mimeheader("🔔 Job Application form by $companyName! 📧📝", 'UTF-8');
            //Content
            $htmlContent = file_get_contents('./templates/candidate-invite.html');
            $htmlContent = str_replace('{{Name}}', $name, $htmlContent);
            $htmlContent = str_replace('{{jobTitle}}', $jobTitle, $htmlContent);
            $htmlContent = str_replace('{{Link}}', $link, $htmlContent);
            $htmlContent = str_replace('{{HR Name}}', $hrName, $htmlContent);
            $htmlContent = str_replace('{{HR Number}}', $HRphone, $htmlContent);
            $htmlContent = str_replace('{{Company Name}}', $companyName, $htmlContent);
            $htmlContent = str_replace('{{Company Address}}', $companyAddress, $htmlContent);
            
            $mail->Body = $htmlContent;
            $mail->send();

            $response = array(
                'status' => 'success',
                'message' => 'Email sent successfully.'
            );
        }
    } else if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['interview_status'])) {
        $interviewStatus = $_POST['interview_status'];
        //2->shortlist mail content 
        if ($interviewStatus == 3) {
            $encryptID = base64_encode($_POST['candidate_id']);
            $candidate_name = $_POST['candidate_name'];
            $email = $_POST['email']; 
            $interview_date = date("Y-M-d", strtotime($_POST['interview_date']));
            $interview_time = date(" h:i a", strtotime($_POST['interview_date']));
            $job_position = $_POST['job_position'];
            $HRname = $_POST['HRname'];
            $HRphone = $_POST['HRphone'];
            //Recipients
            $mail->addAddress($_POST['email'], $_POST['candidate_name']);

            $mail->Subject = mb_encode_mimeheader("Congratulations $candidate_name! You Have Been Shortlisted 🎉🎊", 'UTF-8');
            //Content
            $htmlContent = file_get_contents('./templates/shortlist-mail.html');
            $htmlContent = str_replace('{{id}}', $encryptID, $htmlContent);
            $htmlContent = str_replace('{{Name}}', $candidate_name, $htmlContent);
            $htmlContent = str_replace('{{Job Position}}', $job_position, $htmlContent);
            $htmlContent = str_replace('{{interviewDate}}', $interview_date, $htmlContent);
            $htmlContent = str_replace('{{interviewTime}}', $interview_time, $htmlContent);
            $htmlContent = str_replace('{{HR Name}}', $HRname, $htmlContent); 
            $htmlContent = str_replace('{{HR Number}}', $HRphone, $htmlContent);

            $mail->Body = $htmlContent;
            $mail->send();

            $response = array(
                'status' => 'success',
                'message' => 'Email sent successfully.'
            );
            //4->interview feedback mail content
        } elseif ($interviewStatus == 4) {
            $encryptID = base64_encode($_POST['candidate_id']);
            $candidate_name = $_POST['candidate_name'];
            $email = $_POST['email'];
            $job_position = $_POST['job_position'];
            $HRname = $_POST['HRname'];
            $HRphone = $_POST['HRphone'];
            $interview_date = !empty($_POST['interview_re_date']) ? $_POST['interview_re_date'] : $_POST['interview_date'];

            //Recipients
            $mail->addAddress($_POST['email'], $_POST['candidate_name']);

            $mail->Subject = mb_encode_mimeheader("$candidate_name Kindly Feedback on Your Interview for $job_position ⭐⭐⭐⭐⭐", 'UTF-8');
            //Content
            $htmlContent = file_get_contents('./templates/interview-feedback.html');
            $htmlContent = str_replace('{{id}}', $encryptID, $htmlContent);
            $htmlContent = str_replace('{{Name}}', $candidate_name, $htmlContent);
            $htmlContent = str_replace('{{Job Position}}', $job_position, $htmlContent);
            $htmlContent = str_replace('{{Date}}', $interview_date, $htmlContent);
            $htmlContent = str_replace('{{HR Name}}', $HRname, $htmlContent);
            $htmlContent = str_replace('{{HR Number}}', $HRphone, $htmlContent);

            $mail->Body = $htmlContent;
            $mail->send();

            $response = array(
                'status' => 'success',
                'message' => 'Email sent successfully.'
            );
        } elseif ($interviewStatus == 5) {
            $encryptID = base64_encode($_POST['candidate_id']);
            $candidate_name = $_POST['candidate_name'];
            $email = $_POST['email'];
            $job_position = $_POST['job_position'];
            $joingDate = date("F jS \of, Y, h:i A", strtotime($_POST['training_offer_send']));
            $HRname = $_POST['HRname'];
            $HRphone = $_POST['HRphone'];
            $companyName = 'Markerz Global Solution';
            $companyAddress = 'Velachery, Chennai, Tamil Nadu 600042';

            //Recipients
            $mail->addAddress($_POST['email'], $_POST['candidate_name']);

            $mail->Subject = mb_encode_mimeheader("🎉Congratulations $candidate_name!🎊 Job Offer for $job_position at $companyName", 'UTF-8');
            //Content
            $htmlContent = file_get_contents('./templates/interview-offer.html');
            $htmlContent = str_replace('{{id}}', $encryptID, $htmlContent);
            $htmlContent = str_replace('{{Name}}', $candidate_name, $htmlContent);
            $htmlContent = str_replace('{{Job Position}}', $job_position, $htmlContent);
            $htmlContent = str_replace('{{Date}}', $joingDate, $htmlContent);
            $htmlContent = str_replace('{{HR Name}}', $HRname, $htmlContent);
            $htmlContent = str_replace('{{HR Number}}', $HRphone, $htmlContent);
            $htmlContent = str_replace('{{Company Name}}', $companyName, $htmlContent);
            $htmlContent = str_replace('{{Company Address}}', $companyAddress, $htmlContent);

            $mail->Body = $htmlContent;
            $mail->send();

            $response = array(
                'status' => 'success',
                'message' => 'Email sent successfully.'
            );
        } elseif ($interviewStatus == 7) { 
            $candidate_name = $_POST['candidate_name'];
            $email = $_POST['email'];
            $job_position = $_POST['job_position'];
            $interview_date = !empty($_POST['interview_re_date']) ? $_POST['interview_re_date'] : $_POST['interview_date'];
            $HRname = $_POST['HRname'];
            $HRphone = $_POST['HRphone'];
            $companyName = 'Markerz Global Solution';
            $companyAddress = 'Velachery, Chennai, Tamil Nadu 600042'; 

            //Recipients
            $mail->addAddress($_POST['email'], $_POST['candidate_name']);

            $mail->Subject = mb_encode_mimeheader("Interview Outcome – Markerz Global Solution", 'UTF-8');
            //Content
            $htmlContent = file_get_contents('./templates/interview-rejection.html'); 
            $htmlContent = str_replace('{{Name}}', $candidate_name, $htmlContent);
            $htmlContent = str_replace('{{Job Position}}', $job_position, $htmlContent);
            $htmlContent = str_replace('{{Date}}', $interview_date, $htmlContent);
            $htmlContent = str_replace('{{HR Name}}', $HRname, $htmlContent);
            $htmlContent = str_replace('{{HR Number}}', $HRphone, $htmlContent);
            $htmlContent = str_replace('{{Company Name}}', $companyName, $htmlContent);
            $htmlContent = str_replace('{{Company Address}}', $companyAddress, $htmlContent);

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
