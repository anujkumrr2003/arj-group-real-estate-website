<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <title>Best Luxury Projects In India | Luxury Residential Projects In India</title>
    <meta name="description" content="Best Luxury Projects In India - Here you can explore old & new luxury projects, upcoming luxury projects, super & under construction luxury projects & more.">
    <meta name="keywords" content=" ">
    <link rel="icon" href="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" />
    <!-- <meta name="ROBOTS" CONTENT="noindex, follow"> -->
    <meta name="geo.region" content="IN" />
    <meta name="allow-search" content="yes" />
    <meta name="revisit-after" content="daily" />
    <meta name="distribution" content="global" />
    <meta name="expires" content="never" />
    <link rel="canonical" href="locations" />
    <link rel="alternate" hreflang="en-us" href="locations" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="./css/location.css">
    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-58GDN3V');</script> -->
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-58GDN3V"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php include 'header.php'; ?>

   <section class="project-list">
        <div class="container-fluid">
            <div class="inner-project">
                <div class="inner-project-list">




                    <?php
                    include 'config.php';

                    // ✅ Handle deletion if ?delete_step2 is passed
                    if (isset($_GET['delete_step2'])) {
                        $delete_id = intval($_GET['delete_step2']);
                        $conn->query("DELETE FROM ck WHERE id = $delete_id");
                        header("Location: detail.php");
                        exit();
                    }

                    // ✅ Fetch single property by ID (for viewing or editing)
                    $single_ck = null;
                    if (isset($_GET['id'])) {
                        $ck_id = intval($_GET['id']);
                        $result = $conn->query("SELECT * FROM ck WHERE id = $ck_id");
                        $single_ck = $result->fetch_assoc();
                    }

                    // ✅ Fetch all properties where propertyType is 'Projects'
                    $all_ck = $conn->query("SELECT * FROM ck WHERE propertyType = 'Developers' ORDER BY id DESC");
                    ?>

                    <!-- ✅ Display All CK Properties -->
                    <?php
                    if ($all_ck && $all_ck->num_rows > 0) {
                        while ($ck = $all_ck->fetch_assoc()) {
                            echo '
        <div class="project-list-item"> 
            <a href="views.php?id=' . intval($ck['id']) . '" class="project-link"> 
                <div class="proj_list" style="
                    background-image: url(admin/uploads/' . htmlspecialchars($ck['main_image']) . ');
                    background-size: cover;
                    background-position: center;
                    border: 1px solid rgb(255, 111, 54);
                    padding: 20px;
                    color: #fff;
                ">
                    <h2 style="color: rgb(255, 111, 54); font-weight:bold;">' . htmlspecialchars($ck['video']) . '</h2>
                    <p>' . htmlspecialchars($ck['locality']) . '</p>
                    <h4>' . htmlspecialchars($ck['size']) . ' Sq. Ft.<br>' . htmlspecialchars($ck['configration']) . ' @ ' . htmlspecialchars($ck['price']) . '</h4>
                </div>
            </a>   
        </div>';
                        }
                    } else {
                        echo '<p class="text-center text-white">No records found.</p>';
                    }

                    $conn->close();
                    ?>


                    <!-- <div class="project-list-item"> 
                    <a href="godrej-golf-links-sector-27-greater-noida.php" class="project-link" > 
                        <div class="proj_list" style="background-image:url(images/godrej-golf-links.webp); border:1px solid rgb(255, 111, 54) !important;">
                            <h2 style="color: rgb(255, 111, 54) ;">Godrej Golf Links</h2>
                            <p>Sector 27, Greater Noida</p>
                            <h4>180 - 1000 Sq. Yd. <br/> 4 & 5 BHK 3.90 Cr*</h4>
                        </div>
                    </a>   
                </div> -->
                    <!-- <div class="project-list-item"> 
                    <a href="godrej-woods-sector-43-noida.php" class="project-link" > 
                        <div class="proj_list" style="background-image:url(images/godrej-woods.webp); border:1px solid rgb(255, 111, 54) !important;">
                            <h2 style="color: rgb(255, 111, 54) ;">Godrej Woods</h2>
                            <p>Sector 43, Noida</p>
                            <h4>2750 - 3750 Sq. Ft.<br/> 3, 4 & 5 BHK @ 2.5 Cr*</h4>
                        </div>
                    </a>   
                </div> -->
                    <!-- <div class="project-list-item"> 
                    <a href="gulshan-dynasty-noida-sector-144-noida.php" class="project-link" > 
                        <div class="proj_list" style="background-image:url(images/gulshan-dynasty.webp); border:1px solid rgb(255, 111, 54) !important;">
                            <h2 style="color: rgb(255, 111, 54) ;">Gulshan Dynasty</h2>
                            <p>Sector 144, Noida</p>
                            <h4>4700 Sq. Ft.<br/> 4 BHK @ 8.50 Cr*</h4>
                        </div>
                    </a>   
                </div> -->

<style>
       @media only screen and (max-width: 991px) {
    .button_container span, .overlay {
        background: rgb(105 105 105) !important;
    }
  </style>

                </div>
            </div>
        </div>

    </section>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/project-page-extranal.js"></script>
    <script src="js/index.js"></script>
</body>

</html>