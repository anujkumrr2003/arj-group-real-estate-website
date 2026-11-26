

<?php
// include "config.php";
// error_reporting(0);

//   $profile_sql = "SELECT * FROM profile";
// $profile_result = $conn->query($profile_sql);

// if ($profile_result && $profile_result->num_rows > 0) {
//     while ($profile_row = $profile_result->fetch_assoc()) {
            
            ?>
<!--background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color: <?= htmlspecialchars($profile_row['background_color']) ?>;-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <title>Best Comercial Luxury Projects in Noida | Luxury Projects in Noida</title>
    <meta name="description" content="Best Luxury Projects in Noida - Here you can explore old & new luxury projects, upcoming luxury projects & more.">
    <meta name="keywords" content="luxury projects india, india luxury projects, old luxury project india, new luxury projects india, best luxury projects india, upcoming luxury projects india, luxury residential projects india, ultra luxury projects india, luxury real estate projects india, new luxury residential projects india, ongoing ">
   <meta name="author" content="ARJ GROUP">
    <meta name="publisher" content="ARJ GROUP">
    <meta name="robots" content="index, follow">
    <meta name="ROBOTS" content="ALL" />
    <meta name="Slurp" content="index,follow,archive" />
    <meta name="robots" content="NOODP" />
    <meta name="geo.region" content="IN" />
    <meta name="allow-search" content="yes" />
    <meta name="revisit-after" content="daily" />
    <meta name="distribution" content="global" />
    <meta name="expires" content="never" />
    <link rel="canonical" href="https://cyan-viper-748083.hostingersite.com/projects.php" />
    <link rel="alternate" hreflang="en-us" href="projects" />
   <?php
include 'config.php';

// Fetch logo from the database
$all = $conn->query("SELECT logo FROM profile_settings LIMIT 1");

if ($all && $all->num_rows > 0) {
    $row = $all->fetch_assoc();
    $logoPath = htmlspecialchars($row['logo']); // e.g., 'admin/images/logo.png'

    echo '<link rel="icon" href="admin/' . $logoPath . '" />';
} else {
    // Optional fallback favicon
    // echo '<link rel="icon" href="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" />';
}
?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/location.css">

    <!-- <link rel="stylesheet" href="css/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/header.css"> -->
    <!-- <link rel="stylesheet" href="css/home.css"> -->
    <link rel="stylesheet" href="css/footer.css">
    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-58GDN3V');</script> -->
    <!-- End Google Tag Manager -->
</head>

<?php
 

// Fetch profile data
$profile_sql = "SELECT * FROM profile";
$profile_result = $conn->query($profile_sql);
$profile_row = ($profile_result && $profile_result->num_rows > 0) ? $profile_result->fetch_assoc() : [];

if (isset($_GET['comercial'])) {
    $developer_name = urldecode($_GET['comercial']);

    // Fetch developer ID
    $stmt = $conn->prepare("SELECT id FROM comercial WHERE name = ?");
    $stmt->bind_param("s", $developer_name);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows > 0) {
        $developer = $res->fetch_assoc();
        $developer_id = $developer['id'];

        // Fetch video names from developer_properties and match them with CK table
        $stmt2 = $conn->prepare("
            SELECT ck.*
            FROM comercial_pro dp
            INNER JOIN ck ON dp.video = ck.video
            WHERE dp.developer_id = ?
        ");
        $stmt2->bind_param("i", $developer_id);
        $stmt2->execute();
        $properties = $stmt2->get_result();
    } else {
        echo "<p>No such developer found.</p>";
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .proj_list {
            border-radius: 8px;
            min-height: 250px;
            padding: 20px;
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .project-link h2 {
            font-weight: bold;
            font-family: poppinssemibold;
            background-color: #fff;
            padding: 4px 10px;
            border-radius: 4px;
            display: inline-block;
        }

        .btn-outline-light.active {
            background-color: #fff;
            color: #000 !important;
        }
    </style>
</head>
<body style="font-family: Arial Narrow; background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
    <?php include 'header.php'; ?>
    <?php
 
// Get locality from URL
$filter_locality = isset($_GET['local']) ? urldecode($_GET['local']) : '';
if (!empty($filter_locality)) {
    // Get developer name from locality
    $stmt = $conn->prepare("
        SELECT l.name 
        FROM comercial_pro lo 
        JOIN comercial l ON l.id = lo.developer_id 
        WHERE lo.name = ?
        LIMIT 1
    ");
    $stmt->bind_param("s", $filter_locality);
    $stmt->execute();
    $stmt->bind_result($developer_name);
    if ($stmt->fetch()) {
        $page_heading = $developer_name;
    }
    $stmt->close();
}
?>

<div class="container text-center my-4">
  <h1 class="mb-2 fw-bold" style="font-size: 2.5rem; margin-top:120px;">
    Luxury Projects of <?= htmlspecialchars($developer_name) ?> in Noida
  </h1>
  <h2 class="text-muted" style="font-size: 1.2rem;">
    Discover premium developer properties in Noida curated just for you
  </h2>
</div>



    <section class=" py-4">
        <div class="container-fluid">
            <!-- Filter Buttons -->
            <!--<div class="row mb-4 text-center">-->
            <!--    <div class="col">-->
            <!--        <a href="projects.php?property=Ultra_Luxury" class="btn btn-outline-light">Ultra Luxury</a>-->
            <!--        <a href="projects.php?property=Luxury" class="btn btn-outline-light">Luxury</a>-->
            <!--        <a href="projects.php?property=Premium" class="btn btn-outline-light">Premium</a>-->
            <!--    </div>-->
            <!--</div>-->

            <!-- Project List -->
            <div class="inner-project-list row g-4">
                <?php 
                if ($properties && $properties->num_rows > 0) {
                    while ($ck = $properties->fetch_assoc()) {
                ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="views.php/<?= urlencode($ck['blog']) ?>" class="project-link text-decoration-none"> 
                            <div class="proj_list" style="background-image: url('admin/uploads/<?= htmlspecialchars($ck['main_image']) ?>'); border: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                                <h2 style="color: <?= htmlspecialchars($profile_row['background_color']) ?>; background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;"><?= htmlspecialchars($ck['video']) ?></h2>
                                <p style="font-size: 18px;"><?= htmlspecialchars($ck['locality']) ?></p>
                                <h4 style="font-family: poppinssemibold; font-size: 18px;">
                                    <?= htmlspecialchars($ck['configration']) ?> @ <?= htmlspecialchars($ck['price']) ?>
                                </h4>
                            </div>
                        </a>   
                    </div>
                <?php
                    }
                } else {
                    echo '<p class="text-center text-white">No projects found for this developer.</p>';
                }
                ?>
            </div>
        </div>
    </section>
</body>
</html>
<?php
}
$conn->close();
?>





<!-- <h1 style="display: none;">skjsjf</h1> -->

<style>
       @media only screen and (max-width: 991px) {
    .button_container span, .overlay {
        background: rgb(105 105 105) !important;
    }
}
  </style>
    <script src="js/index.js"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/index.js"></script>
    <script src="js/project-page-extranal.js"></script>
    
    <?php include 'footer.php'; ?>
</body>

</html>



<style>
    .proj_list::before {
        border-radius: 8px;
    }

</style>



