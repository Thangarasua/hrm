<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

$key = "ACTEHRM2025";
$method = "AES-256-CBC";
$iv = substr(hash('sha256', $key), 0, 16);

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];
    if ($flag === "bankInfo") {
        $employeeId = $_POST['employeeID'];
        $bankName = $_POST['bankName'];
        $bankAccountNumber = $_POST['bankAccountNumber'];
        $ifscCode = $_POST['ifscCode'];
        $branchName = $_POST['branchName'];

        $CheckQuery = "SELECT * FROM bank_info WHERE employee_id = '$employeeId'";
        $result = mysqli_query($conn, $CheckQuery);
        if (mysqli_num_rows($result) > 0) {
            $bankInfoQuery = "UPDATE bank_info SET bank_name = '$bankName', bank_account_number = $bankAccountNumber, ifsc_code = '$ifscCode', branch_name = '$branchName' WHERE employee_id = '$employeeId'";
        } else {
            $bankInfoQuery = "INSERT INTO bank_info (employee_id, bank_name, bank_account_number, ifsc_code, branch_name) VALUES ('$employeeId', '$bankName', $bankAccountNumber, '$ifscCode', '$branchName')";
        }
        if (mysqli_query($conn, $bankInfoQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Bank Information Updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding bank data.'));
        }
    }

    if ($flag === "update") {
        $employeeId = $_POST['employeeID'];
        $fullName = $_POST['employeeName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $doj = $_POST['doj'];
        $doj = date('Y-m-d', strtotime(str_replace('-', '/', $doj)));

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        if($password == $confirmPassword){
            $encryptedPassword = openssl_encrypt($password, $method, $key, 0, $iv);
        }else{
            echo json_encode(array('status' => 'failure', 'message' => 'Mismatch confirm password.'));
            exit;
        }

        $designation = $_POST['designation'];
        $department = $_POST['department'];
        $role = $_POST['role'];
        $manager = isset($_POST['manager']) ? $_POST['manager'] : '';
        $supervisor = isset($_POST['supervisors']) ? $_POST['supervisors'] : '';
        $workLocation = $_POST['workLocation'];
        $employeeType = $_POST['employeeType'];
        $about = $_POST['about']; 

        $updateQuery = "UPDATE employees SET full_name = '$fullName', email = '$email', phone = '$phone', doj = '$doj', `password` = '$encryptedPassword', designation_id = $designation, department_id = $department, role_id = $role, manager_id = '$manager', supervisor_id = '$supervisor', work_location = '$workLocation', employee_type = '$employeeType', about = '$about' WHERE employee_id = '$employeeId'";
        
        // $data = array('flag'=>'welcomeMail','employeeId'=>$employeeId,'fullName'=>$fullName,'email'=>$email,'password'=>$password);
        
        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Employee data updated successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error updating employee data.'));
        }
    }
}