<!-- #f95e43; -->





        <!DOCTYPE html>
        <html lang="en">
        <head>

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- Font Awesome Icons -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
            <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
             <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
             
             <meta name="google-site-verification" content="1GE-eh3i3CFWbRH7t6juE61aZ6S2b0KSW31ovUlngQo">

            <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
include 'config.php';
// error_reporting(0);

$records = $conn->query("SELECT * FROM meta_data WHERE LOWER(page_name) = 'home' LIMIT 1");
$meta = $records->fetch_assoc();
?>

<title><?= htmlspecialchars($meta['meta_title'] ?? 'Arj Spaces – Flats in Noida and Greater Noida') ?></title>
<meta name="description" content="<?= htmlspecialchars($meta['meta_description'] ?? '') ?>">
<meta name="keywords" content="<?= htmlspecialchars($meta['keywords'] ?? '') ?>">


  <!-- Primary Meta Tags -->
  <!--<meta name="description" content="Explore Arj Spaces – premium flats and luxury apartments in Noida and Greater Noida. Discover modern homes, ready-to-move properties, and investment opportunities with trusted real estate experts." />-->
  <!--<meta name="keywords" content="Arj Spaces, flats in Noida, flats in Greater Noida, luxury apartments Noida, ready to move flats Noida, property in Noida, buy flats in Noida, real estate Noida, residential projects Noida, apartments in Greater Noida, Arj Group Noida" />-->
  <meta name="author" content="Arj Spaces" />
  <meta name="publisher" content="Arj Spaces Real Estate" />
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <meta name="bingbot" content="index, follow" />
  <meta name="rating" content="General" />
  <meta name="distribution" content="global" />
  <meta name="revisit-after" content="1 day" />
  <meta name="expires" content="never" />
  <meta name="geo.region" content="IN-UP" />
  <meta name="geo.placename" content="Noida, Greater Noida, India" />
  <meta name="geo.position" content="28.5355;77.3910" />
  <meta name="ICBM" content="28.5355, 77.3910" />

  <!-- Canonical URL -->
  <link rel="canonical" href="https://arjgroup.in/" />
  <link rel="alternate" hreflang="en" href="https://arjgroup.in/" />

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="Arj Spaces – Flats in Noida and Greater Noida | Luxury Homes & Apartments" />
  <meta property="og:description" content="Discover premium flats and luxury apartments by Arj Spaces in Noida and Greater Noida. Designed for modern living with high-end amenities and great connectivity." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://arjgroup.in/" />
  <meta property="og:site_name" content="Arj Spaces" />
  <meta property="og:image" content="https://arjgroup.in/admin/uploads/1759229214_3334ba9f-3e8a-46fc-bf4b-e4baa98904fc.jpeg" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Arj Spaces – Flats in Noida and Greater Noida | Luxury Apartments & Homes" />
  <meta name="twitter:description" content="Explore Arj Spaces for luxury apartments and modern homes in Noida and Greater Noida. Ideal for homebuyers and investors." />
  <meta name="twitter:image" content="https://arjgroup.in/admin/uploads/1759229214_3334ba9f-3e8a-46fc-bf4b-e4baa98904fc.jpeg" />

  <!-- Preload Images -->
  <link rel="preload" href="images/elt-banner.webp" as="image" />
  <link rel="preload" href="images/trump-banner.webp" as="image" />
  <link rel="preload" href="images/dlf-one-midtown-banner.webp" as="image" />

  <!-- Schema.org JSON-LD for SEO -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Arj Spaces",
    "url": "https://arjgroup.in/",
    "logo": "https://arjgroup.in/admin/uploads/1759229214_3334ba9f-3e8a-46fc-bf4b-e4baa98904fc.jpeg",
    "description": "Arj Spaces offers premium flats and luxury apartments in Noida and Greater Noida. Explore ready-to-move homes and investment properties.",
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+91-9911419406",
      "contactType": "Sales",
      "areaServed": "IN"
    },
    "sameAs": [
      "https://www.facebook.com/arjspaces",
      "https://www.instagram.com/arjspaces",
      "https://www.linkedin.com/company/arjspaces"
    ]
  }
  </script>
  
  

            <?php
           

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

            
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="css/swiper-bundle.min.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/header.css">
            <link rel="stylesheet" href="css/home.css">
            <link rel="stylesheet" href="css/footer.css">
            

             <script type="application/ld+json">
    {
    "@context" : "http://schema.org",
    "@type" : "WebSite",
    "name" : "ARJ Group",
    "url" : "https://arjgroup.in/"
    }
</script> 
             <script type="application/ld+json">
    {
    "@context": "http://schema.org",
    "@type": "RealEstateAgent",
    "name": "ARJ Group",
    "image": "https://arjgroup.in/admin/uploads/1759229214_3334ba9f-3e8a-46fc-bf4b-e4baa98904fc.jpeg",
    "@id": "https://arjgroup.in/",
    "url": "https://arjgroup.in/",
    "telephone": "+91-9911419406",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "Suncity Success Tower, Golf Course Ext. Road, Sector 65, Gurugram",
        "addressLocality": "Gurugram",
        "postalCode": "122018",
        "addressCountry": "IN"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.4195212,
        "longitude": 77.0358801
    },
    "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"
        ],
        "opens": "09:00",
        "closes": "19:00"
    },
    "sameAs": [
        "https://www.facebook.com/arjgroup.in/",
        "https://twitter.com/arjgroup",
        "https://plus.google.com/arjgroup Page",
        "https://www.youtube.com/channel/UCgmz9tyaa_CV7mErwc6IyGg",
        "https://www.linkedin.com/company/arjgroup/",
        "https://www.pinterest.com/arjgroup.in/",
        "https://github.com/arjgroup.in"
    ]
    }
</script>
           <script type="application/ld+json">
        {
        "@context": "http://schema.org/",
        "@type": "Review",
        "itemReviewed": {
            "@type": "Organization",
            "image": "https://arjgroup.in/admin/uploads/1759229214_3334ba9f-3e8a-46fc-bf4b-e4baa98904fc.jpeg",
            "name": "ARJ Group"
        },
        "reviewRating": {
            "@type": "Rating",
            "ratingValue": "5.0"
        },
        "name": "ARJ Group",
        "author": {
            "@type": "Person",
            "name": "Price"
        },
        "reviewBody": "ARJ Group",
        "publisher": {
            "@type": "Organization",
            "name": "ARJ Group"
        }
        }
</script> 
             <!--Google Tag Manager -->
             
             
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
 
        
        <!-- Google Tag Manager -->

<!-- End Google Tag Manager -->
        
        
        
        
            <!-- End Google Tag Manager -->
             <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Cardo:ital,wght@0,400;0,700;1,400&family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">


        </head>
        
        
        <?php
 

$profile_sql = "SELECT * FROM profile";
$profile_result = $conn->query($profile_sql);

if ($profile_result && $profile_result->num_rows > 0) {
    while ($profile_row = $profile_result->fetch_assoc()) {

?>


        <body style=" font-family: 'Nunito', sans-serif;
  font-optical-sizing: auto; font-style: normal; background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>; ">

            <!-- Google Tag Manager (noscript) -->
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

            <style>
                .custom-banner-wrapper {
                    background-color: #000;
                    position: relative;
                    overflow: hidden;
                }

                .custom-banner-image {
                    width: 100%;
                    display: block;
                    pointer-events: none;
                    user-select: none;
                    cursor: default;
                }

                .custom-banner-mobile {
                    display: none;
                }

                .custom-banner-content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    text-align: center;
                    width: 90%;
                    max-width: 650px;
                }

                .custom-heading {
                    font-size: 50px;
                    font-weight: 800;
                    /* font-family: 'Jazz LET', sans-serif; */
                    color: #fff;
                    background-color: rgba(0, 0, 0, 0.8);
                    padding: 6px;
                    margin-bottom: 20px;
                }

                .luxury-heading {
                    font-size: 36px;
                    color: #fff;
                    font-weight: 700;
                }

                .custom-btn {
                    background-color: #f39c12;
                    /* You can dynamically inject PHP color if needed */
                    color: #fff;
                    padding: 12px 24px;
                    font-size: 18px;
                    /* font-family: 'Jazz LET', sans-serif; */
                    text-decoration: none;
                    border: none;
                    border-radius: 4px;
                    display: inline-block;
                }

                @media (max-width: 576px) {
                    .custom-banner-desktop {
                        display: none;
                    }

                    .custom-banner-mobile {
                        display: block;
                    }
                }

                @media (min-width: 577px) {
                    .custom-banner-desktop {
                        display: block;
                    }

                    .custom-banner-mobile {
                        display: none;
                    }
                }
            </style>
<br><br><br>
            <section class="home-banner-section">
                <div class="custom-banner-wrapper">
                    <!-- Desktop Image -->
                    
                     <?php
                      
                     $image = null;
$result = $conn->query("SELECT home_image FROM logo1 ORDER BY id DESC LIMIT 1");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $image = $row['home_image']; // Correct field name for the image path
}

