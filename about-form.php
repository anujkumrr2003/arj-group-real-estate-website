<?php include('menu.php') ?>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <h4 class="header-title">Add About</h4>
      </div>
 
<?php
include "config.php";

// Delete Record
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM about_content WHERE id = $id");
    echo "<script>alert('Record deleted successfully!'); window.location='about-form.php';</script>";
    exit;
}

// Insert or Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $about = $conn->real_escape_string($_POST['about']);
    $vision = $conn->real_escape_string($_POST['vision']);
    $mission = $conn->real_escape_string($_POST['mission']);

    if (!empty($_POST['id'])) {
        // Update
        $id = intval($_POST['id']);
        $sql = "UPDATE about_content SET about='$about', vision='$vision', mission='$mission' WHERE id=$id";
        $msg = "updated";
    } else {
        // Insert
        $sql = "INSERT INTO about_content (about, vision, mission) VALUES ('$about', '$vision', '$mission')";
        $msg = "saved";
    }

    if ($conn->query($sql)) {
        echo "<script>alert('Content $msg successfully!'); window.location='about-form.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

// Fetch record for editing
$editData = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $result = $conn->query("SELECT * FROM about_content WHERE id = $id");
    $editData = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>About Form</title>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h3><?= $editData ? 'Update' : 'Add' ?> About Content</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">
        
        <div class="form-group">
            <label>About</label>
            <textarea name="about" id="about" class="form-control" rows="5"><?= $editData['about'] ?? '' ?></textarea>
            <script>CKEDITOR.replace('about');</script>
        </div>

        <div class="form-group">
            <label>Vision</label>
            <textarea name="vision" class="form-control" rows="3" required><?= $editData['vision'] ?? '' ?></textarea>
        </div>

        <div class="form-group">
            <label>Mission</label>
            <textarea name="mission" class="form-control" rows="3" required><?= $editData['mission'] ?? '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-success"><?= $editData ? 'Update' : 'Save' ?></button>
        <?php if ($editData): ?>
            <a href="about-form.php" class="btn btn-secondary">Cancel</a>
        <?php endif; ?>
    </form>

    <hr>

    <h4>All Records</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>About</th>
                <th>Vision</th>
                <th>Mission</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $res = $conn->query("SELECT * FROM about_content ORDER BY id DESC");
        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                echo '<tr>
                        <td>' . substr(strip_tags($row['about']), 0, 50) . '...</td>
                        <td>' . htmlspecialchars($row['vision']) . '</td>
                        <td>' . htmlspecialchars($row['mission']) . '</td>
                        <td>
                            <a href="?edit=' . $row['id'] . '" class="btn btn-sm btn-primary">Edit</a>
                            <a href="?delete=' . $row['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</a>
                        </td>
                      </tr>';
            }
        } else {
            echo '<tr><td colspan="4">No records found.</td></tr>';
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>

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
