<?php
include "config.php";
error_reporting(0);

function cleanCKEContent($input)
{
    return str_replace(["\\r\\n", "\\n", "\\r"], "", htmlspecialchars_decode($input));
}

// Get slug from path
$slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if (!empty($slug)) {
    $stmt = $conn->prepare("SELECT * FROM ck WHERE blog = ?");
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ck_id = $row['id'];

        $clean_description  = cleanCKEContent($row['description']);
        $clean_amenities    = cleanCKEContent($row['amenities']);
        $clean_floor_plan   = cleanCKEContent($row['floor_plan']);

        // Profile Info
        $profile_result = $conn->query("SELECT * FROM profile LIMIT 1");
        $profile_row = $profile_result->fetch_assoc();
?>






        <!DOCTYPE html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
            <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">
            
             <link rel="icon" href="images/ceaedb59-2804-434c-be2c-ddaef051c555-removebg-preview (1).png" />
           <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">


<!-- Bootstrap & JS -->
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>-->




           <meta charset="utf-8">
<title><?= htmlspecialchars($row['meta_title']) ?></title>
<meta name="description" content="<?= htmlspecialchars($row['meta_description']) ?>">
<meta name="keywords" content="<?= htmlspecialchars($row['meta_keywords']) ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-site-verification" content="1GE-eh3i3CFWbRH7t6juE61aZ6S2b0KSW31ovUlngQo">

<!-- Author & Robots -->
<meta name="author" content="Arj Spaces">
<meta name="publisher" content="Arj Spaces">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta name="revisit-after" content="daily">
<meta name="distribution" content="global">
<meta name="geo.region" content="IN">
<meta name="allow-search" content="yes">
<meta name="expires" content="never">
<link rel="canonical" href="https://arjgroup.in/views.php/<?= urlencode($row['blog']) ?>" />

<!-- Open Graph (Facebook / LinkedIn / WhatsApp) -->
<meta property="og:title" content="<?= htmlspecialchars($row['meta_title']) ?>">
<meta property="og:description" content="<?= htmlspecialchars($row['meta_description']) ?>">
<meta property="og:url" content="https://arjgroup.in/views.php/<?= urlencode($row['blog']) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Arj Spaces - Flats in Noida and Greater Noida">
<meta property="og:image" content="https://arjgroup.in/admin/uploads/<?= htmlspecialchars($row['main_image']) ?>">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= htmlspecialchars($row['meta_title']) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($row['meta_description']) ?>">
<meta name="twitter:image" content="https://arjgroup.in/admin/uploads/<?= htmlspecialchars($row['main_image']) ?>">
<meta name="twitter:site" content="@arjspaces">
<meta name="twitter:creator" content="@arjspaces">

<!-- Structured Data for Google (JSON-LD) -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "RealEstateAgent",
  "name": "Arj Spaces - Flats in Noida and Greater Noida",
  "url": "https://arjgroup.in/",
  "logo": "https://arjgroup.in/assets/img/logo.png",
  "image": "https://arjgroup.in/admin/uploads/<?= htmlspecialchars($row['main_image']) ?>",
  "description": "Explore luxury flats and residential projects by Arj Spaces in Noida and Greater Noida. Find modern amenities, great locations, and premium homes for every lifestyle.",
  "areaServed": {
    "@type": "Place",
    "name": "Noida, Greater Noida, Uttar Pradesh, India"
  },
  "sameAs": [
    "https://www.facebook.com/arjspaces",
    "https://www.instagram.com/arjspaces",
    "https://www.linkedin.com/company/arjspaces"
  ],
  "makesOffer": {
    "@type": "Offer",
    "itemOffered": {
      "@type": "ApartmentComplex",
      "name": "<?= htmlspecialchars($row['meta_title']) ?>",
      "description": "<?= htmlspecialchars($row['meta_description']) ?>",
      "image": "https://arjgroup.in/admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
    }
  }
}
</script>

<!-- Additional SEO Enhancements -->
<meta name="theme-color" content="#ffffff">
<link rel="alternate" hreflang="en-IN" href="https://arjgroup.in/views.php/<?= urlencode($row['blog']) ?>" />
<link rel="icon" href="https://arjgroup.in/favicon.ico" type="image/x-icon">

            
            
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <script src="js/bootstrap.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome Icons -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Cardo:ital,wght@0,400;0,700;1,400&family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">


            <!--<base href="/prayatna/">-->
             <!--<base href="http://localhost:8080/arj/"> -->
 <base href="https://arjgroup.in/"> 

            <!-- CSS Assets Start -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="css/css1/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="css/css1/project-page.css">
            <link rel="stylesheet" href="css/css1/auto-popup.css">
            <link rel="preload" fetchpriority="high" as="image" href="images/ambience-tiverton/ambience-tiverton-mobile-banner.webp" type="image/webp">
            <!-- CSS Assets End -->

            <!-- Google Tag Manager Start -->
            <script src="js/js1/gtmTag.js"></script>

            <style>
                .logo-fix {
                    display: none;
                }

                @media only screen and (max-width:991px) {
                    .logo-fix {
                        display: block;
                    }
                }

                @media only screen and (max-width:767px) {
                    .logo-fix {
                        display: block;
                    }
                }

                @media only screen and (max-width:575px) {
                    .logo-fix {
                        display: block;
                    }
                }

                @media only screen and (max-width: 991px) {}
            </style>
            
            
            <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WC39NDS8');</script> 
            
            
        </head>

        <body style="font-family: 'Nunito', sans-serif !important;  background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>; ">
           <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WC39NDS8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> 
<!-- End Google Tag Manager (noscript) -->
            <!-- Header Section Start-->
            <header class="clearHeader" style="padding: 10px 0 !important;  background-color: #f5f5f5 !important;">
                <div class="container">
                    <div class="header-inner">

                        <?php
 
include 'functions.php'; // if you save the function in a separate file

$logoPath = getSiteLogo($conn);

