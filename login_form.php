<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['TenKH']);
   $email = mysqli_real_escape_string($conn, $_POST['Email']);
   $pass = md5($_POST['Password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['VaiTro'];

   $select = " SELECT * FROM khachhang WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
      $_SESSION['MaKH']= $row['MaKH'];

      if($row['VaiTro'] == 'admin'){

         $_SESSION['admin_name'] = $row['TenKH'];
         header('location:admin_page.php');

      }elseif($row['VaiTro'] == 'user'){

         $_SESSION['user_name'] = $row['TenKH'];
         header('location:index.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="login_style.css">

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>ĐĂNG NHẬP NGAY</h3>
            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <input type="email" name="Email" required placeholder="Nhập Email">
            <input type="password" name="Password" required placeholder="Nhập mật khẩu">
            <input type="submit" name="submit" value="Đăng nhập" class="form-btn">
            <p>Bạn chưa có tài khoản? <a href="register_form.php">Đăng ký ngay</a></p>
        </form>

    </div>

</body>

</html>