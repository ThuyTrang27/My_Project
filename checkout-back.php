<?php
session_start();
require_once('model/connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ========================
// KIỂM TRA ĐĂNG NHẬP & GIỎ HÀNG
// ========================
if (!isset($_SESSION['username'])) {
    header("Location: user/login.php");
    exit();
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    die("Giỏ hàng trống!");
}

// ========================
// NHẬN DỮ LIỆU FORM
// ========================
$fullname = trim($_POST['fullname']);
$phone    = trim($_POST['phone']);
$address  = trim($_POST['address']);
$email    = trim($_POST['email']);

$cart = $_SESSION['cart'];

// ========================
// TỔNG HỢP NỘI DUNG ĐƠN HÀNG
// ========================
$message = "";
$total = 0;

foreach ($cart as $item) {
    $line = "
        <tr>
            <td>{$item['name']}</td>
            <td align='center'>{$item['quantity']}</td>
            <td align='right'>" . number_format($item['price']) . "đ</td>
            <td align='right'>" . number_format($item['price'] * $item['quantity']) . "đ</td>
        </tr>
    ";

    $message .= $line;
    $total += $item['price'] * $item['quantity'];
}

// ========================
// PHPMailer
// ========================
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'nguyenthuytrang2021bd@gmail.com';   // Gmail của bạn
    $mail->Password   = 'ibrb aggb tmwr jcem';               // App Password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->CharSet = 'UTF-8';

    $mail->setFrom('nguyenthuytrang2021bd@gmail.com', 'MyLiShop');
    $mail->addAddress($email); // gửi cho khách

    $mail->isHTML(true);
    $mail->Subject = 'Xác nhận đơn hàng - MyLiShop';

    // ========================
    // NỘI DUNG EMAIL
    // ========================
    $mail->Body = "
        <h2>Cảm ơn bạn đã đặt hàng tại <span style='color:#007bff'>MyLiShop</span></h2>

        <p><b>Họ và tên:</b> $fullname</p>
        <p><b>Số điện thoại:</b> $phone</p>
        <p><b>Địa chỉ giao hàng:</b> $address</p>

        <h3>Chi tiết đơn hàng</h3>

        <table border='1' cellpadding='8' cellspacing='0' width='100%'>
            <tr style='background:#f2f2f2'>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
            $message
        </table>

        <h3 style='text-align:right'>Tổng tiền: " . number_format($total) . "đ</h3>

        <p>Chúng tôi sẽ liên hệ với bạn sớm để xác nhận đơn hàng.</p>
        <p>Trân trọng,<br><b>MyLiShop</b></p>
    ";

    $mail->AltBody = "Tổng tiền đơn hàng: $total đ";

    $mail->send();

    // ========================
    // XÓA GIỎ HÀNG
    // ========================
    unset($_SESSION['cart']);

    header("Location: view-cart.php?order=success");
    exit();

} catch (Exception $e) {
    echo "Không gửi được email. Lỗi: {$mail->ErrorInfo}";
}