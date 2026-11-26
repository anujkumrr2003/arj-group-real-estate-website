





<?php
include "config.php";
error_reporting(0);

   $profile_sql = "SELECT * FROM profile";
$profile_result = $conn->query($profile_sql);

if ($profile_result && $profile_result->num_rows > 0) {
    while ($profile_row = $profile_result->fetch_assoc()) {
            
            ?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- Google Site Verification -->
 <meta name="google-site-verification" content="1GE-eh3i3CFWbRH7t6juE61aZ6S2b0KSW31ovUlngQo">


  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />



 <?php
 

$records = $conn->query("SELECT * FROM meta_data WHERE LOWER(page_name) = 'contact' LIMIT 1");
$meta = $records->fetch_assoc();
?>

<title><?= htmlspecialchars($meta['meta_title'] ?? 'ARJ GROUP – Flats in Noida and Greater Noida') ?></title>
<meta name="description" content="<?= htmlspecialchars($meta['meta_description'] ?? '') ?>">
<meta name="keywords" content="<?= htmlspecialchars($meta['keywords'] ?? '') ?>">


  <!-- Page Title -->
  <!--<title>Contact Us | ARJ GROUP – Flats in Noida and Greater Noida</title>-->

  <!-- Meta Description & Keywords -->
  <!--<meta name="description" content="Get in touch with ARJ GROUP for luxury flats and apartments in Noida and Greater Noida. Contact us to learn more about our premium residential projects and investment opportunities." />-->
  <!--<meta name="keywords" content="ARJ GROUP contact, flats in Noida, flats in Greater Noida, luxury apartments Noida, real estate Noida, premium projects Noida, Noida real estate contact, ARJ GROUP enquiry, property in Noida, buy luxury flat Noida" />-->

  <!-- Robots -->
  <meta name="robots" content="index, follow" />
  <meta name="googlebot" content="index, follow" />
  <meta name="bingbot" content="index, follow" />
  <meta name="revisit-after" content="1 day" />

  <!-- Canonical & Alternate -->
  <link rel="canonical" href="https://arjgroup.in/contact.php" />
  <link rel="alternate" hreflang="en" href="https://arjgroup.in/contact.php" />

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="Contact ARJ GROUP | Flats in Noida and Greater Noida" />
  <meta property="og:description" content="Reach out to ARJ GROUP to know more about our luxury residential projects in Noida and Greater Noida. We are here to help you find your dream home." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://arjgroup.in/contact.php" />
  <meta property="og:site_name" content="ARJ GROUP" />
  <meta property="og:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="Contact ARJ GROUP | Flats in Noida and Greater Noida" />
  <meta name="twitter:description" content="Contact ARJ GROUP for luxury apartments and flats in Noida and Greater Noida. Our team is ready to assist with your real estate needs." />
  <meta name="twitter:image" content="https://arjgroup.in/theme/home/luxury-residences-logo.jpg" />

  <!-- Schema Markup -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "https://arjgroup.in/contact.php"
    },
    "headline": "Contact ARJ GROUP",
    "description": "Get in touch with ARJ GROUP for luxury flats and apartments in Noida and Greater Noida. Contact our sales and support team for project details.",
    "publisher": {
      "@type": "Organization",
      "name": "ARJ GROUP",
      "url": "https://arjgroup.in/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://arjgroup.in/theme/home/luxury-residences-logo.jpg"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+91-9911419406",
        "contactType": "Customer Support",
        "areaServed": "IN",
        "availableLanguage": "English"
      }
    }
  }
  </script>
  
  
  
  
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/footer.css">
  <meta name="keywords" content="luxury flats Noida, Noida, ultra luxury Noida real estate">

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
    
</head>



 <!--background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color: <?= htmlspecialchars($profile_row['background_color']) ?>;-->




<!--cursive;-->

<!--font-family: 'Jazz LET';-->

<body style="font-family:'Jazz LET'; background-color: <?= htmlspecialchars($profile_row['heading_background_color']) ?>;">
  
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

<section class="banner" style="background-image: url('images/contact-us-1.jpg');
background-size: cover;
background-position: center center;
background-repeat: no-repeat; font-family: 'Cardo', serif;">
    <h1>Contact us</h1>
  </section>
  <section id="contactus" class="contactus">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="contact-form">
              
              <script src="https://www.google.com/recaptcha/api.js" async defer></script>
              <?php
// include 'config.php';
// $secretKey = "6LcS9eAsAAAAAJtxgB8tZCIgdLL5q7H08anxG0YL";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
//      // ================= CAPTCHA VERIFY =================
//     if (empty($_POST['g-recaptcha-response'])) {

