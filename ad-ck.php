<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php include('menu.php') ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">All Enquiry Data</h4>
            </div>




<?php
include "config.php";

function uploadImage($inputName) {
    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
        $fileName = time() . '_' . basename($_FILES[$inputName]['name']);
        $target = 'uploads/' . $fileName;
        if (move_uploaded_file($_FILES[$inputName]['tmp_name'], $target)) {
            return $fileName;
        }
    }
    return '';
}

// Delete record
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM ck WHERE id = $id");
    
}

// Insert or Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content     = $conn->real_escape_string($_POST['content']);
    $highlights  = $conn->real_escape_string($_POST['highlights']);
    $amenities   = $conn->real_escape_string($_POST['amenities']);
    $floor_plan  = $conn->real_escape_string($_POST['floor_plan']);

    $video             = $conn->real_escape_string($_POST['video']);
    $meta_title        = $conn->real_escape_string($_POST['meta_title']);
    $meta_description  = $conn->real_escape_string($_POST['meta_description']);
    $meta_keywords     = $conn->real_escape_string($_POST['meta_keywords']);
    $location          = $conn->real_escape_string($_POST['location']);
    $address           = $conn->real_escape_string($_POST['address']);
    $locality          = $conn->real_escape_string($_POST['locality']);
    $price             = $conn->real_escape_string($_POST['price']);
    $size              = $conn->real_escape_string($_POST['size']);
    $configration      = $conn->real_escape_string($_POST['configration']);
    $status            = $conn->real_escape_string($_POST['status']);
    $rera              = $conn->real_escape_string($_POST['rera']);

    // Upload images
    $img_highlights = uploadImage('img_highlights');
    $img_amenities  = uploadImage('img_amenities');
    $img_floor_plan = uploadImage('img_floor_plan');
    $main_image     = uploadImage('main_image');
    $about_img      = uploadImage('about_img');

    if (!empty($_POST['id'])) {
        // UPDATE
        $id = intval($_POST['id']);
        $existing = $conn->query("SELECT * FROM ck WHERE id = $id")->fetch_assoc();

        if (!$img_highlights) $img_highlights = $existing['img_highlights'];
        if (!$img_amenities)  $img_amenities  = $existing['img_amenities'];
        if (!$img_floor_plan) $img_floor_plan = $existing['img_floor_plan'];
        if (!$main_image)     $main_image     = $existing['main_image'];
        if (!$about_img)      $about_img      = $existing['about_img'];

        $conn->query("UPDATE ck SET 
            content='$content', highlights='$highlights', amenities='$amenities', floor_plan='$floor_plan',
            img_highlights='$img_highlights', img_amenities='$img_amenities', img_floor_plan='$img_floor_plan',
            video='$video', meta_title='$meta_title', meta_description='$meta_description',
            meta_keywords='$meta_keywords', location='$location', address='$address',
            locality='$locality', price='$price', size='$size', configration='$configration',
            status='$status', rera='$rera', main_image='$main_image', about_img='$about_img'
            WHERE id = $id
        ");

        echo "<script>alert('Property Updated Successfully'); window.location.href='ad-ck.php';</script>";
        exit;
    } else {
        // INSERT
        $conn->query("INSERT INTO ck (
            content, highlights, amenities, floor_plan,
            img_highlights, img_amenities, img_floor_plan,
            video, meta_title, meta_description, meta_keywords,
            location, address, locality, price, size, configration, status, rera, main_image, about_img
        ) VALUES (
            '$content', '$highlights', '$amenities', '$floor_plan',
            '$img_highlights', '$img_amenities', '$img_floor_plan',
            '$video', '$meta_title', '$meta_description', '$meta_keywords',
            '$location', '$address', '$locality', '$price', '$size', '$configration', '$status', '$rera', '$main_image', '$about_img'
        )");

        echo "<script>alert('Property Added Successfully'); window.location.href='ad-ck.php';</script>";
        exit;
    }
}


// Fetch for edit
$edit = null;
if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $res = $conn->query("SELECT * FROM ck WHERE id = $id");
    $edit = $res->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CKEditor + Property Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- ✅ Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="mb-4"><?= $edit ? "Edit Record" : "Add New Record" ?></h2>

    <form action="ad-ck.php" method="post" enctype="multipart/form-data" class="row g-3">
        
        <?php if ($edit): ?>
            <input type="hidden" name="id" value="<?= $edit['id'] ?>">
        <?php endif; ?>

