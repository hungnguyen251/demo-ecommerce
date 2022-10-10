<?php
include_once "./../../../Lib/check_login.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once './../layouts/header.php' ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <?php include_once './../layouts/navbar.php' ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once './../layouts/sidebar.php' ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin cá nhân</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="./../../../Public/admin/dist/img/avatar-me.png"
                            alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">Nguyễn Mạnh Hùng</h3>

                    <p class="text-muted text-center">PHP Developer</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Thời gian làm việc</b> <a class="float-right">1 năm</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nhân viên xuất sắc</b> <a class="float-right">1 năm</a>
                        </li>
                        <li class="list-group-item">
                            <b>Thành tích</b> <a class="float-right">Nothing</a>
                        </li>
                    </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
        </div>
          <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Học vấn</strong>

                <p class="text-muted">
                  Master in Nano Science from the University of Lille, France
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>

                <p class="text-muted">192 Lê Trọng Tấn, Hoàng Mai, Hà Nội</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Kĩ năng</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">CSS</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">HTML</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Yêu màu hồng, ghét màu tím.</p>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
     </div>

    <!-- /.content-wrapper -->
     <?php include_once './../layouts/footer.php' ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once './../scripts/scripts.php' ?>

</body>
</html>
