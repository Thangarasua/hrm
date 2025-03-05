<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];
    if ($flag === "insert") {
        // Basic Info fields
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $fullName = $_POST['employeeName'];
        $employeeId = $_POST['employeeID'];
        $doj = $_POST['doj'];
        $doj = date('Y-m-d', strtotime(str_replace('-', '/', $doj)));
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $department = $_POST['department'];
        $designation = $_POST['designation'];
        $grade = $_POST['grade'];
        $about = $_POST['about'];

        $workLocation = $_POST['workLocation'];
        $manager = $_POST['manager'];
        $supervisor = $_POST['supervisor'];
        $team = $_POST['team'];
        $employeeType = $_POST['employeeType'];
        $salary = $_POST['salary'];

        // Personal Info fields
        $dob = $_POST['dob'];
        $dob = date('Y-m-d', strtotime(str_replace('-', '/', $dob)));
        $gender = $_POST['gender'];
        $nationality = $_POST['nationality'];
        $maritalStatus = $_POST['maritalStatus'];
        $address = $_POST['address'];

        // Bank Info fields
        $bankName = $_POST['bankName'];
        $bankAccountNumber = $_POST['bankAccountNumber'];
        $ifscCode = $_POST['ifscCode'];
        $branchName = $_POST['branchName'];

        // Career Info fields
        $previousEmployer = $_POST['previousEmployer'];
        $workExperience = $_POST['workExperience'];
        $skills = $_POST['skills'];
        $certifications = $_POST['certifications'];

        $effectiveDate = date("Y-m-d");

        $basicInfoQuery = "INSERT INTO employees (user_id, user_name, full_name, employee_id, doj, email, phone, department_id, designation, grade, about, work_location, manager_id, supervisor_id, team, employee_type_id)    VALUES ('$userId', '$userName', '$fullName', '$employeeId', '$doj', '$email', '$phone', '$department', '$designation', '$grade', '$about', '$workLocation', '$manager', '$supervisor', '$team', $employeeType)";
        
        $personalInfoQuery = "INSERT INTO personal_info (employee_id, dob, gender, nationality, marital_status, address)VALUES ('$employeeId', '$dob', '$gender', '$nationality', '$maritalStatus', '$address')";

        $bankInfoQuery = "INSERT INTO bank_info (employee_id, bank_name, bank_account_number, ifsc_code, branch_name) VALUES ('$employeeId', '$bankName', $bankAccountNumber, '$ifscCode', '$branchName')";

        $careerInfoQuery = "INSERT INTO career_info (employee_id, previous_employer, work_experience, skills, certifications) VALUES ('$employeeId', '$previousEmployer', '$workExperience', '$skills', '$certifications')";

        $salaryInfoQuery = "INSERT INTO salary_history (employee_id, salary, effective_date) VALUES ('$employeeId', '$salary', '$effectiveDate'
        )";
        
        if (mysqli_query($conn, $basicInfoQuery) && mysqli_query($conn, $personalInfoQuery) &&
        mysqli_query($conn, $bankInfoQuery) && mysqli_query($conn, $careerInfoQuery) &&
        mysqli_query($conn, $salaryInfoQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Employee data added successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding employee data.'));
        }
    }
}