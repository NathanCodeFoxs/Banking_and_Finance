<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bank_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
