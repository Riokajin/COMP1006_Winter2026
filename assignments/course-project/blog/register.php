<?php

// Start the session (needed for login checks later)
session_start();

// Load header and database connection
require 'connect.php';
require 'header.php';

// If the user is already logged in, redirect them away from registration
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<h1 class="mb-4">Register</h1>

<form action="register_process.php" method="POST" class="mb-5">

    <div class="mb-3">
        <label class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password:</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <!-- Google reCAPTCHA -->
    <div class="g-recaptcha mb-3" data-sitekey="6Ld4umssAAAAAF49w5Hzc5KZDrPA-_-A4Hj1Fawx"></div>

    <button type="submit" class="btn btn-primary">Create Account</button>
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php require 'footer.php'; ?>