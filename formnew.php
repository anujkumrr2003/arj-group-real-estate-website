<div class="modal fade zindexAdd" id="exampleModalPopup" tabindex="-1" aria-labelledby="exampleModalPopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
                    <div class="top-footer">
                        <div class="container">
                            <div class="autopopup">
                                <div class="autopopupleft">
                                    <div class="autopopupimg">
                                        <img src="images/kalpataru-vista-popup.webp" alt="Img" title="popupImg" class="img-fluid ">
                                    </div>

                                     <style>
input::placeholder {
  color: rgb(238, 236, 235) !important; /* Same as text/border color */
  opacity: 1;     /* Optional: ensures it's not faded */
}

.expore-more .btn, .project-site-visit .btn, .send_btn{
    border: 1px solid rgb(255, 111, 54) ;
}
</style>
                                </div>
                                <div class="form-footer">
                                    <!-- <img src="images/a07f9728-9bc5-4796-825d-c8476c2ce8f6-removebg-preview.png" alt="popupImg" title="popupImg" class="img-fluid" width="30%"> -->
                                    <h5><span style="background-color:rgb(255, 111, 54);">Call for Best Deal Price</span></h5>
                                    <h4 style="color:#000 !important;">To know more, reach out to us</h4>
                             <?php
// include 'config.php';
// error_reporting(0);

// $propertyName = '';

// // Fetch profile data
// $profile_sql = "SELECT * FROM profile";
// $profile_result = $conn->query($profile_sql);
// if ($profile_result && $profile_result->num_rows > 0) {
//     $profile_row = $profile_result->fetch_assoc();

//     // ✅ Get slug from SEO-friendly URL
//     $slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); // e.g., "parx-laureate"

//     // Fetch project details by slug from `ck` table
//     $result = $conn->query("SELECT * FROM ck WHERE blog = '$slug'");
//     if ($result && $result->num_rows > 0) {
//         $single_ck = $result->fetch_assoc();
//         $propertyName = $single_ck['video']; // ✅ use 'video' or 'deve' or 'title' based on actual column
//     }
// }
?>



<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
//     $name        = $conn->real_escape_string(trim($_POST['name']));
//     $email       = $conn->real_escape_string(trim($_POST['email']));
//     $countryCode = $conn->real_escape_string(trim($_POST['countryCode']));
//     $mobile      = $conn->real_escape_string(trim($_POST['mobile']));
//     $url         = $conn->real_escape_string(trim($_POST['url']));
//     $source      = $conn->real_escape_string(trim($_POST['source']));
//     $formflag    = $conn->real_escape_string(trim($_POST['formflag']));
//     $property    = $conn->real_escape_string($propertyName);

//     $sql = "INSERT INTO contact_form (name, email, country_code, mobile, url, source, formflag, project_name)
//             VALUES ('$name', '$email', '$countryCode', '$mobile', '$url', '$source', '$formflag', '$property')";

//     if ($conn->query($sql)) {
//         echo "<script>alert('Message sent successfully!');</script>";
//     } else {
//         echo "<script>alert('Error: " . $conn->error . "');</script>";
//     }
// }
?>

<style>
input::placeholder {
    color: #000 !important;
    opacity: 1; /* Ensure full color visibility */
}
</style>
<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

// ---------- FETCH EMAIL CREDENTIALS ----------
$sql = "SELECT * FROM email_credentials ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
$credentials = $result->fetch_assoc();
$dynamicEmail = $credentials['email'];
$dynamicPassword = $credentials['password'];

// ---------- FETCH PROPERTY ----------
$propertyName = '';
$slug = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$query = $conn->query("SELECT * FROM ck WHERE blog = '$slug'");
if ($query && $query->num_rows > 0) {
    $row = $query->fetch_assoc();
    $propertyName = $row['video'];
}

