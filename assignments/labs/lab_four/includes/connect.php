<?php 
// connect.php
// Establishes a connection to the subscribers_db database using PDO. This file is included anywhere database access is required (process.php, subscribers.php)

// Create a new PDO connection (host, database name, username, password)
$conn = new PDO("mysql:host=localhost;dbname=subscribers_db", "root", "");
// Enable exception mode so PDO throws errors if something goes wrong 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);