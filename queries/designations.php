<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $query = "SELECT * FROM designations AS ds INNER JOIN departments AS dp ON ds.department_table_id = dp.department_id INNER JOIN roles AS r ON ds.role_table_id = r.role_id ORDER BY designation_title ASC";
    $result = mysqli_query($conn, $query);
    $departments = [];
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
    echo json_encode($departments);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

    $flag = $_POST['flag'];

    if ($flag === "insert") {
       
        $department = $_POST['department'];
        $role = $_POST['role'];
        $designationName = $_POST['designationName'];
        $status = 1;

        try {
            $query = "INSERT INTO `designations` (`department_table_id`, `role_table_id`, `designation_title`, `status`) VALUES ('$department','$role','$designationName', $status)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Designations Added Successfully'));
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Designations Added Requested Failure'));
            }
        } catch (mysqli_sql_exception $e) {
            // Check if the error is a duplicate entry (MySQL error code 1062)
            if ($e->getCode() == 1062) {
                echo json_encode(array(
                    'status' => 'failure',
                    'message' => 'Duplicate entries were found.Already in existence.',
                    'error' => $e->getMessage()
                ));
            } else {
                // Handle other MySQL errors
                echo json_encode(array(
                    'status' => 'failure',
                    'message' => 'Something went wrong',
                    'error' => $e->getMessage()
                ));
            }
        }
        exit;
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT * FROM `designations` WHERE `designation_id` = '$id'";
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
        $designationName = $_POST['designationName'];
        $status = $_POST['status'];

        try {
            $query = "UPDATE `designations` SET `designation_title`='$designationName',`status`='$status' WHERE `designation_id`='$rowId'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'update successfully'));
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'update failure'));
            }
        } catch (mysqli_sql_exception $e) {
            // Check if the error is a duplicate entry (MySQL error code 1062)
            if ($e->getCode() == 1062) {
                echo json_encode(array(
                    'status' => 'failure',
                    'message' => 'Duplicate entries were found.Already in existence.',
                    'error' => $e->getMessage()
                ));
            } else {
                // Handle other MySQL errors
                echo json_encode(array(
                    'status' => 'failure',
                    'message' => 'Something went wrong',
                    'error' => $e->getMessage()
                ));
            }
        }
        exit;
    } elseif ($flag === "delete") {
        $id = $_POST['id'];
        $query = "DELETE FROM `designations` WHERE `designation_id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Deleted successfull'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    }
}
