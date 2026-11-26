

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
  <?php
include 'config.php';
error_reporting(0);

$records = $conn->query("SELECT * FROM meta_data WHERE LOWER(page_name) = 'project' LIMIT 1");
$meta = $records->fetch_assoc();
?>

<title><?= htmlspecialchars($meta['meta_title'] ?? 'Arj Spaces – Flats in Noida and Greater Noida') ?></title>
<meta name="description" content="<?= htmlspecialchars($meta['meta_description'] ?? '') ?>">
<meta name="keywords" content="<?= htmlspecialchars($meta['keywords'] ?? '') ?>">

<!--<title>Arj Spaces | Luxury Projects in Noida & Greater Noida</title>-->

<!--<meta name="description" content="Explore the best luxury projects in Noida and Greater Noida with Arj Spaces. Discover premium apartments, ready-to-move flats, and upcoming residential projects built by top developers in prime localities.">-->

<!--<meta name="keywords" content="luxury projects in noida, premium apartments noida, luxury flats greater noida, ready to move flats noida, top real estate projects noida, arj spaces noida, upcoming projects greater noida, high-end apartments noida, noida luxury residential projects, best builders noida, noida real estate projects, ultra luxury projects noida">-->

<meta name="robots" content="index, follow" />
<meta name="ROBOTS" content="ALL" />
<meta name="Slurp" content="index,follow,archive" />
<meta name="geo.region" content="IN" />
<meta name="allow-search" content="yes" />
<meta name="revisit-after" content="daily" />
<meta name="distribution" content="global" />
<meta name="expires" content="never" />

<link rel="canonical" href="https://arjgroup.in/projects.php" />
<link rel="alternate" hreflang="en-us" href="https://arjgroup.in/projects.php" />

<!-- Open Graph Tags (Facebook, LinkedIn, WhatsApp) -->
<meta property="og:title" content="Luxury Projects in Noida & Greater Noida | Arj Spaces" />
<meta property="og:description" content="Find premium residential and luxury real estate projects in Noida and Greater Noida by Arj Spaces. Explore high-end apartments, villas, and ready-to-move homes." />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://arjgroup.in/projects.php" />
<meta property="og:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

<!-- Twitter Card (for better link preview visibility) -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Luxury Projects in Noida & Greater Noida | Arj Spaces" />
<meta name="twitter:description" content="Explore luxury projects in Noida and Greater Noida with Arj Spaces. Discover premium apartments and ready-to-move flats from top developers." />
<meta name="twitter:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

<!-- Preload Important Images -->
<link rel="preload" href="https://arjgroup.in/images/noida-project-banner.webp" as="image" />
<link rel="preload" href="https://arjgroup.in/images/greater-noida-projects.webp" as="image" />

<!-- Schema Markup (Structured Data for Google Rich Results) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "RealEstateAgent",
  "name": "Arj Spaces",
  "url": "https://arjgroup.in",
  "logo": "https://arjgroup.in/theme/home/luxury-residences-logo.jpg",
  "description": "Arj Spaces offers luxury flats and premium residential projects in Noida and Greater Noida. Explore ready-to-move apartments, upcoming projects, and luxury properties from top builders.",
  "areaServed": {
    "@type": "Place",
    "name": "Noida & Greater Noida"
  },
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
<meta name="google-site-verification" content="1GE-eh3i3CFWbRH7t6juE61aZ6S2b0KSW31ovUlngQo">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/location.css">

     <link rel="stylesheet" href="css/swiper-bundle.min.css"> 
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <!--<link rel="stylesheet" href="css/header.css"> -->
     <link rel="stylesheet" href="css/home.css"> 
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

<style>
    .feature-project-cnt ul li {
        border-top: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
    }

    
</style>

<?php
 

// Fetch profile data
$profile_sql = "SELECT * FROM profile";
$profile_result = $conn->query($profile_sql);

