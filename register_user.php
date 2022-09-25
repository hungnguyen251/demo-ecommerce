<?php
require_once "./assets/database/db-connect.php";
header('Content-Type: text/html; charset=UTF-8');

//Lấy dữ liệu từ file dangky.php
$err = null;//mảng chứa cảnh báo lỗi
$errPhone = null;
$errEmail = null;

if (isset($_POST['register'])) {
    $email      = addslashes($_POST['email']);
    $password   = addslashes($_POST['password']);
    $phone   = addslashes($_POST['phone']);
    $birthday   = addslashes($_POST['date-of-bird']);
    $gendre        = addslashes($_POST['gendre']);
    $password = md5($password);

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if ($email == '' || $password == '' || $phone == '' || $birthday == '' || $gendre == '') {
        $err = 'Vui lòng nhập đầy đủ thông tin';
        // header("Location:register_user.php");
    } else {
        //Kiểm tra email này đã có người dùng chưa
        if (mysqli_num_rows(mysqli_query($conn, "SELECT email FROM user WHERE email='$email'")) > 0) {
            $errEmail = 'Email này đã có người dùng. Vui lòng chọn email khác.';
        }
        //Kiểm tra email có đúng định dạng hay không
        else if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
            $errEmail = 'Email này không hợp lệ. Vui lòng nhập email khác';
        }
        //Kiểm tra SĐT này đã có người dùng chưa
        else if (mysqli_num_rows(mysqli_query($conn, "SELECT phone FROM user WHERE phone='$phone'")) > 0) {
            $errPhone = 'SĐT này đã đăng ký. Vui lòng chọn SĐT khác.';
        }
        //Kiểm tra SĐT có đúng định dạng hay không
        else if (!mb_eregi("^[0-9]", $phone)) {
            $errPhone = 'SĐT không hợp lệ. Vui lòng nhập SĐT khác';
        
        //Sau khi validate dữ liệu ghi vào DB
        } else {
            @$addUser = mysqli_query($conn,"
                INSERT INTO user (email,password,phone,birthday,gendre)
                VALUE ('{$email}','{$password}','{$phone}','{$birthday}','{$gendre}')
            ");
                                
            //Thông báo quá trình lưu
            if ($addUser) {
                echo "Quá trình đăng ký thành công";
                header("Location:login.php");
            } else {
                echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='login.php'>Thử lại</a>";
            }
        }
    }
}
?>

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
                <div class="col-sm-12 login_layout noi-dung form">
                    <h2>Đăng ký tài khoản</h2>
                    <form action="" method="post" enctype="">
                    <?php if ($err) { ?>
                        <div style="color:red"><?php echo $err; ?></div>
                    <?php } ?> 
                        <div class="input-form">
                            <span>Email Người Dùng (*)</span>
                            <input type="text" name="email" placeholder="Vui lòng nhập email đăng ký">
                        </div>
                        <?php if ($errEmail) { ?>
                            <div style="color:red"><?php echo $errEmail; ?></div>
                        <?php } ?> 
                        <div class="input-form">
                            <span>Mật Khẩu (*)</span>
                            <input type="password" name="password" placeholder="Vui lòng nhập mật khẩu">
                        </div>
                        <div class="input-form">
                            <span>Số điện thoại (*)</span>
                            <input type="text" name="phone" placeholder="Vui lòng nhập SĐT đăng ký">
                        </div>
                        <?php if ($errPhone) { ?>
                            <div style="color:red"><?php echo $errPhone; ?></div>
                        <?php } ?> 
                        <div class="input-form">
                            <span>Ngày sinh (*)</span>
                            <input type="date" name="date-of-bird" placeholder="Vui lòng nhập mật khẩu">
                        </div>
                        <div class="input-form">
                            <span>Giới tính </span>
                            <select name="gendre" class="gendre">
                                <option value="men">Nam</option>
                                <option value="women">Nữ</option>
                            </select>                       
                        </div>
                        <div class="input-form">
                            <input type="submit" value="Đăng Ký" name="register">
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
        <?php include './footer.php' ?>
    </body>
</html>