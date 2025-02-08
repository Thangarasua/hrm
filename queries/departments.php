<?php include "../database/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $query = "SELECT * FROM departments ORDER BY department_name ASC";
    $result = mysqli_query($conn, $query);
    $departments = [];
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
    echo json_encode($departments);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $departmentName = $_POST['departmentName'];
    $status = $_POST['status'];
    $flag = $_POST['flag'];

    if ($flag === "insert") {
        $query = "INSERT INTO `departments` (`department_name`, `status`) VALUES ('$departmentName', $status)";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Department Added Successfully'));
            exit;
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Department Added Requested Failure'));
            exit;
        }
    }
}