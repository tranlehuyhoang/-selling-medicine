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
    <?php include_once 'header.php' ?>

    <!----search bar start-->
    <div class="search-layout">
        <div>
            <div class="search-header">
                <h2>Bạn đang tìm gì hôm nay?</h2>
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
            <form action="search.php" class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="search" placeholder="Tìm sản phẩm" id="#">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>
    <!----search bar end-->

    <!---new offer list start-->
    <div class="new-user-offer container">
        <h1 class="title">Ưu đãi cho bạn</h1>
        <div class="cards-layout">
            <div>
                <img src="https://cms-contents.pharmeasy.in/offer/37c262d84a5-25.jpg?dim=1024x0" alt="">
                <p>Ưu đãi 25% giá sản phẩm</p>
            </div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/offer/81308cc59b5-FLAT_20.jpg?dim=1024x0" alt="">
                <p>Ưu đãi 20% và quà tặng bất ngờ</p>
            </div>
            <div>
                <i class="fa-solid fa-lock"></i>
                <p>Đăng nhập để nhận ngay ưu đãi</p>
            </div>
        </div>
    </div>
    <!---new offer list end-->

    <!---shop categories start-->
    <div class="shop-categories container">
        <h1 class="title">Danh mục sản phẩm</h1>
        <div>
            <div>
                <img src="img/cate1.webp" alt="">
                <h4>Dược phẩm</h4>
            </div>
            <div>
                <img src="img/cate2.webp" alt="">
                <h4>Chăm sóc sức khỏe</h4>
            </div>
            <div>
                <img src="img/cate3.webp" alt="">
                <h4>Chăm sóc cá nhân</h4>
            </div>
            <div>
                <img src="img/cate4.webp" alt="">
                <h4>Sản phẩm tiện lợi</h4>
            </div>
            <div>
                <img src="img/cate5.webp" alt="">
                <h4>Thực phẩm chức năng</h4>
            </div>
            <div>
                <img src="img/cate6.webp" alt="">
                <h4>Mẹ và bé</h4>
            </div>
            <div>
                <img src="img/cate7.webp" alt="">
                <h4>Chăm sóc sắc đẹp</h4>
            </div>
        </div>
    </div>
    <!------------shop categories end----------->

    <!---order with prescription start-->
    <div class="order-with-prescription">
        <div>
            <img src="https://assets.pharmeasy.in/apothecary/images/rx_upload.svg?dim=1024x0" alt="">
            <div>
                <h3>Đặt thuốc theo toa dễ dàng với Pharmacity</h3>
                <p>Chat ngay hoặc gọi Hotline 1800 6821</p>
                <button>
                    <i class="fa-solid fa-paperclip"></i>
                    Đặt ngay
                </button>
            </div>
        </div>
        <div>
            <h4>Cách đặt hàng</h4>
            <div>
                <div>
                    <h3>1</h3>
                    <p>Chọn toa thuốc</p>
                </div>
                <div>
                    <h3>2</h3>
                    <p>Nhập thông tin</p>
                </div>
                <div>
                    <h3>3</h3>
                    <p>Nhận tư vấn</p>
                </div>
                <div>
                    <h3>4</h3>
                    <p>Hoàn thành thanh toán</p>
                </div>
            </div>
        </div>
    </div>
    <!---order with prescription end-->

    <!---preferential start-->
    <div class="new-launches container">
        <div class="title">Chỉ có tại Pharmacity</div>
        <div class="subtitle">Ưu đãi lên tới 50%</div>

        <div class="container preferential__container">
            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH001'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>


            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH002'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH003'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>
        </div>
    </div>

    <div class="product-cards">
    </div>
    </div>
    <!---preferential end-->

    <!---trending start-->
    <div class="trending container">
        <div class="title">Tủ thuốc gia đình</div>
        <div class="subtitle">Giao nhanh chỉ trong 2H</div>
        <div class="container preferential__container">
            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH027'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH028'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH029'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>
        </div>


    </div>
    <!---trending end-->

    <!---lab test start-->
    <div class="lab-tests container">
        <h1 class="title">Thương hiệu nổi bật</h1>
        <div>
            <img src="img/thnb1.webp" wdith="124" height="124">
            <img src="img/thnb2.webp" wdith="124" height="124">
            <img src="img/thnb3.png" wdith="124" height="124">
            <img src="img/thnb4.webp" wdith="124" height="124">
            <img src="img/thnb5.webp" wdith="124" height="124">
            <img src="img/thnb6.webp" wdith="124" height="124">
            <img src="img/thnb7.webp" wdith="124" height="124">
            <img src="img/thnb8.webp" wdith="124" height="124">
            <img src="img/thnb9.webp" wdith="124" height="124">
            <img src="img/thnb10.webp" wdith="124" height="124">
        </div>
    </div>
    <!---lab test end-->

    <!---become plus member start-->
    <div class="become-plus-member">
        <div>
            <h2>Đăng ký để nhận những ưu đãi từ Pharmacity</h2>
            <p>100% thuốc chuẩn chính hãng</p>
            <hr>
        </div>
        <div>
            <p>Miễn phí vận chuyển cho đơn hàng từ 300.000đ</p>
            <a href="register_form.php">
                <button>Đăng ký ngay! <i class="fa-solid fa-angle-right"></i></button></a>
        </div>
        <div>
            <img src="https://assets.pharmeasy.in/apothecary/_next/static/media/PlusFamily.22677720.png?dim=1024x0"
                alt="">
        </div>
    </div>
    <!---become plus member end-->

    <!---shop by concern start-->
    <div class="shop-by-concern container">
        <h1 class="title">Mua sắm theo danh mục</h1>
        <h3 class="subtitle">Sản phẩm được kiểm định rõ ràng</h3>
        <div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/homepage_top_categories_images/923a665cc6f-Skin_care.png?dim=128x0"
                    alt="">
                <h3>Skin care</h3>
            </div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/homepage_top_categories_images/18d2e2ee86b-Vitamins.png?dim=128x0"
                    alt="">
                <h3>Vitamin và thực phẩm bổ sung</h3>
            </div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/homepage_top_categories_images/0af9ac9f350-Diabetes.webp?dim=128x0"
                    alt="">
                <h3>Thực phẩm cho bệnh tiểu đường</h3>
            </div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/homepage_top_categories_images/24a0d2c733e-Heart.webp?dim=128x0"
                    alt="">
                <h3>Chăm sóc tim mạch</h3>
            </div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/homepage_top_categories_images/68369c9df98-Pregnancy.webp?dim=128x0"
                    alt="">
                <h3>Mẹ và bé</h3>
            </div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/homepage_top_categories_images/16ab65c0826-Covid.webp?dim=128x0"
                    alt="">
                <h3>Sản phẩm ngừa Covid</h3>
            </div>
            <div>
                <img src="https://cms-contents.pharmeasy.in/homepage_top_categories_images/26bbd7a9e98-Lifestyle.webp?dim=128x0"
                    alt="">
                <h3>Thực phẩm chức năng</h3>
            </div>
        </div>
    </div>
    <!---shop by concern end-->

    <!---freq booked start-->
    <div class="freq-booked-lab-tests container">
        <h1 class="title">Bão deal ngàn ưu đãi <a href="all_products.php" class="view-all">Xem tất cả</a></h1>
        <div class="container preferential__container">
            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH019'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH020'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>


            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH021'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

        </div>
    </div>
    <!---freq booked end-->

    <!---payment offer start-->
    <div class="payment-offers container">
        <h1 class="title">Top sản phẩm bán chạy<a href="all_products.php" class="view-all">Xem tất cả</a></h1>
        <div class="container preferential__container">
            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH030'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH032'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>


            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH034'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>
        </div>
    </div>
    <!---payment offer end-->

    <!-----welnes essential start-->
    <div class="wellness-essentials container">
        <h1 class="title">Thêm lựa chọn mới tại Pharmacity<a href="all_products.php" class="view-all">Xem tất
                cả</a>
        </h1>
        <div class="container preferential__container">
            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH039'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH040'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH041'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

        </div>
    </div>
    <!-----welnes essential end-->



    <!----deals of the day start-->
    <div class="deals-of-the-day container">
        <h1 class="title">Gợi ý hôm nay<span class="timer"><i class="fa-regular fa-clock"></i> 06:00 tiếng còn
                lại!</span> <a href="all_products.php" class="view-all">Xem tất cả</a></h1>
        <div class="container preferential__container">
            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH042'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH043'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>

            <article class="preferential">
                <div>
                    <?php
        // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
        $sql = "SELECT * FROM MATHANG WHERE MaMH = 'MH044'"; // Thay thế 'id' bằng tên cột ID trong bảng của bạn

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                $product_image = $row['HINH']; // Đường dẫn hình ảnh

                // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                echo "<img src='$product_image' alt='Product Image'>";
                
                // Lấy thông tin sản phẩm từ cột trong bảng và hiển thị
                $product_name = $row['TenMH']; // Tên sản phẩm
                $product_price = $row['GiaBan']; // Giá sản phẩm

                echo "<div class='preferential__info'>";
                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo '<a href="productDetail.php?MaMH=' . $row['MaMH'] . '" class="btn btn-primary">Xem chi tiết sản phẩm</a>';
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
        ?>
                </div>
            </article>
        </div>

    </div>


    <!---WHY CHOOSE START-->
    <div class="why-choose-us container">
        <h1 class="title">Tại sao bạn nên lưa chọn Pharmacity?</h1>
        <div>
            <div>
                <img src="https://assets.pharmeasy.in/apothecary/images/family.svg?dim=96x0" alt="">
                <div>
                    <h1>Đáp ứng đa dạng</h1>
                    <p>Từ dược phẩm đến thực phẩm chức năng, dược mỹ phẩm..</p>
                </div>
            </div>
            <div>
                <img src="https://assets.pharmeasy.in/apothecary/images/deliveryBoy.svg?dim=96x0" alt="">
                <div>
                    <h1>Giao hàng nhanh chóng</h1>
                    <p>Nhận hàng ngay chỉ trong vòng 2H</p>
                </div>
            </div>
            <div>
                <img src="https://assets.pharmeasy.in/apothecary/images/pincodeServed.svg?dim=96x0" alt="">
                <div>
                    <h1>100% chính hãng</h1>
                    <p>Đảm bảo chất lượng, thời hạn sử dụng lâu</p>
                </div>
            </div>
            <div>
                <img src="https://assets.pharmeasy.in/apothecary/images/locationMarker.svg?dim=96x0" alt="">
                <div>
                    <h1>Chương trình hấp dẫn</h1>
                    <p>Tại tất cả các cửa hàng ở gần bạn</p>
                </div>
            </div>
        </div>
    </div>
    <!---WHY CHOOSE END-->



    <!---floating button start-->
    <div class="floating-button">
        <i class="fa-solid fa-phone"></i>
    </div>
    <!---floating button end-->

    <?php include_once 'footer.php' ?>

    <!--javascript file-->
    <script src="js/main.js"></script>
    <script src="js/sidebar.js"></script>

</body>

</html>