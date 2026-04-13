<?php
/**
 * Weather API handler using PHP cURL
 * Returns 3-day forecast for given city
 */

// 1. CONFIGURATION
$API_KEY = "3459ef62dc8d41c4867104929261703";  // Your WeatherAPI key
$CITY    = $_GET["city"] ?? "cairo";              // City from URL param (?city=Alexandria), default: Cairo

// 2. BUILD cURL REQUEST
$curl = curl_init();  // Initialize cURL session

curl_setopt_array($curl, [
    CURLOPT_URL => "http://api.weatherapi.com/v1/forecast.json?key=$API_KEY&q=$CITY&days=3",
        // Full API URL with key, city, and 3-day forecast
    CURLOPT_RETURNTRANSFER => true,
        // Return response as string (don't output directly)
    CURLOPT_TIMEOUT => 10,
        // 10-second timeout to avoid hanging
]);

// 3. EXECUTE REQUEST
$response = curl_exec($curl);     // Send request and get response
$err      = curl_error($curl);    // Get any cURL errors

 //curl_close($curl);  // Uncomment when not debugging

// 4. HANDLE RESPONSE
if ($err) {
    // cURL failed (network, timeout, etc.)
    die("cURL Error: " . htmlspecialchars($err));
} else {
    // Success - return raw JSON to frontend
    header('Content-Type: application/json');
    echo $response;
}
?>