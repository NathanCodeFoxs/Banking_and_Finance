<?php
require_once __DIR__ . "/auth.php";
require_once __DIR__ . "/db.php";

$user_id = $_SESSION['user_id'];

// Get POST data
$bill_name = $_POST['bill_name'] ?? '';
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;

if (!$bill_name || $amount <= 0) {
    $_SESSION['payment_error'] = "Invalid bill or amount!";
    header("Location: ../Bills.php");
    exit();
}

// 1. Check user balance
$stmt = $conn->prepare("SELECT balance FROM balances WHERE user_id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();

if ($balance < $amount) {
    $_SESSION['payment_error'] = "Insufficient balance!";
    header("Location: ../Bills.php");
    exit();
}

// 2. Deduct balance
$stmt = $conn->prepare("UPDATE balances SET balance = balance - ? WHERE user_id=?");
$stmt->bind_param("di", $amount, $user_id);
$stmt->execute();
$stmt->close();

// 3. Record bill payment
$stmt = $conn->prepare("INSERT INTO bills_payments (user_id, bill_name, amount, created_at) VALUES (?, ?, ?, NOW())");
$stmt->bind_param("isd", $user_id, $bill_name, $amount);
$stmt->execute();
$stmt->close(); 

// 4. Optional: set success message
$_SESSION['payment_success'] = "You have successfully paid $bill_name of ₱" . number_format($amount, 2);

// Redirect back to Bills page
header("Location: ../Bills.php");
exit();