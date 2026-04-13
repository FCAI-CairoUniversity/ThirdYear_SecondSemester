<?php
// --- 8. Static Methods & Properties ---

class MathUtils {
    public static $pi = 3.14159;

    // Static method: can be called without creating an object
    public static function add($a, $b) {
        return $a + $b;
    }

    public static function circleArea($radius) {
        return self::$pi * $radius * $radius;
    }
}

echo "<h2>8. Static Methods & Properties</h2>";
echo "MathUtils::pi = " . MathUtils::$pi . "<br>";
echo "2 + 3 = " . MathUtils::add(2, 3) . "<br>";
echo "Circle area (r=5): " . MathUtils::circleArea(5) . "<br>";
