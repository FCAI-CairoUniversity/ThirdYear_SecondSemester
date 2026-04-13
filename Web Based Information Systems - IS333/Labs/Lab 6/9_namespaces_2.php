<?php
// --- 9. Namespaces ---

// global namespace (outside any namespace block)

// How to use classes from other namespaces:

// 1. Using fully qualified names (full path)
require_once  '9_namespaces_1.php';
echo "<h2>9. Namespaces</h2>";

echo MyApp\Utils\StringHelper::shout("hello world") . "<br>";
echo MyApp\Utils\NumberHelper::double(10) . "<br>";

$user1 = new MyApp\Models\User("Kareem");
echo $user1->greet() . "<br>";

$user2 = new MyApp\Auth\User("admin");
echo $user2->login() . "<br>";