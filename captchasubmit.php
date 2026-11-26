
<?php
session_start();
include "config.php"; // DB connection

// 1. Check CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token");
}

// 2. Validate & sanitize inputs
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$contact = trim($_POST['contact']);

if (empty($name) || empty($email) || empty($contact)) {
    die("All fields are required");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email");
}

// Optional: validate contact number pattern
if (!preg_match('/^\d{10}$/', $contact)) {
    die("Invalid contact number");
}

// 3. Insert safely into database using prepared statements
$stmt = $conn->prepare("INSERT INTO captcha (name, email, contact) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $contact);

if ($stmt->execute()) {
    echo "Form submitted successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
