<?php
// --- 5. Abstract Class & Method ---

// Abstract class: cannot be instantiated directly
abstract class CarBase
{
    public $brand;

    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    // Normal method: can be shared by children
    public function commonFeature()
    {
        echo "All cars have wheels.<br>";
    }

    // Abstract method: children MUST implement it
    abstract public function intro();
}

// Concrete child class that fulfills the abstract contract
class BMW extends CarBase
{
    public function intro()
    {
        echo "This is a {$this->brand} car.<br>";
    }
}

echo "<h2>5. Abstract Class & Method</h2>";
$bmw = new BMW("BMW");
$bmw->commonFeature();   // from parent abstract class
$bmw->intro();           // from implemented abstract method
