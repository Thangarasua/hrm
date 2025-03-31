<?php include "../includes/config.php";

header('Content-Type: application/json');

$month = date('m');
$year = date('y');
$date = date('d');
$currentDatetime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

    $flag = $_POST['flag'];

    if ($flag === "interviewForm") {

        $name = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['name'])));
        $phone = $_POST['phone'];
        $qualification = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['qualification'])));
        $experience = $_POST['totalExpYear'] . '.' . $_POST['totalExpMonth'] .' year'; 
        // $skills = json_encode($_POST['skills']);
        $skills = $_POST['skills'];
        $location = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['location'])));
        $available_time1 = $_POST['availabilityDate1'] . ' ' . $_POST['availabilityTime1']; 
        $available_time2 = !empty($_POST['availabilityDate2']) ? $_POST['availabilityDate2'] . ' ' . $_POST['availabilityTime2'] : NULL;
        $available_time3 = !empty($_POST['availabilityDate3']) ? $_POST['availabilityDate3'] . ' ' . $_POST['availabilityTime3'] : NULL; 
        $id = $_POST['id'];

        if (isset($_POST['candidate_profile']) && !empty($_POST['candidate_profile'])) {
            $base64_image = $_POST['candidate_profile'];
            $image_parts = explode(";base64,", $base64_image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            // Create a unique file name 
            $profile =  "{$name}_{$id}.{$image_type}";
            $file_path = '../uploads/candidate_profile/' . $profile;
            // Save the image to the server
            file_put_contents($file_path, $image_base64);
        } else {
            $profile =  '';
        }

        if (!empty($_FILES["resume"]["name"])) {
            $resumeName = basename($_FILES["resume"]["name"]);
            $fileType = pathinfo($resumeName, PATHINFO_EXTENSION); // Get the file extension

            if (strtolower($fileType) !== 'pdf') {
                $response = array(
                    'status' => 'failed',
                    'message' => 'Only PDF files are allowed.'
                );
                echo json_encode($response);
                exit;
            } else {
                $resume = "{$name}_{$id}_resume.pdf";
                $targetFilePath = '../uploads/candidate_resume/' . $resume;
                if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFilePath)) {
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $resume = 'No resume';
        }

        $query = "UPDATE `candidates` SET `candidate_name`='$name',`contact_number`='$phone',`address`='$location',`profile`='$profile',`resume`='$resume',`experience`='$experience',`skills`='$skills',`available_time1`='$available_time1',`available_time2`='$available_time2',`available_time3`='$available_time3',`created_at`='$currentDatetime',`responce_status`= 1,`interview_status`= 1 WHERE `candidate_id`='$id'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Form submited successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    }
}
