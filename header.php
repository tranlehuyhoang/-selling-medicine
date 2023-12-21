<?php
@include 'config.php';
session_start();
?>

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
    <script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
</head>

<body>

    <!---navbar start-->
    <nav id="navbar">
        <div class="nav">
            <a href="index.php"><img src="img/pharmalogo.svg" alt="logo"></a>
            <!--logo-->
            <div></div>

            <div class="wrapper">
                <div class="menu_logo"><a href="#"></a></div>
                <ul class="nav-links">
                    <li>
                        <a href="#">Dược phẩm</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=Thuốc không kê đơn">Thuốc không kê đơn</a></li>
                            <li><a href="search_from_menu.php?category=Thuốc kê đơn">Thuốc kê đơn</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Chăm sóc sức khỏe</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=Thực phẩm dinh dưỡng">Thực phẩm dinh dưỡng</a>
                            </li>
                            <li><a href="search_from_menu.php?category=Dụng cụ sơ cứu">Dụng cụ sơ cứu</a></li>
                            <li><a href="search_from_menu.php?category=Kế hoạch gia đình">Kế hoạch gia đình</a></li>
                            <li><a href="all_products.php">Tất cả sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Chăm sóc cá nhân</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=Sản phẩm phòng tắm">Sản phẩm phòng tắm</a></li>
                            <li><a href="search_from_menu.php?category=Sản phẩm khử mùi">Sản phẩm khử mùi</a></li>
                            <li><a href="search_from_menu.php?category=Chăm sóc tóc">Chăm sóc tóc</a></li>
                            <li><a href="all_products.php">Tất cả sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Sản phẩm tiện lợi</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=Hàng tổng hợp">Hàng tổng hợp</a></li>
                            <li><a href="search_from_menu.php?category=Hàng bách hóa">Hàng bách hóa</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Thực phẩm chức năng</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=TPCN Nhóm dạ dày">TPCN Nhóm dạ dày</a></li>
                            <li><a href="search_from_menu.php?category=TPCN Nhóm tim mạch">TPCN Nhóm tim mạch</a></li>
                            <li><a href="search_from_menu.php?category=TPCN Nhóm đường huyết">TPCN Nhóm đường huyết</a>
                            </li>
                            <li><a href="all_products.php">Tất cả sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Mẹ và Bé</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=Chăm sóc em bé">Chăm sóc em bé</a></li>
                            <li><a href="search_from_menu.php?category=TPCN dành cho trẻ">TPCN dành cho trẻ</a></li>
                            <li><a href="search_from_menu.php?category=Sản phẩm dành cho mẹ">Sản phẩm dành cho mẹ</a>
                            </li>
                            <li><a href="all_products.php">Tất cả sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Chăm sóc sắc đẹp</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=Chăm sóc mặt">Chăm sóc mặt</a></li>
                            <li><a href="search_from_menu.php?category=Sản phẩm chống nắn">Sản phẩm chống nắng</a></li>
                            <li><a href="search_from_menu.php?category=Dụng cụ làm đẹp">Dụng cụ làm đẹp</a></li>
                            <li><a href="all_products.php">Tất cả sản phẩm</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Thiết bị y tế</a>
                        <ul class="drop-menu">
                            <li><a href="search_from_menu.php?category=Nhiệt kế">Nhiệt kế</a></li>
                            <li><a href="search_from_menu.php?category=Máy đo huyết áp">Máy đo huyết áp</a></li>
                            <li><a href="search_from_menu.php?category=Máy đo đường huyết">Máy đo đường huyết</a></li>
                            <li><a href="all_products.php">Tất cả sản phẩm</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="download-app">
                <a href="https://play.google.com/store/search?q=pharmacity&c=apps&hl=vi&gl=US">
                    <i class="fas fa-mobile-alt">
                    </i>
                    <p>Download App</p>
                </a>
            </div>

            <ul>
                <?php
                if (isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])) {
                    // Nếu người dùng đã đăng nhập, hiển thị tên người dùng và nút Đăng xuất
                    $loggedInUserName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : $_SESSION['user_name'];
                    echo '<li>
                            <p style="color: white">Xin chào, ' . $loggedInUserName . '</p>
                          </li>
                          <li>
                            <a href="logout.php">
                                <i class="fa-solid fa-sign-out-alt"></i>
                                <p style="color: white">Đăng xuất</p>
                            </a>
                          </li>';
                } else {
                    // Nếu chưa đăng nhập, hiển thị nút Đăng nhập và Đăng ký
                    echo '<li id="open_login">
                            <a href="login_form.php">
                                <i class="fa-regular fa-user"></i>
                                <p style="color: white">Đăng nhập</p>
                            </a>
                          </li>
                          <li id="open_login">
                            <a href="register_form.php">
                                <i class="fa-regular fa-user"></i>
                                <p style="color: white">Đăng ký</p>
                            </a>
                          </li>';
                }
                ?>
                <li>
                    <a href="#">
                        <i class="fa-regular fa-percent"></i>
                        <p style="color: white">Ưu đãi</p>
                    </a>
                </li>
                <li>
                    <?php
    // Check if the user is logged in
    if (isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])) {
        // If logged in, display the cart section with a link to the cart page
        echo '<a href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
                <p style="color: white">Giỏ hàng</p>
              </a>';
    } else {
        // If not logged in, display an alternative message or link
        echo '<a href="register_form.php"> <!-- Link to registration page -->
                <i class="fa-solid fa-cart-shopping"></i>
                <p style="color: white">Đăng ký để mua hàng</p> <!-- Custom message for non-logged-in users -->
              </a>';
    }
    ?>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>