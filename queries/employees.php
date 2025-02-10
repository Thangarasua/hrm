<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

$purpose = $_POST['purpose'];

switch ($purpose) {
    case "addEmployee":

        $employeeName = $_POST['employeeName'];
        $employeeID = $_POST['employeeID'];
        $email = $_POST['email'];
        $doj = $_POST['doj'];
        $phone = $_POST['phone'];
        $company = $_POST['company'];
        $department = $_POST['department'];
        $designation = $_POST['designation'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $about = $_POST['about'];

        $query_check = "SELECT 1 FROM `employees` WHERE `email` = '$email'"; // Check if email exists
        $result_check = mysqli_query($conn, $query_check);
        
        if (mysqli_num_rows($result_check) > 0) { 
            echo json_encode(array('status' => 'failure', 'message' => 'Email already exists'));
        } else {
            $query = "INSERT INTO `employees`(`employee_id`, `employee_name`, `email`, `phone_number`, `dob`, `gender`, `department_id`, `designation`, `date_of_joining`, `salary`, `address`, `reporting_manager_id`, `status`, `created_at`, `updated_at`) VALUES ('$employeeID','$employeeName','$email','$phone','$doj','Male','$department','$designation','$currentDatetime','60000','2345','xxxx','xxxx','$currentDatetime',Null)";
            $result = mysqli_query($conn, $query);
        
            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Employee created'));
            } else { 
                echo json_encode(array('status' => 'failure', 'message' => mysqli_error($conn))); 
            }
        }
        break;
    case "blue":
        "Your favorite color is blue!";
        break;
    case "green":
        echo "Your favorite color is green!";
        break;
    default:
        echo "Your favorite color is neither red, blue, nor green!";
        break;
}
