<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<title>admin page</title>
<?php include_once 'admin_header.php';
    if(isset($_GET['del'])){
      $id=$_GET['del'];
      $sql = "UPDATE mathang SET Xoa = 1 WHERE MaMH = '$id'"; 
      $result = $conn->query($sql);
    }
   ?>
<div id="container1">
    <br>
    <h1>TỔNG HỢP SẢN PHẨM</h1>
    <br>
    <a class="btn btn-primary" href="employ_add_product.php">Thêm sản phẩm</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">HÌNH</th>
                <th scope="col">MÃ SẢN PHẨM</th>
                <th scope="col">TÊN SẢN PHẨM</th>
                <th scope="col">GIÁ</th>
                <th scope="col">NGÀY SẢN XUẤT</th>
                <th scope="col">MÔ TẢ</th>
                <th scope="col">HẠN SỬ DỤNG</th>
                <th scope="col">DANH MỤC</th>
                <th scope="col">CTDM</th>
                <th scope="col">SỬA</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
    $i=1;
    $sql = "SELECT * FROM mathang WHERE Xoa = 0"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $MaMH = $row['MaMH'];
            $TenMH = $row['TenMH'];
            $GiaBan = $row['GiaBan'];
            $NgaySX = $row['NgaySX'];
            $MoTa = $row['MoTa'];
            $HanSD = $row['HanSD'];
            $HINH = $row['HINH'];
            $DanhMuc = $row['DanhMuc'];
            $CTDM = $row['CTDM'];
            echo'
            <tr>
      <th scope="row">'.$i++.'</th>
      <td><img width="50%" src="'.$HINH.'"></td>
      <td>'.$MaMH.'</td>
      <td>'.$TenMH.'</td>
      <td>'.$GiaBan.'</td>
      <td>'.$NgaySX.'</td>
      <td>'.$MoTa.'</td>
      <td>'.$HanSD.'</td>
      <td>'.$DanhMuc.'</td>
      <td>'.$CTDM.'</td>
      <td><a href="employ_product_fix.php?id='.$MaMH.'">SỬA</a></td>
      <td><a href="employ_product.php?del='.$MaMH.'">XÓA</a></td>
    </tr>
            ';
        }
    }
    ?>
        </tbody>
    </table>
</div>