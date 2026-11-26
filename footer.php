<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alan+Sans:wght@300..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

</head>

<body style=" font-family: 'Nunito', sans-serif !important;
  font-optical-sizing: auto; font-style: normal;">
    <div class="mid-footer">
        <div class="container">

            <div class="footer-menu">
                <h3 style="color:#888;">Noida Projects</h3>
                <ul>


                    <style>
                        .footer-menu h4 {
                            /* border-left: 6px solid rgb(255, 111, 54); */
                        }

                        .social-icons a {
                            /* background-color: rgb(255, 111, 54); */
                        }

                        .footer-menu ul li::before {
                            background-color: rgb(255, 111, 54);
                        }

                        .fix-mobile-strip ul li a {
                            /* background-color: rgb(255, 111, 54); */
                        }
                    </style>
<!-- <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important; -->


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

// ✅ Build query for project listing
$ck_query = "SELECT * FROM ck WHERE propertyType = 'Projects'";
if (!empty($filter_status)) {
    $ck_query .= " AND status1 = '$filter_status'";
}
// $ck_query .= " ORDER BY id DESC LIMIT 6"; 

// Execute query
$all_ck = $conn->query($ck_query);
?>

<!--https://luxuryprojectsinnoida.com/views.php/max-16a-->
<!--https://luxuryprojectsinnoida.com/views.php?slug=max-16a-->

<ul>
<?php
// ✅ Loop through project list
if ($all_ck && $all_ck->num_rows > 0) {
    while ($row = $all_ck->fetch_assoc()) {
        $videoText = !empty($row['video']) ? $row['video'] : 'Untitled';
        echo '<li>
                <a href="views.php/' . urlencode($row['blog']) . '" 
                   title="' . htmlspecialchars($videoText) . '">
                   ' . htmlspecialchars($videoText) . '
                </a>
              </li>';
    }
} else {
    echo '<li>No projects found.</li>';
}
?>
</ul>

                    <!-- <li><a href="ambience-tiverton-sector-50-noida.php" title="Ambience Tiverton">Ambience Tiverton</a></li>
                <li><a href="godrej-golf-links-sector-27-greater-noida.php" title="Godrej Golf Links">Godrej Golf Links</a></li>
                <li><a href="godrej-woods-sector-43-noida.php" title="Godrej Woods">Godrej Woods</a></li>
                <li><a href="gulshan-dynasty-noida-sector-144-noida.php" title="Gulshan Dynasty">Gulshan Dynasty</a></li> -->

                </ul>
            </div>
            <div class="footer-para" style="color:#999 !important; font-family: 'Nunito', sans-serif !important;">
                <p>This is not the official website of developer & property, it belongs to authorised channel partner for information purpose only. All rights for logo & images are reserved to developer. Thank you for visiting our website. This disclaimer ("Disclaimer") is applicable to this website and all microsites and websites owned by us. By using or accessing this website you agree with the Disclaimer without any qualification or limitation. This website is in the process of being updated. By accessing this website, the viewer confirms that the information including brochures and marketing collaterals on this website are solely for informational purposes only and the viewer has not relied on this information for making any booking/purchase in any project of the company. Nothing on this website, constitutes advertising, marketing, booking, selling or an offer for sale, or invitation to purchase a unit in any project by the company. The company is not liable for any consequence of any action taken by the viewer relying on such material/ information on this website.</p>
            </div>
        </div>
    </div>
    <div class="btm-footer">
        <div class="container">
            <div class="social-icons">
               <?php


$result = $conn->query("SELECT * FROM social_links ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
    // Handle Instagram gradient
    if ($row['bg_color'] == "instagram") {
        $bgStyle = "background:linear-gradient(45deg,#f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);";
    } else {
        $bgStyle = "background: {$row['bg_color']};";
    }

    echo "<a href='{$row['link']}' target='_blank' 
             style='{$bgStyle} display:inline-block; padding:10px 10px; color:#fff; text-decoration:none;'>
            <i class='{$row['icon']}' style='color:#fff;'></i>
          </a>";
}
?>

    <!-- <a href="https://www.youtube.com/channel/UC32oCB8ton0YG2t_x6pNfSg" target="_blank" style="background-color: #FF0000;"><i class="fa fa-youtube" style="color: #fff !important;" ></i></a>
    <a href="https://www.instagram.com/" target="_blank" style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
"><i class="fa fa-instagram" style="color: #fff !important;"></i></a> -->
   
</div>

            <div class="copyright" style="color:#999 !important;">
                &copy;
                2015 -
                <span id="copyright">
                    <script>
                        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                    </script>
                </span>
                Copyright . All Rights Reserved.
            </div>

            <style>
                .social-icons {
                    position: fixed;
                    top: 50%;
                    left: 0;
                    transform: translateY(-50%);
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                    z-index: 9999;
                }

                .social-icons a {
                    color: #fff;
                    width: 40px;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-decoration: none;
                    border-radius: 0 5px 5px 0;
                    transition: background-color 0.3s ease;
                    margin-left: 0px;
                }

                .social-icons a:hover {
                    background-color: rgb(18, 97, 243);
                }

                .social-icons i {
                    font-size: 18px;
                }

                /* ✅ Mobile view: remove fixed positioning, show in footer style */
                @media screen and (max-width: 767px) {
                    .social-icons {
                        position: static;
                        /* remove fixed */
                        top: auto;
                        bottom: auto;
                        left: auto;
                        transform: none;
                        flex-direction: row;
                        justify-content: center;
                        /* center in footer */
                        margin: 20px 0;
                        /* spacing from other elements */
                    }

                    .social-icons a {
                        border-radius: 5px;
                        width: 40px;
                        height: 40px;
                    }
                }
            </style>



        </div>
    </div>
    <!-- WhatsApp Floating Button -->
    <!-- <a href="https://api.whatsapp.com/send?phone=+919311660227&text=Hi!%20Im%20Interested%20in%20Your%20Luxury%20Project.%20Please%20Share%20Details."
   class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
    <i class="fa fa-whatsapp" aria-hidden="true"></i>
