<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 

if (!isset($_SESSION['account'])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
    <head>
        <title>Thông tin cá nhân</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/profile.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container" style="height: 700px;">
            <div class="row">
                <div class="col-6 col-sm-12 login_layout">
                    <div class="noi-dung">
                        <div class="form" style="margin-top: -200px">
                            <h2>Thông tin của bạn</h2>
                            <form action="" method="post" enctype="">
                                <div class="input-form">
                                    <span>Email : <?=$_SESSION['account']['email']?></span>
                                    </br>
                                    <span>Tên : <?=$_SESSION['account']['full_name']?></span>
                                    </br>
                                    <span>Địa chỉ : <?=$_SESSION['account']['address']?></span>
                                    </br>
                                    <span>Số điện thoại : <?=$_SESSION['account']['phone']?></span>
                                    </br>
                                    <span>Ngày sinh : <?=$_SESSION['account']['birthday']?></span>
                                    </br>
                                    <!-- <span>Đơn hàng đã đặt : </span> -->
                                    <a href="logout.php">Đăng xuất</a>
                                </div>
                                <div class="btn-navigation">
                                    <a class="back-home" href="index.php">Quay lại trang chủ</a>
                                    <a class="go-to-cart" href="cart.php">Đi đến giỏ hàng</a>         
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
    </body>
</html>