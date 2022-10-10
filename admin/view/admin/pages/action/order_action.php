<?php
include_once "./../../../../Lib/check_login.php";
require_once "./../../../../dals/OrderDal.php";
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

$order = new OrderDal();
$listOrders = $order->listAll();

if ('add' == $action) {
  if (isset($_POST['submit'])) {
    $orderCode = isset($_POST['order_code']) ? $_POST['order_code'] : '';
    $fullname = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $totalPrice = isset($_POST['total_price']) ? $_POST['total_price'] : '';
    $note = isset($_POST['note']) ? $_POST['note'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
    if ($email == '' || $totalPrice == '' || $fullname == '' || $address == '' || $phone == '') {
      $err = 'Vui lòng nhập đầy đủ thông tin';
    } else {
        if (!mb_eregi("^[0-9]", $phone)) {
            //Kiểm tra SĐT có đúng định dạng hay không
            $errPhone = 'SĐT không hợp lệ. Vui lòng nhập SĐT khác';
        } else if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
            $errEmail = 'Email này không hợp lệ. Vui lòng nhập email khác';
        } else {
          echo 'ok';
          $addedSuccessOrder = $order->add([
            'order_code' => $orderCode,
            'full_name' => $fullname,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'total_price' => $totalPrice,
            'note' => $note,
            'status' => $status
          ]);
          if ($addedSuccessOrder) {
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
  $editOrder = $order->getOrderById($id);

  if (isset($_POST['submit'])) {
    $orderCode = isset($_POST['order_code']) ? $_POST['order_code'] : $editOrder[0]->order_code;
    $fullname = isset($_POST['full_name']) ? $_POST['full_name'] : $editOrder[0]->full_name;
    $email = isset($_POST['email']) ? $_POST['email'] : $editOrder[0]->email;
    $phone = isset($_POST['phone']) ? $_POST['phone'] : $editOrder[0]->phone;
    $address = isset($_POST['address']) ? $_POST['address'] : $editOrder[0]->address;
    $totalPrice  = isset($_POST['total_price']) ? $_POST['total_price'] : $editOrder[0]->total_price;
    $note  = isset($_POST['note']) ? $_POST['note'] : $editOrder[0]->note;
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    if (!mb_eregi("^[0-9]", $phone)) {
        //Kiểm tra SĐT có đúng định dạng hay không
        $errPhone = 'SĐT không hợp lệ. Vui lòng nhập SĐT khác';
    } else if (!mb_eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
        $errEmail = 'Email này không hợp lệ. Vui lòng nhập email khác';
    } else {
      $updateOrder = $order->update($id,
      [
        'order_code' => $orderCode,
        'full_name' => $fullname,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'total_price' => $totalPrice,
        'note' => $note,
        'status' => $status,
        'updated_at' => @date('Y-m-d H:i:s')
      ]);
      if ($updateOrder) {
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
  header("Location:./../order.php");
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
            <h1>Đơn hàng</h1>
          </div>

          <div class="col-sm-6" style="text-align:right;">
            <form action="" method="post">
              <button type="submit" name="back" class="btn btn-info">Quay lại trang đơn hàng</button>
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
                        <h3 class="card-title">Tạo đơn hàng</h3>
                    </div>
                    <?php if (isset($err)) { ?>
                        <div style="color:red"><?php echo $err; ?></div>
                    <?php } ?> 
                    <form method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputCode">Mã đơn hàng</label>
                                <input type="text" class="form-control" name="order_code" id="inputCode" value="<?php echo "NMH" . rand(100000000,999999999)?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="inputName">Tên người đặt hàng</label>
                                <input type="text" class="form-control" name="full_name" value="<?php if(isset($editOrder)){echo $editOrder[0]->full_name;}?>" id="inputName" placeholder="Nhập vào tên người đặt hàng">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php if(isset($editOrder)){echo $editOrder[0]->email;}?>" id="inputEmail" placeholder="Nhập vào email đăng kí">
                            </div>
                            <?php if (isset($errEmail)) { ?>
                              <div style="color:red"><?php echo $errEmail; ?></div>
                            <?php } ?> 

                            <div class="form-group">
                                <label for="inputPhone">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone" value="<?php if(isset($editOrder)){echo $editOrder[0]->phone;}?>" id="inputPhone" placeholder="Nhập số điện thoại">
                            </div>
                            <?php if (isset($errPhone)) { ?>
                              <div style="color:red"><?php echo $errPhone; ?></div>
                            <?php } ?>

                            <div class="form-group">
                                <label for="inputAddress">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="<?php if(isset($editOrder)){echo $editOrder[0]->address;}?>" id="inputAddress" placeholder="Nhập số địa chỉ người nhận">
                            </div>

                            <div class="form-group">
                              <label>Trạng thái đơn hàng</label>
                              <select class="form-control" name="status">
                                <option>Delivery</option>
                                <option>Received</option>
                              </select>
                            </div>

                            <div class="form-group">
                                <label for="inputPrice">Tổng số tiền</label>
                                <input type="text" class="form-control" name="total_price" value="<?php if(isset($editOrder)){echo $editOrder[0]->total_price;}?>" id="inputPrice" placeholder="Tổng số tiền">
                            </div>
                            <div class="form-group">
                                <label for="inputNote">Ghi chú</label>
                                <input type="text" class="form-control" name="note" value="<?php if(isset($editOrder)){echo $editOrder[0]->note;}?>" id="inputNote" placeholder="Ghi chú">
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