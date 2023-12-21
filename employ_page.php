<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['employ_name'])){
   header('location:login_form.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/admin_page.css">
    <script src="js/restrict.js"></script>
    <title>Trang quản trị</title>
    <?php include 'admin_header.php' ?>
</head>


<body>
    <div class="row">

        <?php
function createSection2($icon, $location, $title) {
echo '
<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
    <div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href=\''.$location.'\'">
       <div class="text-center">
      <span class="h1"><i class="fa fa-'.$icon.' p-2"></i></span>
          <div class="h5">'.$title.'</div>
       </div>
    </div>
</div>
';
}
createSection2('address-card', 'employ_order.php', 'Đơn hàng');
createSection2('handshake', 'employ_user.php', 'Khách hàng');
createSection2('shopping-bag', 'employ_product.php', 'Sản phẩm');
?>

    </div>
</body>
<!-- <div id="container1">
<img src="img/1.png" width="100%" alt="">
</div> -->