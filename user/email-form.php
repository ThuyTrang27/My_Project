<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Form</title>
    <link rel="icon" type="image/png" href="images/logo_myshop.png">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #otpForm {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        #otpForm h2 {
            margin-bottom: 20px;
            color: #333;
        }

        #otpForm input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        #otpForm button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        #otpForm button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div id="otpForm">
        <h2>Nhập email để nhận mã OTP</h2>
        <form action="send-otp.php" method="POST">
            <input type="email" name="email" placeholder="Nhập email..." required>
            <button type="submit" name="submit">Gửi OTP</button>
        </form>
    </div>

</body>
</html>