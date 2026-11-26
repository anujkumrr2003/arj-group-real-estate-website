<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Navbar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* Top bar */
    .top-bar {
      background: #00013fff;
      color: white;
      font-size: 14px;
      padding: 5px 0;
    }

    .top-bar a {
      color: white;
      text-decoration: none;
      margin: 0 5px;
    }

    /* Navbar */
    .main-navbar {
      padding: 10px 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .navbar-nav .nav-link {
      color: #00013fff;
      font-weight: 600;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .dropdown:hover .nav-link {
      color: #ff5e00;
    }

    .quick-inquiry {
      background-color: #fba70cff;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 20px;
      padding: 6px 16px;

    }

    /* Slide Menu */
    .slide-menu {
      position: fixed;
      top: 0;
      right: -250px;
      width: 250px;
      height: 100%;
      background: #00013fff;
      color: white;
      padding: 20px;
      transition: right 0.3s ease-in-out;
      z-index: 9999;
    }

    .slide-menu.active {
      right: 0;
    }

    .slide-menu a {
      display: block;
      color: white;
      text-decoration: none;
      margin: 15px 0;
    }

    .menu-toggle {
      background: none;
      border: none;
      font-size: 24px;
      color: #00013fff;
    }

    @media (max-width: 992px) {
      .quick-inquiry1 {
        margin-top: 10px;
      }
    }

    .menu-toggle {
      background: none;
      border: none;
      font-size: 28px;
      color: #00013fff;
      cursor: pointer;
    }

    /* Remove this from your CSS: Don't hide hamburger in large screens */
    @media (max-width: 992px) {
      .quick-inquiry1 {
        margin-top: 10px;
      }
    }

    /* Smooth dropdown */
    .dropdown-menu {
      top: 100%;
      left: 0;
      min-width: 200px;
      padding: 0.5rem 0;
      border-radius: 6px;
      animation: fadeIn 0.2s ease-in-out;
      transform: translateY(5px);
    }

    /* Animation */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Highlight active dropdown toggle */
    .navbar-nav .dropdown-toggle.show {
      color: #ff5e00 !important;
    }
  </style>

</head>

<body>
  <style>
    .tca-logo {
      width: 100px;
      max-width: 70%;
      height: auto;
      object-fit: contain;
    }

    .top-bar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1050;
      /* background-color:; */
      /* background-color: rgba(145, 58, 251, 1); */
      /* padding: 8px 15px; */
      /* box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); */
    }

    .main-navbar-sticky {
      position: fixed;
      top: 35px;
      left: 0;
      width: 100%;
      z-index: 1040;
      background-color: #ffffff;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 767.98px) {
      .main-navbar-sticky {
        top: 7%;
      }


    }


    /* Adjust page content to not go behind the sticky header */
    body {
      padding-top: 110px;
    }

    /* @media (max-width: 767px) {
    .slide {
        display: none !important;
    }
} */
  </style>

  <!-- Top Bar -->
  <div class="top-bar text-center text-lg-start px-3 d-flex justify-content-between align-items-center">

    <!-- Left: Marquee -->
    <div class="slide" style="flex: 1; overflow: hidden; max-width: 50%; padding: 5px 0;">
      <style>
        .marquee-container {
          width: 100%;
          overflow: hidden;
          background: transparent;
          white-space: nowrap;
        }

        .marquee-text {
          display: inline-block;
          padding-left: 100%;
          animation: marquee 15s linear infinite;
          /* font-size: 1.2rem; */
          font-weight: bold;
          text-transform: uppercase;
          color: #fff;
        }

        @keyframes marquee {
          0% {
            transform: translateX(0);
          }

          100% {
            transform: translateX(-100%);
          }
        }
      </style>

      <div class="marquee-container">
        <span class="marquee-text">
          We offer a complete ecosystem for SAP – from training and skill development to consulting and workforce augmentation.
        </span>
      </div>

    </div>

    <!-- Right: Contact Info -->

    <div class="contact-info d-flex flex-column flex-sm-row align-items-sm-center text-nowrap gap-2 gap-sm-3">
      <a href="mailto:hr@zeopto.com" class="text-decoration-none">
        <i class="bi bi-envelope"></i> hr@zeopto.com
      </a>
      <span class="d-none d-sm-inline">|</span>
      <a href="tel:+919953280036" class="text-decoration-none">
        <i class="bi bi-telephone"></i> +91-9953280036
      </a>
    </div>

  </div>



  <nav class="navbar navbar-expand-lg navbar-light bg-white main-navbar-sticky shadow-sm">
    <div class="container">

      <!-- Logo -->
      <a class="navbar-brand" href="https://zeopto.com">
        <img src="images/Zeopto-Logo.png" alt="Please wait..." class="tca-logo" />
      </a>

      <!-- Mobile Toggle -->
      <!-- Show only on mobile/tablet -->
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
        aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <!-- Menu -->
      <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">
        <ul class="navbar-nav align-items-lg-center gap-lg-4">

          <li class="nav-item">
            <a class="nav-link" href="https://zeopto.com">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>

          <!-- Our Services Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Our Services
            </a>
            <ul class="dropdown-menu shadow-sm border-0 mt-2" aria-labelledby="servicesDropdown" style="margin-top: -20px !important; ">

              <!-- SAP Training Submenu -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="sap-training.php">SAP Training</a>
                <ul class="dropdown-menu" style="margin-top:20px;">
                  <li><a class="dropdown-item" href="individual.php">Individual Training</a></li>
                  <li><a class="dropdown-item" href="Corporate.php">Corporate Training</a></li>
                  <li><a class="dropdown-item" href="Institutional.php">Institutional Training</a></li>
                </ul>
              </li>


              <li><a class="dropdown-item" href="sap-consulting.php">SAP Consulting</a></li>
              <li><a class="dropdown-item" href="staff-augmentations.php">Staff Augmentations</a></li>
            </ul>
          </li>

<li class="nav-item">
            <a class="nav-link" href="career.php">Career</a>
          </li>

<li class="nav-item">
            <a class="nav-link" href="blog.php">Insights</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>

          <li class="nav-item">
            <a href="#inquiryModal" 
   class="btn quick-inquiry" 
   style="color:#fff; background-color:#fba70cff !important;" 
   data-bs-toggle="modal" 
   data-bs-target="#inquiryModal"
   role="button"
   aria-label="Open Quick Inquiry Form">
   Quick Inquiry
</a>

          </li>

        </ul>
      </div>

    </div>
  </nav>

  <!-- Styles -->
  <style>
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const desktopBreakpoint = 992;

      // Only apply hover to normal dropdowns on desktop
      document.querySelectorAll('.nav-item.dropdown').forEach(function(dropdown) {
        dropdown.addEventListener('mouseenter', function() {
          if (window.innerWidth >= desktopBreakpoint) {
            this.querySelector('.dropdown-menu').classList.add('show');
          }
        });
        dropdown.addEventListener('mouseleave', function() {
          if (window.innerWidth >= desktopBreakpoint) {
            this.querySelector('.dropdown-menu').classList.remove('show');
          }
        });
      });

      // Always click-to-toggle for SAP Training submenu
      document.querySelectorAll('.dropdown-submenu > a').forEach(function(link) {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          let submenu = this.nextElementSibling;

          // Toggle clicked submenu
          submenu.classList.toggle('show');

          // Close other open submenus
          this.closest('.dropdown-menu').querySelectorAll('.dropdown-menu').forEach(function(menu) {
            if (menu !== submenu) {
              menu.classList.remove('show');
            }
          });
        });
      });
    });
  </script>

