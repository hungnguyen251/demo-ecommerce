<?php
session_start();

require_once "./assets/database/db-connect.php";
$sql = "SELECT * FROM products WHERE promo is null ";
$ssql = "SELECT * FROM products WHERE promo is not null ";
$sqlBrand = "SELECT url FROM brand_products";

$resultPromo = mysqli_query($conn, $ssql);
$resultNoPromo = mysqli_query($conn, $sql);
$resultBrandList = mysqli_query($conn, $sqlBrand);

//add to cart
if (isset($_GET['action']) && $_GET['action']=="add"){   
    $id = intval($_GET['id']); 
    if (!isset($_SESSION['cart'][$id])){ 
        $sql_s="SELECT * FROM products WHERE id={$id}"; 
        $query_s=mysqli_query($conn, $sql_s); 

        if ($query_s != '') { 
            $row_s=mysqli_fetch_array($query_s); 
              
            $_SESSION['cart'][$row_s['id']]=[
                    "id" => $id,
                    "price" => $row_s['price'],
                    "img" => $row_s['url'],
                    "name" => $row_s['name'],
                    "price" => $row_s['price'],
                    "promo" => $row_s['promo'] ? $row_s['promo']  : '',
                    "quantity" => 1
            ]; 
        } else { 
            $message="This product id it's invalid!";  
        }
    }
} 
?>

<!DOCTYPE html>
    <head>
        <title>Cerise Cosmetique</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/ecommerce.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
        <link rel="stylesheet" href="./assets/fonts_icon/flag-icons-main/css/flag-icons.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    </head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
        <body>
        <div id="container">
            <?php include 'header.php' ?>
            <div id="container">
                <div class="row">
                    <div class="col-sm-12 bg-img">
                        <img src="assets/img/ecom-bg1.jpg" class="bg-img_slide" alt="">
                        <img src="assets/img/ecom-bg2.jpg" class="bg-img_slide" alt="">
                        <img src="assets/img/ecom-bg3.jpg" class="bg-img_slide" alt="">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row main-list-promo">
                    <div class="title-promo">
                        <h3 class="title-promo mb-5">SẢN PHẨM KHUYẾN MÃI</h3>
                    </div>
                    <div class="row main-list">
                        <?php 
                            if(isset($message)){ 
                                echo "<h2>$message</h2>"; 
                            } 
                        ?> 
                        <?php while ($productPromo = getData($resultPromo)) {?>
                            <div class="col-sm-3 d-flex flex-column list-item">
                                <img class="list-item_img" src="<?=$productPromo['url']; ?>" alt="">
                                <div class="item-promo-icon">
                                    <div class="promo-icon-text">PROMO</div>
                                </div>
                                <span class="list-item-brand text-center"><?=$productPromo['brand']; ?></span>
                                <b><?= $productPromo['name']; ?></b>
                                <i><?=$productPromo['description']; ?></i>
                                <b class="item-price"><?=currency_format($productPromo['promo']); ?>.000đ</b>
                                <p class="item-old-price ms-3 text-decoration-line-through"><?=currency_format($productPromo['price']); ?>.000đ</p>
                                <div class="add-cart">
                                    <a href="index.php?page=products&action=add&id=<?php echo $productPromo['id'] ?>"><i class="fa-solid fa-cart-arrow-down icon-add-cart"></i></a>  
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="main-list-new-item">
                    <div class="title-new-item">
                        <h3 class="title-new-item mb-5">SẢN PHẨM MỚI NHẤT</h3>
                    </div>

                    <div class="row list-new-item">
                        <?php while ($productNoPromo = getData($resultNoPromo)) {?>
                            <div class="col-sm-3 d-flex flex-column list-item">
                                <img src="<?=$productNoPromo['url']; ?>" alt="">
                                <div class="item-promo-icon" style="background-color:black;">
                                    <div class="promo-icon-text">NEW</div>
                                </div>
                                <span class="list-item-brand text-center"><?=$productNoPromo['brand']; ?></span>
                                <b><?= $productNoPromo['name']; ?></b>
                                <i><?=$productNoPromo['description']; ?></i>
                                <b class="item-price"><?=currency_format($productNoPromo['price']); ?>.000đ</b>
                                <div class="add-cart">
                                    <a href="index.php?page=products&action=add&id=<?php echo $productNoPromo['id'] ?>"><i class="fa-solid fa-cart-arrow-down icon-add-cart-new"></i></a>  
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="brand-info">
                    <div class="brand-title">
                        <h3 class="brand-text mb-5">THƯƠNG HIỆU NỔI TIẾNG</h3>
                    </div>

                    <div class="row brand-list">
                            <div class="col-6 col-sm-2 brand-layout">
                                <?php while ($brandList = getData($resultBrandList)) {?>
                                    <img src="<?=$brandList['url']; ?>" alt="" class="brand-thump">
                                <?php } ?>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    <!-- <script src="assets/js/ecommerce.js" async></script> -->
    <script src="assets/js/slick_slide.js"></script>
    <?php include './footer.php' ?>
    </body>
</html>