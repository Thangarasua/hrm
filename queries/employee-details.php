<?php include "../includes/config.php";

header('Content-Type: application/json');
$currentDatetime = date('Y-m-d H:i:s');

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
        $bankdocument = $_FILES['bankdocument'];
        $bankdocumentFileName = '';

        if (!empty($bankdocument['name'])) {
            $docName = $bankdocument['name'];
            $fileTmpName = $bankdocument['tmp_name'];
            $fileType = $bankdocument['type'];
            $allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($fileType, $allowedMimeTypes)) {
                echo json_encode(array('status' => 'failure', 'message' => 'Only PDF and image files are allowed. ' . $docName));
                exit;
            }

            $randomDigits = rand(100, 999);
            $fileExtension = pathinfo($docName, PATHINFO_EXTENSION);
            $newFileName = $employeeId . '_' . $randomDigits . '.' . $fileExtension;
            $filePath = '../uploads/employee_documents/bank_proof/' . $newFileName;

            if (move_uploaded_file($fileTmpName, $filePath)) {
                $bankdocumentFileName = $newFileName;
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Error uploading document.'));
                exit;
            }
        }

        $CheckQuery = "SELECT * FROM bank_info WHERE employee_id = '$employeeId'";
        $result = mysqli_query($conn, $CheckQuery);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $bankdocumentFileName = empty($bankdocumentFileName) ? $row['bank_proof'] : $bankdocumentFileName;
            $bankInfoQuery = "UPDATE bank_info SET bank_name = '$bankName', bank_account_number = $bankAccountNumber, ifsc_code = '$ifscCode', branch_name = '$branchName', bank_proof = '$bankdocumentFileName' WHERE employee_id = '$employeeId'";
        } else {
            $bankInfoQuery = "INSERT INTO bank_info (employee_id, bank_name, bank_account_number, ifsc_code, branch_name, bank_proof) VALUES ('$employeeId', '$bankName', $bankAccountNumber, '$ifscCode', '$branchName', '$bankdocumentFileName')";
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
        $experienceDocument = $_FILES['experienceDocument'];

        $words = explode(' ', $companyName);
        $firstWord = $words[0];

        if (!empty($experienceDocument['name'][0])) {

            $uploadedFiles = [];
            foreach ($experienceDocument['name'] as $key => $docName) {
                $fileTmpName = $experienceDocument['tmp_name'][$key];
                $fileType = $experienceDocument['type'][$key];
                $allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/webp'];
                if (!in_array($fileType, $allowedMimeTypes)) {
                    echo json_encode(array('status' => 'failure', 'message' => 'Only PDF and image files are allowed. ' . $docName));
                    exit;
                }
                $randomDigits = rand(100, 999);
                $fileExtension = pathinfo($docName, PATHINFO_EXTENSION);
                $newFileName = $employeeId . '_' . $firstWord . '_' . $randomDigits . '.' . $fileExtension;
                $filePath = '../uploads/employee_documents/experience_documents/' . $newFileName;

                if (move_uploaded_file($fileTmpName, $filePath)) {
                    $uploadedFiles[] = $newFileName;
                } else {
                    echo json_encode(array('status' => 'failure', 'message' => 'Error uploading document.'));
                    exit;
                }
            }

            $uploadedFilesJson = json_encode($uploadedFiles);

            $experienceInfoQuery = "INSERT INTO experience_info (employee_id, previous_employer, designation, start_date, end_date, work_experience, skills, documents) VALUES ('$employeeId', '$companyName', '$previousDesignation', '$startDate', '$endDate', '$workExperience', '$skils', '$uploadedFilesJson')";
            if (mysqli_query($conn, $experienceInfoQuery)) {
                echo json_encode(array('status' => 'success', 'message' => 'Experience Information Updated Successfully.'));
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Error adding experience data.'));
            }
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'No documents uploaded.'));
        }
    }

    if ($flag === "educationInfo") {
        $employeeId = $_POST['employeeID'];
        $courseCategory = $_POST['category'];
        $educationDocuments = $_FILES['education_documents'];

        if (!empty($educationDocuments['name'][0])) {
            $uploadedFiles = [];
            foreach ($educationDocuments['name'] as $key => $docName) {
                $fileTmpName = $educationDocuments['tmp_name'][$key];
                $fileType = $educationDocuments['type'][$key];

                if ($fileType !== 'application/pdf') {
                    echo json_encode(array('status' => 'failure', 'message' => 'Only PDF files are allowed.'));
                    exit;
                }
                $randomDigits = rand(100, 999);
                $fileExtension = pathinfo($docName, PATHINFO_EXTENSION);
                $newFileName = $courseCategory . '_' . $employeeId . '_' . $randomDigits . '.' . $fileExtension;
                $filePath = '../uploads/employee_documents/education_documents/' . $newFileName;

                if (move_uploaded_file($fileTmpName, $filePath)) {
                    $uploadedFiles[] = $newFileName;
                } else {
                    echo json_encode(array('status' => 'failure', 'message' => 'Error uploading document.'));
                    exit;
                }
            }

            $uploadedFilesJson = json_encode($uploadedFiles);

            $CheckQuery = "SELECT * FROM `education_info` WHERE `employee_id` = '$employeeId' AND `category` = '$courseCategory'";
            $result = mysqli_query($conn, $CheckQuery);

            if (mysqli_num_rows($result) > 0) {
                $educationInfoQuery = "UPDATE `education_info` SET `documents` = '$uploadedFilesJson' WHERE `employee_id` = '$employeeId' AND `category` = '$courseCategory'";
            } else {
                $educationInfoQuery = "INSERT INTO `education_info` (employee_id, category, documents) 
                                        VALUES ('$employeeId', '$courseCategory', '$uploadedFilesJson')";
            }

            if (mysqli_query($conn, $educationInfoQuery)) {
                echo json_encode(array('status' => 'success', 'message' => 'Education Information Updated Successfully.'));
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Error updating education data.'));
            }
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'No documents uploaded.'));
        }
    }

    if ($flag === "update") {
        $employeeId = $_POST['employeeID'];
        $officialName = $_POST['employeeOfficalName'];
        $personalName = $_POST['employeePersonalName'];
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
        $workMode = $_POST['workMode'];
        $workType = $_POST['workType'];
        $workLocation = $_POST['workLocation'];
        $employeeStatus = $_POST['employeeStatus'];
        if ($employeeStatus == 2) {
            $relievingDate = date("Y-m-d", strtotime($_POST['relievingDate']));
            $status = ",status = '2', relieving_date = '$relievingDate'";
        } else {
            $status = ",status = '1'";
        }

        $updateQuery = "UPDATE employees SET official_name = '$officialName', personal_name = '$personalName', email = '$email', phone = '$phone', doj = '$doj', `password` = '$encryptedPassword', designation_id = $designation, department_id = $department, role_id = $role, manager_id = '$manager', supervisor_id = '$supervisor', `work_mode`='$workMode',`work_type`='$workType', work_location = '$workLocation' $status WHERE employee_id = '$employeeId'";
        if (mysqli_query($conn, $updateQuery)) {
            echo json_encode(array('status' => 'success', 'message' => 'Employee data updated successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error updating employee data.'));
        }
    }

    if ($flag === "PersonalInfo") {
        $employeeId = $_POST['employeeID'];

        $personalPhone = $_POST['personalPhone'];
        $personalEmail = $_POST['personalEmail'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $dob = date('Y-m-d', strtotime($dob));
        $permanentAddress = $_POST['permanentAddress'];
        $presentAddress = $_POST['presentAddress'];
        $addressProof = $_FILES['addressProof'];

        $passportNo = $_POST['passportNo'];
        $passportExpiryDate = $_POST['passportExpiryDate'];
        $passportExpiryDate = date('Y-m-d', strtotime($passportExpiryDate));
        $nationality = $_POST['nationality'];
        $religion = $_POST['religion'];
        $maritalStatus = $_POST['maritalStatus'];
        $employmentSpouse = $_POST['employmentSpouse'];
        $children = $_POST['children'];

        $primaryContacts = $_POST['primaryContact'];
        $primaryRelationship = $_POST['primaryRelationship'];
        $primaryContactPhone = $_POST['primaryContactPhone'];
        $secondaryContact = $_POST['secondaryContact'];
        $secondaryRelationship = $_POST['secondaryRelationship'];
        $secondaryContactPhone = $_POST['secondaryContactPhone'];

        $addressProofFileName = '';

        if (!empty($addressProof['name'])) {
            $docName = $addressProof['name'];
            $fileTmpName = $addressProof['tmp_name'];
            $fileType = $addressProof['type'];
            if ($fileType !== 'application/pdf') {
                echo json_encode(array('status' => 'failure', 'message' => 'Only PDF files are allowed.' . $docName));
                exit;
            }

            $randomDigits = rand(100, 999);
            $fileExtension = pathinfo($docName, PATHINFO_EXTENSION);
            $newFileName = $employeeId . '_' . $randomDigits . '.' . $fileExtension;
            $filePath = '../uploads/employee_documents/address_documents/' . $newFileName;

            if (move_uploaded_file($fileTmpName, $filePath)) {
                $addressProofFileName = $newFileName;
            } else {
                echo json_encode(array('status' => 'failure', 'message' => 'Error uploading document.'));
                exit;
            }
        }


        $CheckQuery = "SELECT * FROM personal_info WHERE employee_id = '$employeeId'";
        $result = mysqli_query($conn, $CheckQuery);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $addressProofFileName = empty($addressProofFileName) ? $row['address_proof'] : $addressProofFileName;
            $query = "UPDATE `personal_info` SET phone = '$personalPhone', email = '$personalEmail', `dob` = '$dob', `gender` = '$gender', `permanent_address` = '$permanentAddress', `present_address` = '$presentAddress', `nationality` = '$nationality', `marital_status` = '$maritalStatus', `religion` = '$religion', `passpor_no` = '$passportNo', `passport_expiry_date` = '$passportExpiryDate', `employment_spouse` = '$employmentSpouse', `children` = '$children', `primary_contact` = '$primaryContacts', `primary_relationship` = '$primaryRelationship', `primary_phone` = '$primaryContactPhone', `secondary_contact` = '$secondaryContact', `secondary_relationship` = '$secondaryRelationship', `secondary_phone` = '$secondaryContactPhone', `address_proof` = '$addressProofFileName' WHERE `employee_id` = '$employeeId';";
        } else {
            $query = "INSERT INTO `personal_info` (`employee_id`,`phone`,`email`, `dob`, `gender`, `permanent_address`, `present_address`, `nationality`, `marital_status`, `religion`, `passpor_no`, `passport_expiry_date`, `employment_spouse`, `children`, `primary_contact`, `primary_relationship`, `primary_phone`, `secondary_contact`, `secondary_relationship`, `secondary_phone`, `address_proof`, `profile_photo`) VALUES ('$employeeId', '$personalPhone', '$personalEmail', '$dob', '$gender', '$permanentAddress', '$presentAddress', '$nationality', '$maritalStatus', '$religion', '$passportNo', '$passportExpiryDate', '$employmentSpouse', '$children', '$primaryContacts', '$primaryRelationship ', '$primaryContactPhone', '$secondaryContact', '$secondaryRelationship', '$secondaryContactPhone', '$addressProofFileName', '')";
        }
        if (mysqli_query($conn, $query)) {
            echo json_encode(array('status' => 'success', 'message' => 'Personal Information Updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding personal data.'));
        }
    }

    if ($flag === "familyInfo") {
        $employeeId = $_POST['employeeID'];
        $relationName = $_POST['relationName'];
        $relationPhone = $_POST['relationPhone'];
        $relationship = $_POST['relationship'];
        $relationAddress = $_POST['relationAddress'];

        $query = "INSERT INTO `family_info` (`employee_id`, `relation_name`, `relationship`, `relation_phone`, `relation_address`) VALUES ('$employeeId', '$relationName', '$relationship', '$relationPhone', '$relationAddress')";
        if (mysqli_query($conn, $query)) {
            echo json_encode(array('status' => 'success', 'message' => 'Family Information Updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Error adding family data.'));
        }
    }

    if ($flag === "profilePhoto") {
        $employeeId = $_POST['employeeID'];

        if (isset($_POST['employeeProfile']) && !empty($_POST['employeeProfile'])) {
            $base64_image = $_POST['employeeProfile'];
            $image_parts = explode(";base64,", $base64_image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            // Create a unique file name  
            $profile =  "{$employeeId}.{$image_type}";
            $file_path = '../uploads/employee_documents/profile_photo/' . $profile;
            // Save the image to the server
            file_put_contents($file_path, $image_base64);
        } else {
            $profile =  '';
            echo json_encode(array('status' => 'failure', 'message' => 'Error uploading document.'));
            exit;
        }

        $CheckQuery = "SELECT * FROM personal_info WHERE employee_id = '$employeeId'";
        $result = mysqli_query($conn, $CheckQuery);
        if (mysqli_num_rows($result) > 0) {
            $query = "UPDATE `personal_info` SET `profile_photo` = '$profile' WHERE `employee_id` = '$employeeId'";
        } else {
            $query = "INSERT INTO `personal_info`(`employee_id`,`profile_photo`) VALUES ('$employeeId', '$profile')";
        }
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Successfully updated profile picture.'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Something went wrong uploading.'));
        }
        exit;
    }
}
