<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = $conn->real_escape_string($_POST['account_number']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE account_number='$account_number'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_account'] = $account_number;
            $_SESSION['user_name'] = $row['name'];
            header("Location: ../Dashboard.php");  // redirect to dashboard
            exit();
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "Account Number not registered!";
    }
}
?>