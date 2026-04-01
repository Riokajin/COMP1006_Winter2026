<?php
// Connect to the database
require 'connect.php';

// Ensure the form was submitted with an ID
if (!isset($_POST['id'])) {
    header("Location: index.php");
    exit;
}

// Server side validation
$errors = [];

// Title validation
if (empty($_POST['title'])) {
    $errors[] = "Title is required.";
} elseif (strlen($_POST['title']) < 3) {
    $errors[] = "Title must be at least 3 character.";
}

// Date validation
if (empty($_POST['date']) || !strtotime($_POST['date'])) {
    $errors[] = "A valid date is required.";
}

// Body validation
if (empty($_POST['body'])) {
    $errors[] = "Body is required.";
} elseif (strlen($_POST['body']) < 10) {
    $errors[] = "Body must be at least 10 characters.";
}

// Category validation
if (empty($_POST['category'])) {
    $errors[] = "Category is required.";
} elseif (!preg_match('/^[A-Za-z0-9 ]+$/', $_POST['category'])) {
    $errors[] = "Category contains invalid characters.";
}

// If there are errors, show them and stop
if (!empty($errors)) {
    foreach($errors as $e) {
        echo "<p>$e</p>";
    }
    exit;
}

// Collect form data
$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$body = $_POST['body'];
$category = $_POST['category'];

// Update the post in the database
$sql = "UPDATE posts SET title = :title, date = :date, body = :body, category = :category WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':body', $body);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

$stmt->execute();

// Redirect back to the main page
header("Location: index.php");
exit();
