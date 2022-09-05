<?php
if (!isset($_SESSION)) { 
    session_start(); 
} 

require_once "./assets/database/db-connect.php";
header('Content-Type: text/html; charset=UTF-8');

$sql = "SELECT * FROM user WHERE status = 'active'";

$userInfo = mysqli_query($conn, $sql);

while ($row = getData($userInfo)){
    $dataUsers[] = $row;
}

$err = null;//mảng chứa cảnh báo lỗi
$existAccount = null;
if (isset($_POST['login'])) {     
    foreach ($dataUsers as $account) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!isset($email) && !isset($password)) {
            $err= 'Thông tin đăng nhập không chính xác, vui lòng nhập lại';
        }

        if ($email == $account['email'] && $password == $account['password']) {
            $existAccount = $account;
            break;
        }
    }
    
    if ($existAccount != null) {
        $_SESSION['account'] = $existAccount;
        header("Location:profile.php");
    } else {
        $err = 'Thông tin đăng nhập không chính xác, vui lòng nhập lại';
    }
}
?>

<!DOCTYPE html>
    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatile" content="IE=edge" />
        <link rel="stylesheet" href="./assets/css/login.css">
        <link rel="stylesheet" href="./assets/fonts_icon/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    </head>
        <body>
        <?php include 'header.php' ?>
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-12 login_layout">
                    <div class="noi-dung">
                        <div class="form">
                            <h2>Bạn đã đăng ký tài khoản</h2>
                            <form action="login.php" method="post" enctype="">
                            <?php if ($err) {
                                ?>
                                <div style="color:red"><?php echo $err; ?></div>
                                <?php
                            } ?>
                                <div class="input-form">
                                    <span>Email Người Dùng</span>
                                    <input type="text" name="email" placeholder="Vui lòng nhập email đăng nhập">
                                </div>
                                <div class="input-form">
                                    <span>Mật Khẩu</span>
                                    <input type="password" name="password" placeholder="Vui lòng nhập mật khẩu">
                                </div>
                                <div class="nho-dang-nhap">
                                    <label><input type="checkbox" name=""> Nhớ Đăng Nhập</label>
                                </div>
                                <div class="input-form">
                                    <input type="submit" value="Đăng Nhập" name="login">
                                </div>
                                <div class="input-form">
                                    <p>Bạn Chưa Có Tài Khoản? <a href="register_user.php">Đăng Ký</a></p>
                                </div>
                            </form>
                            <h3>Đăng Nhập Bằng Mạng Xã Hội</h3>
                            <ul class="icon-dang-nhap">
                                <li><i class="fa-brands fa-facebook"></i></li>
                                <li><i class="fa-brands fa-google"></i></li>
                                <li><i class="fa-brands fa-twitter"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include './footer.php' ?>
    </body>
</html>