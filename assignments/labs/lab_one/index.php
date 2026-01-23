<?php
require "header.php";

// Include the Car class
require_once "car.php";

// Include the database connection
require_once "connect.php";

// Create a new Car object
$myCar = new Car("Hyundai", "Elantra", 2019);

// Display the car information
echo "<p>" . $myCar->getCarInfo() . "</p>";

echo "<p> Follow the instructions outlined in instructions.txt to complete this lab. Good luck & have fun!😀 </p>";

/*
Reflection:
the easiest part of this lab was creating the car class and instantiating the object. the most challenging part was setting up the PDO connection because I had to make sure the DSN was correct and the try/catch block was structured properly.
*/

require "footer.php";
