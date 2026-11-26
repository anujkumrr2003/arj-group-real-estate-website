


<?php
include "config.php";
error_reporting(0);

   $profile_sql = "SELECT * FROM profile";
$profile_result = $conn->query($profile_sql);

if ($profile_result && $profile_result->num_rows > 0) {
    while ($profile_row = $profile_result->fetch_assoc()) {
            
            ?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Google Site Verification -->
  <meta name="google-site-verification" content="1GE-eh3i3CFWbRH7t6juE61aZ6S2b0KSW31ovUlngQo">


  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 <?php
 

$records = $conn->query("SELECT * FROM meta_data WHERE LOWER(page_name) = 'blog' LIMIT 1");
$meta = $records->fetch_assoc();
?>

<title><?= htmlspecialchars($meta['meta_title'] ?? 'ARJ GROUP – Flats in Noida and Greater Noida') ?></title>
<meta name="description" content="<?= htmlspecialchars($meta['meta_description'] ?? '') ?>">
<meta name="keywords" content="<?= htmlspecialchars($meta['keywords'] ?? '') ?>">
  <!-- Page Title -->
  <!--<title>Blog | ARJ GROUP – Flats in Noida and Greater Noida</title>-->

  <!-- Meta Description and Keywords -->
  <!--<meta name="description" content="Read the latest insights from ARJ GROUP on luxury flats, apartments, and real estate trends in Noida and Greater Noida. Stay informed on premium residential projects and investment opportunities." />-->
  <!--<meta name="keywords" content="ARJ GROUP, flats in Noida, flats in Greater Noida, luxury apartments Noida, premium projects Noida, real estate Noida, property in Noida, luxury flats Noida, ready to move apartments Noida, residential properties Noida, Noida real estate blog, Greater Noida housing" />-->

  <!-- Robots -->
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <meta name="bingbot" content="index, follow" />

  <!-- Canonical and Alternate -->
  <link rel="canonical" href="https://arjgroup.in/blog.php" />
  <link rel="alternate" hreflang="en" href="https://arjgroup.in/blog.php" />

  <!-- Open Graph (Facebook / LinkedIn) -->
  <meta property="og:title" content="Blog | ARJ GROUP – Flats in Noida and Greater Noida" />
  <meta property="og:description" content="Explore real estate insights and trends from ARJ GROUP. Learn about luxury flats and apartments in Noida and Greater Noida, and make informed investment choices." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://arjgroup.in/blog.php" />
  <meta property="og:site_name" content="ARJ GROUP" />
  <meta property="og:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="ARJ GROUP Blog – Luxury Flats and Real Estate in Noida & Greater Noida" />
  <meta name="twitter:description" content="Stay updated with ARJ GROUP blogs on luxury homes, apartments, and real estate trends in Noida and Greater Noida." />
  <meta name="twitter:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

  <!-- Schema Markup -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "ARJ GROUP Blog",
    "url": "https://arjgroup.in/blog.php",
    "image": "https://arjgroup.in/theme/home/luxury-residences-logo.jpg",
    "description": "ARJ GROUP Blog features expert insights and articles on luxury real estate, premium flats, and modern housing trends in Noida and Greater Noida.",
    "publisher": {
      "@type": "Organization",
      "name": "ARJ GROUP",
      "url": "https://arjgroup.in/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://arjgroup.in/theme/home/luxury-residences-logo.jpg"
      }
    },
    "inLanguage": "en-IN"
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
    // echo '<link rel="icon" href="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" />';
}
?>

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/contact.css">
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

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="font-family: 'Playfair Display', serif; background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
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
  <!-- End Google Tag Manager (noscript) -->
  <?php include 'header.php'; ?>
<br>
  <section class="banner" style="background-image: url('images/contact-us-1.jpg');
background-size: cover;
background-position: center center;
background-repeat: no-repeat; font-family: 'Cardo', serif;">
    <h1>Blogs / News</h1>
  </section>
  <!-- <h2>
    hhegwe
    jgfgjhj
  </h2>
  <p>hjgfksf skhfks</p> -->
<!--background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color: <?= htmlspecialchars($profile_row['background_color']) ?>;-->


  <!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Responsive Blog Cards</title> -->

  <style>
    .blog-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .blog-card .card-title {
      font-weight: bold;
      font-size: 1.2rem;
    }

    .blog-card .card-text {
      font-size: 0.95rem;
    }

    .blog-meta {
      font-size: 0.85rem;
      color: gray;
    }

    .blog-icons span {
      margin-right: 10px;
      cursor: pointer;
    }
  </style>
  <!-- </head>
<body> -->

  <div class="container py-4">
    <div class="row g-4">

      <?php
      

      $result = $conn->query("SELECT id, title, description, image_path, blog, meta_description, meta_title, meta_keywords, created FROM blogs");

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '
        <!-- Card -->
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card blog-card shadow-sm position-relative">

                <!-- Image with date overlay -->
                <div class="position-relative">
                    <img src="admin/' . htmlspecialchars($row['image_path']) . '" class="card-img-top" alt="' . htmlspecialchars($row['title']) . '">
                    <div class="position-absolute top-0 end-0 text-white px-2 py-1 m-2 rounded" style="font-size: 0.85rem; background-color:rgb(255, 111, 54);">
    <i class="fa fa-calendar me-1" aria-hidden="true"></i> ' . date('j-M-Y', strtotime($row['created'])) . '
</div>
                </div>

                <!-- Card body -->
                <div class="card-body">
                    <h5 class="card-title">' . htmlspecialchars(substr($row['title'], 0, 40)) . '...</h5>
                    <div class="blog-icons mb-2">
                        <span>👍 +2</span>
                        <span>💬</span>
                        <span>🔗</span>
                    </div>
                    <p class="card-text">' . (substr($row['description'], 0, 100)) . '...</p>
                    <a href="blog-details.php?slug=' . urlencode($row['blog']) . '" class="fw-bold" style="color:rgb(255, 111, 54); text-decoration:none;">
                        Read More <i class="fa fa-arrow-right ms-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>';
        }
      } else {
        echo "<p>No records found.</p>";
      }
      ?>
<style>
       @media only screen and (max-width: 991px) {
    .button_container span, .overlay {
        background: rgb(105 105 105) !important;
    }
  }
  </style>

      <!-- Card 2 -->
     


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- </body>
</html> -->











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
  <script src="js/jquery-3.6.0.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/project-page-extranal.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script src="js/index.js"></script>
</body>

</html>


 <?php
    }
}

$conn->close();
?>

