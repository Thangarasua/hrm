<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $data = $_GET['data'];

    $query = "SELECT * FROM experience_levels WHERE experience_type LIKE '%$data%'  ORDER BY experience_type ASC";
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];

    if ($flag === "insert") {

        $status = 1;
        $value = $_POST['value'];

        $query = "SELECT * FROM experience_levels WHERE experience_type = '$value'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode(array('status' => 'failure', 'message' => 'Same value existing'));
            exit;
        } else {
            $query = "INSERT INTO `experience_levels` (`experience_type`, `status`) VALUES ('$value', $status)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Experience Added Successfully'));
                exit;
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Experience Added Requested Failure'));
                exit;
            }
        }
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT * FROM `departments` WHERE `department_id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } elseif ($flag === "update") {

        $rowId = $_POST['rowId'];
        $department = $_POST['department'];
        $status = $_POST['status'];

        $query = "UPDATE `departments` SET `department_name`='$department',`status`='$status' WHERE `department_id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Department update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Department update failure'));
        }
        exit;
    } elseif ($flag === "delete") {
        $id = $_POST['id'];
        $query = "DELETE FROM `departments` WHERE `department_id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Deleted successfull'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    }
}
