<?php
session_start();
require_once('../model/connect.php');

if (isset($_POST['submit'])) {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Lấy user theo username
    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) == 1) {

        $user = mysqli_fetch_assoc($res);

        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) {

            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id']  = $user['id'];

            header("Location: ../index.php?ls=success");
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