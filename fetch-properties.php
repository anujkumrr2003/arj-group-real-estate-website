<?php include 'header.php'; ?>


<?php
include "config.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="cyGOIF_e9x2CwEuaQwEG6vw7uhfI9J3mPOvro252dQc" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="author" content="ARJ ">
    <meta name="publisher" content="ARJ Realty">
    <meta name="robots" content="index, follow">
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

    <title>Hot Leads | ARJ Group </title>
    <meta name="description" content="ultra-luxury residential project in Noida, offering premium apartments with world-class amenities.">
    <meta name="keywords" content="luxury real estate Noida, luxury homes Noida, luxury apartments Noida, premium properties Noida, real estate company Noida, buy property in Noida, luxury villas Noida, ready to move flats Noida, investment properties Noida, high-end apartments Noida, luxury projects Noida, residential projects Noida">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="blog.php" />
    <link rel="alternate" hreflang="en-us" href="blog.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/footer.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* SECTION */
        .feature-project {
            padding: 60px 0;
            background: #f8f9fa;
        }

        /* TITLE */
        .feature-project .title h3 {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .feature-project .title p {
            text-align: center;
            color: #555;
            font-size: 15px;
            margin-bottom: 40px;
        }

        /* CARD */
        .feature-project-item {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-project-item:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.12);
        }

        /* IMAGE */
        .feature-project-image {
            position: relative;
            overflow: hidden;
        }

        .feature-project-image img {
            transition: transform 0.4s ease;
        }

        .feature-project-item:hover img {
            transform: scale(1.08);
        }

        /* STATUS BADGE */
        .feature-project-image span {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 13px;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* CONTENT */
        .feature-project-cnt {
            padding: 18px 18px 22px;
        }

        .feature-project-cnt h4 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .feature-project-cnt p {
            font-size: 14px;
            color: #666;
            margin-bottom: 12px;
        }

        /* LIST */
        .feature-project-cnt ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-project-cnt ul li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            font-size: 14px;
        }

        .feature-project-cnt ul li:first-child {
            color: #444;
        }

        .feature-project-cnt ul li:last-child {
            font-size: 16px;
        }

        /* BUTTON */
        .feature-project-cnt .btn {
            padding: 6px 14px;
            font-size: 14px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .feature-project-cnt .btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        /* VIEW ALL BUTTON */
        .view-all-project-btn {
            text-align: center;
            margin-top: 40px;
        }

        .view-all-project-btn .btn {
            padding: 10px 28px;
            font-size: 16px;
            border-radius: 30px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .feature-project-image img {
                height: 240px !important;
            }

            .feature-project-cnt h4 {
                font-size: 17px;
            }
        }
    </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>
    <style>
        .feature-project-cnt ul li {
            border-top: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
        }
    </style>

    <section class="feature-project">
        <div class="title">
            <div class="container" style="max-width: 550px;"><br>
                <!--<h3 style="background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>; color:<?= htmlspecialchars($profile_row['background_color']) ?>; padding: 10px; font-family: 'Jazz LET'; border-left: 4px solid #000; border-right: 4px solid #000;">Trending Projects</h3>-->
                <!--<p>Check out some of our listed properties</p>-->
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
                        $result = $conn->query("SELECT * FROM hot_deals WHERE blog = '$slug'");
                        $single_ck = $result->fetch_assoc();
                    }

                    // Status filter
                    $filter_status = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

                    // Build query
                    // $ck_query = "SELECT * FROM hot_deals ";
                    // if (!empty($filter_status)) {
                    //     $ck_query .= " AND status1 = '$filter_status'";
                    // }
                    // $ck_query .= " ORDER BY id DESC";
                    $ck_query = "SELECT * FROM hot_deals WHERE 1 ";
                    if (!empty($filter_status)) {
                        $ck_query .= " AND status1 = '$filter_status'";
                    }
                    $ck_query .= " ORDER BY id DESC";

                    // Build query


                    // Execute query
                    $all_ck = $conn->query($ck_query);
                    ?>



                    <div class="row g-4">
                        <?php
                        if ($all_ck && $all_ck->num_rows > 0) {
                            while ($row = $all_ck->fetch_assoc()) {
                        ?>
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="feature-project-item">
                                        <div class="feature-project-image">
                                            <a href="hot-deals.php?slug=<?= urlencode($row['blog']) ?>">
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
                                            <a href="hot-deals.php?slug=<?= urlencode($row['blog']) ?>" style="text-decoration:none;">
                                                <h4 style="color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                                                    <?= htmlspecialchars($row['video']) ?>
                                                </h4>
                                                <p><?= htmlspecialchars($row['location']) ?></p>
                                            </a>
                                            <ul>
                                                <li>
                                                    <span>Area: <?= htmlspecialchars($row['configration']) ?></span>
                                                    <span>Size: <?= htmlspecialchars($row['size']) ?></span>
                                                </li>
                                                <li>
                                                    <span><b>₹ <?= htmlspecialchars($row['price']) ?: 'On Request' ?></b></span>
                                                    <span>
                                                        <a class="btn" href="hot-deals.php?slug=<?= urlencode($row['blog']) ?>"
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
                            echo '<p>No projects found.</p>';
                        }
                        ?>
                    </div>




                </div>
            </div>
        </div>
    </section>
    <br>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/project-page-extranal.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="js/index.js"></script>
<?php include 'footer.php'; ?>


</html>