<?php
session_start();
include 'model/header.php';
if(!isset($_SESSION['username'])) {
    header("Location: user/login.php?need=checkout");
    exit();
}

if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    die("Giỏ hàng trống!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="checkout-style.css" class="">
</head>
<body>
    <div class="container">
<h2>Thông tin giao hàng</h2>

<form action="checkout-back.php" method="POST">
    <label>Họ và tên người nhận:</label><br>
    <input type="text" name="fullname" required><br><br>

    <label>Số điện thoại:</label><br>
    <input type="text" name="phone" required><br><br>

    <label>Địa chỉ giao hàng:</label><br>
    <input type="text" name="address" required></input><br><br>

    <label>Email nhận thông báo:</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Xác nhận thanh toán</button>
</form>
</div>
<?php include 'model/footer.php'; ?>
</body>
</html>