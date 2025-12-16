<meta charset="utf-8">
<?php

    require_once('../model/connect.php');
    error_reporting(2);

    if (isset($_GET['notimage'])) {
        $noimage = 'Vui lòng chọn hình ảnh hợp lệ!';
    } else {
        $noimage = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="dist/css/timeline.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- <link href="dist/css/style.css" rel="stylesheet"> -->
    
</head>
<body>
    <!-- Page Content -->
<?php 
if (!isset($notimage)) $notimage = "";
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm sản phẩm</h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="productadd-back.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="txtName" placeholder="Nhập tên sản phẩm" required>
                    </div>

                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                        <select class="form-control" name="category">
                            <?php
                                $sql = "SELECT * FROM categories";
                                $result = mysqli_query($conn,$sql);
                                if($result) {
                                    while($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['name']; ?>
                                </option>
                            <?php } } ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" class="form-control" name="txtPrice" placeholder="Nhập giá sản phẩm" min="20000" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phần trăm giảm (nếu có)</label>
                                <input type="number" class="form-control" name="txtSalePrice" value="0" min="0" max="50">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input type="number" class="form-control" name="txtNumber" placeholder="Nhập số lượng" required>
                    </div>

                    <div class="form-group">
                        <label>Chọn hình ảnh sản phẩm</label>
                        <br>
                        <input type="file" name="FileImage" required>
                        <br>
                        <span style="color: red"><?php echo $notimage; ?></span>
                    </div>

                    <div class="form-group">
                        <label>Nhập từ khóa tìm kiếm</label>
                        <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa">
                    </div>

                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea class="form-control" rows="3" name="txtDescript"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="addProduct" class="btn btn-warning btn-block btn-lg">Thêm</button>
                        </div>

                        <div class="col-md-6">
                            <button type="reset" class="btn btn-default btn-block btn-lg" style="background:gray;color:white;">Thiết lập lại</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
