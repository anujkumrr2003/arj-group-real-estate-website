<?php include('menu.php') ?>




          <!-- end page title -->

          

          <div class="row">
            <div class="col-xl-12" >
              <div class="card" style="padding: 30px;">
                <div class="card-header">
                  <h4 class="header-title">Add Gmail</h4>
                </div>
                
	<!--frjubpqvvdwgmnmb-->


<?php
// Include database configuration
include "config.php";
// biztoindia5@gmail.com
// yworrglaxszqxdmo
// Insert Record
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $dynamicEmail = $conn->real_escape_string($_POST['dynamic_email']);
    $dynamicPassword = $conn->real_escape_string($_POST['dynamic_password']);

    $sql = "INSERT INTO email_credentials (email, password) VALUES ('$dynamicEmail', '$dynamicPassword')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record inserted successfully!');</script>";
    } else {
        echo "<script>alert('Error inserting record: " . $conn->error . "');</script>";
    }
}

// Fetch Records
$records = [];
$sql = "SELECT * FROM email_credentials";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

// Delete Record
if (isset($_GET['delete'])) {
    $id = $conn->real_escape_string($_GET['delete']);
    $sql = "DELETE FROM email_credentials WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully!'); window.location.href = 'mail.php';</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }
}

// Update Record
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $dynamicEmail = $conn->real_escape_string($_POST['dynamic_email']);
    $dynamicPassword = $conn->real_escape_string($_POST['dynamic_password']);

    $sql = "UPDATE email_credentials SET email = '$dynamicEmail', password = '$dynamicPassword' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully!'); window.location.href = 'mail.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . $conn->error . "');</script>";
    }
}
?>
<!-- Insert Form -->
<form method="post">
    <div class="mb-3">
        <input type="email" class="form-control" name="dynamic_email" placeholder="Enter sender's email" required>
    </div>
    <div class="mb-3">
        <input type="password" class="form-control" name="dynamic_password" placeholder="Enter sender's password" required>
    </div>
    <button type="submit" name="save" class="btn btn-primary">Insert</button>
</form>

<hr>

<!-- Display Records -->
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
            <tr>
                <td><?php echo htmlspecialchars($record['email']); ?></td>
                <td><?php echo htmlspecialchars($record['password']); ?></td>
                <td>
                    <!-- Delete -->
                    <a href="?delete=<?php echo $record['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>

                    <!-- Update -->
                    <button class="btn btn-warning btn-sm" onclick="document.getElementById('update-form-<?php echo $record['id']; ?>').style.display='block';">Update</button>

                    <!-- Hidden Update Form -->
                    <form method="post" style="display:none;" id="update-form-<?php echo $record['id']; ?>" class="mt-2">
                        <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                        <div class="mb-3">
                            <input type="email" class="form-control" name="dynamic_email" value="<?php echo htmlspecialchars($record['email']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="dynamic_password" value="<?php echo htmlspecialchars($record['password']); ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-success btn-sm">Save</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

              </div>
            </div>
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