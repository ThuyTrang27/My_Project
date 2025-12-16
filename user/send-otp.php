<?php
require_once '../model/connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $otp = rand(100000, 999999);
    $expired = date("Y-m-d H:i:s", strtotime("+5 minutes"));

    // Lưu OTP vào database
    $sql = "INSERT INTO user_otp (email, otp_code, expired_at)
            VALUES ('$email', '$otp', '$expired')";
    mysqli_query($conn, $sql);

    // Bắt đầu gửi mail
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'nguyenthuytrang2021bd@gmail.com'; // Email Gmail của bạn
        $mail->Password   = 'ibrb aggb tmwr jcem'; // App Password 16 ký tự
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        $mail->setFrom('nguyenthuytrang2021bd@gmail.com', 'Website OTP Login');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Login OTP';
        $mail->Body    = "<h3>Your OTP is: <b>$otp</b></h3>";
        $mail->AltBody = "Your OTP is: $otp";

        $mail->send();

        header("Location: verify-otp.php?email=".$email);
        exit();

    } catch (Exception $e) {
        echo "Không gửi được email. Lỗi: {$mail->ErrorInfo}";
    }
}
?>