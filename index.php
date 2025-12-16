<?php
    require_once('model/connect.php');
    $prd = 0;
    if (isset($_SESSION['cart']))
    {
        $prd = count($_SESSION['cart']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fashion MyLiShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="title" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="description" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="keywords" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="author" content="Hôih My" />
    <meta name="author" content="Y Blir" /> -->
    <link rel="icon" type="image/png" href="/images/logo_myshop.png">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'> -->

    <!-- customer js -->
    <script src='js/wow.js'></script>
    <script type="text/javascript" src="js/mylishop.js"></script>
    <!-- customer css -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <!-- button top -->
    <a href="#" class="back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- background -->
    <!-- <div class="container-fluid">
    </div> -->
    <!-- /background -->

    <!-- Header -->
    <?php include("model/header.php"); ?>
    <!-- /header -->

    <div class="main">
        <!-- slide -->
        <?php include("model/slide.php"); ?>
        <!-- class="clearfix" -->

        <!-- Banner -->
        <?php include("model/banner.php"); ?>
        <!-- /banner -->
<!-- Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="product-main">
                        <!-- sản phẩm mới -->
                        <div class="title-product-main">
                            <h3 class="section-title">Sản phẩm mới</h3>
                        </div>
                        <div class="content-product-main">
                            <div class="row">
                                <?php
                                    $sql = "SELECT id,image,name,price FROM products WHERE category_id=3 AND status = 0";
                                    $result = mysqli_query($conn,$sql);
                                        
                                ?>
                                <div class="containers">
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <div class="product">
                                            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                                            <div class="name"><?= htmlspecialchars($row['name']) ?></div>
                                            <div class="price"><?= number_format($row['price'], 0, ',', '.') ?>đ</div>
                                            <div class="desc"><?= htmlspecialchars($row['description']) ?></div>
                                            <div class="product-info">
                                            <a href="addcart.php?id=<?php echo $row['id']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                    <label style="color: red;">&hearts;</label> Mua hàng <label
                                                        style="color: red;">&hearts;</label>
                                                </button>
                                            </a>
                                            <a href="detail.php?id=<?php echo $row['id']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                    <label style="color: red;">&hearts;</label> Chi Tiết <label
                                                        style="color: red;">&hearts;</label>
                                                </button>
                                            </a>
                                        </div><!-- /product-info -->
                                        </div>
                                    <?php endwhile; ?>
    
                                       
                            </div>
                                <!-- !-- /sản phẩm mới -->

                        <!-- Thời Trang Nam -->
                        <div class="title-product-main">
                            <h3 class="section-title">Thời Trang Nam</h3>
                        </div>
                        <div class="content-product-main">
                            <body class="row">
                                <?php
                                    $sql = "SELECT id,image,name,price FROM products WHERE category_id=1 LIMIT 8";
                                    $result = mysqli_query($conn,$sql);                                 
                                    ?>
                               <div class="containers">
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <div class="product">
                                            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                                            <div class="name"><?= htmlspecialchars($row['name']) ?></div>
                                            <div class="price"><?= number_format($row['price'], 0, ',', '.') ?>đ</div>
                                            <div class="desc"><?= htmlspecialchars($row['description']) ?></div>
                                            <div class="product-info">
                                            <a href="addcart.php?id=<?php echo $row['id']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                    <label style="color: red;">&hearts;</label> Mua hàng <label
                                                        style="color: red;">&hearts;</label>
                                                </button>
                                            </a>
                                            <a href="detail.php?id=<?php echo $row['id']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                    <label style="color: red;">&hearts;</label> Chi Tiết <label
                                                        style="color: red;">&hearts;</label>
                                                </button>
                                            </a>
                                        </div><!-- /product-info -->
                                        </div>
                                    <?php endwhile; ?>
    
                                    </div>   
                                    </body>
                        </div>    
                            <!-- /Thời Trang Nam -->

                        <!-- Thời Trang Nữ -->
                        <div class="title-product-main">
                            <h3 class="section-title">Thời Trang Nữ</h3>
                        </div>
                        <div class="content-product-main">
                            <body class="row">
                                <?php
                                    $sql = "SELECT id,image,name,price FROM products WHERE category_id=2 LIMIT 8";
                                    $result = mysqli_query($conn,$sql);
                                ?>
                                 <div class="containers">
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <div class="product">
                                            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
                                            <div class="name"><?= htmlspecialchars($row['name']) ?></div>
                                            <div class="price"><?= number_format($row['price'], 0, ',', '.') ?>đ</div>
                                            <div class="desc"><?= htmlspecialchars($row['description']) ?></div>
                                            <div class="product-info">
                                            <a href="addcart.php?id=<?php echo $row['id']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                    <label style="color: red;">&hearts;</label> Mua hàng <label
                                                        style="color: red;">&hearts;</label>
                                                </button>
                                            </a>
                                            <a href="detail.php?id=<?php echo $row['id']; ?>">
                                                <button type="button" class="btn btn-primary">
                                                    <label style="color: red;">&hearts;</label> Chi Tiết <label
                                                        style="color: red;">&hearts;</label>
                                                </button>
                                            </a>
                                        </div><!-- /product-info -->
                                        </div>
                                    <?php endwhile; ?>   
                                       
                            </div>
                            </body>
                            </div><!-- /Thời Trang Nữ -->
                        <!-- Hãng Thời Trang -->
                  <div class="title-product-main">
                            <h3 class="section-title">Hãng Thời Trang</h3>
                        </div>
                        <div class="content-product-main">
                            <body class="row">
                                <?php
                                    $sql = "SELECT image FROM slides WHERE status=3";
                                    $result = mysqli_query($conn,$sql);
                                ?>
                                 <div class="containerss">
                                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                        <div class="product">
                                            <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" 
                                            style="width: 100%; height: 100%; object-fit: contain; object-position: center;">                        
                                        
                                        </div>
                                    <?php endwhile; ?>
    
                                    </div> 
                                    </body>
                                    </div><!-- /product-main -->
                </div> <!-- /col -->

            </div><!-- /row -->
        </div><!-- /container -->
</div>
<?php include("model/footer.php"); ?>

</body>
</html>