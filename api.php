

<?php include('menu.php') ?>

<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header">
        <h4 class="header-title">Add API</h4>
      </div>
      

<?php
include 'config.php'; // Database connection

// Initialize variables for update
$para1 = "";
$para2 = "";
$para3 = "";
$para4 = "";
$update_id = "";

// Insert Data
if (isset($_POST['submit'])) {
    $para1 = $conn->real_escape_string($_POST['para1']);
    $para2 = $conn->real_escape_string($_POST['para2']);
    $para3 = $conn->real_escape_string($_POST['para3']);
    $para4 = $conn->real_escape_string($_POST['para4']);

    $query = "INSERT INTO api (para1, para2, para3, para4) VALUES ('$para1', '$para2', '$para3', '$para4')";
    $conn->query($query);
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh page after insert
}

// Fetch existing data for editing
if (isset($_GET['edit'])) {
    $update_id = $_GET['edit'];
    $edit_query = "SELECT * FROM api WHERE id=$update_id";
    $edit_result = $conn->query($edit_query);
    
    if ($edit_result->num_rows > 0) {
        $row = $edit_result->fetch_assoc();
        $para1 = $row['para1'];
        $para2 = $row['para2'];
        $para3 = $row['para3'];
        $para4 = $row['para4'];
    }
}

// Update Data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $para1 = $conn->real_escape_string($_POST['para1']);
    $para2 = $conn->real_escape_string($_POST['para2']);
    $para3 = $conn->real_escape_string($_POST['para3']);
    $para4 = $conn->real_escape_string($_POST['para4']);

    $query = "UPDATE api SET para1='$para1', para2='$para2', para3='$para3', para4='$para4' WHERE id=$id";
    $conn->query($query);
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh page after update
}

// Delete Data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM api WHERE id=$id";
    $conn->query($query);
    header("Location: ".$_SERVER['PHP_SELF']); // Refresh page after delete
}

// Fetch Data
$result = $conn->query("SELECT * FROM api");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Trending Projects</h2>
   <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $update_id; ?>">
                <div class="mb-3">
                    <label for="para1">WhatsApp API URL :-</label>
                    <textarea name="para1" class="form-control" placeholder="api_url..." required><?php echo $para1; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="para2">API Key :-</label>
                    <textarea name="para2" class="form-control" placeholder="api_key..." required><?php echo $para2; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="para3">Template Name :-</label>
                    <textarea name="para3" class="form-control" placeholder="template_name..." required><?php echo $para3; ?></textarea>
                </div>
                 <div class="mb-3">
                    <label for="para3">Template Language :-</label>
                    <textarea name="para4" class="form-control" placeholder="template_language..." required><?php echo $para4; ?></textarea>
                </div>

                <?php if ($update_id): ?>
                    <button type="submit" name="update" class="btn btn-success">Update</button>
                <?php else: ?>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <?php endif; ?>
            </form>

    <h3 class="mt-5">Records</h3>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
          
                <th>WhatsApp API URL</th>
                <th>API Key</th>
                <th>Template Name</th>
                <th>Template Language</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                 
                    <td><?php echo $row['para1']; ?></td>
                    <td><?php echo $row['para2']; ?></td>
                    <td><?php echo $row['para3']; ?></td>
                    <td><?php echo $row['para4']; ?></td>
                    <td>
                        <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".truncate-text").forEach(function (element) {
        let words = element.innerText.split(" ");
        if (words.length > 10) {
            element.innerText = words.slice(0, 10).join(" ") + "...";
        }
    });
});
</script>






<style>
    /* Ensure table fits within smaller screens */
.table-responsive {
    overflow-x: auto;
}

/* Reduce padding on smaller screens */
@media (max-width: 768px) {
    .table th, .table td {
        font-size: 14px; 
        padding: 8px;
    }

    .btn {
        font-size: 12px;
        padding: 5px 10px;
    }
}

</style>
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