<?php

$host = '172.31.22.43';
$dbname = 'Adam100142217';
$username = 'Adam100142217';
$password = 'AArOpsPfhZ';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>