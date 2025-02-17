<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $query = "SELECT * FROM users ORDER BY user_id ASC";
    $result = mysqli_query($conn, $query);
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
    exit;
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

    $key = "ACTEHRM2025";
	$method = "AES-256-CBC";
	$iv = substr(hash('sha256', $key), 0, 16); // Generate a 16-byte IV 
	$encryptedPassword = openssl_encrypt($password, $method, $key, 0, $iv); 

    if ($flag === "insert") {
        $query = "INSERT INTO `users` (`user_id`, `user_name`, `password`, `role_id`, `department_id`, `manager_id`, `supervisor_id`, `hr_id`, `status`) VALUES ('$UserID', '$UserName', '$encryptedPassword', $role, $department, '$manager', '$supervisors', '$hr', 'Active')";
        // echo ($query);
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => $query));
            exit;
        } else {
            echo json_encode(array('status' => 'failure', 'message' => $query));
            exit;
        }
    }
}