<?php
require_once __DIR__ . "/db.php";
require_once __DIR__ . "/auth.php";

session_start();

$user_id = $_SESSION['user_id'];
$to_account = trim($_POST['to_account']);
$to_name = trim($_POST['to_name']); // plain text
$amount = floatval($_POST['amount']);

if ($amount <= 0) {
    header("Location: ../Money_Transfer.php?error=" . urlencode("Invalid amount"));
    exit();
}

// 1. Check sender balance
$stmt = $conn->prepare("SELECT balance FROM balances WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();

if ($balance < $amount) {
    header("Location: ../Money_Transfer.php?error=" . urlencode("Insufficient balance"));
    exit();
}

// 2. Verify recipient exists by account_number only
$stmt = $conn->prepare("SELECT id FROM users WHERE account_number = ?");
$stmt->bind_param("s", $to_account);
$stmt->execute();
$stmt->bind_result($recipient_id);
$found = $stmt->fetch();
$stmt->close();

if (!$found) {
    header("Location: ../Money_Transfer.php?error=" . urlencode("Recipient not found"));
    exit();
}

// 3. Deduct sender balance
$stmt = $conn->prepare("UPDATE balances SET balance = balance - ? WHERE user_id = ?");
$stmt->bind_param("di", $amount, $user_id);
$stmt->execute();
$stmt->close();

// 4. Add amount to recipient balance
$stmt = $conn->prepare("UPDATE balances SET balance = balance + ? WHERE user_id = ?");
$stmt->bind_param("di", $amount, $recipient_id);
$stmt->execute();
$stmt->close();

// 5. Record transaction with plain name from form
$stmt = $conn->prepare("
    INSERT INTO transactions (user_id, type, bank_name, to_account, to_name, amount)
    VALUES (?, 'INTERNAL', 'BBC', ?, ?, ?)
");
$stmt->bind_param("issd", $user_id, $to_account, $to_name, $amount);
$stmt->execute();
$stmt->close();

header("Location: ../Money_Transfer.php?success=" . urlencode("Transfer successful!"));
exit();