<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
   <title>admin page</title>
   <?php include_once 'admin_header.php';$ngay = date("d"); $thang = date("m"); $nam = date("Y"); ?>
   <div id="container1">
    <br>
    <h1>PHIẾU XUẤT KHO SỐ <?php echo $_GET['id'] ?></h1>
    <br>
    <div class="phieu" style="border:1px solid black">
    <div class="title" style="display:flex;justify-content: center;"><h2 style="color: red;">PHIẾU XUẤT KHO</h2></div>
    <div class="day" style="display:flex;justify-content: center;"><?php echo 'Ngày '.$ngay.' Tháng '.$thang.' Năm '.$nam ?></div>
    <div class="num" style="display:flex;justify-content: center;">Số phiếu: <?php echo $_GET['id'] ?></div>
    <div class="ten" style="display:flex;justify-content: center;">Họ tên người nhận hàng: <?php echo $_GET['name'] ?></div>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">TÊN SẢN PHẨM</th>
      <th scope="col">SỐ LƯỢNG</th>
      <th scope="col">THÀNH TIỀN</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;
    $id=$_GET['id'];
    $tong=0;
    $sql = "SELECT * FROM cthd INNER JOIN mathang ON cthd.MaMH=mathang.MaMH WHERE MaHD = $id "; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $TenMH = $row['TenMH'];
            $Soluong = $row['Soluong'];
            $ThanhTien = $row['ThanhTien'];
            $tong=$tong+$ThanhTien;
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$TenMH.'</td>
      <td>'.$Soluong.'</td>
      <td>'.$ThanhTien.'</td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
  <tfoot>
  <tr>
        <th colspan="2"></th>
        <th>TỔNG SỐ LƯỢNG</th>
        <th>TỔNG TIỀN</th>
    </tr>
    <tr>
        <th colspan="2"></th>
        <th><?php echo $i-1; ?></th>
        <th><?php echo $tong; ?></th>
    </tr>
  </tfoot>
</table>
    </div>
    
</div>