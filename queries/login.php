<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

$username = $_POST['username'];
$password = $_POST['password'];

$key = "ACTEHRM2025";
$method = "AES-256-CBC";
$iv = substr(hash('sha256', $key), 0, 16);
$inputPassword = openssl_encrypt($password, $method, $key, 0, $iv);

$query = "SELECT * FROM `employees` WHERE `employee_id` = '$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $employeeName = $row['official_name'];
    $employeeId = $row['employee_id'];
    $dbPassword = $row['password'];
    $designationId = $row['designation_id'];
    $departmentId = $row['department_id'];
    $roleId = $row['role_id'];

    if ($dbPassword == $inputPassword) {

        $_SESSION["hrm_loggedin"] = true;
        $_SESSION["hrm_employeeName"] = $employeeName;
        $_SESSION["hrm_employeeId"] = $employeeId;
        $_SESSION["hrm_designationId"] = $designationId;
        $_SESSION["hrm_departmentId"] = $departmentId;
        $_SESSION["hrm_roleId"] = $roleId;

        echo json_encode(array('status' => 'success', 'message' => 'Login'));
        exit;
 
    }else{
        echo json_encode(array('status' => 'failure', 'message' => 'mismatch password'));
        exit; 
 
    }
} else {
    echo json_encode(array('status' => 'failure', 'message' => 'username not found'));
    exit;
}
