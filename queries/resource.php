<?php include "../database/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

$hrm_userid = $_SESSION['hrm_userid'];
$purpose = $_POST['purpose'];

switch ($purpose) {
    case "addResource":

        $lastTicketId = "SELECT `ticket_request_id` FROM `resourse_requests` ORDER BY `id` DESC";
        $result = mysqli_query($conn, $lastTicketId);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $data = mysqli_fetch_assoc($result);
            $ticket_request_id = $data['ticket_request_id'];
        } else {
            $ticketRequestId = 'RTR';
        }

        $jobTitle = $_POST['jobTitle'];
        $jobDescription = $_POST['jobDescription'];
        $jobType = $_POST['jobType'];
        $jobLevel = $_POST['jobLevel'];
        $experience = $_POST['experience'];
        $qualification = $_POST['qualification'];
        $gender = $_POST['gender'];
        $requiredSkills = $_POST['requiredSkills'];

        $query = "INSERT INTO `resourse_requests`(`ticket_request_id`, `raised_by`, `job_position`, `job_descriptions`, `required_skills`, `job_type`, `job_level`, `job_experience`, `qualification`, `gender`, `hr_contacted`, `status`, `created_at`) VALUES ('RTR001','$hrm_userid','$jobTitle','$jobDescription','$requiredSkills','$jobType','$jobLevel','$experience','$qualification','$gender','','Active','$currentDatetime')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Resorce requested successfully'));
            exit;
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Resorce requested failure'));
            exit;
        }

        break;
    case "test":

        break;
    case "test":

        break;
    default:
        echo "default";
}


// <br/><b>Fatal error</b>:  Uncaught mysqli_sql_exception: Cannot add or update a child row: a foreign key constraint fails (`hrm`.`resourse_requests`, CONSTRAINT `resourse_requests_ibfk_1` FOREIGN KEY (`raised_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE) in C:\xampp8.2.7\htdocs\actecrm\hrm\queries\resource.php:22
// Stack trace:
// #0 C:\xampp8.2.7\htdocs\actecrm\hrm\queries\resource.php(22): mysqli_query(Object(mysqli), 'INSERT INTO `re...')
// #1 {main}
//   thrown in <b>C:\xampp8.2.7\htdocs\actecrm\hrm\queries\resource.php</b>on line<b>22</b><br />