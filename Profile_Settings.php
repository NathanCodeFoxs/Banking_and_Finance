<?php require_once __DIR__ . "/PHP/auth.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings - BBC</title>
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

        .settings-card {
            background: #0b2931;
            width: 100%;
            max-width: 700px;
            border-radius: 18px;
            padding: 50px 60px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
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
            outline: none;
        }

        input.field-value:focus {
            border-color: #d4b76a;
            box-shadow: 0 0 8px rgba(172, 143, 69, 0.4);
        }

        .change-btn {
            background: #ac8f45;
            border: none;
            color: white;
            padding: 15px 25px;
            font-size: 18px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-family: "Times New Roman", serif;
            margin-top: 12px;
            transition: background 0.3s, transform 0.2s;
        }

        .change-btn:hover {
            background: #8f7537;
            transform: scale(1.02);
        }

        /* =====[ POPUP ]===== */
        .popup-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 100;
        }

        .popup-box {
            background: #0b2931;
            width: 400px;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            border: 2px solid #ac8f45;
        }

        .popup-box h3 {
            color: #ac8f45;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .popup-box input {
            width: 90%;
            padding: 15px;
            font-size: 18px;
            margin-top: 15px;
            background: transparent;
            border: 2px solid #ac8f45;
            color: white;
            border-radius: 8px;
            font-family: "Times New Roman", serif;
            outline: none;
        }

        .popup-box input:focus {
            border-color: #d4b76a;
        }

        .popup-box button {
            margin-top: 20px;
            margin-right: 10px;
            padding: 12px 30px;
            font-size: 16px;
            cursor: pointer;
            background: #ac8f45;
            color: white;
            border: none;
            border-radius: 8px;
            font-family: "Times New Roman", serif;
            transition: background 0.3s;
        }

        .popup-box button:hover {
            background: #8f7537;
        }

        .popup-box button.cancel {
            background: #555;
        }

        .popup-box button.cancel:hover {
            background: #333;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 32px;
            }

            .settings-card {
                padding: 40px 30px;
            }

            .header-logo {
                height: 60px;
            }

            .acro_compa {
                font-size: 22px;
            }

            .popup-box {
                width: 90%;
                max-width: 400px;
            }
        }
    </style>
</head>
<body>

    <!-- =====[ NAVBAR ]===== -->
    <div class="header">
        <div class="menu-icon" onclick="window.location.href='Profile_Info.html'">
            <img src="Images/home.png" alt="" width="40">
        </div>
        <img src="Images/logo.png" alt="company logo" class="header-logo">
        <p class="acro_compa">BBC</p>
        <span>
            <img src="Images/Notification.png" alt="notification" width="30">
        </span>
    </div>

    <!-- =====[ CONTENT ]===== -->
    <div class="content-wrapper">
        <h1 class="page-title">PROFILE SETTINGS</h1>

        <div class="settings-card">
            <div class="field-group">
                <div class="field-label">PASSWORD</div>
                <input type="password" class="field-value" value="***************************" readonly>
                <button class="change-btn" onclick="openPasswordPopup()">Change</button>
            </div>

            <div class="field-group">
                <div class="field-label">PHONE NUMBER</div>
                <input type="text" class="field-value" id="phoneInput" value="0921 514 2155" readonly>
                <button class="change-btn" onclick="openPhonePopup()">Change</button>
            </div>

            <div class="field-group">
                <div class="field-label">PIN</div>
                <input type="password" class="field-value" id="pinInput" value="0000" readonly>
                <button class="change-btn" onclick="openPinPopup()">Change</button>
            </div>

            <div class="field-group">
                <div class="field-label">EMAIL</div>
                <input type="email" class="field-value" id="emailInput" value="drdizalthe2nd@gmail.com" readonly>
                <button class="change-btn" onclick="openEmailPopup()">Change</button>
            </div>
        </div>
    </div>

    <!-- ===== PASSWORD POPUP ===== -->
    <div class="popup-bg" id="passwordPopup">
        <div class="popup-box">
            <h3>Change Password</h3>
            <input type="password" id="newPassword" placeholder="Enter new password">
            <br>
            <button onclick="submitPassword()">Submit</button>
            <button class="cancel" onclick="closePopup('passwordPopup')">Cancel</button>
        </div>
    </div>

    <!-- ===== PHONE POPUP ===== -->
    <div class="popup-bg" id="phonePopup">
        <div class="popup-box">
            <h3>Change Phone Number</h3>
            <input type="text" id="newPhone" placeholder="Enter new phone number">
            <br>
            <button onclick="submitPhone()">Submit</button>
            <button class="cancel" onclick="closePopup('phonePopup')">Cancel</button>
        </div>
    </div>

    <!-- ===== PIN POPUP ===== -->
    <div class="popup-bg" id="pinPopup">
        <div class="popup-box">
            <h3>Change PIN</h3>
            <input type="password" id="newPin" placeholder="Enter 4-digit PIN" maxlength="4">
            <br>
            <button onclick="submitPin()">Submit</button>
            <button class="cancel" onclick="closePopup('pinPopup')">Cancel</button>
        </div>
    </div>

    <!-- ===== EMAIL POPUP ===== -->
    <div class="popup-bg" id="emailPopup">
        <div class="popup-box">
            <h3>Change Email</h3>
            <input type="email" id="newEmail" placeholder="Enter new email">
            <br>
            <button onclick="submitEmail()">Submit</button>
            <button class="cancel" onclick="closePopup('emailPopup')">Cancel</button>
        </div>
    </div>

    <script>
        function openPasswordPopup() {
            document.getElementById('passwordPopup').style.display = 'flex';
        }

        function openPhonePopup() {
            document.getElementById('phonePopup').style.display = 'flex';
        }

        function openPinPopup() {
            document.getElementById('pinPopup').style.display = 'flex';
        }

        function openEmailPopup() {
            document.getElementById('emailPopup').style.display = 'flex';
        }

        function closePopup(popupId) {
            document.getElementById(popupId).style.display = 'none';
        }

        function submitPassword() {
            const newPassword = document.getElementById('newPassword').value;
            if (newPassword) {
                alert('Password changed successfully!');
                closePopup('passwordPopup');
            } else {
                alert('Please enter a password');
            }
        }

        function submitPhone() {
            const newPhone = document.getElementById('newPhone').value;
            if (newPhone) {
                document.getElementById('phoneInput').value = newPhone;
                alert('Phone number updated successfully!');
                closePopup('phonePopup');
            } else {
                alert('Please enter a phone number');
            }
        }

        function submitPin() {
            const newPin = document.getElementById('newPin').value;
            if (newPin.length === 4) {
                document.getElementById('pinInput').value = newPin;
                alert('PIN changed successfully!');
                closePopup('pinPopup');
            } else {
                alert('PIN must be exactly 4 digits');
            }
        }

        function submitEmail() {
            const newEmail = document.getElementById('newEmail').value;
            if (newEmail && newEmail.includes('@')) {
                document.getElementById('emailInput').value = newEmail;
                alert('Email updated successfully!');
                closePopup('emailPopup');
            } else {
                alert('Please enter a valid email address');
            }
        }

        // Close popup when clicking outside
        document.querySelectorAll('.popup-bg').forEach(popup => {
            popup.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>