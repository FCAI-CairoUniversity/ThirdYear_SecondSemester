<?php
// Load .env
$env = [];
if (($handle = fopen('.env', 'r')) !== false) {
    while (($line = fgets($handle)) !== false) {
        $line = trim($line);
        if (strpos($line, '#') === 0 || empty($line)) continue;
        list($key, $value) = explode('=', $line, 2);
        $env[trim($key)] = trim($value, '" ');
    }
    fclose($handle);
}

// Defaults from your files[file:1][file:2]
function getDbConfig() {
    global $env;
    return [
        'host' => $env['DB_HOST'],
        'dbname' => $env['DB_NAME'],
        'user' => $env['DB_USER'],
        'pass' => $env['DB_PASS']
    ];
}
?>