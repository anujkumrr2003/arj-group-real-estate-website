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


// ======================================================
// GOOGLE RECAPTCHA SECRET KEY
// ======================================================

$secretKey = "6LcS9eAsAAAAAJtxgB8tZCIgdLL5q7H08anxG0YL";


// ======================================================
// GET CURRENT PROPERTY FROM URL
// ======================================================

$propertyName  = '';
$propertyPrice = '';

$currentSlug = basename(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

$currentSlug = trim($currentSlug);


// Remove possible .php if present
$currentSlug = preg_replace('/\.php$/', '', $currentSlug);


// ======================================================
// FETCH PROPERTY
// ======================================================

if ($currentSlug !== '') {

    $propertyStmt = $conn->prepare("
        SELECT video, price
        FROM ck
        WHERE blog = ?
        LIMIT 1
    ");

    if ($propertyStmt) {

        $propertyStmt->bind_param(
            "s",
            $currentSlug
        );

        if ($propertyStmt->execute()) {

            $propertyResult =
                $propertyStmt->get_result();

            if (
                $propertyResult &&
                $propertyResult->num_rows > 0
            ) {

                $propertyData =
                    $propertyResult->fetch_assoc();

                $propertyName =
                    trim($propertyData['video'] ?? '');

                $propertyPrice =
                    trim($propertyData['price'] ?? '');
            }
        }

        $propertyStmt->close();
    }
}


// ======================================================
// FORM SUBMISSION
// ======================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // ==================================================
    // CAPTCHA
    // ==================================================

    $captcha =
        trim(
            $_POST['g-recaptcha-response'] ?? ''
        );


    if ($captcha === '') {

        echo 'captcha_missing';
        exit;
    }


    // ==================================================
    // VERIFY CAPTCHA
    // ==================================================

    $verifyUrl =
        'https://www.google.com/recaptcha/api/siteverify'
        . '?secret=' . urlencode($secretKey)
        . '&response=' . urlencode($captcha);


    $verifyResponse = false;


    if (function_exists('curl_init')) {

        $ch = curl_init();

        curl_setopt(
            $ch,
            CURLOPT_URL,
            $verifyUrl
        );

        curl_setopt(
            $ch,
            CURLOPT_RETURNTRANSFER,
            true
        );

        curl_setopt(
            $ch,
            CURLOPT_TIMEOUT,
            15
        );

        curl_setopt(
            $ch,
            CURLOPT_SSL_VERIFYPEER,
            true
        );

        $verifyResponse =
            curl_exec($ch);

        curl_close($ch);

    } else {

        $verifyResponse =
            @file_get_contents(
                $verifyUrl
            );
    }


    if (
        $verifyResponse === false ||
        empty($verifyResponse)
    ) {

        echo 'captcha_failed';
        exit;
    }


    $captchaData =
        json_decode(
            $verifyResponse,
            true
        );


    if (
        !is_array($captchaData) ||
        empty($captchaData['success'])
    ) {

        echo 'captcha_failed';
        exit;
    }


    // ==================================================
    // FORM DATA
    // ==================================================

    $name =
        trim(
            $_POST['name'] ?? ''
        );


    $email =
        trim(
            $_POST['email'] ?? ''
        );


    $countryCode =
        trim(
            $_POST['countryCode'] ?? '+91'
        );


    $mobile =
        trim(
            $_POST['mobile'] ?? ''
        );


    $url =
        trim(
            $_POST['url'] ??
            $_SERVER['REQUEST_URI']
        );


    $source =
        trim(
            $_POST['source'] ??
            'Website'
        );


    $formflag =
        trim(
            $_POST['formflag'] ??
            'contact'
        );


    // ==================================================
    // PROPERTY DATA
    // ==================================================

    /*
     * First preference:
     * property data fetched from ck table
     *
     * If not found, use hidden form values.
     */

    $project =
        $propertyName;

    $price =
        $propertyPrice;


    if ($project === '') {

        $project =
            trim(
                $_POST['project_name'] ?? ''
            );
    }


    if ($price === '') {

        $price =
            trim(
                $_POST['property_price'] ?? ''
            );
    }


    // ==================================================
    // VALIDATION
    // ==================================================

    if (
        $name === '' ||
        $email === '' ||
        $mobile === ''
    ) {

        echo 'missing';
        exit;
    }


    if (
        !filter_var(
            $email,
            FILTER_VALIDATE_EMAIL
        )
    ) {

        echo 'invalid_email';
        exit;
    }


    // ==================================================
    // DATABASE INSERT
    // ==================================================

    $insertStmt = $conn->prepare("
        INSERT INTO contact_form
        (
            name,
            email,
            country_code,
            mobile,
            url,
            source,
            formflag,
            project_name,
            property_price
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )
    ");


    if (!$insertStmt) {

        echo 'db_prepare_error: ' .
             $conn->error;

        exit;
    }


    $insertStmt->bind_param(
        "sssssssss",
        $name,
        $email,
        $countryCode,
        $mobile,
        $url,
        $source,
        $formflag,
        $project,
        $price
    );


    // ==================================================
    // EXECUTE INSERT
    // ==================================================

    if (!$insertStmt->execute()) {

        echo 'db_error: ' .
             $insertStmt->error;

        $insertStmt->close();

        exit;
    }


    $leadId =
        $insertStmt->insert_id;


    $insertStmt->close();


    // ==================================================
    // FETCH EMAIL CREDENTIALS
    // ==================================================

    $dynamicEmail = '';
    $dynamicPassword = '';


    $emailQuery = "
        SELECT email, password
        FROM email_credentials
        ORDER BY id DESC
        LIMIT 1
    ";


    $emailResult =
        $conn->query($emailQuery);


    if (
        $emailResult &&
        $emailResult->num_rows > 0
    ) {

        $emailData =
            $emailResult->fetch_assoc();

        $dynamicEmail =
            trim(
                $emailData['email'] ?? ''
            );

        $dynamicPassword =
            trim(
                $emailData['password'] ?? ''
            );
    }


    // ==================================================
    // IF EMAIL SETTINGS NOT AVAILABLE
    // ==================================================

    if (
        $dynamicEmail === '' ||
        $dynamicPassword === ''
    ) {

        /*
         * Database insert is already successful.
         */

        echo 'success';
        exit;
    }


    // ==================================================
    // SEND EMAIL
    // ==================================================

    try {


        // ==============================================
        // ADMIN EMAIL
        // ==============================================

        $mail =
            new PHPMailer(true);


        $mail->isSMTP();

        $mail->Host =
            'smtp.gmail.com';

        $mail->SMTPAuth =
            true;

        $mail->Username =
            $dynamicEmail;

        $mail->Password =
            $dynamicPassword;

        $mail->SMTPSecure =
            PHPMailer::ENCRYPTION_STARTTLS;

        $mail->Port =
            587;

        $mail->SMTPDebug =
            0;


        $mail->setFrom(
            $dynamicEmail,
            'ARJ Estates'
        );


        $mail->addAddress(
            'ajayagrawal2007@gmail.com',
            'Admin'
        );


        $mail->addReplyTo(
            $email,
            $name
        );


        $mail->isHTML(true);


        $mail->Subject =
            'New Lead - ' .
            ($project !== ''
                ? $project
                : 'Website Inquiry');


        $mail->Body = '

        <div style="font-family:Arial,sans-serif;padding:20px">

            <h2>New Inquiry Received</h2>

            <table
                border="1"
                cellpadding="10"
                cellspacing="0"
                style="border-collapse:collapse;width:100%;"
            >

                <tr>
                    <td><strong>Lead ID</strong></td>
                    <td>' .
                    htmlspecialchars(
                        (string)$leadId
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Name</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $name
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Email</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $email
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Mobile</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $countryCode
                    ) .
                    ' ' .
                    htmlspecialchars(
                        $mobile
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Property</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $project
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Property Price</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $price
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>URL</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $url
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Source</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $source
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Form</strong></td>
                    <td>' .
                    htmlspecialchars(
                        $formflag
                    ) .
                    '</td>
                </tr>

                <tr>
                    <td><strong>Date</strong></td>
                    <td>' .
                    date(
                        'd M Y h:i A'
                    ) .
                    '</td>
                </tr>

            </table>

        </div>
        ';


        $mail->send();


        // ==============================================
        // CUSTOMER AUTO REPLY
        // ==============================================

        $reply =
            new PHPMailer(true);


        $reply->isSMTP();

        $reply->Host =
            'smtp.gmail.com';

        $reply->SMTPAuth =
            true;

        $reply->Username =
            $dynamicEmail;

        $reply->Password =
            $dynamicPassword;

        $reply->SMTPSecure =
            PHPMailer::ENCRYPTION_STARTTLS;

        $reply->Port =
            587;


        $reply->setFrom(
            $dynamicEmail,
            'ARJ Estates'
        );


        $reply->addAddress(
            $email,
            $name
        );


        $reply->isHTML(true);


        $reply->Subject =
            'Thank You for Contacting ARJ Estates';


        $reply->Body = '

        <div style="font-family:Arial,sans-serif;padding:20px">

            <h2>
                Thank You ' .
                htmlspecialchars(
                    $name
                ) .
                '
            </h2>

            <p>
                We received your inquiry for
                <strong>' .
                htmlspecialchars(
                    $project
                ) .
                '</strong>.
            </p>

            <p>
                <strong>Property Price:</strong>
                ' .
                htmlspecialchars(
                    $price
                ) .
                '
            </p>

            <p>
                Our team will contact you soon.
            </p>

            <p>
                Regards,<br>
                <strong>ARJ Estates</strong>
            </p>

        </div>
        ';


        $reply->send();


    } catch (Exception $e) {

        /*
         * IMPORTANT:
         *
         * Database insertion already happened.
         *
         * Therefore email failure should NOT
         * make the lead appear as DB failure.
         */

    }


    // ==================================================
    // FINAL RESPONSE
    // ==================================================

    echo 'success';

    exit;
}

?>



<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="container py-4">
  <form id="contactForm" method="post" action="">
    <input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
     
    
    
     <input
        type="hidden"
        name="project_name"
        value="<?= htmlspecialchars($row['video'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
    >

    <input
        type="hidden"
        name="property_price"
        value="<?= htmlspecialchars($row['price'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
    >

    <input
        type="hidden"
        name="url"
        value="<?= htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8') ?>"
    >

    <input
        type="hidden"
        name="source"
        value="Website"
    >

    <input
        type="hidden"
        name="formflag"
        value="contact"
    >

    <div class="mb-3">
      <input type="text" name="name" class="form-control border-2" placeholder="Full Name" required>
    </div>

    <div class="mb-3">
      <input type="email" name="email" class="form-control border-2" placeholder="Email ID" required>
    </div>

    <div class="mb-3">
      <select name="countryCode" class="form-select border-2 mb-2" required>
  <option value="+91" selected>(+91) India</option>
  <!--<option value="+1">(+1) United States</option>-->
  <!--<option value="+44">(+44) United Kingdom</option>-->
  <!--<option value="+971">(+971) United Arab Emirates</option>-->
  <!--<option value="+61">(+61) Australia</option>-->
  <!--<option value="+1">(+1) Canada</option>-->
  <!--<option value="+81">(+81) Japan</option>-->
  <!--<option value="+49">(+49) Germany</option>-->
  <!--<option value="+33">(+33) France</option>-->
  <!--<option value="+39">(+39) Italy</option>-->
  <!--<option value="+34">(+34) Spain</option>-->
  <!--<option value="+65">(+65) Singapore</option>-->
  <!--<option value="+60">(+60) Malaysia</option>-->
  <!--<option value="+94">(+94) Sri Lanka</option>-->
  <!--<option value="+92">(+92) Pakistan</option>-->
  <!--<option value="+880">(+880) Bangladesh</option>-->
  <!--<option value="+93">(+93) Afghanistan</option>-->
  <!--<option value="+977">(+977) Nepal</option>-->
  <!--<option value="+975">(+975) Bhutan</option>-->
  <!--<option value="+86">(+86) China</option>-->
  <!--<option value="+852">(+852) Hong Kong</option>-->
  <!--<option value="+853">(+853) Macau</option>-->
  <!--<option value="+82">(+82) South Korea</option>-->
  <!--<option value="+62">(+62) Indonesia</option>-->
  <!--<option value="+63">(+63) Philippines</option>-->
  <!--<option value="+84">(+84) Vietnam</option>-->
  <!--<option value="+66">(+66) Thailand</option>-->
  <!--<option value="+95">(+95) Myanmar</option>-->
  <!--<option value="+856">(+856) Laos</option>-->
  <!--<option value="+855">(+855) Cambodia</option>-->
  <!--<option value="+7">(+7) Russia</option>-->
  <!--<option value="+994">(+994) Azerbaijan</option>-->
  <!--<option value="+998">(+998) Uzbekistan</option>-->
  <!--<option value="+996">(+996) Kyrgyzstan</option>-->
  <!--<option value="+995">(+995) Georgia</option>-->
  <!--<option value="+90">(+90) Turkey</option>-->
  <!--<option value="+20">(+20) Egypt</option>-->
  <!--<option value="+27">(+27) South Africa</option>-->
  <!--<option value="+234">(+234) Nigeria</option>-->
  <!--<option value="+254">(+254) Kenya</option>-->
  <!--<option value="+255">(+255) Tanzania</option>-->
  <!--<option value="+256">(+256) Uganda</option>-->
  <!--<option value="+251">(+251) Ethiopia</option>-->
  <!--<option value="+211">(+211) South Sudan</option>-->
  <!--<option value="+213">(+213) Algeria</option>-->
  <!--<option value="+212">(+212) Morocco</option>-->
  <!--<option value="+216">(+216) Tunisia</option>-->
  <!--<option value="+218">(+218) Libya</option>-->
  <!--<option value="+964">(+964) Iraq</option>-->
  <!--<option value="+98">(+98) Iran</option>-->
  <!--<option value="+972">(+972) Israel</option>-->
  <!--<option value="+962">(+962) Jordan</option>-->
  <!--<option value="+968">(+968) Oman</option>-->
  <!--<option value="+974">(+974) Qatar</option>-->
  <!--<option value="+966">(+966) Saudi Arabia</option>-->
  <!--<option value="+963">(+963) Syria</option>-->
  <!--<option value="+961">(+961) Lebanon</option>-->
  <!--<option value="+62">(+62) Indonesia</option>-->
  <!--<option value="+64">(+64) New Zealand</option>-->
  <!--<option value="+679">(+679) Fiji</option>-->
  <!--<option value="+675">(+675) Papua New Guinea</option>-->
  <!--<option value="+685">(+685) Samoa</option>-->
  <!--<option value="+682">(+682) Cook Islands</option>-->
  <!--<option value="+64">(+64) Niue</option>-->
  <!--<option value="+852">(+852) Hong Kong</option>-->
  <!--<option value="+353">(+353) Ireland</option>-->
  <!--<option value="+358">(+358) Finland</option>-->
  <!--<option value="+46">(+46) Sweden</option>-->
  <!--<option value="+47">(+47) Norway</option>-->
  <!--<option value="+45">(+45) Denmark</option>-->
  <!--<option value="+31">(+31) Netherlands</option>-->
  <!--<option value="+32">(+32) Belgium</option>-->
  <!--<option value="+41">(+41) Switzerland</option>-->
  <!--<option value="+43">(+43) Austria</option>-->
  <!--<option value="+420">(+420) Czech Republic</option>-->
  <!--<option value="+48">(+48) Poland</option>-->
  <!--<option value="+36">(+36) Hungary</option>-->
  <!--<option value="+30">(+30) Greece</option>-->
  <!--<option value="+40">(+40) Romania</option>-->
  <!--<option value="+380">(+380) Ukraine</option>-->
  <!--<option value="+48">(+48) Poland</option>-->
  <!--<option value="+56">(+56) Chile</option>-->
  <!--<option value="+55">(+55) Brazil</option>-->
  <!--<option value="+54">(+54) Argentina</option>-->
  <!--<option value="+57">(+57) Colombia</option>-->
  <!--<option value="+58">(+58) Venezuela</option>-->
  <!--<option value="+51">(+51) Peru</option>-->
  <!--<option value="+52">(+52) Mexico</option>-->
  <!--<option value="+507">(+507) Panama</option>-->
  <!--<option value="+506">(+506) Costa Rica</option>-->
  <!--<option value="+503">(+503) El Salvador</option>-->
  <!--<option value="+502">(+502) Guatemala</option>-->
  <!--<option value="+505">(+505) Nicaragua</option>-->
  <!--<option value="+504">(+504) Honduras</option>-->
  <!--<option value="+53">(+53) Cuba</option>-->
  <!--<option value="+1-876">(+1-876) Jamaica</option>-->
  <!--<option value="+1-868">(+1-868) Trinidad & Tobago</option>-->
  <!--<option value="+1-242">(+1-242) Bahamas</option>-->
  <!--<option value="+64">(+64) New Zealand</option>-->
</select>

      <input type="text" name="mobile" class="form-control border-2" placeholder="Mobile Number" required pattern="[0-9]{10}">
    </div>



<div class="col-md-12 mb-3">
    <div class="g-recaptcha"
        data-sitekey="6LcS9eAsAAAAACCGVEo4psmb0S7p9nYuT8dwnUvJ">
    </div>
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