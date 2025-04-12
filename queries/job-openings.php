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

    if ($flag === "send") {

        $ticketRequestId = $_POST['ticketRequestId'];
        $jobTitle = $_POST['jobTitle'];
        $candidateName = $_POST['candidateName'];
        $candidateMail = $_POST['candidateMail'];
        $candidateContact = $_POST['candidateContact'];
        $raisedBy = $_POST['raisedBy'];
        $referred = $_POST['referred'];
        $jobSno = $_POST['jobSno'];

        $lastTicketId = "SELECT `referral_id` FROM `job_referrals` ORDER BY `id` DESC";
        $result = mysqli_query($conn, $lastTicketId);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            $data = mysqli_fetch_assoc($result);
            $lastInteger = (int) substr($data['referral_id'], 7, 3);
            if ($lastInteger > 999) {
                $lastInteger = 0;
            }
            $newInteger = sprintf("%03d", $lastInteger + 1);
            $referrerID = 'REF' . $year . $month . $newInteger;
        } else {
            $referrerID = 'REF' . $year . $month . '001';
        }

        // Enable MySQLi Exception Mode
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try { 

            $query = "INSERT INTO `job_referrals`(`referral_id`, `referrer_id`, `job_id`, `candidate_name`, `candidate_email`, `candidate_mobile`, `referral_bonus`, `created_at`) VALUES ('$referrerID','$employeeId','$ticketRequestId','$candidateName', '$candidateMail', '$candidateContact','Not disclose','$currentDatetime')";
            $result = mysqli_query($conn, $query); 

            if ($result) {
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'Referral added successfully', 
                ));
            }
        } catch (mysqli_sql_exception $e) {
            // Check if the error is a duplicate entry (MySQL error code 1062)
            if ($e->getCode() == 1062) {
                echo json_encode(array(
                    'status' => 'failure',
                    'message' => 'Duplicate entry detected. Email already exists!',
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
