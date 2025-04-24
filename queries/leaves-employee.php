<?php include "../includes/config.php";

header('Content-Type: application/json');

$employeeId = $_SESSION['hrm_employeeId'];
$employeeName = $_SESSION['hrm_employeeName'];
$designationId = $_SESSION["hrm_designationId"];
$departmentId = $_SESSION["hrm_departmentId"];
$roleId = $_SESSION["hrm_roleId"];

$month = date('m');
$year = date('y');
$date = date('d');
$currentDatetime = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['flag'])) {

    $flag = $_POST['flag'];

    if ($flag === "insert") {

        $query = "SELECT * FROM `leave_requests` WHERE `employee_id` = '$employeeId' AND `leave_status` = 0 ORDER BY `leave_requests`.`id` DESC";
        $result = mysqli_query($conn, $query);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0) {
            echo json_encode(array('status' => 'failure', 'message' => 'Your last leave request was pending, contact Admin (or) HR.'));
            exit;
        }

        $leaveType = $_POST["leaveType"];
        $dayType = $_POST["dayType"];
        if ($dayType == 1) {
            $singleDate = !empty($_POST['singleDate']) ? "'" . date("Y-m-d", strtotime($_POST['singleDate'])) . "'" : "NULL";
            $singleDateDuration = !empty($_POST['singleDateDuration']) ? "'" . $_POST['singleDateDuration'] . "'" : "NULL";
            $fromDate = "NULL";
            $fromDateDuration = "NULL";
            $toDate = "NULL";
            $toDateDuration = "NULL";
        } else {
            $singleDate = "NULL";
            $singleDateDuration = "NULL";
            $fromDate = !empty($_POST['fromDate']) ? "'" . date("Y-m-d", strtotime($_POST['fromDate'])) . "'" : "NULL";
            $fromDateDuration = !empty($_POST['fromDateDuration']) ? "'" . $_POST['fromDateDuration'] . "'" : "NULL";
            $toDate = !empty($_POST['toDate']) ? "'" . date("Y-m-d", strtotime($_POST['toDate'])) . "'" : "NULL";
            $toDateDuration = !empty($_POST['toDateDuration']) ? "'" . $_POST['toDateDuration'] . "'" : "NULL";
        }
        $leaveReason = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['leaveReason'])));

        $query = "INSERT INTO `leave_requests` (`employee_id`, `leave_type_id`, `day_type`, `single_leave_date`, `single_leave_type`, `leave_from_date`, `leave_from_date_type`, `leave_to_date`, `leave_to_date_type`, `leave_reason`, `applied_at`, `leave_status`) VALUES ('$employeeId', '$leaveType', '$dayType', $singleDate, $singleDateDuration, $fromDate, $fromDateDuration, $toDate, $toDateDuration, '$leaveReason', '$currentDatetime', 0)";

        $result = mysqli_query($conn, $query);

        if ($dayType == 1) {
            // Single-day leave
            $leaveStatus = ($singleDateDuration === "Full Day") ? "Leave" : "$singleDateDuration";

            $insertQuery = "INSERT INTO attendance (`employee_id`, `record_date`, `status`) VALUES ('$employeeId', $singleDate, $leaveStatus)";
            mysqli_query($conn, $insertQuery);
        } else {
            // Multi-day leave
            $date1 = new DateTime($_POST["fromDate"]);
            $date2 = new DateTime($_POST["toDate"]);

            while ($date1 <= $date2) {
                $leaveDate = $date1->format('Y-m-d');

                if ($leaveDate == $fromDate && $fromDateDuration !== "Full Day") {
                    $leaveStatus = $fromDateDuration;
                } elseif ($leaveDate === $toDate && $toDateDuration !== "Full Day") {
                    $leaveStatus = $toDateDuration;
                } else {
                    $leaveStatus = 'Leave';
                }
                $insertQuery = "INSERT INTO attendance (`employee_id`, `record_date`, `status`) VALUES ('$employeeId', '$leaveDate', '$leaveStatus')";
                mysqli_query($conn, $insertQuery);

                $date1->modify('+1 day');
            }
        }

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Leave request added successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Leave request added failure'));
        }
        exit;
    } elseif ($flag === 'getAll') {

        $sql = "SELECT lr.*,ls.policy_name,e.official_name FROM `leave_requests` AS `lr` INNER JOIN `leave_settings` AS `ls` ON lr.leave_type_id = ls.id LEFT JOIN `employees` AS `e` ON lr.reviewed_by=e.employee_id WHERE lr.employee_id = '$employeeId'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $row['official_name'] = (is_null($row['official_name'])) ? '--' : $row['official_name'];

                if ($row['day_type'] == 1) {
                    $row['fromDate'] = date("d M Y", strtotime($row['single_leave_date']));
                    $row['toDate'] = date("d M Y", strtotime($row['single_leave_date']));

                    $row['fromDateDuration'] = $row['single_leave_type'];
                    $row['toDateDuration'] = $row['single_leave_type'];

                    $duration = ($row['single_leave_type'] == 'Full Day') ? 1 : 0.5;
                    if ($duration == 1) {
                        $row['days'] = "1 day";
                    } else {
                        $row['days'] = "0.5 day";
                    }
                } else {
                    $fromDateObj = new DateTime($row['leave_from_date']);
                    $toDateObj = new DateTime($row['leave_to_date']);

                    $row['fromDate'] = $fromDateObj->format("d M Y");
                    $row['toDate'] = $toDateObj->format("d M Y");

                    $row['fromDateDuration'] = $row['leave_from_date_type'];
                    $row['toDateDuration'] = $row['leave_to_date_type'];

                    $start = ($row['leave_from_date_type'] == 'Full Day') ? 1 : 0.5;
                    $end = ($row['leave_to_date_type'] == 'Full Day') ? 1 : 0.5;
                    if ($start == $end) {
                        if ($start == 1) {
                            $day = 1;
                        } else {
                            $day = 0;
                        }
                    } else {
                        if ($start == 1 && $end == 0.5) {
                            $day = 0.5;
                        } elseif ($start == 0.5 && $end == 1) {
                            $day = 0.5;
                        }
                    }

                    $diff = $fromDateObj->diff($toDateObj);
                    $daysCount = $diff->days + $day; // Include the end date
                    $row['days'] = $daysCount . ' days';
                }


                if ($row['leave_status'] == 0) {
                    $row['reviewed_by'] = "--";
                    $row['reviewed_at'] = "--";
                    $row['official_name'] = "--";
                } else {
                    $row['reviewed_by'] = $row['reviewed_by'];
                    $row['reviewed_at'] = $row['reviewed_at'];
                    $row['official_name'] = $row['official_name'];
                }

                if ($row['leave_status'] == 1) {
                    $row['leaveStatus'] = '<span class="badge badge-success d-inline-flex align-items-center badge-xs"><i class="ti ti-point-filled me-1"></i>Approved</span>';
                } elseif ($row['leave_status'] == 2) {
                    $row['leaveStatus'] = '<span class="badge badge-danger d-inline-flex align-items-center badge-xs"><i class="ti ti-point-filled me-1"></i>Declined</span>';
                } else {
                    $row['leaveStatus'] = '<span class="badge badge-purple d-inline-flex align-items-center badge-xs"><i class="ti ti-point-filled me-1"></i>Apply</span>';
                }

                $row['applied_at'] = date("d M Y", strtotime($row['applied_at']));
                $response[] = $row;
            }
        } else {
            $response = array();
        }
        echo json_encode($response);
        exit;
    } elseif ($flag === "getDetails") {

        $id = $_POST['id'];
        $query = "SELECT * FROM `leave_settings` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode(array('status' => 'success', 'data' => $row));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'something went wrong'));
        }
        exit;
    } elseif ($flag === "leavePolicyStatus") {

        $id = $_POST['id'];
        $activeStatus = $_POST['activeStatus'];

        $query = "UPDATE `leave_settings` SET `status`=$activeStatus,`updated_at`='$currentDatetime' WHERE `id`='$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Leave policy update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Leave policy update failure'));
        }
        exit;
    } elseif ($flag === "update") {

        $leaveType = $_POST['leaveType'];
        $days = $_POST['days'];
        $description = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['description'])));
        $rowId = $_POST['rowId'];

        $query = "UPDATE `leave_settings` SET `policy_name`='$leaveType',`days`='$days',`description`='$description',`updated_at`='$currentDatetime' WHERE `id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Leave policy update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Leave policy update failure'));
        }
        exit;
    }
}
