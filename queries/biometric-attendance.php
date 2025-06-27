<?php include "../includes/config.php";

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];
    if($flag === "fetch"){
        $startDate = isset($_POST['fromDate']) ? $_POST['fromDate'] : date('Y-m-01');
        $endDate = isset($_POST['toDate']) ? $_POST['toDate'] : date('Y-m-d', strtotime('-1 day'));

        // $startDate = date('Y-m-01');
        // $endDate = date('Y-m-d', strtotime('-1 day'));
        $startDate = mysqli_real_escape_string($conn, $startDate);
        $endDate = mysqli_real_escape_string($conn, $endDate);

        $query = "SELECT user_id, DATE(punch_time) AS punch_date, MIN(punch_time) AS check_in, MAX(punch_time) AS check_out, TIMEDIFF(MAX(punch_time), MIN(punch_time)) AS total_hours FROM attendance_log WHERE DATE(punch_time) BETWEEN '$startDate' AND '$endDate' GROUP BY user_id, DATE(punch_time) ORDER BY punch_date DESC";
        $result = mysqli_query($conn, $query);
        $attendance = [];
        while ($row = $result->fetch_assoc()) {
            $attendance[] = $row;
        }
        echo json_encode($attendance);
        exit;
    }

    if($flag === "fetchRequest"){
        $startDate = $_POST['fromDate'];
        $endDate = $_POST['toDate'];

        $query = "SELECT * FROM `attendance_requests` WHERE status = 'Pending' AND `record_date` BETWEEN '$startDate' AND '$endDate' ORDER BY `id` DESC";
        $result = mysqli_query($conn, $query);
        $attendance = [];
        while ($row = $result->fetch_assoc()) {
            $attendance[] = $row;
        }
        echo json_encode($attendance);
        exit;
    }

    if($flag === "attendanceAction"){
        $id = $_POST['id'];
        $action = $_POST['action'];
        $now = date('Y-m-d H:i:s');

        if ($action === 'approve') {
            $query = "UPDATE `attendance_requests` SET `status`='Approved',`approved_at`='$now' WHERE `id`= $id";
            $result = mysqli_query($conn, $query);

            $sql = "SELECT * FROM attendance_requests WHERE `id`= $id AND `status`='Approved'";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                $employeeId = $row['employee_id'];
                $recordDate = $row['record_date'];
                $checkIn = $row['check_in'];
                $checkOut = $row['check_out'];
                $lateTime = $row['late_time'];
                $overtime = $row['overtime'];
                $productionHours = $row['production_hours'];

                $checkRecord = "SELECT * FROM attendance WHERE  employee_id = '$employeeId' AND record_date = '$recordDate'";
                $checkResult = mysqli_query($conn, $checkRecord);

                if ($result && mysqli_num_rows($checkResult) > 0) {
                    $updateQuery = "UPDATE `attendance` SET `check_in` = '$checkIn', `check_out` = '$checkOut', `status` = 'Present', `late_time` = '$lateTime', `overtime` = '$overtime', `production_hours` = '$productionHours' WHERE employee_id = '$employeeId' AND record_date = '$recordDate'";
                } else {
                    $updateQuery = "INSERT INTO attendance (employee_id, record_date, check_in, check_out, status, late_time, overtime, production_hours) VALUES ('$employeeId', '$recordDate', '$checkIn', '$checkOut', 'Present', '$lateTime', '$overtime', '$productionHours')";
                }

               
            }
        } elseif ($action === 'reject') {
            $updateQuery = "UPDATE `attendance_requests` SET `status`='Rejected',`approved_at`='$now' WHERE `id`= $id";
        }

        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Attendance updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error'));
        }
    }
}