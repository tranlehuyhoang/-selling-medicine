<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
   <title>admin page</title>
   <?php include_once 'admin_header.php';
    if(isset($_GET['id1'])){
        $id=$_GET['id1'];
        $sql = "UPDATE hoadon SET TrangThai='Đã phê duyệt' WHERE MaHD=$id"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn
        $result = $conn->query($sql);
    }
    if(isset($_GET['id2'])){
        $id=$_GET['id2'];
        $sql = "UPDATE hoadon SET TrangThai='Đã giao' WHERE MaHD=$id"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn
        $result = $conn->query($sql);
    }
    // if(isset($_GET['id3'])){

    // }
   ?>
   <div id="container1">
    <br>
    <h1>TRẠNG THÁI GIAO HÀNG</h1>
    <br>
    <h2 style="color:red;">CHƯA PHÊ DUYỆT</h2>
   <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col">STT</th>
      <th scope="col">MÃ ĐƠN HÀNG</th>
      <th scope="col">TÊN KHÁCH HÀNG</th>
      <th scope="col">TỔNG TIỀN</th>
      <th scope="col">NGÀY MUA</th>
      <th scope="col">PHƯƠNG THỨC</th>
      <th scope="col">XEM CHI TIẾT</th>
      <th scope="col">PHÊ DUYỆT</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;
    $sql = "SELECT * FROM hoadon INNER JOIN khachhang ON hoadon.MaKH=khachhang.MaKH WHERE hoadon.TrangThai='Chưa phê duyệt'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaHD = $row['MaHD'];
            $TenKH = $row['TenKH'];
            $SoTien = $row['SoTien'];
            $NgayLap = $row['NgayLap'];
            $PhuongThucTT = $row['PhuongThucTT'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaHD.'</td>
      <td>'.$TenKH.'</td>
      <td>'.$SoTien.'</td>
      <td>'.$NgayLap.'</td>
      <td>'.$PhuongThucTT.'</td>
      <td><a href="employ_order_detail.php?id='.$MaHD.'">Xem chi tiết</a></td>
      <td><a href="admin_order_status.php?id1='.$MaHD.'">Phê duyệt</a></td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>



<br>
    <h2 style="color:red;">ĐANG GIAO HÀNG</h2>
   <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col">STT</th>
      <th scope="col">MÃ ĐƠN HÀNG</th>
      <th scope="col">TÊN KHÁCH HÀNG</th>
      <th scope="col">TỔNG TIỀN</th>
      <th scope="col">NGÀY MUA</th>
      <th scope="col">PHƯƠNG THỨC</th>
      <th scope="col">XEM CHI TIẾT</th>
      <th scope="col">ĐÁNH GIẤU ĐÃ GIAO</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;
    $sql = "SELECT * FROM hoadon INNER JOIN khachhang ON hoadon.MaKH=khachhang.MaKH WHERE hoadon.TrangThai='Đã phê duyệt'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaHD = $row['MaHD'];
            $TenKH = $row['TenKH'];
            $SoTien = $row['SoTien'];
            $NgayLap = $row['NgayLap'];
            $PhuongThucTT = $row['PhuongThucTT'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaHD.'</td>
      <td>'.$TenKH.'</td>
      <td>'.$SoTien.'</td>
      <td>'.$NgayLap.'</td>
      <td>'.$PhuongThucTT.'</td>
      <td><a href="employ_order_detail.php?id='.$MaHD.'">Xem chi tiết</a></td>
      <td><a href="admin_order_status.php?id2='.$MaHD.'">Phê duyệt</a></td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>


<br>
    <h2 style="color:red;">ĐÃ GIAO HÀNG</h2>
   <table class="table table-bordered">
  <thead>
    <tr>
    <th scope="col">STT</th>
      <th scope="col">MÃ ĐƠN HÀNG</th>
      <th scope="col">TÊN KHÁCH HÀNG</th>
      <th scope="col">TỔNG TIỀN</th>
      <th scope="col">NGÀY MUA</th>
      <th scope="col">PHƯƠNG THỨC</th>
      <th scope="col">XEM CHI TIẾT</th>
      <th scope="col">ĐÁNH GIẤU ĐÃ GIAO</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=1;
    $sql = "SELECT * FROM hoadon INNER JOIN khachhang ON hoadon.MaKH=khachhang.MaKH WHERE hoadon.TrangThai='Đã giao'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaHD = $row['MaHD'];
            $TenKH = $row['TenKH'];
            $SoTien = $row['SoTien'];
            $NgayLap = $row['NgayLap'];
            $PhuongThucTT = $row['PhuongThucTT'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaHD.'</td>
      <td>'.$TenKH.'</td>
      <td>'.$SoTien.'</td>
      <td>'.$NgayLap.'</td>
      <td>'.$PhuongThucTT.'</td>
      <td><a href="employ_order_detail.php?id='.$MaHD.'">Xem chi tiết</a></td>
      <td><a href="admin_order_status.php?id3='.$MaHD.'">Phê duyệt</a></td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>
</div>