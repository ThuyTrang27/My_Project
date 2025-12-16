<?php
session_start();
include '../model/connect.php';

$email = trim($_POST['email']);
$otp   = intval(trim($_POST['otp']));

$sql = "SELECT * FROM user_otp 
        WHERE email = '$email'
        ORDER BY id DESC 
        LIMIT 1";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Không tìm thấy mã OTP!";
    exit;
}

if (strtotime($row['expired_at']) < time()) {
    echo "Mã OTP đã hết hạn!";
    exit;
}

if ((int)$row['otp_code'] !== $otp) {
    echo "Mã OTP không đúng!";
    exit;
}

// OTP đúng → cho đăng ký
$_SESSION['verified_email'] = $email;

// Xóa OTP
mysqli_query($conn, "DELETE FROM user_otp WHERE email='$email'");

header("Location: create-login-email.php");
exit();