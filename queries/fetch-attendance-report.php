<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

$today = date('Y-m-d');
$weekStart = date('Y-m-d', strtotime('monday this week'));
$monthStart = date('Y-m-01');

$response = [
    'today_hours' => '00:00:00',
    'week_hours' => '00:00:00',
    'month_hours' => '00:00:00',
    'month_overtime' => '00:00:00',
    'productive_today' => '00:00:00',
    'break_today' => '00:00:00',
    'overtime_today' => '00:00:00'
];

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];

    if($flag === "fetchReport"){
        $employeeId = $_POST['employeeId'];
       
        // Today's data
       $todayQuery = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(IF(check_out = '00:00:00', NOW(), check_out),      check_in)))) as total_hours, SUM(TIME_TO_SEC(break_time)) as break_seconds, SUM(TIME_TO_SEC(overtime)) as overtime_seconds, SEC_TO_TIME(SUM(TIME_TO_SEC(production_hours))) as productive FROM attendance WHERE employee_id = '$employeeId' AND record_date = '$today'";
        $result = mysqli_query($conn, $todayQuery);
        if ($row = $result->fetch_assoc()) {
            $response['today_hours'] = $row['productive'];
            $response['productive_today'] = $row['productive'];
            $response['break_today'] = gmdate("H:i:s", $row['break_seconds']);
            $response['overtime_today'] = gmdate("H:i:s", $row['overtime_seconds']);
        }

        // Week data
        $weekQuery = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(check_out, check_in)))) as total_hours, SEC_TO_TIME(SUM(TIME_TO_SEC(production_hours))) as productive_hours FROM attendance  WHERE employee_id = '$employeeId' AND record_date BETWEEN '$weekStart' AND '$today'";
        $result = mysqli_query($conn, $weekQuery);
        if ($row = $result->fetch_assoc()) {
            $response['week_hours'] = $row['productive_hours'];
        }

        // Month data
        $monthQuery =  "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(check_out, check_in)))) as total_hours, SUM(TIME_TO_SEC(overtime)) as overtime_seconds, SEC_TO_TIME(SUM(TIME_TO_SEC(production_hours))) as productive_hours FROM attendance WHERE employee_id = '$employeeId' AND record_date BETWEEN '$monthStart' AND '$today'";

        $result = mysqli_query($conn, $monthQuery);
        if ($row = $result->fetch_assoc()) {
            $response['month_hours'] = $row['productive_hours'];
            $response['month_overtime'] = gmdate("H:i:s", $row['overtime_seconds']);
        }

        echo json_encode($response);
        exit;
    }
}