<?php
session_start();
include "../model/header1.php";
require_once('../model/connect.php');

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    header("Location: login.php?need=login");
    exit();
}

$username = $_SESSION['username'];

// Lấy dữ liệu người dùng
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="images/logo_myshop.png">
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-4">Thông tin tài khoản</h2>

    <table class="table table-bordered">
        <tr>
            <th>Họ và tên</th>
            <td><?= htmlspecialchars($user['fullname']) ?></td>
        </tr>
        <tr>
            <th>Tên đăng nhập</th>
            <td><?= htmlspecialchars($user['username']) ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><?= htmlspecialchars($user['phone']) ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><?= htmlspecialchars($user['address']) ?></td>
        </tr>
    </table>

    <a href="../index.php" class="btn btn-primary">Về trang chủ</a>
    <a href="edit-profile.php" class="btn btn-success">Chỉnh sửa thông tin</a>
</div>
<?php include "../model/footer.php"; ?>
</body>
</html>