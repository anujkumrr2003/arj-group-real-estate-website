

<?php include('menu.php') ?>

          <div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-header">
                  <!-- <h4 class="header-title">All Enquiry Data</h4> -->
                </div>
                

                <?php
include 'config.php';

// Handle PDF Upload
if (isset($_POST['upload'])) {
    $pdf_name = $_FILES['pdf']['name'];
    $pdf_tmp = $_FILES['pdf']['tmp_name'];
    $target_dir = "uploads/";
    $pdf_path = $target_dir . basename($pdf_name);
    $selected_blog = $_POST['video'];

    if (pathinfo($pdf_name, PATHINFO_EXTENSION) != "pdf") {
        echo "<script>alert('Only PDF files are allowed!'); window.location.href='add-pdf.php';</script>";
        exit;
    }

    if (move_uploaded_file($pdf_tmp, $pdf_path)) {
        $query = "INSERT INTO pdf_files (pdf_name, pdf_path, blog_id) VALUES ('$pdf_name', '$pdf_path', '$selected_blog')";
        mysqli_query($conn, $query);
        echo "<script>alert('PDF uploaded successfully!'); window.location.href='add-pdf.php';</script>";
    } else {
        echo "<script>alert('Failed to upload PDF!'); window.location.href='add-pdf.php';</script>";
    }
}

// Handle PDF Delete
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "SELECT * FROM pdf_files WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (file_exists($row['pdf_path'])) {
        unlink($row['pdf_path']);
    }

    $delete_query = "DELETE FROM pdf_files WHERE id = $id";
    mysqli_query($conn, $delete_query);

    echo "<script>alert('PDF deleted successfully!'); window.location.href='add-pdf.php';</script>";
}

// Handle PDF Update
if (isset($_POST['update'])) {
    $pdf_id = $_POST['pdf_id'];
    $selected_blog = $_POST['label_text'];
    
    if (!empty($_FILES['pdf_file']['name'])) {
        $pdf_name = $_FILES['pdf_file']['name'];
        $pdf_tmp = $_FILES['pdf_file']['tmp_name'];
        $pdf_path = "uploads/" . $pdf_name;
        
        if (move_uploaded_file($pdf_tmp, $pdf_path)) {
            $update_query = "UPDATE pdf_files SET blog_id = '$selected_blog', pdf_name = '$pdf_name', pdf_path = '$pdf_path' WHERE id = $pdf_id";
        } else {
            echo "<script>alert('Failed to upload new PDF.');</script>";
            exit;
        }
    } else {
        $update_query = "UPDATE pdf_files SET blog_id = '$selected_blog' WHERE id = $pdf_id";
    }

    mysqli_query($conn, $update_query);
    echo "<script>alert('PDF updated successfully!'); window.location.href='add-pdf.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Upload & Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Select Property to Add PDF </h2>
    <div class="card shadow">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="blog" class="form-label">Select Property (Project Name):</label>
                    <select class="form-control" name="video" required>
                        <option value="">Select a Property</option>
                        <?php
                        $blog_query = "SELECT id, video FROM ck ORDER BY video";
                        $blog_result = mysqli_query($conn, $blog_query);
                        while ($blog_row = mysqli_fetch_assoc($blog_result)) {
                            echo "<option value='{$blog_row['id']}'>{$blog_row['video']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pdf" class="form-label">Select PDF:</label>
                    <input type="file" class="form-control" name="pdf" accept=".pdf" required>
                </div>
                
                <center><button type="submit" name="upload" class="btn btn-primary w-25">Upload PDF</button></center>
            </form>
        </div>
    </div>
    <hr>
    <h3 class="mt-4 text-center">Uploaded PDFs</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>PDF Name</th>
                    <th>Download</th>
                    <th>Associated Property</th>
                    <th>Delete</th>
                    <!-- <th>Edit</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT pdf_files.*, ck.video FROM pdf_files 
                          LEFT JOIN ck ON pdf_files.blog_id = ck.id
                          ORDER BY pdf_files.uploaded_at DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['pdf_name']}</td>
                            <td><a href='{$row['pdf_path']}' download class='btn btn-success btn-sm'>Download</a></td>
                            <td>{$row['video']}</td>
                            <td><a href='add-pdf.php?delete_id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm('Are you sure?')'>Delete</a></td>
                            
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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