<!--hsllkczdxnazbqmj-->



  <div class="modal fade" id="inquiryModal" tabindex="-1" aria-labelledby="inquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content position-relative">

        <!-- Close Button -->
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1055;"></button>

        <div class="modal-body p-0">
          <div class="row g-0">
            <!-- Left Image -->
            <div class="col-md-6 d-none d-md-block">
              <img src="images/about-service.jpg" alt="Inquiry" class="img-fluid h-100 w-100" style="object-fit: cover;">
            </div>

            <!-- Right Form -->
            <div class="col-md-6 p-4">
              <h4 class="mb-4 text-center">Quick Inquiry</h4>
            <?php include 'demo.php'; ?>


            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <style>
    /* Ensure the modal content is scrollable on smaller devices */
    @media (max-width: 767.98px) {
      #inquiryModal .modal-dialog {
        margin: 1rem;
      }
    }
  </style>


  <!-- Slide Menu -->
  <!-- <div id="slideMenu" class="slide-menu">

        <a href="#" onclick="toggleMenu()">X</a>
        <hr>
        <a href="index.php">Home</a>
        <a href="about.php">About Us</a>
        <a href="gallery.php">Gallery</a>
        <a href="sap-training.php">SAP Training</a>
        <a href="sap-consulting.php">Consulting</a>
        <a href="faq.php">FAQ</a>
        <a href="contact.php">Contact</a>

    </div> -->

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function toggleMenu() {
      document.getElementById("slideMenu").classList.toggle("active");
    }
  </script>
</body>

</html>