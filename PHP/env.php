<?php

$envPath = __DIR__ . '/../.env';

if (!file_exists($envPath)) {
    die('Environment file not found.');
}

$lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($lines as $line) {
    $line = trim($line);

    // Skip empty lines or comments
    if ($line === '' || strpos($line, '#') === 0) {
        continue;
    }

    // Skip lines without '='
    if (!str_contains($line, '=')) {
        continue;
    }

    [$key, $value] = explode('=', $line, 2);

    $key = trim($key);
    $value = trim($value, " \t\n\r\0\x0B\"'"); // Trim whitespace and optional quotes

    putenv("$key=$value");
}