<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
   <title>admin page</title>
   <?php include_once 'admin_header.php';
    if(isset($_POST['get1'])){
      $timestamp = strtotime($_POST['ngay']);
      $ngay_da_chuyen_doi = date("Y-m-d", $timestamp);
        $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon WHERE NgayLap='$ngay_da_chuyen_doi'  GROUP BY PhuongThucTT  "; 
        $result = $conn->query($sql);
        $result1 = $conn->query($sql);
        $result2 = $conn->query($sql);
    }
    else if(isset($_POST['get2'])){
      $nam_da_chuyen_doi = $_POST['nam'];
      $thang_da_chuyen_doi = $_POST['thang'];
        $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon WHERE YEAR(NgayLap)='$nam_da_chuyen_doi' AND MONTH(NgayLap)='$thang_da_chuyen_doi'  GROUP BY PhuongThucTT  "; 
        $result = $conn->query($sql);
        $result1 = $conn->query($sql);
        $result2 = $conn->query($sql);
    }
    else if(isset($_POST['get3'])){
      $nam_da_chuyen_doi = $_POST['nam'];
        $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon WHERE YEAR(NgayLap)='$nam_da_chuyen_doi' GROUP BY PhuongThucTT  "; 
        $result = $conn->query($sql);
        $result1 = $conn->query($sql);
        $result2 = $conn->query($sql);
    }else{
      $sql = "SELECT COUNT(*) as 'SoDon',SUM(SoTien) as 'Tong',PhuongThucTT FROM  hoadon  GROUP BY PhuongThucTT"; 
      $result = $conn->query($sql);
      $result1 = $conn->query($sql);
      $result2 = $conn->query($sql);
    }
    
   ?>
   <div id="container1">
    <br>
    <h1>DOANH THU</h1>
    <br>
    <div class="row">
    <form class="col-md-4" method="POST" action="">
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Xuất doanh thu theo ngày</label>
      <input type="date" name="ngay" class="form-control" placeholder="Disabled input">
    </div>
    <button type="submit" name="get1" class="btn btn-primary">Xuất</button>
</form>

<form class="col-md-4" method="POST" action="">
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Xuất doanh thu theo tháng năm</label>
      <select id="disabledSelect" name="thang" class="form-select">
        <?php 
            for ($i=1; $i < 13; $i++) { 
                echo'<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
      </select>
    </div>
    <div class="mb-3">
      <select id="disabledSelect" name="nam" class="form-select">
      <?php 
            $namHienTai = date("Y");
            for ($i=$namHienTai; $i >= 2020; $i--) { 
                echo'<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
      </select>
    </div>
    <button type="submit" name="get2" class="btn btn-primary">Xuất</button>
</form>

<form class="col-md-4" method="POST" action="">
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Xuất doanh thu theo năm</label>
      <select id="disabledSelect" name="nam" class="form-select">
      <?php 
            $namHienTai = date("Y");
            for ($i=$namHienTai; $i >= 2020; $i--) { 
                echo'<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
      </select>
    </div>
    <button type="submit" name="get3" class="btn btn-primary">Xuất</button>
</form>
    </div>
    
<br>
<br>
    <h2 style="color:red;">DOANH THU TRỰC TIẾP</h2>
   <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col">TỔNG ĐƠN HÀNG</th>
      <th scope="col">DOANH THU</th>
      <th scope="col">XEM CHI TIẾT</th>
    </tr>
  </thead>
  <tbody>
            <?php
            $tongdon='';
            $Tong=0;
            $PhuongThucTT='';
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $tongdon=$row['SoDon'];
                    $Tong=$row['Tong'];
                    $PhuongThucTT=$row['PhuongThucTT'];
                    if($PhuongThucTT=='Tiền mặt'){
                    echo'
                    <tr>
      <td>'.$tongdon.'</td>
      <td>'.$Tong.'</td>
      <td><a href="employ_order_detail.php?id=">Xem chi tiết</a></td>
    </tr>
                    ';}
                  }
                }
            ?>
  </tbody>
</table>



<br>
    <h2 style="color:red;">DOANH THU NGÂN HÀNG</h2>
   <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col">TỔNG ĐƠN HÀNG</th>
      <th scope="col">DOANH THU</th>
      <th scope="col">XEM CHI TIẾT</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $tongdon='';
  $Tong=0;
  $PhuongThucTT='';
                if ($result1->num_rows > 0) {
                  while ($row1 = $result1->fetch_assoc()) {
                    $tongdon=$row1['SoDon'];
                    $Tong=$row1['Tong'];
                    $PhuongThucTT=$row1['PhuongThucTT'];
                    if($PhuongThucTT=='Chuyển khoản'){
                    echo'
                    <tr>
      <td>'.$tongdon.'</td>
      <td>'.$Tong.'</td>
      <td><a href="employ_order_detail.php?id=">Xem chi tiết</a></td>
    </tr>
                    ';}
                  }
                }
            ?>
  </tbody>
</table>

<br>
    <h2 style="color:red;">DOANH THU MOMO</h2>
   <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col">TỔNG ĐƠN HÀNG</th>
      <th scope="col">DOANH THU</th>
      <th scope="col">XEM CHI TIẾT</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $tongdon='';
  $Tong=0;
  $PhuongThucTT='';
                if ($result2->num_rows > 0) {
                  while ($row2 = $result2->fetch_assoc()) {
                    $tongdon=$row2['SoDon'];
                    $Tong=$row2['Tong'];
                    $PhuongThucTT=$row2['PhuongThucTT'];
                    if($PhuongThucTT=='MOMO QR'){
                    echo'
                    <tr>
      <td>'.$tongdon.'</td>
      <td>'.$Tong.'</td>
      <td><a href="employ_order_detail.php?id=">Xem chi tiết</a></td>
    </tr>
                    ';}
                  }
                }
            ?>
  </tbody>
</table>



</div>