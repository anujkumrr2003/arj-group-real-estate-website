 <section class="meeting same-section" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color: <?= htmlspecialchars($profile_row['background_color']) ?>;">
    <div class="container">
      <div class="sehedule">
        <h2 style="color: <?= htmlspecialchars($profile_row['background_color']) ?>; font-family: 'Cardo', serif;">Schedule a Meeting</h2>
        <div class="radio-form-start">
          <div class="radio-one">
            <h2><b style="color:<?= htmlspecialchars($profile_row['background_color']) ?>;font-family: 'Cardo', serif;">Have any question ?</b></h2>
            <p>Lets start the conversation</p>
            

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

window.location='about.php';

</script>

";

}

?>

            <form action="" method="post" id="contact-form">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <input type="text" class="con-field" name="name" placeholder="First Name" required=""
                    pattern="[a-zA-Z][a-zA-Z0-9\s]*"  style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;" />
                </div>
                <div class="col-sm-12 col-md-6">
                  <input type="text" class="con-field" name="lname" placeholder="Last Name" required=""
                    pattern="[a-zA-Z][a-zA-Z0-9\s]*"  style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;" />
                </div>
                <div class="col-sm-12 col-md-6">
                  <input class="con-field" name="mobile" required="" id="phone" placeholder="Phone" type="text"
                    pattern="[0-9]{10}" style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;"/>
                </div>
                <div class="col-sm-12 col-md-6">
                  <input class="con-field" name="email" required="" id="email" placeholder="Email" type="email"
                    pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}"  style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;" />
                </div>
                <div class="col-md-12">
                  <textarea class="con-field" name="message" id="message" rows="4" onpaste="return false"
                    placeholder="Your Message" required=""  style="border: 2px solid <?= htmlspecialchars($profile_row['heading_text_color']) ?>;"></textarea>
                </div>
                <!-- <div class="col-sm-12">
                  <div class="g-recaptcha" data-sitekey="6LeT4CUiAAAAAO4Ns9Q_yHrl_gdVBFxnblHXRZbM"></div>
                </div> -->
              </div>
              <!-- <input type="hidden" name="source" class="source" value="Seo" /> -->
              <input type="text" name="formflag" class="formflag" value="" />
              <button type="submit" name="submit" class="btn" style="background-color:<?= htmlspecialchars($profile_row['heading_text_color']) ?>; color: <?= htmlspecialchars($profile_row['background_color']) ?>;" >
                SEND MESSAGE
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>