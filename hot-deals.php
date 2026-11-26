<?php
include "config.php";
error_reporting(E_ALL);

if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    die("Invalid Request");
}
$slug = $_GET['slug'];

$stmt = $conn->prepare("SELECT * FROM hot_deals WHERE blog=?");
$stmt->bind_param("s", $slug);
$stmt->execute();
$data = $stmt->get_result();
if ($data->num_rows === 0) {
    die("Record Not Found");
}
$row = $data->fetch_assoc();

$meta_title = htmlspecialchars($row['meta_title'] ?: $row['video']);
$meta_desc  = htmlspecialchars($row['meta_description'] ?: substr(strip_tags($row['content']), 0, 160));
$canonical  = "https://arjgroup.in/hot.php?slug=" . urlencode($slug);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $meta_title ?> | Luxury Projects Noida</title>
    <meta name="description" content="<?= $meta_desc ?>">
    <link rel="canonical" href="<?= $canonical ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="https://arjgroup.in/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://arjgroup.in/css/header.css">
    <link rel="stylesheet" href="https://arjgroup.in/css/contact.css">
    <link rel="stylesheet" href="https://arjgroup.in/css/footer.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"> -->

    <style>
        /* ===== GENERAL ===== */
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 15px;
        }

        .box {
            background: #fff;
            padding: 25px;
            margin-top: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        h2 {
            margin-bottom: 20px;
        }

        .flex {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .flex img {
            max-width: 380px;
            width: 100%;
            border-radius: 12px;
        }

        /* ===== HERO ===== */
        .hero {
            position: relative;
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            margin-top: 20px;
        }

        .hero img {
            width: 100%;
            height: 480px;
            object-fit: cover;
        }

        .hero-details {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.75) 100%);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
            color: #f3f3f3ff;
            padding: 18px 24px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            box-sizing: border-box;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
            font-family: Arial, sans-serif;
        }

        .hero-details div {
            flex: 1;
            min-width: 140px;
        }

        .hero-details .label {
            font-size: 12px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            color: #3c3c3cff;
        }

        .hero-details .value {
            font-size: 16px;
            font-weight: 600;
            color: #ffc107;
        }

        /* ===== HEADER ===== */
        .site-header {
            width: 100%;
            position: relative;
            background: #fff;
            z-index: 9999;
        }

        .site-header .header-inner {
            max-width: 1400px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .project-logo img {
            max-height: 60px;
        }

        .menu .button_container {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 18px;
            width: 25px;
        }

        .menu .button_container span {
            display: block;
            height: 3px;
            background: #000;
            border-radius: 2px;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            transform: translateY(-100%);
            transition: transform 0.3s ease;
            z-index: 999;
        }

        .overlay.open {
            transform: translateY(0);
        }

        .overlay-menu {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .overlay-menu ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        .overlay-menu ul li {
            margin: 20px 0;
        }

        .overlay-menu ul li a {
            color: #fff;
            font-size: 24px;
            text-decoration: none;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero img {
                height: 260px;
            }

            .hero-details div {
                min-width: 100%;
            }

            .flex {
                flex-direction: column;
            }
        }




        .site-header {
            z-index: 9999;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #000;
        }

        .navbar-nav .nav-link:hover {
            color: #198754;
        }


        .hero-details .label {
            color: #fff;
            font-size: large;
        }






        /* MOBILE ONLY: move details below image */
        @media (max-width: 768px) {

            .hero {
                overflow: visible;

            }

            .hero-img {
                height: 260px;
                border-radius: 16px 16px 0 0;
                /* margin-top: 50px; */
            }

            .hero-details {
                position: static;
                background: #ffffff;
                color: #000;
                padding: 18px 15px;
                border-radius: 0 0 16px 16px;
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
                margin-top: -4px;
            }

            .hero-details .label {
                color: #f1803fff;
                font-size: 11px;
            }

            .hero-details .value {
                color: #000;
                font-size: 15px;
                font-weight: 600;
            }
        }

        .flex {
            display: flex;
            gap: 25px;
            align-items: flex-start;
        }

        .flex>div {
            flex: 1;
        }

        .flex img {
            width: 380px;
            max-width: 100%;
            border-radius: 12px;
        }

        /* Mobile */
        @media (max-width:768px) {
            .flex {
                flex-direction: column;
            }

            .flex img {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <!-- HEADER -->
    <header class="site-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
            <div class="container-fluid px-4">

                <?php
                include 'functions.php';
                $logoPath = getSiteLogo($conn);
                ?>
                <a class="navbar-brand" href="https://arjgroup.in/">
                    <img src="admin/<?= htmlspecialchars($logoPath) ?>" alt="Luxury Projects Noida" style="max-height:60px;">
                </a>

                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
                    <ul class="navbar-nav gap-lg-4 text-center">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#highlights">Highlights</a></li>
                        <li class="nav-item"><a class="nav-link" href="#amenities">Amenities</a></li>
                        <li class="nav-item"><a class="nav-link" href="#floor_plan">Floor Plan</a></li>
                        <li class="nav-item">
                            <a class="btn btn-success text-white px-1" href="tel:+919911419406" style="font-size:15px; margin-top: 0px;">
                                Call Now
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>





    <script src="https://arjgroup.in/js/jquery-3.6.0.js"></script>


    <!-- PAGE CONTENT -->
    <div class="container">

        <!-- HERO -->
        <div class="hero position-relative mt-4" style="
        margin-top: 70px !important;">
            <img src="admin/uploads/<?= htmlspecialchars($row['main_image']) ?>" alt="<?= $meta_title ?>" class="img-fluid w-100 hero-img">
            <div class="hero-details">
                <div>
                    <div class="label">Price</div>

                    <div class="value">₹ <?= $row['price'] ?: 'On Request' ?></div>
                </div>
                <div>
                    <div class="label">Size</div>
                    <div class="value"><?= $row['size'] ?></div>
                </div>
                <div>
                    <div class="label">Configuration</div>
                    <div class="value"><?= $row['configration'] ?></div>
                </div>
                <div>
                    <div class="label">RERA</div>
                    <div class="value" style="color:#20c997;"><?= $row['rera'] ?></div>
                </div>
                <!-- <div>
                    <div class="label">Developer</div>
                    <div class="value"><?= $row['deve'] ?></div>
                </div> -->
            </div>
        </div>

        <!-- ABOUT -->
        <div class="box" id="about">
            <h2 style="
    color:#111;
    font-weight:700;
    font-size:28px;
    line-height:1.3;
    margin-bottom:15px;
">
    <?= htmlspecialchars_decode($row['video']) ?>
    <span style="color:#6c757d; font-weight:500;">, <?= htmlspecialchars_decode($row['location']) ?></span>
    <span style="color:#198754; font-weight:600;">, <?= htmlspecialchars_decode($row['status1']) ?></span>
</h2>

            <h5>
                About Property
            </h5>
            <div class="flex" style="display:flex; gap:25px; align-items:flex-start; flex-wrap:wrap;">

                <div style="flex:1; min-width:300px;">
                    <?= htmlspecialchars_decode($row['content']) ?>
                </div>

                <?php if ($row['about_img']) { ?>
                    <img src="admin/uploads/<?= htmlspecialchars($row['about_img']) ?>"
                        alt="About Image"
                        style="width:380px; max-width:100%; border-radius:12px;">
                <?php } ?>

            </div>

        </div>

        <!-- HIGHLIGHTS -->
        <?php if ($row['highlights'] || $row['img_highlights']) { ?>
            <div class="box" id="highlights">
                <h2>Highlights</h2>
                <div class="flex">
                    <div><?= htmlspecialchars_decode($row['highlights']) ?></div>
                    <?php if ($row['img_highlights']) { ?>
                        <img src="admin/uploads/<?= htmlspecialchars($row['img_highlights']) ?>" alt="Highlights Image">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <!-- AMENITIES -->
        <?php if ($row['amenities'] || $row['img_amenities']) { ?>
            <div class="box" id="amenities">
                <h2>Amenities</h2>
                <div class="flex">
                    <div><?= htmlspecialchars_decode($row['amenities']) ?></div>
                    <?php if ($row['img_amenities']) { ?>
                        <img src="admin/uploads/<?= htmlspecialchars($row['img_amenities']) ?>" alt="Amenities Image">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <!-- FLOOR PLAN -->
        <?php if ($row['floor_plan'] || $row['img_floor_plan']) { ?>
            <div class="box" id="floor_plan">
                <h2>Floor Plan</h2>
                <div class="flex">
                    <div><?= htmlspecialchars_decode($row['floor_plan']) ?></div>
                    <?php if ($row['img_floor_plan']) { ?>
                        <img src="admin/uploads/<?= htmlspecialchars($row['img_floor_plan']) ?>" alt="Floor Plan Image">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>





         <!-- FLOOR PLAN -->
        <?php if ($row['status']) { ?>
            <div class="box" id="status">
                <h2>About Developer</h2>
                <div class="flex">
                    <div><?= htmlspecialchars_decode($row['status']) ?></div>
                    
                </div>
            </div>
        <?php } ?>

    </div>

    <?php include 'footer.php'; ?>

    <!-- JS -->
    <script src="https://arjgroup.in/js/jquery-3.6.0.js"></script>
    <script src="https://arjgroup.in/js/bootstrap.min.js"></script>
    <script src="https://arjgroup.in/js/project-page-extranal.js"></script>
    <script src="https://arjgroup.in/js/index.js"></script>



</body>

</html>