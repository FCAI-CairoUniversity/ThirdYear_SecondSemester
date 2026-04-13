<?php

// --- 3. Constructor, Destructor, and __toString ---

class Person
{
    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
        echo "Created: {$this->name} (age: {$this->age})<br>";
    }

    // Destructor: runs when object is destroyed (e.g., script ends or unset)
    public function __destruct()
    {
        echo "Destroyed: {$this->name}<br>";
    }

    // __toString: lets you echo the object directly
    public function __toString()
    {
        return "Person: {$this->name}, age: {$this->age}";
    }
}

echo "<h2>3. Constructor, Destructor, __toString</h2>";
$p1 = new Person("Sarah", 25);
echo "As string: $p1<br>";   // uses __toString()

// $p1 is destroyed when script ends, so you'll see "Destroyed: Sarah" at the end
