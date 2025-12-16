<?php
    require_once 'connect.php';

    if (isset($_POST['submit'])) {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $sql = "INSERT INTO users (fullname, email, phone, gender)
                VALUES ('$fullname', '$email', '$phone', '$gender')";

        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "Add information successfully";
        } else {
            echo "Add information fail: " . mysqli_error($conn);
        }
    }
?>