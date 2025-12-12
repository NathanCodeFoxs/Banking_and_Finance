<?php
$servername = "localhost";
$username = "root";
$password = ""; // MySQL root password
$dbname = "bank_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
