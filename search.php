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
        <h1>Kết quả tìm kiếm</h1>
    </div>

    <div class="search-container">
        <?php
    // Kiểm tra xem người dùng đã nhập từ khóa tìm kiếm hay chưa
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        
        // Thực hiện truy vấn SQL để tìm sản phẩm dựa trên từ khóa nhập vào
        $sql = "SELECT * FROM mathang WHERE TenMH LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
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
                echo "<a href='productDetail.php?MaMH={$row['MaMH']}' class='btn btn-primary'>Thêm vào giỏ hàng</a>";

                echo "</div>";
                echo "</article>";
                echo "</div>";
            }
        } else {
            echo "Không tìm thấy sản phẩm!";
        }
    }
    ?>
    </div>


    <?php include_once 'footer.php' ?>
</body>

</html>