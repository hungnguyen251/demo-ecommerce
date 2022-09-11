<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 

if (isset($_SESSION['cart'])) {
    session_destroy();
}

?>
<!DOCTYPE html>
    <head>
        <title>Checkout</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/notification.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-layout">
                    <h4 class="text-title" style="text-align: center;font-size: 30px;">Bạn đã đặt hàng thành công</h4>
                    <a class="back-home" href="index.php">Quay lại trang chủ</a>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
    </body>
</html>