<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 
?>

<!DOCTYPE html>
    <head>
        <title>Checkout</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/checkout.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container">
            <div class="row" class="height:1000px;">
                <div class="col-sm-6 checkout_layout">
                    <div class="noi-dung">
                        <div class="form">
                            <h2>Thông tin giao hàng</h2>
                            <form action="" method="post" enctype="">
                                <div class="input-form">
                                    <span>Họ và tên khách hàng</span>
                                    <br/>
                                    <input type="text" name="fullname" class="" placeholder="Vui lòng nhập họ tên đầy đủ">
                                </div>
                                <div class="input-form">
                                    <span>Email</span>
                                    <br/>
                                    <input type="text" name="email" placeholder="Vui lòng nhập email">
                                </div>
                                <div class="input-form">
                                    <span>Số điện thoại</span>
                                    <br/>
                                    <input type="text" name="phone" placeholder="Vui lòng nhập số điện thoại">
                                </div>
                                <div class="input-form">
                                    <span>Địa chỉ</span>
                                    <br/>
                                    <input type="text" name="address" placeholder="Vui lòng nhập địa chỉ giao hàng">
                                </div>
                                <div class="input-form">
                                    <span>Ghi chú</span>
                                    <br/>
                                    <input type="text" name="note" placeholder="Ghi chú">
                                </div>
                                <div class="input-form">
                                    <input type="submit" value="Đặt hàng" name="checkout">
                                </div>
                                <div class="input-form">
                                    <p>Bạn Đã Có Tài Khoản? <a href="login.php">Đăng nhập</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 checkout_product">
                    <div class="noi-dung">
                        <div class="form">
                            <h2>Thông tin sản phẩm</h2>
                            <?php if (isset($_SESSION['cart'])) { 
                                $total = 0;
                                foreach ($_SESSION['cart'] as $checkoutProduct) {
                                    if ($checkoutProduct['id'] != null) {
                                        $price = intval($checkoutProduct['price'] * $checkoutProduct['quantity']);
                                        $total += $price;
                            ?>
                            <div class="d-flex mb-3 text-box pr-5 list-item" style="border-bottom: 1px #ccc solid">
                                <div class="col-sm-6">  
                                    <h4 class="" style="font-size:20px"><?=$checkoutProduct['name'];?></h4>
                                </div>
                                <div class="col-sm-3">  
                                    <span class="d-flex">
                                        <p class="price-promo"><?=$checkoutProduct['quantity'];?></p>
                                    </span>
                                </div>
                                <div class="col-sm-3">  
                                    <p class="amount me-3"><?=$checkoutProduct['price']* $checkoutProduct['quantity'];?></p>
                                </div>
                            </div>
                            <?php } } } ?>
                            <div class="payment-price d-flex">
                                <div class="col-sm-9 text-box pr-5">
                                    <h4 class="" style="font-size:25px"><b>THÀNH TIỀN</b></h4>
                                </div>
                                <?php if (isset($total)) {?> 
                                <div class="col-sm-3 text-box pr-5">
                                    <h4 class="" style="font-size:25px"><b><?=$total + $total*0.08?></b></h4>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
    </body>
</html>