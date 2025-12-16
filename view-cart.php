<?php
session_start();
include 'model/header.php';
if (!isset($_SESSION['username'])) {
    header("Location: user/login.php?need=login");
    exit();
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="mt-4">Giỏ hàng của bạn</h2>

    <?php if (isset($_GET['add'])): ?>
        <div class="alert alert-success">Đã thêm vào giỏ hàng!</div>
    <?php endif; ?>

    <?php if (empty($cart)): ?>
        <p>Giỏ hàng trống!</p>
    <?php else: ?>
        <table class="table table-bordered">
            <tr>
                <th>Hình</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>

            <?php foreach ($cart as $item): 
                $item_total = $item['price'] * $item['quantity'];
                $total += $item_total;
            ?>
            <tr>
                <td><img src="<?php echo $item['image']; ?>" width="80"></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo number_format($item['price']); ?> đ</td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo number_format($item_total); ?> đ</td>
            </tr>
            <?php endforeach; ?>

            <tr>
                <th colspan="4" class="text-right">Tổng đơn hàng:</th>
                <th><?php echo number_format($total); ?> đ</th>
            </tr>
        </table>
    <?php endif; ?>

    <a href="index.php" class="btn btn-primary">Quay lại trang chủ</a>
    <a href="checkout.php" class="btn btn-primary">Thanh toán</a>
</div>
<?php include 'model/footer.php'; ?>
<</body>
</html>