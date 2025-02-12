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

        $query = "INSERT INTO `resourse_requests`(`ticket_request_id`, `raised_by`, `job_position`, `job_descriptions`, `required_skills`, `job_type`, `job_level`, `job_experience`, `qualification`, `gender`, `hr_contacted`, `status`, `created_at`) VALUES ('$ticketRequestId','$hrm_userid','$jobTitle','$jobDescription','$requiredSkills','$jobType','$jobLevel','$experience','$qualification','$gender','',1,'$currentDatetime')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Resorce requested successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Resorce requested failure'));
        }
        exit;
    } elseif ($flag === 'getAll' || $flag === 'getReport' || $flag === 'type') {

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
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT * FROM `resourse_requests` WHERE `id` = '$id'";
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

        $query = "UPDATE `resourse_requests` SET `job_position`='$jobTitle',`job_descriptions`='$jobDescription',`required_skills`='$requiredSkills',`job_type`='$jobType',`job_level`='$jobLevel',`job_experience`='$experience',`qualification`='$qualification',`gender`='$gender',`updated_at`='$currentDatetime' WHERE `id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Recruitment update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Recruitment update failure'));
        }
        exit;
        
    } elseif ($flag === "delete") {
        $id = $_POST['id'];
        $query = "DELETE FROM `resourse_requests` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Deleted successfull'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    }
}
