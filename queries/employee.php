<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');
$hrm_userid = $_SESSION['hrm_userid'];

$key = "ACTEHRM2025";
$method = "AES-256-CBC";
$iv = substr(hash('sha256', $key), 0, 16);

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['flag'])) {
    $flag = $_GET['flag'];
    if ($flag === "getAll") {
        $query = "SELECT * FROM `employees` AS e INNER JOIN roles AS r ON r.role_id = e.role_id INNER JOIN departments AS dp ON dp.department_id=e.department_id INNER JOIN designations AS dg ON dg.designation_id=e.designation_id ORDER BY `e`.`employee_id` ASC";
        $result = mysqli_query($conn, $query);
        $employess = [];
        while ($row = $result->fetch_assoc()) {
            $employess[] = $row;
        }
        echo json_encode($employess);
        exit;
    }

    if ($flag === "getRole") { 
        $departmentId = $_GET['departmentId'];
        $query = "SELECT * FROM roles WHERE department_id = $departmentId AND status = 1 ORDER BY role_name ASC";
        $result = mysqli_query($conn, $query);
        $options = "<option value=''>Select</option>";
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row['role_id'] . '">' . htmlspecialchars($row['role_name']) . '</option>';
        }
        echo json_encode($options);
        exit;
    }
    if ($flag === "getDesignation") { 
        $departmentId = $_GET['departmentId'];
        $roleId = $_GET['roleId'];
        $query = "SELECT * FROM designations WHERE department_id = $departmentId AND role_id = $roleId AND status = 1 ORDER BY designation_title ASC";
        $result = mysqli_query($conn, $query);
        $options = "<option value=''>Select</option>";
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row['designation_id'] . '">' . htmlspecialchars($row['designation_title']) . '</option>';
        }
        echo json_encode($options);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    $flag = $_POST['flag'];
    if ($flag === "insert") {

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

        $query = "INSERT INTO employees (employee_id, full_name, email, phone, doj, `password`, designation_id, department_id, role_id, manager_id, supervisor_id, work_location, employee_type, about, `status`) VALUES ('$employeeId', '$fullName', '$email', '$phone', '$doj', '$encryptedPassword', $designation, $department, $role, '$manager', '$supervisor', '$workLocation', '$employeeType', '$about', 1)";
        
        $data = array('flag'=>'welcomeMail','employeeId'=>$employeeId,'fullName'=>$fullName,'email'=>$email,'password'=>$password);
        
        if (mysqli_query($conn, $query)) {
            echo json_encode(array('status' => 'success', 'message' => 'Employee data added successfully.', 'data'=> $data));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding employee data.'));
        }
    }
}