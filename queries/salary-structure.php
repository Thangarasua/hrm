<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $query = "SELECT r.role_name,r.role_id AS roleId,s.* FROM roles AS r LEFT JOIN salary_structure AS s ON r.role_id = s.role_id ORDER BY role_id ASC";
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
        $rolesName = $_POST['rolesName'];
        $status = 1;

        try {
            $query = "INSERT INTO `roles` (`role_name`, `status`) VALUES ('$rolesName', $status)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Role Added Successfully'));
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Role Added Requested Failure'));
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
        // $query = "SELECT * FROM `roles` WHERE `role_id` = '$id'";
        $query = "SELECT r.role_name,r.role_id AS roleId,s.* FROM roles AS r LEFT JOIN salary_structure AS s ON r.role_id = s.role_id WHERE r.`role_id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } elseif ($flag === "update") {

        $minLPA = $_POST['minLPA'];
        $maxLPA = $_POST['maxLPA'];
        $minKPM = $_POST['minKPM'];
        $maxKPM = $_POST['maxKPM'];
        $rowId = $_POST['rowId'];

        $query = "SELECT * FROM `salary_structure` WHERE `role_id`='$rowId'";
        $result = mysqli_query($conn, $query);
        $rowCount = mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
            $query = "UPDATE `salary_structure` SET `min_LPA`='$minLPA',`max_LPA`='$maxLPA',`min_KPM`='$minKPM',`max_KPM`='$maxKPM',`updated`='$currentDatetime' WHERE `role_id`='$rowId'";
        } else {
            $query = "INSERT INTO `salary_structure`(`role_id`, `min_LPA`, `max_LPA`, `min_KPM`, `max_KPM`, `created`) VALUES ('$rowId','$minLPA','$maxLPA','$minKPM','$maxKPM','$currentDatetime')";
        }

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'update failure'));
        }
        exit;
    } elseif ($flag === "salaryRange") {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $query = "SELECT * FROM `salary_structure` WHERE `role_id`='$id'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($type == 'Annum') {
                $salaryRange = $row['min_LPA'] . ' - ' . $row['max_LPA'] .' LPA';
            } else {
                $salaryRange = $row['min_KPM'] . ' - ' . $row['max_KPM'] .' Per Month';
            } 

            echo json_encode(array('status' => 'success', 'data' => $salaryRange));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'STILL NOT SET SALARY RANGE.'));
        } 
        exit;
    }
}