$conn->close();
?>
<?php if ($image): ?>
                    <img src="admin/<?php echo $image; ?>"
                        class="custom-banner-image custom-banner-desktop"
                        alt="Trusted real estate agency" loading="eager">
 <?php endif; ?>
                    <!-- Mobile Image -->
                    <img src="images/afe2d33a-81f8-4c9e-9f58-3545e199b11f.jpeg"
                        class="custom-banner-image custom-banner-mobile"
                        alt="Mobile real estate banner" loading="eager">

                    



                    <div class="position-absolute top-50 start-50 translate-middle text-center" style="width: 90%; max-width: 650px;">


                        <!--<h1 class="responsive-heading" style="font-family: 'Cardo', serif;">-->
                        <!--    ARJ<span style=" color:#fff;"> </span><span style=" color:#fff;"> Spaces Noida</span>-->
                        <!--</h1>-->
                         <?php
                        include 'config.php';
                        // Fetch contact details from the database
                        $all = $conn->query("SELECT website_name FROM profile_settings LIMIT 1");
                        if ($all && $all->num_rows > 0) {
                            $row = $all->fetch_assoc();
                            $website_name = htmlspecialchars($row['website_name']);
                        ?>
                            <h1 class="responsive-heading">
                                <?= $website_name ?>
                            </h1>
                        <?php
                        }
                        ?>
                        <br>
                        <style>
                            #projectSearch::placeholder {
                                color: #fff;
                                /* Light gray placeholder text */
                                opacity: 1;
                                font-size: 1.25rem;
                            }

                            .custom-search-input {
                                background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
                                padding: 9px;
                                border: none;
                                border-radius: 5px;
                                /* font-family: 'Jazz LET'; */
                                font-size: 1.25rem;
                            }

                            .search-icon {
                                position: absolute;
                                right: 15px;
                                top: 50%;
                                transform: translateY(-50%);
                                color: #999;
                                pointer-events: none;
                            }

                            .search-wrapper {
                                position: relative;
                                width: 100%;
                            }

                            .custom-gap {
                                gap: 20px;
                                /* Set horizontal gap between columns */
                            }
                        </style>

                        <div class="container my-4">
                            <div class="row g-2 align-items-center custom-gap">
                                <div class="col-12 col-md-auto">
                                    <a href="projects.php" class="btn btn-lg w-100 w-md-auto"
                                        style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color: #fff; font-family: 'Cardo', serif; ">
                                        Explore All Projects
                                    </a>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="search-wrapper">
                                        <div class="position-relative" style="max-width: 800px; margin: auto;">
                                            <input type="text" id="projectSearch" class="form-control custom-search-input" placeholder="Search projects by name..." autocomplete="off">
                                            <div id="searchResults" class="list-group position-absolute w-100" style="z-index: 1000;"></div>
                                        </div>

                                        <span>
                                            <i class="fas fa-search search-icon" style="color:#fff; font-size: 1.25rem;"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                
                <h2 style="display:none;">
    ARJ Spaces Noida
</h2>
                <!--<div id="searchResults" class="mt-3" ></div>-->
            </section>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                document.getElementById("projectSearch").addEventListener("keyup", function() {
                    let query = this.value;
                    if (query.length === 0) {
                        document.getElementById("searchResults").innerHTML = "";
                        return;
                    }

                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "search-projects.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onload = function() {
                        if (this.status === 200) {
                            document.getElementById("searchResults").innerHTML = this.responseText;
                        }
                    };
                    xhr.send("search=" + encodeURIComponent(query));
                });
            </script>


            <style>
                .responsive-heading {
                    position: relative;
                    font-family: 'Cardo', serif;
                    background-color: rgba(0, 0, 0, 0.5);
                    color: #fff;
                    padding: 6px;
                    font-size: 60px;
                    margin-bottom: 10px;
                    font-weight: 800;
                    text-transform: uppercase;
                }

                /* Top-left corner border */
                .responsive-heading::before {
                    content: "";
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 40px;
                    height: 40px;
                    border-top: 5px solid <?= htmlspecialchars($profile_row['heading_background_color']) ?>;
                    border-left: 5px solid <?= htmlspecialchars($profile_row['heading_background_color']) ?>;
                    border-top-left-radius: 2px;
                }

                /* Bottom-right corner border */
                .responsive-heading::after {
                    content: "";
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    width: 40px;
                    height: 40px;
                    border-bottom: 5px solid <?= htmlspecialchars($profile_row['heading_background_color']) ?>;
                    border-right: 5px solid <?= htmlspecialchars($profile_row['heading_background_color']) ?>;
                    border-bottom-right-radius: 2px;
                }



                @media (max-width: 767px) {
                    .responsive-heading {
                        font-size: 30px !important;
                    }

                    /* Top-left corner border */
                    .responsive-heading::before {
                        content: "";
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 40px;
                        height: 30px;
                        border-top: 5px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                        border-left: 5px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                        border-top-left-radius: 2px;
                    }

                    /* Bottom-right corner border */
                    .responsive-heading::after {
                        content: "";
                        position: absolute;
                        bottom: 0;
                        right: 0;
                        width: 30px;
                        height: 30px;
                        border-bottom: 5px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                        border-right: 5px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                        border-bottom-right-radius: 2px;
                    }

                }

                @media only screen and (max-width: 991px) {

                    .button_container span,
                    .overlay {
                        background: rgb(105 105 105) !important;
                    }
                }
            </style>
             <?php

              include 'config.php';
                // Fetch profile data (optional)
                $profile_sql = "SELECT * FROM profile";
                $profile_result = $conn->query($profile_sql);
                $profile_row = $profile_result->fetch_assoc();

                // Handle status filter from GET parameter
                $filter = isset($_GET['property']) ? $conn->real_escape_string($_GET['property']) : '';

                // Build query
                $cotegory = "SELECT * FROM ck";
                if (!empty($filter)) {
                    $cotegory .= " WHERE status12 = '$filter'";
                }
                $cotegory .= " ORDER BY id DESC";

                // Execute query
                $Allcotegory = $conn->query($cotegory);
                ?>


