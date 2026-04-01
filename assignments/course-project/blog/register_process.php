<?php
// Connect to the database
require 'connect.php';

// Start session
session_start();

//Server-side validation
$errors = [];

// Name validation
if (empty($_POST['name'])) {
    $errors[] = "Name is required.";
} elseif (strlen($_POST['name']) < 2) {
    $errors[] = "Name must be at least 2 characters.";
}

// Email validation
if (empty($_POST['email'])) {
    $errors[] = "Email is required.";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email is required.";
}

// Password validation
if (empty(($_POST['password'])) {
    $errors[] = "Password is required.";
} elseif (strlen($_POST['password']) < 6) {
    $errors[] = "Password must be at least 6 characters.";
}

// If validation errors exist, show them and stop
if (!empty($errors)) {
    foreach ($errors as $e) {
        echo "<p>$e</p>";
    }
    exit;
}

//reCAPTCHA validation

$recaptcha = $_POST['g-recaptcha-response'];
if (!$recaptcha) {
    die("Please complete the reCAPTCHA.");
}

$secret = "6Ld4umssAAAAABujftEIY88Momzj_PuenYtwkrsw";
$response = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha"
);
$responseData = json_decode($response);

if (!$responseData->success) {
    die("reCAPTCHA failed.");
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password before saving
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->fetch()) {
    die("An account with that email already exists.");
}

//Insert the new user

$sql = "INSERT INTO users (name, email, password)
        VALUES (:name; :email, :password)";

$stmt = $conn->prepare($sql);
$stmt->bindParam('name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashedPassword);

$stmt->execute();

// Redirect to login page
header("Location: login.php");
exit;
?>