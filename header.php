<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Header</title>
</head>
<body>
    <div class="header">
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="index.php">
                    <img src="assets/img/ex1.jpg" alt="" width="35" height="30" class="d-inline-block align-text-top">
                CERISE
                </a>
                <form class="d-flex navbar_search" role="search">
                    <div class="d-flex navbar_search_form">
                        <input class="form-control me-2 navbar_search_input" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success navbar_search_icon" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                <div class="cart-login d-flex">
                    <div class="login-wrap">
                        <a class="btn bg-dark" href="login.php" role="button"><i class="fa-solid fa-user"></i></a>
                    </div>

                    <div class="cart-wrap" onclick="showCart();">
                        <a class="btn bg-dark show-cart-icon" role="button" onclick=""><i class="fa-solid fa-cart-plus showCart"></i></a>
                        <div class="cart-no-cart" id="cart-list">
                            <img src="assets/img/empty-cart.png" alt="" class="cart-no-cart-img">
                            <div class="cart-no-cart-msg">
                                Chưa có sản phẩm
                            </div>

                            <div class="main-cart">
                                <h4 class="cart-description">Giỏ hàng của bạn</h4>
                                <br/>

                                <div class="show-cart">
                                    <?php if (isset($_SESSION['cart'])) { 
                                        foreach ($_SESSION['cart'] as $showCart) {
                                            $price[] = $showCart['price'];
                                    ?>  
                                            <div class="d-flex mb-3 list-item">
                                                <div class="thum me-3">
                                                    <img src="<?=$showCart['img']; ?>" alt="" class="" width="50" height="50">
                                                </div>

                                                <div class="text-box pr-5">
                                                    <h4 class="" style="font-size:20px"><?=$showCart['name']; ?></h4>
                                                    <span class="d-flex">
                                                        <p class="price-promo"><?=$showCart['promo']; ?></p>
                                                        <p class="old-price ms-3 text-decoration-line-through">
                                                        <?=$showCart['price']; ?></p>
                                                    </span>

                                                    <div class="d-flex">
                                                        <p class="amount me-3">x1</p>
                                                        <p class="">
                                                            total :
                                                            <b class=""><?=$showCart['price']; ?> VND</b>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="quantity flex-grow-1 flex justify-content-end align-items-end">
                                                    <button class="btn-minus" data-index="${index}">-</button>
                                                    <input 
                                                        data-index="${index}"
                                                        type="number"
                                                        class="text-center input-amount"
                                                        maxlength="1"
                                                        minlength="1"
                                                        min="1"
                                                        max="99"
                                                        value=""
                                                    />
                                                    <button class="btn-plus" data-index="${index}">+</button>
                                                </div>

                                                <div>
                                                    <button class="btn-remove" data-index="${index}">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>  
                                                </div>    
                                            </div>
                                    <?php } } ?>
                                </div>

                                <div class="payment border-top">
                                    <p class="d-flex">
                                        <b class="payment-text">Total price: </b>
                                        <b class="total-price payment-items"><?=array_sum($price)?></b>
                                    </p>
                                    <p class="d-flex">
                                        <b class="payment-text">Tax: </b> 
                                        <b class="tax payment-items"><?=array_sum($price)*0.08?></b>
                                    </p>
                                    <p class="d-flex">
                                        <b class="payment-text">Ship fee: </b>
                                        <b class="ship-fee payment-items"></b>
                                    </p>
                                    <h3 class="d-flex"> 
                                        <b class="payment-text fs-4">Total Payment: </b>
                                        <b class="total-payment payment-items fs-4"><?=array_sum($price)+array_sum($price)*0.08?></b>
                                    </h3>
                                    <div class="btn-payment text-center">
                                        <a href="cart.php"><button type="button" class="btn btn-secondary btn-lg fs-5 btn-payment-1">Tiến hành thanh toán</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg bg-dark p-0">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon test"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-light pe-4" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light pe-4" href="#">Nước hoa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light pe-4" href="#">Trang điểm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light pe-4" href="#">Chăm sóc tóc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light pe-4" href="#">Chăm sóc da</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light pe-4" href="#">Chăm sóc toàn thân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light pe-4" href="#">Khuyến mãi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light pe-4" href="cart.php">Giỏ hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Khác</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</body>
</html>

<script>
function showCart() {
    var x = document.getElementById("cart-list");
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    } 
}

//Check element show-cart to hide background
$(".payment").hide();
$(".cart-description").hide();

let checkShowCart = $(".price-promo").val();
if (checkShowCart != null) {
    $(".cart-no-cart-img").hide();
    $(".cart-no-cart-msg").hide();
    $(".payment").show();
    $(".cart-description").show();
} 

</script>