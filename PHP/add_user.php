<?php
include 'db.php';

$name = "John Doe";
$account_number = "1234567890";
$password = "mypassword"; // this is the password you'll use to log in

// hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// insert into database
$sql = "INSERT INTO users (name, account_number, password) VALUES ('$name', '$account_number', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "User added successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>