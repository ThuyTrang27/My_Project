<?php
session_start();
require_once('model/connect.php');

// Bắt buộc phải đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: user/login.php?need=login");
    exit();
}

// Kiểm tra id sản phẩm
if (!isset($_GET['id'])) {
    die("Không tìm thấy sản phẩm!");
}

$id = (int)$_GET['id'];

// Lấy thông tin sản phẩm từ DB để lưu vào giỏ hàng
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Sản phẩm không tồn tại!");
}

// Nếu giỏ hàng chưa tồn tại → tạo mới
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Nếu sản phẩm đã tồn tại → tăng số lượng
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += 1;
} 
else {
    // Nếu sản phẩm chưa có → thêm vào giỏ
    $_SESSION['cart'][$id] = [
        'id'        => $product['id'],
        'name'      => $product['name'],
        'price'     => $product['price'],
        'image'     => $product['image'],
        'quantity'  => 1
    ];
}

// Quay về trang giỏ hàng hoặc trang trước
header("Location: view-cart.php?add=success");
exit();
?>