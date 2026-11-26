
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

// Handle insert or update
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $website_name = $_POST['website_name'];
    $mobile = $_POST['mobile'];
    $whatsapp = $_POST['whatsapp'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gst = $_POST['gst'];
    $map = $_POST['map'];

    // Logo Upload
    if ($_FILES['logo']['name'] != "") {
        $logo = "uploads/" . time() . "_" . basename($_FILES['logo']['name']);
        move_uploaded_file($_FILES['logo']['tmp_name'], $logo);
    } else {
        $logo = $_POST['old_logo'];
    }

    if ($id) {
        $stmt = $conn->prepare("UPDATE profile_settings SET logo=?, website_name=?, mobile=?, whatsapp=?, email=?, address=?, gst_number=?, google_map=? WHERE id=?");
        $stmt->bind_param("ssssssssi", $logo, $website_name, $mobile, $whatsapp, $email, $address, $gst, $map, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO profile_settings (logo, website_name, mobile, whatsapp, email, address, gst_number, google_map) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $logo, $website_name, $mobile, $whatsapp, $email, $address, $gst, $map);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Saved successfully'); window.location='profile_form.php';</script>";
    }
}

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM profile_settings WHERE id=$id");
    echo "<script>alert('Deleted'); window.location='profile_form.php';</script>";
}

// Fetch existing
$edit = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM profile_settings WHERE id=$id");
    $edit = $result->fetch_assoc();
}

// Fetch all
$all = $conn->query("SELECT * FROM profile_settings");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website Profile Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body >

    <h3 class="mb-4">Website Profile Settings</h3>

    <form method="POST" enctype="multipart/form-data" class="border p-4 rounded bg-light">
        <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
        <input type="hidden" name="old_logo" value="<?= $edit['logo'] ?? '' ?>">

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Website Logo</label>
                <input type="file" name="logo" class="form-control">
                <?php if (!empty($edit['logo'])): ?>
                    <img src="<?= $edit['logo'] ?>" width="100" class="mt-2">
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <label class="form-label">Website Name</label>
                <input type="text" name="website_name" class="form-control" value="<?= $edit['website_name'] ?? '' ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Mobile No</label>
                <input type="text" name="mobile" class="form-control" value="<?= $edit['mobile'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">WhatsApp No</label>
                <input type="text" name="whatsapp" class="form-control" value="<?= $edit['whatsapp'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $edit['email'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">GST Number</label>
                <input type="text" name="gst" class="form-control" value="<?= $edit['gst_number'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control"><?= $edit['address'] ?? '' ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Google Map Link e.g-(https://www.google.com/maps/embed?)</label>
               <textarea name="map" class="form-control"><?= $edit['google_map'] ?? '' ?></textarea>

               
            </div>
        </div>

        <button class="btn btn-primary" name="submit">Save</button>
    </form>

    <hr>

    <h4 class="mt-5">Saved Profiles</h4>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Website</th>
                <th>Contact</th>
                <th>Email</th>
                <th>GST</th>
                <th>Address</th>
                <!-- <th>Map</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $all->fetch_assoc()): ?>
                <tr>
                    <td><img src="<?= $row['logo'] ?>" width="50"></td>
                    <td><?= $row['website_name'] ?></td>
                    <td><?= $row['mobile'] ?><br><?= $row['whatsapp'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['gst_number'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <!-- <td><a href="<?= $row['google_map'] ?>" target="_blank">View</a></td> -->
                    <td>
                        <a href="?edit=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="?delete=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this profile?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

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