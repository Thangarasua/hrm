<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $data = $_GET['data'];

    $query = "SELECT * FROM work_locations WHERE work_location LIKE '%$data%'  ORDER BY work_location ASC";
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

        $query = "SELECT * FROM work_locations WHERE work_location = '$value'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode(array('status' => 'failure', 'message' => 'Same value existing'));
            exit;
        } else {
            $query = "INSERT INTO `work_locations` (`work_location`, `status`) VALUES ('$value', $status)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Job Type Added Successfully'));
                exit;
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Job Type Added Requested Failure'));
                exit;
            }
        }
    }  
}
