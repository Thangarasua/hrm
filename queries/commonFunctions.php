<?php 
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
    $query = "SELECT *,e.status AS empStatus FROM `employees` AS e INNER JOIN roles AS r ON r.role_id = e.role_id INNER JOIN departments AS dp ON dp.department_id=e.department_id INNER JOIN designations AS dg ON dg.designation_id=e.designation_id WHERE `employee_id` = '$employeeId'";
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
            'doj' => date("d-m-Y", strtotime($row['doj'])),
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
            'status' => $row['status'],
            'password' => $decryptPassword,

        ];
    } else {
        return null;
    }
};

function getMyProfileInfo($employeeId) {
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
            'password' => $decryptPassword,
            'encrypyEmployeeId' => base64_encode($row['employee_id']),

        ];
    } else {
        return null;
    }
};

function getExperienceInfo($employeeId) {
    global $conn;
    $query = "SELECT * FROM `experience_info` WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $output = '';
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $companyName = htmlspecialchars($row['previous_employer']);
            $jobTitle = htmlspecialchars($row['designation']);
            $startDate = htmlspecialchars($row['start_date']);
            $endDate = htmlspecialchars($row['end_date']);
            $output .= '
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="d-inline-flex align-items-center fw-medium">' . $companyName . '</h6>
                        <span class="d-flex align-items-center badge bg-secondary-transparent mt-1">
                            <i class="ti ti-point-filled me-1"></i>' . $jobTitle . '
                        </span>
                    </div>
                    <p class="text-dark">' . formatDateRange($startDate, $endDate) . '</p>
                </div>
            </div>';
        }
    } else {
        $output = "<p>No experience information found.</p>";
    }
    return $output;
}

function getEducationInfo($employeeId) {
    global $conn;
    $query = "SELECT * FROM `education_info` WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $output = '';
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $institutionName = htmlspecialchars($row['institution_name']);
            $course = htmlspecialchars($row['course']);
            $startDate = htmlspecialchars($row['start_date']);
            $endDate = htmlspecialchars($row['end_date']);
            $output .= '
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="d-inline-flex align-items-center fw-normal">
                            ' . $institutionName . '
                        </span>
                        <h6 class="d-flex align-items-center mt-1">' . $course . '</h6>
                    </div>
                    <p class="text-dark">' . formatDateRange($startDate, $endDate) . '</p>
                </div>
            </div>';
        }
    } else {
        $output = "<p>No education information found.</p>";
    }
    return $output;
}

function formatDateRange($startDate, $endDate) {
    $formattedStartDate = date("M Y", strtotime($startDate));
    $formattedEndDate = ($endDate == "Present") ? "Present" : date("M Y", strtotime($endDate));
    return $formattedStartDate . ' - ' . $formattedEndDate;
}

