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
    <h1>QUẢN LÝ KHO</h1>
    <br>
   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">MÃ KHO</th>
      <th scope="col">TÊN KHO</th>
      <th scope="col">SỨC CHỨA(SẢN PHẨM)</th>
      <th scope="col">XEM CHI TIẾT</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $sql = "SELECT * FROM kho "; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaKho = $row['MaKho'];
            $TenKho = $row['TenKho'];
            $SucChua = $row['SucChua'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaKho.'</td>
      <td>'.$TenKho.'</td>
      <td>'.$SucChua.'</td>
      <td><a href="admin_inventory_detail.php?id='.$MaKho.'">Xem</a></td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>
</div>