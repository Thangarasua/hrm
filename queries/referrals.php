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

        $sql = "SELECT jr.id,jr.referral_id,jr.referral_id,jr.candidate_name,jr.created_at,jr.handled_hr, jr.referrer_id,jr.interview_status,r.job_position,e.official_name,pi.profile_photo FROM `job_referrals` AS jr INNER JOIN recruitment AS r ON jr.job_id = r.ticket_request_id INNER JOIN employees AS e ON e.employee_id = jr.referrer_id INNER JOIN personal_info AS pi ON e.employee_id=pi.employee_id WHERE 1 ORDER BY jr.`id` DESC"; 
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['created_at'] = date("d M Y", strtotime($row['created_at'])); 
                $row['handled_hr'] = is_null($row['handled_hr'])?'Still Not Work':$row['handled_hr']; 
                $row['interview_status'] = is_null($row['interview_status'])?0:$row['interview_status']; 
                $response[] = $row;
            }
        } else {
            $response = array();
        }
        echo json_encode($response);
        exit;
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT * FROM `job_referrals` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } elseif ($flag === "referralDetails") {

        $id = $_POST['id'];
        $query = "SELECT jr.*,r.id AS jobSno,r.raised_by,r.ticket_request_id,r.job_position FROM `job_referrals` AS jr INNER JOIN recruitment AS r ON jr.job_id = r.ticket_request_id INNER JOIN employees AS e ON e.employee_id = jr.referrer_id WHERE jr.`id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
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
        $referralID = $_POST['referralID'];
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
            $candidateRegistertId = 'CND' . $year . $month . $newInteger;
        } else {
            $candidateRegistertId = 'CND' . $year . $month . '001';
        }

        // Enable MySQLi Exception Mode
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try { 

            $query = "INSERT INTO `candidates` 
            (`candidate_register_id`,`candidate_name`, `email`, `contact_number`, `created_by`, `ticket_request_id`, `handled_hr`, `referral_id`, `created_at`) VALUES ('$candidateRegistertId','$candidateName', '$candidateMail', '$candidateContact', '$raisedBy', '$ticketRequestId', '$employeeId', '$referralID', '$currentDatetime')"; 
            mysqli_query($conn, $query);

            $updateQuery = "UPDATE `job_referrals` SET `handled_hr`='$employeeId',`updated_at`='$currentDatetime',`responce_status`=0 WHERE `referral_id` = $referralID";
            mysqli_query($conn, $updateQuery);

            $getHRdetails = "SELECT `official_name` AS hrName,`phone` AS HRphone FROM `employees` WHERE `employee_id` = '$employeeId'";
            $result = mysqli_query($conn, $getHRdetails);
            $row = mysqli_fetch_assoc($result);
            $row['id'] = $jobSno;
            $row['flag'] = 'recruitmentForm';
            $row['candidateName'] = $candidateName;
            $row['email'] = $candidateMail;
            $row['jobTitle'] = $jobTitle;

            if ($result) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'Recruitment form sent successfully',
                    'flag' => 'recruitmentForm',
                    'data' => $row
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
