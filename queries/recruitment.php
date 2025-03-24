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

    if ($flag === "insert") {

        $lastTicketId = "SELECT `ticket_request_id` FROM `recruitment` ORDER BY `id` DESC";
        $result = mysqli_query($conn, $lastTicketId);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $data = mysqli_fetch_assoc($result);
            $lastInteger = substr($data['ticket_request_id'], 7, 3);
            if ($lastInteger > 999) {
                $lastInteger = 0;
            }
            $newInteger = sprintf("%03d", $lastInteger + 1);
            $ticketRequestId = 'RTR' . $year . $month . $newInteger;
        } else {
            $ticketRequestId = 'RTR' . $month . $year . '001';
        }

        $jobTitle = $_POST['jobTitle'];
        $jobDescription = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['jobDescription'])));
        $salaryRange = $_POST['salaryRange'];
        $workMode = $_POST['workMode'];
        $jobType = $_POST['jobType'];
        $jobLevel = $_POST['jobLevel'];
        $experience = $_POST['experience'];
        $qualification = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['qualification'])));
        $gender = $_POST['gender'];
        $requiredSkills = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['requiredSkills'])));
        $priority = $_POST['priority'];
        $openings = $_POST['openings'];
        $location = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['location'])));

        $query = "INSERT INTO `recruitment`(`ticket_request_id`, `raised_by`, `job_position`, `job_descriptions`, `required_skills`,`salary_range`,`work_mode`, `job_type`, `job_level`, `job_experience`, `qualification`, `gender`, `priority`, `openings`, `location`, `status`, `created_at`) VALUES ('$ticketRequestId','$employeeId','$jobTitle','$jobDescription','$requiredSkills','$salaryRange','$workMode','$jobType','$jobLevel','$experience','$qualification','$gender','$priority','$openings','$location',1,'$currentDatetime')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Resorce requested successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Resorce requested failure'));
        }
        exit;
    } elseif ($flag === 'getAll') {

        if (in_array($departmentId, [1, 2, 3, 5])) {
            $departmentWise = "1";
        } else {
            $departmentWise = "e.department_id = $departmentId";
        }

        $sql = "SELECT r.*, SUM(CASE WHEN c.responce_status = 1 THEN 1 ELSE 0 END) AS candidate_count FROM recruitment AS r LEFT JOIN candidates AS c ON r.ticket_request_id = c.ticket_request_id INNER JOIN employees AS e ON e.employee_id = r.raised_by WHERE $departmentWise GROUP BY r.ticket_request_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['hr_id'] = (isset($row['hr_id'])?$row['hr_id']:"HR Still Not work"); 
                $row['encoded_id'] = base64_encode($row['ticket_request_id']); 
                $row['created_at'] = date("d M Y", strtotime($row['created_at']));
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
        $jobTitle = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['jobTitle'])));
        $jobDescription = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['jobDescription'])));
        $jobType = $_POST['jobType'];
        $jobLevel = $_POST['jobLevel'];
        $experience = $_POST['experience'];
        $qualification = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['qualification'])));
        $gender = $_POST['gender'];
        $requiredSkills = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['requiredSkills'])));
        $priority = $_POST['priority'];
        $openings = $_POST['openings'];
        $location = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['location'])));

        $query = "UPDATE `recruitment` SET `job_position`='$jobTitle',`job_descriptions`='$jobDescription',`required_skills`='$requiredSkills',`job_type`='$jobType',`job_level`='$jobLevel',`job_experience`='$experience',`qualification`='$qualification',`gender`='$gender',`priority`='$priority',`openings`='$openings',`location`='$location',`updated_at`='$currentDatetime' WHERE `id`='$rowId'";
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
        
        $lastTicketId = "SELECT `candidate_register_id` FROM `candidates` ORDER BY `candidate_id` DESC";
        $result = mysqli_query($conn, $lastTicketId);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $data = mysqli_fetch_assoc($result);
            $lastInteger = (int) substr($data['candidate_register_id'], 7, 3);
            if ($lastInteger > 999) {
                $lastInteger = 0;
            }
            $newInteger = sprintf("%03d", $lastInteger + 1);
            $candidateRequestId = 'CND' . $year . $month . $newInteger;
        } else {
            $candidateRequestId = 'CND' . $year . $month . '001';
        }

        // Enable MySQLi Exception Mode
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            $update = "UPDATE `recruitment` SET `hr_id`='$employeeId' WHERE `id`= $jobSno";
            mysqli_query($conn, $update);

            $query = "INSERT INTO `candidates` (`candidate_register_id`,`candidate_name`, `email`, `contact_number`, `created_by`, `ticket_request_id`, `created_at`) VALUES ('$candidateRequestId','$candidateName', '$candidateMail', '$candidateContact', '$raisedBy', '$ticketRequestId', '$currentDatetime')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'Recruitment form sent successfully',
                    'flag' => 'recruitmentForm',
                    'id' => $jobSno,
                    'email' => $candidateMail,
                    'candidateName' => $candidateName,
                    'hrName' => $employeeName
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
