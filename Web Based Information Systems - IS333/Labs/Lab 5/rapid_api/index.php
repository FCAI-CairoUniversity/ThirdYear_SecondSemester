<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Weather by City</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="container">
    <h1>Weather Search</h1>
    <form method="get" action="weather_raw.php">
        <input type="text" name="city" placeholder="Enter city name (e.g. Cairo, London)" required>
        <button type="submit">Get Weather</button>
    </form>
</div>
</body>
</html>
