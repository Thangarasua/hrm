<?php
include(__DIR__ . '/../includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['updateProduction'])) {
    $currentDate = date("Y-m-d");
    $now = time();
    $updated = 0;
    $errors = [];

    // Get all attendance records for today with a check-in time
    $query = "SELECT * FROM attendance WHERE record_date = '$currentDate' AND check_in IS NOT NULL";
    global $conn;
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $employeeId = $row['employee_id'];
            $checkInTime = strtotime($row['check_in']);

            // Set end time — either now or 23:59:59
            $endTime = ($now >= strtotime("23:59:00")) ? strtotime("23:59:59") : $now;

            $diffSeconds = $endTime - $checkInTime;

            // Format difference into HH:MM:SS
            $hours = floor($diffSeconds / 3600);
            $minutes = floor(($diffSeconds % 3600) / 60);
            $seconds = $diffSeconds % 60;
            $productionTime = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

            $updateQuery = "UPDATE attendance 
                            SET production_hours = '$productionTime' 
                            WHERE employee_id = '$employeeId' 
                              AND record_date = '$currentDate'";

            if (mysqli_query($conn, $updateQuery)) {
                $updated++;
            } else {
                $errors[] = "Failed to update $employeeId: " . mysqli_error($conn);
            }
        }

        echo json_encode([
            'status' => 'success',
            'updated' => $updated,
            'errors' => $errors
        ]);
    } else {
        echo json_encode([
            'status' => 'info',
            'message' => 'No attendance check-ins found for today.'
        ]);
    }
}
