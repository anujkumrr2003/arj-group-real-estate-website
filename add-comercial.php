<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include('menu.php') ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Add Comercial Property</h4>
            </div>




<?php
include "config.php";

/* ============================================================
   DELETE COMMERCIAL + PROPERTIES
============================================================ */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);

    if ($delete_id > 0) {
        $stmt = $conn->prepare("DELETE FROM comercial_pro WHERE developer_id = ?");
        $stmt->bind_param("i", $delete_id);
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("DELETE FROM comercial WHERE id = ?");
        $stmt->bind_param("i", $delete_id);
        $stmt->execute();
        $stmt->close();
    }
}

/* ============================================================
   REMOVE ONE PROPERTY
============================================================ */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['remove_property'])) {
    $property = trim($_POST['remove_property']);
    $dev_id = intval($_POST['developer_id']);

    $stmt = $conn->prepare("DELETE FROM comercial_pro WHERE developer_id = ? AND video = ?");
    $stmt->bind_param("is", $dev_id, $property);
    $stmt->execute();
    $stmt->close();
}

/* ============================================================
   UPDATE COMMERCIAL NAME
============================================================ */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_name'])) {
    $dev_id = intval($_POST['developer_id']);
    $new_name = trim($_POST['new_name']);

    if (!empty($new_name)) {
        $stmt = $conn->prepare("UPDATE comercial SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $new_name, $dev_id);
        $stmt->execute();
        $stmt->close();
    }
}

/* ============================================================
   ADD COMMERCIAL OR PROPERTY (UPDATED)
============================================================ */
if (isset($_POST['video_dropdown'])) {

    $property = trim($_POST['video_dropdown']);

    // New code for dropdown + textbox
    $existing_commercial = intval($_POST['existing_commercial']);
    $new_commercial = trim($_POST['new_commercial']);

    // Choose correct commercial ID
    if (!empty($existing_commercial)) {
        $developer_id = $existing_commercial;

    } elseif (!empty($new_commercial)) {
        // Create new commercial
        $stmt = $conn->prepare("INSERT INTO comercial (name) VALUES (?)");
        $stmt->bind_param("s", $new_commercial);
        $stmt->execute();
        $developer_id = $stmt->insert_id;
        $stmt->close();

    } else {
        die("Please select or enter commercial name");
    }

    // Insert new property
    $stmt = $conn->prepare("INSERT INTO comercial_pro (developer_id, video) VALUES (?, ?)");
    $stmt->bind_param("is", $developer_id, $property);
    $stmt->execute();
    $stmt->close();
}

/* ============================================================
   FETCH VIDEOS
============================================================ */
$videos = $conn->query("SELECT DISTINCT video FROM ck WHERE video != '' ORDER BY video ASC");

/* ============================================================
   FETCH COMMERCIAL LIST FOR DROPDOWN
============================================================ */
$commercials = $conn->query("SELECT id, name FROM comercial ORDER BY name ASC");

