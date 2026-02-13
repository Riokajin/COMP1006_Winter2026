<?php
include 'connect.php';

$title = $_POST['title'];
$date = $_POST['date'];
$body = $_POST['body'];
$category = $_POST['category'];

$sql = "INSERT INTO posts (title, date, body, category) VALUES (:title, :date, :body, :category)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':body', $body);
$stmt->bindParam(':category', $category);

$stmt->execute();

header("Location: index.php");
exit();
