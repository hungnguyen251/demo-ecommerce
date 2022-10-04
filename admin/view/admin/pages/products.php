<?php
include_once "./../../../Lib/check_login.php";
require_once "./../../../dals/ProductDal.php";
$product = new ProductDal();
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        $id = (int)$_GET['id'] ?? 0;
        if ($id > 0) {
            //xoa
            $product->delete($id);
        }
    }
}
if (isset($_POST['name'])) {
    if ($_POST['action'] == 'add') {
        $addedSuccess = $product->add(['name' => $_POST['name']]);
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
        $editSuccess = $product->update($_POST['id'], ['name' => $_POST['name']]);
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
$listProduct = $product->listAll($page);
$totalPage = ceil($product->getCount()->total / 10);

//Attention
if (!function_exists('currency_format')) {
  function currency_format($number) {
      if (!empty($number)) {
          return number_format($number, 0, ',', '.');
      }
  }
}
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
            <h1>Sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header d-flex" style="height: 65px;">
          <h3 class="card-title">Danh sách sản phẩm</h3>
          <button type="button" class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;"><a href="./action/products_action.php" style="color: #fff;">Thêm sản phẩm</a></button>
        </div>
        <!-- /.card-header -->
        <!-- /.card-body -->
        <div class="card-body">
          <table class="table table-bordered" style="text-align: center;">
            <thead>
              <tr>
                <th>Tên sản phẩm</th>
                <th>Thương hiệu</th>
                <th>Giới tính</th>
                <th>Giá</th>
                <th>Giá khuyến mãi</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($listProduct as $item): ?>
              <tr>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->brand ?></td>
                <td><?php echo $item->gendre ?></td>
                <td><?php echo currency_format($item->price) ?>.000đ</td>
                <td><?php echo currency_format($item->promo) ?>.000đ</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning" onclick="myFunc(<?php echo $item->id ?>,'<?php echo $item->name; ?>')">Sửa</button>
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

                <?php
            } ?>
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

<script>
  function myFunc(id, name) {
      const myFormNode = document.querySelector('.my-form');
      const fieldName = myFormNode.querySelector('input[name="name"]');
      fieldName.value = name;
      myFormNode.querySelector('input[name="id"]').value = id;
      myFormNode.querySelector('input[name="action"]').value = "edit";
      myFormNode.classList.remove('hidden');
  }
</script>