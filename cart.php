<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 

//check and delete item
if (isset($_GET['action']) && $_GET['action']=="delete") {   
    $id = intval($_GET['id']); 
    foreach ($_SESSION['cart'] as $deleteItem) {
        if ($_SESSION['cart'][$id]['id'] = $_GET['id']) {
            $_SESSION['cart'][$id] = null;
        }
    }
} 

//check and add quantity value
if(isset($_POST['submit'])){ 
    foreach($_POST['quantity'] as $key => $val) { 
        if($val==0) { 
            unset($_SESSION['cart'][$key]); 
        }else{ 
            $_SESSION['cart'][$key]['quantity']=$val; 
        } 
    }   
}
?>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-12">
                    <div class="cart">
                        <div class="cart_list">
                            <div class="cart_title">
                            <?php if (isset($_SESSION['cart'])) { ?>
                                <h4 class="cart_list_title mt-5">Sản phẩm đã chọn</h4>
                            <?php } else { ?>
                                <h4 class="cart_list_title mt-5">Giỏ hàng của bạn đang trống</h4>
                            <?php } ?>  
                                <br/>
                            </div>
                            <div class="show_cart_page">
                                <form method="post" action=""> 
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"> </th>
                                                <th scope="col"><b class="table_title">Tên sản phẩm</b></th>
                                                <th scope="col"><b class="table_title">Giá</b></th>
                                                <th scope="col"><b class="table_title">Số lượng</b></th>
                                                <th scope="col"><b class="table_title">Thành tiền</b></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <?php if (isset($_SESSION['cart'])) { 
                                                $total = 0;
                                                foreach ($_SESSION['cart'] as $checkoutProduct) {
                                                    if ($checkoutProduct['id'] != null) {
                                                        $price = intval($checkoutProduct['price'] * $checkoutProduct['quantity']);
                                                        $total += $price;
                                                    ?> 
                                                        <tbody class="table-group-divider">
                                                            <tr>
                                                                <td scope="row"><img src="<?=$checkoutProduct['img'];?>" alt="" style="width:60px;height:50px;"></td>
                                                                <td><?=$checkoutProduct['name'];?></td>
                                                                <td><?=$checkoutProduct['price'];?></td>
                                                                <td><input type="text" class="input_quantity" name="quantity[<?=$checkoutProduct['id']?>]" value="<?= isset($checkoutProduct['quantity']) ? $checkoutProduct['quantity'] : 1 ?>"></td>
                                                                <td><?=$checkoutProduct['price']* $checkoutProduct['quantity'];?></td>
                                                                <td>
                                                                    <a href="cart.php?page=products&action=delete&id=<?php echo $checkoutProduct['id'] ?>" class="">
                                                                        <i class="fa-solid fa-xmark"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                        <?php } } }?>
                                    </table>
                                    <br /> 
                                    <button type="submit" name="submit" class="btn btn-outline-success">Cập nhật</button>
                                </form>
                            </div>
                            <?php if (isset($total)) {?> 
                            <div class="payment_page col-lg-12 position-relative">
                                <div class="payment_page_subTotal position-absolute top-50 start-50 translate-middle">
                                    Tổng (Đã bao gồm VAT):   
                                        <b class="payment_page_price payment-items fs-4"> <?=$total + $total*0.08?></b>
                            <?php } ?>   
                                </div>
                            </div>
                            <div class="btn-navigation d-flex">
                                <form action="index.php" method="" class="btn-navigation_back">
                                    <button type="submit" name="" class="btn btn-outline-success">Quay lại trang chủ</button>
                                </form>
                                <form action="checkout.php" method="" class="btn-navigation_continue">
                                    <button type="submit" name="" class="btn btn-outline-success">Tiếp tục</button>                                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
        <!-- <script src="assets/js/ecommerce.js"></script> -->
    </body>
</html>