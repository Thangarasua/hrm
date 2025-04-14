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
                'checkIn' => $row['check_in'],
                'checkOut' => $row['check_out'],
                'productionHours' => $row['production_hours']
            ];
        } else {
            $response = [
                'exists' => false
            ];
        }
        echo json_encode($response);
    }

    if ($flag === "CheckIn") {
        $employeeId = $_POST['employeeId'];
        $recordDate = $_POST['recordDate'];
        $checkInTime = $_POST['checkInTime'];

        $defaultCheckIn = "10:00:00";
        $lateTime = "00:00";
        $checkIn = new DateTime($checkInTime);
        $defaultTime = new DateTime($defaultCheckIn);
        if ($checkIn > $defaultTime) {
            $diff = $checkIn->diff($defaultTime);
            $lateHours = $diff->h;
            $lateMinutes = $diff->i;
            $lateTime = $lateHours . " Hrs " . $lateMinutes . " Min";
        }

        $insertQuery = "INSERT INTO attendance (employee_id, record_date, check_in, check_out, status, late_time) VALUES ('$employeeId', '$recordDate', '$checkInTime', '00:00', 'Present', '$lateTime')";
        if (mysqli_query($conn, $insertQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Check In Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error Check In.'));
        }
    }

    if ($flag === "CheckOut") {
        $employeeId = $_POST['employeeId'];
        $recordDate = $_POST['recordDate'];
        $checkInTime = $_POST['checkInTime'];
        $checkOutTime = $_POST['checkOutTime'];

        $overTime = "00:00";
        $today = date('Y-m-d');
        $checkInDateTime = new DateTime("$today $checkInTime");
        $checkOutDateTime = new DateTime("$today $checkOutTime");
        $interval = $checkInDateTime->diff($checkOutDateTime);

        $totalMinutes = ($interval->h * 60) + $interval->i;
        $overMinutes = $totalMinutes - (9 * 60);

        if ($overMinutes > 0) {
            $hours = floor($overMinutes / 60);
            $minutes = $overMinutes % 60;
            $overTime = sprintf('%02d:%02d', $hours, $minutes);
        } else {
            $overTime = "00:00";
        }

        $hours = $interval->h;
        $minutes = $interval->i;
        $productionHours = $hours . ':' . str_pad($minutes, 2, '0', STR_PAD_LEFT);

        $updateQuery = "UPDATE attendance SET check_out = '$checkOutTime', overtime = '$overTime', production_hours = '$productionHours' WHERE `employee_id` = '$employeeId ' AND `record_date` = '$recordDate'";
        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Check Out Successfully.', 'productionHours' => $productionHours));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error Check Out.'));
        }
    }
}