<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<?php if(isset($_SESSION['admin_name'])){
echo'<header style="display:flex; justify-content:center; background-color: skyblue;color:white">
      <h1>Chào <span>'.$_SESSION['admin_name'].'</span>! Đây là trang quản trị</h1>
      <a href="admin_login.php?logout=1" class="btn">logout</a>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHARMACITY ADMIN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin_page.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_employ.php">Quản lý nhân viên</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_order_status.php">Trạng thái giao hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_revenue.php">Doanh thu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_inventory.php">Tồn kho</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_invoice.php">Xuất Phiếu Kho</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tùy chọn
          </a>
          <ul class="dropdown-menu">
          <li class="nav-item">
          <a class="nav-link" href="admin_order.php">Đơn hàng</a>
        </li>
            <li class="nav-item">
          <a class="nav-link" href="admin_user.php">Khách hàng</a>
        </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
';}else{echo '<header style="display:flex; justify-content:center; background-color: skyblue;color:white">
    <h1>Chào <span>'.$_SESSION['employ_name'].'</span>! Đây là trang nhân viên</h1>
    <a href="admin_login.php?logout=1" class="btn">logout</a>
</header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PHARMACITY EMPLOY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="employ_page.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employ_order.php">Đơn hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employ_user.php">Khách hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="employ_product.php">Sản phẩm</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tùy chọn
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
            <li><a class="dropdown-item" href="#">K</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
';} ?>