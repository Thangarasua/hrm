<?php include "../includes/config.php";

header('Content-Type: application/json');

$employeeId = $_SESSION['hrm_employeeId'];
$employeeName = $_SESSION['hrm_employeeName'];
$designationId = $_SESSION["hrm_designationId"];
$departmentId = $_SESSION["hrm_departmentId"];
$roleId = $_SESSION["hrm_roleId"];

$month = date('m');
$year = date('y');
$date = date('d');
$currentDatetime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

    $flag = $_POST['flag'];

    if ($flag === 'getAll') {

        if (in_array($departmentId, [1, 2, 3, 5])) {
            $departmentWise = "AND 1";
        } else {
            $departmentWise = "AND e.department_id = $departmentId";
        }

        $sql = "SELECT c.*,r.job_position FROM `candidates` AS c INNER JOIN recruitment AS r ON c.ticket_request_id = r.ticket_request_id INNER JOIN $employeeTable AS e ON e.employee_id = r.raised_by WHERE c.`responce_status` = 1 AND `interview_status` IN (3,4,5,6,7,8,9) $departmentWise ORDER BY c.`candidate_id` DESC";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['interview_date'] = date("d M Y", strtotime($row['interview_re_date']??$row['interview_date']));
                $response[] = $row;
            }
        } else {
            $response = array();
        }
        echo json_encode($response);
        exit;
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT c.*,ip.*,e.official_name FROM `candidates` AS `c` LEFT JOIN `interview_process` AS `ip` ON `c`.`candidate_id`=`ip`.`candidate_id` LEFT JOIN `$employeeTable` AS `e` ON `e`.`employee_id`=`ip`.`rating_by`  WHERE `c`.`candidate_id` = '$id'";
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

        $query = "SELECT e.department_id,department_name,handled_hr FROM `candidates` AS c LEFT JOIN `$employeeTable`AS `e` ON `c`.`created_by`=`e`.`employee_id` INNER JOIN `departments`AS `d` ON `d`.`department_id`=`e`.`department_id` WHERE c.candidate_id = $rowId";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $department_id = $row['department_id'];
        $department_name = $row['department_name'];
        $handled_hr = $row['handled_hr'];

        if ($interviewStatus == 4) {

            if ($departmentId != $department_id) {
                echo json_encode(array('status' => 'failure', 'message' => "Star ratings must be given only to the ''$department_name'' department."));
                exit;
            }
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

            $query = "UPDATE `interview_process` SET `interview_status`='$interviewStatus',`ratings`='$ratingsJson',`rating_date`='$currentDatetime',`rating_by`='$employeeId' WHERE `candidate_id`='$rowId'";

            $getDataQuery = "SELECT c.*, r.job_position, e.official_name AS HRname, e.phone AS HRphone FROM `candidates`AS c INNER JOIN `recruitment`AS r ON `c`.`ticket_request_id`=`r`.`ticket_request_id`LEFT JOIN `employees`AS `e` ON `c`.`handled_hr`=`e`.`employee_id`WHERE c.`candidate_id`= '$rowId'";
        } else if ($interviewStatus == 5) {
            $joiningDate = $_POST['joining_date'] . ' ' . $_POST['joining_time'];

            $query = "UPDATE `interview_process` SET `interview_status`='$interviewStatus',`training_offer_send`='$joiningDate',`training_offer_status`= 0 WHERE `candidate_id`='$rowId'";

            $getDataQuery = "SELECT i.interview_status,i.`training_offer_send`, i.`training_offer_responced`, i.`training_offer_status`, c.candidate_id, c.candidate_name, c.email, r.job_position, e.official_name AS HRname, e.phone AS HRphone FROM `interview_process` AS i INNER JOIN `candidates`AS c ON `i`.`candidate_id`=`c`.`candidate_id` INNER JOIN `recruitment`AS r ON `c`.`ticket_request_id`=`r`.`ticket_request_id`LEFT JOIN `employees`AS `e` ON `c`.`handled_hr`=`e`.`employee_id`WHERE c.`candidate_id`= '$rowId'";
        } else if ($interviewStatus == 6) {
            $query = "UPDATE `interview_process` SET `interview_status`='$interviewStatus' WHERE `candidate_id`='$rowId'";
        } else if ($interviewStatus == 7) {

            $rejection = $_POST['rejection'];

            $query = "UPDATE `interview_process` SET `interview_status`='$interviewStatus',`candidate_rejection_comment`='$rejection' WHERE `candidate_id`='$rowId'";

            $getDataQuery = "SELECT c.*, r.job_position, e.official_name AS HRname, e.phone AS HRphone FROM `candidates`AS c INNER JOIN `recruitment`AS r ON `c`.`ticket_request_id`=`r`.`ticket_request_id`LEFT JOIN `employees`AS `e` ON `c`.`handled_hr`=`e`.`employee_id`WHERE c.`candidate_id`= '$rowId'";
        } else if ($interviewStatus == 8) {
            $query = "UPDATE `interview_process` SET `interview_status`='$interviewStatus' WHERE `candidate_id`='$rowId'";
        } else {
            $query = "UPDATE `interview_process` SET `interview_status`='$interviewStatus' WHERE `candidate_id`='$rowId'";
            $getDataQuery = "SELECT c.*, r.job_position, e.official_name AS HRname, e.phone AS HRphone FROM `candidates`AS c INNER JOIN `recruitment`AS r ON `c`.`ticket_request_id`=`r`.`ticket_request_id`LEFT JOIN `employees`AS `e` ON `c`.`handled_hr`=`e`.`employee_id`WHERE c.`candidate_id`= '$rowId'";
        }

        $result = mysqli_query($conn, $query);
        if ($result) {
            $updateQuery = "UPDATE `candidates` SET `interview_status`= $interviewStatus WHERE `candidate_id`='$rowId'";
            mysqli_query($conn, $updateQuery);

            $result = mysqli_query($conn, $getDataQuery);
            $row = mysqli_fetch_assoc($result);

            echo json_encode(array('status' => 'success', 'message' => 'Candidate status update successfully', 'data' => $row));
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
