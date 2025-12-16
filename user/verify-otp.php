<?php
$email = $_GET['email'] ?? '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nhập OTP</title>
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

        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top:10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>



<form action="verify-otp-process.php" method="POST">
    <h2>Xác minh OTP</h2>
    <input type="hidden" name="email" value="<?php echo $email; ?>">

    <label>Nhập OTP đã gửi:</label><br>
    <input type="text" name="otp" required><br><br>

    <button type="submit" name="verify">Xác nhận</button>
</form>

</body>
</html>