<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

$username = $_POST['username'];
$password = $_POST['password'];

$key = "ACTECRM2025";
$method = "AES-256-CBC";
$iv = substr(hash('sha256', $key), 0, 16);
$inputPassword = openssl_encrypt($password, $method, $key, 0, $iv);

$query = "SELECT * FROM `users` WHERE `user_id` = '$username'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result); 
    $userName = $row['user_name']; 
    $userId = $row['user_id']; 
    $dbPassword = $row['password'];

    if ($dbPassword == $inputPassword) {

        $_SESSION["hrm_loggedin"] = true;
        $_SESSION["hrm_username"] = $userName; 
        $_SESSION["hrm_userid"] = $userId; 

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
