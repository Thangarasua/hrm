<?php include "../includes/config.php";

header('Content-Type: application/json');

$hrm_userid = $_SESSION['hrm_userid'];

$month = date('m');
$year = date('y');
$date = date('d');
$currentDatetime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

    $flag = $_POST['flag'];

    if ($flag === "insert") {

        $lastTicketId = "SELECT `ticket_request_id` FROM `recruitment` ORDER BY `id` DESC";
        $result = mysqli_query($conn, $lastTicketId);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $data = mysqli_fetch_assoc($result);
            $lastInteger = substr($data['ticket_request_id'], 7, 3);
            $newInteger = sprintf("%03d", $lastInteger + 1);
            $ticketRequestId = 'RTR' . $month . $year . $newInteger;
        } else {
            $ticketRequestId = 'RTR' . $month . $year . '001';
        }

        $jobTitle = $_POST['jobTitle'];
        $jobDescription = $_POST['jobDescription'];
        $jobType = $_POST['jobType'];
        $jobLevel = $_POST['jobLevel'];
        $experience = $_POST['experience'];
        $qualification = $_POST['qualification'];
        $gender = $_POST['gender'];
        $requiredSkills = $_POST['requiredSkills'];
        $priority = $_POST['priority'];
        $location = $_POST['location'];

        $query = "INSERT INTO `recruitment`(`ticket_request_id`, `raised_by`, `job_position`, `job_descriptions`, `required_skills`, `job_type`, `job_level`, `job_experience`, `qualification`, `gender`, `priority`, `location`, `hr_contacted`, `status`, `created_at`) VALUES ('$ticketRequestId','$hrm_userid','$jobTitle','$jobDescription','$requiredSkills','$jobType','$jobLevel','$experience','$qualification','$gender','$priority','$location','',1,'$currentDatetime')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Resorce requested successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Resorce requested failure'));
        }
        exit;
    } elseif ($flag === 'getAll' || $flag === 'jobApplications') {

        if($flag === 'jobApplications'){
            $jobID = $_POST['jobID'];
            $condition = "AND `c`.`ticket_request_id`= '$jobID'";
        }elseif($flag === 'getAll'){
            $condition = '';
        }
 
        $sql = "SELECT c.*,r.job_position FROM `candidates` AS c INNER JOIN recruitment AS r ON c.ticket_request_id = r.ticket_request_id WHERE c.`responce_status` = 1 $condition";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {  
                $response[] = $row;
            }
        } else {
            $response = array();
        }
        echo json_encode($response);
        exit;
        
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT * FROM `recruitment` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } elseif ($flag === "update") {

        $rowId = $_POST['rowId'];
        $jobTitle = $_POST['jobTitle'];
        $jobDescription = $_POST['jobDescription'];
        $jobType = $_POST['jobType'];
        $jobLevel = $_POST['jobLevel'];
        $experience = $_POST['experience'];
        $qualification = $_POST['qualification'];
        $gender = $_POST['gender'];
        $requiredSkills = $_POST['requiredSkills'];
        $priority = $_POST['priority'];
        $location = $_POST['location'];

        $query = "UPDATE `recruitment` SET `job_position`='$jobTitle',`job_descriptions`='$jobDescription',`required_skills`='$requiredSkills',`job_type`='$jobType',`job_level`='$jobLevel',`job_experience`='$experience',`qualification`='$qualification',`gender`='$gender',`priority`='$priority',`location`='$location',`updated_at`='$currentDatetime' WHERE `id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Recruitment update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Recruitment update failure'));
        }
        exit;
    } elseif ($flag === "delete") {
        $id = $_POST['id'];
        $query = "DELETE FROM `recruitment` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Deleted successfull'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } elseif ($flag === "send") {

        $ticketRequestId = $_POST['ticketRequestId'];
        $jobTitle = $_POST['jobTitle'];
        $candidateName = $_POST['candidateName'];
        $candidateMail = $_POST['candidateMail'];
        $candidateContact = $_POST['candidateContact'];
        $raisedBy = $_POST['raisedBy'];
        $jobSno = $_POST['jobSno'];

        // Enable MySQLi Exception Mode
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $query = "INSERT INTO `candidates` (`candidate_name`, `email`, `contact_number`, `created_by`, `ticket_request_id`, `created_at`) 
              VALUES ('$candidateName', '$candidateMail', '$candidateContact', '$raisedBy', '$ticketRequestId', '$currentDatetime')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'Recruitment form sent successfully',
                    'flag' => 'recruitmentForm',
                    'id' => $jobSno,
                    'email' => $candidateMail
                ));
            }
        } catch (mysqli_sql_exception $e) {
            // Check if the error is a duplicate entry (MySQL error code 1062)
            if ($e->getCode() == 1062) {
                echo json_encode(array(
                    'status' => 'failure',
                    'message' => 'Duplicate entry detected. Email or Contact Number already exists!',
                    'error' => $e->getMessage()
                ));
            } else {
                // Handle other MySQL errors
                echo json_encode(array(
                    'status' => 'failure',
                    'message' => 'Something went wrong',
                    'error' => $e->getMessage()
                ));
            }
        }
        // Exit to prevent further execution
        exit;
    }
}
