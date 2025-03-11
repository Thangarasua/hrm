<?php include(__DIR__ . "/../includes/config.php");
$hrm_userid = $_SESSION['hrm_userid'];

// Get current year and month
$year = date('y'); 
$month = date('m');

function getDepartments() {
    global $conn;
    $query = "SELECT * FROM departments WHERE status = 1 ORDER BY department_name ASC";
    $result = mysqli_query($conn, $query);
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['department_id'] . '">' . htmlspecialchars($row['department_name']) . '</option>';
    }
    return $options;
}

function getRoles() {
    global $conn;
    $query = "SELECT * FROM roles WHERE status = 1 ORDER BY role_name ASC";
    $result = mysqli_query($conn, $query);
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['role_id'] . '">' . htmlspecialchars($row['role_name']) . '</option>';
    }
    return $options;
}

function getManagerUsers($user) {
    global $conn;
    $query = "SELECT * FROM `employees` WHERE `role_id` IN (SELECT `role_id` FROM `roles` WHERE `department_id` = $user) AND status = 1 ORDER BY `employee_id` ASC";
    $result = mysqli_query($conn, $query);
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['employee_id'] . '">' . htmlspecialchars($row['full_name']) . '</option>';
    }
    return $options;
}

function getNewEmployeeId() {
    global $conn, $year, $month;
    $baseId = "ACTE" . $year . $month;

    $sql = "SELECT employee_id FROM employees WHERE employee_id LIKE 'ACTE%' ORDER BY employee_id DESC LIMIT 1";
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
}

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
}

function getEmployeeInfo($employeeId) {
    global $conn;
    $query = "SELECT * FROM `employees` WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    if ($result && $row = $result->fetch_assoc()) {
        return [
            'employeeId' => $row['employee_id'],
            'fullName' => $row['full_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'doj' => $row['doj'],
            'designation' => $row['designation'],
            'department' => $row['department_id'],
            'role' => $row['role_id'],
            'manager' => $row['manager_id'],
            'supervisor' => $row['supervisor_id'],
            'workLocation' => $row['work_location'],
            'employeeType' => $row['employee_type_id'],
            'about' => $row['about'],
        ];
    } else {
        return null;
    }
}