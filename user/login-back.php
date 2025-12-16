<?php
session_start();
require_once('../model/connect.php');

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) == 1) {

        $user = mysqli_fetch_assoc($res);
        $dbPassword = $user['password'];

        // Kiểm tra mật khẩu (hỗ trợ cả md5 & password_hash)
        if (strlen($dbPassword) > 32) {
            $isValid = password_verify($password, $dbPassword);
        } else {
            $isValid = (md5($password) === $dbPassword);
        }

        if ($isValid) {

            $_SESSION['username'] = $username;
            $_SESSION['user_id']  = $user['id'];

            // ====== ĐIỀU KIỆN ADMIN DUY NHẤT ======
            if ($username === 'Admin') {
                header("Location: ../admin/product-list.php");
            } else {
                header("Location: ../index.php");
            }
            exit();

        } else {
            $_SESSION['error'] = 'Mật khẩu không đúng!';
            header("Location: ../user/login.php?error=wrong");
            exit();
        }

    } else {
        $_SESSION['error'] = 'Tên đăng nhập không tồn tại!';
        header("Location: ../user/login.php?error=wrong");
        exit();
    }
}