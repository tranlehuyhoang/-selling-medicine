<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['TenKH']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $pass = md5($_POST['Password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['VaiTro'];
    $dia_chi = mysqli_real_escape_string($conn, $_POST['DiaChi']);
    $so_dien_thoai = mysqli_real_escape_string($conn, $_POST['SoDienThoai']);

    $select = "SELECT * FROM khachhang WHERE Email = '$email' && Password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Password not matched!';
        } else {
            // Lấy mã khách hàng cuối cùng từ cơ sở dữ liệu
            $last_customer_query = "SELECT MaKH FROM khachhang ORDER BY MaKH DESC LIMIT 1";
            $last_customer_result = mysqli_query($conn, $last_customer_query);

            if (mysqli_num_rows($last_customer_result) > 0) {
                $last_customer_row = mysqli_fetch_assoc($last_customer_result);
                $last_customer_id = $last_customer_row['MaKH'];

                // Tách lấy số từ mã khách hàng cuối cùng để tăng giá trị lên 1
                $last_customer_number = (int)substr($last_customer_id, 2);
                $new_customer_number = $last_customer_number + 1;

                // Format lại mã khách hàng mới
                $customer_id = 'KH' . sprintf('%03d', $new_customer_number);
            } else {
                $customer_id = 'KH001';
            }

            $insert = "INSERT INTO khachhang(MaKH, TenKH, Email, Password, DiaChi, SDT, VaiTro) VALUES('$customer_id','$name','$email','$pass','$dia_chi','$so_dien_thoai', '$user_type')";
            if (mysqli_query($conn, $insert)) {
                header('location: login_form.php');
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="login_style.css">

</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>Đăng ký ngay</h3>
            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <input type="text" name="TenKH" required placeholder="Nhập tên của bạn">
            <input type="email" name="Email" required placeholder="Nhập Email">
            <input type="password" name="Password" required placeholder="Nhập mật khẩu">
            <input type="password" name="cpassword" required placeholder="Xác nhận mật khẩu">
            <input type="text" name="DiaChi" required placeholder="Nhập địa chỉ của bạn">
            <input type="text" name="SoDienThoai" required placeholder="Nhập số điện thoại của bạn">
            <select name="VaiTro">
                <option value="user">Khách hàng</option>
                <option value="employ">Nhân viên</option>
                <option value="admin">Quản Trị</option>
            </select>
            <input type="submit" name="submit" value="Đăng ký ngay" class="form-btn">
            <p>Bạn đã có tài khoản? <a href="login_form.php">Đăng nhập ngay</a></p>
        </form>

    </div>

</body>

</html>