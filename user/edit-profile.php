<?php
session_start();
require_once "../model/connect.php";

// Kiểm tra xem user đã đăng nhập chưa
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Lấy thông tin người dùng hiện tại
$sql = "SELECT * FROM users WHERE id = $user_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Khi người dùng nhấn lưu
if (isset($_POST['update_profile'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $update_sql = "
        UPDATE users 
        SET fullname='$fullname', email='$email', phone='$phone', address='$address'
        WHERE id=$user_id
    ";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: ../index.php?updated=1");
        exit();
    } else {
        $error = "Cập nhật thất bại, vui lòng thử lại!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Chỉnh sửa hồ sơ</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="images/logo_myshop.png">
<style>
    body {
        background: #f3f4f6;
    }
    .profile-container {
        max-width: 600px;
        margin: 40px auto;
    }
    .card {
        border-radius: 15px;
    }
    .btn-primary {
        width: 100%;
        padding: 10px;
        font-size: 18px;
    }
</style>
</head>

<body>

<div class="profile-container">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">✨ Chỉnh sửa thông tin cá nhân</h3>

        <?php if (isset($_GET['updated'])): ?>
            <div class="alert alert-success text-center">
                ✔ Cập nhật hồ sơ thành công!
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Họ và tên</label>
                <input type="text" name="fullname" class="form-control" required value="<?= $user['fullname'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required value="<?= $user['email'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <textarea name="address" class="form-control" rows="3"><?= $user['address'] ?></textarea>
            </div>

            <button type="submit" name="update_profile" class="btn btn-primary">
                Lưu thay đổi
            </button>
        </form>
    </div>
</div>
</body>
</html>