/* ============================================================
   FETCH COMMERCIAL + PROPERTIES
============================================================ */
$list = $conn->query("
    SELECT c.id, c.name, cp.video
    FROM comercial c
    LEFT JOIN comercial_pro cp ON c.id = cp.developer_id
    ORDER BY c.name ASC, cp.video ASC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Commercial Property Mapping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h3 class="text-primary mb-4">Add Commercial & Property</h3>

    <!-- ================== UPDATED FORM ================== -->
   <form method="post" class="d-flex align-items-end gap-3 flex-wrap">

    <!-- Existing Commercial -->
    <div>
        <label class="form-label">Select Existing Commercial</label>
        <select name="existing_commercial" class="form-select" style="min-width:220px;">
            <option value="">-- Select Commercial --</option>
            <?php while ($c = $commercials->fetch_assoc()): ?>
                <option value="<?= $c['id'] ?>">
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <!-- OR -->
    <!--<div class="fw-bold text-center">OR</div>-->

    <!-- New Commercial -->
    <div>
        <label class="form-label">Add New Commercial</label>
        <input type="text" name="new_commercial" class="form-control" placeholder="Enter new name" style="min-width:220px;">
    </div>

    <!-- Property -->
    <div>
        <label class="form-label">Select Property</label>
        <select name="video_dropdown" class="form-select" required style="min-width:220px;">
            <option value="">-- Select Property --</option>
            <?php while ($v = $videos->fetch_assoc()): ?>
                <option value="<?= htmlspecialchars($v['video']) ?>">
                    <?= htmlspecialchars($v['video']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <!-- Button -->
    <div>
        <button class="btn btn-primary mt-4">Add</button>
    </div>

</form>


    <hr>

    <h3 class="mt-4 text-success">Commercial List</h3>

    <table class="table table-bordered mt-3">
        <thead class="table-secondary text-center">
            <tr>
                <th style="width:20%">Commercial</th>
                <th style="width:60%">Properties</th>
                <th style="width:20%">Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $current_dev = null;
        $props = [];

        while ($row = $list->fetch_assoc()):
            if ($current_dev !== $row['id']) {

                if ($current_dev !== null) { ?>
                    <tr class="text-center">

                        <!-- Edit commercial name -->
                        <td>
                            <form method="post" class="d-flex">
                                <input type="text" name="new_name"
                                       class="form-control"
                                       value="<?= htmlspecialchars($dev_name) ?>">
                                <input type="hidden" name="developer_id" value="<?= $current_dev ?>">
                                <button name="update_name" class="btn btn-success btn-sm ms-2">Save</button>
                            </form>
                        </td>

                        <!-- Property list -->
                        <td>
                            <table class="table table-sm table-bordered bg-light mb-0">
                                <?php if (!empty($props)): ?>
                                    <?php foreach ($props as $p): ?>
                                        <tr>
                                            <td class="text-start"><?= htmlspecialchars($p) ?></td>
                                            <td style="width:50px;">
                                                <form method="post">
                                                    <input type="hidden" name="remove_property" value="<?= htmlspecialchars($p) ?>">
                                                    <input type="hidden" name="developer_id" value="<?= $current_dev ?>">
                                                    <button class="btn btn-danger btn-sm">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="2">No Properties</td></tr>
                                <?php endif; ?>
                            </table>
                        </td>

                        <!-- Delete button -->
                        <td>
                            <form method="post" onsubmit="return confirm('Delete this commercial and all properties?')">
                                <input type="hidden" name="delete_id" value="<?= $current_dev ?>">
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>

                    </tr>
                <?php }

                $current_dev = $row['id'];
                $dev_name = $row['name'];
                $props = [];
            }

            if (!empty($row['video'])) {
                $props[] = $row['video'];
            }

        endwhile;

        if ($current_dev !== null): ?>
            <tr class="text-center">

                <td>
                    <form method="post" class="d-flex">
                        <input type="text" name="new_name" class="form-control" value="<?= htmlspecialchars($dev_name) ?>">
                        <input type="hidden" name="developer_id" value="<?= $current_dev ?>">
                        <button name="update_name" class="btn btn-success btn-sm ms-2">Save</button>
                    </form>
                </td>

                <td>
                    <table class="table table-sm table-bordered bg-light mb-0">
                        <?php if (!empty($props)): ?>
                            <?php foreach ($props as $p): ?>
                                <tr>
                                    <td class="text-start"><?= htmlspecialchars($p) ?></td>
                                    <td style="width:50px;">
                                        <form method="post">
                                            <input type="hidden" name="remove_property" value="<?= htmlspecialchars($p) ?>">
                                            <input type="hidden" name="developer_id" value="<?= $current_dev ?>">
                                            <button class="btn btn-danger btn-sm">X</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="2">No Properties</td></tr>
                        <?php endif; ?>
                    </table>
                </td>

                <td>
                    <form method="post" onsubmit="return confirm('Delete this commercial and all properties?')">
                        <input type="hidden" name="delete_id" value="<?= $current_dev ?>">
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>

            </tr>
        <?php endif; ?>

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