<?php
        $fields = [
            "video" => "Property Name",
            
        ];
        foreach ($fields as $name => $label): ?>
            <div class="col-md-6">
                <label for="<?= $name ?>"><?= $label ?></label>
                <textarea name="<?= $name ?>" class="form-control" rows="2"><?= htmlspecialchars($edit[$name] ?? '') ?></textarea>
            </div>
        <?php endforeach; ?>

         <?php
        $images = [
            
            "main_image" => "Main Image",
           
        ];
        foreach ($images as $name => $label): ?>
            <div class="col-md-6">
                <label><?= $label ?></label>
                <input type="file" name="<?= $name ?>" class="form-control">
                <?php if (!empty($edit[$name])): ?>
                    <img src="uploads/<?= $edit[$name] ?>" class="img-thumbnail mt-2" width="120">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>


        <!-- CKEditor Fields -->
        <div class="col-md-12">
            <label>About Property</label>
            <textarea name="content" id="content" class="form-control"><?= htmlspecialchars_decode($edit['content'] ?? '') ?></textarea>
        </div>

        <div class="col-md-6">
            <label>Highlights</label>
            <textarea name="highlights" id="highlights" class="form-control"><?= htmlspecialchars_decode($edit['highlights'] ?? '') ?></textarea>
        </div>

        <div class="col-md-6">
            <label>Amenities</label>
            <textarea name="amenities" id="amenities" class="form-control"><?= htmlspecialchars_decode($edit['amenities'] ?? '') ?></textarea>
        </div>

        <div class="col-md-12">
            <label>Floor Plan</label>
            <textarea name="floor_plan" id="floor_plan" class="form-control"><?= htmlspecialchars_decode($edit['floor_plan'] ?? '') ?></textarea>
        </div>

        <!-- Other Textareas -->
        <?php
        $fields = [
            // "video" => "Property Name",
            "meta_title" => "Meta Title",
            "meta_description" => "Meta Description",
            "meta_keywords" => "Meta Keywords",
            "location" => "Property Location",
            "address" => "Property Address",
            "locality" => "Property Locality",
            "price" => "Property Price",
            "size" => "Property Size",
            "configration" => "Property Configuration",
            "status" => "Property Status",
            "rera" => "Property Rera No."
        ];
        foreach ($fields as $name => $label): ?>
            <div class="col-md-6">
                <label for="<?= $name ?>"><?= $label ?></label>
                <textarea name="<?= $name ?>" class="form-control" rows="2"><?= htmlspecialchars($edit[$name] ?? '') ?></textarea>
            </div>
        <?php endforeach; ?>

        <!-- Images -->
        <?php
        $images = [
            "img_highlights" => "Highlights Image",
            "about_img" => "About Image",
            "img_amenities" => "Amenities Image",
            "img_floor_plan" => "Floor Plan Image"
        ];
        foreach ($images as $name => $label): ?>
            <div class="col-md-6">
                <label><?= $label ?></label>
                <input type="file" name="<?= $name ?>" class="form-control">
                <?php if (!empty($edit[$name])): ?>
                    <img src="uploads/<?= $edit[$name] ?>" class="img-thumbnail mt-2" width="120">
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('highlights');
        CKEDITOR.replace('amenities');
        CKEDITOR.replace('floor_plan');
    </script>

    <hr class="my-5">

    <h3>All Records</h3>
    <div class="row">
        <?php
        $res = $conn->query("SELECT * FROM ck ORDER BY id DESC");
        while ($row = $res->fetch_assoc()):
        ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">ID: <?= $row['id'] ?></h5>
                        <p><strong>About:</strong> <?= htmlspecialchars_decode($row['content']) ?></p>
                        <p><strong>Highlights:</strong> <?= htmlspecialchars_decode($row['highlights']) ?></p>
                        <p><strong>Amenities:</strong> <?= htmlspecialchars_decode($row['amenities']) ?></p>
                        <p><strong>Floor Plan:</strong> <?= htmlspecialchars_decode($row['floor_plan']) ?></p>
                        <p><strong>Meta Title:</strong> <?= htmlspecialchars($row['meta_title']) ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="ad-ck.php?edit=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="ad-ck.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this record?')" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
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
