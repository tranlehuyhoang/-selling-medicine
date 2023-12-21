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
    <h1>CHI TIẾT KHO <?php echo $_GET['id'] ?></h1>
    <br>
   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">MÃ SẢN PHẨM</th>
      <th scope="col">SỐ LƯỢNG CÒN</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    $id=$_GET['id'];
    $sql = "SELECT * FROM tonkho WHERE MaKho = '$id' "; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaMH = $row['MaMH'];
            $SoLuongTon = $row['SoLuongTon'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td>'.$MaMH.'</td>
      <td>'.$SoLuongTon.'</td>
    </tr>
            ';
        }
    }
    ?>
  </tbody>
</table>
</div>