if ($logoPath) {
?>
    <div class="project-logo">
        <a href="https://arjgroup.in/" aria-label="Go to Luxury Projects in Noida Homepage">
            <img src="admin/<?= $logoPath ?>" class="img-fluid" width="130" height="77" alt="website logo" style="max-width: 65%;">
        </a>
    </div>
<?php
} else {
    echo '<div class="logo">Logo not found</div>';
}
?>


                        <div class="menu">
                            <div class="button_container" id="toggle">
                                <span class="top"></span>
                                <span class="middle"></span>
                                <span class="bottom"></span>
                            </div>
                            <div class="overlay" id="overlay" style="height: 70% !important;">
                                <nav class="overlay-menu">
                                    <style>
                                        ul li a:hover {
                                            background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                                            color:#fff !important;
                                        }
                                    </style>

                                    <style>
                                        @media only screen and (max-width: 991px) {

                                            .button_container span,
                                            .overlay {
                                                background: rgb(105 105 105) !important;
                                            }
                                        }
                                    </style>
                                    <ul>
                                        <li class="current"><a href="#home">Home</a></li>
                                        <li><a href="#about">About Us</a></li>
                                        <li><a href="#highlights">Highlights</a></li>
                                        <li><a href="#amenities">Amenities</a></li>
                                        <li><a href="#gallery">Gallery</a></li>
                                        <li><a href="#floor-plan">Floor Plan</a></li>
                                        <li><a href="#faq">FAQ's</a></li>
                                        <li class="mobile-number">
            <!--<a title="Call Now" href="tel:+91-7065555791" style="border:1px solid #000; padding:6px; border-radius:10px; ">-->
            <!--    <i class="bi bi-telephone-fill" style="margin-right: 8px;"></i> +91-7065555791-->
            <!--    </a>-->
            
                                    <?php
 

// simple query
$result = $conn->query("SELECT mobile FROM profile_settings LIMIT 1");

// fetch single value
$mobile = $result->fetch_assoc()['mobile'] ?? '';

if ($mobile) {
    echo '
    <li class="mobile-number">
        <a href="tel:' . $mobile . '" title="Call Now" style="border-radius:20px ; border:1px solid #000; padding:6px;">
            <i class="bi bi-telephone-fill" style="margin-right: 8px;"></i>
            ' . $mobile . '
        </a>
    </li>';
}
?>


         </li>
                                        
                                         <?php
// include 'config.php';

// // Fetch mobile number from the database
// $all = $conn->query("SELECT mobile FROM profile_settings LIMIT 1");

// if ($all && $all->num_rows > 0) {
//     $row = $all->fetch_assoc();
//     $mobile = htmlspecialchars($row['mobile']); // sanitize output
//     echo '<li class="mobile-number">
//             <a title="Call Now" href="tel:' . $mobile . '">
//                 <i class="bi bi-telephone-fill" style="margin-right: 8px;"></i>' . $mobile . '
//             </a>
//           </li>';
// }
?>
                                        <!--<li class="logo-fix"><a title="Home" href="https://luxuryprojectsinnoida.com/"><img src="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" decoding="async" loading="lazy" alt="logo" class="img-fluid" title="logo" width="130" height="50"></a></li>-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!--<div class="luxury-logo">-->
                        <!--    <a href="https://luxuryprojectsinnoida.com/"><img src="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" loading="lazy" decoding="async" alt="logo" loading="lazy" title="logo" class="img-fluid" width="130" height="80"></a>-->
                        <!--</div>-->
                    </div>
                </div>
            </header>
<style>
  @media (max-width: 767.98px) {
    #home.home-banner {
      margin-top: 50px;
    }
  }
</style>
            <!-- Header Section End-->
            <section class="home-banner" id="home" style=" background-image:url('admin/uploads/<?= htmlspecialchars($row['main_image']) ?>');">
                <div class="home-banner-img">
                    <!-- <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>" alt="Luxury Projects NOIDA sector 50" decoding="async" fetchpriority="high" title="Luxury Projects NOIDA Sector 50 Noida" width="991" height="600" class="tab-img img-fluid"> -->
                    
                    <div class="image-wrapper position-relative">
                        
                        <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
                            alt="Luxury Projects NOIDA sector 50"
                            decoding="async"
                            fetchpriority="high"
                            title="Luxury Projects NOIDA Sector 50 Noida"
                            width="957"
                            height="1024"
                            class="mobile-img img-fluid">

                        <h2 class="image-title text-center" style="font-family: 'Cardo', serif !important;"><?= htmlspecialchars($row['video']) ?></h2> 
                     
                    </div>

                    <style>
                        .image-wrapper {
                            position: relative;
                            display: inline-block;
                            width: 100%;
                        }

                        .image-title {
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            color: white;
                            background-color: rgba(0, 0, 0, 0.7);
                            padding: 10px;
                            font-size: 18px;
                            font-weight: bold;
                            font-family: 'Cardo', serif !important;
                            border-radius: 5px;
                            z-index: 2;
                            max-width: 90%;
                            text-align: center;
                        }
                    </style>


                </div>
                <div class="banner-cnt">
                    <div class="container">
                        <div class="project-configurations" style="text-shadow:none !important;">
                            <h1 style="font-family: 'Cardo', serif !important; font-weight:700 !important;"><?= htmlspecialchars($row['video']) ?>, <?= htmlspecialchars($row['location']) ?></h1>
                          
