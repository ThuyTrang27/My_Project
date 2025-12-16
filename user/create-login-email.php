<?php
session_start();

// Chưa xác minh email → quay lại đăng ký
if (!isset($_SESSION['verified_email'])) {
    header("Location: register-email.php");
    exit;
}

$email = $_SESSION['verified_email'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tạo hồ sơ</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: #fff;
            padding: 30px;
            width: 350px;
            border-radius: 8px;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Hoàn tất đăng ký</h2>

    <p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>

    <form action="create-login-email-process.php" method="POST">
        <input type="hidden" name="email" value="<?php echo $email; ?>">

        <input type="text" name="fullname" placeholder="Họ và tên" required>

        <input type="text" name="username" placeholder="Tên người dùng" required>

        <input type="password" name="password" placeholder="Mật khẩu" required>

        <input type="text" name="phone" placeholder="Số điện thoại" required>

        <button type="submit">Lưu thông tin</button>
    </form>
</div>

</body>
</html>