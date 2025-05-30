<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

$key = "ACTEHRM2025";
$method = "AES-256-CBC";
$iv = substr(hash('sha256', $key), 0, 16);

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['flag'])) {
    $flag = $_GET['flag'];
    if ($flag === "getAll") {
        $active = $_GET['active'];
        if ($active == 1) {
            $status = "`e`.`status` = 1";
        } elseif ($active == 0) {
            $status = "`e`.`status` = 0";
        } elseif ($active == 2) {
            $status = "1";
        } elseif ($active == 3) {
            $date1 = date('Y-m-d', strtotime('-3 months'));
            $date2 = date('Y-m-d');
            $status = "1 AND doj BETWEEN '$date1' AND '$date2'";
        }

        $key = "ACTEHRM2025";
        $method = "AES-256-CBC";
        $iv = substr(hash('sha256', $key), 0, 16); 

        $query = "SELECT e.`employee_id`, e.`official_name`, e.`email`, e.`phone`, e.`doj`, e.`password`, dg.designation_title, pi.profile_photo AS profileImage, IF(ei.employee_id IS NOT NULL, 1, 0) AS exp, IF(ed.employee_id IS NOT NULL, 1, 0) AS edu, IF(pi.employee_id IS NOT NULL, 1, 0) AS personal, IF(pi.profile_photo IS NOT NULL, 1, 0) AS pic FROM `employees` AS e  INNER JOIN `roles` AS r ON r.role_id = e.role_id  INNER JOIN `departments` AS dp ON dp.department_id = e.department_id  INNER JOIN `designations` AS dg ON dg.designation_id = e.designation_id  LEFT JOIN `experience_info` AS ei ON ei.employee_id = e.employee_id  LEFT JOIN `education_info` AS ed ON ed.employee_id = e.employee_id  LEFT JOIN `personal_info` AS pi ON pi.employee_id = e.employee_id  WHERE $status GROUP BY e.employee_id, e.official_name, e.email, e.phone, e.doj, e.password, dg.designation_title, pi.profile_photo, ei.employee_id, ed.employee_id, pi.employee_id ORDER BY e.`employee_id` ASC";

        $result = mysqli_query($conn, $query);
        $employess = [];
        while ($row = $result->fetch_assoc()) {
            $row['profile'] = is_null($row['profileImage']) ? "assets/img/users/sample-user.jpg" : "uploads/employee_documents/profile_photo/" . $row['profileImage'];
            $row['profileCompletion'] = ($row['exp'] + $row['edu'] + $row['personal'] + $row['pic'] + 1) * 20;
            $row['string'] = (string)$row['profileCompletion'];
            $row['doj'] = date("d M Y", strtotime($row['doj']));
            $row['password'] = openssl_decrypt($row['password'], $method, $key, 0, $iv);
            $employess[] = $row;
        }
        echo json_encode($employess);
        exit;
    }

    if ($flag === "getCardValues") {
        $date1 = date('Y-m-d', strtotime('-3 months'));
        $date2 = date('Y-m-d');
        $query = "SELECT 
        COUNT(id) AS total,
        SUM(CASE WHEN employees.status = 1 THEN 1 ELSE 0 END) AS active,
        SUM(CASE WHEN employees.status = 0 THEN 1 ELSE 0 END) AS inactive,
        SUM(CASE WHEN employees.status = 1 AND doj BETWEEN '$date1' AND '$date2' THEN 1 ELSE 0 END) AS newly_active FROM `employees`";

        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        echo json_encode(array('status' => 'success', 'data' => $row));
        exit;
    }

    if ($flag === "getRole") {
        $departmentId = $_GET['departmentId'];
        $query = "SELECT * FROM roles WHERE department_id = $departmentId AND `status` = 1 ORDER BY `role_name` ASC";
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
        $officialName = $_POST['employeeOfficialName'];
        $personalName = $_POST['employeePersonalName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $doj = $_POST['doj'];
        $doj = date('Y-m-d', strtotime($doj));

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
        $workMode = $_POST['workMode'];
        $workType = $_POST['workType'];

        $query = "INSERT INTO employees (employee_id, official_name, personal_name, email, phone, doj, `password`, designation_id, department_id, role_id, manager_id, supervisor_id, `work_mode`, `work_type`, `work_location`, `status`, `confirmation_status`) VALUES ('$employeeId', '$officialName', '$personalName', '$email', '$phone', '$doj', '$encryptedPassword', $designation, $department, $role, '$manager', '$supervisor', '$workMode', '$workType', '$workLocation', 1, 1)";

        $data = array('flag' => 'welcomeMail', 'employeeId' => $employeeId, 'OfficialName' => $officialName, 'email' => $email, 'password' => $password);

        if (mysqli_query($conn, $query)) {
            echo json_encode(array('status' => 'success', 'message' => 'Employee data added successfully.', 'data' => $data));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding employee data.'));
        }
    } else if ($flag === "statusUpdate") {
        $employeeId = $_POST['employeeId'];
        $relievingDate = date('Y-m-d', strtotime($_POST['relievingDate']));
        $relievingComments = $_POST['relievingComments'];

        $query = "UPDATE `employees` SET `status`='2',`relieving_date`='$relievingDate',`relieving_comments`='$relievingComments' WHERE `employee_id`='$employeeId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Employee status update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Employee status update failure'));
        }
        exit;
    }
}

if (isset($_POST['month']) && isset($_POST['year']) && isset($_POST['flag'])) {
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $year = date('y', strtotime($year . '-01-01'));
    $month = date('m', strtotime($year . '-' . $month . '-01'));
    $day = date('d', strtotime($year . '-' . $month . '-' . $day));
    $baseId = "ACTE" . $year . $month . $day;

    $sql = "SELECT * FROM `employees`";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "SELECT * FROM `employees` ORDER BY `employees`.`id` DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $lastEmployeeId = $row['employee_id'];
            $lastSequence = (int)substr($lastEmployeeId, -3);
            if ($lastSequence == 999) {
                $newSequence = 1;
            } else {
                $newSequence = $lastSequence + 1;
            }
        } else {
            $newSequence = 1;
        }
    } else {
        $newSequence = 1;
    }

    $newEmployeeId = $baseId . str_pad($newSequence, 3, '0', STR_PAD_LEFT);
    echo json_encode($newEmployeeId);
    exit;
};
