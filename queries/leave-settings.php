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

    if ($flag === "insert") { 

        $policyName = $_POST['policyName'];
        $days = $_POST['days']; 
        $leaveType = $_POST['leaveType']; 
        $description = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['description'])));

        $query = "INSERT INTO `leave_settings`(`policy_name`, `allowed_days`, `leave_type`, `description`, `status`, `updated_at`) VALUES ('$policyName','$days','$leaveType','$description',1,'$currentDatetime')"; 
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Leave Policy created successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Leave Policy created failure'));
        }
        exit;
    } elseif ($flag === 'getAll') { 
        $sql = "SELECT * FROM `leave_settings`";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {  
                $row['updated_at'] = date("d M Y", strtotime($row['updated_at']));
                $response[] = $row;
            }
        } else {
            $response = array();
        }
        echo json_encode($response);
        exit;
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT * FROM `leave_settings` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } elseif ($flag === "leavePolicyStatus") {

        $id = $_POST['id'];  
        $activeStatus = $_POST['activeStatus']; 
        
        $query = "UPDATE `leave_settings` SET `status`=$activeStatus,`updated_at`='$currentDatetime' WHERE `id`='$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Leave policy update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Leave policy update failure'));
        }
        exit;
    } elseif ($flag === "update") {

        $policyName = $_POST['policyName'];
        $days = $_POST['days']; 
        $leaveType = $_POST['leaveType']; 
        $description = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['description'])));
        $rowId = $_POST['rowId'];

        $query = "UPDATE `leave_settings` SET `policy_name`='$policyName',`allowed_days`='$days',`leave_type`='$leaveType',`description`='$description',`updated_at`='$currentDatetime' WHERE `id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Leave policy update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Leave policy update failure'));
        }
        exit; 
    }
}
