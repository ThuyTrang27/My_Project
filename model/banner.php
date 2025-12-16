<?php
require_once("connect.php");

// Bật hiển thị lỗi để biết chính xác sai ở đâu (rất quan trọng khi học)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $sql = "SELECT image FROM slides WHERE status=2";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra có dữ liệu không
    if (mysqli_num_rows($result) == 0) {
        echo "<h3 style='text-align:center;color:red;'>Chưa có sản phẩm nào!</h3>";
        echo "<p style='text-align:center;'>Chạy lại lệnh INSERT hoặc kiểm tra bảng <strong>products</strong> trong database <strong>fashion_shop</strong></p>";
        exit;
    }

} catch (Exception $e) {
    die("Lỗi SQL: " . $e->getMessage());
}
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
// hoặc chỉ cần 1 dòng siêu ngắn:
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Slides</title>
    <link rel="stylesheet" href="../css/animate.css" class="">
    <link rel="stylesheet" href="../css/bootstrap.min.css" class="">
    <link rel="stylesheet" href="../css/style.css" class="">
</head>
<body>
    <style>
    body{
        font-family: Arial,sans-serif;background:#f7f7f7;margin:0;padding:20px;
    }
    h2 {
        text-align:center;
        color:#34495e;
        margin-bottom:20px;
    }
    .containers{max-width:1200px;margin:auto;display:grid; grid-template-columns:repeat(auto-fill,minmax(240px,1fr)) ;gap:15px;}
    .containerss {
    max-width: 1200px;
    margin: auto;
    display: grid;
    grid-template-columns: repeat(6, 1fr);   /* ÉP ĐÚNG 6 CỘT */
    gap: 15px;
    padding: 0 15px;                         /* để không bị tràn mép */
}
    .product{background:white;padding:15px;border-radius:10px;box-shadow:0 0 15px rgba(0,0,0,0.1);text-align:center;transition:0.3s;}
    .product:hover{transform:translateY(-10px);box-shadow:0 10px 20px rgba(0,0,0,0.2);}
    .product img{width:100%;height:200px;object-fit:cover;border-radius:10px;}
    .name{font-weight:bold;margin:10px 0;font-size:18px;}
    .price{color:#e74c3c;font-size:20px;font-weight:bold;}
    .desc{color:#7f8c8d;font-size:14px;margin-top:5px;}
    h1{text-align:center;margin:20px 0;color:#2c3e50;}
</style>

<h2>BANNER - KPNV27</h2>
<div class="containers">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="product">
            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
        </div>
    <?php endwhile; ?>
</div>
<script src="../js/wow.js"></script>
<script src="../js/mylishop.js"></script>
</body>
</html>