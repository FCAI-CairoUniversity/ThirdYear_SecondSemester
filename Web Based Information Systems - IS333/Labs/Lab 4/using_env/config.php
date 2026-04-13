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
function getDbConfig($user = 'root') {
    global $env;
    return [
        'host' => $env['DB_HOST'] ?? 'localhost',
        'dbname' => $env['DB_NAME'] ?? 'mydb',
        'user' => $env['DB_' . strtoupper($user)] ?? 'root',
        'pass' => $env['DB_' . strtoupper($user) . '_PASS'] ?? ''
    ];
}
?>