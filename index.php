<?php
require_once "./assets/database/db-connect.php";
$sql = "SELECT * FROM products WHERE promo is null ";
$ssql = "SELECT * FROM products WHERE promo is not null ";
$sqlBrand = "SELECT url FROM brand_products";

$resultPromo = mysqli_query($conn, $ssql);
$resultNoPromo = mysqli_query($conn, $sql);
$resultBrandList = mysqli_query($conn, $sqlBrand);
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
            <div class="row">
                <div class="col-lg-12 bg-img">
                    <div id="wrapper-slide" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner1 main-slide">
                            <div class="active bg-img-slide">
                                <img src="assets/img/ecom-bg1.jpg" class="" alt="">
                            </div>
                            <div class="bg-img-slide">
                                <img src="assets/img/ecom-bg2.jpg" class="" alt="">
                            </div>
                            <div class=" bg-img-slide">
                                <img src="assets/img/ecom-bg3.jpg" class="" alt="">
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <i class="fa-solid fa-angle-left prev-icon" style="color: red; font-size: 40px;"></i>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <i class="fa-solid fa-angle-right next-icon" style="color: red; font-size: 40px;"></i>
                            <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
            </div>

            <div class="container">
                <div class="row main-list-promo">
                    <div class="title-promo">
                        <h3 class="title-promo mb-5">Sản phẩm khuyến mãi</h3>
                    </div>
                    <div class="row main-list">
                    <?php while ($productPromo = getData($resultPromo)) {?>
                        <div class="col-sm-3 d-flex flex-column list-item">
                            <img src="<?=$productPromo['url']; ?>" alt="">
                            <div class="item-promo-icon">
                                <div class="promo-icon-text">PROMO</div>
                            </div>
                            <span class="list-item-brand text-center"><?=$productPromo['brand']; ?></span>
                            <b><?= $productPromo['name']; ?></b>
                            <i><?=$productPromo['description']; ?></i>
                            <b class="item-price"><?=$productPromo['promo']; ?></b>
                            <p class="item-old-price ms-3 text-decoration-line-through"><?=$productPromo['price']; ?></p>

                            <div class="flex-grow-1 text-end d-flex align-items-end justify-content-end">
                                <button class="btn-add mb-5" data-index="${index}">
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>

                <div class="main-list-new-item">
                    <div class="title-new-item">
                        <h3 class="title-new-item mb-5">Sản phẩm mới nhất</h3>
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
                                <b class="item-price"><?=$productNoPromo['price']; ?></b>

                                <div class="flex-grow-1 text-end d-flex align-items-end justify-content-end">
                                    <button class="btn-add mb-5" data-index="${index}">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="brand-info">
                    <div class="brand-title">
                        <h3 class="brand-text mb-5">Thương hiệu nổi tiếng</h3>
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