<section class="all-projects" id="all-projects" style="background-color:#f5f5f5;">
    <div class="title">
                    <div class="container-fluid">
                        <div class="container" style="max-width: 550px;">
                            <h3 class="demo" style=" padding: 10px; background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; border-left: 4px solid #000; border-right: 4px solid #000; border-radius:10px; font-family: 'Cardo', serif !important;">View all Project</h3>
                       
                        </div>
                    </div>
                </div>

    <div class="all-projects-div py-4">
        <div class="container">
            <div class="row g-4">
                <!-- Ultra Luxury -->
                <div class="col-md-4 col-sm-6">
                    <div class="project-items">
                        <a href="projects.php?property=Affordable"
                           class="project-card <?= ($filter === 'Affordable') ? 'active' : '' ?>">
                            <div class="project-item-img">
                                <img src="images/super-luxury-project-image.webp" 
                                     alt="Customer-focused real estate company" 
                                     class="img-fluid rounded-3 shadow-sm">
                                <div class="project-text">
                                    <b style="font-family: 'Cardo', serif !important;">Affordable</b>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Luxury -->
                <div class="col-md-4 col-sm-6">
                    <div class="project-items">
                        <a href="projects.php?property=Luxury"
                           class="project-card <?= ($filter === 'Luxury') ? 'active' : '' ?>">
                            <div class="project-item-img">
                                <img src="images/luxury-projects-image.webp" 
                                     alt="Real estate company" 
                                     class="img-fluid rounded-3 shadow-sm">
                                <div class="project-text">
                                    <b style="font-family: 'Cardo', serif !important;">Luxury</b>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Premium -->
                <div class="col-md-4 col-sm-6">
                    <div class="project-items">
                        <a href="projects.php?property=Ultra_Luxury"
                           class="project-card <?= ($filter === 'Ultra_Luxury') ? 'active' : '' ?>">
                            <div class="project-item-img">
                                <img src="images/premium-project-image.webp" 
                                     alt="Experienced real estate agents" 
                                     class="img-fluid rounded-3 shadow-sm">
                                <div class="project-text">
                                    <b style="font-family: 'Cardo', serif !important;">Ultra Luxury</b>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .project-items {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .project-items:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .project-item-img {
        position: relative;
    }

    .project-item-img img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        display: block;
    }

    .project-text {
        position: absolute;
        /* bottom: 0; */
        width: 100%;
        padding: 12px;
        text-align: center;
        background: rgba(0,0,0,0.65);
        color: #fff;
        font-size: 1.2rem;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
    }

    .project-card.active .project-text {
        background: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
        color: <?= htmlspecialchars($profile_row['background_color']) ?>;
        font-weight: bold;
    }

    @media (max-width: 767px) {
        .project-text {
            font-size: 1rem;
            padding: 8px;
        }
    }
</style>

            <!-- <section class="all-projects" id="all-projects">
                <div class="title">
                    <div class="container-fluid">
                        <div class="container" style="max-width: 550px;">
                            <h3 class="demo" style=" padding: 10px; background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-family: 'Jazz LET'; border-left: 4px solid #000; border-right: 4px solid #000; border-radius:10px; ">View all Project</h3>
                       
                        </div>
                    </div>
                </div> -->
                <style>
                    .project-text {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>;
                        font-size: 50px;
                        z-index: 9;
                        background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                        padding: 0px;
                        border-radius: 8px;
                        text-align: center;
                        width: 80%;
                    }
                </style>
                <style>
                    .project-text {
                        color: <?= htmlspecialchars($profile_row['heading_background_color']) ?> !important;
                    }

                    @media only screen and (max-width: 767px) {
                        .project-text {
                            font-size: 40px;
                            left: 0;
                            transform: rotate(0);
                            top: 40%;
                            width: 100%;
                            text-align: center;
                            background-color: rgb(45 45 45 / 95%);
                        }
                    }
                </style>

               
<!-- 
                <div class="all-projects-div">
                    <div class="container-fluid">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="project-items">
                                    <a href="projects.php?property=Ultra_Luxury"
                                        class="<?= ($filter === 'Ultra_Luxury') ? 'active' : '' ?>">
                                        <span class="project-item-img">
                                            <img src="images/super-luxury-project-image.webp"
                                                alt="Customer-focused real estate company"
                                                class="img-fluid" width="633" height="807">
                                        </span>
                                        <span class="project-text"><b>Ultra Luxury</b></span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="project-items">
                                    <a href="projects.php?property=Luxury"
                                        class="<?= ($filter === 'Luxury') ? 'active' : '' ?>">
                                        <span class="project-item-img">
                                            <img src="images/luxury-projects-image.webp"
                                                alt="Real estate company"
                                                class="img-fluid" width="633" height="807">
                                        </span>
                                        <span class="project-text"><b>Luxury</b></span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="project-items">
                                    <a href="projects.php?property=Premium"
                                        class="<?= ($filter === 'Premium') ? 'active' : '' ?>">
                                        <span class="project-item-img">
                                            <img src="images/premium-project-image.webp"
                                                alt="Experienced real estate agents"
                                                class="img-fluid" width="633" height="807">
                                        </span>
                                        <span class="project-text"><b>Premium</b></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section> -->

           <section class="our-achievement py-5">
  <div class="title text-center mb-5">
    <div class="container" style="max-width: 550px;">
      <h3 class="demo text-center"
          style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; 
                 padding: 10px; 
                 color: <?= htmlspecialchars($profile_row['background_color']) ?>; 
                 border-left: 4px solid #000; 
                 border-right: 4px solid #000; 
                 border-radius:10px;
                 font-family: 'Cardo', serif !important;">
        Our Achievements
      </h3>
    </div>
  </div>

  <div class="container">
    <div class="row g-4">
      <!-- Developers -->
      <div class="col-md-4 col-sm-6">
        <div class="achievement-card text-center p-4">
          <img src="images/developer-icon.png" alt="Developers" width="80" height="90">
          <?php
            
            $result = $conn->query("SELECT COUNT(*) AS total FROM dev_pro");
            $row = $result->fetch_assoc();
            $totalProducts = $row['total'];
          ?>
          <div class="achievement-count" style="font-size:45px;"><?= $totalProducts ?></div>
          <p><b style="font-family: 'Cardo', serif !important;">Developers</b></p>
        </div>
      </div>

      <!-- Projects -->
      <div class="col-md-4 col-sm-6">
        <div class="achievement-card text-center p-4">
          <img src="images/project-icon.png" alt="Projects" width="80" height="90">
          <?php
            
            $result = $conn->query("SELECT COUNT(*) AS total FROM ck");
            $row = $result->fetch_assoc();
            $totalProducts = $row['total'];
          ?>
          <div class="achievement-count" style="font-size:45px;"><?= $totalProducts ?></div>
          <p><b style="font-family: 'Cardo', serif !important;">Projects</b></p>
        </div>
      </div>

      <!-- Clients -->
      <div class="col-md-4 col-sm-6">
        <div class="achievement-card text-center p-4">
          <img src="images/client-icon.png" alt="Clients" width="80" height="90">
          <div class="achievement-count" style="font-size:45px;">1000+</div>
          <p><b style="font-family: 'Cardo', serif !important;">Clients</b></p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .achievement-card {
    background: #fff;
    border: 2px solid goldenrod;
    border-radius: 12px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 4px 8px rgba(0,0,0,0.05);
  }

  .achievement-card:hover {
    transform: translateY(-8px);
    box-shadow: 0px 8px 16px rgba(0,0,0,0.15);
  }

  .achievement-count {
    font-size: 2rem;
    font-weight: bold;
    color: goldenrod;
    margin-top: 15px;
    /* font-family: 'Jazz LET', cursive; */
  }

  .achievement-card p {
    margin: 0;
    color: #333;
    /* font-family: 'Jazz LET', cursive; */
  }

  @media(max-width: 768px) {
    .achievement-card {
      padding: 20px;
    }
    .achievement-count {
      font-size: 1.5rem;
    }
  }
