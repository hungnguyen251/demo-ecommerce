<!DOCTYPE html>
    <head>
        <title>Register Account</title>
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
                            <h2>Đăng ký tài khoản</h2>
                            <form action="login.php" method="post" enctype="">
                                <div class="input-form">
                                    <span>Email Người Dùng</span>
                                    <input type="text" name="email" placeholder="Vui lòng nhập email đăng ký">
                                </div>
                                <div class="input-form">
                                    <span>Mật Khẩu</span>
                                    <input type="password" name="password" placeholder="Vui lòng nhập mật khẩu">
                                </div>
                                <div class="input-form">
                                    <span>Địa chỉ</span>
                                    <input type="text" name="address" placeholder="Vui lòng nhập địa chỉ">
                                </div>
                                <div class="input-form">
                                    <span>Ngày sinh</span>
                                    <input type="date" name="date-of-bird" placeholder="Vui lòng nhập mật khẩu">
                                </div>
                                <div class="input-form">
                                    <span>Giới tính</span>
                                    <select class="gendre">
                                        <option value="men">Nam</option>
                                        <option value="women">Nữ</option>
                                    </select>                                
                                </div>
                                <div class="input-form">
                                    <input type="submit" value="Đăng Ký" name="dangky">
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