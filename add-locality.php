<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include('menu.php') ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Add Local Property</h4>
            </div>




<?php
include "config.php";

/* ---------------------------------------
   DELETE LOCALITY + ALL PROPERTIES
----------------------------------------*/
if (isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']);
    $conn->query("DELETE FROM locality WHERE developer_id = $id");
    $conn->query("DELETE FROM local WHERE id = $id");
}

/* ---------------------------------------
   ADD / UPDATE LOCALITY OR PROPERTY
----------------------------------------*/
if (isset($_POST['save_locality'])) {
    $locality_id = isset($_POST['locality_id']) ? intval($_POST['locality_id']) : 0;
    $new_locality = trim($_POST['new_locality']);
    $property = trim($_POST['property']);

    if ($property != "") {
        if ($locality_id > 0) {
            // Existing locality selected
            $loc_id = $locality_id;
        } else if ($new_locality != "") {
            // New locality entered
            $check = $conn->query("SELECT id FROM local WHERE name='$new_locality'");
            if ($check->num_rows > 0) {
                $row = $check->fetch_assoc();
                $loc_id = $row['id'];
            } else {
                $conn->query("INSERT INTO local (name) VALUES ('$new_locality')");
                $loc_id = $conn->insert_id;
            }
        } else {
            $loc_id = 0;
        }

        if ($loc_id > 0) {
            $conn->query("INSERT INTO locality (developer_id, video) VALUES ($loc_id, '$property')");
        }
    }
}

/* ---------------------------------------
   UPDATE LOCALITY NAME
----------------------------------------*/
if (isset($_POST['update_locality_name'])) {
    $id = intval($_POST['id']);
    $new_name = trim($_POST['new_name']);
    if ($new_name != "") {
        $conn->query("UPDATE local SET name='$new_name' WHERE id=$id");
    }
}

/* ---------------------------------------
   DELETE PROPERTY UNDER LOCALITY
----------------------------------------*/
if (isset($_POST['delete_property'])) {
    $pid = intval($_POST['prop_id']);
    $conn->query("DELETE FROM locality WHERE id=$pid");
}

/* ---------------------------------------
   FETCH LOCALITIES + PROPERTIES
----------------------------------------*/
$list = $conn->query("
    SELECT local.id AS lid, local.name AS lname, locality.id AS pid, locality.video 
    FROM local 
    LEFT JOIN locality ON local.id = locality.developer_id
    ORDER BY local.id DESC
");

/* ---------------------------------------
   FETCH PROPERTY LIST FROM CK
----------------------------------------*/
$properties = $conn->query("SELECT DISTINCT video FROM ck WHERE video!=''");

/* ---------------------------------------
   FETCH EXISTING LOCALITIES
----------------------------------------*/
$localities = $conn->query("SELECT id, name FROM local ORDER BY name ASC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Locality Manager</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">

<h2 class="mb-4 fw-bold">Add Property to Locality</h2>

<form method="post" class="card p-4 shadow-sm">
    <div class="row">
        <!-- Existing Locality Dropdown -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Select Existing Locality</label>
            <select name="locality_id" class="form-select">
                <option value="0">-- Select Locality (or add new) --</option>
                <?php while ($l = $localities->fetch_assoc()): ?>
                    <option value="<?= $l['id'] ?>"><?= htmlspecialchars($l['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- New Locality Input -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Or Add New Locality</label>
            <input type="text" name="new_locality" class="form-control" placeholder="Enter new locality">
        </div>

        <!-- Property Dropdown -->
        <div class="col-md-4 mb-3">
            <label class="form-label">Select Property</label>
            <select name="property" class="form-select" required>
                <option value="">Select Property</option>
                <?php while ($p = $properties->fetch_assoc()): ?>
                    <option value="<?= htmlspecialchars($p['video']) ?>"><?= htmlspecialchars($p['video']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="col-md-12 mb-3 d-flex justify-content-end">
            <button type="submit" name="save_locality" class="btn btn-primary">Add Property</button>
        </div>
    </div>
</form>

<hr class="my-4">

<h3 class="fw-bold mb-3">Locality List</h3>

<table class="table table-bordered table-striped shadow-sm bg-white">
    <thead class="table-dark">
        <tr>
            <th width="25%">Locality</th>
            <th width="55%">Properties</th>
            <th width="20%">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $rows = [];
        while ($r = $list->fetch_assoc()) {
            $rows[$r['lid']]['name'] = $r['lname'];
            $rows[$r['lid']]['properties'][] = [
                'pid' => $r['pid'],
                'video' => $r['video']
            ];
        }

        foreach ($rows as $lid => $data):
        ?>
        <tr>
            <td>
                <form method="post" class="d-flex">
                    <input type="hidden" name="id" value="<?= $lid ?>">
                    <input type="text" name="new_name" class="form-control" value="<?= $data['name'] ?>">
                    <button class="btn btn-success btn-sm ms-2" name="update_locality_name">Save</button>
                </form>
            </td>

            <td>
                <?php if (!empty($data['properties'])): ?>
                    <?php foreach ($data['properties'] as $prop): ?>
                        <div class="d-flex mb-2">
                            <span class="flex-grow-1"><?= htmlspecialchars($prop['video']) ?></span>
                            <form method="post">
                                <input type="hidden" name="prop_id" value="<?= $prop['pid'] ?>">
                                <button class="btn btn-danger btn-sm" name="delete_property">X</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <span class="text-muted">No properties added</span>
                <?php endif; ?>
            </td>

            <td class="text-center">
                <form method="post">
                    <input type="hidden" name="delete_id" value="<?= $lid ?>">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete locality and all properties?')">Delete Locality</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
</body>
</html>

<?php $conn->close(); ?>












<!-- Vendor js -->
  <script src="assets/js/vendor.min.js"></script>

  <!-- Daterangepicker js -->
  <script src="assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

  <!-- Apex Charts js -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

  <!-- Vector Maps js -->
  <script src="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-in-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-au-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-il-chicago-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-uk-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-ca-lcc-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-europe-mill-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-fr-merc-en.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-es-merc.js"></script>
  <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-es-mill.js"></script>

  <!-- Vector Maps Demo js -->
  <script src="assets/js/pages/vector-maps.init.js"></script>

  <!-- Dashboard App js -->
  <script src="assets/js/pages/dashboard.js"></script>

  <!-- App js -->
  <script src="assets/js/app.min.js"></script>




</body>

</html>
