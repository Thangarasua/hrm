<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s'); 

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $query = "SELECT * FROM branch ORDER BY branch_id ASC";
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

        $status = 1;
        $branchName = $_POST['branchName'];
        $branchAddress = $_POST['branchAddress'];

        try {
            $query = "INSERT INTO `branch` (`branch_name`, `branch_address`, `status`) VALUES ('$branchName', '$branchAddress', $status)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Branch Added Successfully'));
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Branch Added Requested Failure'));
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
        $query = "SELECT * FROM `branch` WHERE `branch_id` = '$id'";
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
        $branchName = $_POST['edit_branch'];
        $branchAddress = $_POST['edit_branchAddress'];

        try {
            $query = "UPDATE `branch` SET `branch_name`='$branchName',`branch_address`='$branchAddress' WHERE `branch_id`='$rowId'";
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
        $query = "DELETE FROM `branch` WHERE `branch_id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Deleted successfull'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } 
}
