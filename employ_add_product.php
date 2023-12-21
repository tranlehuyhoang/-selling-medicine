<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name'])){
   header('location:login_form.php');
}

?>
<title>Trang nhân viên</title>
<?php include_once 'admin_header.php';
    
   if(isset($_POST['add'])){
        $img=$_POST['img'];
        $ten=$_POST['ten'];
        $price=$_POST['price'];
        $mota=$_POST['mota'];
        $dm=$_POST['dm'];
        $ctdm=$_POST['ctdm'];
        $timestamp = strtotime($_POST['nsx']);
        $nsx = date("Y-m-d", $timestamp);
        $timestamp1 = strtotime($_POST['hsd']);
        $hsd = date("Y-m-d", $timestamp1);
        $sql = "INSERT INTO mathang(TenMH,GiaBan,NgaySX,MoTa,HanSD,HINH,DanhMuc,CTDM)  VALUES('$ten',$price,'$nsx','$mota','$hsd','uploads/$img','$dm','$ctdm')"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn
        $result = $conn->query($sql);
   }
   ?>
<div id="container1">
    <br>
    <h1>THÊM SẢN PHẨM</h1>
    <br>


    <form action="" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ảnh</label>
            <input type="file" name="img" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên Sản Phẩm</label>
            <input value="" type="text" class="form-control" name="ten" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Giá bán</label>
            <input value="" type="number" class="form-control" name="price" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Ngày sản xuất</label>
            <input value="" type="date" class="form-control" name="nsx" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mô tả</label>
            <textarea name="mota" id="" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Hạn sử dụng</label>
            <input value="'" type="date" class="form-control" name="hsd" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Danh mục</label>
            <input value="" type="text" class="form-control" name="dm" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Chi tiết danh mục</label>
            <input value="" type="text" class="form-control" name="ctdm" required>
        </div>
        <button type="submit" name="add" class="btn btn-primary">THÊM</button>
    </form>
</div>';