<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
// $hrm_userid = $_SESSION['hrm_userid'];

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

    if ($flag === "experienceInfo") {
        $employeeId = $_POST['employeeID'];
        $companyName = $_POST['companyName'];
        $previousDesignation = $_POST['previousDesignation'];
        $startDate = $_POST['startDate']; 
        $startDate = date("Y-m-d", strtotime($startDate)); 
        $endDate = $_POST['endDate'];
        $endDate = date("Y-m-d", strtotime($endDate)); 
 
        $workExperience = $_POST['workExperience'];
        $skils = $_POST['skils'];

        $experienceInfoQuery = "INSERT INTO experience_info (employee_id, previous_employer, designation, start_date, end_date, work_experience, skills) VALUES ('$employeeId', '$companyName', '$previousDesignation', '$startDate', '$endDate', '$workExperience', '$skils')";
        if (mysqli_query($conn, $experienceInfoQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Experience Information Updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding experience data.'));
        }
    }

    if ($flag === "educationInfo") {
        $employeeId = $_POST['employeeID'];
        $institutionName = $_POST['institutionName'];
        $course = $_POST['course'];
        $educationStartDate = $_POST['educationStartDate'];
 
        $educationStartDate = date("Y-m-d", strtotime($educationStartDate)); 
        $educationeEndDate = $_POST['educationeEndDate'];
        $educationeEndDate = date("Y-m-d", strtotime($educationeEndDate)); 
 
        $educationInfoQuery = "INSERT INTO education_info (employee_id, institution_name, course, start_date, end_date) VALUES ('$employeeId', '$institutionName', '$course', '$educationStartDate', '$educationeEndDate')";
        if (mysqli_query($conn, $educationInfoQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Education Information Updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding education data.'));
        }
    }

    if ($flag === "update") {
        $employeeId = $_POST['employeeID'];
        $fullName = $_POST['employeeName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $doj = $_POST['doj'];
        $doj = date("Y-m-d", strtotime($doj));
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        if ($password == $confirmPassword) {
            $encryptedPassword = openssl_encrypt($password, $method, $key, 0, $iv);
        } else {
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
        $employeeStatus = $_POST['employeeStatus'];
        if($employeeStatus == 2){
            $relievingDate = date("Y-m-d", strtotime($_POST['relievingDate'])); 
            $status = ",status = '2', relieving_date = $relievingDate";
        }else{
            $status = '';
        }

        $updateQuery = "UPDATE employees SET full_name = '$fullName', email = '$email', phone = '$phone', doj = '$doj', `password` = '$encryptedPassword', designation_id = $designation, department_id = $department, role_id = $role, manager_id = '$manager', supervisor_id = '$supervisor', work_location = '$workLocation', employee_type = '$employeeType' $status WHERE employee_id = '$employeeId'";

        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Employee data updated successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error updating employee data.'));
        }
    }
}
