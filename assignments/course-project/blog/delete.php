<?php
// Connect to the database
require 'connect.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ensure an ID was provided
if (!isset($_GET['id'])) { 
    header("Location: index.php"); 
    exit; 
}

$id = $_GET['id'];

// Delete the post
$sql = "DELETE FROM posts WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Redirect back to the main page
header("Location: index.php");
exit();
