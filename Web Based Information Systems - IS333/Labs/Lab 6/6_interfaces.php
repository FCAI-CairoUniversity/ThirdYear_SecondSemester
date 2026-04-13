<?php
// --- 6. Interface (contract) ---

interface Drivable {
    public function drive();
}

interface Loggable {
    public function log($message);
}

// Class can implement multiple interfaces
class Vehicle implements Drivable, Loggable {
    public $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    // From Drivable
    public function drive() {
        echo "{$this->brand} is driving.<br>";
    }

    // From Loggable
    public function log($message) {
        echo "LOG: [$this->brand] $message<br>";
    }
}

echo "<h2>6. Interfaces (multiple)</h2>";
$vehicle = new Vehicle("Nissan");
$vehicle->drive();
$vehicle->log("Started engine");