//         echo 'captcha_missing';
//         exit;
//     }

//     $captcha = $_POST['g-recaptcha-response'];

//     $verifyResponse = file_get_contents(
//         "https://www.google.com/recaptcha/api/siteverify?secret="
//         . $secretKey .
//         "&response=" .
//         $captcha
//     );

//     $responseData = json_decode($verifyResponse);

//     if (!$responseData->success) {

//         echo 'captcha_failed';
//         exit;
//     }

//     // Sanitize inputs
//     $name = $conn->real_escape_string(trim($_POST['name']));
//     $email = $conn->real_escape_string(trim($_POST['email']));
//     $countryCode = $conn->real_escape_string(trim($_POST['countryCode']));
//     $mobile = $conn->real_escape_string(trim($_POST['mobile']));
//     $url = $conn->real_escape_string(trim($_POST['url']));
//     $source = $conn->real_escape_string(trim($_POST['source']));
//     $formflag = $conn->real_escape_string(trim($_POST['formflag']));
//     $property = $conn->real_escape_string($propertyName); // insert this value too
//     $lname = $conn->real_escape_string(trim($_POST['lname']));

//     // Insert into database (add `project_name` column in your DB table if not exists)
//     $sql = "INSERT INTO contact_form (name, email, country_code, mobile, url, source, formflag, project_name, lname)
//             VALUES ('$name', '$email', '$countryCode', '$mobile', '$url', '$source', '$formflag', '$property', '$lname')";

//     if ($conn->query($sql)) {
//         echo "<script>alert('Message sent successfully!');</script>";
//     } else {
//         echo "<script>alert('Error: " . $conn->error . "');</script>";
//     }
// }
?>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include 'config.php';

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

if(isset($_POST['submit'])){

$name=$_POST['name'] ?? '';
$lname=$_POST['lname'] ?? '';
$email=$_POST['email'] ?? '';
$countryCode=$_POST['countryCode'] ?? '';
$mobile=$_POST['mobile'] ?? '';
$message=$_POST['message'] ?? '';

$url=$_POST['url'] ?? '';
$source=$_POST['source'] ?? '';

$formflag=$_POST['formflag'] ?? '';

if(empty($name)||empty($email)){

die(
"<script>
alert('Fill required fields');
history.back();
</script>"
);

}

// INSERT

$sql="
INSERT INTO contact_form
(
name,
lname,
email,
country_code,
mobile,
source,
url,
formflag
)

VALUES

(
'$name',
'$lname',
'$email',
'$countryCode',
'$mobile',
'$source',
'$url',
'$formflag'
)
";

$insert=mysqli_query(
$conn,
$sql
);

if(!$insert){

die(
mysqli_error(
$conn
)
);

}

// ADMIN MAIL

try{

$mail=
new PHPMailer\PHPMailer\PHPMailer();

$mail->isSMTP();

$mail->Host=
"smtp.gmail.com";

$mail->SMTPAuth=
true;

$mail->Username=
"ajayagrawal2007@gmail.com";

$mail->Password=
"cschhltgdbcshkdm";

$mail->SMTPSecure=
"tls";

$mail->Port=
587;

$mail->setFrom(
"ajayagrawal2007@gmail.com",
"ARJ Estates"
);

$mail->addAddress(
"ajayagrawal2007@gmail.com"
);

$mail->isHTML(
true
);

$mail->Subject=
"New Enquiry lead from ARJ Estates ";

$mail->Body="

Name:
$name
<br>

Last:
$lname
<br>

Email:
$email
<br>

Phone:
$countryCode $mobile
<br>

Message:
$message

";

$mail->send();

}catch(Exception $e){

echo $mail->ErrorInfo;

}

// USER THANK YOU MAIL

try{

$user=
new PHPMailer\PHPMailer\PHPMailer();

$user->isSMTP();

$user->Host=
"smtp.gmail.com";

$user->SMTPAuth=
true;

$user->Username=
"ajayagrawal2007@gmail.com";

$user->Password=
"cschhltgdbcshkdm";

$user->SMTPSecure=
"tls";

$user->Port=
587;

$user->setFrom(
"ajayagrawal2007@gmail.com",
"ARJ Estates"
);

$user->addAddress(
$email
);

$user->isHTML(
true
);

$user->Subject=
"Thank You";

$user->Body="

Hello $name,

<br><br>

Thank you for contacting ARJ Estates.

Our team will connect with you shortly.

<br><br>

Regards<br>

ARJ Estates

";

$user->send();

}catch(Exception $e){}

echo "

<script>

alert(
'Submitted Successfully'
);

window.location='contact.php';

</script>

";

}

