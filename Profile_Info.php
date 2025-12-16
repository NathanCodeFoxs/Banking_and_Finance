<?php require_once __DIR__ . "/PHP/auth.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Info - BBC</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Times New Roman", serif;
            background: linear-gradient(to right, #134E5E, #0B3037);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* =====[ NAVBAR ]===== */
        .header {
            width: 100%;
            height: 100px;
            background: #0b2931;
            display: flex;
            align-items: center;
        }

        .header-logo {
            height: 80px;
            margin: 10px 10px;
        }

        .acro_compa {
            display: inline-block;
            background: linear-gradient(to right, #AC8F45, #6E5A27);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 28px;
            font-weight: bold;
            vertical-align: middle;
        }

        .header span {
            margin-left: auto;
            margin-right: 20px;
        }

        .menu-icon {
            cursor: pointer;
            margin-left: 20px;
        }

        /* =====[ CONTENT ]===== */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        .page-title {
            color: #ac8f45;
            font-size: 42px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
            letter-spacing: 2px;
        }

        .profile-card {
            background: #0b2931;
            width: 100%;
            max-width: 700px;
            border-radius: 18px;
            padding: 50px 60px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 40px;
            overflow: hidden;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #ac8f45;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .field-group {
            margin-bottom: 35px;
        }

        .field-group:last-child {
            margin-bottom: 0;
        }

        .field-label {
            color: #ac8f45;
            font-size: 18px;
            text-align: center;
            margin-bottom: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .field-value {
            background: transparent;
            border: 2px solid #ac8f45;
            color: white;
            padding: 18px 25px;
            font-size: 20px;
            text-align: center;
            border-radius: 8px;
            font-family: "Times New Roman", serif;
            width: 100%;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 32px;
            }

            .profile-card {
                padding: 40px 30px;
            }

            .header-logo {
                height: 60px;
            }

            .acro_compa {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    <!-- =====[ NAVBAR ]===== -->
    <div class="header">
        <div class="menu-icon" onclick="window.location.href='Profile_Settings.html'">
            <img src="Images/Setting.png" alt="" width="40">
        </div>
        <img src="Images/logo.png" alt="company logo" class="header-logo">
        <p class="acro_compa">BBC</p>
        <span>
            <img src="Images/Notification.png" alt="notification" width="30">
        </span>
    </div>

    <!-- =====[ CONTENT ]===== -->
    <div class="content-wrapper">
        <h1 class="page-title">PROFILE INFO</h1>

        <div class="profile-card">
            <div class="profile-avatar">
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%230d4d56'%3E%3Cpath d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/%3E%3C/svg%3E" alt="Profile">
            </div>

            <div class="field-group">
                <div class="field-label">ACCOUNT NAME</div>
                <div class="field-value">Jake</div>
            </div>

            <div class="field-group">
                <div class="field-label">ACCOUNT NUMBER</div>
                <div class="field-value">09235212104</div>
            </div>
        </div>
    </div>

</body>
</html>