<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name'])){
   header('location:login_form.php');
}

?>
   <title>Trang nhân viên</title>
   <?php include_once 'admin_header.php' ?>
   <div id="container1">
    <br>
    <h1>TỔNG HỢP ĐƠN HÀNG</h1>
    <br>
   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">MÃ ĐƠN HÀNG</th>
      <th scope="col">TÊN KHÁCH HÀNG</th>
      <th scope="col">TỔNG TIỀN</th>
      <th scope="col">NGÀY MUA</th>
      <th scope="col">XEM CHI TIẾT</th>
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
      <td><a href="employ_order_detail.php?id='.$MaHD.'">Xem</a></td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>
</div>