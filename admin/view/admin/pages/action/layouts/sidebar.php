<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./../../pages/home.php" class="brand-link">
      <img src="./../../../../Public/admin/dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Cerise</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./../../../../Public/admin/dist/img/avatar-me.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="./../../pages/profile.php" class="d-block">Nguyễn Mạnh Hùng</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="./../../pages/home.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Thống kê</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Danh sách
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./../../pages/products.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./../../pages/order.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Đơn hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./../../pages/users.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Người dùng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./../../pages/register_admin.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị viên</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="./../../pages/profile.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>