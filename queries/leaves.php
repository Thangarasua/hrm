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

    if ($flag === 'getAll') {

        if (in_array($departmentId, [1, 2, 3, 5])) {
            $departmentWise = "1";
        } else {
            $departmentWise = "e.department_id = $departmentId";
        }

        $leavePolicy = (is_null($_POST['leavePolicy']) || $_POST['leavePolicy'] === '') ? '1' : "lr.leave_type_id = '" . $_POST['leavePolicy'] . "'"; 
        $dateRange = (is_null($_POST['dateRange']) || $_POST['dateRange'] === '') ? '1' : "lr.applied_at BETWEEN '" . $_POST['fromDate'] . " 00:00:00' AND '" . $_POST['toDate'] . " 23:59:00'";   

        $sql = "SELECT lr.*,ls.policy_name,e.official_name AS employee,e1.official_name AS approved,dg.designation_title,pi.profile_photo FROM `leave_requests` AS `lr` INNER JOIN `leave_settings` AS `ls` ON lr.leave_type_id = ls.id LEFT JOIN `employees` AS `e` ON lr.employee_id=e.employee_id LEFT JOIN `employees` AS `e1` ON lr.employee_id=e1.employee_id LEFT JOIN `designations` AS `dg` ON dg.designation_id=e.designation_id LEFT JOIN `personal_info` AS `pi` ON pi.employee_id=e.employee_id WHERE $leavePolicy AND $dateRange AND $departmentWise";
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

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
                    $row['official_name'] = "Still not work";
                } else {
                    $row['reviewed_by'] = $row['reviewed_by'];
                    $row['reviewed_at'] = $row['reviewed_at'];
                    $row['official_name'] = $row['employee'];
                }

                if ($row['leave_status'] == 1) {
                    $row['leaveStatus'] = '<span class="badge badge-success d-inline-flex align-items-center badge-xs"><i class="ti ti-point-filled me-1"></i>Approved</span>';
                } elseif ($row['leave_status'] == 2) {
                    $row['leaveStatus'] = '<span class="badge badge-danger d-inline-flex align-items-center badge-xs"><i class="ti ti-point-filled me-1"></i>Declined</span><a href="#" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="' . $row['rejection_comments'] . '">
											<i class="ti ti-info-circle text-info"></i>
										</a>';
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
    } elseif ($flag === "update") {

        $rowId = $_POST['rowId'];
        $approveStatus = $_POST['approveStatus'];
        $reason = $conn->real_escape_string(trim(preg_replace('/\s+/', ' ', $_POST['reason'])));

        $query = "UPDATE `leave_requests` SET `leave_status`=$approveStatus,`reviewed_by`='$employeeId',`reviewed_at`='$currentDatetime',`rejection_comments`='$reason' WHERE `id`='$rowId'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Leave Request update successfully'));
        } else {
            echo json_encode(array('status' => 'failure', 'message' => 'Leave Request update failure'));
        }
        exit;
    }
}
