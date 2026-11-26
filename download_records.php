
<?php

include 'config.php';

date_default_timezone_set('Asia/Kolkata');

header(
"Content-Type: application/vnd.ms-excel"
);

header(
"Content-Disposition: attachment; filename=enquiry_records_".date('Ymd_His').".xls"
);

$search=$_GET['search'] ?? '';
$from=$_GET['from'] ?? '';
$to=$_GET['to'] ?? '';

$where="WHERE 1";

if($search!=''){
$where.=" AND (
name LIKE '%".$conn->real_escape_string($search)."%'
OR
email LIKE '%".$conn->real_escape_string($search)."%'
OR
project_name LIKE '%".$conn->real_escape_string($search)."%'
)";
}

if($from!=''){
$where.=" AND DATE(submitted_at)>='$from'";
}

if($to!=''){
$where.=" AND DATE(submitted_at)<='$to'";
}

$sql=
"
SELECT *
FROM contact_form
$where
ORDER BY id DESC
";

$result=
$conn->query($sql);

echo "
<table border='1'>

<tr>

<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Project</th>
<th>Submitted At</th>

</tr>
";

while(
$row=
$result->fetch_assoc()
){

echo "

<tr>

<td>".$row['name']."</td>

<td>".$row['email']."</td>

<td>".$row['country_code']." ".$row['mobile']."</td>

<td>".$row['project_name']."</td>

<td>"
.date(
'd M Y h:i A',
strtotime($row['submitted_at'])
)
."</td>

</tr>

";

}

echo "</table>";

exit;

?>