</style>


            <section class="feature-project">
                <div class="title">
                    <div class="container" style="max-width: 550px;">
                        <h3 style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; padding: 10px; border-left: 4px solid #000; border-right: 4px solid #000; border-radius:10px; font-family: 'Cardo', serif !important;">Trending Projects</h3>
                        <p>Check out some of our listed properties</p>
                    </div>
                </div>
                <div class="feature-project-div">
                    <div class="container">
                        <div class="row">
                            <?php
                             include 'config.php';

                            // Fetch profile
                            $profile_sql = "SELECT * FROM profile";
                            $profile_result = $conn->query($profile_sql);
                            $profile_row = ($profile_result && $profile_result->num_rows > 0) ? $profile_result->fetch_assoc() : [];

                            // Fetch single property (optional)
                            $single_ck = null;
                            if (isset($_GET['slug'])) {
                                $slug = $conn->real_escape_string($_GET['slug']);
                                $result = $conn->query("SELECT * FROM ck WHERE blog = '$slug'");
                                $single_ck = $result->fetch_assoc();
                            }

                            // Status filter
                            $filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

                            // Build query
                            $ck_query = "SELECT * FROM ck WHERE propertyType = 'Projects'";
                            if (!empty($filter_status)) {
                                $ck_query .= " AND status1 = '$filter_status'";
                            }
                            $ck_query .= " ORDER BY id DESC";

                            // Build query
                            $ck_query = "SELECT * FROM ck WHERE propertyType = 'Projects'";
                            if (!empty($filter_status)) {
                                $ck_query .= " AND status1 = '$filter_status'";
                            }
                            $ck_query .= " ORDER BY id DESC LIMIT 6"; // ✅ Only fetch 6 records

                            // Execute query
                            $all_ck = $conn->query($ck_query);
                            ?>

                            <style>
                                .feature-project-cnt ul li {
                                    border-top: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                                }
                            </style>

                            <div class="row g-4">
                                <?php
                                if ($all_ck && $all_ck->num_rows > 0) {
                                    while ($row = $all_ck->fetch_assoc()) {
                                ?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="feature-project-item">
                                                <div class="feature-project-image">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>">
                                                        <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
                                                            alt="<?= htmlspecialchars($row['video']) ?>"
                                                            class="img-fluid"
                                                            style="width: 100%; height: 300px; object-fit: cover; border-radius: 2px;">

                                                    </a>
                                                    <span style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-size:20px; border-radius:10px; padding:5px; padding-top: 0px;
  padding-bottom: 0px;">
                                                        <?= htmlspecialchars($row['status1']) ?>
                                                    </span>
                                                </div>
                                                <div class="feature-project-cnt">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>" style="text-decoration:none;">
                                                        <h4 style="color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family: 'Cardo', serif !important;">
                                                            <?= htmlspecialchars($row['video']) ?>
                                                        </h4>
                                                        <p><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?></p>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <span>Area: <?= htmlspecialchars($row['configration']) ?></span>
                                                            <span>Size: <?= htmlspecialchars($row['size']) ?></span>
                                                        </li>
                                                        <li>
                                                            <span><b>₹ <?= htmlspecialchars($row['price']) ?: 'On Request' ?></b></span>
                                                            <span>
                                                                <a class="btn" href="views.php/<?= urlencode($row['blog']) ?>"
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
                                    // echo '<p>No projects found.</p>';
                                }
                                ?>
                            </div>



                            <div class="col-12">
                                <div class="view-all-project-btn">
                                    <a class="btn" href="projects.php" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-family: 'Cardo', serif !important;">View All Projects</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!--$filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';-->


            <section class="feature-project">
                <div class="title">
                    <div class="container" style="max-width: 55%;">
                        <h3 style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; padding: 10px; border-left: 4px solid #000; border-right: 4px solid #000; border-radius:10px; font-family: 'Cardo', serif !important;">Ready To Move Projects</h3>
                        <p>Check out some of our listed properties</p>
                    </div>
                </div>
                <div class="feature-project-div">
                    <div class="container">
                        <div class="row">
                            <?php
                            

                            // Fetch profile
                            $profile_sql = "SELECT * FROM profile";
                            $profile_result = $conn->query($profile_sql);
                            $profile_row = ($profile_result && $profile_result->num_rows > 0) ? $profile_result->fetch_assoc() : [];

                            // Fetch single property (optional)
                            $single_ck = null;
                            if (isset($_GET['slug'])) {
                                $slug = $conn->real_escape_string($_GET['slug']);
                                $result = $conn->query("SELECT * FROM ck WHERE blog = '$slug'");
                                $single_ck = $result->fetch_assoc();
                            }

                            // Status filter
                            $filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

                            // ✅ Build query (only Ready To Move)
                            $ck_query = "SELECT * FROM ck WHERE status1 = 'Ready To Move'";
                            if (!empty($filter_status)) {
                                $ck_query .= " AND status1 = '$filter_status'";
                            }
                            $ck_query .= " ORDER BY id DESC LIMIT 3"; // fetch only 3 records

                            // Execute query
                            $all_ck = $conn->query($ck_query);
                            ?>


                            <style>
                                .feature-project-cnt ul li {
                                    border-top: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                                }
                            </style>

                            <div class="row g-4">
                                <?php
                                if ($all_ck && $all_ck->num_rows > 0) {
                                    while ($row = $all_ck->fetch_assoc()) {
                                ?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="feature-project-item">
                                                <div class="feature-project-image">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>">
                                                        <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
                                                            alt="<?= htmlspecialchars($row['video']) ?>"
                                                            class="img-fluid"
                                                            style="width: 100%; height: 300px; object-fit: cover; border-radius: 2px;">

                                                    </a>
                                                    <span style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-size:20px; border-radius:10px; padding:5px; padding-top: 0px;
  padding-bottom: 0px;">
                                                        <?= htmlspecialchars($row['status1']) ?>
                                                    </span>
                                                </div>
                                                <div class="feature-project-cnt">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>" style="text-decoration:none;">
                                                        <h4 style="color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family: 'Cardo', serif !important;">
                                                            <?= htmlspecialchars($row['video']) ?>
                                                        </h4>
                                                        <p><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?></p>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <span>Area: <?= htmlspecialchars($row['configration']) ?></span>
                                                            <span>Size: <?= htmlspecialchars($row['size']) ?></span>
                                                        </li>
                                                        <li>
                                                            <span><b>₹ <?= htmlspecialchars($row['price']) ?: 'On Request' ?></b></span>
                                                            <span>
                                                                <a class="btn" href="views.php/<?= urlencode($row['blog']) ?>"
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
                                    // echo '<p>No projects found.</p>';
                                }
                                ?>
                            </div>



                            <div class="col-12">
                                <div class="view-all-project-btn">
                                    <a class="btn" href="https://arjgroup.in/projects.php?status=Ready%20To%20Move" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-family: 'Cardo', serif !important;">View All Projects</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="feature-project">
                <div class="title">
                    <div class="container" style="max-width: 59%;">
                        <h3 style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; padding: 10px; border-left: 4px solid #000; border-right: 4px solid #000; border-radius:10px; font-family: 'Cardo', serif !important;">Under Construction Projects</h3>
                        <p>Check out some of our listed properties</p>
                    </div>
                </div>
                <div class="feature-project-div">
                    <div class="container">
                        <div class="row">
                            <?php
                             

                            // Fetch profile
                            $profile_sql = "SELECT * FROM profile";
                            $profile_result = $conn->query($profile_sql);
                            $profile_row = ($profile_result && $profile_result->num_rows > 0) ? $profile_result->fetch_assoc() : [];

                            // Fetch single property (optional)
                            $single_ck = null;
                            if (isset($_GET['slug'])) {
                                $slug = $conn->real_escape_string($_GET['slug']);
                                $result = $conn->query("SELECT * FROM ck WHERE blog = '$slug'");
                                $single_ck = $result->fetch_assoc();
                            }

                            // Status filter
                            $filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

                            // ✅ Build query (only Ready To Move)
                            $ck_query = "SELECT * FROM ck WHERE status1 = 'Under Construction'";
                            if (!empty($filter_status)) {
                                $ck_query .= " AND status1 = '$filter_status'";
                            }
                            $ck_query .= " ORDER BY id DESC LIMIT 3"; // fetch only 3 records

                            // Execute query
                            $all_ck = $conn->query($ck_query);
                            ?>


                            <style>
                                .feature-project-cnt ul li {
                                    border-top: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                                }
                            </style>

                            <div class="row g-4">
                                <?php
                                if ($all_ck && $all_ck->num_rows > 0) {
                                    while ($row = $all_ck->fetch_assoc()) {
                                ?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="feature-project-item">
                                                <div class="feature-project-image">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>">
                                                        <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
                                                            alt="<?= htmlspecialchars($row['video']) ?>"
                                                            class="img-fluid"
                                                            style="width: 100%; height: 300px; object-fit: cover; border-radius: 2px;">

                                                    </a>
                                                    <span style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-size:20px; border-radius:10px; padding:5px; padding-top: 0px;
  padding-bottom: 0px;">
                                                        <?= htmlspecialchars($row['status1']) ?>
                                                    </span>
                                                </div>
                                                <div class="feature-project-cnt">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>" style="text-decoration:none;">
                                                        <h4 style="color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family: 'Cardo', serif !important;">
                                                            <?= htmlspecialchars($row['video']) ?>
                                                        </h4>
                                                        <p><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?></p>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <span>Area: <?= htmlspecialchars($row['configration']) ?></span>
                                                            <span>Size: <?= htmlspecialchars($row['size']) ?></span>
                                                        </li>
                                                        <li>
                                                            <span><b>₹ <?= htmlspecialchars($row['price']) ?: 'On Request' ?></b></span>
                                                            <span>
                                                                <a class="btn" href="views.php/<?= urlencode($row['blog']) ?>"
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
                                    // echo '<p>No projects found.</p>';
                                }
                                ?>
                            </div>



                            <div class="col-12">
                                <div class="view-all-project-btn">
                                    <a class="btn" href="https://arjgroup.in/projects.php?status=Under%20Construction" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-family: 'Cardo', serif !important;">View All Projects</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="feature-project">
                <div class="title">
                    <div class="container" style="max-width: 550px;">
                        <h3 style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; padding: 10px; border-left: 4px solid #000; border-right: 4px solid #000; border-radius:10px; font-family: 'Cardo', serif !important;">Upcoming Projects</h3>
                        <p>Check out some of our listed properties</p>
                    </div>
                </div>
                <div class="feature-project-div">
                    <div class="container">
                        <div class="row">
                            <?php
                            

                            // Fetch profile
                            $profile_sql = "SELECT * FROM profile";
                            $profile_result = $conn->query($profile_sql);
                            $profile_row = ($profile_result && $profile_result->num_rows > 0) ? $profile_result->fetch_assoc() : [];

                            // Fetch single property (optional)
                            $single_ck = null;
                            if (isset($_GET['slug'])) {
                                $slug = $conn->real_escape_string($_GET['slug']);
                                $result = $conn->query("SELECT * FROM ck WHERE blog = '$slug'");
                                $single_ck = $result->fetch_assoc();
                            }

                            // Status filter
                            $filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

                            // ✅ Build query (only Ready To Move)
                            $ck_query = "SELECT * FROM ck WHERE status1 = 'Upcoming'";
                            if (!empty($filter_status)) {
                                $ck_query .= " AND status1 = '$filter_status'";
                            }
                            $ck_query .= " ORDER BY id DESC LIMIT 3"; // fetch only 3 records

                            // Execute query
                            $all_ck = $conn->query($ck_query);
                            ?>


                            <style>
                                .feature-project-cnt ul li {
                                    border-top: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
                                }
                            </style>

                            <div class="row g-4">
                                <?php
                                if ($all_ck && $all_ck->num_rows > 0) {
                                    while ($row = $all_ck->fetch_assoc()) {
                                ?>
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="feature-project-item">
                                                <div class="feature-project-image">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>">
                                                        <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>"
                                                            alt="<?= htmlspecialchars($row['video']) ?>"
                                                            class="img-fluid"
                                                            style="width: 100%; height: 300px; object-fit: cover; border-radius: 2px;">

                                                    </a>
                                                    <span style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-size:20px; border-radius:10px; padding:5px; padding-top: 0px;
  padding-bottom: 0px;">
                                                        <?= htmlspecialchars($row['status1']) ?>
                                                    </span>
                                                </div>
                                                <div class="feature-project-cnt">
                                                    <a href="views.php/<?= urlencode($row['blog']) ?>" style="text-decoration:none;">
                                                        <h4 style="color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; font-family: 'Cardo', serif !important;">
                                                            <?= htmlspecialchars($row['video']) ?>
                                                        </h4>
                                                        <p><?= htmlspecialchars($row['locality']) ?>, <?= htmlspecialchars($row['location']) ?></p>
                                                    </a>
                                                    <ul>
                                                        <li>
                                                            <span>Area: <?= htmlspecialchars($row['configration']) ?></span>
                                                            <span>Size: <?= htmlspecialchars($row['size']) ?></span>
                                                        </li>
                                                        <li>
                                                            <span><b>₹ <?= htmlspecialchars($row['price']) ?: 'On Request' ?></b></span>
                                                            <span>
                                                                <a class="btn" href="views.php/<?= urlencode($row['blog']) ?>"
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
                                    // echo '<p>No projects found.</p>';
                                }
                                ?>
                            </div>



                            <div class="col-12">
                                <div class="view-all-project-btn">
                                    <a class="btn" href="https://arjgroup.in/projects.php?status=Upcoming" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; font-family: 'Cardo', serif !important;">View All Projects</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




<?php
 
$result = $conn->query("SELECT * FROM user_reviews ORDER BY id DESC");

if ($result->num_rows > 0):
?>
<section class="top-builder py-5">
  <div class="title mb-4">
    <div class="container" style="max-width: 550px;">
      <h3 style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; 
                 color:<?= htmlspecialchars($profile_row['background_color']) ?>; 
                 padding: 10px; 
                 border-left: 4px solid #000; 
                 border-right: 4px solid #000;">
        Our Testimonials
      </h3>
    </div>
  </div>

  <div class="top-builder-div" style="padding-top:40px;">
    <div class="container">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <?php while ($row = $result->fetch_assoc()): ?>
            <?php $ratingStars = str_repeat('⭐', (int)$row['rating']); ?>
            
            <div class="swiper-slide">
              <div class="card review-card h-100 text-center">
                <div class="card-body">
                  <?php if (!empty($row['image'])): ?>
                    <img src="review/uploads/<?= htmlspecialchars($row['image']) ?>" 
                         alt="User Image" 
                         class="review-img mb-3">
                  <?php else: ?>
                    <div class="review-icon mb-3">
                      <i class="fas fa-user fa-2x text-secondary"></i>
                    </div>
                  <?php endif; ?>

                  <h5 class="fw-semibold mb-1"><?= htmlspecialchars($row['name']) ?></h5>
                  <p class="text-warning mb-2" style="font-size: 18px;"><?= $ratingStars ?></p>
                  <p class="text-muted small"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>

        <div class="swiper-pagination mt-3"></div>
      </div>
    </div>
  </div>
</section>

<!-- Swiper JS + CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Swiper + Card Styles -->
<style>
.review-card {
  border: none;
  border-radius: 15px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  background: #fff;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.review-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.15);
}
.review-img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #ccc;
}
.review-icon {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: 2px solid #ccc;
  background-color: #f8f9fa;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
}
.swiper {
  padding-bottom: 40px;
}
</style>

<script>
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 25,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  breakpoints: {
    576: { slidesPerView: 1 },
    768: { slidesPerView: 2 },
    1024: { slidesPerView: 3 },
  },
});
</script>
<?php else: ?>
<!--<p class="text-center">No testimonials found.</p>-->
<?php endif; ?>


            <!--<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>-->
            <!--<script>-->
            <!--    const swiper = new Swiper(".mySwiper", {-->
            <!--        loop: true,-->
            <!--        speed: 5000,-->
            <!--        autoplay: {-->
            <!--            delay: 0,-->
            <!--            disableOnInteraction: false-->
            <!--        },-->
            <!--        slidesPerView: 1,-->
            <!--        spaceBetween: 30,-->
            <!--        pagination: {-->
            <!--            el: ".swiper-pagination",-->
            <!--            clickable: true-->
            <!--        },-->
            <!--        grabCursor: true,-->
            <!--        breakpoints: {-->
            <!--            768: {-->
            <!--                slidesPerView: 2-->
            <!--            },-->
            <!--            992: {-->
            <!--                slidesPerView: 3-->
            <!--            }-->
            <!--        }-->
            <!--    });-->
            <!--</script>-->
            <!--<style>-->
            <!--    .swiper-slide {-->
            <!--        padding: 10px;-->
            <!--    }-->

            <!--    .card {-->
            <!--        border-radius: 12px;-->
            <!--    }-->
            <!--</style>-->





            <section class="top-builder">
                <div class="title">
                    <div class="container" style="max-width: 550px;">
                        <h3 style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; padding: 10px; border-left: 4px solid #000; border-right: 4px solid #000; font-family: 'Cardo', serif !important;">Top Builders</h3>
                    </div>
                </div>
                <div class="top-builder-div" style="">
                    <div class="container"  >
                        <div class="swiper-container top-builder-slider">
                            <div class="swiper-wrapper" >
                                <div class="swiper-slide">
                                    <img src="images/top/5c33f796-5569-40b8-9034-da6b65510103.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/6e216668-e283-452a-be89-9de047453d69.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/7d003d90-bdbb-4da4-bd7b-5db5f173b684.jpeg" alt="" class="img-fluid" width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/8b64abcc-7935-452a-befd-5f0440f44806.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/115ca247-67e2-49c4-8d6b-a7fa95cd3306.jpeg" alt="" class="img-fluid" width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/830ea353-fa48-4f48-88d4-11a45b5fe7fd.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>

                                <div class="swiper-slide">
                                    <img src="images/top/2874b013-2bce-429b-9fc7-4be05ce7718c.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/6686245a-2e66-4cdc-af6e-6c6d7c1e7aa9.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/7753660b-8552-4a9c-863b-bf55f830b779.jpeg" alt="" class="img-fluid" width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/abc90baf-509c-4b2d-9968-2d5eb94ca49f.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/b90ef464-7416-4962-a179-2b6cd5493d78.jpeg" alt="" class="img-fluid" width="150" height="80">
                                </div>
                                <div class="swiper-slide">
                                    <img src="images/top/cc19a0ca-ff76-4daf-b38a-c3a5bef632f8.jpeg" alt="" class="img-fluid"
                                        width="150" height="80">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination-top-builder-slider"></div>
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
            <footer>
                <div class="top-footer" style="background-image: url(images/banner.webp);">
                    <div class="container">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-5 col-lg-4">
                                <?php
                                

                                // Fetch contact details from the database
                                $all = $conn->query("SELECT mobile, email, whatsapp, address FROM profile_settings LIMIT 1");

                                if ($all && $all->num_rows > 0) {
                                    $row = $all->fetch_assoc();
                                    $mobile = htmlspecialchars($row['mobile']);
                                    $whatsapp = htmlspecialchars($row['whatsapp']);
                                    $email = htmlspecialchars($row['email']);
                                    $address = htmlspecialchars($row['address']);

                                ?>

                                    <div class="location-detail" style="border:2px solid rgb(240, 237, 236) !important;">
                                        
                                        
                                         <?php
                        include 'config.php';
                        // Fetch contact details from the database
                        $all = $conn->query("SELECT website_name FROM profile_settings LIMIT 1");
                        if ($all && $all->num_rows > 0) {
                            $row = $all->fetch_assoc();
                            $website_name = htmlspecialchars($row['website_name']);
                        ?>
                            
                        
                                        <div class="location-item">
                                            <h5 style="color:<?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
                                                <i class="bi bi-house-door-fill" style="margin-right: 8px;"></i>Website Name
                                            </h5>
                                            <p><?= $website_name ?></p>
                                        </div>
                                        
                                        <?php
                        }
                        ?>
                                        
                                        <div class="location-item">
                                            <h5 style="color:<?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
                                                <i class="bi bi-house-door-fill" style="margin-right: 8px;"></i>Address
                                            </h5>
                                            <p><?= $address ?></p>
                                        </div>
                                        <div class="location-item">
                                            <h5 style="color:<?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
                                                <i class="bi bi-telephone-fill" style="margin-right: 8px;"></i>Phone
                                            </h5>
                                            <p>
                                                <a href="tel:<?= $mobile ?>"><?= $mobile ?></a>
                                                
                                            </p>
                                        </div>
                                        <div class="location-item">
                                            <h5 style="color:<?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
                                                <i class="bi bi-envelope-fill" style="margin-right: 8px;"></i>Email
                                            </h5>
                                            <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>

                            </div>
                  <!--form-->
                        </div>
                    </div>
                </div>
                <style>
                    .form-footer .btn {
                        border: none !important;
                    }

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
            </footer>

            <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">✖</button> 
                            <div class="top-footer" style="background-image: url(images/home/banner.webp);">
                                <div class="container">
                                    <div class="form-footer">
                                        <h4 style="color:<?= htmlspecialchars($profile_row['heading_background_color']) ?>;">Leave Your Details Here</h4>
                                        <form action="" method="post" name="form" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Full Name" required="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="Email ID" required=""
                                                            pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
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
                                                            <!--    <option data-countryCode="CY" value="+90392">Cyprus North (+90392)</option>-->
                                                            <!--    <option data-countryCode="CY" value="+357">Cyprus South (+357)</option>-->
                                                            <!--    <option data-countryCode="CZ" value="+42">Czech Republic (+42)</option>-->
                                                            <!--    <option data-countryCode="DK" value="+45">Denmark (+45)</option>-->
                                                            <!--    <option data-countryCode="DJ" value="+253">Djibouti (+253)</option>-->
                                                            <!--    <option data-countryCode="DM" value="+1809">Dominica (+1809)</option>-->
                                                            <!--    <option data-countryCode="DO" value="+1809">Dominican Republic (+1809)</option>-->
                                                            <!--    <option data-countryCode="EC" value="+593">Ecuador (+593)</option>-->
                                                            <!--    <option data-countryCode="EG" value="+20">Egypt (+20)</option>-->
                                                            <!--    <option data-countryCode="SV" value="+503">El Salvador (+503)</option>-->
                                                            <!--    <option data-countryCode="GQ" value="+240">Equatorial Guinea (+240)</option>-->
                                                            <!--    <option data-countryCode="ER" value="+291">Eritrea (+291)</option>-->
                                                            <!--    <option data-countryCode="EE" value="+372">Estonia (+372)</option>-->
                                                            <!--    <option data-countryCode="ET" value="+251">Ethiopia (+251)</option>-->
                                                            <!--    <option data-countryCode="FK" value="+500">Falkland Islands (+500)</option>-->
                                                            <!--    <option data-countryCode="FO" value="+298">Faroe Islands (+298)</option>-->
                                                            <!--    <option data-countryCode="FJ" value="+679">Fiji (+679)</option>-->
                                                            <!--    <option data-countryCode="FI" value="+358">Finland (+358)</option>-->
                                                            <!--    <option data-countryCode="FR" value="+33">France (+33)</option>-->
                                                            <!--    <option data-countryCode="GF" value="+594">French Guiana (+594)</option>-->
                                                            <!--    <option data-countryCode="PF" value="+689">French Polynesia (+689)</option>-->
                                                            <!--    <option data-countryCode="GA" value="+241">Gabon (+241)</option>-->
                                                            <!--    <option data-countryCode="GM" value="+220">Gambia (+220)</option>-->
                                                            <!--    <option data-countryCode="GE" value="+7880">Georgia (+7880)</option>-->
                                                            <!--    <option data-countryCode="DE" value="+49">Germany (+49)</option>-->
                                                            <!--    <option data-countryCode="GH" value="+233">Ghana (+233)</option>-->
                                                            <!--    <option data-countryCode="GI" value="+350">Gibraltar (+350)</option>-->
                                                            <!--    <option data-countryCode="GR" value="+30">Greece (+30)</option>-->
                                                            <!--    <option data-countryCode="GL" value="+299">Greenland (+299)</option>-->
                                                            <!--    <option data-countryCode="GD" value="+1473">Grenada (+1473)</option>-->
                                                            <!--    <option data-countryCode="GP" value="+590">Guadeloupe (+590)</option>-->
                                                            <!--    <option data-countryCode="GU" value="+671">Guam (+671)</option>-->
                                                            <!--    <option data-countryCode="GT" value="+502">Guatemala (+502)</option>-->
                                                            <!--    <option data-countryCode="GN" value="+224">Guinea (+224)</option>-->
                                                            <!--    <option data-countryCode="GW" value="+245">Guinea - Bissau (+245)</option>-->
                                                            <!--    <option data-countryCode="GY" value="+592">Guyana (+592)</option>-->
                                                            <!--    <option data-countryCode="HT" value="+509">Haiti (+509)</option>-->
                                                            <!--    <option data-countryCode="HN" value="+504">Honduras (+504)</option>-->
                                                            <!--    <option data-countryCode="HK" value="+852">Hong Kong (+852)</option>-->
                                                            <!--    <option data-countryCode="HU" value="+36">Hungary (+36)</option>-->
                                                            <!--    <option data-countryCode="IS" value="+354">Iceland (+354)</option>-->
                                                            <!--    <option data-countryCode="ID" value="+62">Indonesia (+62)</option>-->
                                                            <!--    <option data-countryCode="IR" value="+98">Iran (+98)</option>-->
                                                            <!--    <option data-countryCode="IQ" value="+964">Iraq (+964)</option>-->
                                                            <!--    <option data-countryCode="IE" value="+353">Ireland (+353)</option>-->
                                                            <!--    <option data-countryCode="IL" value="+972">Israel (+972)</option>-->
                                                            <!--    <option data-countryCode="IT" value="+39">Italy (+39)</option>-->
                                                            <!--    <option data-countryCode="JM" value="+1876">Jamaica (+1876)</option>-->
                                                            <!--    <option data-countryCode="JP" value="+81">Japan (+81)</option>-->
                                                            <!--    <option data-countryCode="JO" value="+962">Jordan (+962)</option>-->
                                                            <!--    <option data-countryCode="KZ" value="+7">Kazakhstan (+7)</option>-->
                                                            <!--    <option data-countryCode="KE" value="+254">Kenya (+254)</option>-->
                                                            <!--    <option data-countryCode="KI" value="+686">Kiribati (+686)</option>-->
                                                            <!--    <option data-countryCode="KP" value="+850">Korea North (+850)</option>-->
                                                            <!--    <option data-countryCode="KR" value="+82">Korea South (+82)</option>-->
                                                            <!--    <option data-countryCode="KW" value="+965">Kuwait (+965)</option>-->
                                                            <!--    <option data-countryCode="KG" value="+996">Kyrgyzstan (+996)</option>-->
                                                            <!--    <option data-countryCode="LA" value="+856">Laos (+856)</option>-->
                                                            <!--    <option data-countryCode="LV" value="+371">Latvia (+371)</option>-->
                                                            <!--    <option data-countryCode="LB" value="+961">Lebanon (+961)</option>-->
                                                            <!--    <option data-countryCode="LS" value="+266">Lesotho (+266)</option>-->
                                                            <!--    <option data-countryCode="LR" value="+231">Liberia (+231)</option>-->
                                                            <!--    <option data-countryCode="LY" value="+218">Libya (+218)</option>-->
                                                            <!--    <option data-countryCode="LI" value="+417">Liechtenstein (+417)</option>-->
                                                            <!--    <option data-countryCode="LT" value="+370">Lithuania (+370)</option>-->
                                                            <!--    <option data-countryCode="LU" value="+352">Luxembourg (+352)</option>-->
                                                            <!--    <option data-countryCode="MO" value="+853">Macao (+853)</option>-->
                                                            <!--    <option data-countryCode="MK" value="+389">Macedonia (+389)</option>-->
                                                            <!--    <option data-countryCode="MG" value="+261">Madagascar (+261)</option>-->
                                                            <!--    <option data-countryCode="MW" value="+265">Malawi (+265)</option>-->
                                                            <!--    <option data-countryCode="MY" value="+60">Malaysia (+60)</option>-->
                                                            <!--    <option data-countryCode="MV" value="+960">Maldives (+960)</option>-->
                                                            <!--    <option data-countryCode="ML" value="+223">Mali (+223)</option>-->
                                                            <!--    <option data-countryCode="MT" value="+356">Malta (+356)</option>-->
                                                            <!--    <option data-countryCode="MH" value="+692">Marshall Islands (+692)</option>-->
                                                            <!--    <option data-countryCode="MQ" value="+596">Martinique (+596)</option>-->
                                                            <!--    <option data-countryCode="MR" value="+222">Mauritania (+222)</option>-->
                                                            <!--    <option data-countryCode="YT" value="+269">Mayotte (+269)</option>-->
                                                            <!--    <option data-countryCode="MX" value="+52">Mexico (+52)</option>-->
                                                            <!--    <option data-countryCode="FM" value="+691">Micronesia (+691)</option>-->
                                                            <!--    <option data-countryCode="MD" value="+373">Moldova (+373)</option>-->
                                                            <!--    <option data-countryCode="MC" value="+377">Monaco (+377)</option>-->
                                                            <!--    <option data-countryCode="MN" value="+976">Mongolia (+976)</option>-->
                                                            <!--    <option data-countryCode="MS" value="+1664">Montserrat (+1664)</option>-->
                                                            <!--    <option data-countryCode="MA" value="+212">Morocco (+212)</option>-->
                                                            <!--    <option data-countryCode="MZ" value="+258">Mozambique (+258)</option>-->
                                                            <!--    <option data-countryCode="MN" value="+95">Myanmar (+95)</option>-->
                                                            <!--    <option data-countryCode="NA" value="+264">Namibia (+264)</option>-->
                                                            <!--    <option data-countryCode="NR" value="+674">Nauru (+674)</option>-->
                                                            <!--    <option data-countryCode="NP" value="+977">Nepal (+977)</option>-->
                                                            <!--    <option data-countryCode="NL" value="+31">Netherlands (+31)</option>-->
                                                            <!--    <option data-countryCode="NC" value="+687">New Caledonia (+687)</option>-->
                                                            <!--    <option data-countryCode="NZ" value="+64">New Zealand (+64)</option>-->
                                                            <!--    <option data-countryCode="NI" value="+505">Nicaragua (+505)</option>-->
                                                            <!--    <option data-countryCode="NE" value="+227">Niger (+227)</option>-->
                                                            <!--    <option data-countryCode="NG" value="+234">Nigeria (+234)</option>-->
                                                            <!--    <option data-countryCode="NU" value="+683">Niue (+683)</option>-->
                                                            <!--    <option data-countryCode="NF" value="+672">Norfolk Islands (+672)</option>-->
                                                            <!--    <option data-countryCode="NP" value="+670">Northern Marianas (+670)</option>-->
                                                            <!--    <option data-countryCode="NO" value="+47">Norway (+47)</option>-->
                                                            <!--    <option data-countryCode="OM" value="+968">Oman (+968)</option>-->
                                                            <!--    <option data-countryCode="PW" value="+680">Palau (+680)</option>-->
                                                            <!--    <option data-countryCode="PA" value="+507">Panama (+507)</option>-->
                                                            <!--    <option data-countryCode="PG" value="+675">Papua New Guinea (+675)</option>-->
                                                            <!--    <option data-countryCode="PY" value="+595">Paraguay (+595)</option>-->
                                                            <!--    <option data-countryCode="PE" value="+51">Peru (+51)</option>-->
                                                            <!--    <option data-countryCode="PH" value="+63">Philippines (+63)</option>-->
                                                            <!--    <option data-countryCode="PL" value="+48">Poland (+48)</option>-->
                                                            <!--    <option data-countryCode="PT" value="+351">Portugal (+351)</option>-->
                                                            <!--    <option data-countryCode="PR" value="+1787">Puerto Rico (+1787)</option>-->
                                                            <!--    <option data-countryCode="QA" value="+974">Qatar (+974)</option>-->
                                                            <!--    <option data-countryCode="RE" value="+262">Reunion (+262)</option>-->
                                                            <!--    <option data-countryCode="RO" value="+40">Romania (+40)</option>-->
                                                            <!--    <option data-countryCode="RU" value="+7">Russia (+7)</option>-->
                                                            <!--    <option data-countryCode="RW" value="+250">Rwanda (+250)</option>-->
                                                            <!--    <option data-countryCode="SM" value="+378">San Marino (+378)</option>-->
                                                            <!--    <option data-countryCode="ST" value="+239">Sao Tome & Principe (+239)</option>-->
                                                            <!--    <option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>-->
                                                            <!--    <option data-countryCode="SN" value="+221">Senegal (+221)</option>-->
                                                            <!--    <option data-countryCode="CS" value="+381">Serbia (+381)</option>-->
                                                            <!--    <option data-countryCode="SC" value="+248">Seychelles (+248)</option>-->
                                                            <!--    <option data-countryCode="SL" value="+232">Sierra Leone (+232)</option>-->
                                                            <!--    <option data-countryCode="SG" value="+65">Singapore (+65)</option>-->
                                                            <!--    <option data-countryCode="SK" value="+421">Slovak Republic (+421)</option>-->
                                                            <!--    <option data-countryCode="SI" value="+386">Slovenia (+386)</option>-->
                                                            <!--    <option data-countryCode="SB" value="+677">Solomon Islands (+677)</option>-->
                                                            <!--    <option data-countryCode="SO" value="+252">Somalia (+252)</option>-->
                                                            <!--    <option data-countryCode="ZA" value="+27">South Africa (+27)</option>-->
                                                            <!--    <option data-countryCode="ES" value="+34">Spain (+34)</option>-->
                                                            <!--    <option data-countryCode="LK" value="+94">Sri Lanka (+94)</option>-->
                                                            <!--    <option data-countryCode="SH" value="+290">St. Helena (+290)</option>-->
                                                            <!--    <option data-countryCode="KN" value="+1869">St. Kitts (+1869)</option>-->
                                                            <!--    <option data-countryCode="SC" value="+1758">St. Lucia (+1758)</option>-->
                                                            <!--    <option data-countryCode="SD" value="+249">Sudan (+249)</option>-->
                                                            <!--    <option data-countryCode="SR" value="+597">Suriname (+597)</option>-->
                                                            <!--    <option data-countryCode="SZ" value="+268">Swaziland (+268)</option>-->
                                                            <!--    <option data-countryCode="SE" value="+46">Sweden (+46)</option>-->
                                                            <!--    <option data-countryCode="CH" value="+41">Switzerland (+41)</option>-->
                                                            <!--    <option data-countryCode="SI" value="+963">Syria (+963)</option>-->
                                                            <!--    <option data-countryCode="TW" value="+886">Taiwan (+886)</option>-->
                                                            <!--    <option data-countryCode="TJ" value="+7">Tajikstan (+7)</option>-->
                                                            <!--    <option data-countryCode="TH" value="+66">Thailand (+66)</option>-->
                                                            <!--    <option data-countryCode="TG" value="+228">Togo (+228)</option>-->
                                                            <!--    <option data-countryCode="TO" value="+676">Tonga (+676)</option>-->
                                                            <!--    <option data-countryCode="TT" value="+1868">Trinidad & Tobago (+1868)</option>-->
                                                            <!--    <option data-countryCode="TN" value="+216">Tunisia (+216)</option>-->
                                                            <!--    <option data-countryCode="TR" value="+90">Turkey (+90)</option>-->
                                                            <!--    <option data-countryCode="TM" value="+7">Turkmenistan (+7)</option>-->
                                                            <!--    <option data-countryCode="TM" value="+993">Turkmenistan (+993)</option>-->
                                                            <!--    <option data-countryCode="TC" value="+1649">Turks & Caicos Islands (+1649)</option>-->
                                                            <!--    <option data-countryCode="TV" value="+688">Tuvalu (+688)</option>-->
                                                            <!--    <option data-countryCode="UG" value="+256">Uganda (+256)</option>-->
                                                            <!--    <option data-countryCode="GB" value="+44">UK (+44)</option>-->
                                                            <!--    <option data-countryCode="UA" value="+380">Ukraine (+380)</option>-->
                                                            <!--    <option data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>-->
                                                            <!--    <option data-countryCode="UY" value="+598">Uruguay (+598)</option>-->
                                                            <!--    <option data-countryCode="US" value="+1">USA (+1)</option>-->
                                                            <!--    <option data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>-->
                                                            <!--    <option data-countryCode="VU" value="+678">Vanuatu (+678)</option>-->
                                                            <!--    <option data-countryCode="VA" value="+379">Vatican City (+379)</option>-->
                                                            <!--    <option data-countryCode="VE" value="+58">Venezuela (+58)</option>-->
                                                            <!--    <option data-countryCode="VN" value="+84">Vietnam (+84)</option>-->
                                                            <!--    <option data-countryCode="VG" value="+84">Virgin Islands - British (+1284)</option>-->
                                                            <!--    <option data-countryCode="VI" value="+84">Virgin Islands - US (+1340)</option>-->
                                                            <!--    <option data-countryCode="WF" value="+681">Wallis & Futuna (+681)</option>-->
                                                            <!--    <option data-countryCode="YE" value="+969">Yemen (North)(+969)</option>-->
                                                            <!--    <option data-countryCode="YE" value="+967">Yemen (South)(+967)</option>-->
                                                            <!--    <option data-countryCode="ZM" value="+260">Zambia (+260)</option>-->
                                                            <!--    <option data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>-->
                                                            <!--</optgroup>-->
                                                        </select> <input type="text" class="form-control" name="mobile"
                                                            placeholder="Mobile" required="" pattern="[0-9]{10}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="message" placeholder="Message"
                                                            required=""></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <div class="g-recaptcha"
                                                            data-sitekey="6LeT4CUiAAAAAO4Ns9Q_yHrl_gdVBFxnblHXRZbM"></div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <input type="hidden" name="source" class="source" value="Seo" />
                                                    <input type="text" name="formflag" class="formflag" value="" />
                                                    <button type="submit" name="submit" value="submit" class="send_btn btn">SEND
                                                        MESSAGE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery-3.6.0.js"></script>
            <script src="js/swiper-bundle.min.js"></script>
            <script src="js/TweenMax.min.js"></script>
            <script src="https://www.google.com/recaptcha/api.js"></script>
            <script src="js/index.js"></script>
            <script src="js/project-page-extranal.js"></script>
            <!-- <script>
        includeHTML();
      </script>  -->
            <!-- <script> 
        TweenLite.defaultEase = Power0.easeNone;
        TweenMax.set(".mask", { transformOrigin: "100% 50%" });
        TweenMax.from(".mask1", 2.2, { width: "0px", ease: Power0.easeNone, repeat: -1, repeatDelay: 2 })
        TweenMax.from(".mask2", 2.2, { width: "0px", ease: Power0.easeNone, repeat: -1, repeatDelay: 2 })
    </script> -->
            <!-- <script>
        var slideIndex = 0;
        showSlides();
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
    </script>---->
            <script>
                $(document).ready(function() {
                    $('.banner-arrow[href^="#"]').on("click", function(e) {
                        e.preventDefault();
                        var t = this.hash,
                            n = $(t);
                        $("html, body").stop().animate({
                            scrollTop: n.offset().top - 70
                        }, 500, "swing", function() {})
                    })
                    var counters = $(".achievement-count");
                    var countersQuantity = counters.length;
                    var counter = [];
                    for (i = 0; i < countersQuantity; i++) {
                        counter[i] = parseInt(counters[i].innerHTML);
                    }
                    var count = function(start, value, id) {
                        var localStart = start;
                        setInterval(function() {
                            if (localStart < value) {
                                localStart++;
                                counters[id].innerHTML = localStart;
                            }
                        }, 5);
                    }
                    for (j = 0; j < countersQuantity; j++) {
                        count(0, counter[j], j);
                    }
                    var swiper = new Swiper('.top-builder-slider', {
                        speed: 600,
                        loop: true,
                        autoplay: {
                            delay: 4000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: ".swiper-pagination-top-builder-slider",
                            clickable: true,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            320: {
                                slidesPerView: 1,
                                spaceBetween: 0,
                            },
                            576: {
                                slidesPerView: 2,
                                spaceBetween: 0,
                            },
                            768: {
                                slidesPerView: 3,
                                spaceBetween: 15,
                            },
                            992: {
                                slidesPerView: 5,
                                spaceBetween: 20,
                            }
                        }
                    });
                    var swiper = new Swiper('.testimonials-slider', {
                        speed: 500,
                        loop: true,
                        autoplay: {
                            delay: 4000,
                            disableOnInteraction: false,
                        },
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev',
                        },
                        breakpoints: {
                            320: {
                                slidesPerView: 1,
                                spaceBetween: 30,
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 30,
                            },
                            992: {
                                slidesPerView: 3,
                                spaceBetween: 30,
                            }
                        }
                    });
                })
            </script>
            <!-- <script>
        window.onscroll = function () { myFunction() };

        var header = document.getElementById("main-header");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script> -->

            <!-- <script>
         $(".menu ul li a").click(function() {
        $('#toggle').toggleClass('active');
        $('#overlay').toggleClass('open');    
    })
    </script> -->
        </body>

        </html>
<?php
    }
}

$conn->close();
?>