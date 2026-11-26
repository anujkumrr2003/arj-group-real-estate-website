<?php
session_start();
include 'config.php'; // Make sure this connects to your DB

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

// --- Enable errors for debugging ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// --- Handle Form Submission ---
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {

    // --- Google reCAPTCHA ---
    $secretKey = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe"; // Replace with your site secret key
    $responseKey = $_POST['g-recaptcha-response'] ?? '';
    $userIP = $_SERVER['REMOTE_ADDR'];

    if (!$responseKey) die("⚠️ Please complete the CAPTCHA.");

    // Use cURL for reCAPTCHA verification
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'secret' => $secretKey,
        'response' => $responseKey,
        'remoteip' => $userIP
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $verify = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($verify);
    if (!$response->success) die("⚠️ reCAPTCHA verification failed. Please try again.");

    date_default_timezone_set("Asia/Kolkata");

    // --- Sanitize & Validate Inputs ---
    $errors = [];
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $mobile  = trim($_POST['mobile'] ?? '');
    $service = trim($_POST['service'] ?? '');
    $message = htmlspecialchars(strip_tags($_POST['message'] ?? ''));
    $time    = date("Y-m-d H:i:s");

    if (!preg_match("/^[a-zA-Z0-9\s\.\-&'(),]{2,100}$/", $name)) $errors[] = "Invalid name/company name.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (!preg_match("/^\+?[0-9]{7,15}$/", $mobile)) $errors[] = "Invalid mobile number.";
    $allowedServices = ["SAP Training", "SAP Consulting", "Staff Augmentations"];
    if (!in_array($service, $allowedServices)) $errors[] = "Invalid service selected.";

    if (!empty($errors)) die("❌ ".implode("\\n",$errors));

    // --- Insert into Database ---
    $stmt = $conn->prepare("INSERT INTO inquiries (name,email,mobile,service,message,created_at) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $email, $mobile, $service, $message, $time);

    if (!$stmt->execute()) {
        die("❌ Database insert failed: " . $stmt->error);
    }
    $stmt->close();

    // --- Fetch email credentials ---
    $result = $conn->query("SELECT * FROM email_credentials ORDER BY id DESC LIMIT 1");
    if (!$result) die("❌ Could not fetch email credentials: " . $conn->error);

    $credentials = $result->fetch_assoc();
    $dynamicEmail = $credentials['email'];
    $dynamicPassword = $credentials['password'];

    // --- Send Emails ---
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $dynamicEmail;
        $mail->Password = $dynamicPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Customer Email
        $mail->setFrom($dynamicEmail, 'ZeOpto SAP Consulting');
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = "Thank you for contacting ZeOpto SAP Consulting Services";
        $mail->Body = "
            <div style='font-family: Arial, sans-serif;'>
                <h3>Dear $name,</h3>
                <p>Thank you for contacting <b>ZeOpto SAP Consulting</b>. We received your inquiry for <b>$service</b>.</p>
                <p>We will contact you shortly.</p>
                <p>📞 +91-9953280036</p>
                <p><b>Best Regards,</b><br>ZeOpto SAP Consulting Team</p>
            </div>
        ";
        $mail->send();

        // Admin Email
        $mail->clearAddresses();
        $mail->addAddress($dynamicEmail);
        $mail->Subject = "New Inquiry Received";
        $mail->Body = "
            <p><b>Name:</b> $name</p>
            <p><b>Email:</b> $email</p>
            <p><b>Mobile:</b> $mobile</p>
            <p><b>Service:</b> $service</p>
            <p><b>Message:</b> $message</p>
            <p><b>Time:</b> $time</p>
        ";
        $mail->send();

    } catch (Exception $e) {
        error_log("Mailer Error: " . $e->getMessage());
    }

    echo "<script>alert('✅ Your inquiry has been submitted successfully!'); window.location.href='".$_SERVER['PHP_SELF']."';</script>";
    exit;
}
?>

<!-- ================= HTML Form ================= -->



           <form id="inquiryForm" method="post" onsubmit="return validateAndSubmit();">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

    <div class="input-group mb-3">
        <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name / Company Name*" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bg-white"><i class="fas fa-envelope"></i></span>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address*" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bg-white"><i class="fas fa-phone-alt"></i></span>
        <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Mobile Number*" required>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bg-white"><i class="fas fa-cogs"></i></span>
        <select class="form-select" name="service" required>
            <option value="" disabled selected>Select a Service*</option>
            <option value="SAP Training">SAP Training</option>
            <option value="SAP Consulting">SAP Consulting</option>
            <option value="Staff Augmentations">Staff Augmentations</option>
        </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text bg-white"><i class="fas fa-comment-dots"></i></span>
        <textarea name="message" class="form-control" placeholder="Your Message (optional)" rows="2"></textarea>
    </div>

    <div class="g-recaptcha mb-3" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>

    <div class="d-grid">
        <button type="submit" name="submit" class="btn btn-block text-white" style="background:#fba70c;">
            <i class="fas fa-paper-plane me-2"></i>Submit Inquiry
        </button>
    </div>
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
function validateAndSubmit() {
    // Validate email
    let email = document.getElementById("email").value.trim();
    let mobile = document.getElementById("mobile").value.trim();
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let mobileRegex = /^\+?[0-9]{7,15}$/;

    if (!emailRegex.test(email)) { 
        alert("❌ Invalid email"); 
        return false; 
    }
    if (!mobileRegex.test(mobile)) { 
        alert("❌ Invalid mobile"); 
        return false; 
    }

    // Validate reCAPTCHA
    if (grecaptcha.getResponse() === "") {
        alert("⚠️ Please complete CAPTCHA"); 
        return false;
    }

    // Show success popup
    alert("✅ Your inquiry has been submitted successfully!");
    return true; // allow form submission
}
</script>

      
 <script>
function showPopup() {
    alert("✅ Your inquiry has been submitted successfully!");
    return true; // allow form to submit
}
</script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!-- <script>
function validateAndSubmit() {
    let email = document.getElementById("email");
    let mobile = document.getElementById("mobile");

    // Simple JS validation
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let mobileRegex = /^\+?[0-9]{7,15}$/;

    if (!emailRegex.test(email.value)) { alert("❌ Invalid email"); return false; }
    if (!mobileRegex.test(mobile.value)) { alert("❌ Invalid mobile"); return false; }
    if (grecaptcha.getResponse() === "") { alert("⚠️ Please complete CAPTCHA"); return false; }

    return true;
}
</script> -->