<!-- htmlspecialchars($row['localtion']) -->

                            <p style="font-family: 'Nunito', sans-serif !important; font-weight:bold !important;"><?= htmlspecialchars($row['address']) ?></p>
                            <div class="banner-configurations-site-visit">
                                <div class="banner-configurations">
                                    <div class="configuration-item configurations-size">
                                        <style>
                                            h4 {
                                                background-color: #f5f5f5 !important;
                                                padding: 5px;
                                                border: none;
                                                border-radius: 5px;
                                                color: #000080 !important;
                                               font-family: 'Cardo', serif !important;
                                                font-weight: bold !important;
                                                font-weight: bold !important;
                                                /*width: 200px;*/
                                                text-align: center;
                                            }

                                            p {
                                                font-family: 'Nunito', sans-serif !important;


                                            }
                                        </style>
                                        <div class="box">
                                            <h4>Price</h4>
                                            <p style="font-weight:bold !important;"><?= htmlspecialchars($row['price']) ?></p>
                                        </div>
                                    </div>
                                    <div class="configuration-item configurations-size">
                                        <h4>Sizes</h4>
                                        <p style="font-weight:bold !important;"><?= htmlspecialchars($row['size']) ?></p>
                                    </div>
                                    <div class="configuration-item configurations-size">
                                        <h4>Configurations</h4>
                                        <p style="font-weight:bold !important;"><?= htmlspecialchars($row['configration']) ?></p>
                                    </div>
                                    <div class="configuration-item configurations-size">
                                        <h4>Status</h4>
                                        <p style="font-weight:bold !important;"><?= htmlspecialchars($row['status1']) ?></p>
                                    </div>
                                    <div class="configuration-item">
                                        <h4>Rera No.</h4>
                                        <p style="font-weight:bold !important;"><?= htmlspecialchars($row['rera']) ?></p>
                                    </div>
                                </div>
                                <div class="project-site-visit">


                                    <?php
                                    // $profile_sql = "SELECT * FROM profile";
                                    //     $profile_result = $conn->query($profile_sql);

                                    //     if ($profile_result) {
                                    //         while ($profile_row = $profile_result->fetch_assoc()) {
                                    ?>

                                    <a href="#" class="btn" aria-label="Go to Luxury Projects in Noida Homepage" data-bs-toggle="modal" data-bs-target="#exampleModalPopup"
                                        style="background-color: <?= htmlspecialchars($profile_row['button_background_color']) ?>; color: <?= htmlspecialchars($profile_row['body_background_color']) ?>; font-weight: bold !important; font-size: 18px; border:none; color:#fff;font-family: 'Cardo', serif !important;">
                                        Schedule Site Visit
                                    </a>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="project-info-section same-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon1.webp" alt="Luxury Projects NOIDA noida sector 50"
                                    title="Luxury Projects NOIDA Wish Town" class="icon flaticon img-fluid" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>PROPERTY :</h3>
                                    <p><?= htmlspecialchars($row['video']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon2.webp" alt="Luxury Projects NOIDA 3 bhk price"
                                    title="Luxury Projects NOIDA 4 BHK Price" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>LOCATION :</h3>
                                    <p><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?>, <?= htmlspecialchars($row['address']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon3.webp" alt="Luxury Projects NOIDA apartments"
                                    title="Luxury Projects NOIDA Flat for Sale" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>PRICE :</h3>
                                    <p><?= htmlspecialchars($row['price']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon4.webp" alt="Luxury Projects NOIDA for sale"
                                    title="Luxury Projects NOIDA Apartment for Sale" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>SIZES :</h3>
                                    <p><?= htmlspecialchars($row['size']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon5.webp" alt="Luxury Projects NOIDA price list" title="Luxury Projects NOIDA Buy"
                                    class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>CONFIGURATION :</h3>
                                    <p><?= htmlspecialchars($row['configration']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon6.webp" alt="Luxury Projects NOIDA brochure pdf"
                                    title="Luxury Projects NOIDA Floor Plan" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>STATUS :</h3>
                                    <p><?= htmlspecialchars($row['status1']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon7.png" alt="Luxury Projects NOIDA payment plan"
                                    title="Luxury Projects NOIDA Address" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>Rera No. :</h3>
                                    <p><?= htmlspecialchars($row['rera']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
           <!-- About Section -->
<section class="about-section py-5" id="about"style="background-color:#fff !important;" >
  <div class="container">
    <div class="row align-items-center">
      <!-- Text -->
      <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
        
        <div class="content-box shadow-sm p-4 rounded">
            <div class="section-title text-center mb-3">
          <h2 class="title-highlight" style="color:#f5f5f5;" style="font-family: 'Cardo', serif !important;">
            About <?= htmlspecialchars($row['video']) ?>
          </h2>
        </div>
          <p><?= htmlspecialchars_decode($row['content']) ?></p>
          <?php if (!empty($row['payment'])): ?>
            <div class="payment-plan-box mt-3 p-3 rounded">
              <h3>💰 Payment Plan: <?= htmlspecialchars($row['payment']) ?></h3>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- Image -->
      <?php if (!empty($row['video']) && !empty($row['about_img'])): ?>
      <div class="col-lg-6" data-aos="fade-left">
        <img src="admin/uploads/<?= htmlspecialchars($row['about_img']) ?>" 
             alt="<?= htmlspecialchars($row['video']) ?>" 
             class="img-fluid rounded shadow-lg">
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Highlights Section -->
<?php if (!empty($row['highlights']) || !empty($row['img_highlights'])): ?>
<section class="highlight-section py-5 " id="highlights" style="background-color:#fff !important;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Text -->
      <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-up">
        
        <div class="content-box shadow-sm p-4 rounded">
           <div class="section-title text-center mb-3">
          <h2 class="title-highlight" style="color:#f5f5f5;">
            <?= htmlspecialchars($row['video']) ?> Highlights
          </h2>
        </div>
          <p><?= htmlspecialchars_decode($row['highlights']) ?></p>
        </div>
      </div>
      <!-- Image -->
      <div class="col-lg-5" data-aos="zoom-in">
        <div class="image-box rounded shadow-lg" 
             style="background-image: url('admin/uploads/<?= htmlspecialchars($row['img_highlights']) ?>');">
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Amenities Section -->
<?php if (!empty($row['amenities']) || !empty($row['img_amenities'])): ?>
<section class="amenities-section py-5" id="amenities" style="background-color:#fff !important;">
  <div class="container">
    <div class="row align-items-center flex-lg-row-reverse">
      <!-- Text -->
      <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-up">
       
        <div class="content-box shadow-sm p-4 rounded">
           <div class="section-title text-center mb-3">
          <h2 class="title-highlight" style="color:#f5f5f5;">
            <?= htmlspecialchars($row['video']) ?> Amenities
          </h2>
        </div>
          <p><?= htmlspecialchars_decode($row['amenities']) ?></p>
        </div>
      </div>
      <!-- Image -->
      <div class="col-lg-5" data-aos="zoom-in">
        <div class="image-box rounded shadow-lg" 
             style="background-image: url('admin/uploads/<?= htmlspecialchars($row['img_amenities']) ?>');">
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- Floor Plan Section -->
<?php if (!empty($row['floor_plan']) || !empty($row['img_floor_plan'])): ?>
<section class="floor-plan-section py-5 " id="floor-plan" style="background-color:#fff !important;">
  <div class="container">
    <div class="row align-items-center">
      <!-- Text -->
      <div class="col-lg-7 mb-4 mb-lg-0" data-aos="fade-right">
        <!-- <h2 class="title-highlight">Sizes & Floor Plan</h2> -->
        <div class="content-box shadow-sm p-4 rounded">
             <div class="section-title text-center mb-3">
          <h2 class="title-highlight" style="color:#f5f5f5;">
           Sizes & Floor Plan
          </h2>
        </div>
          <p><?= htmlspecialchars_decode($row['floor_plan']) ?></p>
        </div>
      </div>
      <!-- Image -->
      <div class="col-lg-5" data-aos="zoom-in">
        <div class="image-box rounded shadow-lg" 
             style="background-image: url('admin/uploads/<?= htmlspecialchars($row['img_floor_plan']) ?>');">
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- CSS Styles -->
<style>
  .title-highlight {
    background: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
    color: <?= htmlspecialchars($profile_row['background_color']) ?>;
    font-family: 'Cardo', serif !important; 
    border-radius: 8px;
    padding: 10px 20px;
    display: inline-block;
    margin-bottom: 20px;
    text-align:center !important;
  }
  .content-box {
    font-size: 1.05rem;
    line-height: 1.7;
    text-align: justify;
  }
  .payment-plan-box {
    border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
    background: #f9f9f9;
    text-align: center;
    font-weight: bold;
    color: #000080;
  }
  .image-box {
    width: 100%;
    height: 350px;
    background-size: cover;
    background-position: center;
    border-radius: 10px;
  }
  @media (max-width: 767px) {
    .image-box {
      height: 250px;
    }
    .title-highlight {
      font-size: 1.2rem;
      padding: 6px 12px;
    }
  }
</style>

<!-- Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>



            <?php
 

            // Get slug from SEO-friendly URL
            $slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

            if (!empty($slug)) {
                // Step 1: Fetch property (ck) based on slug
                $stmt = $conn->prepare("SELECT * FROM ck WHERE blog = ?");
                $stmt->bind_param("s", $slug);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($row = $result->fetch_assoc()) {
                    $selected_label = $row['video']; // This is the "label" for matching PDFs

                    // Step 2: Fetch PDFs where ck.video = pdf_files.blog_id via LEFT JOIN
                    $query = "SELECT pdf_files.*, ck.video 
                  FROM pdf_files 
                  LEFT JOIN ck ON pdf_files.blog_id = ck.id 
                  WHERE ck.video = ? 
                  ORDER BY pdf_files.uploaded_at DESC";

                    $pdf_stmt = $conn->prepare($query);
                    $pdf_stmt->bind_param("s", $selected_label);
                    $pdf_stmt->execute();
                    $pdf_result = $pdf_stmt->get_result();

                    // Step 3: Display results
                    if ($pdf_result->num_rows > 0) {
                        while ($pdf = $pdf_result->fetch_assoc()) {
                            $file_path = htmlspecialchars($pdf['pdf_path']);
                            $label_text = htmlspecialchars($pdf['video']);
            ?>
                            <center>
                                <a href="admin/<?= $file_path; ?>" aria-label="Go to Luxury Projects in Noida Homepage" download class="btn btn-success btn-sm d-block text-center p-2" style="font-size: 24px; max-width: 100%; width: 90%; margin: auto;">
                                    <i class="bi bi-download"></i> Download Brochure
                                </a>
                            </center>
                            <hr>
            <?php
                        }
                    } else {
                        // echo "<center><p>No PDFs found for this property.</p></center>";
                    }
                } else {
                    // echo "<center><p>Property not found.</p></center>";
                }
            } else {
                // echo "<center><p>Invalid property slug.</p></center>";
            }
            ?>





            <section class="gallery-section" id="gallery" style="background-color:#fff !important;">
                <div class="container-fluid">


                    <div class="row g-0">
                        <?php
                        $video_url = trim($row['video_url']);
                        $label_text = htmlspecialchars($row['label_text'], ENT_QUOTES, 'UTF-8');

                        // Extract YouTube Video ID
                        preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/|v\/)|youtu\.be\/)([\w-]+)/', $video_url, $matches);
                        $video_id = $matches[1] ?? '';

                        if (!empty($video_id)) {
                            echo '
    <div class="single_property_details mt-4 wow fadeInUp" data-wow-duration="1.5s" style="text-align: center;">
         <div class="section-title text-center mb-3">
          <h2 class="title-highlight" style="color:#f5f5f5;">
           Project Video
          </h2>
        </div>
        <div class="mx-auto ratio ratio-16x9" style="width: 100%; height: 320px;">
            <iframe 
                src="https://www.youtube.com/embed/' . htmlspecialchars($video_id) . '" 
                title="YouTube video"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>';
                        }
                        ?>
                    </div>
                </div>
            </section>















            <!-- <a href="' . $imagePath . '" data-lightbox="gallery" data-title="' . $titleText . '"> -->
            
            <?php
             

            // Get slug from SEO-friendly URL
            $slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

            // Fetch project from `ck` table using slug
            $ck_id = 0;
            if (!empty($slug)) {
                $stmt = $conn->prepare("SELECT * FROM ck WHERE blog = ?");
                $stmt->bind_param("s", $slug);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    $ck_data = $result->fetch_assoc();
                    $ck_id = intval($ck_data['id']);
                }
            }

            // Now fetch images only for this ck_id (if valid)
            $image = null;
            if ($ck_id > 0) {
                $image = $conn->query("SELECT * FROM property_images WHERE ck_id = $ck_id");
            }

            // Optional: Fetch CK dropdown list or other use
            $ck_options = $conn->query("SELECT id, video FROM ck ORDER BY blog DESC");
            ?>

            <?php if ($image && $image->num_rows > 0): ?>
                <section class="gallery-section" id="gallery" style="background-color:#fff !important;">
                    <div class="container-fluid">

                        <h2 class="head">Project Gallery</h2>

                        <style>
                            .head {
                                background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                                color: <?= htmlspecialchars($profile_row['background_color']) ?> !important;
                                font-family: 'Nunito', sans-serif !important;
                                border: none;
                                border-radius: 6px;
                                text-align: center;
                                margin: 0 auto;
                                font-weight: bold;
                                padding: 10px;
                                width: 40%;
                            }

                            @media (max-width: 767px) {
                                .head {
                                    font-size: 20px;
                                    width: 80%;
                                }
                            }

                            .gallery-item img {
                                height: 250px;
                                width: 100%;
                                object-fit: cover;
                                border-radius: 8px;
                                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                            }
                        </style>

                        <div class="section-title text-center"></div>
                        

                        <div class="row g-0">
                            <?php
                            while ($row = $image->fetch_assoc()) {
                                $imagePath = 'admin/' . htmlspecialchars($row['image_path']);
                                $altText = htmlspecialchars(!empty($row['alt_text']) ? $row['alt_text'] : 'Gallery Image');
                                $titleText = htmlspecialchars(!empty($row['title_text']) ? $row['title_text'] : 'Gallery Image');

                                echo '<div class="col-6 col-lg-3 mb-3">
                        <div class="gallery-item">
                            <a href="' . $imagePath . '" data-lightbox="gallery" data-title="' . $titleText . '">
                                <img 
                                    width="480" 
                                    height="380" 
                                    alt="' . $altText . '" 
                                    title="' . $titleText . '" 
                                    class="img-fluid rounded border" 
                                    decoding="async"  
                                    src="' . $imagePath . '"
                                >
                            </a>
                        </div>
                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>


            <!-- Lightbox2 CSS & JS -->

            <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>





            <style>
                .featured-inner h4 {
                    border-left: 6px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;

                }

                .highlight-div ul li::before {
                    color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                }

                .gray-background .inner-title ul li::before {
                    color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                }

                .specialist-block h5 {
                    border-left: 6px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                }

                /* strong {
                                                color: rgb(255, 111, 54) !important;
                                            } */
                #exampleModalPopup .close {
                    color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                }
            </style>
    <?php
    }
}

$conn->close();
    ?>


    <?php
    include 'config.php';
    // Get slug from path
    $slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    if (!empty($slug)) {
        $stmt = $conn->prepare("SELECT * FROM ck WHERE blog = ?");
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $ck_id = $row['id'];

            $clean_description  = cleanCKEContent($row['description']);
            $clean_highlights   = cleanCKEContent($row['highlights']);
            $clean_amenities    = cleanCKEContent($row['amenities']);
            $clean_floor_plan   = cleanCKEContent($row['floor_plan']);

            // Profile Info
            $profile_result = $conn->query("SELECT * FROM profile LIMIT 1");
            $profile_row = $profile_result->fetch_assoc();
    ?>
            <?php if (!empty($row['status'])): ?>
                
                <section class="gallery-section" id="gallery" style="background-color:#fff !important;">
                <div class="container" style="background-color:#fff !important; padding-top:20px;" >
                    <div class="section-title text-center mb-3">
          <h2 class="title-highlight" style="color:#f5f5f5;">
           About Developer
          </h2>
        </div>
   
    </style>
    <p style="padding:0 40px !important; background-color:#fff !important;">
        <?= htmlspecialchars_decode($row['status']) ?>
    </p>
</div>
                </section>





            <?php else: ?>
                <!-- <p>Location map not available.</p> -->
            <?php endif; ?>


            <?php
            

            // Get slug from SEO-friendly URL
            $slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

            // Get matching project from `ck` table
            $ck_id = 0;
            $faqs = null;

            if (!empty($slug)) {
                $stmt = $conn->prepare("SELECT * FROM ck WHERE blog = ?");
                $stmt->bind_param("s", $slug);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    $ck_data = $result->fetch_assoc();
                    $ck_id = intval($ck_data['id']);
                }
            }

            // ✅ Fetch FAQs only for the matched ck_id
            if ($ck_id > 0) {
                $faq_stmt = $conn->prepare("SELECT * FROM faq WHERE ck_id = ?");
                $faq_stmt->bind_param("i", $ck_id);
                $faq_stmt->execute();
                $faqs = $faq_stmt->get_result();
            }

            // Optional: Fetch CK dropdown list
            $ck_options = $conn->query("SELECT id, video FROM ck ORDER BY id DESC");
            ?>

            <section class="faq-section" id="faq" style="background-color:#fff !important; padding-top:20px;">
                <div class="container">
                    <?php if ($faqs->num_rows > 0): ?>
                        <div class="section-title text-center">
                            <h2 style=" padding: 10px; color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family: 'Nunito', sans-serif !important; border:none; border-radius:6px;">Frequently Asked Questions</h2>
                            <!--<h2>Frequently Asked Questions</h2>-->
                        </div>
                    <?php endif; ?>

                    <div class="faq-accordion" itemscope itemtype="https://schema.org/FAQPage">
                        <div class="row">
                            <?php if ($faqs->num_rows > 0): ?>
                                <?php while ($faq = $faqs->fetch_assoc()): ?>
                                    <div class="col-md-6">
                                        <div class="specialist-block" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" style="border:1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>; border-radius:5px;">
                                            <h5 itemprop="name">
                                                <strong style="color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;"> <?= htmlspecialchars($faq['question']) ?></strong>
                                            </h5>
                                            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                                <p itemprop="text" style="color:#000;"><?= htmlspecialchars($faq['answer']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <!-- <div class="col-12 text-danger">No FAQs found for this property.</div> -->
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <style>
                .feature-box {
                    background-color: #1d1f21;
                    color: #fff;
                    padding: 30px 0;
                }

                .feature-item {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    margin-bottom: 20px;
                }

                .feature-icon {
                    width: 50px;
                    height: 50px;
                    border: 1px solid #3a3a3a;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 20px;
                    color: #ccc;
                }

                .feature-text h6 {
                    margin: 0;
                    font-weight: 600;
                }

                .feature-text p {
                    margin: 0;
                    font-size: 14px;
                    color: #ccc;
                }

                @media (min-width: 768px) {
                    .feature-item {
                        margin-bottom: 0;
                    }
                }

                .feature-box {
                    background-color: #1d1f21;
                    color: #fff;
                    padding: 30px 0;
                }

                .feature-item {
                    display: flex;
                    align-items: center;
                    gap: 15px;
                    margin-bottom: 20px;
                }

                .feature-icon {
                    width: 50px;
                    height: 50px;
                    border: 1px solid #3a3a3a;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 20px;
                    color: #ccc;
                    transition: all 0.3s ease;
                }

                /* 🔥 Hover Effect for Icon */
                .feature-icon:hover {
                    color: #ff9800;
                    /* Icon color on hover */
                    border-color: #ff9800;
                    /* Optional: border color change */
                    background-color: #2c2f31;
                    /* Optional: subtle background */
                }

                .feature-text h6 {
                    margin: 0;
                    font-weight: 600;
                }

                .feature-text p {
                    margin: 0;
                    font-size: 14px;
                    color: #ccc;
                }

                @media (min-width: 768px) {
                    .feature-item {
                        margin-bottom: 0;
                    }
                }
            </style>



            <?php
           

            // Get slug from SEO-friendly URL
            $slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

            // Initialize
            $ck_id = 0;
            $faqs = null;
            $similarProperties = []; // ✅ Initialize this to avoid "undefined variable" warnings

            if (!empty($slug)) {
                // Step 1: Fetch the current property based on slug
                $stmt = $conn->prepare("SELECT * FROM ck WHERE blog = ?");
                $stmt->bind_param("s", $slug);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $property = $result->fetch_assoc();
                    $propertyType = trim($property['status1']); // Example: "Ready To Move"

                    // Step 2: Fetch similar properties with same status1 (excluding the current slug)
                    $stmt = $conn->prepare("SELECT * FROM ck WHERE status1 = ? AND blog != ? ORDER BY RAND() LIMIT 6");
                    $stmt->bind_param("ss", $propertyType, $slug); // ✅ use $slug instead of undefined $blogSlug
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        $similarProperties[] = $row;
                    }
                } else {
                    echo "<p class='text-danger text-center'>Property not found!</p>";
                    exit;
                }
            } else {
                echo "<p class='text-danger text-center'>No property slug provided!</p>";
                exit;
            }
            ?>


            <section class="feature-project py-5" style="background-color:#fff !important;">
                <div class="container">
                    <!-- Section Heading -->
                    <div class="text-center mb-4">
                        <h3 class="py-2 px-4" style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; 
                     color: <?= htmlspecialchars($profile_row['background_color']) ?>; 
                     font-family: 'Cardo', serif; display: inline-block; border-radius: 6px;">
                            Similar Projects
                        </h3>
                        <p class="text-muted">Check out some of our Similar properties</p>
                    </div>

                    <?php if (count($similarProperties) > 0): ?>
                        <div class="row g-4">
                            <?php foreach ($similarProperties as $row): ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <!-- Image with label -->
                                        <div class="position-relative">
                                            <a href="views.php/<?= urlencode($row['blog']) ?>" >
                                                <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
                                                    alt="<?= htmlspecialchars($row['video']) ?>"
                                                    class="card-img-top img-fluid"
                                                    style="height: 240px; object-fit: cover;">
                                            </a>
                                            <div class="position-absolute top-0 start-0 text-white px-3 py-1 fw-bold rounded-end"
                                                style="font-size: 14px; background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                                                <?= htmlspecialchars($row['status1']) ?>
                                            </div>
                                        </div>

                                        <!-- Card Content -->
                                        <div class="card-body">
                                            <h5 class="card-title text-center" style="color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                                                <?= htmlspecialchars($row['video']) ?>
                                            </h5>
                                            <p class="text-center text-muted mb-3"><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?></p>

                                            <div class="d-flex justify-content-between border-top pt-2">
                                                <small>Area: <?= htmlspecialchars($row['configration']) ?></small>
                                                <small>Size: <?= htmlspecialchars($row['size']) ?></small>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <strong class="text-dark fs-5">₹ <?= htmlspecialchars($row['price']) ?>*</strong>
                                                <a href="views.php/<?= urlencode($row['blog']) ?>"
                                                    class="btn btn-sm"
                                                    style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; 
                                              color: <?= htmlspecialchars($profile_row['background_color']) ?>;">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- View All Button -->
                        <div class="text-center mt-5">
                            <a href="projects.php"
                                class="btn btn-lg"
                                style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                          color: <?= htmlspecialchars($profile_row['background_color']) ?>;">
                                View All Projects
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="text-center text-muted">
                            <p>No similar properties found in "<?= htmlspecialchars($propertyType) ?>" category.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>














            <div class="container-fluid feature-box">
                <div class="container">
                    <div class="row text-center text-md-start">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    🗝️
                                </div>
                                <div class="feature-text">
                                    <h6>Exclusive Project Access</h6>
                                    <!--<p>Free Shipping for orders over ₹499</p>-->
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    🏆
                                </div>
                                <div class="feature-text">
                                    <h6>Luxury Deal Expertise</h6>
                                    <!--<p>Within 7 days for an exchange</p>-->
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    🤝
                                </div>
                                <div class="feature-text">
                                    <h6>Personalized Client Service</h6>
                                    <!--<p>24 hours a day, 7 days a week</p>-->
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    🏗️
                                </div>
                                <div class="feature-text">
                                    <h6>Developer Tie-Ups</h6>
                                    <!--<p>Pay with Multiple Credit Cards</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            <!--Footer Start -->
            <footer style="background-color:<?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
                <div class="top-footer">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-5 col-lg-4">

                        <?php
                    }
                }

                $conn->close();
                        ?>












                        <?php
                        


