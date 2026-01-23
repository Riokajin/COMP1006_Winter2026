<?php
// connect.php
// This file connects to a MySQL database using PDO.

// Database connection settings
$host = "localhost";
$dbname = "lab_one";   // your database name
$username = "root";
$password = "";        // XAMPP default is empty

// Build the DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname";

try {
    // Create the PDO connection
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Display an error message if the connection fails
    echo "Connection failed: " . $e->getMessage();
}