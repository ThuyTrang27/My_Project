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
    <link rel="icon" type="image/png" href="/images/logo_myshop.png.png">

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
    <link rel="stylesheet" type="text/css" href="introduceshop.css">

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
<!-- Content -->
    <div class="container">
        <div class="content">
            <div class="header-content">
                <h3>👗 Aurora Shop – Thời trang dành cho giới trẻ</h3>
             </div>
            <div class="content-body">
                 <p>Ra đời từ năm 2017, bắt đầu chỉ từ một cửa hàng thời trang nhỏ, MyLiShop không ngừng phát triển và từng bước khẳng định vị thế của mình trong lĩnh vực thời trang trẻ tại Đà Nẵng.
                Với phong cách năng động – hiện đại – bắt kịp xu hướng, Aurora Shop mong muốn mang đến cho khách hàng những sản phẩm chất lượng, giá cả hợp lý và dịch vụ chuyên nghiệp.</p>
            </div>   
        </div>

          <div class="content">
            <div class="header-content">
                <h3>🎯 Sứ mệnh & Giá trị cốt lõi</h3>
            </div>
                <div class="content-body">
                     <ul>
                        <li>✔️ Sản phẩm thời trang đa dạng, phù hợp với giới trẻ</li>
                        <li>✔️ Giá cả minh bạch, cạnh tranh</li>
                        <li>✔️ Trải nghiệm mua sắm online & offline tiện lợi</li>
                        <li>✔️ Phục vụ tận tâm – hỗ trợ nhanh chóng</li>
                    </ul>
                </div>                
        </div>

          <div class="content">
            <div class="header-content">
                <h3>🛒 Dịch vụ khách hàng</h3>
            </div>
            <div class="content-body">
            <p>Aurora Shop cung cấp hệ thống mua sắm hiện đại với:</p>
                <ul>
                        <li>🛍️ Đặt hàng trực tuyến nhanh chóng</li>
                        <li>🚚 Chính sách vận chuyển rõ ràng</li>
                        <li>🔄 Chính sách bảo hành & đổi trả minh bạch</li>
                        <li>🔐 Bảo mật thông tin khách hàng tuyệt đối</li>
                        <li>🎁 Nhiều chương trình khuyến mãi hấp dẫn</li>
                    </ul>
                <>Tất cả nhằm mang đến trải nghiệm dễ dàng – an tâm – hài lòng cho khách hàng.</p>
            </div>             
         </div>

         <div class="content">
            <div class="header-content">
                <h3>📍 Hệ thống cửa hàng</h3>
            </div>
            <div class="content-body">
                <p>Aurora Shop hiện có nhiều chi nhánh tại Đà Nẵng, giúp khách hàng thuận tiện mua sắm và trải nghiệm trực tiếp sản phẩm:</p>
                <ul>
                        <li>80B Lê Duẩn – Thanh Khê</li>
                        <li>236 Lê Duẩn – Thanh Khê</li>
                        <li>172 Lê Duẩn – Hải Châu</li>
                        <li>83 Phan Đăng Lưu – Cẩm Lệ</li>
                        <li>80 Nguyễn Văn Thoại</p></li>
                    </ul>            
        </div>
        </div>

        <div class="content">
            <div class="header-content">
               <h3>📞 Thông tin liên hệ</h3>
            </div>
            <div class="content-body">
                <p>🏢 Trụ sở: 99 Tô Hiến Thành, Sơn Trà, Đà Nẵng</p>
                <p>📧 Email: hoihmy2712@gmail.com</p>
                <p>🌐 Website: Aurora Shop.com.vn</p>
                <p>📘 Facebook: Aurora Shop</p>
                <p>☎️ Hỗ trợ: 0397 450 200</p>
                <p>🛒 Đặt hàng: 0522 980 270</p>      
        </div>
        </div>
    </div>
</div>
<?php include("model/footer.php"); ?>

</body>
</html>