?>
<style>
       @media only screen and (max-width: 991px) {
    .button_container span, .overlay {
        background: <?= htmlspecialchars($profile_row['heading_text_color']) ?> !important;
    }
  }
  </style>
            <form action="" method="post" id="contact-form">
                
                <input type="hidden" name="source" value="Website">
<input type="hidden" name="url" value="<?= $_SERVER['REQUEST_URI'] ?>">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <input type="text" name="name" placeholder="First Name" required="" pattern="[a-zA-Z][a-zA-Z0-9\s]*"> -->
                    <input type="text" class="con-field" name="name" placeholder="Full Name" required=""
                      pattern="[a-zA-Z][a-zA-Z0-9\s]*" style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="lname" placeholder="Last Name" required=""
                      pattern="[a-zA-Z][a-zA-Z0-9\s]*" style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group" style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;  border-radius:7px;">
                    <!-- <input class="con-field" name="mobile" required="" id="phone" placeholder="Phone" type="text" pattern="[0-9]{10}"> -->
                    <select class="con-select" name="countryCode" >
	<option data-countryCode="IN" value="+91">India (+91)</option> 
	<!--<optgroup label="Other countries">-->
	<!--	<option data-countryCode="DZ" value="+213">Algeria (+213)</option>-->
	<!--	<option data-countryCode="AD" value="+376">Andorra (+376)</option>-->
	<!--	<option data-countryCode="AO" value="+244">Angola (+244)</option>-->
	<!--	<option data-countryCode="AI" value="+1264">Anguilla (+1264)</option>-->
	<!--	<option data-countryCode="AG" value="+1268">Antigua & Barbuda (+1268)</option> -->
	<!--	<option data-countryCode="AR" value="+54">Argentina (+54)</option>-->
	<!--	<option data-countryCode="AM" value="+374">Armenia (+374)</option>-->
	<!--	<option data-countryCode="AW" value="+297">Aruba (+297)</option>-->
	<!--	<option data-countryCode="AU" value="+61">Australia (+61)</option>-->
	<!--	<option data-countryCode="AT" value="+43">Austria (+43)</option>-->
	<!--	<option data-countryCode="AZ" value="+994">Azerbaijan (+994)</option>-->
	<!--	<option data-countryCode="BS" value="+1242">Bahamas (+1242)</option>-->
	<!--	<option data-countryCode="BH" value="+973">Bahrain (+973)</option>-->
	<!--	<option data-countryCode="BD" value="+880">Bangladesh (+880)</option>-->
	<!--	<option data-countryCode="BB" value="+1246">Barbados (+1246)</option>-->
	<!--	<option data-countryCode="BY" value="+375">Belarus (+375)</option>-->
	<!--	<option data-countryCode="BE" value="+32">Belgium (+32)</option>-->
	<!--	<option data-countryCode="BZ" value="+501">Belize (+501)</option>-->
	<!--	<option data-countryCode="BJ" value="+229">Benin (+229)</option>-->
	<!--	<option data-countryCode="BM" value="+1441">Bermuda (+1441)</option>-->
	<!--	<option data-countryCode="BT" value="+975">Bhutan (+975)</option>-->
	<!--	<option data-countryCode="BO" value="+591">Bolivia (+591)</option>-->
	<!--	<option data-countryCode="BA" value="+387">Bosnia Herzegovina (+387)</option>-->
	<!--	<option data-countryCode="BW" value="+267">Botswana (+267)</option>-->
	<!--	<option data-countryCode="BR" value="+55">Brazil (+55)</option>-->
	<!--	<option data-countryCode="BN" value="+673">Brunei (+673)</option>-->
	<!--	<option data-countryCode="BG" value="+359">Bulgaria (+359)</option>-->
	<!--	<option data-countryCode="BF" value="+226">Burkina Faso (+226)</option>-->
	<!--	<option data-countryCode="BI" value="+257">Burundi (+257)</option>-->
	<!--	<option data-countryCode="KH" value="+855">Cambodia (+855)</option>-->
	<!--	<option data-countryCode="CM" value="+237">Cameroon (+237)</option>-->
	<!--	<option data-countryCode="CA" value="+1">Canada (+1)</option>-->
	<!--	<option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>-->
	<!--	<option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>-->
	<!--	<option data-countryCode="CF" value="+236">Central African Republic (+236)</option>-->
	<!--	<option data-countryCode="CL" value="+56">Chile (+56)</option>-->
	<!--	<option data-countryCode="CN" value="+86">China (+86)</option>-->
	<!--	<option data-countryCode="CO" value="+57">Colombia (+57)</option>-->
	<!--	<option data-countryCode="KM" value="+269">Comoros (+269)</option>-->
	<!--	<option data-countryCode="CG" value="+242">Congo (+242)</option>-->
	<!--	<option data-countryCode="CK" value="+682">Cook Islands (+682)</option>-->
	<!--	<option data-countryCode="CR" value="+506">Costa Rica (+506)</option>-->
	<!--	<option data-countryCode="HR" value="+385">Croatia (+385)</option>-->
	<!--	<option data-countryCode="CU" value="+53">Cuba (+53)</option>-->
	<!--	<option data-countryCode="CY" value="+90392">Cyprus North (+90392)</option>-->
	<!--	<option data-countryCode="CY" value="+357">Cyprus South (+357)</option>-->
	<!--	<option data-countryCode="CZ" value="+42">Czech Republic (+42)</option>-->
	<!--	<option data-countryCode="DK" value="+45">Denmark (+45)</option>-->
	<!--	<option data-countryCode="DJ" value="+253">Djibouti (+253)</option>-->
	<!--	<option data-countryCode="DM" value="+1809">Dominica (+1809)</option>-->
	<!--	<option data-countryCode="DO" value="+1809">Dominican Republic (+1809)</option>-->
	<!--	<option data-countryCode="EC" value="+593">Ecuador (+593)</option>-->
	<!--	<option data-countryCode="EG" value="+20">Egypt (+20)</option>-->
	<!--	<option data-countryCode="SV" value="+503">El Salvador (+503)</option>-->
	<!--	<option data-countryCode="GQ" value="+240">Equatorial Guinea (+240)</option>-->
	<!--	<option data-countryCode="ER" value="+291">Eritrea (+291)</option>-->
	<!--	<option data-countryCode="EE" value="+372">Estonia (+372)</option>-->
	<!--	<option data-countryCode="ET" value="+251">Ethiopia (+251)</option>-->
	<!--	<option data-countryCode="FK" value="+500">Falkland Islands (+500)</option>-->
	<!--	<option data-countryCode="FO" value="+298">Faroe Islands (+298)</option>-->
	<!--	<option data-countryCode="FJ" value="+679">Fiji (+679)</option>-->
	<!--	<option data-countryCode="FI" value="+358">Finland (+358)</option>-->
	<!--	<option data-countryCode="FR" value="+33">France (+33)</option>-->
	<!--	<option data-countryCode="GF" value="+594">French Guiana (+594)</option>-->
	<!--	<option data-countryCode="PF" value="+689">French Polynesia (+689)</option>-->
	<!--	<option data-countryCode="GA" value="+241">Gabon (+241)</option>-->
	<!--	<option data-countryCode="GM" value="+220">Gambia (+220)</option>-->
	<!--	<option data-countryCode="GE" value="+7880">Georgia (+7880)</option>-->
	<!--	<option data-countryCode="DE" value="+49">Germany (+49)</option>-->
	<!--	<option data-countryCode="GH" value="+233">Ghana (+233)</option>-->
	<!--	<option data-countryCode="GI" value="+350">Gibraltar (+350)</option>-->
	<!--	<option data-countryCode="GR" value="+30">Greece (+30)</option>-->
	<!--	<option data-countryCode="GL" value="+299">Greenland (+299)</option>-->
	<!--	<option data-countryCode="GD" value="+1473">Grenada (+1473)</option>-->
	<!--	<option data-countryCode="GP" value="+590">Guadeloupe (+590)</option>-->
	<!--	<option data-countryCode="GU" value="+671">Guam (+671)</option>-->
	<!--	<option data-countryCode="GT" value="+502">Guatemala (+502)</option>-->
	<!--	<option data-countryCode="GN" value="+224">Guinea (+224)</option>-->
	<!--	<option data-countryCode="GW" value="+245">Guinea - Bissau (+245)</option>-->
	<!--	<option data-countryCode="GY" value="+592">Guyana (+592)</option>-->
	<!--	<option data-countryCode="HT" value="+509">Haiti (+509)</option>-->
	<!--	<option data-countryCode="HN" value="+504">Honduras (+504)</option>-->
	<!--	<option data-countryCode="HK" value="+852">Hong Kong (+852)</option>-->
	<!--	<option data-countryCode="HU" value="+36">Hungary (+36)</option>-->
	<!--	<option data-countryCode="IS" value="+354">Iceland (+354)</option>-->
	<!--	<option data-countryCode="ID" value="+62">Indonesia (+62)</option>-->
	<!--	<option data-countryCode="IR" value="+98">Iran (+98)</option>-->
	<!--	<option data-countryCode="IQ" value="+964">Iraq (+964)</option>-->
	<!--	<option data-countryCode="IE" value="+353">Ireland (+353)</option>-->
	<!--	<option data-countryCode="IL" value="+972">Israel (+972)</option>-->
	<!--	<option data-countryCode="IT" value="+39">Italy (+39)</option>-->
	<!--	<option data-countryCode="JM" value="+1876">Jamaica (+1876)</option>-->
	<!--	<option data-countryCode="JP" value="+81">Japan (+81)</option>-->
	<!--	<option data-countryCode="JO" value="+962">Jordan (+962)</option>-->
	<!--	<option data-countryCode="KZ" value="+7">Kazakhstan (+7)</option>-->
	<!--	<option data-countryCode="KE" value="+254">Kenya (+254)</option>-->
	<!--	<option data-countryCode="KI" value="+686">Kiribati (+686)</option>-->
	<!--	<option data-countryCode="KP" value="+850">Korea North (+850)</option>-->
	<!--	<option data-countryCode="KR" value="+82">Korea South (+82)</option>-->
	<!--	<option data-countryCode="KW" value="+965">Kuwait (+965)</option>-->
	<!--	<option data-countryCode="KG" value="+996">Kyrgyzstan (+996)</option>-->
	<!--	<option data-countryCode="LA" value="+856">Laos (+856)</option>-->
	<!--	<option data-countryCode="LV" value="+371">Latvia (+371)</option>-->
	<!--	<option data-countryCode="LB" value="+961">Lebanon (+961)</option>-->
	<!--	<option data-countryCode="LS" value="+266">Lesotho (+266)</option>-->
	<!--	<option data-countryCode="LR" value="+231">Liberia (+231)</option>-->
	<!--	<option data-countryCode="LY" value="+218">Libya (+218)</option>-->
	<!--	<option data-countryCode="LI" value="+417">Liechtenstein (+417)</option>-->
	<!--	<option data-countryCode="LT" value="+370">Lithuania (+370)</option>-->
	<!--	<option data-countryCode="LU" value="+352">Luxembourg (+352)</option>-->
	<!--	<option data-countryCode="MO" value="+853">Macao (+853)</option>-->
	<!--	<option data-countryCode="MK" value="+389">Macedonia (+389)</option>-->
	<!--	<option data-countryCode="MG" value="+261">Madagascar (+261)</option>-->
	<!--	<option data-countryCode="MW" value="+265">Malawi (+265)</option>-->
	<!--	<option data-countryCode="MY" value="+60">Malaysia (+60)</option>-->
	<!--	<option data-countryCode="MV" value="+960">Maldives (+960)</option>-->
	<!--	<option data-countryCode="ML" value="+223">Mali (+223)</option>-->
	<!--	<option data-countryCode="MT" value="+356">Malta (+356)</option>-->
	<!--	<option data-countryCode="MH" value="+692">Marshall Islands (+692)</option>-->
	<!--	<option data-countryCode="MQ" value="+596">Martinique (+596)</option>-->
	<!--	<option data-countryCode="MR" value="+222">Mauritania (+222)</option>-->
	<!--	<option data-countryCode="YT" value="+269">Mayotte (+269)</option>-->
	<!--	<option data-countryCode="MX" value="+52">Mexico (+52)</option>-->
	<!--	<option data-countryCode="FM" value="+691">Micronesia (+691)</option>-->
	<!--	<option data-countryCode="MD" value="+373">Moldova (+373)</option>-->
	<!--	<option data-countryCode="MC" value="+377">Monaco (+377)</option>-->
	<!--	<option data-countryCode="MN" value="+976">Mongolia (+976)</option>-->
	<!--	<option data-countryCode="MS" value="+1664">Montserrat (+1664)</option>-->
	<!--	<option data-countryCode="MA" value="+212">Morocco (+212)</option>-->
	<!--	<option data-countryCode="MZ" value="+258">Mozambique (+258)</option>-->
	<!--	<option data-countryCode="MN" value="+95">Myanmar (+95)</option>-->
	<!--	<option data-countryCode="NA" value="+264">Namibia (+264)</option>-->
	<!--	<option data-countryCode="NR" value="+674">Nauru (+674)</option>-->
	<!--	<option data-countryCode="NP" value="+977">Nepal (+977)</option>-->
	<!--	<option data-countryCode="NL" value="+31">Netherlands (+31)</option>-->
	<!--	<option data-countryCode="NC" value="+687">New Caledonia (+687)</option>-->
	<!--	<option data-countryCode="NZ" value="+64">New Zealand (+64)</option>-->
	<!--	<option data-countryCode="NI" value="+505">Nicaragua (+505)</option>-->
	<!--	<option data-countryCode="NE" value="+227">Niger (+227)</option>-->
	<!--	<option data-countryCode="NG" value="+234">Nigeria (+234)</option>-->
	<!--	<option data-countryCode="NU" value="+683">Niue (+683)</option>-->
	<!--	<option data-countryCode="NF" value="+672">Norfolk Islands (+672)</option>-->
	<!--	<option data-countryCode="NP" value="+670">Northern Marianas (+670)</option>-->
	<!--	<option data-countryCode="NO" value="+47">Norway (+47)</option>-->
	<!--	<option data-countryCode="OM" value="+968">Oman (+968)</option>-->
	<!--	<option data-countryCode="PW" value="+680">Palau (+680)</option>-->
	<!--	<option data-countryCode="PA" value="+507">Panama (+507)</option>-->
	<!--	<option data-countryCode="PG" value="+675">Papua New Guinea (+675)</option>-->
	<!--	<option data-countryCode="PY" value="+595">Paraguay (+595)</option>-->
	<!--	<option data-countryCode="PE" value="+51">Peru (+51)</option>-->
	<!--	<option data-countryCode="PH" value="+63">Philippines (+63)</option>-->
	<!--	<option data-countryCode="PL" value="+48">Poland (+48)</option>-->
	<!--	<option data-countryCode="PT" value="+351">Portugal (+351)</option>-->
	<!--	<option data-countryCode="PR" value="+1787">Puerto Rico (+1787)</option>-->
	<!--	<option data-countryCode="QA" value="+974">Qatar (+974)</option>-->
	<!--	<option data-countryCode="RE" value="+262">Reunion (+262)</option>-->
	<!--	<option data-countryCode="RO" value="+40">Romania (+40)</option>-->
	<!--	<option data-countryCode="RU" value="+7">Russia (+7)</option>-->
	<!--	<option data-countryCode="RW" value="+250">Rwanda (+250)</option>-->
	<!--	<option data-countryCode="SM" value="+378">San Marino (+378)</option>-->
	<!--	<option data-countryCode="ST" value="+239">Sao Tome & Principe (+239)</option>-->
	<!--	<option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>-->
	<!--	<option data-countryCode="SN" value="+221">Senegal (+221)</option>-->
	<!--	<option data-countryCode="CS" value="+381">Serbia (+381)</option>-->
	<!--	<option data-countryCode="SC" value="+248">Seychelles (+248)</option>-->
	<!--	<option data-countryCode="SL" value="+232">Sierra Leone (+232)</option>-->
	<!--	<option data-countryCode="SG" value="+65">Singapore (+65)</option>-->
	<!--	<option data-countryCode="SK" value="+421">Slovak Republic (+421)</option>-->
	<!--	<option data-countryCode="SI" value="+386">Slovenia (+386)</option>-->
	<!--	<option data-countryCode="SB" value="+677">Solomon Islands (+677)</option>-->
	<!--	<option data-countryCode="SO" value="+252">Somalia (+252)</option>-->
	<!--	<option data-countryCode="ZA" value="+27">South Africa (+27)</option>-->
	<!--	<option data-countryCode="ES" value="+34">Spain (+34)</option>-->
	<!--	<option data-countryCode="LK" value="+94">Sri Lanka (+94)</option>-->
	<!--	<option data-countryCode="SH" value="+290">St. Helena (+290)</option>-->
	<!--	<option data-countryCode="KN" value="+1869">St. Kitts (+1869)</option>-->
	<!--	<option data-countryCode="SC" value="+1758">St. Lucia (+1758)</option>-->
	<!--	<option data-countryCode="SD" value="+249">Sudan (+249)</option>-->
	<!--	<option data-countryCode="SR" value="+597">Suriname (+597)</option>-->
	<!--	<option data-countryCode="SZ" value="+268">Swaziland (+268)</option>-->
	<!--	<option data-countryCode="SE" value="+46">Sweden (+46)</option>-->
	<!--	<option data-countryCode="CH" value="+41">Switzerland (+41)</option>-->
	<!--	<option data-countryCode="SI" value="+963">Syria (+963)</option>-->
	<!--	<option data-countryCode="TW" value="+886">Taiwan (+886)</option>-->
	<!--	<option data-countryCode="TJ" value="+7">Tajikstan (+7)</option>-->
	<!--	<option data-countryCode="TH" value="+66">Thailand (+66)</option>-->
	<!--	<option data-countryCode="TG" value="+228">Togo (+228)</option>-->
	<!--	<option data-countryCode="TO" value="+676">Tonga (+676)</option>-->
	<!--	<option data-countryCode="TT" value="+1868">Trinidad & Tobago (+1868)</option>-->
	<!--	<option data-countryCode="TN" value="+216">Tunisia (+216)</option>-->
	<!--	<option data-countryCode="TR" value="+90">Turkey (+90)</option>-->
	<!--	<option data-countryCode="TM" value="+7">Turkmenistan (+7)</option>-->
	<!--	<option data-countryCode="TM" value="+993">Turkmenistan (+993)</option>-->
	<!--	<option data-countryCode="TC" value="+1649">Turks & Caicos Islands (+1649)</option>-->
	<!--	<option data-countryCode="TV" value="+688">Tuvalu (+688)</option>-->
	<!--	<option data-countryCode="UG" value="+256">Uganda (+256)</option>-->
	<!--	<option data-countryCode="GB" value="+44">UK (+44)</option>-->
	<!--	<option data-countryCode="UA" value="+380">Ukraine (+380)</option>-->
	<!--	<option data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>-->
	<!--	<option data-countryCode="UY" value="+598">Uruguay (+598)</option>-->
	<!--	<option data-countryCode="US" value="+1">USA (+1)</option>-->
	<!--	<option data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>-->
	<!--	<option data-countryCode="VU" value="+678">Vanuatu (+678)</option>-->
	<!--	<option data-countryCode="VA" value="+379">Vatican City (+379)</option>-->
	<!--	<option data-countryCode="VE" value="+58">Venezuela (+58)</option>-->
	<!--	<option data-countryCode="VN" value="+84">Vietnam (+84)</option>-->
	<!--	<option data-countryCode="VG" value="+84">Virgin Islands - British (+1284)</option>-->
	<!--	<option data-countryCode="VI" value="+84">Virgin Islands - US (+1340)</option>-->
	<!--	<option data-countryCode="WF" value="+681">Wallis & Futuna (+681)</option>-->
	<!--	<option data-countryCode="YE" value="+969">Yemen (North)(+969)</option>-->
	<!--	<option data-countryCode="YE" value="+967">Yemen (South)(+967)</option>-->
	<!--	<option data-countryCode="ZM" value="+260">Zambia (+260)</option>-->
	<!--	<option data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>-->
	<!--</optgroup>-->
