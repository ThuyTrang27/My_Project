<?php
session_start();
include '../model/connect.php';

if (!isset($_SESSION['verified_email'])) {
    header("Location: register-email.php");
    exit;
}

$email    = $_POST['email'];
$fullname = trim($_POST['fullname']);
$username = trim($_POST['username']);
$phone    = trim($_POST['phone']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Lưu user
$sql = "INSERT INTO users (email, username, password, phone)
        VALUES ('$email', '$username', '$password', '$phone')";

if (mysqli_query($conn, $sql)) {

    unset($_SESSION['verified_email']);

    header("Location: login.php");
    exit;

} else {
    echo "Lỗi khi lưu user!";
}