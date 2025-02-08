<?php
// ajax.php
include "../database/config.php";

$request = $_REQUEST;

$columns = array(
    0 => 'id',
    1 => 'name',
    2 => 'email',
    3 => 'phone',
    4 => 'created_at',
);

// Get total number of records without any search
$sql = "SELECT COUNT(id) AS count FROM test";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$totalData = $row['count'];
$totalFiltered = $totalData;

// Search functionality
$sql = "SELECT * FROM test WHERE 1";
if (!empty($request['search']['value'])) {
    $sql .= " AND (name LIKE '" . $request['search']['value'] . "%' ";
    $sql .= " OR email LIKE '" . $request['search']['value'] . "%' ";
    $sql .= " OR phone LIKE '" . $request['search']['value'] . "%')";
}

$query = $conn->query($sql);
$totalFiltered = $query->num_rows;

// Apply sorting
$sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . " " . $request['order'][0]['dir'];

// Apply pagination
$sql .= " LIMIT " . $request['start'] . " ," . $request['length'] . " ";

$query = $conn->query($sql);

$data = array();
while ($row = $query->fetch_assoc()) {
    $nestedData = array();
    $nestedData[] = $row["id"];
    $nestedData[] = $row["name"];
    $nestedData[] = $row["email"];
    $nestedData[] = $row["phone"];
    $nestedData[] = $row["created_at"];
    $data[] = $nestedData;
}

// Prepare JSON response
$json_data = array(
    "draw" => intval($request['draw']),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);

echo json_encode($json_data);
?>