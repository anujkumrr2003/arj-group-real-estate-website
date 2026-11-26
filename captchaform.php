
<?php
session_start();

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['csrf_token'];
?>

<form action="captchasubmit.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="contact" placeholder="Contact" required>
    <button type="submit">Submit</button>
</form>


<!-- dpfgmhdqnsipverl
abhijeetvyas83@gmail.com -->