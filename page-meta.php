
<?php include('menu.php') ?>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <h4 class="header-title">All Add Metas</h4>
      </div>
      
<?php
include 'config.php';

// Handle Insert or Update
if (isset($_POST['save'])) {
    $id = $_POST['id'] ?? '';
    $page_name = trim($_POST['page_name']);
    $meta_title = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $keywords = trim($_POST['keywords']);

    if ($page_name && $meta_title && $meta_description && $keywords) {
        if (!empty($id)) {
            // Update
            $stmt = $conn->prepare("UPDATE meta_data SET page_name=?, meta_title=?, meta_description=?, keywords=? WHERE id=?");
            $stmt->bind_param("ssssi", $page_name, $meta_title, $meta_description, $keywords, $id);
            $action = "updated";
        } else {
            // Insert
            $stmt = $conn->prepare("INSERT INTO meta_data (page_name, meta_title, meta_description, keywords) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $page_name, $meta_title, $meta_description, $keywords);
            $action = "saved";
        }

        if ($stmt->execute()) {
            echo "<script>
                alert('Record $action successfully!');
                window.location.href='page-meta.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Something went wrong. Please try again.');
                window.location.href='page-meta.php';
            </script>";
            exit;
        }
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    if ($conn->query("DELETE FROM meta_data WHERE id=$id")) {
        echo "<script>
            alert('Record deleted successfully!');
            window.location.href='page-meta.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Failed to delete record!');
            window.location.href='page-meta.php';
        </script>";
        exit;
    }
}

// Handle Edit
$edit_id = '';
$page_name = $meta_title = $meta_description = $keywords = '';
if (isset($_GET['edit'])) {
    $edit_id = intval($_GET['edit']);
    $edit_query = $conn->query("SELECT * FROM meta_data WHERE id=$edit_id");
    if ($edit_query->num_rows > 0) {
        $edit_row = $edit_query->fetch_assoc();
        $page_name = $edit_row['page_name'];
        $meta_title = $edit_row['meta_title'];
        $meta_description = $edit_row['meta_description'];
        $keywords = $edit_row['keywords'];
    }
}

// Fetch All Records
$records = $conn->query("SELECT * FROM meta_data ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meta Data Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5 mb-5">

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><?php echo $edit_id ? 'Edit Meta Information' : 'Add Meta Information'; ?></h5>
        </div>
        <div class="card-body">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $edit_id; ?>">

                <div class="mb-3">
                    <label class="form-label">Select Page</label>
                    <select name="page_name" class="form-select" required>
                        <option value="">-- Select Page --</option>
                        <?php
                        $pages = ['home', 'about', 'blog', 'contact', 'project'];
                        foreach ($pages as $page) {
                            $selected = ($page_name == $page) ? 'selected' : '';
                            echo "<option value='$page' $selected>" . ucfirst($page) . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Title</label>
                    <textarea name="meta_title" class="form-control" rows="2" required><?php echo htmlspecialchars($meta_title); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" required><?php echo htmlspecialchars($meta_description); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keywords</label>
                    <textarea name="keywords" class="form-control" rows="2" required><?php echo htmlspecialchars($keywords); ?></textarea>
                </div>

                <button type="submit" name="save" class="btn btn-success px-4">
                    <?php echo $edit_id ? 'Update' : 'Save'; ?>
                </button>
                <?php if ($edit_id): ?>
                    <a href="page-meta.php" class="btn btn-secondary px-4">Cancel</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- Records Table -->
    <div class="card shadow-sm mt-4">
        <div class="card-header bg-dark text-white">
            <h6 class="mb-0">Saved Meta Records</h6>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                       
                        <th style="width:10%">Page</th>
                        <th style="width:20%">Meta Title</th>
                        <th style="width:30%">Meta Description</th>
                        <th style="width:20%">Keywords</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($records->num_rows > 0): ?>
                        <?php while ($row = $records->fetch_assoc()): ?>
                            <tr>
                               
                                <td class="text-capitalize"><?php echo htmlspecialchars($row['page_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['meta_title']); ?></td>
                                <td><?php echo htmlspecialchars($row['meta_description']); ?></td>
                                <td><?php echo htmlspecialchars($row['keywords']); ?></td>
                                <td>
                                    <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this record?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted">No records found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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