if ($profile_result && $profile_result->num_rows > 0) {
    $profile_row = $profile_result->fetch_assoc();

    // Optional: fetch single property by slug
    $single_ck = null;
    if (isset($_GET['slug'])) {
        $slug = $conn->real_escape_string($_GET['slug']);
        $result = $conn->query("SELECT * FROM ck WHERE blog = '$slug'");
        if ($result && $result->num_rows > 0) {
            $single_ck = $result->fetch_assoc();
        }
    }

    // Filters
    $property_category = isset($_GET['property']) ? $conn->real_escape_string($_GET['property']) : '';
    $filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

    $ck_query = "SELECT * FROM ck WHERE propertyType = 'Projects'";

if (!empty($property_category)) {
    $ck_query .= " AND status12 = '$property_category'";
}

if (!empty($filter_status)) {
    $ck_query .= " AND status1 = '$filter_status'";
}

$ck_query .= " AND main_image IS NOT NULL AND main_image != ''";
$ck_query .= " ORDER BY id DESC";


    $ck_result = $conn->query($ck_query);
?>

  <?php
$filter_status = isset($_GET['status']) ? urldecode($_GET['status']) : '';

$ck_query = "SELECT * FROM ck";
if (!empty($filter_status)) {
    $ck_query .= " WHERE status1 = '$filter_status'";
}

// Set title based on filter
$page_heading = !empty($filter_status) ? $filter_status : '';
?>

            
<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="font-family: latoregular; font-size: 16px; background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
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
<div class="container text-center my-4">
  <h1 class="mb-2 fw-bold" style="font-size: 2.5rem; margin-top:120px;">
    Explore All <?= htmlspecialchars($page_heading) ?> Projects in Noida
  </h1>
  <h2 class="text-muted" style="font-size: 1.2rem;">
Discover homes that blend comfort, style, and a prime location. These Ready to Move properties feature modern architecture, premium amenities, and immediate possession. Whether you're looking for a spacious apartment, a sleek penthouse, or an elegant villa, Noida offers options tailored to your lifestyle. Perfect for families and investors alike, these homes deliver quality living with convenience and value.
  </h2>
</div>

<style>
  @media (max-width: 767.98px) {
    .project-list {
      margin-bottom: 50%;
    }
  }
</style>


<section class="feature-project">
    
 <div class="feature-project-div">
                    <div class="container">
                        <div class="row">
            
             
             
             <!--demo-->
             <div class="row g-4">
    <?php
            if ($ck_result && $ck_result->num_rows > 0) {
                while ($ck = $ck_result->fetch_assoc()) {
            ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-project-item">
                    <div class="feature-project-image">
                        <a href="views.php/<?= urlencode($ck['blog']) ?>">
                           <img src="admin/uploads/<?= htmlspecialchars($ck['main_image']) ?>" 
     alt="<?= htmlspecialchars($ck['video']) ?>" 
     class="img-fluid"
     style="width: 100%; height: 300px; object-fit: cover; border-radius: 2px;">

                        </a>
                        <span style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-size:20px; border-radius:10px; padding:5px; padding-top: 0px;
  padding-bottom: 0px;">
                            <?= htmlspecialchars($ck['status1']) ?>
                        </span>
                    </div>
                    <div class="feature-project-cnt">
                        <a href="views.php/<?= urlencode($ck['blog']) ?>" style="text-decoration:none;">
                            <h4 style="color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                                <?= htmlspecialchars($ck['video']) ?>
                            </h4>
                            <p><?= htmlspecialchars($ck['locality']) ?> <?= htmlspecialchars($ck['location']) ?></p>
                        </a>
                        <ul>
                            <li>
                                <span>Area: <?= htmlspecialchars($ck['configration']) ?></span>
                                <span>Size: <?= htmlspecialchars($ck['size']) ?></span>
                            </li>
                            <li>
                                <span><b>₹ <?= htmlspecialchars($ck['price']) ?: 'On Request' ?></b></span>
                                <span>
                                    <a class="btn" href="views.php/<?= urlencode($ck['blog']) ?>" 
                                       style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>;">
                                       View Details
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    <?php
                }
            } else {
                echo '<p class="text-center text-white">No records found.</p>';
            }
            ?>
</div>


<!--shfksdhf demohfgkhfdks-->
             
             
             
             
             
             
             
             
             
             

            <?php
            // if ($ck_result && $ck_result->num_rows > 0) {
            //     while ($ck = $ck_result->fetch_assoc()) {
            ?>
                <!--<div class="col-12 col-sm-6 col-lg-4">-->
                <!--    <a href="views.php/<?= urlencode($ck['blog']) ?>" class="project-link text-decoration-none"> -->
                <!--        <div class="proj_list" style="-->
                <!--            background-image: url(admin/uploads/<?= htmlspecialchars($ck['main_image']) ?>);-->
                <!--            background-size: cover;-->
                <!--            background-position: center;-->
                <!--            border: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;-->
                <!--            padding: 20px;-->
                <!--            color: <?= htmlspecialchars($profile_row['background_color']) ?>;-->
                <!--            border-radius: 8px;-->
                <!--            min-height: 250px;-->
                <!--        ">-->
                <!--            <h2 style="-->
                <!--                color: <?= htmlspecialchars($profile_row['background_color']) ?>;-->
                <!--                font-weight: bold;-->
                <!--                font-family: poppinssemibold;-->
                <!--                background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;-->
                <!--                padding: 4px 10px;-->
                <!--                border-radius: 4px;-->
                <!--                display: inline-block;-->
                <!--            "><?= htmlspecialchars($ck['video']) ?></h2>-->

                <!--            <p style="font-size: 18px;"><?= htmlspecialchars($ck['locality']) ?></p>-->

                <!--            <h4 style="font-family: poppinssemibold; font-size: 18px;">-->
                <!--                <?= htmlspecialchars($ck['configration']) ?> @ <?= htmlspecialchars($ck['price']) ?>-->
                <!--            </h4>-->
                <!--        </div>-->
                <!--    </a>   -->
                <!--</div>-->
            <?php
            //     }
            // } else {
            //     echo '<p class="text-center text-white">No records found.</p>';
            // }
            ?>
 </div>
                    </div>
                </div>
            </section>

</body>
</html>

<?php
}
$conn->close();
?>






<!--<h1 style="display: none;">skjsjf</h1>-->

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