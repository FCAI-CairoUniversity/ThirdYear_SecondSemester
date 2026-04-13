Lab01 
A>>>>>Downloading & Configuration Tasks
1. Download and install Xamp (if possible don't install it in C drive on windows)
2. Download and install Vscode
3. Download the following extensions in vscode
	3.1 PHP Intelephense
	3.2 PHP Server
4. Configure PHP Server extension by adding path to php.exe and php.ini to the respective configuration fields

B>>>>Lab overview

## Week 1: week1.php (Hello World & Language Basics)
<!DOCTYPE html>
<html>
<head><title>Week 1 Lab</title></head>
<body>
<?php
// 1. Hello World
echo "<h2>1. Hello World</h2>";
echo "<p>Hello, World from PHP!</p>";

// 2. Variables & Ternary
$name = "Student"; $age = 20; $isLearning = true;
echo "<h2>2. Variables</h2>";
echo "<p>Hi, $name. You are $age and learning PHP: " . ($isLearning ? 'yes' : 'no') . "</p>";

// 3. Arithmetic & If/else
$score = 85; $bonus = 5; $total = $score + $bonus;
echo "<h2>3. Grade Check</h2>";
echo "<p>Score: $score + bonus $bonus = $total</p>";
if ($total > 80) {
    echo "<p style='color:green'>Pass!</p>";
} else {
    echo "<p style='color:red'>Retry</p>";
}

// 4. For loop
echo "<h2>4. Numbers 1-10</h2><ul>";
for ($i=1; $i<=10; $i++) {
    echo "<li>$i</li>";
}
echo "</ul>";

?>
</body>
</html>


[php](https://www.php.net/manual/en/tutorial.firstpage.php)