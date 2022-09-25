<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 

//check and delete item
if (isset($_GET['action']) && $_GET['action']=="delete"){   
    $id = intval($_GET['id']); 
    foreach ($_SESSION['cart'] as $deleteItem) {
        if ($_SESSION['cart'][$id]['id'] = $_GET['id']) {
            $_SESSION['cart'][$id] = null;
        }
    }
} 

//format currency
if (!function_exists('currency_format')) {
    function currency_format($number) {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.');
        }
    }
}
// if(isset($_POST['submit1'])){ 
//     var_dump($_POST['quantity']);
//     foreach($_POST['quantity'] as $key => $val) { 
//         if($val==0) { 
//             unset($_SESSION['cart'][$key]); 
//         }else{ 
//             $_SESSION['cart'][$key]['quantity']=$val; 
//         } 
//         var_dump($_SESSION['cart'][$key]['quantity']);
//     }   
// }
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
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar bg-dark">
                        <div class="container-fluid">
                            <a class="navbar-brand text-light" href="index.php">
                                <img src="assets/img/ex1.jpg" alt="" width="45" height="40" class="d-inline-block align-text-top my-name">
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
                                <?php if (isset($_SESSION['account'])) { ?>
                                    <a class="btn bg-dark" href="profile.php" role="button"><i class="fa-solid fa-user"></i></a>
                                <?php } else { ?>
                                    <a class="btn bg-dark" href="login.php" role="button"><i class="fa-solid fa-user"></i></a>
                                <?php } ?>
                                </div>

                                <div class="cart-wrap" onclick="showCart();">
                                    <a class="btn bg-dark show-cart-icon" role="button" onclick=""><i class="fa-solid fa-cart-plus showCart"></i></a>
                                    <div class="cart-no-cart" id="cart-list">
                                        <img src="assets/img/empty-cart.png" alt="" class="cart-no-cart-img">
                                        <div class="cart-no-cart-msg">
                                            Chưa có sản phẩm
                                        </div>

                                        <div class="main-cart">
                                            <h4 class="cart-description" style="text-align: center;">GIỎ HÀNG CỦA BẠN</h4>
                                            <br/>

                                            <div class="show-cart">
                                                <?php if (isset($_SESSION['cart'])) { 
                                                    foreach ($_SESSION['cart'] as $showCart) {
                                                        if ($showCart['id'] != null) {
                                                        $price[] = $showCart['price'];
                                                ?>  
                                                        <div class="d-flex mb-3 list-item-hd">
                                                            <div class="thum me-3">
                                                                <img src="<?=$showCart['img']; ?>" alt="" class="" width="50" height="50">
                                                            </div>

                                                            <div class="text-box pr-5">
                                                                <h4 class="" style="font-size:18px;font-weight: 550;"><?=$showCart['name']; ?></h4>
                                                                <span class="d-flex">
                                                                    <?php if ($showCart['promo'] != '') {?>
                                                                    <p class="price-promo">Giá KM: <?=currency_format($showCart['promo']); ?>.000đ</p>
                                                                    <p class="old-price ms-3 text-decoration-line-through"> Giá cũ:
                                                                    <?=currency_format($showCart['price']);?>.000đ</p>
                                                                    <?php } ?>
                                                                </span>

                                                                <div class="d-flex">
                                                                    <p class="amount me-3">Số lượng: 1</p>
                                                                    <?php if ($showCart['promo'] != '') {?>
                                                                    <p class="">
                                                                        Giá/sp: 
                                                                        <b class=""> <?=currency_format($showCart['promo']); ?>.000đ</b>
                                                                    </p>
                                                                    <?php } else { ?>
                                                                    <p class="">
                                                                        Giá/sp: 
                                                                        <b class=""> <?=currency_format($showCart['price']); ?>.000đ</b>
                                                                    </p>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <!-- <div class="input-group">
                                                                <span class="input-group-text btn btn-outline-secondary btn_minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -     </span>
                                                                <input type="number" style="border-top: 1px #6c757d solid; border-bottom: 1px #6c757d solid;" name="quantity[<?=$showCart['id']?>]" value="<?= isset($showCart['quantity']) ? $showCart['quantity'] : 1 ?>" class="form-control text-center input-quantity" min="1" max="100">
                                                                <span class="input-group-text btn btn-outline-secondary btn_plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> +    </span>
                                                            </div> -->

                                                            <div>
                                                                <a href="index.php?page=products&action=delete&id=<?php echo $showCart['id'] ?>" class="">
                                                                    <i class="fa-solid fa-xmark"  style="color:black;"></i>
                                                                </a>
                                                            </div>    
                                                        </div>
                                                <?php } } } ?>
                                            </div>

                                            <div class="payment border-top">
                                                <p class="d-flex">
                                                    <b class="payment-text">Total price: </b>
                                                    <b class="total-price payment-items"><?=currency_format(array_sum($price))?>.000đ</b>
                                                </p>
                                                <p class="d-flex">
                                                    <b class="payment-text">Tax: </b> 
                                                    <b class="tax payment-items"><?=currency_format(array_sum($price)*0.08)?>.000đ</b>
                                                </p>
                                                <p class="d-flex">
                                                    <b class="payment-text">Ship fee: </b>
                                                    <b class="ship-fee payment-items"></b>
                                                </p>
                                                <h3 class="d-flex"> 
                                                    <b class="payment-text fs-4">Total Payment: </b>
                                                    <?php if (isset($price)) { ?> 
                                                    <b class="total-payment payment-items fs-4"><?=currency_format(array_sum($price)+array_sum($price)*0.08)?>.000đ</b>
                                                    <?php } ?>
                                                </h3>
                                                <!-- <div class="btn-payment text-center">
                                                    <a href="cart.php"><button type="submit" name="submit1" class="btn btn-secondary btn-lg fs-5 btn-payment-1">Tiến hành thanh toán</button></a>
                                                </div> -->
                                                <form method="post" action="cart.php">
                                                    <button type="submit" name="submit1" class="btn btn-secondary btn-lg fs-5 btn-payment-1">Tiến hành thanh toán</button>
                                                </form>
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
            </div>
        </div>
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