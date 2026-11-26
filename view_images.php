<?php include('menu.php') ?>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <h4 class="header-title">Add Multiple Image</h4>
      </div>




<?php
include 'config.php';

// Get ck_id from GET or POST
$ck_id = isset($_GET['ck_id']) ? intval($_GET['ck_id']) : (isset($_POST['ck_id']) ? intval($_POST['ck_id']) : 0);

// 🔄 Handle Deletion
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $img_res = $conn->query("SELECT image_path FROM property_images WHERE id = $delete_id");
    if ($img_res && $img_row = $img_res->fetch_assoc()) {
        $img_path = $img_row['image_path'];
        if (file_exists($img_path)) {
            unlink($img_path); // Delete image file
        }
    }
    $conn->query("DELETE FROM property_images WHERE id = $delete_id");
    echo "<script>
    alert('Images Delete!');
    window.location.href = 'view_images.php';
</script>";
exit;
}

// 📤 Handle Upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['images']) && $ck_id > 0) {
    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $filename = basename($_FILES['images']['name'][$key]);
        $target_dir = "uploads/";
        $target_file = $target_dir . time() . "_" . $filename;

        if (move_uploaded_file($tmp_name, $target_file)) {
            $conn->query("INSERT INTO property_images (ck_id, image_path) VALUES ($ck_id, '$target_file')");
        }
    }
    echo "<script>
    alert('Images uploaded!');
    window.location.href = 'view_images.php';
</script>";
exit;
}

// 📥 Fetch Images
$result = $conn->query("SELECT * FROM property_images WHERE ck_id = $ck_id");

// Fetch CK options
$ck_options = $conn->query("SELECT id, video FROM ck ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Property Images by CK ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container my-5">
    <!-- Upload Form -->
    <h4 class="text-center mb-4">Upload Images for Selected Property</h4>
    <form action="view_images.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ck_id" class="form-label">Select Property (Video)</label>
            <select name="ck_id" id="ck_id" class="form-select" required onchange="this.form.submit()">
                <option value="">-- Select --</option>
                <?php while ($ck = $ck_options->fetch_assoc()): ?>
                    <option value="<?= $ck['id'] ?>" <?= ($ck['id'] == $ck_id) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($ck['video']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <?php if ($ck_id > 0): ?>
            <input type="hidden" name="ck_id" value="<?= $ck_id ?>">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="images" class="form-label">Choose Images</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Upload Images</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </form>

    <!-- Image List -->
    <?php if ($ck_id > 0): ?>
        <h2 class="text-center mt-5 mb-4">Uploaded Images for CK ID: <?= $ck_id ?></h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4" id="img-<?= $row['id'] ?>">
                        <div class="card shadow-sm border">
                            <img src="<?= htmlspecialchars($row['image_path']) ?>" class="card-img-top" alt="Property Image">
                            <div class="card-body text-center p-2">
                                <a href="?ck_id=<?= $ck_id ?>&delete=<?= $row['id'] ?>"
                                   onclick="return confirm('Are you sure you want to delete this image?')"
                                   class="btn btn-sm btn-danger w-100">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">No images uploaded yet for this property.</div>
        <?php endif; ?>
    <?php endif; ?>
</div>
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
