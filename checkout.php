<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacity</title>
    <link rel="icon" href="img/pharmalogo.svg">
    <!---adding logo icon-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productDetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
    <style>
        table th{
            font-size: 30px;
        }
        table td{
            font-size: 20px;
        }
    </style>
</head>

<body>
    <?php include_once 'header.php' ;

    if(isset($_POST['checkout'])){
        $total=$_POST['total'];
        $method=$_POST['method'];
        $MaKH=$_SESSION['MaKH'];
        $sql = "INSERT INTO hoadon(SoTien,PhuongThucTT,MaKH) VALUES($total,'$method','$MaKH')";
        $result = $conn->query($sql);
        $sql = "SELECT * FROM hoadon ORDER BY MaHD DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $MaHD=$row['MaHD'];
        foreach ($_SESSION['cart'] as $key) {
            $MaMH=$key['MaMH'];
            $total=$key['total'];
            $quantity=$key['quantity'];
            $sql = "INSERT INTO cthd(MaHD,MaMH,ThanhTien,Soluong) VALUES($MaHD,'$MaMH',$total,$quantity)";
            $result = $conn->query($sql);
            $sql = "UPDATE tonkho SET SoLuongTon=SoLuongTon-$quantity WHERE MaMH='$MaMH'";
            $result = $conn->query($sql);
        }
        unset($_SESSION['cart']);
    }
    if(isset($_GET['del'])){
        array_splice($_SESSION['cart'], $_GET['del'], 1);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    ?>
<br>
<br>
<br>
<br>
<br>
<h1>THÔNG TIN THANH TOÁN</h1>
<br>
<br>
<br>
<div id="container" style="display:flex;flex-direction:column;justify-content:center;width:100%">
<table border="1" style="width:100%">
        <thead>
            <tr>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tong=0;
            $i=0;
                if(isset($_SESSION['cart'])){
                    foreach ($_SESSION['cart'] as $key) {
                        $tong=$tong+$key['total'];
                        echo'
                        <tr>
            <td><img src="'.$key['img'].'"></td>
            <td>'.$key['nameProduct'].'</td>
            <td>'.$key['price'].' vnđ</td>
            <td>'.$key['quantity'].'</td>
            <td>'.$key['total'].' vnđ</td>
            </tr>
                        ';
                        $i++;
                    }
                }
            ?>
        </tbody>
        <thead>
            <tr>
                <td colspan="4" style="font-size:40px;font-weight:bold;color:red;">TOTAL :</td>
                <td><?php echo  $tong.' vnđ'; ?></td>
            </tr>
        </thead>
    </table>
    <br>
    <br>
    <br>
    <form action="" target="_blank" method="POST">
    <div id="btn" style="display:flex; width:90%;column-gap: 2% ;justify-content:right;">
    <input type="number" value="<?php echo  $tong; ?>" name="total" hidden>
    <input type="radio" id="method1"  name="method" checked value="Tiền mặt"><label for="method1" >Tiền mặt</label>
    <input type="radio" id="method2"  name="method" value="Chuyển khoản"><label for="method2">Chuyển khoản</label>
    <button type="submit" name="checkout" style="width:10%; height:50px;">THANH TOÁN</button>
    </div>
    </form>
    <br>
    <form action="momo/xulythanhtoanmomo.php" target="_blank" method="POST" enctype="application/x-www-form-urlencoded">
    <div id="btn" style="display:flex; width:90%; justify-content:right;">
    <input type="number" value="<?php echo  $tong; ?>" name="total" hidden>
    <button type="submit" name="checkout" style="width:10%; height:50px; background-color: red;color:white">QUÉT MÃ MOMO</button>
    </div>
    </form>
    <br>
    <br>
    <br>
</div>
    <?php include_once 'footer.php' ?>
</body>

</html>