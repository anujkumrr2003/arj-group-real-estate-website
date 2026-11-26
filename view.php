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
        $clean_highlights   = cleanCKEContent($row['highlights']);
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

            <meta charset="utf-8">
            <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
            <link rel="icon" href="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" />
            <!--SEO Tags-->
            <title><?= htmlspecialchars($row['meta_title']) ?> | Project Details</title>
            <meta name="description" content="<?= htmlspecialchars($row['meta_description']) ?>">
            <meta name="keywords" content="<?= htmlspecialchars($row['meta_keywords']) ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="ROBOTS" content="index, follow" />
            <meta name="ROBOTS" content="ALL" />
            <meta name="Slurp" content="index,follow,archive" />
            <meta name="robots" content="NOODP" />
            <meta name="geo.region" content="IN" />
            <meta name="allow-search" content="yes" />
            <meta name="revisit-after" content="daily" />
            <meta name="distribution" content="global" />
            <meta name="expires" content="never" />
            <link rel="canonical" href="https://luxuryprojectsinnoida.com/views.php" />
            <link rel="alternate" hreflang="en-us" href="ambience-tiverton-sector-50-noida.php" />
            <meta property="og:title" content="Ambience Tiverton in Sector 50 Noida - 3/4 BHK Apartments">
            <meta property="og:site_name" content="Luxury Projects">
            <meta property="og:url" content="ambience-tiverton-sector-50-noida.php">
            <meta property="og:description"
                content="Ambience Tiverton offers 3 and 4 BHK apartments for sale in Sector 50 Noida. Explore brochure, floor plans, location, price list, photos, and reviews.">
            <meta property="og:type" content="website">
            <meta property="og:image"
                content="images/ambience-tiverton-banner.webp">
            <meta name="twitter:card" content="summary_large_image" />
            <meta name="twitter:description"
                content="Ambience Tiverton offers 3 and 4 BHK apartments for sale in Sector 50 Noida. Explore brochure, floor plans, location, price list, photos, and reviews." />
            <meta name="twitter:title" content="Ambience Tiverton in Sector 50 Noida - 3/4 BHK Apartments" />
            <meta name="twitter:site" content="@luxuryresidency" />
            <meta name="twitter:image"
                content="images/ambience-tiverton-banner.webp" />
            <meta name="twitter:creator" content="@luxuryresidency" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome Icons -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
            <base href="https://luxuryprojectsinnoida.com/">
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
        </head>

        <body style="font-family: var(--bs-font-sans-serif) !important;  background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>; ">
            <!-- Google Tag Manager (noscript) -->
            <noscript>
                <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58GDN3V"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe>
            </noscript>
            <!-- End Google Tag Manager (noscript) -->
            <!-- Header Section Start-->
            <header class="clearHeader" style="padding: 10px 0 !important;">
                <div class="container">
                    <div class="header-inner">
                        <div class="project-logo">
                            <a href="https://luxuryprojectsinnoida.com/"><img src="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" class="img-fluid" width="130" height="77" style="max-width: 65%; "></a>
                        </div>
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
                                        <!--<li><a href="#location-advantages">Location</a></li>-->
                                        <li><a id="callId"></a></li>
                                        <li class="logo-fix"><a title="Home" href="https://luxuryprojectsinnoida.com/"><img src="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" decoding="async" loading="lazy" alt="logo" class="img-fluid" title="logo" width="130" height="50"></a></li>
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

            <!-- Header Section End-->
            <section class="home-banner" id="home" style=" background-image:url('admin/uploads/<?= htmlspecialchars($row['main_image']) ?>');">
                <div class="home-banner-img">
                    <!-- <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>" alt="ambience tiverton sector 50" decoding="async" fetchpriority="high" title="Ambience Tiverton Sector 50 Noida" width="991" height="600" class="tab-img img-fluid"> -->
                    <div class="image-wrapper position-relative">
                        <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
                            alt="ambience tiverton sector 50"
                            decoding="async"
                            fetchpriority="high"
                            title="Ambience Tiverton Sector 50 Noida"
                            width="957"
                            height="1024"
                            class="mobile-img img-fluid">

                        <h2 class="image-title text-center" style="font-family: poppinssemibold;"><?= htmlspecialchars($row['video']) ?></h2>
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
                            font-family: 'Playfair Display', serif;
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
                            <h1 style="font-family: var(--bs-font-sans-serif) !important; font-weight:700 !important;"><?= htmlspecialchars($row['video']) ?></h1>
                            <p style="font-family: var(--bs-font-sans-serif) !important; font-weight:bold !important;"><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?>, <?= htmlspecialchars($row['address']) ?></p>
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
                                                font-family: var(--bs-font-sans-serif) !important;
                                                font-weight: bold !important;
                                                font-weight: bold !important;
                                                /*width: 200px;*/
                                                text-align: center;
                                            }

                                            p {
                                                font-family: var(--bs-font-sans-serif) !important;


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
                                        <p style="font-weight:bold !important;"><?= htmlspecialchars($row['status']) ?></p>
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

                                    <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModalPopup"
                                        style="background-color: <?= htmlspecialchars($profile_row['button_background_color']) ?>; color: <?= htmlspecialchars($profile_row['body_background_color']) ?>; font-weight: bold !important; font-size: 18px; border:none;">
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
                                <img src="images/icon1.webp" alt="ambience tiverton noida sector 50"
                                    title="Ambience Tiverton Wish Town" class="icon flaticon img-fluid" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>PROPERTY :</h3>
                                    <p><?= htmlspecialchars($row['video']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon2.webp" alt="ambience tiverton 3 bhk price"
                                    title="Ambience Tiverton 4 BHK Price" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>LOCATION :</h3>
                                    <p><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?>, <?= htmlspecialchars($row['address']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon3.webp" alt="ambience tiverton apartments"
                                    title="Ambience Tiverton Flat for Sale" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>PRICE :</h3>
                                    <p><?= htmlspecialchars($row['price']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon4.webp" alt="ambience tiverton for sale"
                                    title="Ambience Tiverton Apartment for Sale" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>SIZES :</h3>
                                    <p><?= htmlspecialchars($row['size']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon5.webp" alt="ambience tiverton price list" title="Ambience Tiverton Buy"
                                    class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>CONFIGURATION :</h3>
                                    <p><?= htmlspecialchars($row['configration']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon6.webp" alt="ambience tiverton brochure pdf"
                                    title="Ambience Tiverton Floor Plan" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>STATUS :</h3>
                                    <p><?= htmlspecialchars($row['status']) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col project-info-border">
                            <div class="project-info-item">
                                <img src="images/icon7.png" alt="ambience tiverton payment plan"
                                    title="Ambience Tiverton Address" class="icon flaticon" decoding="async" width="100" height="50">
                                <div class="project-info-item-txt">
                                    <h3>Rera No. :</h3>
                                    <p><?= htmlspecialchars($row['rera']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="about-section same-section" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">

                            <!--cursive;-->

                            <!--font-family: 'Jazz LET';-->



                            <div class="inner-title">
                                <h2 style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family:'Jazz LET'; border:none; border-radius:6px; padding: 10px; color: <?= htmlspecialchars($profile_row['background_color']) ?>; padding:1px; text-align:center">About <?= htmlspecialchars($row['video']) ?></h2>
                                <!-- <div class="container-fluid px-3 py-2"> -->

                                <div class="rounded p-3 mb-3" style="font-size: 1.1rem; line-height: 1.6;">
                                    <p><?= htmlspecialchars_decode($row['content']) ?></p>
                                </div>
                                <!-- </div> -->


                            </div>
                        </div>
                        <?php if (!empty($row['video'])): ?>

                            <div class="col-lg-6">
                                <div class="ratio ratio-16x9 mb-3" style="border: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>; border-radius: 10px; overflow: hidden;">
                                    <img src="admin/uploads/<?= htmlspecialchars($row['about_img']) ?>" alt="ambience tiverton sector 50" decoding="async" fetchpriority="high" title="Ambience Tiverton Sector 50 Noida" width="991" height="600" class="tab-img img-fluid">
                                </div>
                            </div>

                        <?php endif; ?>


                    </div>
                </div>
            </section>
            <!-- Highlights -->
            <section class="highlight-section same-section" id="highlights">
                <div class="container-fluid">
                    <div class="highlight-div">
                        <div class="row g-0">
                            <div class="col-md-12 col-lg-7">
                                <div class="highlight-div">
                                    <style>
                                        h3 {
                                            color: <?= htmlspecialchars($profile_row['background_color']) ?>;
                                        }
                                    </style>
                                    <h2 class="custom-heading">
                                        Ambience Tiverton Highlights
                                    </h2>

                                    <style>
                                        .custom-heading {
                                            background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                                            color: <?= htmlspecialchars($profile_row['background_color']) ?> !important;
                                            font-family: 'Jazz LET';
                                            border: none;
                                            border-radius: 6px;
                                            padding: 8px;
                                            text-align: center;
                                            margin: 0 auto;
                                            width: 93%;
                                        }

                                        /* Ensure center alignment and responsive behavior on small screens */
                                        @media (max-width: 767px) {
                                            .custom-heading {
                                                width: 95%;
                                                text-align: center;
                                                padding: 1px;
                                            }
                                        }
                                    </style>

                                    <div class="container-fluid px-3 py-2">
                                        <div class="rounded p-3 mb-3" style="font-size: 1.1rem; line-height: 1.6; text-align: justify;">
                                            <p><?= htmlspecialchars_decode($row['highlights']) ?></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-5">
                                <div class="highlight-image"
                                    style='background-image: url("admin/uploads/<?= htmlspecialchars($row['img_highlights']) ?>");'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Amenities -->
            <section class="highlight-section same-section" id="amenities">
                <div class="container-fluid">
                    <div class="highlight-div">
                        <div class="row g-0">
                            <div class="col-md-12 col-lg-5">
                                <div class="highlight-image"
                                    style='background-image: url("admin/uploads/<?= htmlspecialchars($row['img_amenities']) ?>");'></div>
                            </div>
                            <div class="col-md-12 col-lg-7">
                                <div class="highlight-div">
                                    <h2 class="custom-heading">
                                        Ambience Tiverton Amenities
                                    </h2>
                                    <!-- <h2 style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family:'Jazz LET'; border:none; border-radius:6px; padding: 10px; color: <?= htmlspecialchars($profile_row['background_color']) ?>; padding:2px; text-align:center; width:93%;">Ambience Tiverton Amenities</h2> -->

                                    <div class="container-fluid px-3 py-2">
                                        <div class="rounded p-3 mb-3" style="font-size: 1.1rem; line-height: 1.6; text-align: justify;">
                                            <p><?= htmlspecialchars_decode($row['amenities']) ?></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
 <section class="highlight-section same-section" id="highlights">
                <div class="container-fluid">
                    <div class="highlight-div">
                        <div class="row g-0">
                            <div class="col-md-12 col-lg-7">
                                <div class="highlight-div">
                                    <style>
                                        h3 {
                                            color: <?= htmlspecialchars($profile_row['background_color']) ?>;
                                        }
                                    </style>
                                    <h2 class="custom-heading">
                                        Sizes & Floor Plan
                                    </h2>

                                    <style>
                                        .custom-heading {
                                            background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                                            color: <?= htmlspecialchars($profile_row['background_color']) ?> !important;
                                            font-family: 'Jazz LET';
                                            border: none;
                                            border-radius: 6px;
                                            padding: 8px;
                                            text-align: center;
                                            margin: 0 auto;
                                            width: 93%;
                                        }

                                        /* Ensure center alignment and responsive behavior on small screens */
                                        @media (max-width: 767px) {
                                            .custom-heading {
                                                width: 95%;
                                                text-align: center;
                                                padding: 1px;
                                            }
                                        }
                                    </style>

                                    <div class="container-fluid px-3 py-2">
                                        <div class="rounded p-3 mb-3" style="font-size: 1.1rem; line-height: 1.6; text-align: justify;">
                                            <p><?= htmlspecialchars_decode($row['floor_plan']) ?></p>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 col-lg-5">
                                <div class="highlight-image"
                                    style='background-image: url("admin/uploads/<?= htmlspecialchars($row['img_floor_plan']) ?>");'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="gallery-section" id="gallery">
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
        <h3 class="mb-3">
           <h2 class="custom-heading" style="width:40%;">Project Video</h2><br><br>
        </h3>
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
            <br><br><br><br>
            <section class="gallery-section" id="gallery">
                <div class="container-fluid">

                    <h2 class="head">Ambience Tiverton Images</h2>

                    <style>
                        .head {
                            background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                            color: <?= htmlspecialchars($profile_row['background_color']) ?> !important;
                            font-family: 'Jazz LET';
                            border: none;
                            border-radius: 6px;
                            text-align: center;
                            /* Center the text */
                            margin: 0 auto;
                            /* Center the block if needed */
                            font-weight: bold;
                            padding: 10px;
                            width: 40%;
                            /* Ensures full width */
                        }

                        /* Optional: Responsive tweaks for mobile (if needed) */
                        @media (max-width: 767px) {
                            .head {
                                font-size: 20px;
                                width: 80%;
                                /* Slightly smaller on mobile */
                            }
                        }
                    </style>


                    <div class="section-title text-center">



                    </div>
                    <br>

                    <div class="row g-0">
                        <?php
                        if ($image && $image->num_rows > 0) {
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
                        } else {
                            echo '<div class="col-12">
                       
                      </div>';
                        }
                        ?>
                    </div>
                </div>
            </section>

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
            <section class="faq-section" style="background-color:<?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
                <div class="container">
                    <?php if ($faqs->num_rows > 0): ?>
                        <div class="section-title text-center">
                            <h2 style=" padding: 10px; color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family:'Jazz LET'; border:none; border-radius:6px;">Frequently Asked Questions</h2>
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
                                    <form action="" method="post" name="form">
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
                                                        <optgroup label="Other countries">
                                                            <option data-countryCode="DZ" value="+213">Algeria (+213)</option>
                                                            <option data-countryCode="AD" value="+376">Andorra (+376)</option>
                                                            <option data-countryCode="AO" value="+244">Angola (+244)</option>
                                                            <option data-countryCode="AI" value="+1264">Anguilla (+1264)</option>
                                                            <option data-countryCode="AG" value="+1268">Antigua & Barbuda (+1268)</option>
                                                            <option data-countryCode="AR" value="+54">Argentina (+54)</option>
                                                            <option data-countryCode="AM" value="+374">Armenia (+374)</option>
                                                            <option data-countryCode="AW" value="+297">Aruba (+297)</option>
                                                            <option data-countryCode="AU" value="+61">Australia (+61)</option>
                                                            <option data-countryCode="AT" value="+43">Austria (+43)</option>
                                                            <option data-countryCode="AZ" value="+994">Azerbaijan (+994)</option>
                                                            <option data-countryCode="BS" value="+1242">Bahamas (+1242)</option>
                                                            <option data-countryCode="BH" value="+973">Bahrain (+973)</option>
                                                            <option data-countryCode="BD" value="+880">Bangladesh (+880)</option>
                                                            <option data-countryCode="BB" value="+1246">Barbados (+1246)</option>
                                                            <option data-countryCode="BY" value="+375">Belarus (+375)</option>
                                                            <option data-countryCode="BE" value="+32">Belgium (+32)</option>
                                                            <option data-countryCode="BZ" value="+501">Belize (+501)</option>
                                                            <option data-countryCode="BJ" value="+229">Benin (+229)</option>
                                                            <option data-countryCode="BM" value="+1441">Bermuda (+1441)</option>
                                                            <option data-countryCode="BT" value="+975">Bhutan (+975)</option>
                                                            <option data-countryCode="BO" value="+591">Bolivia (+591)</option>
                                                            <option data-countryCode="BA" value="+387">Bosnia Herzegovina (+387)</option>
                                                            <option data-countryCode="BW" value="+267">Botswana (+267)</option>
                                                            <option data-countryCode="BR" value="+55">Brazil (+55)</option>
                                                            <option data-countryCode="BN" value="+673">Brunei (+673)</option>
                                                            <option data-countryCode="BG" value="+359">Bulgaria (+359)</option>
                                                            <option data-countryCode="BF" value="+226">Burkina Faso (+226)</option>
                                                            <option data-countryCode="BI" value="+257">Burundi (+257)</option>
                                                            <option data-countryCode="KH" value="+855">Cambodia (+855)</option>
                                                            <option data-countryCode="CM" value="+237">Cameroon (+237)</option>
                                                            <option data-countryCode="CA" value="+1">Canada (+1)</option>
                                                            <option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>
                                                            <option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>
                                                            <option data-countryCode="CF" value="+236">Central African Republic (+236)</option>
                                                            <option data-countryCode="CL" value="+56">Chile (+56)</option>
                                                            <option data-countryCode="CN" value="+86">China (+86)</option>
                                                            <option data-countryCode="CO" value="+57">Colombia (+57)</option>
                                                            <option data-countryCode="KM" value="+269">Comoros (+269)</option>
                                                            <option data-countryCode="CG" value="+242">Congo (+242)</option>
                                                            <option data-countryCode="CK" value="+682">Cook Islands (+682)</option>
                                                            <option data-countryCode="CR" value="+506">Costa Rica (+506)</option>
                                                            <option data-countryCode="HR" value="+385">Croatia (+385)</option>
                                                            <option data-countryCode="CU" value="+53">Cuba (+53)</option>
                                                            <option data-countryCode="CY" value="+90392">Cyprus North (+90392)</option>
                                                            <option data-countryCode="CY" value="+357">Cyprus South (+357)</option>
                                                            <option data-countryCode="CZ" value="+42">Czech Republic (+42)</option>
                                                            <option data-countryCode="DK" value="+45">Denmark (+45)</option>
                                                            <option data-countryCode="DJ" value="+253">Djibouti (+253)</option>
                                                            <option data-countryCode="DM" value="+1809">Dominica (+1809)</option>
                                                            <option data-countryCode="DO" value="+1809">Dominican Republic (+1809)</option>
                                                            <option data-countryCode="EC" value="+593">Ecuador (+593)</option>
                                                            <option data-countryCode="EG" value="+20">Egypt (+20)</option>
                                                            <option data-countryCode="SV" value="+503">El Salvador (+503)</option>
                                                            <option data-countryCode="GQ" value="+240">Equatorial Guinea (+240)</option>
                                                            <option data-countryCode="ER" value="+291">Eritrea (+291)</option>
                                                            <option data-countryCode="EE" value="+372">Estonia (+372)</option>
                                                            <option data-countryCode="ET" value="+251">Ethiopia (+251)</option>
                                                            <option data-countryCode="FK" value="+500">Falkland Islands (+500)</option>
                                                            <option data-countryCode="FO" value="+298">Faroe Islands (+298)</option>
                                                            <option data-countryCode="FJ" value="+679">Fiji (+679)</option>
                                                            <option data-countryCode="FI" value="+358">Finland (+358)</option>
                                                            <option data-countryCode="FR" value="+33">France (+33)</option>
                                                            <option data-countryCode="GF" value="+594">French Guiana (+594)</option>
                                                            <option data-countryCode="PF" value="+689">French Polynesia (+689)</option>
                                                            <option data-countryCode="GA" value="+241">Gabon (+241)</option>
                                                            <option data-countryCode="GM" value="+220">Gambia (+220)</option>
                                                            <option data-countryCode="GE" value="+7880">Georgia (+7880)</option>
                                                            <option data-countryCode="DE" value="+49">Germany (+49)</option>
                                                            <option data-countryCode="GH" value="+233">Ghana (+233)</option>
                                                            <option data-countryCode="GI" value="+350">Gibraltar (+350)</option>
                                                            <option data-countryCode="GR" value="+30">Greece (+30)</option>
                                                            <option data-countryCode="GL" value="+299">Greenland (+299)</option>
                                                            <option data-countryCode="GD" value="+1473">Grenada (+1473)</option>
                                                            <option data-countryCode="GP" value="+590">Guadeloupe (+590)</option>
                                                            <option data-countryCode="GU" value="+671">Guam (+671)</option>
                                                            <option data-countryCode="GT" value="+502">Guatemala (+502)</option>
                                                            <option data-countryCode="GN" value="+224">Guinea (+224)</option>
                                                            <option data-countryCode="GW" value="+245">Guinea - Bissau (+245)</option>
                                                            <option data-countryCode="GY" value="+592">Guyana (+592)</option>
                                                            <option data-countryCode="HT" value="+509">Haiti (+509)</option>
                                                            <option data-countryCode="HN" value="+504">Honduras (+504)</option>
                                                            <option data-countryCode="HK" value="+852">Hong Kong (+852)</option>
                                                            <option data-countryCode="HU" value="+36">Hungary (+36)</option>
                                                            <option data-countryCode="IS" value="+354">Iceland (+354)</option>
                                                            <option data-countryCode="ID" value="+62">Indonesia (+62)</option>
                                                            <option data-countryCode="IR" value="+98">Iran (+98)</option>
                                                            <option data-countryCode="IQ" value="+964">Iraq (+964)</option>
                                                            <option data-countryCode="IE" value="+353">Ireland (+353)</option>
                                                            <option data-countryCode="IL" value="+972">Israel (+972)</option>
                                                            <option data-countryCode="IT" value="+39">Italy (+39)</option>
                                                            <option data-countryCode="JM" value="+1876">Jamaica (+1876)</option>
                                                            <option data-countryCode="JP" value="+81">Japan (+81)</option>
                                                            <option data-countryCode="JO" value="+962">Jordan (+962)</option>
                                                            <option data-countryCode="KZ" value="+7">Kazakhstan (+7)</option>
                                                            <option data-countryCode="KE" value="+254">Kenya (+254)</option>
                                                            <option data-countryCode="KI" value="+686">Kiribati (+686)</option>
                                                            <option data-countryCode="KP" value="+850">Korea North (+850)</option>
                                                            <option data-countryCode="KR" value="+82">Korea South (+82)</option>
                                                            <option data-countryCode="KW" value="+965">Kuwait (+965)</option>
                                                            <option data-countryCode="KG" value="+996">Kyrgyzstan (+996)</option>
                                                            <option data-countryCode="LA" value="+856">Laos (+856)</option>
                                                            <option data-countryCode="LV" value="+371">Latvia (+371)</option>
                                                            <option data-countryCode="LB" value="+961">Lebanon (+961)</option>
                                                            <option data-countryCode="LS" value="+266">Lesotho (+266)</option>
                                                            <option data-countryCode="LR" value="+231">Liberia (+231)</option>
                                                            <option data-countryCode="LY" value="+218">Libya (+218)</option>
                                                            <option data-countryCode="LI" value="+417">Liechtenstein (+417)</option>
                                                            <option data-countryCode="LT" value="+370">Lithuania (+370)</option>
                                                            <option data-countryCode="LU" value="+352">Luxembourg (+352)</option>
                                                            <option data-countryCode="MO" value="+853">Macao (+853)</option>
                                                            <option data-countryCode="MK" value="+389">Macedonia (+389)</option>
                                                            <option data-countryCode="MG" value="+261">Madagascar (+261)</option>
                                                            <option data-countryCode="MW" value="+265">Malawi (+265)</option>
                                                            <option data-countryCode="MY" value="+60">Malaysia (+60)</option>
                                                            <option data-countryCode="MV" value="+960">Maldives (+960)</option>
                                                            <option data-countryCode="ML" value="+223">Mali (+223)</option>
                                                            <option data-countryCode="MT" value="+356">Malta (+356)</option>
                                                            <option data-countryCode="MH" value="+692">Marshall Islands (+692)</option>
                                                            <option data-countryCode="MQ" value="+596">Martinique (+596)</option>
                                                            <option data-countryCode="MR" value="+222">Mauritania (+222)</option>
                                                            <option data-countryCode="YT" value="+269">Mayotte (+269)</option>
                                                            <option data-countryCode="MX" value="+52">Mexico (+52)</option>
                                                            <option data-countryCode="FM" value="+691">Micronesia (+691)</option>
                                                            <option data-countryCode="MD" value="+373">Moldova (+373)</option>
                                                            <option data-countryCode="MC" value="+377">Monaco (+377)</option>
                                                            <option data-countryCode="MN" value="+976">Mongolia (+976)</option>
                                                            <option data-countryCode="MS" value="+1664">Montserrat (+1664)</option>
                                                            <option data-countryCode="MA" value="+212">Morocco (+212)</option>
                                                            <option data-countryCode="MZ" value="+258">Mozambique (+258)</option>
                                                            <option data-countryCode="MN" value="+95">Myanmar (+95)</option>
                                                            <option data-countryCode="NA" value="+264">Namibia (+264)</option>
                                                            <option data-countryCode="NR" value="+674">Nauru (+674)</option>
                                                            <option data-countryCode="NP" value="+977">Nepal (+977)</option>
                                                            <option data-countryCode="NL" value="+31">Netherlands (+31)</option>
                                                            <option data-countryCode="NC" value="+687">New Caledonia (+687)</option>
                                                            <option data-countryCode="NZ" value="+64">New Zealand (+64)</option>
                                                            <option data-countryCode="NI" value="+505">Nicaragua (+505)</option>
                                                            <option data-countryCode="NE" value="+227">Niger (+227)</option>
                                                            <option data-countryCode="NG" value="+234">Nigeria (+234)</option>
                                                            <option data-countryCode="NU" value="+683">Niue (+683)</option>
                                                            <option data-countryCode="NF" value="+672">Norfolk Islands (+672)</option>
                                                            <option data-countryCode="NP" value="+670">Northern Marianas (+670)</option>
                                                            <option data-countryCode="NO" value="+47">Norway (+47)</option>
                                                            <option data-countryCode="OM" value="+968">Oman (+968)</option>
                                                            <option data-countryCode="PW" value="+680">Palau (+680)</option>
                                                            <option data-countryCode="PA" value="+507">Panama (+507)</option>
                                                            <option data-countryCode="PG" value="+675">Papua New Guinea (+675)</option>
                                                            <option data-countryCode="PY" value="+595">Paraguay (+595)</option>
                                                            <option data-countryCode="PE" value="+51">Peru (+51)</option>
                                                            <option data-countryCode="PH" value="+63">Philippines (+63)</option>
                                                            <option data-countryCode="PL" value="+48">Poland (+48)</option>
                                                            <option data-countryCode="PT" value="+351">Portugal (+351)</option>
                                                            <option data-countryCode="PR" value="+1787">Puerto Rico (+1787)</option>
                                                            <option data-countryCode="QA" value="+974">Qatar (+974)</option>
                                                            <option data-countryCode="RE" value="+262">Reunion (+262)</option>
                                                            <option data-countryCode="RO" value="+40">Romania (+40)</option>
                                                            <option data-countryCode="RU" value="+7">Russia (+7)</option>
                                                            <option data-countryCode="RW" value="+250">Rwanda (+250)</option>
                                                            <option data-countryCode="SM" value="+378">San Marino (+378)</option>
                                                            <option data-countryCode="ST" value="+239">Sao Tome & Principe (+239)</option>
                                                            <option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>
                                                            <option data-countryCode="SN" value="+221">Senegal (+221)</option>
                                                            <option data-countryCode="CS" value="+381">Serbia (+381)</option>
                                                            <option data-countryCode="SC" value="+248">Seychelles (+248)</option>
                                                            <option data-countryCode="SL" value="+232">Sierra Leone (+232)</option>
                                                            <option data-countryCode="SG" value="+65">Singapore (+65)</option>
                                                            <option data-countryCode="SK" value="+421">Slovak Republic (+421)</option>
                                                            <option data-countryCode="SI" value="+386">Slovenia (+386)</option>
                                                            <option data-countryCode="SB" value="+677">Solomon Islands (+677)</option>
                                                            <option data-countryCode="SO" value="+252">Somalia (+252)</option>
                                                            <option data-countryCode="ZA" value="+27">South Africa (+27)</option>
                                                            <option data-countryCode="ES" value="+34">Spain (+34)</option>
                                                            <option data-countryCode="LK" value="+94">Sri Lanka (+94)</option>
                                                            <option data-countryCode="SH" value="+290">St. Helena (+290)</option>
                                                            <option data-countryCode="KN" value="+1869">St. Kitts (+1869)</option>
                                                            <option data-countryCode="SC" value="+1758">St. Lucia (+1758)</option>
                                                            <option data-countryCode="SD" value="+249">Sudan (+249)</option>
                                                            <option data-countryCode="SR" value="+597">Suriname (+597)</option>
                                                            <option data-countryCode="SZ" value="+268">Swaziland (+268)</option>
                                                            <option data-countryCode="SE" value="+46">Sweden (+46)</option>
                                                            <option data-countryCode="CH" value="+41">Switzerland (+41)</option>
                                                            <option data-countryCode="SI" value="+963">Syria (+963)</option>
                                                            <option data-countryCode="TW" value="+886">Taiwan (+886)</option>
                                                            <option data-countryCode="TJ" value="+7">Tajikstan (+7)</option>
                                                            <option data-countryCode="TH" value="+66">Thailand (+66)</option>
                                                            <option data-countryCode="TG" value="+228">Togo (+228)</option>
                                                            <option data-countryCode="TO" value="+676">Tonga (+676)</option>
                                                            <option data-countryCode="TT" value="+1868">Trinidad & Tobago (+1868)</option>
                                                            <option data-countryCode="TN" value="+216">Tunisia (+216)</option>
                                                            <option data-countryCode="TR" value="+90">Turkey (+90)</option>
                                                            <option data-countryCode="TM" value="+7">Turkmenistan (+7)</option>
                                                            <option data-countryCode="TM" value="+993">Turkmenistan (+993)</option>
                                                            <option data-countryCode="TC" value="+1649">Turks & Caicos Islands (+1649)</option>
                                                            <option data-countryCode="TV" value="+688">Tuvalu (+688)</option>
                                                            <option data-countryCode="UG" value="+256">Uganda (+256)</option>
                                                            <option data-countryCode="GB" value="+44">UK (+44)</option>
                                                            <option data-countryCode="UA" value="+380">Ukraine (+380)</option>
                                                            <option data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>
                                                            <option data-countryCode="UY" value="+598">Uruguay (+598)</option>
                                                            <option data-countryCode="US" value="+1">USA (+1)</option>
                                                            <option data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>
                                                            <option data-countryCode="VU" value="+678">Vanuatu (+678)</option>
                                                            <option data-countryCode="VA" value="+379">Vatican City (+379)</option>
                                                            <option data-countryCode="VE" value="+58">Venezuela (+58)</option>
                                                            <option data-countryCode="VN" value="+84">Vietnam (+84)</option>
                                                            <option data-countryCode="VG" value="+84">Virgin Islands - British (+1284)</option>
                                                            <option data-countryCode="VI" value="+84">Virgin Islands - US (+1340)</option>
                                                            <option data-countryCode="WF" value="+681">Wallis & Futuna (+681)</option>
                                                            <option data-countryCode="YE" value="+969">Yemen (North)(+969)</option>
                                                            <option data-countryCode="YE" value="+967">Yemen (South)(+967)</option>
                                                            <option data-countryCode="ZM" value="+260">Zambia (+260)</option>
                                                            <option data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>
                                                        </optgroup>
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
                                                        data-sitekey="6LeT4CUiAAAAAO4Ns9Q_yHrl_gdVBFxnblHXRZbM"></div>
                                                </div>
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
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalPopup">Enquire Now</a></li>
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






<!-- RewriteEngine On
RewriteBase /prayatna/

# If file or directory doesn't exist
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

# Rewrite views.php/slug to views.php?slug=slug
RewriteRule ^views.php/([a-zA-Z0-9\-]+)$ views.php?slug=$1 [QSA,L] -->
