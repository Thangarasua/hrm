<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s'); 

if (isset($_GET['flag']) && $_GET['flag'] === "fetch") {
    $data = $_GET['data'];

    $query = "SELECT * FROM job_titles WHERE job_title LIKE '%$data%'  ORDER BY job_title ASC";
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

        $query = "SELECT * FROM job_titles WHERE job_title = '$value'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo json_encode(array('status' => 'failure', 'message' => 'Same value existing'));
            exit;
        } else {
            $query = "INSERT INTO `job_titles` (`job_title`, `status`) VALUES ('$value', $status)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Job Title Added Successfully'));
                exit;
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Job Title Added Requested Failure'));
                exit;
            }
        }
    }  
}
