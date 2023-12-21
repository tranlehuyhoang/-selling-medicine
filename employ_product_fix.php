<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name'])){
   header('location:login_form.php');
}

?>
<title>Trang nhân viên</title>
<?php include_once 'admin_header.php';
    
   if(isset($_POST['fix'])){
        $id=$_GET['id'];
        $img=$_POST['img'];
        $ten=$_POST['ten'];
        $price=$_POST['price'];
        $mota=$_POST['mota'];
        $dm=$_POST['dm'];
        $ctdm=$_POST['ctdm'];
        $anhcu=$_POST['anhcu'];
        $timestamp = strtotime($_POST['nsx']);
        $nsx = date("Y-m-d", $timestamp);
      $timestamp1 = strtotime($_POST['hsd']);
      $hsd = date("Y-m-d", $timestamp1);
      if($img==''){
        $sql = "UPDATE mathang SET TenMH='$ten',GiaBan='$price',NgaySX='$nsx',MoTa='$mota',HanSD='$hsd',HINH='$anhcu',DanhMuc='$dm',CTDM='$ctdm'  WHERE MaMH = '$id'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn
      }else{
        $sql = "UPDATE mathang SET TenMH='$ten',GiaBan='$price',NgaySX='$nsx',MoTa='$mota',HanSD='$hsd',HINH='uploads/$img',DanhMuc='$dm',CTDM='$ctdm'  WHERE MaMH = '$id'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn
      }
        $result = $conn->query($sql);
   }
   if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql = "SELECT * FROM mathang WHERE MaMH = '$id'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn
    $result = $conn->query($sql);
}
   ?>
<div id="container1">
    <br>
    <h1>SỬA SẢN SẢN PHẨM <?php echo $_GET['id']; ?></h1>
    <br>

    <?php
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
<form action="" method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ảnh</label>
    <img src="'.$HINH.'" alt="">
    <input type="file" name="img" class="form-control" >
    <input type="text" value="'.$HINH.'" name="anhcu" class="form-control" hidden>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
    <input value="'.$TenMH.'" type="text" class="form-control" name="ten">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Giá bán</label>
    <input value="'.$GiaBan.'" type="number" class="form-control" name="price">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ngày sản xuất</label>
    <input value="'.$NgaySX.'" type="date" class="form-control" name="nsx">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mô tả</label>
    <textarea name="mota" id="" cols="30" rows="10" class="form-control">'.$MoTa.'</textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Hạn sử dụng</label>
    <input value="'.$HanSD.'" type="date" class="form-control" name="hsd">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Danh mục</label>
    <input value="'.$DanhMuc.'" type="text" class="form-control" name="dm">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Chi tiết danh mục</label>
    <input value="'.$CTDM.'" type="text" class="form-control" name="ctdm">
  </div>
  <button type="submit" name="fix" class="btn btn-primary">SỬA</button>
</form>
</div>';
        }};
?>