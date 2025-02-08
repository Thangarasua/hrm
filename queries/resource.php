<?php include "../database/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

$hrm_userid = $_SESSION['hrm_userid'];
 
$purpose = $_POST['purpose'];
 
$month = date('m');
$year = date('y');
$date = date('d');

if ($purpose == 'addResource') {
    $lastTicketId = "SELECT `ticket_request_id` FROM `resourse_requests` ORDER BY `id` DESC";
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

    $query = "INSERT INTO `resourse_requests`(`ticket_request_id`, `raised_by`, `job_position`, `job_descriptions`, `required_skills`, `job_type`, `job_level`, `job_experience`, `qualification`, `gender`, `hr_contacted`, `status`, `created_at`) VALUES ('$ticketRequestId','$hrm_userid','$jobTitle','$jobDescription','$requiredSkills','$jobType','$jobLevel','$experience','$qualification','$gender','','Active','$currentDatetime')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo json_encode(array('status' => 'success', 'message' => 'Resorce requested successfully'));
        exit;
    } else {
        echo json_encode(array('status' => 'failure', 'message' => 'Resorce requested failure'));
        exit;
    }

} elseif ($purpose == 'getAll' || $purpose == 'getReport' || $purpose == 'companyType') {

    // $companyType = $_POST['companyType'] ?? '';
    // if ($companyType == '') {
    //     $companyType = '1';
    // } else {
    //     $companyType = 'companyType = "' . $companyType . '"';
    // }

    // $dateRange = $_POST['dateRange'];
    // if ($dateRange == 'custom') {
    //     $fromDate = date("Y-m-d", strtotime($_POST['fromDate']));
    //     $toDate = date("Y-m-d", strtotime($_POST['toDate']));
    //     $mode = "'$fromDate 00:00:00' AND '$toDate 23:59:00'";
    // } else {
    //     switch ($dateRange) {
    //         case "Today":
    //             $mode = "'$todayDate 00:00:00' AND '$todayDate 23:59:00'";
    //             break;
    //         case "Yesterday":
    //             $mode = "'$yesterdayDate 00:00:00' AND '$yesterdayDate 23:59:00'";
    //             break;
    //         case "Week":
    //             $mode = "'$firstDateWeek 00:00:00' AND '$lastDateWeek 23:59:00'";
    //             break;
    //         case "Month":
    //             $mode = "'$firstDateMonth 00:00:00' AND '$lastDateMonth 23:59:00'";
    //             break;
    //         default:
    //             $mode = "'$firstDateThreeMonth 00:00:00' AND '$todayDate 23:59:00'";
    //     }
    // }

    $sql = "SELECT * FROM `resourse_requests`";
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
}