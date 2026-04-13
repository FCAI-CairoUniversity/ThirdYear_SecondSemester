<?php
// --- 1. Basic Class & Object ---

// A simple class with properties and methods
class Car
{
    public $brand;   // public property: can be accessed from outside
    public $color;

    // Constructor: runs when "new Car(...)"
    public function __construct($brand, $color)
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    // Method that uses object properties
    public function showInfo()
    {
        echo "Car: {$this->brand}, color: {$this->color}<br>";
    }
}

// Create objects (instances) of the Car class
$car1 = new Car("Toyota", "Red");
$car2 = new Car("Honda", "Blue");

echo "<h2>1. Basic Class & Object</h2>";
$car1->showInfo();   // "Car: Toyota, color: Red"
$car2->showInfo();   // "Car: Honda, color: Blue"