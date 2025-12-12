<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "bank_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>