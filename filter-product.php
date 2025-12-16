<?php
require_once("model/connect.php");
include("model/header.php");

// Lấy lựa chọn giá
$price = isset($_GET['price']) ? $_GET['price'] : "";

// Query lọc giá
$sql = "SELECT * FROM products WHERE 1";

if ($price == 1) {
    $sql .= " AND price < 100000";
} else if ($price == 2) {
    $sql .= " AND price BETWEEN 100000 AND 300000";
} else if ($price == 3) {
    $sql .= " AND price BETWEEN 300000 AND 500000";
} else if ($price == 4) {
    $sql .= " AND price > 500000";
}

$result = $conn->query($sql);
?>

<style>
.product-card {
    border: 1px solid #eee;
    border-radius: 10px;
    padding: 15px;
    transition: 0.3s;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    text-align: center;
}
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
}
.product-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
}
.product-name {
    font-size: 18px;
    font-weight: 600;
    margin-top: 10px;
    height: 50px;
}
.product-price {
    color: #e91e63;
    font-size: 20px;
    font-weight: bold;
}
.btn-view {
    margin-top: 10px;
    background: #000;
    color: #fff;
    border-radius: 20px;
    padding: 7px 20px;
}
.btn-view:hover {
    background: #e91e63;
}
.title-filter {
    text-align:center;
    margin: 20px 0;
    font-size: 28px;
    font-weight: bold;
}
</style>

<div class="container">
    <p class="title-filter">KẾT QUẢ LỌC SẢN PHẨM</p>

    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="col-md-3 col-sm-6" style="margin-bottom:25px;">
                    <div class="product-card">
                        <img src="<?php echo $row['image']; ?>">
                        <div class="product-name"><?php echo $row['name']; ?></div>
                        <div class="product-price"><?php echo number_format($row['price']); ?> đ</div>
                        <a class="btn btn-view" href="addcart.php?id=<?php echo $row['id']; ?>">
                            Mua hàng
                        </a>
                        <a class="btn btn-view" href="detail.php?id=<?php echo $row['id']; ?>">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<h3 style='text-align:center; margin:40px 0;'>Không có sản phẩm phù hợp.</h3>";
        }
        ?>
    </div>
</div>

<?php include("model/footer.php"); ?>