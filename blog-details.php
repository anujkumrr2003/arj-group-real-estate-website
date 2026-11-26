





<?php
include "config.php";
error_reporting(0);

   $profile_sql = "SELECT * FROM profile";
$profile_result = $conn->query($profile_sql);

if ($profile_result && $profile_result->num_rows > 0) {
    while ($profile_row = $profile_result->fetch_assoc()) {
            
            ?>








<?php error_reporting(0); ?>

<?php
// Include database connection


// Check if the blog slug is set
if (isset($_GET['slug'])) {
    $blogSlug = $_GET['slug']; // Get the slug from URL

    // Query to fetch the full blog details using the slug
    $query = "SELECT title, description, image_path, blog, meta_description, meta_title, meta_keywords, created FROM blogs WHERE blog = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $blogSlug); // Bind the blog slug as a string
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if blog exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = htmlspecialchars($row['title']);
            $description = $row['description']; // Already sanitized in DB
            $imagePath = htmlspecialchars($row['image_path']);
            $metaDescription = htmlspecialchars($row['meta_description']);
            $metaTitle = htmlspecialchars($row['meta_title']);
            $metaKeywords = htmlspecialchars($row['meta_keywords']);
            $created = htmlspecialchars($row['created']);
        } else {
            echo "<p>Blog post not found.</p>";
            exit;
        }
    } else {
        echo "<p>Error executing the query.</p>";
        exit;
    }
} else {
    echo "<p>No blog slug specified.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8">
  
  <meta name="google-site-verification" content="1GE-eh3i3CFWbRH7t6juE61aZ6S2b0KSW31ovUlngQo">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<meta name="google-site-verification" content="cyGOIF_e9x2CwEuaQwEG6vw7uhfI9J3mPOvro252dQc" />-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="author" content="ARJ GROUP">
    <meta name="publisher" content="ARJ GROUP">
    <meta name="robots" content="index, follow">
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


 <?php error_reporting(0); ?>
<title><?= $metaTitle ?></title>
    <meta name="description" content="<?= $metaDescription ?>">
    <meta name="keywords" content="<?= $metaKeywords ?>">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://arjgroup.in/blog-details.php?slug=<?= urlencode($blogSlug) ?>" />


    <!-- Open Graph (Facebook, LinkedIn, etc.) -->
    <meta property="og:title" content="<?= $metaTitle ?>">
    <meta property="og:description" content="<?= $metaDescription ?>">
    <meta property="og:image" content="https://arjgroup.in/admin/<?= $imagePath ?>">
    <meta property="og:url" content="https://arjgroup.in/?slug=<?= htmlspecialchars($row['blog']) ?>">
    <meta property="og:type" content="article">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $metaTitle ?>">
    <meta name="twitter:description" content="<?= $metaDescription ?>">
    <meta name="twitter:image" content="https://arjgroup.in/admin/<?= $imagePath ?>">
    <meta name="twitter:url" content="https://arjgroup.in?slug=<?= htmlspecialchars($row['blog']) ?>">
    
  
  <!--<link rel="canonical" href="https://luxuryprojectsinnoida.com/Blog-details.php" />-->
  <link rel="alternate" hreflang="en-us" href="blog-details.php" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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

<body style="background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
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

<section class="banner" style="
    background-image: url('admin/<?php echo $imagePath; ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    height: 300px;  /* Adjust height as needed */
">
    <!-- <h1>Blogs / News</h1> -->
  </section>
  <style>
.banner {
    position: relative;
    width: 100%;
    height: 300px; /* You can use media queries to make height responsive */
}

.banner::before {
    content: none; /* Completely removes any pseudo-element overlay */
}

/* Responsive height on smaller devices */
@media (max-width: 768px) {
    .banner {
        height: 200px;
    }
}

@media (max-width: 480px) {
    .banner {
        height: 150px;
    }
}
</style>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .blog-header img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border-radius: 10px;
    }
    .blog-meta {
      font-size: 0.9rem;
      color: #6c757d;
      margin-bottom: 10px;
    }
    .blog-title {
      font-weight: 700;
      font-size: 2rem;
    }
    .blog-content {
      font-size: 1.05rem;
      line-height: 1.8;
    }
    .social-icons span {
      font-size: 1.2rem;
      margin-right: 15px;
      cursor: pointer;
    }
    @media (max-width: 576px) {
      .blog-title {
        font-size: 1.5rem;
      }
    }

    .banner::before{
      background-color: none !important;
    }
  </style>
</head>
<body>

<div class="container py-4">
  <!-- Blog Header -->
  <!-- <div class="blog-header mb-4">
    <img src="images/about-us.webp" alt="Blog Image">
  </div> -->

  <!-- Blog Meta -->
  <div class="blog-meta">
  <span style="color:rgb(255, 111, 54);"><b>Published on:&nbsp;</b></span>
  <?= date('j-M-Y', strtotime($created)) ?>
</div>

  <!-- Blog Title -->
  <h1 class="blog-title mb-3" style="color:rgb(255, 111, 54);"><?= $title ?></h1>

  <!-- Social/Action Icons -->
  <!-- <div class="social-icons mb-4">
    <span>👍 Like</span>
    <span>💬 Comment</span>
    <span>🔗 Share</span>
  </div> -->

  <!-- Blog Content -->
  <div class="blog-content mb-5">
    <p><?= $description ?></p>

    <style>
       @media only screen and (max-width: 991px) {
    .button_container span, .overlay {
        background: rgb(105 105 105) !important;
    }
  }
  </style>

    <!-- <ul>
      <li><strong>January 2024:</strong> 15th, 21st, 28th</li>
      <li><strong>February 2024:</strong> 10th, 18th, 26th</li>
      <li><strong>March 2024:</strong> 3rd, 17th, 24th</li>
    </ul> -->

    <!-- <p>Each date has been carefully selected based on Panchang and astrological factors to ensure a successful and peaceful entry into your new home. It’s also important to consult a local priest or astrologer for personalized advice based on your nakshatra and horoscope.</p>

    <p>Don't forget to perform the traditional rituals such as Kalash Pooja, Vastu Pooja, and Havan on the Griha Pravesh day to eliminate negative energies and invite positive vibrations.</p> -->
  </div>

  <!-- Read More / CTA -->
  <!-- <div class="mb-5">
    <a href="index.php" class="btn btn-primary">← Back to All Blogs</a>
  </div> -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





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

