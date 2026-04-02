<?php
session_start();
require 'connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute query
$query = "SELECT * FROM users WHERE email = :email LIMIT 1";
$stmt = $conn->prepare($query);
$stmt->bindValue(':email', $email);
$stmt->execute();

$user = $stmt->fetch();

// Verify user exists and password matches
if ($user && password_verify($password, $user['password'])) {

    // Store user info in session
    $_SESSION['user_id'] = $user['id'];

    // Redirect to homepage
    header("Location: index.php");
    exit;

} else {
    //Invalid logins redirect back with an error
    header("Location: login.php");
    exit;
}
?>