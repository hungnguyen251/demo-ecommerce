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
            <h1>Sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">add/products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="col-md-6">
          <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Thêm sản phẩm</h3>
              </div>

              <form>
                  <div class="card-body">
                      <div class="form-group">
                        <label for="inputName">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Nhập vào tên sản phẩm">
                      </div>
                      <div class="form-group">
                        <label for="inputBrand">Thương hiệu</label>
                        <input type="text" class="form-control" id="inputBrand" placeholder="Nhập vào thương hiệu">
                      </div>
                      <div class="form-group">
                        <label>Dành cho giới tính</label>
                        <select class="form-control">
                          <option>Nam</option>
                          <option>Nữ</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputPrice">Giá gốc</label>
                        <input type="text" class="form-control" id="inputPrice" placeholder="Giá gốc">
                      </div>
                      <div class="form-group">
                        <label for="inputPromo">Giá khuyến mãi</label>
                        <input type="text" class="form-control" id="inputPromo" placeholder="Giá khuyến mãi">
                      </div>
                      <div class="form-group">
                        <label for="inputFile">Tải lên hình ảnh</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFile">
                            <label class="custom-file-label" for="inputFile">Chọn hình ảnh</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text">Tải lên</span>
                          </div>
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
          </div>            
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