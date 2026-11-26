<?php
include 'config.php';

$property_id = intval($_POST['property_id']);

foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
    $filename = basename($_FILES['images']['name'][$key]);
    $target_dir = "uploads/";
    $target_file = $target_dir . time() . "_" . $filename;

    if (move_uploaded_file($tmp_name, $target_file)) {
        $conn->query("INSERT INTO property_images (property_id, image_path) VALUES ($property_id, '$target_file')");
    }
}

header("Location: property_images.php?property_id=$property_id");
exit;
