<?php
require_once "./../../../../Lib/check_login.php";
require_once "./../../../../dals/ProductDal.php";
include_once "./../../../../Lib/generalFunction.php";

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

$product = new ProductDal();
$listProducts = $product->listAll();

if ('add' == $action) {
  if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
    $gendre = isset($_POST['gendre']) ? $_POST['gendre'] : 'Unisex';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $promo  = isset($_POST['promo']) ? $_POST['promo'] : '0';
    $description  = isset($_POST['description']) ? $_POST['description'] : '';
    $url = $_FILES['url'];
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if ($name == '' || $brand == '' || $price == '' || $url["name"] == '' || $description == '') {
      $err = 'Vui lòng nhập đầy đủ thông tin';
    } else {
      //Xử lý lưu file ảnh
      $urlImage = 'assets/img/' . $url["name"];
      $notiUploadImage = uploadFileImage($url);

      $addedSuccessProduct = $product->add([
        'name' => $name,
        'brand' => $brand,
        'gendre' => $gendre,
        'price' => $price,
        'promo' => $promo,
        'description' => $description,
        'url' => $urlImage,
        'status' => $status
      ]);

      if ($addedSuccessProduct) {
          $_SESSION['notify'] = [
              'message' => 'Thêm sản phẩm thành công',
              'error_code' => 0
          ];
      } else {
          $_SESSION['notify'] = [
              'message' => 'Thêm sản phẩm thất bại',
              'error_code' => 1
          ];
      }
    }
  }
} else if ('edit' == $action) {
  $id  = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
  $editProduct = $product->getProductById($id);

  if (isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : $editProduct[0]->name;
    $brand = isset($_POST['brand']) ? $_POST['brand'] : $editProduct[0]->brand;
    $gendre = isset($_POST['gendre']) ? $_POST['gendre'] : $editProduct[0]->gendre;
    $price = isset($_POST['price']) ? $_POST['price'] : $editProduct[0]->price;
    $promo  = isset($_POST['promo']) ? $_POST['promo'] : $editProduct[0]->promo;
    $description  = isset($_POST['description']) ? $_POST['description'] : $editProduct[0]->description;
    $status = isset($_POST['status']) ? 'Active' : 'Inactive';
    $url = $_FILES['url'];

    //Xử lý lưu file ảnh
    if (($url['name']) != '') {
      $urlImage = 'assets/img/' . $url['name'];
      $notiUploadImage = uploadFileImage($url);
    } else {
      $urlImage  = $editProduct[0]->url;
    }

    $updateProduct = $product->update($id,
    [
      'name' => $name,
      'brand' => $brand,
      'gendre' => $gendre,
      'price' => $price,
      'promo' => $promo,
      'description' => $description,
      'url' => $urlImage,
      'status' => $status,
      'updated_at' => @date('Y-m-d H:i:s')
    ]);
    if ($updateProduct) {
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

if (isset($_POST['back'])) {
  header("Location:./../products.php");
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
            <h1>Sản phẩm</h1>
          </div>
          <div class="col-sm-6" style="text-align:right;">
            <form action="" method="post">
              <button type="submit" name="back" class="btn btn-info">Quay lại danh sách sản phẩm</button>
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
                  <h3 class="card-title">Thêm sản phẩm</h3>
              </div>
              <?php if (isset($err)) { ?>
                  <div style="color:red"><?php echo $err; ?></div>
              <?php } ?> 
              <form method="post" enctype="multipart/form-data">
                  <div class="card-body">
                      <div class="form-group">
                        <label for="inputName">Tên sản phẩm (*)</label>
                        <input type="text" class="form-control" value="<?php if(isset($editProduct)){echo $editProduct[0]->name;}?>" name="name" id="inputName" placeholder="Nhập vào tên sản phẩm">
                      </div>

                      <div class="form-group">
                        <label for="inputBrand">Thương hiệu (*)</label>
                        <input type="text" class="form-control" value="<?php if(isset($editProduct)){echo $editProduct[0]->brand;}?>" name="brand" id="inputBrand" placeholder="Nhập vào tên thương hiệu">
                      </div>

                      <div class="form-group">
                        <label for="inputDescription">Mô tả sản phẩm (*)</label>
                        <input type="text" class="form-control" value="<?php if(isset($editProduct)){echo $editProduct[0]->description;}?>" name="description" id="inputDescription" placeholder="Nhập vào mô tả sản phẩm">
                      </div>

                      <div class="form-group">
                        <label>Dành cho giới tính</label>
                        <select class="form-control" name="gendre">
                          <option>Unisex</option>
                          <option>Nam</option>
                          <option>Nữ</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="inputPrice">Giá gốc (*)</label>
                        <input type="text" class="form-control" name="price" value="<?php if(isset($editProduct)){echo $editProduct[0]->price;}?>" id="inputPrice" placeholder="Giá gốc">
                      </div>

                      <div class="form-group">
                        <label for="inputPromo">Giá khuyến mãi</label>
                        <input type="text" class="form-control" name="promo" value="<?php if(isset($editProduct)){echo $editProduct[0]->promo;}?>" id="inputPromo" placeholder="Giá khuyến mãi">
                      </div>

                      <div class="form-group">
                        <label for="inputFile">Tải lên hình ảnh (*)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputFile" value="<?php if(isset($editProduct)){echo $editProduct[0]->url;}?>" name="url" accept=".jpg, .png, .jpeg">
                            <label class="custom-file-label" for="inputFile">Chọn hình ảnh</label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group d-flex flex-column">
                        <label>Trạng thái</label>
                        <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                            <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                              <input type="checkbox" name="status" <?=(isset($editProduct) && $editProduct[0]->status == 'Inactive') ? '' : 'checked' ?> data-bootstrap-switch="">
                            </div>
                        </div>
                      </div>

                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Đồng ý với thay đổi</label>
                      </div>
                  </div>

                  <div class="card-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Xác nhận</button>
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

<script>
  $("input[data-bootstrap-switch]").each(function(){
    $(this).bootstrapSwitch('state', $(this).prop('checked'));
  }) 

  $(function () {
    bsCustomFileInput.init();
  });
</script>