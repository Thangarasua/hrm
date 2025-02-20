<?php include(__DIR__ . "/../includes/config.php");

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

function getMapUsers() {
    global $conn;
    $query = "SELECT * FROM roles WHERE status = 1 ORDER BY role_name ASC";
    $result = mysqli_query($conn, $query);
    $options = '';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['role_id'] . '">' . htmlspecialchars($row['role_name']) . '</option>';
    }
    return $options;
}