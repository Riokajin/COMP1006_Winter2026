<?php


// Start session before redirecting (login page is the only page that may redirect before loading header)
session_start();

// If the user is already logged in, redirect them away from login
if (isset($_SESSION['user_id'])) {
header("Location: index.php");
exit;
}
// Load header and database connection
require 'connect.php';
require 'header.php';
?>

<h1 class="mb-4">Login</h1>

<form action="login_process.php" method="POST" class="mb-5">

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

    <button type="submit" class="btn btn-primary">Login</button>
    <p class="mt-3">
        Don't have an account?
        <a href="register.php">Register here</a>.
    </p>
</form>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php require 'footer.php'; ?>