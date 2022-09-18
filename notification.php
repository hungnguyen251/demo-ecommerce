<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 

if (isset($_SESSION['cart'])) {
    session_destroy();
} else {
    header('Location:cart.php');
}
?>
<!DOCTYPE html>
    <head>
        <title>Thông tin đơn hàng</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/notification.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    </head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-layout">
                    <i class="fa-sharp fa-solid fa-circle-check icon-success"></i>
                    <h4 class="text-title" style="text-align: center;font-size: 30px;">Bạn đã đặt hàng thành công</h4>
                </div>
                <div class="col-sm-12 info-invoice">
                    <h4>Đơn hàng <b><?=$_SESSION['order_info']['order_code']?></b></h4>
                    <span><i>Cerise đã gửi đơn hàng qua email, hãy kiểm tra email bạn nhé</i></span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><b class="table_title">Mã đơn hàng</b></th>
                                <th scope="col"><b class="table_title">Ngày</b></th>
                                <th scope="col"><b class="table_title">Tổng cộng</b></th>
                                <th scope="col"><b class="table_title">Ghi chú</b></th>
                            </tr>
                        </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <td><?=$_SESSION['order_info']['order_code']?></td>
                                    <td><?=date('m/d/Y h:i:s a', time())?></td>
                                    <td><?=currency_format($_SESSION['payment_price']['total_price'])?>.000đ</td>
                                    <td><?=$_SESSION['order_info']['note']?></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
                <div class="col-sm-12 btn-comeback">
                    <a class="back-home" href="index.php"><b>QUAY LẠI TRANG CHỦ</b></a>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
    </body>
</html>