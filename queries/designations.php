<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $query = "SELECT * FROM designations ORDER BY designation_title ASC";
    $result = mysqli_query($conn, $query);
    $departments = [];
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
    echo json_encode($departments);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $designationName = $_POST['designationName'];
    $status = $_POST['status'];
    $flag = $_POST['flag'];

    if ($flag === "insert") {
        $query = "INSERT INTO `designations` (`designation_title`, `status`) VALUES ('$designationName', $status)";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Designations Added Successfully'));
            exit;
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Designations Added Requested Failure'));
            exit;
        }
    }
}