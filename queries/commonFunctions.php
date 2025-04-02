<?php 
include(__DIR__ . '/../includes/config.php');

$employeeId = $_SESSION['hrm_employeeId'];
$employeeType = substr($employeeId, 0, 4);
global $employeeTable; // Declare global variable
$employeeTable = ($employeeType === 'TEMP') ? 'temporary_employees' : 'employees';

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

function getJobLevels() {
    global $conn;
    $query = "SELECT r.* FROM roles AS r LEFT JOIN salary_structure AS s ON s.role_id=r.role_id ORDER BY role_name ASC";
    $result = mysqli_query($conn, $query); 
    $options = '<option value="">Select</option>';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['role_id'] . '">' . htmlspecialchars($row['role_name']) . '</option>';
    }
    return $options;
};

function getManagerUsers($user, $currentUserId = null) {
    global $conn;
    global $employeeTable;
    $query = "SELECT * FROM $employeeTable WHERE `role_id` = $user AND status = 1 ORDER BY `employee_id` ASC";
    $result = mysqli_query($conn, $query);
    $options = '';

    while ($row = $result->fetch_assoc()) {
        $selected = ($row['employee_id'] == $currentUserId) ? 'selected' : '';
        $options .= '<option value="' . $row['employee_id'] . '" ' . $selected . '>' . htmlspecialchars($row['official_name']) . '</option>';
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
    global $employeeTable;
    $query = "SELECT *,e.status AS empStatus FROM $employeeTable AS e INNER JOIN roles AS r ON r.role_id = e.role_id INNER JOIN departments AS dp ON dp.department_id=e.department_id INNER JOIN designations AS dg ON dg.designation_id=e.designation_id WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $key = "ACTEHRM2025";
    $method = "AES-256-CBC";
    $iv = substr(hash('sha256', $key), 0, 16);
    if ($result && $row = $result->fetch_assoc()) {
        $decryptPassword = openssl_decrypt($row['password'], $method, $key, 0, $iv);
        return [
            'employeeId' => $row['employee_id'],
            'OfficialName' => $row['official_name'],
            'personalName' => $row['personal_name'],
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
    global $employeeTable;
    $query = "SELECT * FROM $employeeTable AS e INNER JOIN roles AS r ON r.role_id = e.role_id INNER JOIN departments AS dp ON dp.department_id=e.department_id INNER JOIN designations AS dg ON dg.designation_id=e.designation_id WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $key = "ACTEHRM2025";
    $method = "AES-256-CBC";
    $iv = substr(hash('sha256', $key), 0, 16);
    if ($result && $row = $result->fetch_assoc()) {
        $decryptPassword = openssl_decrypt($row['password'], $method, $key, 0, $iv);
        return [
            'employeeId' => $row['employee_id'],
            'officialName' => $row['official_name'],
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
    $existingData = [];
    $defaultCategories = ['SSLC', 'HSC', 'UG', 'PG'];

    $query = "SELECT DISTINCT `category` FROM `education_info` WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $categories = $defaultCategories;

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $category = htmlspecialchars($row['category']);
            if (!in_array($category, $categories)) {
                $categories[] = $category;
            }
        }
    }

    $query = "SELECT * FROM `education_info` WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $category = htmlspecialchars($row['category']);
            $existingData[$category] = $row;
        }
    }
    $output = '';
    foreach ($categories as $category) {
        $institutionName = isset($existingData[$category]) ? htmlspecialchars($existingData[$category]['institution_name']) : 'NA';
        if ($category == 'SSLC' || $category == 'HSC') {
            $course = isset($existingData[$category]) ? htmlspecialchars($existingData[$category]['course']) : $category;
        } else {
            $course = isset($existingData[$category]) ? htmlspecialchars($existingData[$category]['course']) : 'NA';
        }
        $startDate = isset($existingData[$category]) ? htmlspecialchars($existingData[$category]['start_date']) : '';
        $endDate = isset($existingData[$category]) ? htmlspecialchars($existingData[$category]['end_date']) : '';

        $output .= '
        <div class="mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="d-flex align-items-center mt-1"><b>' . $category . '</b></h6>
                    <a href="#" class="btn btn-icon btn-sm edit-education-btn" data-bs-toggle="modal" data-bs-target="#edit_education" 
                       data-category="' . $category . '" 
                       data-institution="' . $institutionName . '" 
                       data-course="' . $course . '" 
                       data-startdate="' . $startDate . '" 
                       data-enddate="' . $endDate . '">
                        <i class="ti ti-edit"></i>
                    </a>
                    <span class="d-inline-flex align-items-center fw-normal">' . $institutionName . '</span>
                </div>
                <div>
                    <span class="d-inline-flex align-items-center fw-normal">' . $course . '</span>
                    <p class="text-dark">' . formatDateRange($startDate, $endDate) . '</p>
                </div>
            </div>
        </div>';
    }
    return $output;
}


function formatDateRange($startDate, $endDate) {
    $formattedStartDate = date("M Y", strtotime($startDate));
    $formattedEndDate = ($endDate == "Present") ? "Present" : date("M Y", strtotime($endDate));
    return $formattedStartDate . ' - ' . $formattedEndDate;
}

function getPersonalInfo($employeeId) {
    global $conn;
    $query = "SELECT * FROM personal_info WHERE employee_id = '$employeeId'";
    $result = mysqli_query($conn, $query);
    if ($result && $row = $result->fetch_assoc()) {
        return [
            'phone' => $row['phone'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'dob' => $row['dob'],
            'permanentAddress' => $row['permanent_address'],
            'presentAddress' => $row['present_address'],
            'passportNo' => $row['passpor_no'],
            'passportExpiryDate' => $row['passport_expiry_date'],
            'nationality' => $row['nationality'],
            'religion' => $row['religion'],
            'maritalStatus' => $row['marital_status'],
            'employmentSpouse' => $row['employment_spouse'],
            'children' => $row['children'],
            'primaryContacts' => $row['primary_contact'],
            'primaryRelationship' => $row['primary_relationship'],
            'primaryContactPhone' => $row['primary_phone'],
            'secondaryContact' => $row['secondary_contact'],
            'secondaryRelationship' => $row['secondary_relationship'],
            'secondaryContactPhone' => $row['secondary_phone'],
        ];
    } else {
        return null;
    }
};

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    global $conn;
    global $employeeTable;
    $flag = $_POST['flag'];
    $key = "ACTEHRM2025";
    $method = "AES-256-CBC";
    $iv = substr(hash('sha256', $key), 0, 16);
    if ($flag === "updatePassword") {
        $employeeId = $_POST['employeeID'];
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];

        $query = "SELECT * FROM $employeeTable WHERE employee_id = '$employeeId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $encryptedPassword = $row['password'];
        $decryptedPassword = openssl_decrypt($encryptedPassword, $method, $key, 0, $iv);

        if ($currentPassword !== $decryptedPassword) {
            echo json_encode(array('status' => 'failure', 'message' => 'Current password does not match.'));
            exit;
        } else {
            $encryptedNewPassword = openssl_encrypt($newPassword, $method, $key, 0, $iv);

            $updateQuery = "UPDATE $employeeTable SET `password` = '$encryptedNewPassword' WHERE employee_id = '$employeeId'"; 
            if (mysqli_query($conn, $updateQuery)) {
                echo json_encode(array('status' => 'success', 'message' => 'Password updated successfully.'));
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Error updating password.'));
            }
        }
    
    }
}

