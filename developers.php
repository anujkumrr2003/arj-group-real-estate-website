

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
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="google-site-verification" content="1GE-eh3i3CFWbRH7t6juE61aZ6S2b0KSW31ovUlngQo">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<title>Developers | ARJ GROUP – Best Luxury Projects in Noida & Greater Noida</title>

<meta name="description" content="Explore top developers and luxury projects in Noida and Greater Noida with ARJ GROUP. Discover premium apartments, ultra-luxury flats, and ready-to-move residential properties built by trusted developers.">

<meta name="keywords" content="developers in noida, luxury projects in noida, premium apartments in noida, luxury flats greater noida, best builders in noida, top developers noida, residential projects greater noida, luxury real estate noida, high-end apartments noida, ready to move flats noida, upcoming luxury projects noida, ARJ GROUP noida">

<meta name="robots" content="index, follow" />
<meta name="ROBOTS" content="ALL" />
<meta name="Slurp" content="index,follow,archive" />
<meta name="geo.region" content="IN" />
<meta name="allow-search" content="yes" />
<meta name="revisit-after" content="daily" />
<meta name="distribution" content="global" />
<meta name="expires" content="never" />

<link rel="canonical" href="https://arjgroup.in/developers.php" />
<link rel="alternate" hreflang="en-us" href="https://arjgroup.in/developers.php" />

<!-- Open Graph Tags for Social & SEO -->
<meta property="og:title" content="Developers | ARJ GROUP – Best Luxury Projects in Noida & Greater Noida" />
<meta property="og:description" content="Discover trusted developers and premium residential projects in Noida and Greater Noida with ARJ GROUP. Explore ultra-luxury apartments and ready-to-move flats." />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://arjgroup.in/developers.php" />
<meta property="og:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

<!-- Twitter Card for Better Visibility -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Developers | ARJ GROUP – Luxury Flats in Noida & Greater Noida" />
<meta name="twitter:description" content="Explore premium apartments and high-end residential projects in Noida and Greater Noida by trusted developers at ARJ GROUP." />
<meta name="twitter:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

<!-- Preload Key Images for Speed -->
<link rel="preload" href="https://arjgroup.in/images/noida-luxury-project.webp" as="image" />
<link rel="preload" href="https://arjgroup.in/images/greater-noida-luxury.webp" as="image" />

<!-- Schema Markup (JSON-LD for Google Rich Results) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "ARJ GROUP",
  "url": "https://arjgroup.in",
  "logo": "https://arjgroup.in/theme/home/luxury-residences-logo.jpg",
  "description": "ARJ GROUP offers luxury flats and premium residential projects in Noida and Greater Noida.",
  "sameAs": [
    "https://www.facebook.com/arjspaces",
    "https://www.instagram.com/arjspaces",
    "https://www.linkedin.com/company/arjspaces"
  ]
}
</script>

    
    
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
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
    echo '<link rel="icon" href="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" />';
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
              <?php
 

  // Fetch the latest record
  $result = $conn->query("SELECT head_tag_manager FROM tag_manager ORDER BY id DESC LIMIT 1");

  // Check if record exists
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $head_tag_manager = $row['head_tag_manager'];
  } else {
    $head_tag_manager = '';
  }
  ?>

 
    <?php echo $head_tag_manager; ?>
</head>

<?php
 

// Fetch profile data
$profile_sql = "SELECT * FROM profile";
$profile_result = $conn->query($profile_sql);
$profile_row = ($profile_result && $profile_result->num_rows > 0) ? $profile_result->fetch_assoc() : [];

if (isset($_GET['developer'])) {
    $developer_name = urldecode($_GET['developer']);

    // Fetch developer ID
    $stmt = $conn->prepare("SELECT id FROM developers WHERE name = ?");
    $stmt->bind_param("s", $developer_name);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res && $res->num_rows > 0) {
        $developer = $res->fetch_assoc();
        $developer_id = $developer['id'];

        // Fetch video names from developer_properties and match them with CK table
        $stmt2 = $conn->prepare("
            SELECT ck.*
            FROM dev_pro dp
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
    
    <?php
  

  // Fetch the latest record
  $result = $conn->query("SELECT body_tag_manager FROM tag_manager ORDER BY id DESC LIMIT 1");

  // Check if record exists
  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $head_tag_manager = $row['body_tag_manager'];
  } else {
    $head_tag_manager = '';
  }
  ?>

  <!-- Output inside script tag -->
  
    <?php echo $head_tag_manager; ?>
    
    
    <?php include 'header.php'; ?>
    <?php
 
// Get locality from URL
$filter_locality = isset($_GET['local']) ? urldecode($_GET['local']) : '';
if (!empty($filter_locality)) {
    // Get developer name from locality
    $stmt = $conn->prepare("
        SELECT l.name 
        FROM dev_pro lo 
        JOIN developers l ON l.id = lo.developer_id 
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



