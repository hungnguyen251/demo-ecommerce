<?php

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
            <h1>Quản trị viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">add/user_admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <!-- /.card-header -->
            <!-- /.card-body -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm QTV</h3>
                </div>

                <form>
                    <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">Họ và tên</label>
                          <input type="text" class="form-control" id="inputName" placeholder="Nhập vào tên sản phẩm">
                        </div>
                        <div class="form-group">
                          <label for="inputEmail">Email</label>
                          <input type="email" class="form-control" id="inputEmail" placeholder="Nhập vào email đăng kí">
                        </div>
                        <div class="form-group">
                          <label>Giới tính</label>
                          <select class="form-control">
                            <option>Nam</option>
                            <option>Nữ</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword">Mật khẩu</label>
                          <input type="password" class="form-control" id="inputPassword" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                          <label for="inputPhone">Số điện thoại</label>
                          <input type="text" class="form-control" id="inputPhone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group">
                          <label>Chức vụ</label>
                          <select class="form-control">
                            <option>Quản lý</option>
                            <option>Quản trị viên</option>
                          </select>
                        </div>
                        <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;margin-bottom:20px;">
                            <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                <span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span>
                                <span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span>
                                <span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span>
                                <input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="">
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Đồng ý với thay đổi</label>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
            <!-- /.card-footer -->
            
        </div>
      <!-- /.card -->
    </section>
    <!-- /.content -->
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