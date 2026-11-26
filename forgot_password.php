
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
</style>

  <style>
    body {
      /* font-family: 'Segoe UI', sans-serif; */
        font-family: "Nunito", sans-serif;
          display: flex;
      flex-direction: column;
  
    }

html, body {
      height: 100%;
    }
   
    main {
      flex: 1; /* takes available space, pushes footer down */
    }




    .header {
      padding: 15px 30px;
      background: #fff;
    }

    .logo-text {
      font-size: 24px;
      font-weight: bold;
      color: #f5a623;
    }

    .main-section {
      background: linear-gradient(to right, #822bdc, #311d9b);
      color: #fff;
      padding: 60px 0;
    }

    .btn-enquire {
      background-color: #f5a623;
      color: #fff;
      border-radius: 25px;
    }

    .btn-enquire:hover {
      background-color: #d68e1a;
    }

    .form-container {
      background: #fff;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }

    .form-container input {
      border-radius: 8px;
    }

    .forgot {
      text-align: right;
      font-size: 14px;
      color: red;
    }

    .signup a {
      color: #f5a623;
      font-weight: bold;
      text-decoration: none;
    }
  </style>
</head>
<body>
<?php
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

// Fetch email credentials from the database
$sql = "SELECT * FROM email_credentials ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$credentials = $result->fetch_assoc();

$dynamicEmail = $credentials['email'];
$dynamicPassword = $credentials['password'];

// Function to send OTP via email
function sendEmail($to, $otp, $fromEmail, $fromPassword) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $fromEmail;
        $mail->Password = $fromPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($fromEmail, 'Support');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = 'Your Password is Reset';
        $mail->Body = "Your new password is: <b>$otp</b><br>Use it to reset your password.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail error: " . $mail->ErrorInfo);
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username_or_email'])) {
    $username_or_email = mysqli_real_escape_string($conn, $_POST['username_or_email']);

    // Check if user exists
    $check_user = $conn->query("SELECT * FROM user WHERE email = '$username_or_email' OR username = '$username_or_email'");
    if ($check_user && $check_user->num_rows > 0) {
        $user = $check_user->fetch_assoc();
        $email_to_send = $user['email'];
        $existing_password = $user['password']; // Assumes plaintext password

$message = "";
$modalTitle = "Notification";
$modalClass = "text-danger"; // default red

if (sendEmail($email_to_send, $existing_password, $dynamicEmail, $dynamicPassword)) {
    // ✅ Success case
    $message = "✅ Email sent successfully to your registered email address.";
    $modalTitle = "Success";
    $modalClass = "text-success";
} else {
    // ❌ Error cases
    if (isset($_SESSION['login_error'])) {
        $message = "❌ " . $_SESSION['login_error']; // e.g. "Incorrect email or password"
        $modalTitle = "Login Error";
        $modalClass = "text-danger";
        unset($_SESSION['login_error']);
    } else {
        $message = "⚠️ Something went wrong. Please try again.";
        $modalTitle = "Warning";
        $modalClass = "text-warning";
    }
}

// Show modal only if message exists
if (!empty($message)) {
    ?>
    <!-- Notification Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-3 shadow">
          <div class="modal-header border-0">
            <h5 class="modal-title <?php echo $modalClass; ?> fw-bold" id="errorModalLabel">
              ⚠️ <?php echo $modalTitle; ?>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p class="mb-0 text-center <?php echo $modalClass; ?> fw-semibold">
              <?php echo $message; ?>
            </p>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById("errorModal"));
        myModal.show();
      });
    </script>
    <?php


}


}


}


?>
<!-- Header -->
<div class="container-fluid header">
  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="ohm.png" alt="Logo" style="height: 40px; margin-right: 10px;">
      <div class="logo-text">Bizto India</div>
    </div>
    <div class="d-flex flex-column flex-md-row">
  <a href="tel:+919910443978" class="btn btn-enquire mb-2 mb-md-0 me-md-2" style="color:#fff;">
    <i class="fas fa-phone-alt fa-flip-horizontal me-1"></i>

<b>Call Us</b>
  </a>
  <a href="mailto:info@biztoindia.com" class="btn btn-enquire" style="color:#fff;">
    <i class="fas fa-envelope me-1"></i><b>Email Us</b>
  </a>
</div>


  </div>
</div>

<!-- Main Section -->
 <main class="container-fluid main-section d-flex align-items-center justify-content-center">
  <div class="container" style="margin-top:50px;">
   <div class="row align-items-center">
      <!-- Left Content -->
      <div class="col-lg-6 mb-5 mb-lg-0">
        <h1 class="fw-bold mb-4">Forgot Your Password?</h1>
        <p class="mb-4"> Don’t worry! Enter your registered email address and <br>we’ll send you a link to reset your password securely.</p>
        <button class="btn btn-enquire px-4 py-2" data-bs-toggle="modal" data-bs-target="#"><b><i class="fas fa-paper-plane me-2"></i> Enquire Now</b></button>
      </div>
<!-- #enquiryModal -->
      <!-- Right Form -->
        <?php
    // Display login error message
    // if (isset($_SESSION['login_error'])) {
    //     echo "<p style='color:red; text-align:center; font-size: 16px;'>" . $_SESSION['login_error'] . "</p>";

    //     unset($_SESSION['login_error']);
    // }
    ?>
      <div class="col-lg-5 offset-lg-1">
  <div class="form-container">
    <h5 class="text-center mb-4" style="color:#000;">
      <i class="fas fa-unlock-alt me-2" style="color:#f5a623;"></i> 
      Forgot Password
    </h5>
    <form action="" method="POST">
      <div class="mb-3">
        <label style="color: #000;">
          <b><i class="fas fa-envelope" style="color: #f5a623;"></i> Username Or Email Address:</b>
        </label>
        <input type="text" name="username_or_email" class="form-control" placeholder="Enter your username or email" required>
      </div>

      <button type="submit" class="btn btn-enquire w-100 mb-2">
        <b><i class="fas fa-paper-plane me-2"></i> Send Reset Link</b>
      </button>

      <div class="forgot text-center mt-3">
        <a href="index.php" style="color: #000; text-decoration: none;">
          <i class="fas fa-arrow-left me-1"></i> Back to Login
        </a>
      </div>
    </form>
  </div>
</div>




    </div>
  </div>
</main>

<!-- Enquiry Modal -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-3" style="margin-top:150px;">
      <div class="modal-header">
        <h5 class="modal-title" id="enquiryModalLabel">Enquiry Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Your name">
          </div>
          <div class="mb-3">
            <label>Email:</label>
            <input type="email" class="form-control" placeholder="Your email">
          </div>
          <div class="mb-3">
            <label>Message:</label>
            <textarea class="form-control" placeholder="Your message"></textarea>
          </div>
          <button class="btn btn-enquire w-100"><i class="fas fa-paper-plane me-2"></i> Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
 <footer class="bg-light py-2" style="margin-bottom:0px !important;">
    <p class="text-muted text-center mb-0">
      © 2025 BiztoIndia. All Rights Reserved.
    </p>
  </footer>
<!-- Bootstrap JS (required for modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>













