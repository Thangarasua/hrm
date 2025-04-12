<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];
    if($flag === "Check"){
        $employee_id = $_POST['employee_id'];
        $record_date = $_POST['record_date'];
        $query = "SELECT * FROM `attendance` WHERE `employee_id` = '$employee_id ' AND `record_date` = '$record_date' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $response = [
                'exists' => true,
                'check_in' => $row['check_in'],
                'check_out' => $row['check_out'],
                'production_hours' => $row['production_hours']
            ];
        } else {
            $response = [
                'exists' => false
            ];
        }
        echo json_encode($response);
    }

    if ($flag === "CheckIn") {
        $employee_id = $_POST['employee_id'];
        $record_date = $_POST['record_date'];
        $check_in_time = $_POST['check_in_time'];

        $default_check_in = "10:00:00";
        $late_time = "00:00";
        $check_in = new DateTime($check_in_time);
        $default_time = new DateTime($default_check_in);
        if ($check_in > $default_time) {
            $diff = $check_in->diff($default_time);
            $late_hours = $diff->h;
            $late_minutes = $diff->i;
            $late_time = $late_hours . " Hrs " . $late_minutes . " Min";
        }

        $insertQuery = "INSERT INTO attendance (employee_id, record_date, check_in, check_out, status, late_time) VALUES ('$employee_id', '$record_date', '$check_in_time', '00:00', 'Present', '$late_time')";
        if (mysqli_query($conn, $insertQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Check In Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error Check In.'));
        }
    }
}