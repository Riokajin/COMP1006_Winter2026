<?php
// car.php
// This file defines a simple Car class with basic properties and a method
// to return formatted information about the car.

class Car {

    // Properties for the car
    public $make;
    public $model;
    public $year;

    // Constructor runs automatically when creating a new Car object
    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Method to return car information as a string
    public function getCarInfo() {
        return "Make: {$this->make}, Model: {$this->model}, Year: {$this->year}";
    }
}