// ---------- HANDLE FORM SUBMISSION ----------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name        = trim($_POST['name'] ?? '');
    $email       = trim($_POST['email'] ?? '');
    $countryCode = trim($_POST['countryCode'] ?? '+91');
    $mobile      = trim($_POST['mobile'] ?? '');
    $url         = trim($_POST['url'] ?? $_SERVER['REQUEST_URI']);
    $source      = trim($_POST['source'] ?? 'Website');
    $formflag    = trim($_POST['formflag'] ?? 'contact');
    $project     = trim($propertyName);

    if ($name === '' || $email === '' || $mobile === '') {
        echo 'missing';
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, country_code, mobile, url, source, formflag, project_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $name, $email, $countryCode, $mobile, $url, $source, $formflag, $project);

    if (!$stmt->execute()) {
        echo 'db_error';
        exit;
    }

    // ---------- EMAIL SETTINGS ----------
    $smtpUser = $dynamicEmail;
    $smtpPass = $dynamicPassword;
    $smtpHost = 'smtp.gmail.com';
    $smtpPort = 587;

    try {
        // ---------- ADMIN EMAIL ----------
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUser;
        $mail->Password = $smtpPass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $smtpPort;

        $mail->setFrom($smtpUser, 'New Lead');
        $mail->addAddress($dynamicEmail, 'Admin');
        $mail->isHTML(true);
        $mail->Subject = "New Lead from $name";
        $mail->Body = '
          <div style="font-family: Arial, sans-serif; color: #333; line-height: 1.6; max-width: 600px; margin: auto; border: 1px solid #eee; border-radius: 8px; padding: 20px;">
            <h2 style="color: #222; border-bottom: 2px solid #f0ad4e; padding-bottom: 8px;">New Inquiry Received</h2>
            <table style="width:100%; border-collapse: collapse;">
              <tr><td style="padding: 8px 0; width: 150px;"><strong>Name:</strong></td><td>'.$name.'</td></tr>
              <tr><td style="padding: 8px 0;"><strong>Email:</strong></td><td>'.$email.'</td></tr>
              <tr><td style="padding: 8px 0;"><strong>Mobile:</strong></td><td>'.$countryCode.' '.$mobile.'</td></tr>
              <tr><td style="padding: 8px 0;"><strong>Property Name:</strong></td><td>'.$project.'</td></tr>
              <tr><td style="padding: 8px 0;"><strong>Date:</strong></td><td>'.date("d M Y, h:i A").'</td></tr>
            </table>
            <p style="margin-top: 20px; color: #555; font-size: 13px;">This inquiry was submitted via your website property form.</p>
          </div>
        ';
        $mail->send();

        // ---------- AUTO REPLY ----------
        $reply = new PHPMailer(true);
        $reply->isSMTP();
        $reply->Host = $smtpHost;
        $reply->SMTPAuth = true;
        $reply->Username = $smtpUser;
        $reply->Password = $smtpPass;
        $reply->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $reply->Port = $smtpPort;
        $reply->setFrom($smtpUser, 'ARJ Spaces in Noida');
        $reply->addAddress($email, $name);
        $reply->isHTML(true);
        $reply->Subject = "Thank You for Contacting ARJ Spaces";
        $reply->Body = '
          <div style="font-family: Arial, sans-serif; color: #333; line-height: 1.6; max-width: 600px; margin: auto; border: 1px solid #eee; border-radius: 8px; padding: 20px;">
            <h2 style="color: #0d6efd; border-bottom: 2px solid #f0ad4e; padding-bottom: 8px;">Thank You, '.$name.'!</h2>
            <p>We appreciate your interest in <b>'.htmlspecialchars($project).'</b>.</p>
            <p>Our team will review your inquiry and get in touch with you shortly to assist further.</p>
            <p style="margin-top: 20px;">Warm regards,<br><strong>Team ARJ Spaces</strong><br>Noida</p>
            <hr style="margin-top: 25px; border: none; border-top: 1px solid #ddd;">
            <p style="font-size: 13px; color: #777;">This is an automated confirmation from ARJ Spaces. You don’t need to reply to this email.</p>
          </div>
        ';
        $reply->send();

        echo 'success';
    } catch (Exception $e) {
        echo 'mail_error';
    }

    exit;
}
?>

