<?php 
include(__DIR__ . '/../includes/config.php');

$employeeId = $_SESSION['hrm_employeeId'];
$employeeType = substr($employeeId, 0, 4); 

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
    $query = "SELECT * FROM employees WHERE `role_id` = $user AND status = 1 ORDER BY `employee_id` ASC";
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
            'branchName' => $row['branch_name'],
            'bankProof' => $row['bank_proof'],
            'bankProofFile' => './uploads/employee_documents/bank_proof/'.$row['bank_proof'],
        ];
    } else {
        return null;
    }
};

function getEmployeeInfo($employeeId) {
    global $conn; 
    $query = "SELECT *,e.status AS empStatus FROM employees AS e INNER JOIN roles AS r ON r.role_id = e.role_id INNER JOIN departments AS dp ON dp.department_id=e.department_id INNER JOIN designations AS dg ON dg.designation_id=e.designation_id WHERE `employee_id` = '$employeeId'";
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
            'workMode' => $row['work_mode'],
            'workType' => $row['work_type'],
            'workLocation' => $row['work_location'],
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
    $query = "SELECT * FROM employees AS e INNER JOIN roles AS r ON r.role_id = e.role_id INNER JOIN departments AS dp ON dp.department_id=e.department_id INNER JOIN designations AS dg ON dg.designation_id=e.designation_id WHERE `employee_id` = '$employeeId'";
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
            $id = htmlspecialchars($row['id']);
            $companyName = htmlspecialchars($row['previous_employer']);
            $jobTitle = htmlspecialchars($row['designation']);
            $startDate = htmlspecialchars($row['start_date']);
            $endDate = htmlspecialchars($row['end_date']);
            $existingDocuments = json_decode($row['documents']);
            
            $output .= '
            <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="d-inline-flex align-items-center fw-medium">' . $companyName . '</h6>
                        <span class="d-flex align-items-center badge bg-secondary-transparent mt-1">
                            <i class="ti ti-point-filled me-1"></i>' . $jobTitle . '
                        </span>
                    </div>
                    <div>
                        <a href="#" class="btn btn-sm btn-icon btn-primary edit-experience-btn" data-bs-toggle="modal" data-bs-target="#edit_experience" 
                        data-category="' . $id . '">
                            <i class="ti ti-edit"></i>
                        </a>
                        <p class="text-dark">' . formatDateRange($startDate, $endDate) . '</p>
                    </div>
                </div>';

            // Document section
            if (!empty($existingDocuments)) {
                $output .= '<div class="mt-2">Documents:<ul class="list-unstyled d-flex flex-wrap">';
                $counter = 1;
                foreach ($existingDocuments as $doc) {
                    $filePath = './uploads/employee_documents/experience_documents/' . $doc;
                    $output .= '<li class="d-flex align-items-center mr-3">'; 
                    $output .= '<a href="#" class="previewDocument" data-file-url="' . ($filePath ? $filePath : '') . '">';
                    $output .= '<i class="fa fa-file-alt iconStyle educationIcon"></i>';
                    $output .= '</a>';
                    $output .= '</li>';
                    $counter++; 
                }
                $output .= '</ul></div>';
            }

            $output .= '</div>';
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

    $output = '';
    foreach ($categories as $category) {
        $existingDocuments = [];
        $docQuery = "SELECT `documents` FROM `education_info` WHERE `employee_id` = '$employeeId' AND `category` = '$category'";
        $docResult = mysqli_query($conn, $docQuery);

        if ($docResult && mysqli_num_rows($docResult) > 0) {
            while ($docRow = mysqli_fetch_assoc($docResult)) {
                // $documents = json_decode($docRow['documents'], true);
                $documents = !empty($docRow['documents']) ? json_decode($docRow['documents'], true) : [];
                if (is_array($documents)) {
                    $existingDocuments = array_merge($existingDocuments, $documents); 
                }
            }
        }

        $output .= '
        <div class="mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="d-flex align-items-center mt-1"><b>' . $category . '</b></h6>
                </div>
                <div>
                    <!-- Edit button for each category -->
                    <a href="#" class="btn btn-sm btn-icon btn-primary edit-education-btn" data-bs-toggle="modal" data-bs-target="#edit_education" 
                       data-category="' . $category . '">
                        <i class="ti ti-edit"></i>
                    </a>
                </div>
            </div>';

            if (!empty($existingDocuments)) {
                $output .= '<div class="mt-2"><strong>Documents:</strong><ul class="list-unstyled d-flex flex-wrap">';
                $counter = 1;
                foreach ($existingDocuments as $doc) {
                    $filePath = './uploads/employee_documents/education_documents/' . $doc;
                    $output .= '<li class="d-flex align-items-center mr-3">'; 
                    $output .= '<a href="#" class="previewDocument" data-file-url="' . ($filePath ? $filePath : '') . '">';
                    $output .= '<i class="fa fa-file-alt iconStyle educationIcon"></i>';
                    $output .= '</a>';
                    $output .= '</li>';
                    $counter++; 
                }
                $output .= '</ul></div>';
            }
             else {
                $output .= '<div class="mt-2"><i>No documents uploaded for this category.</i></div>';
            }
        $output .= '</div>';
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
            'addressPoof' => $row['address_proof'],
            'profilePhoto' => $row['profile_photo'],
            'addressPoofFile' => './uploads/employee_documents/address_documents/'.$row['address_proof'],
            'profilePhotoFile' => './uploads/employee_documents/profile_photo/'.$row['profile_photo'],
        ];
    } else {
        return null;
    }
};

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {
    global $conn;
    
    $flag = $_POST['flag'];
    $key = "ACTEHRM2025";
    $method = "AES-256-CBC";
    $iv = substr(hash('sha256', $key), 0, 16);
    if ($flag === "updatePassword") {
        $employeeId = $_POST['employeeID'];
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];

        $query = "SELECT * FROM employees WHERE employee_id = '$employeeId'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $encryptedPassword = $row['password'];
        $decryptedPassword = openssl_decrypt($encryptedPassword, $method, $key, 0, $iv);

        if ($currentPassword !== $decryptedPassword) {
            echo json_encode(array('status' => 'failure', 'message' => 'Current password does not match.'));
            exit;
        } else {
            $encryptedNewPassword = openssl_encrypt($newPassword, $method, $key, 0, $iv);

            $updateQuery = "UPDATE employees SET `password` = '$encryptedNewPassword' WHERE employee_id = '$employeeId'"; 
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

function getProfileProgress($employeeId) {
    global $conn;
    $completedChecks = 0;

    $tables = ['employees', 'experience_info', 'education_info', 'personal_info'];

    foreach ($tables as $table) {
        $query = "SELECT * FROM `$table` WHERE `employee_id` = '$employeeId'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $completedChecks++;
        }
    }

    $queryPhoto = "SELECT `profile_photo` FROM `personal_info` WHERE `employee_id` = '$employeeId' AND `profile_photo` != ''";
    $resultPhoto = mysqli_query($conn, $queryPhoto);

    if ($resultPhoto && mysqli_num_rows($resultPhoto) > 0) {
        $completedChecks++;
    }

    $progressPercent = $completedChecks * 20;
    return $progressPercent;
}

