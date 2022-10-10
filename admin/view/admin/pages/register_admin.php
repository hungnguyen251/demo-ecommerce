<?php
include_once "./../../../Lib/check_login.php";
require_once "./../../../dals/AdminDal.php";
$userAdmin = new AdminDal();
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        $id = (int)$_GET['id'] ?? 0;
        if ($id > 0) {
            //xoa
            $userAdmin->delete($id);
        }
    }
}
if (isset($_POST['name'])) {
    if ($_POST['action'] == 'add') {
        $addedSuccess = $userAdmin->add(['name' => $_POST['name']]);
        if ($addedSuccess) {
            $_SESSION['notify'] = [
                'message' => 'Add success',
                'error_code' => 0
            ];
        } else {
            $_SESSION['notify'] = [
                'message' => 'Add failed',
                'error_code' => 1
            ];
        }
    } else if ($_POST['action'] == 'edit') {
        $editSuccess = $userAdmin->update($_POST['id'], ['name' => $_POST['name']]);
        if ($editSuccess) {
            $_SESSION['notify'] = [
                'message' => 'Edit success',
                'error_code' => 0
            ];
        } else {
            $_SESSION['notify'] = [
                'message' => 'Edit failed',
                'error_code' => 1
            ];
        }
    }
}

$page = $_GET['page'] ?? 1;
$listUserAdmin = $userAdmin->listAll($page);
$totalPage = ceil($userAdmin->getCount()->total / 10);
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
            <h1>Quản trị viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
      <div class="card">
        <div class="card-header d-flex" style="height: 65px;">
          <h3 class="card-title">Danh sách quản trị viên</h3>
          <a href="./action/admin_action.php?action=add"  class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;">Thêm QTV</a>
        </div>
        <!-- /.card-header -->
        <!-- /.card-body -->
        <div class="card-body">
          <table class="table table-bordered" style="text-align: center;">
            <thead>
              <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ngày đăng kí</th>
                <th>Chức vụ</th>
                <th>Trạng thái</th>
                <th>Ngày đăng kí</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($listUserAdmin as $item): ?>
              <tr>
                <td><?php echo $item->full_name; ?></td>
                <td><?php echo $item->email; ?></td>
                <td><?php echo $item->phone; ?></td>
                <td><?php echo $item->created_at; ?></td>
                <td><?php echo $item->type; ?></td>
                <td><?php echo $item->status; ?></td>
                <td><?php echo date('d/m/Y',strtotime($item->created_at)); ?></td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-warning" href="./action/admin_action.php?action=edit&id=<?php echo $item->id; ?>&page=<?php echo $page; ?>">Sửa</a>
                    <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" href="?action=delete&id=<?php echo $item->id; ?>&page=<?php echo $page; ?>">Xóa</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.card-footer -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <?php for ($i = 0;
                        $i < $totalPage;
                        $i++) {
                ?>
                <li class="page-item <?php if ($page == ($i + 1)) {
                    echo "active";
                } ?>"><a class="page-link"
                          href="?page=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a>
                </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <!-- /.card -->
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

<!-- jQuery -->
<?php include_once './../scripts/scripts.php' ?>
</body>
</html>