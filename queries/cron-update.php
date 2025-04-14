<?php include "../includes/config.php";
header('Content-Type: application/json');
$employeeId = $_SESSION['hrm_employeeId'];
$currentDate = date("Y-m-d");
$currentTime = date("H:i:s");

$query = "SELECT * FROM `attendance` WHERE `employee_id` = '$employeeId ' AND `record_date` = '$currentDate' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $employeeId = $row['employee_id'];
    $checkInTime = strtotime($row['check_in']);
    $now = time();
    $productionHours;

    if ($currentTime >= "23:59:00") {
        $productionHours = floor((strtotime("23:59:59") - $checkInTime) / 60);
       
    } else {
        $productionHours = floor(($now - $checkInTime) / 60);
    }

    $updateQuery = "UPDATE attendance SET production_hours = '$productionHours' WHERE `employee_id` = '$employeeId ' AND `record_date` = '$recordDate'";
    if (mysqli_query($conn, $updateQuery)) {
        echo json_encode(array('status' => 'success', 'message' => 'Check Out Successfully.', 'productionHours' => $productionHours));
    } else {
        echo json_encode(array('status' => 'failure', 'message' => 'Error Check Out.'));
    }
}