</select>                    <input type="text" class="con-field" name="mobile" placeholder="Mobile" required
                      pattern="[0-9]{10}">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <!-- <input class="con-field" name="email" required="" id="email" placeholder="Email" type="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"> -->
                    <input type="email" class="con-field" name="email" placeholder="Email ID" required
                      pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <!-- <textarea class="con-field" name="message" id="message" rows="6" onpaste="return false"  placeholder="Your Message" required=""></textarea> -->
                    <textarea class="con-field" name="message" rows="6" placeholder="Message" required style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;"></textarea>
                  </div>
                </div>
                <div class="col-sm-12">
                  <!-- <div class="g-recaptcha" data-sitekey="6LeT4CUiAAAAAO4Ns9Q_yHrl_gdVBFxnblHXRZbM"></div>  -->
                  <!-- <div class="g-recaptcha" data-sitekey="6LeT4CUiAAAAAO4Ns9Q_yHrl_gdVBFxnblHXRZbM"></div> -->
                </div>
              </div>
                <!-- <div class="col-md-12 mb-3">-->
                <!-- <div class="g-recaptcha"-->
                <!--  data-sitekey="6LcS9eAsAAAAACCGVEo4psmb0S7p9nYuT8dwnUvJ">-->
                <!--</div>-->
                <!--</div>-->
                <div class="col-md-12 mb-3">
                 <div class="g-recaptcha"
                  data-sitekey="6LcS9eAsAAAAACCGVEo4psmb0S7p9nYuT8dwnUvJ">
                 </div>
                </div>

              <!-- <button type="submit" name="submit" class="btn">SEND MESSAGE</button> -->
              <!-- <input type="hidden" name="source" class="source" value="Seo" /> -->
              <input type="text" name="formflag" class="formflag" value="" />
              <button type="submit" name="submit" value="submit" class="btn send_btn" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;">SEND MESSAGE</button>
            </form>
            
          </div>
          <style>
              .expore-more .btn, .project-site-visit .btn, .send_btn{
    border: 1px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?> ;
}
          </style>
        </div>
        <?php
 

