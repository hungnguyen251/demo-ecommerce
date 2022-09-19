<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 

if (!isset($_SESSION['account'])) {
    header('Location:login.php');
}

require_once "./assets/database/db-connect.php";
header('Content-Type: text/html; charset=UTF-8');

$err = null;//mảng chứa cảnh báo lỗi

if (isset($_POST['change-info'])) {
    $fullname = addslashes($_POST['fullname']);
    $address = addslashes($_POST['address']);

    if ($fullname != '') {
        $_SESSION['account']['full_name'] = $fullname;
    }

    if ($address != '') {
        $_SESSION['account']['address'] = $address;
    }

    if (!isset($_POST['agree'])) {
        $err = 'Bạn phải xác nhận thông tin cập nhật là chính xác';
    } else {
        if (isset($_SESSION['account']['full_name'])) {
            $fullname = $_SESSION['account']['full_name'];
        }

        if (isset($_SESSION['account']['address'])) {
            $address = $_SESSION['account']['address'];
        }

        if (isset($_SESSION['account']['id'])) {
            $userId = $_SESSION['account']['id'];
        } else {
            $userId = null;
        }

        $userUpdate = mysqli_query($conn,"UPDATE user SET full_name = '".$fullname."', address = '".$address."' WHERE id = $userId");
        $_SESSION['account']['full_name'] = $fullname; 
        $_SESSION['account']['address'] = $address;
    
        //Thông báo quá trình lưu
        if ($userUpdate) {
            echo "Bạn đã cập nhật thành công";
            header("Location:profile.php");
        } else {
            echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='login.php'>Thử lại</a>";
        }
    }
}
?>

<!DOCTYPE html>
    <head>
        <title>CẬP NHẬT THÔNG TIN TÀI KHOẢN</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/user_update.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container" style="height: 700px;">
            <div class="row">
                <div class="d-flex">
                    <div class="col-sm-4 nav-info">
                        <div class="nav-left">
                            <ul class="nav-left-list">
                                <li><a href="profile.php">THÔNG TIN TÀI KHOẢN</a></li>
                                <li><a href="user_update.php">CẬP NHẬT THÔNG TIN</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8 login_layout">
                        <div class="noi-dung">
                            <div class="form">
                                <h2>CẬP NHẬT THÔNG TIN TÀI KHOẢN</h2>
                                <?php if ($err) { ?>
                                    <div class="col-sm-12 col-xs-12" style="color:red"><?php echo $err; ?></div>
                                <?php } ?>  
                                <form action="" method="post" enctype="">
                                    <div class="input-form">
                                        <div class="form-group d-flex">
                                            <label for="userlogin" class="col-sm-3 control-label col-xs-5">
                                                Email:
                                            </label>
                                            <div class="col-sm-6 col-xs-7">
                                                <p><?=$_SESSION['account']['email']?></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="userlogin" class="col-sm-3 control-label col-xs-5">
                                                Tên:
                                            </label>
                                            <div class="col-sm-6 col-xs-7">
                                            <?php if (isset($_SESSION['account']['full_name'])) { ?>
                                                <input type="text" name="fullname" class="" placeholder="<?=$_SESSION['account']['full_name']?>">
                                            <?php } else { ?> 
                                                <input type="text" name="fullname" class="" placeholder="Họ và tên...">
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="userlogin" class="col-sm-3 control-label col-xs-5">
                                                Địa chỉ:
                                            </label>
                                            <div class="col-sm-6 col-xs-7">
                                            <?php if (isset($_SESSION['account']['address'])) { ?>
                                                <input type="text" name="address" class="" placeholder="<?=$_SESSION['account']['address']?>">
                                            <?php } else { ?> 
                                                <input type="text" name="address" class="" placeholder="Địa chỉ...">
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="userlogin" class="col-sm-3 control-label col-xs-5">
                                                Số điện thoại:
                                            </label>
                                            <div class="col-sm-6 col-xs-7">
                                                <p><?=$_SESSION['account']['phone']?></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="userlogin" class="col-sm-3 control-label col-xs-5">
                                                Ngày sinh:
                                            </label>
                                            <div class="col-sm-6 col-xs-7">
                                                <p><?=$_SESSION['account']['birthday']?></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <div class="col-sm-12 col-xs-12 d-flex checkbox">
                                                <input type="checkbox" class="agree" name="agree" value="1">
                                                <label for="agree" style="margin-left: 20px;">
                                                    Tôi xác nhận những thông tin trên là chính xác
                                                </label>  
                                            </div>  
                                        </div>
                                
                                        <div class="btn-navigation">
                                            <input type="submit" value="Thay đổi" name="change-info" class="change-info">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
    </body>
</html>