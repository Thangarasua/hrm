<?php include "../includes/config.php";

header('Content-Type: application/json');

$month = date('m');
$year = date('y');
$date = date('d');
$currentDatetime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

    $flag = $_POST['flag'];

     if ($flag === 'getAll' || $flag === 'jobApplications') {

        if ($flag === 'jobApplications') {
            $jobID = $_POST['jobID'];
            $condition = "AND `c`.`ticket_request_id`= '$jobID'";
        } elseif ($flag === 'getAll') {
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
        $query = "SELECT c.*,r.job_position,u.user_name FROM `candidates` AS c INNER JOIN `recruitment` AS r ON c.ticket_request_id =r.ticket_request_id  INNER JOIN `users` AS u ON c.created_by=u.user_id WHERE `candidate_id` = '$id'";
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
        $interview_status = $_POST['interview_status'];

        if ($interview_status == 2) {
            $interview_date = ", interview_date = '" . $_POST['interview_date'] . " " . $_POST['interview_time'] . "' ";
        } else {
            $interview_date = '';
        }

        $query = "UPDATE `candidates` SET `interview_status`= $interview_status $interview_date  WHERE `candidate_id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $query = "SELECT c.*,r.job_position,u.user_name FROM `candidates` AS c INNER JOIN `recruitment` AS r ON `c`.`ticket_request_id`=`r`.`ticket_request_id` INNER JOIN `users` AS u ON `c`.`created_by`=`u`.`user_id` WHERE `candidate_id` = '$rowId'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Candidate status update failure'));
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
    } elseif ($flag === "interviewDateUpdate") {

        $rowId = $_POST['rowId']; 
        $interview_date = $_POST['interview_date'] . ' ' . $_POST['interview_time'];

        $sheduled = 3;

        $query = "UPDATE `candidates` SET `interview_status`= $sheduled, `date_confirm_status`= 2 , `interview_re_date`= '$interview_date'  WHERE `candidate_id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Interview date update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Interview date update failure'));
        }
        exit;
    }
}
