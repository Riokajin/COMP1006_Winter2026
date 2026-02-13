<?php
include 'connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$date = $_POST['date'];
$body = $_POST['body'];
$category = $_POST['category'];

$sql = "UPDATE posts SET title = :title, date = :date, body = :body, category = :category WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':date', $date);
$stmt->bindParam(':body', $body);
$stmt->bindParam(':category', $category);
$stmt->bindParam(':id', $id);

$stmt->execute();

header("Location: index.php");
exit();
