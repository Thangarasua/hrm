<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];
    if ($flag === "bankInfo") {
        $bankName = $_POST['bankName'];
        $bankAccountNumber = $_POST['bankAccountNumber'];
        $ifscCode = $_POST['ifscCode'];
        $branchName = $_POST['branchName'];

        $CheckQuery = "SELECT * FROM bank_info WHERE employee_id = '$hrm_userid'";
        $result = mysqli_query($conn, $CheckQuery);
        if (mysqli_num_rows($result) > 0) {
            $bankInfoQuery = "UPDATE bank_info SET bank_name = '$bankName', bank_account_number = $bankAccountNumber, ifsc_code = '$ifscCode', branch_name = '$branchName' WHERE employee_id = '$hrm_userid'";
        } else {
            $bankInfoQuery = "INSERT INTO bank_info (employee_id, bank_name, bank_account_number, ifsc_code, branch_name) VALUES ('$hrm_userid', '$bankName', $bankAccountNumber, '$ifscCode', '$branchName')";
        }
        if (mysqli_query($conn, $bankInfoQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Bank Information Updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding bank data.'));
        }
    }
}