<?php
$API_KEY = "3459ef62dc8d41c4867104929261703";
$CITY    = $_GET["city"]?? "cairo";

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "http://api.weatherapi.com/v1/forecast.json?key=$API_KEY&q=$CITY&days=3",
    CURLOPT_RETURNTRANSFER => true,
]);

$response = curl_exec($curl);
$err      = curl_error($curl);
// curl_close($curl);

if ($err) {
    die("cURL Error: " . htmlspecialchars($err));
}

$data = json_decode($response, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Invalid JSON from API");
}

$location = $data['location'];
$current  = $data['current'];
$days     = $data['forecast']['forecastday'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Weather in <?php echo htmlspecialchars($location['name']); ?></title>
 <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="container">

    <!-- CURRENT WEATHER -->
    <div class="current-card">
        <div class="current-left">
            <div class="icon">
                <img src="https:<?php echo htmlspecialchars($current['condition']['icon']); ?>" alt="">
            </div>
            <div>
                <p class="current-temp"><?php echo round($current['temp_c']); ?>°C</p>
                <div class="current-info">
                    <h2><?php echo htmlspecialchars($location['name'] . ', ' . $location['country']); ?></h2>
                    <p><?php echo htmlspecialchars($current['condition']['text']); ?></p>
                    <p>Feels like <?php echo round($current['feelslike_c']); ?>°C ·
                       Humidity <?php echo $current['humidity']; ?>% ·
                       Wind <?php echo round($current['wind_kph']); ?> km/h <?php echo $current['wind_dir']; ?></p>
                </div>
                <div class="meta">
                    Local time: <?php echo htmlspecialchars($location['localtime']); ?><br>
                    Last updated: <?php echo htmlspecialchars($current['last_updated']); ?>
                </div>
            </div>
        </div>
        <div>
            <p><strong>Today</strong></p>
            <p>Max: <?php echo $days[0]['day']['maxtemp_c']; ?>°C</p>
            <p>Min: <?php echo $days[0]['day']['mintemp_c']; ?>°C</p>
            <p>UV: <?php echo $days[0]['day']['uv']; ?></p>
        </div>
    </div>

    <!-- NEXT DAYS (FORECAST) -->
    <h3>3‑day forecast</h3>
    <div class="days">
        <?php foreach ($days as $day): ?>
            <?php
                $dateTs   = strtotime($day['date']);
                $dayName  = date('l', $dateTs);  // e.g. Tuesday
                $icon     = $day['day']['condition']['icon'];
                $text     = $day['day']['condition']['text'];
            ?>
            <div class="day-card">
                <div class="day-name"><?php echo htmlspecialchars($dayName); ?></div>
                <div><?php echo htmlspecialchars($day['date']); ?></div>
                <div><img src="https:<?php echo htmlspecialchars($icon); ?>" alt=""></div>
                <div class="day-temp">
                    <strong><?php echo $day['day']['maxtemp_c']; ?>°C</strong> /
                    <?php echo $day['day']['mintemp_c']; ?>°C
                </div>
                <div><?php echo htmlspecialchars($text); ?></div>
                <div class="day-extra">
                    Humidity: <?php echo $day['day']['avghumidity']; ?>% ·
                    Wind: <?php echo $day['day']['maxwind_kph']; ?> km/h
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- HOURLY FOR TODAY -->
    <h3>Today hourly (few hours)</h3>
    <table>
        <tr>
            <th>Time</th>
            <th>Cond.</th>
            <th>Temp (°C)</th>
            <th>Feels (°C)</th>
            <th>Wind (km/h)</th>
            <th>Humidity (%)</th>
        </tr>
        <?php
        $todayHours = $days[0]['hour'];
        // example: just show all hours; you can slice if needed
        foreach ($todayHours as $hour) {
            $parts     = explode(' ', $hour['time']);
            $shortTime = $parts[1] ?? $hour['time'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($shortTime); ?></td>
                <td><?php echo htmlspecialchars(trim($hour['condition']['text'])); ?></td>
                <td><?php echo $hour['temp_c']; ?></td>
                <td><?php echo $hour['feelslike_c']; ?></td>
                <td><?php echo round($hour['wind_kph']); ?> (<?php echo $hour['wind_dir']; ?>)</td>
                <td><?php echo $hour['humidity']; ?></td>
            </tr>
        <?php } ?>
    </table>

</div>
</body>
</html>
