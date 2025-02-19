<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

$key = "ACTEHRM2025";
$method = "AES-256-CBC";
$iv = substr(hash('sha256', $key), 0, 16);

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['flag'])) {
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $encrypted = $row['password'];
        $decryptPassword = openssl_decrypt($encrypted, $method, $key, 0, $iv);
        $row['password'] = $decryptPassword;
        echo json_encode($row);
        exit;
    } else {
        $query = "SELECT * FROM users ORDER BY user_id ASC";
        $result = mysqli_query($conn, $query);
        $users = [];
        while ($row = $result->fetch_assoc()) {
        $encrypted = $row['password'];
        $decryptPassword = openssl_decrypt($encrypted, $method, $key, 0, $iv);

        $row['password'] = $decryptPassword;
            $users[] = $row;
        }
        echo json_encode($users);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $UserID = $_POST['UserID'];
    $UserName = $_POST['UserName'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $supervisors = $_POST['supervisors'];
    $manager = $_POST['manager'];
    $hr = $_POST['hr'];
    $password = $_POST['password'];
    $flag = $_POST['flag'];

	$encryptedPassword = openssl_encrypt($password, $method, $key, 0, $iv); 
    
    if ($flag === "insert") {
        $query = "INSERT INTO `users` (`user_id`, `user_name`, `password`, `role_id`, `department_id`, `manager_id`, `supervisor_id`, `hr_id`, `status`) VALUES ('$UserID', '$UserName', '$encryptedPassword', $role, $department, '$manager', '$supervisors', '$hr', 'Active')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'User Added Successfully', 'userID' => $UserID, 'userName' => $UserName));
            exit;
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'User Add Requested Failure'));
            exit;
        }
    } elseif($flag === "update") {
        $query = "UPDATE `users` SET user_name = '$UserName', `password` = '$encryptedPassword', role_id = $role, department_id = $department, manager_id = $manager, supervisor_id = $supervisors, hr_id = $hr  WHERE user_id = '$UserID'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'User Updated Successfully', 'userID' => $UserID, 'userName' => $UserName));
            exit;
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'User Update Requested Failure'));
            exit;
        }

    }
}