include 'config.php';
                        // Get slug from path
                        $slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

                        if (!empty($slug)) {
                            $stmt = $conn->prepare("SELECT * FROM ck WHERE blog = ?");
                            $stmt->bind_param("s", $slug);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $ck_id = $row['id'];

                                $clean_description  = cleanCKEContent($row['description']);
                                $clean_highlights   = cleanCKEContent($row['highlights']);
                                $clean_amenities    = cleanCKEContent($row['amenities']);
                                $clean_floor_plan   = cleanCKEContent($row['floor_plan']);

                                // Profile Info
                                $profile_result = $conn->query("SELECT * FROM profile LIMIT 1");
                                $profile_row = $profile_result->fetch_assoc();
                        ?>




                                <div class="location-detail" style="border:2px solid rgb(238, 238, 237) !important; padding:0px;">
                                    <?php if (!empty($row['location1'])): ?>
                                        <div class="map-responsive" style="overflow:hidden; padding-bottom:56.25%; position:relative; height:0;">
                                            <iframe
                                                src="<?= htmlspecialchars($row['location1']) ?>"
                                                width="100%"
                                                height="100%"
                                                frameborder="0"
                                                style="border:0; left:0; top:0; height:100%; width:100%; position:absolute;"
                                                allowfullscreen
                                                loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade">
                                            </iframe>
                                        </div>

                                    <?php else: ?>
                                        <!-- <p>Location map not available.</p> -->
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="col-md-7 col-lg-7">
                                <div class="form-footer">
                                    <h3 style="color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;">Leave Your Details Here</h3>
                                    
                                    
                                    

<?php

// include 'config.php';

// error_reporting(E_ALL);
// ini_set('display_errors',1);

// // CAPTCHA KEY
// $secretKey =
// "6LcS9eAsAAAAAJtxgB8tZCIgdLL5q7H08anxG0YL";


// // FETCH PROPERTY
// $propertyName='';

// $slug=
// basename(
// parse_url(
// $_SERVER['REQUEST_URI'],
// PHP_URL_PATH
// ));

// $query=
// $conn->query(
// "SELECT * FROM ck WHERE blog='$slug'"
// );

// if(
// $query &&
// $query->num_rows>0
// )
// {
// $row=
// $query->fetch_assoc();

// $propertyName=
// $row['video'];
// }



// // FORM SUBMIT
// if(
// $_SERVER['REQUEST_METHOD']
// ===
// 'POST'
// )
// {

// // CAPTCHA CHECK
// if(
// empty(
// $_POST['g-recaptcha-response']
// )
// )
// {
 ?>
 <script>
// alert("Please verify captcha");
// window.location.href=
// window.location.pathname;
  </script>
  <?php
// exit;
// }


// // CAPTCHA VERIFY
// $captcha=
// $_POST['g-recaptcha-response'];

// $verify=
// file_get_contents(
// "https://www.google.com/recaptcha/api/siteverify?secret="
// .$secretKey.
// "&response="
// .$captcha
// );

// $response=
// json_decode(
// $verify
// );

// if(
// !$response->success
// )
// {
// ?>
  <script>
// alert("Captcha verification failed");
// window.location.href=
// window.location.pathname;
  </script>
  <?php
// exit;
// }



// // FORM DATA
// $name=
// trim(
// $_POST['name']
// ?? ''
// );

// $email=
// trim(
// $_POST['email']
// ?? ''
// );

// $countryCode=
// trim(
// $_POST['countryCode']
// ?? '+91'
// );

// $mobile=
// trim(
// $_POST['mobile']
// ?? ''
// );

// $url=
// trim(
// $_POST['url']
// ??
// $_SERVER['REQUEST_URI']
// );

// $source=
// trim(
// $_POST['source']
// ??
// 'Website'
// );

// $formflag=
// trim(
// $_POST['formflag']
// ??
// 'contact'
// );

// $project=
// trim(
// $propertyName
// );


// // VALIDATION
// if(
// empty($name)
// ||
// empty($email)
// ||
// empty($mobile)
// )
// {
  ?>
 <script>
// alert("Please fill all required fields");
// window.history.back();
 </script>
 <?php
// exit;
// }



// // INSERT
// $stmt=
// $conn->prepare(
// "
// INSERT INTO contact_form
// (
// name,
// email,
// country_code,
// mobile,
// url,
// source,
// formflag,
// project_name
// )

// VALUES
// (
// ?,
// ?,
// ?,
// ?,
// ?,
// ?,
// ?,
// ?
// )
// "
// );


// $stmt->bind_param(
// "ssssssss",

// $name,
// $email,
// $countryCode,
// $mobile,
// $url,
// $source,
// $formflag,
// $project
// );


// // SAVE
// if(
// $stmt->execute()
// )
// {
  ?>
  <script>

// alert(
// "Record inserted successfully"
// );

// window.location.href=
// window.location.pathname;

  </script>
  <?php
// }
// else
// {
 ?>
 
// window.history.back();

 </script>
 <?php
// }

// $stmt->close();

// exit;

// }

?>
 

 




<script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                    
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" placeholder="Full Name" required
                                                        style="border: 2px solid rgb(235 226 223);">

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" placeholder="Email ID"
                                                        required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" style="border: 2px solid rgb(235 226 223);">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" style="border: 2px solid rgb(235 226 223);">
                                                    <select class="con-select" name="countryCode">
                                                        <option data-countryCode="IN" value="+91">India (+91)</option>
                                                        <!--<optgroup label="Other countries">-->
                                                        <!--    <option data-countryCode="DZ" value="+213">Algeria (+213)</option>-->
                                                        <!--    <option data-countryCode="AD" value="+376">Andorra (+376)</option>-->
                                                        <!--    <option data-countryCode="AO" value="+244">Angola (+244)</option>-->
                                                        <!--    <option data-countryCode="AI" value="+1264">Anguilla (+1264)</option>-->
                                                        <!--    <option data-countryCode="AG" value="+1268">Antigua & Barbuda (+1268)</option>-->
                                                        <!--    <option data-countryCode="AR" value="+54">Argentina (+54)</option>-->
                                                        <!--    <option data-countryCode="AM" value="+374">Armenia (+374)</option>-->
                                                        <!--    <option data-countryCode="AW" value="+297">Aruba (+297)</option>-->
                                                        <!--    <option data-countryCode="AU" value="+61">Australia (+61)</option>-->
                                                        <!--    <option data-countryCode="AT" value="+43">Austria (+43)</option>-->
                                                        <!--    <option data-countryCode="AZ" value="+994">Azerbaijan (+994)</option>-->
                                                        <!--    <option data-countryCode="BS" value="+1242">Bahamas (+1242)</option>-->
                                                        <!--    <option data-countryCode="BH" value="+973">Bahrain (+973)</option>-->
                                                        <!--    <option data-countryCode="BD" value="+880">Bangladesh (+880)</option>-->
                                                        <!--    <option data-countryCode="BB" value="+1246">Barbados (+1246)</option>-->
                                                        <!--    <option data-countryCode="BY" value="+375">Belarus (+375)</option>-->
                                                        <!--    <option data-countryCode="BE" value="+32">Belgium (+32)</option>-->
                                                        <!--    <option data-countryCode="BZ" value="+501">Belize (+501)</option>-->
                                                        <!--    <option data-countryCode="BJ" value="+229">Benin (+229)</option>-->
                                                        <!--    <option data-countryCode="BM" value="+1441">Bermuda (+1441)</option>-->
                                                        <!--    <option data-countryCode="BT" value="+975">Bhutan (+975)</option>-->
                                                        <!--    <option data-countryCode="BO" value="+591">Bolivia (+591)</option>-->
                                                        <!--    <option data-countryCode="BA" value="+387">Bosnia Herzegovina (+387)</option>-->
                                                        <!--    <option data-countryCode="BW" value="+267">Botswana (+267)</option>-->
                                                        <!--    <option data-countryCode="BR" value="+55">Brazil (+55)</option>-->
                                                        <!--    <option data-countryCode="BN" value="+673">Brunei (+673)</option>-->
                                                        <!--    <option data-countryCode="BG" value="+359">Bulgaria (+359)</option>-->
                                                        <!--    <option data-countryCode="BF" value="+226">Burkina Faso (+226)</option>-->
                                                        <!--    <option data-countryCode="BI" value="+257">Burundi (+257)</option>-->
                                                        <!--    <option data-countryCode="KH" value="+855">Cambodia (+855)</option>-->
                                                        <!--    <option data-countryCode="CM" value="+237">Cameroon (+237)</option>-->
                                                        <!--    <option data-countryCode="CA" value="+1">Canada (+1)</option>-->
                                                        <!--    <option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>-->
                                                        <!--    <option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>-->
                                                        <!--    <option data-countryCode="CF" value="+236">Central African Republic (+236)</option>-->
                                                        <!--    <option data-countryCode="CL" value="+56">Chile (+56)</option>-->
                                                        <!--    <option data-countryCode="CN" value="+86">China (+86)</option>-->
                                                        <!--    <option data-countryCode="CO" value="+57">Colombia (+57)</option>-->
                                                        <!--    <option data-countryCode="KM" value="+269">Comoros (+269)</option>-->
                                                        <!--    <option data-countryCode="CG" value="+242">Congo (+242)</option>-->
                                                        <!--    <option data-countryCode="CK" value="+682">Cook Islands (+682)</option>-->
                                                        <!--    <option data-countryCode="CR" value="+506">Costa Rica (+506)</option>-->
                                                        <!--    <option data-countryCode="HR" value="+385">Croatia (+385)</option>-->
                                                        <!--    <option data-countryCode="CU" value="+53">Cuba (+53)</option>-->
                                                            
                                                        <!--</optgroup>-->
                                                    </select> <input type="text" class="form-control" name="mobile" placeholder="Mobile"
                                                        required pattern="[0-9]{10}" style="border: 2px solid rgb(235 226 223);">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="message" placeholder="Message"
                                                        required style="border: 2px solid rgb(235 226 223);"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-3">
                                                    <div class="g-recaptcha"
                                                        data-sitekey="6LcS9eAsAAAAACCGVEo4psmb0S7p9nYuT8dwnUvJ"></div>
                                                </div>
                                            </div>
                                            <div style="margin-bottom: 15px;">
  <input type="checkbox" id="terms" required>
  <label for="terms" style="color:#fff;">
    I agree to the Terms and Conditions
  </label>
</div>
                                            <div class="col-md-12">

                                                <input type="text" name="formflag" class="formflag" value="" />
                                                <button type="submit" name="submit" value="submit" class=" btn" style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:#fff;">SEND
                                                    MESSAGE</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .rera-item {

                        background-color: #696969;

                        color: #fff;

                        text-align: center;

                        margin-bottom: 15px;

                        padding: 15px;

                        font-size: 14px;

                    }

                    .rera-strip {

                        padding: 0;

                        background-color: transparent;

                    }

                    @media only screen and (max-width: 1320px) {

                        .rera-item {

                            font-size: 15px;

                        }

                    }

                    @media only screen and (max-width: 1199px) {

                        .rera-item {

                            font-size: 14px;

                        }

                    }

                    @media only screen and (max-width: 1118px) {

                        .rera-item {

                            font-size: 13px;

                        }

                    }

                    @media only screen and (max-width: 1049px) {

                        .rera-item {

                            padding: 8px;

                        }

                    }

                    @media only screen and (max-width: 1007px) {

                        .rera-item {

                            padding: 8px;

                            font-size: 12px;

                        }

                    }

                    @media only screen and (max-width: 991px) {

                        .rera-item {

                            padding: 9px;

                            font-size: 15px;

                        }

                    }
                </style>

                <?php include 'footer.php'; ?>
                <!--Footer End -->

                <!--Social , Call and Enquire Now Start -->
                <!-- <a id="socialId" class="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> -->
                <div class="fix-mobile-strip">
                    <ul>
                        <li><a id="footerSocialNumber">Call Now</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPopup" style="color:#fff !important;">Enquire Now</a></li>
                    </ul>
                </div> <!--Social , Call and Enquire Now End -->

                <!-- Auto Popup Modal or Custom Modal  Start-->
                <?php include 'form.php'; ?> <!-- Auto Popup Modal or Custom Modal Start End-->

                <!-- Video Modal Start-->
                <div class="custom-modal" id="videoModal">
                    <div class="custom-modal-content">
                        <span class="close-btn" onclick="closeModal()">&times;</span>
                        <div class="responsive-iframe-container">
                            <iframe id="videoIframe"
                                title="YouTube video"
                                allow="encrypted-media"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div> <!-- Video Modal End-->

                <!-- Sidebar  Start -->
                <div class="sidebar-contact">
                    <div class="toggle" data-bs-toggle="modal" data-bs-target="#exampleModalPopup" style="background-color: <?= htmlspecialchars($profile_row['button_background_color']) ?>; color: <?= htmlspecialchars($profile_row['body_background_color']) ?>;"><b>Enquire Now</b></div>
                </div>
                <!-- Sidebar End -->

                <!-- Javascript Start -->
                <script src="js/js1/bootstrap.min.js" defer></script>
                <!-- <script src="js/js1/autoPopUp.js" defer></script> -->
                <script src="js/js1/navMenuScroll.js" defer></script>
                <script src="js/js1/noidaProjectData.js" defer></script>
                <script src="js/js1/closeMenu.js" defer></script>
                <!-- Lazy-load non-critical scripts after page load -->
                <!-- <script>
    window.addEventListener('
        const lazyScripts = [
        "js/index.js",
        "js/urlNameChange.js",
        "js/validation.js",
        "js/dataSrcToSrc.js",
        "js/videoBox.js"
        ];
        lazyScripts.forEach(src => {
        const script = document.createElement("script");
        script.src = src;
        script.defer = true;
        document.body.appendChild(script);
        });
    });
    </script> -->
                <!-- Javascript End -->
        </body>

        </html>
<?php
                            }
                        }

                        $conn->close();
?>