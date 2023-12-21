<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
   <title>admin page</title>
   <?php include_once 'admin_header.php' ?>
   <div id="container1">
    <br>
    <h1>TỔNG HỢP PHIẾU XUẤT KHO</h1>
    <br>
   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">SỐ PHIẾU</th>
      <th scope="col">TÊN KHÁCH HÀNG</th>
      <th scope="col">TỔNG TIỀN</th>
      <th scope="col">NGÀY MUA</th>
      <th scope="col">XUẤT PHIẾU</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;
    $sql = "SELECT * FROM hoadon INNER JOIN khachhang ON hoadon.MaKH=khachhang.MaKH"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaHD = $row['MaHD'];
            $TenKH = $row['TenKH'];
            $SoTien = $row['SoTien'];
            $NgayLap = $row['NgayLap'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaHD.'</td>
      <td>'.$TenKH.'</td>
      <td>'.$SoTien.'</td>
      <td>'.$NgayLap.'</td>
      <td><a href="admin_export_invoice.php?id='.$MaHD.'&name='.$TenKH.'">XUẤT</a></td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>
</div>