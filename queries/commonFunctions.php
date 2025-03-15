<?php include(__DIR__ . "/../includes/config.php");
$hrm_userid = $_SESSION['hrm_userid'];

function getDepartments($currentDepartmentId = null) {
    global $conn;
    $query = "SELECT * FROM departments WHERE status = 1 ORDER BY department_name ASC";
    $result = mysqli_query($conn, $query);
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $selected = ($row['department_id'] == $currentDepartmentId) ? 'selected' : '';
        $options .= '<option value="' . $row['department_id'] . '" ' . $selected . '>' . htmlspecialchars($row['department_name']) . '</option>';
    }
    return $options;
};

function getRoles($currentRoleId = null) {
    global $conn;
    $query = "SELECT * FROM roles WHERE status = 1 ORDER BY role_name ASC";
    $result = mysqli_query($conn, $query);
    $options = '';

    while ($row = $result->fetch_assoc()) {
        $selected = ($row['role_id'] == $currentRoleId) ? 'selected' : '';
        $options .= '<option value="' . $row['role_id'] . '" ' . $selected . '>' . htmlspecialchars($row['role_name']) . '</option>';
    }
    return $options;
};
function getJobTypes() {
    global $conn;
    $query = "SELECT * FROM job_types WHERE status = 1 ORDER BY job_type ASC";
    $result = mysqli_query($conn, $query);
    $options = '<option value="">Select</option>';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['id'] . '">' . htmlspecialchars($row['job_type']) . '</option>';
    }
    return $options;
};

function getManagerUsers($user, $currentUserId = null) {
    global $conn;
    $query = "SELECT * FROM `employees` WHERE `role_id` = $user AND status = 1 ORDER BY `employee_id` ASC";
    $result = mysqli_query($conn, $query);
    $options = '';

    while ($row = $result->fetch_assoc()) {
        $selected = ($row['employee_id'] == $currentUserId) ? 'selected' : '';
        $options .= '<option value="' . $row['employee_id'] . '" ' . $selected . '>' . htmlspecialchars($row['full_name']) . '</option>';
    }

    return $options;
};


if (isset($_POST['month']) && isset($_POST['year'])) {
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    echo getNewEmployeeId($day, $month, $year);
};

function getNewEmployeeId($day, $month, $year) {
    global $conn;
    $year = date('y', strtotime($year . '-01-01')); 
    $month = date('m', strtotime($year . '-' . $month . '-01')); 
    $day = date('d', strtotime($year . '-' . $month . '-' . $day)); 
    $baseId = "ACTE" . $year . $month . $day;

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

    $newEmployeeId = $baseId . str_pad($newSequence, 3, '0', STR_PAD_LEFT);
    return $newEmployeeId;
};

function getBankInfo($employeeId) {
    global $conn;
    $sql = "SELECT * FROM bank_info WHERE employee_id = '$employeeId'";
    $result = mysqli_query($conn, $sql);
    if ($result && $row = $result->fetch_assoc()) {
        return [
            'bankName' => $row['bank_name'],
            'bankAccountNumber' => $row['bank_account_number'],
            'ifscCode' => $row['ifsc_code'],
            'branchName' => $row['branch_name']
        ];
    } else {
        return null;
    }
};

function getEmployeeInfo($employeeId) {
    global $conn;
    // $query = "SELECT * FROM `employees` WHERE `employee_id` = '$employeeId'";
    $query = "SELECT * FROM `employees` AS e INNER JOIN roles AS r ON r.role_id = e.role_id INNER JOIN departments AS dp ON dp.department_id=e.department_id INNER JOIN designations AS dg ON dg.designation_id=e.designation_id WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $key = "ACTEHRM2025";
    $method = "AES-256-CBC";
    $iv = substr(hash('sha256', $key), 0, 16);
    if ($result && $row = $result->fetch_assoc()) {
        $decryptPassword = openssl_decrypt($row['password'], $method, $key, 0, $iv);
        return [
            'employeeId' => $row['employee_id'],
            'fullName' => $row['full_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'doj' => $row['doj'],
            'designation' => $row['designation_id'],
            'designationName' => $row['designation_title'],
            'department' => $row['department_id'],
            'departmentName' => $row['department_name'],
            'role' => $row['role_id'],
            'roleName' => $row['role_name'],
            'manager' => $row['manager_id'],
            'supervisor' => $row['supervisor_id'],
            'workLocation' => $row['work_location'],
            'employeeType' => $row['employee_type'],
            'about' => $row['about'],
            'password' => $decryptPassword,

        ];
    } else {
        return null;
    }
};