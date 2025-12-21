<?php
// Load .env file
$envPath = __DIR__ . '/../.env';
$env = parse_ini_file($envPath, false, INI_SCANNER_RAW);

if (!$env) {
    die('Failed to load .env file. Please check the path.');
}

$servername = $env['DB_HOST'];
$username   = $env['DB_USER'];
$password   = $env['DB_PASS'];
$dbname     = $env['DB_NAME'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
