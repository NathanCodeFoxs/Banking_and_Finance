<?php
session_start();

// Redirect to login page if user is not logged in
if(!isset($_SESSION['user_account'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - BBC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #134E5E, #0B3037);
            color: white;
            padding: 40px;
        }
        h1 {
            color: gold;
        }
        a {
            color: #AC8F45;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .dashboard {
            margin-top: 20px;
        }
        .dashboard ul {
            list-style: none;
            padding: 0;
        }
        .dashboard li {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
    <p>Account Number: <?php echo htmlspecialchars($_SESSION['user_account']); ?></p>

    <div class="dashboard">
        <ul>
            <li><a href="PHP/logout.php">Logout</a></li>
            <li><a href="#">View Accounts</a></li>
            <li><a href="#">View Transactions</a></li>
            <li><a href="#">Deposit Money</a></li>
            <li><a href="#">Withdraw Money</a></li>
        </ul>
    </div>
</body>
</html>