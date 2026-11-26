<?php
include 'config.php';

// Get profile details
$profile_res = $conn->query("SELECT * FROM profile");
$profile = ($profile_res && $profile_res->num_rows > 0) ? $profile_res->fetch_assoc() : [];

// Filters
$property_category = isset($_GET['property']) ? $conn->real_escape_string($_GET['property']) : '';
$filter_status     = isset($_GET['status']) ? trim($conn->real_escape_string($_GET['status'])) : '';

// Main query
$query = "SELECT * FROM ck WHERE propertyType = 'Projects'";

// CATEGORY FILTER (only apply when property= given)
if ($property_category !== '') {
    $query .= " AND status12 = '$property_category'";
}

// STATUS FILTER (Ready To Move, Under Construction, Upcoming)
if ($filter_status !== '') {
    $query .= " AND TRIM(status1) = '$filter_status'";
}

// Always include image condition
$query .= " AND main_image IS NOT NULL AND main_image != '' ORDER BY id DESC";

$data = $conn->query($query);

$page_heading = ($filter_status !== '') ? $filter_status : "Projects";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?= $page_heading ?> | Arj Spaces</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
.feature-project-cnt ul li {
    border-top: 1px solid <?= $profile['heading_text_color'] ?>;
}
</style>

</head>

<body style="font-family: latoregular; background-color: <?= $profile['heading_background_color'] ?>;">

<div class="container text-center my-4">
  <h1 class="mb-2 fw-bold" style="margin-top:120px;">Explore All <?= $page_heading ?> Projects in Noida</h1>
  <h2 class="text-muted" style="font-size: 1.2rem;">Discover homes that blend comfort, style, and prime locations.</h2>
</div>

<section class="feature-project">
    <div class="container">
        <div class="row g-4">

        <?php if ($data && $data->num_rows > 0): ?>
            <?php while ($ck = $data->fetch_assoc()): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-project-item">

                        <div class="feature-project-image">
                            <a href="views.php/<?= urlencode($ck['blog']) ?>">
                                <img src="admin/uploads/<?= $ck['main_image'] ?>" 
                                     class="img-fluid" 
                                     style="width:100%; height:300px; object-fit:cover;">
                            </a>

                            <span style="background-color: <?= $profile['heading_text_color'] ?>;
                                         color: <?= $profile['background_color'] ?>;
                                         padding:3px 8px; 
                                         border-radius:10px;">
                                <?= $ck['status1'] ?>
                            </span>
                        </div>

                        <div class="feature-project-cnt">
                            <a href="views.php/<?= urlencode($ck['blog']) ?>" style="text-decoration:none;">
                                <h4 style="color:<?= $profile['heading_text_color'] ?>;">
                                    <?= $ck['video'] ?>
                                </h4>
                                <p><?= $ck['locality'] ?> <?= $ck['location'] ?></p>
                            </a>

                            <ul>
                                <li>
                                    <span>Area: <?= $ck['configration'] ?></span>
                                    <span>Size: <?= $ck['size'] ?></span>
                                </li>

                                <li>
                                    <span><b>₹ <?= $ck['price'] ?: 'On Request' ?></b></span>
                                    <span>
                                        <a class="btn" 
                                           href="views.php/<?= urlencode($ck['blog']) ?>"
                                           style="background-color:<?= $profile['heading_text_color'] ?>; 
                                                  color:<?= $profile['background_color'] ?>;">
                                            View Details
                                        </a>
                                    </span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            <?php endwhile; ?>

        <?php else: ?>
            <p class="text-center text-white">No records found.</p>
        <?php endif; ?>

        </div>
    </div>
</section>

<script src="js/jquery-3.6.0.js"></script>
<script src="js/index.js"></script>
<script src="js/project-page-extranal.js"></script>

</body>
</html>