<div class="container py-4">
  <form id="contactForm" method="post" action="">
    <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <input type="hidden" name="source" value="Website">
    <input type="hidden" name="formflag" value="contact">

    <div class="mb-3">
      <input type="text" name="name" class="form-control border-2" placeholder="Full Name" required>
    </div>

    <div class="mb-3">
      <input type="email" name="email" class="form-control border-2" placeholder="Email ID" required>
    </div>

    <div class="mb-3">
      <select name="countryCode" class="form-select border-2 mb-2" required>
  <option value="+91" selected>(+91) India</option>
  <option value="+1">(+1) United States</option>
  <option value="+44">(+44) United Kingdom</option>
  <option value="+971">(+971) United Arab Emirates</option>
  <option value="+61">(+61) Australia</option>
  <option value="+1">(+1) Canada</option>
  <option value="+81">(+81) Japan</option>
  <option value="+49">(+49) Germany</option>
  <option value="+33">(+33) France</option>
  <option value="+39">(+39) Italy</option>
  <option value="+34">(+34) Spain</option>
  <option value="+65">(+65) Singapore</option>
  <option value="+60">(+60) Malaysia</option>
  <option value="+94">(+94) Sri Lanka</option>
  <option value="+92">(+92) Pakistan</option>
  <option value="+880">(+880) Bangladesh</option>
  <option value="+93">(+93) Afghanistan</option>
  <option value="+977">(+977) Nepal</option>
  <option value="+975">(+975) Bhutan</option>
  <option value="+86">(+86) China</option>
  <option value="+852">(+852) Hong Kong</option>
  <option value="+853">(+853) Macau</option>
  <option value="+82">(+82) South Korea</option>
  <option value="+62">(+62) Indonesia</option>
  <option value="+63">(+63) Philippines</option>
  <option value="+84">(+84) Vietnam</option>
  <option value="+66">(+66) Thailand</option>
  <option value="+95">(+95) Myanmar</option>
  <option value="+856">(+856) Laos</option>
  <option value="+855">(+855) Cambodia</option>
  <option value="+7">(+7) Russia</option>
  <option value="+994">(+994) Azerbaijan</option>
  <option value="+998">(+998) Uzbekistan</option>
  <option value="+996">(+996) Kyrgyzstan</option>
  <option value="+995">(+995) Georgia</option>
  <option value="+90">(+90) Turkey</option>
  <option value="+20">(+20) Egypt</option>
  <option value="+27">(+27) South Africa</option>
  <option value="+234">(+234) Nigeria</option>
  <option value="+254">(+254) Kenya</option>
  <option value="+255">(+255) Tanzania</option>
  <option value="+256">(+256) Uganda</option>
  <option value="+251">(+251) Ethiopia</option>
  <option value="+211">(+211) South Sudan</option>
  <option value="+213">(+213) Algeria</option>
  <option value="+212">(+212) Morocco</option>
  <option value="+216">(+216) Tunisia</option>
  <option value="+218">(+218) Libya</option>
  <option value="+964">(+964) Iraq</option>
  <option value="+98">(+98) Iran</option>
  <option value="+972">(+972) Israel</option>
  <option value="+962">(+962) Jordan</option>
  <option value="+968">(+968) Oman</option>
  <option value="+974">(+974) Qatar</option>
  <option value="+966">(+966) Saudi Arabia</option>
  <option value="+963">(+963) Syria</option>
  <option value="+961">(+961) Lebanon</option>
  <option value="+62">(+62) Indonesia</option>
  <option value="+64">(+64) New Zealand</option>
  <option value="+679">(+679) Fiji</option>
  <option value="+675">(+675) Papua New Guinea</option>
  <option value="+685">(+685) Samoa</option>
  <option value="+682">(+682) Cook Islands</option>
  <option value="+64">(+64) Niue</option>
  <option value="+852">(+852) Hong Kong</option>
  <option value="+353">(+353) Ireland</option>
  <option value="+358">(+358) Finland</option>
  <option value="+46">(+46) Sweden</option>
  <option value="+47">(+47) Norway</option>
  <option value="+45">(+45) Denmark</option>
  <option value="+31">(+31) Netherlands</option>
  <option value="+32">(+32) Belgium</option>
  <option value="+41">(+41) Switzerland</option>
  <option value="+43">(+43) Austria</option>
  <option value="+420">(+420) Czech Republic</option>
  <option value="+48">(+48) Poland</option>
  <option value="+36">(+36) Hungary</option>
  <option value="+30">(+30) Greece</option>
  <option value="+40">(+40) Romania</option>
  <option value="+380">(+380) Ukraine</option>
  <option value="+48">(+48) Poland</option>
  <option value="+56">(+56) Chile</option>
  <option value="+55">(+55) Brazil</option>
  <option value="+54">(+54) Argentina</option>
  <option value="+57">(+57) Colombia</option>
  <option value="+58">(+58) Venezuela</option>
  <option value="+51">(+51) Peru</option>
  <option value="+52">(+52) Mexico</option>
  <option value="+507">(+507) Panama</option>
  <option value="+506">(+506) Costa Rica</option>
  <option value="+503">(+503) El Salvador</option>
  <option value="+502">(+502) Guatemala</option>
  <option value="+505">(+505) Nicaragua</option>
  <option value="+504">(+504) Honduras</option>
  <option value="+53">(+53) Cuba</option>
  <option value="+1-876">(+1-876) Jamaica</option>
  <option value="+1-868">(+1-868) Trinidad & Tobago</option>
  <option value="+1-242">(+1-242) Bahamas</option>
  <option value="+64">(+64) New Zealand</option>
</select>

      <input type="text" name="mobile" class="form-control border-2" placeholder="Mobile Number" required pattern="[0-9]{10}">
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-warning text-white px-4">SEND MESSAGE</button>
    </div>
  </form>

  <div id="formAlert" class="alert mt-3 d-none"></div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(function(){
  $("#contactForm").on("submit", function(e){
    e.preventDefault();
    let form = $(this);
    let alertBox = $("#formAlert");

    // Show instant success message before AJAX completes
    alertBox
      .removeClass("d-none alert-danger alert-warning alert-info")
      .addClass("alert alert-success")
      .text("✅ Thank you! Your inquiry was sent successfully.");

    // Send form data to server (email & database)
    $.ajax({
      url: form.attr("action"),
      type: "POST",
      data: form.serialize(),
      success: function(response){
        response = response.trim();

        // optional — if you want to verify backend result silently
        console.log("Server Response:", response);

        // Reset form only when server confirms success
        if(response === "success"){
          form.trigger("reset");
        }
      },
      error: function(xhr, status, error){
        console.log("AJAX Error:", error, xhr.responseText);
      }
    });
  });
});
</script>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 