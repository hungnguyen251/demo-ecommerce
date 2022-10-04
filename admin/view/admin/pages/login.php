<?php
session_start(); 
require_once "./../../../dals/AdminDal.php";

$userAdmin = new AdminDal();
$listUserAdmin = $userAdmin->listAll();

if (isset($_POST['login'])) {
    $err = null;
    $existAccount = null;
    foreach ($listUserAdmin as $account) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $admin = json_decode(json_encode($account),true);

        if (!isset($email) && !isset($password)) {
            $err= 'Thông tin đăng nhập không chính xác, vui lòng nhập lại';
        }
        if ($email == $admin['email'] && $password == $admin['password']) {
            $existAccount = $admin;
            break;
        }
    }
    
    if ($existAccount != null) {
        $_SESSION['account'] = $existAccount;
        header("Location:dashboard.php");
    } else {
        $err = 'Thông tin đăng nhập không chính xác, vui lòng nhập lại';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <?php include_once './../layouts/header.php' ?>
    <section class="content" style="height:100vh;background-color:#ccc;background-image:url('./../../../Public/admin/dist/img/background-login.jpg');background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info" style="margin-top: 30vh;width: 100%;">
                    <div class="card-header" style="background-color: #17D07B;">
                        <h3 class="card-title">Đăng nhập</h3>
                    </div>

                    <form class="form-horizontal" method="post">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <?php if (isset($err)) {?>
                                <div style="color:red;text-align:center;"><?php echo $err; ?></div>
                            <?php } ?>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Ghi nhớ thông tin đăng nhập</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" name="login" class="btn btn-info" style="background-color: #17D07B;border:none;">Đăng nhập</button>
                            <button type="submit" class="btn btn-default float-right">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </section>
</div>
</body>
</html>