// Fetch contact details from the database
$all = $conn->query("SELECT mobile, email, whatsapp, address, google_map FROM profile_settings LIMIT 1");

if ($all && $all->num_rows > 0) {
    $row = $all->fetch_assoc();
    $mobile = htmlspecialchars($row['mobile']);
    $whatsapp = htmlspecialchars($row['whatsapp']);
    $email = htmlspecialchars($row['email']);
    $address = htmlspecialchars($row['address']);
    $map = htmlspecialchars($row['google_map']);
    
    ?>
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="contact-img">
            <iframe
             src="<?= $map ?>"
              width="100%" height="390" style="border: 3px solid #b4b4b4; border-radius: 5px;" allowfullscreen=""
              loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- 1114, Gulshan 129, Sector 129, Noida, Uttar Pradesh, 201304 -->
<!-- +91-9311660227, 9560106237 -->
<!-- care@prayatnarealty.com -->



  <section class="contact-points">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 mt-5">
          <div class="address" >
            <div class="address-img"  style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
              <img src="images/home.png" class="img-fluid" alt="" >
            </div>
            <h2>Address</h2>
            <p><?= $address ?></p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mt-5">
          <div class="Phone">
            <div class="address-img" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
              <img src="images/telephone-call.png" class="img-fluid" alt="">
            </div>
            <h2>Phone</h2>
            <p>
  <a href="tel:<?= $mobile ?>"><?= $mobile ?></a>, 
  <a href="tel:<?= $whatsapp ?>"><?= $whatsapp ?></a>
</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mt-5">
          <div class="email">
            <div class="address-img" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>;">
              <img src="images/email.png" class="img-fluid" alt="">
            </div>
            <h2>Email</h2>
            <p><a href="mailto:<?= $email ?>" style="text-decoration: none;"><?= $email ?></a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

      <?php
}
?>

  <!-- <section class="project-our">
    <div class="project-head">
      <h1>OUR PROJECT LOCATION<br><strong>LUXURY APARTMENTS IN INDIA</strong></h1>
    </div>
    <div class="call-points">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="gurgaon-himachal-1">
              <h3 style="background-color:rgb(255, 111, 54);">Gurgaon&nbsp;|&nbsp;Himachal</h3>
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="detail">
                    <a href="tel:+910000000000"><i class="fa fa-phone" aria-hidden="true"></i></a>&nbsp;
                    <a href="https://api.whatsapp.com/send?phone=+910000000000&amp;text=Hi!%20Im%20Interested%20in%20Your%20Luxury%20Project.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences."
                      class="whatsapp" ><i class="fa fa-whatsapp" aria-hidden="true"></i></a>&nbsp;
                    <a href="tel:+910000000000">+91 0000000000</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="gurgaon-himachal-1">
              <h3 style="background-color:rgb(255, 111, 54);">Bangalore&nbsp;|&nbsp;Chennai&nbsp;|&nbsp;Pune</h3>
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="detail">
                    <a href="tel:+910000000000"><i class="fa fa-phone" aria-hidden="true"></i></a>&nbsp;
                    <a href="https://api.whatsapp.com/send?phone=+910000000000&amp;text=Hi!%20Im%20Interested%20in%20Your%20Luxury%20Project.%20Please%20Share%20Details,%20Powered%20By%20Luxury%20Residences."
                      class="whatsapp" ><i class="fa fa-whatsapp" aria-hidden="true"></i></a>&nbsp;
                    <a href="tel:+910000000000">+91 0000000000</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="gurgaon-himachal-1">
              <h3 style="background-color:rgb(255, 111, 54);">Delhi&nbsp;|&nbsp;Noida</h3>
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="detail">
                    <a href="tel:+910000000000"><i class="fa fa-phone" aria-hidden="true"></i></a>&nbsp;
                    <a href="https://api.whatsapp.com/send?phone=+910000000000&amp;text=Hi!%20Im%20Interested%20in%20Your%20Luxury%20Project.%20Please%20Share%20Details,%20By%Luxury%20Residences."
                      class="whatsapp" ><i class="fa fa-whatsapp" aria-hidden="true"></i></a>&nbsp;
                    <a href="tel:+910000000000">+91 0000000000</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <style>
    .rera-item {
        background-color: #696969;
        color: #fff;
        text-align: center;
        margin-bottom: 15px;
        padding: 15px;
        font-size: 14px;
    }
    .rera-strip {
        padding: 0;
        background-color: transparent;
    } 
    @media only screen and (max-width: 1320px) {
        .rera-item {
            font-size: 15px;
        }
    }
    @media only screen and (max-width: 1199px) {
        .rera-item {
            font-size: 14px;
        }
    }
    @media only screen and (max-width: 1118px) {
        .rera-item {
            font-size: 13px;
        }
    }
    @media only screen and (max-width: 1049px) {
        .rera-item {
            padding: 8px;
        }
    }
    @media only screen and (max-width: 1007px) {
        .rera-item {
            padding: 8px;
            font-size: 12px;
        }
    }
    @media only screen and (max-width: 991px) {
        .rera-item {
            padding: 9px;
            font-size: 15px;
        }
    }
</style>
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