</a> -->

    <!-- Fixed Bottom Strip for Mobile -->
    <div class="mobile-action-bar">
        <ul class="action-buttons d-flex justify-content-around m-0 p-0">
            <li class="list-unstyled flex-fill text-center">
                <a href="tel:+919911419406" class="btn1 w-100 d-flex align-items-center justify-content-center flex-column" style="text-decoration: none;">
                    <div class="icon-circle" style="margin-top: -20px; background-color:green; color:#fff;">
                        <i class="fa fa-phone" aria-hidden="true" style="font-size:27px;"></i>
                    </div>
                    <!-- Call Now -->
                </a>
            </li>
            <li class="list-unstyled flex-fill text-center">
  <a href="https://api.whatsapp.com/send?phone=+919911419406&text=Hi!%20I'm%20Interested%20in%20Your%20Luxury%20Project.%20Please%20Share%20Details."
     class="btn1 w-100 d-flex align-items-center justify-content-center flex-column" style="text-decoration: none;">
    <div class="icon-circle" style="margin-top: -20px; color: #fff; background-color: #25D366;">
      <i class="fa fa-whatsapp" aria-hidden="true" style="font-size:27px;"></i>
    </div>
   
  </a>
</li>

        </ul>
    </div>

    <style>
        /* Mobile Fixed Bottom Strip */
        .mobile-action-bar {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: <?= htmlspecialchars($profile_row['heading_text_color']) ?>;
            z-index: 1000 ;
            /* padding: 8px 0; */
        }

        .mobile-action-bar a {
            font-weight: 600;
            color: #fff;
            font-size: 14px;
        }

        .icon-circle {
            background-color: #e7e7e7;
            /* color: rgb(255, 111, 54); */
            /* matching your bar */
            border-radius: 50%;
            padding: 10px;
            margin-bottom: 5px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        @media (min-width: 768px) {
            .mobile-action-bar {
                display: none;
            }
        }
    </style>
    
    
<!-- WhatsApp Floating Icon -->
<style>
.whatsapp-float {
  position: fixed;
  bottom: 55px;
  right: 25px;
  z-index: 1000;
  display: none;
  animation: pulse 1.5s infinite;
}
.whatsapp-float img {
  width: 60px;
  height: 60px;
  border-radius: 50%;
}
/*@keyframes pulse {*/
/*  0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37,211,102,0.6); }*/
/*  50% { transform: scale(1.1); box-shadow: 0 0 0 30px rgba(37,211,102,0); }*/
/*  100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37,211,102,0); }*/
/*}*/
@media (min-width: 992px) {
  .whatsapp-float { display: block; }
}
</style>

<a href="https://wa.me/919911419406" target="_blank" class="whatsapp-float">
  <img src="https://img.icons8.com/?size=96&id=QkXeKixybttw&format=gif&color=f7f7f7" alt="WhatsApp">
</a>

<a href="fetch-properties.php" class="btn btn-primary show-all-btn"><b>Hot Deals</b></a>

    <style>
    /* Blinking + Zoom animation */
@keyframes blinkColors {
    0% {
        background-color: #0d6efd;
        transform: scale(1);
    }
    25% {
        background-color: #198754;
        transform: scale(1.05);
    }
    50% {
        background-color: #fd7e14;
        transform: scale(1.1);
    }
    75% {
        background-color: #dc3545;
        transform: scale(1.05);
    }
    100% {
        background-color: #0d6efd;
        transform: scale(1);
    }
}

    .show-all-btn {
    transition: transform 0.3s ease;
}
        .show-all-btn {
            position: fixed;
            /* Stick to viewport */
            bottom: 150px;
            /* Distance from bottom */
            right: 20px;
            /* Distance from right */
            z-index: 9999;
            /* On top of other elements */
            width: 100px;
            /* Circular width */
            height: 60px;
            /* Circular height */
            padding: 0;
            /* Remove default padding */
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            /* border-radius: 50%;      */
            text-decoration: none;
            text-align: center;
            line-height: 60px;
            /* Center text vertically */
            animation: blinkColors 2s infinite;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        /* Blinking color animation */
        @keyframes blinkColors {
            0% {
                background-color: #0d6efd;
            }

            25% {
                background-color: #198754;
            }

            50% {
                background-color: #fd7e14;
            }

            75% {
                background-color: #dc3545;
            }

            100% {
                background-color: #0d6efd;
            }
        }

        /* Hover effect */
        .show-all-btn:hover {
            color: #fff;
            text-decoration: none;
            opacity: 0.9;
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .show-all-btn {
                bottom: 100px;
                right: 15px;
                width: 70px;
                height: 50px;
                line-height: 50px;
                font-size: 12px;
            }
        }
    </style>


</body>

</html>