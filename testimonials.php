
<?php include('menu.php') ?>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <h4 class="header-title"></h4>
      </div>
      
            <?php
include 'config.php';
error_reporting(0);

// Delete functionality
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM test WHERE id = $id");
    echo "<script>alert('Record deleted successfully'); window.location='testimonials.php';</script>";
    exit;
}

// Form Submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $imagePath = '';

    // Handle image
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image'];
        if ($image['error'] === UPLOAD_ERR_OK) {
            if ($image['size'] <= 50 * 1024 * 1024) {
                $targetDir = "img/";
                if (!is_dir($targetDir)) mkdir($targetDir, 0755, true);
                $imagePath = $targetDir . time() . "_" . basename($image['name']);
                move_uploaded_file($image['tmp_name'], $imagePath);
            }
        }
    }

    // Check if updating or inserting
    if (!empty($_POST['id'])) {
        // Update
        $id = intval($_POST['id']);
        if ($imagePath) {
            $stmt = $conn->prepare("UPDATE test SET title=?, description=?, image_path=? WHERE id=?");
            $stmt->bind_param("sssi", $title, $description, $imagePath, $id);
        } else {
            $stmt = $conn->prepare("UPDATE test SET title=?, description=? WHERE id=?");
            $stmt->bind_param("ssi", $title, $description, $id);
        }
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Updated successfully'); window.location='testimonials.php';</script>";
        exit;
    } else {
        // Insert
        $stmt = $conn->prepare("INSERT INTO test (title, description, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $imagePath);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Added successfully'); window.location='testimonials.php';</script>";
        exit;
    }
}

// Load existing record for edit
$edit = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM test WHERE id=$id");
    if ($res->num_rows > 0) {
        $edit = $res->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testimonials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .box { max-width: 700px; margin: auto; padding: 20px; background: #f9f9f9; border: 1px solid #ccc; }
        .ck-editor__editable[role="textbox"] { min-height: 300px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="box">
        <h2><?= $edit ? "Edit Testimonial" : "Add Testimonial" ?></h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
            <div class="form-group mb-3">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required value="<?= htmlspecialchars($edit['title'] ?? '') ?>">
            </div>
            <div class="form-group mb-3">
                <label>Image:</label>
                <input type="file" name="image" class="form-control">
                <?php if (!empty($edit['image_path'])): ?>
                    <img src="<?= $edit['image_path'] ?>" style="width:100px;" class="mt-2">
                <?php endif; ?>
            </div>
            <div class="form-group mb-3">
                <label>Description:</label>
                <textarea name="description" id="description" class="form-control"><?= htmlspecialchars($edit['description'] ?? '') ?></textarea>
            </div>
            <input type="submit" name="submit" value="<?= $edit ? "Update" : "Save" ?>" class="btn btn-primary">
            <?php if ($edit): ?>
                <a href="testimonials.php" class="btn btn-secondary">Cancel</a>
            <?php endif; ?>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#description')).catch(error => { console.error(error); });
    </script>

    <hr class="mt-5">
    <h3 class="text-center">All Testimonials</h3>
    <div class="row">
        <?php
        $result = $conn->query("SELECT * FROM test ORDER BY id DESC");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                // echo '<img src="' . htmlspecialchars($row['image_path']) . '" class="card-img-top" style="height: 200px; object-fit: cover;">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['title']) . '</h5>';
                echo '<a href="testimonials.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Edit</a> ';
                echo '<a href="testimonials.php?delete=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</a>';
                echo '</div></div></div>';
            }
        } else {
            echo "<p>No testimonials found.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>


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