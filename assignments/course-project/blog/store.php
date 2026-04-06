<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
    Phase One Review

    For this phase I built a simple Blog/CMS with full CRUD using PHP, MySQL, and Bootstrap. Everything worked pretty smoothly, but the reCAPTCHA part took the longest. The info online is scattered across a bunch of different pages, so it took some time to figure out how the widget, the keys, and the server-side verification all fit together. I ended up piecing it together using the official Google docs plus a clearer walkthrough from GeeksforGeeks. Once I understood the flow, the rest of the project came together well.

    Sources: 
    - Google reCAPTCHA Documentation (client + server)
    - GeeksforGeeks — “How to Integrate Google reCAPTCHA in PHP"
 */

// Connect to the database
include 'connect.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$errors = [];

// Server side validation

// Title validation
if (empty($_POST['title'])) {
    $errors[] = "Title is required.";
} elseif (strlen($_POST['title']) < 3) {
    $errors[] = "Title must be at least 3 characters.";
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
    foreach ($errors as $e) {
        echo "<p>$e</p>";
    }
    exit;
}




// Collect form data
$title = $_POST['title'];
$date = $_POST['date'];
$body = $_POST['body'];
$category = $_POST['category'];
// Image upload handling
$imageName = null;

if (!empty($_FILES['image']['name'])) {

    // Create upload folder if missing
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true); //directory name, permissions, and create parent directories if needed
    }

    $targetDir = "uploads/";
    $imageName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $imageName;

    // Allowed file types
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (!in_array($_FILES['image']['type'], $allowedTypes)) {
        die("Invalid file type. Only JPG, PNG, and GIF allowed.");
    }

    // Move file to uploads folder
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        die("Error uploading file.");
    }
}
// Insert the new post into the database
$sql = "INSERT INTO posts (title, date, body, category, image) VALUES (:title, :date, :body, :category, :image)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':body', $body);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':image', $imageName);

$stmt->execute();

// Redirect back to the main page
header("Location: index.php");
exit();
