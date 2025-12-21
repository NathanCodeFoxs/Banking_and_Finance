<?php
require_once __DIR__ . '/env.php';

// Validate encryption environment variables
if (!getenv('ENCRYPTION_KEY') || !getenv('ENCRYPTION_IV')) {
    die('Encryption environment variables are not set.');
}

// Define constants
define('ENCRYPTION_KEY', hash('sha256', getenv('ENCRYPTION_KEY'), true));
define('ENCRYPTION_IV_BASE', substr(hash('sha256', getenv('ENCRYPTION_IV')), 0, 16));

/**
 * Encrypt data using AES-256-CBC with a random IV.
 * The IV is prepended to the encrypted data.
 */
function encryptData($data) {
    if ($data === null || $data === '') return null;

    $iv = random_bytes(16); // 16 bytes = 128-bit IV
    $encrypted = openssl_encrypt(
        (string)$data,
        'AES-256-CBC',
        ENCRYPTION_KEY,
        OPENSSL_RAW_DATA,
        $iv
    );

    // Prepend IV and encode
    return base64_encode($iv . $encrypted);
}

/**
 * Decrypt data using AES-256-CBC.
 * Expects the IV to be prepended to the encrypted data.
 */
function decryptData($data) {
    if ($data === null || $data === '') return null;

    $raw = base64_decode($data);
    $iv = substr($raw, 0, 16);
    $ciphertext = substr($raw, 16);

    return openssl_decrypt(
        $ciphertext,
        'AES-256-CBC',
        ENCRYPTION_KEY,
        OPENSSL_RAW_DATA,
        $iv
    );
}