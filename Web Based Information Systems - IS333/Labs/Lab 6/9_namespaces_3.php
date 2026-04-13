<?php
// --- 9. Namespaces ---

// 2. Using the "use" keyword to alias (shorter names)
require_once  '9_namespaces_1.php';
use MyApp\Utils\StringHelper;
use MyApp\Models\User as UserModel;
use MyApp\Auth\User as AuthUser;

echo "<h3>Using 'use' to shorten names</h3>";

echo StringHelper::shout("bye bye") . "<br>";

$user3 = new UserModel("Ahmed");
echo $user3->greet() . "<br>";

$user4 = new AuthUser("developer");
echo $user4->login() . "<br>";