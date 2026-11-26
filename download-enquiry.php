<?php
include 'config.php';

// Filters
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$fromDate = isset($_GET['from']) ? $_GET['from'] : '';
$toDate = isset($_GET['to']) ? $_GET['to'] : '';

$search = $conn->real_escape_string($search);
$fromDate = $conn->real_escape_string($fromDate);
$toDate = $conn->real_escape_string($toDate);

$where = "WHERE 1";

if (!empty($search)) {
    $where .= " AND (name LIKE '%$search%' OR email LIKE '%$search%' OR source LIKE '%$search%')";
}
if (!empty($fromDate)) {
    $where .= " AND DATE(submitted_at) >= '$fromDate'";
}
if (!empty($toDate)) {
    $where .= " AND DATE(submitted_at) <= '$toDate'";
}

$filename = "Enquiry_Records_" . date("Y-m-d") . ".csv";

header("Content-Type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

$output = fopen("php://output", "w");

// Heading row
fputcsv($output, ["Name", "Email", "Phone", "Source", "Submitted At"]);

$sql = "SELECT * FROM contact_form $where ORDER BY id DESC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $phone = $row['country_code'] . " " . $row['mobile'];

        fputcsv($output, [
            $row['name'],
            $row['email'],
            $phone,
            $row['source'],
            $row['submitted_at']
        ]);
    }
}

fclose($output);
exit;
