<?php include "../includes/config.php";

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];
    if($flag === "fetch"){
        $startDate = date("Y") . "-04-01";
        $endDate = date("Y-m-d");

        $query = "SELECT * FROM `attendance` WHERE `record_date` BETWEEN '$startDate' AND '$endDate' ORDER BY `id` DESC";
        $result = mysqli_query($conn, $query);
        $attendance = [];
        while ($row = $result->fetch_assoc()) {
            $attendance[] = $row;
        }
        echo json_encode($attendance);
        exit;
    }
}