<?php
// --- 4. Inheritance (extends) ---

// Parent class: Fruit
class Fruit
{
    public $name;
    public $color;

    public function __construct($name, $color)
    {
        $this->name  = $name;
        $this->color = $color;
    }

    // Method that child classes can use (or override)
    public function intro()
    {
        echo "The fruit is {$this->name} and the color is {$this->color}.<br>";
    }
}

// Child class: Apple
class Apple extends Fruit
{
    private $sweetness;  // new property just for Apple

    public function __construct($name, $color, $sweetness)
    {
        // Call parent constructor
        parent::__construct($name, $color);
        $this->sweetness = $sweetness;
    }

    // Override intro() method
    public function intro()
    {
        parent::intro();  // also call parent's intro
        echo "Sweetness level: {$this->sweetness}<br>";
    }
}

echo "<h2>4. Inheritance (extends)</h2>";
$apple = new Apple("Fuji", "Red", "Very sweet");
$apple->intro();   // from parent + Apple
