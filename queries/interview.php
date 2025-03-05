<?php include "../includes/config.php";

header('Content-Type: application/json');

$month = date('m');
$year = date('y');
$date = date('d');
$currentDatetime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

    $flag = $_POST['flag'];

    if ($flag === 'getAll') {

        $sql = "SELECT c.*,r.job_position FROM `candidates` AS c INNER JOIN recruitment AS r ON c.ticket_request_id = r.ticket_request_id WHERE c.`responce_status` = 1 AND `interview_status` IN (3,4,5,6,7,8)";
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
        $query = "SELECT * FROM `candidates` AS `c` LEFT JOIN `interview_process` AS `ip` ON `c`.`candidate_id`=`ip`.`candidate_table_id` WHERE `c`.`candidate_id` = '$id'";
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
        $interviewStatus = $_POST['interview_status'];

        if ($interviewStatus == 4) {
            // Create an associative array for the ratings
            $ratingsArray = array(
                "dressCodeRate" => $_POST['dressCodeRate'],
                "softSkillRate" => $_POST['softSkillRate'],
                "technicalSkillRate" => $_POST['technicalSkillRate'],
                "performanceRate" => $_POST['performanceRate'],
                "overallRate" => $_POST['overallRate']
            );

            // Convert the array to JSON format
            $ratingsJson = json_encode($ratingsArray, JSON_UNESCAPED_UNICODE);

            $query = "UPDATE `interview_process` SET `interview_process_status`='$interviewStatus',`ratings`='$ratingsJson',`rating_date`='$currentDatetime' WHERE `candidate_table_id`='$rowId'";
        }

        $result = mysqli_query($conn, $query);
        if ($result) {
            $query = "UPDATE `candidates` SET `interview_status`= $interviewStatus WHERE `candidate_id`='$rowId'";
            $result = mysqli_query($conn, $query);
            echo json_encode(array('status' => 'success', 'interviewStatus' => $interviewStatus, 'message' => 'Candidate status update successfully'));
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