function getFamilyInfo($employeeId) {
    global $conn;
    $query = "SELECT * FROM `family_info` WHERE `employee_id` = '$employeeId'";
    $result = mysqli_query($conn, $query);
    $output = '';
    
    // Check if data exists
    if ($result && mysqli_num_rows($result) > 0) {
        // Start the row for labels
        $output .= '
        <div class="row">
            <div class="col-md-3">
                <span class="d-inline-flex align-items-center">Name</span>
            </div>
            <div class="col-md-3">
                <span class="d-inline-flex align-items-center">Relationship</span>
            </div>
            <div class="col-md-3">
                <span class="d-inline-flex align-items-center">Date of birth</span>
            </div>
            <div class="col-md-3">
                <span class="d-inline-flex align-items-center">Phone</span>
            </div>
        </div>';

        // Now loop through family members and display their details
        while ($row = mysqli_fetch_assoc($result)) {
            $relationName = htmlspecialchars($row['relation_name']);
            $relationship = htmlspecialchars($row['relationship']);
            $relationAddress = htmlspecialchars($row['relation_address']);
            $relationPhone = htmlspecialchars($row['relation_phone']);

            // Display the family member's information
            $output .= '
            <div class="row">
                <div class="col-md-3">
                    <h6 class="d-flex align-items-center fw-medium mt-1">' . $relationName . '</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="d-flex align-items-center fw-medium mt-1">' . $relationship . '</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="d-flex align-items-center fw-medium mt-1">' . $relationAddress . '</h6>
                </div>
                <div class="col-md-3">
                    <h6 class="d-flex align-items-center fw-medium mt-1">' . $relationPhone . '</h6>
                </div>
            </div>';
        }
    } else {
        $output = "<p>No family information found.</p>";
    }
    return $output;
}

