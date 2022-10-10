<?php
include_once "./../../../../Lib/check_login.php";
require_once "./../../../../dals/UserDal.php";
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

$user = new UserDal();
$listUser = $user->listAll();

if ('add' == $action) {
  if (isset($_POST['submit'])) {
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $gendre  = isset($_POST['gendre']) ? $_POST['gendre'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';
    $password = md5($password);

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if ($email == '' || $password == '' || $fullname == '' || $address == '' || $phone == '' || $birthday == '') {
      $err = 'Vui lòng nhập đầy đủ thông tin';
    } else {
        //Kiểm tra email này đã có người dùng chưa
        foreach ($listUser as $account) {
          $userInfo = json_decode(json_encode($account),true);
          $checkEmail[] = $userInfo['email'];
          $checkPhone[] = $userInfo['phone'];
        }

        if (in_array($email, $checkEmail)) {
          $errEmail = 'Email này đã có người dùng. Vui lòng chọn email khác.';
        } else if (in_array($phone, $checkEmail)) {
        //Kiểm tra SĐT này đã có người dùng chưa
            $errPhone = 'SĐT này đã đăng ký. Vui lòng chọn SĐT khác.';
        } else if (!mb_eregi("^[0-9]", $phone)) {
            //Kiểm tra SĐT có đúng định dạng hay không
            $errPhone = 'SĐT không hợp lệ. Vui lòng nhập SĐT khác';
        } else if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
            $errEmail = 'Email này không hợp lệ. Vui lòng nhập email khác';
        } else {
          $addedSuccessUser = $user->add([
            'email' => $email,
            'phone' => $phone,
            'full_name' => $fullname,
            'address' => $address,
            'gendre' => $gendre,
            'birthday' => $birthday,
            'password' => $password,
            'status' => $status
          ]);
          if ($addedSuccessUser) {
              $_SESSION['notify'] = [
                  'message' => 'Thêm khách hàng thành công',
                  'error_code' => 0
              ];
          } else {
              $_SESSION['notify'] = [
                  'message' => 'Thêm khách hàng thất bại',
                  'error_code' => 1
              ];
          }
        }
      }
    }
} else if ('edit' == $action) {
  $id  = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
  $editUser = $user->getUserById($id);

  if (isset($_POST['submit'])) {
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : $editUser[0]->full_name;
    $email = isset($_POST['email']) ? $_POST['email'] : $editUser[0]->email;
    $password = isset($_POST['password']) ? $_POST['password'] : $editUser[0]->password;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : $editUser[0]->phone;
    $address = isset($_POST['address']) ? $_POST['address'] : $editUser[0]->address;
    $gendre  = isset($_POST['gendre']) ? $_POST['gendre'] : $editUser[0]->gendre;
    $birthday  = isset($_POST['birthday']) ? $_POST['birthday'] : $editUser[0]->birthday;
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';
    $password = md5($password);

    //Xử lý form nhập vào ngày tháng
    $birthday = date('Y-m-d',strtotime($birthday));
    if (!mb_eregi("^[0-9]", $phone)) {
        //Kiểm tra SĐT có đúng định dạng hay không
        $errPhone = 'SĐT không hợp lệ. Vui lòng nhập SĐT khác';
    } else if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
        $errEmail = 'Email này không hợp lệ. Vui lòng nhập email khác';
    } else {
      $updateUser = $user->update($id,
      [
        'full_name' => $fullname,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'gendre' => $gendre,
        'birthday' => $birthday,
        'password' => $password,
        'status' => $status,
        'updated_at' => @date('Y-m-d H:i:s')
      ]);
      if ($updateUser) {
          $_SESSION['notify'] = [
              'message' => 'Sửa thông tin thành công',
              'error_code' => 0
          ];
      } else {
          $_SESSION['notify'] = [
              'message' => 'Sửa thông tin thất bại',
              'error_code' => 1
          ];
      }
    }
  }
}

if (isset($_POST['back'])) {
  header("Location:./../users.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once './layouts/header.php' ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../home.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../contact.php" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once './layouts/sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Khách hàng</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <form action="" method="post">
              <button type="submit" name="back" class="btn btn-info">Quay lại trang người dùng</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Notification success/failed -->
      <?php if (isset($_SESSION['notify'])) { ?>
        <div class="alert <?php if ($_SESSION['notify']['error_code'] == 0) {
            echo "alert-success";
        } else {
            echo "alert-danger";
        } ?> alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas <?php if ($_SESSION['notify']['error_code'] == 0) {
                  echo "fa-check";
              } else {
                  echo "fa-ban";
              } ?>"></i> Thông báo!</h5>
          <?php echo $_SESSION['notify']['message']; ?>
        </div>
        <?php
        unset($_SESSION['notify']);
      } ?>
      <!-- Notification success/failed -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm người dùng</h3>
                    </div>
                    <?php if (isset($err)) { ?>
                        <div style="color:red"><?php echo $err; ?></div>
                    <?php } ?> 
                    <form method="post">
                        <div class="card-body">
                          <div class="form-group">
                            <label for="inputName">Tên khách hàng (*)</label>
                            <input type="text" class="form-control" value="<?php if(isset($editUser)){echo $editUser[0]->full_name;}?>" name="fullname" id="inputName" placeholder="Nhập vào tên sản phẩm">
                          </div>

                          <div class="form-group">
                            <label for="inputEmail">Email (*)</label>
                            <input type="email" class="form-control" value="<?php if(isset($editUser)){echo $editUser[0]->email;}?>" name="email" id="inputEmail" placeholder="Nhập vào email đăng kí">
                          </div>
                          <?php if (isset($errEmail)) { ?>
                              <div style="color:red"><?php echo $errEmail; ?></div>
                            <?php } ?> 
                          <div class="form-group">
                            <label for="inputPhone">Số điện thoại (*)</label>
                            <input type="text" class="form-control" value="<?php if(isset($editUser)){echo $editUser[0]->phone;}?>" name="phone" id="inputPhone" placeholder="Nhập số điện thoại">
                          </div>
                          <?php if (isset($errPhone)) { ?>
                              <div style="color:red"><?php echo $errPhone; ?></div>
                            <?php } ?>
                          <div class="form-group">
                            <label for="inputPassword">Mật khẩu (*)</label>
                            <input type="password" class="form-control" value="<?php if(isset($editUser)){echo $editUser[0]->password;}?>" name="password" id="inputPassword" placeholder="Nhập mật khẩu">
                          </div>

                          <div class="form-group">
                              <label for="inputAddress">Địa chỉ</label>
                              <input type="text" name="address" value="<?php if(isset($editUser)){echo $editUser[0]->address;}?>" class="form-control" id="inputAddress" placeholder="Nhập địa chỉ khách hàng">
                          </div>

                          <div class="form-group">
                              <label>Giới tính</label>
                              <select class="form-control" name="gendre">
                                  <option>Nam</option>
                                  <option>Nữ</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label>Ngày sinh</label>
                              <div class="input-group">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="text" name="birthday" value="<?php if(isset($editUser)){echo date('d-m-Y',strtotime($editUser[0]->birthday));}?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                              </div>
                          </div>
                          <div class="form-group d-flex flex-column">
                              <label>Trạng thái</label>
                              <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                                  <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                    <input type="checkbox" name="status" <?=(isset($editUser) && $editUser[0]->status == 'Inactive') ? '' : 'checked' ?> data-bootstrap-switch="">
                                  </div>
                              </div>
                          </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <?php include_once './layouts/footer.php' ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include_once './layouts/scripts.php' ?>
</body>
</html>

<script>
  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  }) 

  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  $('[data-mask]').inputmask()
</script>