 <?php
    require_once('connect.php');
    error_reporting(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animate.css" class="">
    <link rel="stylesheet" href="../css/bootstrap.min.css" class="">
    <link rel="stylesheet" href="../css/style.css" class="">
    <title>Document</title>
    <style>
        /* ================= BRAND LOGO SECTION ================= */

.title-product-main1 {
    text-align: center;
    margin: 40px 0 30px;
}

.title-product-main1 .section-title {
    font-size: 28px;
    font-weight: 700;
    color: #222;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

.title-product-main1 .section-title::after {
    content: "";
    width: 70px;
    height: 4px;
    background: #f9c000;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 3px;
}

/* Container logo */
.container_new {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 25px;
    padding: 0 20px;
    max-width: 1200px;
    margin: auto;
}

/* Mỗi logo */
.brand_card {
    background: #ffffff;
    border-radius: 14px;
    height: 120px;
    padding: 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    transition: all 0.35s ease;
    cursor: pointer;
}

/* Hover card */
.brand_card:hover {
    transform: translateY(-6px) scale(1.05);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

/* Logo image */
.brand_card img {
    max-width: 100%;
    max-height: 70px;
    object-fit: contain;
    filter: grayscale(100%);
    transition: all 0.35s ease;
}

/* Hover logo */
.brand_card:hover img {
    filter: grayscale(0%);
    transform: scale(1.08);
}

/* Responsive mobile */
@media (max-width: 576px) {
    .brand_card {
        height: 100px;
        padding: 15px;
    }

    .brand_card img {
        max-height: 55px;
    }
}
    </style>
</head>
<body>
   <div class="title-product-main">
</div>

<div class="content-product-main1">
    <div class="row">
        <?php
            $sql = "SELECT image FROM slides WHERE status = 3";
            $result = mysqli_query($conn, $sql);
        ?>

        <div class="container_new">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="brand_card">
                    <img 
                        src="../<?= htmlspecialchars($row['image']) ?>" 
                        alt="Brand logo"
                        style="width:100%; height:100%; object-fit:contain;"
                    >
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
</body>
</html>
