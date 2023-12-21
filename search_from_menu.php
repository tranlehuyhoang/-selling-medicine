<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="icon" href="img/pharmalogo.svg">
    <!---adding logo icon-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/searchpage.css">
    <script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once 'header.php' ?>

    <div class="result_for_search">
        <h1><?php
        if (isset($_GET['category'])) {
            $category = $_GET['category']; // Lấy giá trị từ thanh dropdown

            // Hiển thị tiêu đề phù hợp dựa trên 'category' được chọn
            switch ($category) {
                case 'Thuốc không kê đơn':
                case 'Thuốc kê đơn':
                    echo 'Dược phẩm - ' . $category;
                    break;
                case 'Thực phẩm dinh dưỡng':
                case 'Dụng cụ sơ cứu':
                case 'Kế hoạch gia đình':
                    echo 'Chăm sóc sức khỏe - ' . $category;
                    break;
                case 'Sản phẩm phòng tắm':
                case 'Sản phẩm khử mùi':
                case 'Chăm sóc tóc':
                    echo 'Chăm sóc cá nhân - ' . $category;
                    break;
                case 'Hàng tổng hợp':
                case 'Hàng bách hóa':
                    echo 'Sản phẩm tiện lợi - ' . $category;
                    break;
                case 'TPCN Nhóm dạ dày':
                case 'TPCN Nhóm tim mạch':
                case 'TPCN Nhóm đường huyết':
                    echo 'Thực phẩm chức năng - ' . $category;
                    break;
                case 'Chăm sóc em bé':
                case 'TPCN dành cho trẻ':
                case 'Sản phẩm dành cho mẹ':
                    echo 'Mẹ và Bé - ' . $category;
                    break;
                case 'Chăm sóc mặt':
                case 'Sản phẩm chống nắng':
                case 'Dụng cụ làm đẹp':
                    echo 'Chăm sóc sắc đẹp - ' . $category;
                    break;
                case 'Nhiệt kế':
                case 'Máy đo huyết áp':
                case 'Máy đo đường huyết':
                    echo 'Thiết bị y tế - ' . $category;
                    break;
                default:
                    echo 'Kết quả tìm kiếm';
                    break;
            }
        } else {
            echo 'Kết quả tìm kiếm';
        }
        ?>
        </h1>
    </div>

    <div class="search-container">
        <?php
        if (isset($_GET['category'])) {
        $category = $_GET['category']; // Lấy giá trị từ thanh dropdown

    /* Kiểm tra nếu danh mục là "Thuốc không kê đơn"
    if ($category == 'Thuốc không kê đơn') {
        $sql = "SELECT * FROM mathang WHERE CTDM = 'Thuốc không kê đơn'";
        $result = mysqli_query($conn, $sql); */
    
        switch ($category) {
            case 'Thuốc không kê đơn':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Thuốc không kê đơn'";
                break;
            case 'Thuốc kê đơn':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Thuốc kê đơn'";
                break;
            case 'Thực phẩm dinh dưỡng':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Thực phẩm dinh dưỡng'";
                break;
            case 'Dụng cụ sơ cứu':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Dụng cụ sơ cứu'";
                break;
            case 'Kế hoạch gia đình':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Kế hoạch gia đình'";
                break;
            case 'Sản phẩm phòng tắm':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Sản phẩm phòng tắm'";
                break;
            case 'Sản phẩm khử mùi':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Sản phẩm khử mùi'";
                break;
            case 'Chăm sóc tóc':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Chăm sóc tóc'";
                break;
            case 'Hàng tổng hợp':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Hàng tổng hợp'";
                break;
            case 'Hàng bách hóa':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Hàng bách hóa'";
                break;
            case 'TPCN Nhóm dạ dày':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'TPCN Nhóm dạ dày'";
                break;
            case 'TPCN Nhóm tim mạch':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'TPCN Nhóm tim mạch'";
                break;
            case 'TPCN Nhóm đường huyết':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'TPCN Nhóm đường huyết'";
                break;
            case 'Chăm sóc em bé':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Chăm sóc em bé'";
                break;
            case 'TPCN dành cho trẻ':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'TPCN dành cho trẻ'";
                break;
            case 'Sản phẩm dành cho mẹ':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Sản phẩm dành cho mẹ'";
                break;
            case 'Chăm sóc mặt':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Chăm sóc mặt'";
                break;
            case 'Sản phẩm chống nắng':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Sản phẩm chống nắng'";
                break;
            case 'Dụng cụ làm đẹp':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Dụng cụ làm đẹp'";
                break;
            case 'Nhiệt kế':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Nhiệt kế'";
                break;
            case 'Máy đo huyết áp':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Máy đo huyết áp'";
                break;
            case 'Máy đo đường huyết':
                $sql = "SELECT * FROM mathang WHERE CTDM = 'Máy đo đường huyết'";
                break;
            default:
                echo "Không có dữ liệu hoặc danh mục không tồn tại.";
                break;
        }

        $result = mysqli_query($conn, $sql);

        // Xử lý kết quả
        if (mysqli_num_rows($result) > 0) {
            // Hiển thị thông tin sản phẩm
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='container search-item'>";
                echo "<article class='search-result'>";
                echo "<div>";
                echo "<img src='{$row['HINH']}' alt='Product Image'>"; // Sử dụng đường dẫn hình ảnh từ cơ sở dữ liệu
                echo "</div>";
                echo "<div class='search-info'>";

                // Hiển thị thông tin sản phẩm dựa trên kết quả tìm kiếm
                $product_name = $row['TenMH'];
                $product_price = $row['GiaBan'];

                echo "<h4>$product_name</h4>";
                echo "<p>$product_price đ/Chai</p>";
                echo "<a href='productDetail.php?MaMH={$row['MaMH']}' class='btn btn-primary'>Xem chi tiết sản phẩm</a>";

                echo "</div>";
                echo "</article>";
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    } else {
        // Xử lý các trường hợp khác...
    }
    ?>
    </div>


    <?php include_once 'footer.php' ?>
</body>

</html>