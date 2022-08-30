<!DOCTYPE html>
    <head>
        <title>Giỏ hàng</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/cart.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    </head>

    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-12">
                    <div class="cart">
                        <div class="cart_list">
                            <div class="cart_title">
                                <h4 class="cart_list_title mt-5">Sản phẩm đã chọn</h4>
                                <br/>
                            </div>
                            <div class="show_cart_page">
                                <!-- <div class="d-flex mb-3 show_cart_items">
                                    <div class="show_cart_thum me-3 col-lg-2 position-relative">
                                        <img src="./assets/img/ecom-bg1.jpg" alt="" class="thum" width="100" height="100">
                                    </div>

                                    <div class="show_cart_description pr-5 col-lg-3 position-relative">
                                        <span class="position-absolute top-50 start-50 translate-middle">
                                            <h4 class="mb-0" style="font-size:20px">Miss Dior EDT</h4>
                                            <p class="mb-0">test</p>
                                        </span>
                                    </div>
                                    <div class="show_cart_price pr-5 col-lg-2 position-relative">
                                        <span class="position-absolute top-50 start-50 translate-middle">
                                            <p class="mb-0">4.000.000đ</p>
                                            <p class="mb-0 old-price ms-3 text-decoration-line-through">5750</p>
                                        </span>
                                    </div>
                                    <div class="show_cart_quantity pr-5 col-lg-2 position-relative">
                                        <div class="quantity d-flex position-absolute top-50 start-50 translate-middle">
                                            <button class="btn-minus" data-index="">-</button>
                                            <input 
                                                data-index=""
                                                type="number"
                                                class="text-center input-amount"
                                                maxlength="1"
                                                minlength="1"
                                                min="1"
                                                max="99"
                                                value="99"
                                            />
                                            <button class="btn-plus" data-index="">+</button>
                                        </div>
                                    </div>
                                    <div class="show_cart_total pr-5 col-lg-2 position-relative">
                                        <p class="d-flex number-item position-absolute top-50 start-50 translate-middle">
                                            <b class="amount me-3">x2</b>
                                            <b class="">5750 VND</b>
                                        </p>
                                    </div>
                                    <div class="show_cart_remove pr-5 col-lg-1 position-relative">
                                        <button class="btn-remove position-absolute top-50 start-50 translate-middle" data-index="">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>  
                                    </div>
                                </div> -->
                            </div>

                            <div class="payment_page col-lg-12 position-relative">
                                <div class="payment_page_subTotal position-absolute top-50 start-50 translate-middle">
                                    Tổng (Đã bao gồm VAT)   
                                    <b class="payment_page_price payment-items fs-4"> </b>
                                </div>
                            </div>
                            <!-- <div class="payment border-top">
                                <p class="d-flex">
                                    <b class="payment-text">Total price: </b>
                                    <b class="total-price payment-items"></b>
                                </p>
                                <p class="d-flex">
                                    <b class="payment-text">Tax: </b> 
                                    <b class="tax payment-items"></b>
                                </p>
                                <p class="d-flex">
                                    <b class="payment-text">Ship fee: </b>
                                    <b class="ship-fee payment-items"></b>
                                </p>
                                <h3 class="d-flex"> 
                                    <b class="payment-text fs-4">Total Payment: </b>
                                    <b class="total-payment payment-items fs-4"></b>
                                </h3>
                                <div class="btn-payment text-center">
                                    <a href="cart.php"><button type="button" class="btn btn-secondary btn-lg fs-5 btn-payment-1">Tiến hành thanh toán</button></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
        <script src="assets/js/ecommerce.js"></script>

    </body>
</html>