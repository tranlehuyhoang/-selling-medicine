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
    <link rel="stylesheet" href="css/all_products.css">
    <script src="https://kit.fontawesome.com/c0adbb8084.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
// Include header file
include 'header.php'; ?>

    <div class="result_for_search">
        <h1>Tất cả sản phẩm</h1>


        <!-- Form for sorting -->
        <form method="GET" class="filter-form">
            <label for="sort">Sắp xếp theo:</label>
            <select name="sort" id="sort">
                <option value="name_az">Tên A-Z</option>
                <option value="name_za">Tên Z-A</option>
                <option value="price_asc">Giá thấp đến cao</option>
                <option value="price_desc">Giá cao đến thấp</option>
            </select>
            <input type="submit" value="Lọc">
        </form>
    </div>
    <?php
    // Câu truy vấn ban đầu không có sắp xếp
    $query = "SELECT * FROM mathang";

    // Kiểm tra nếu yêu cầu lọc được gửi đi từ form
    if (isset($_GET['sort'])) {
        $sort_option = $_GET['sort'];
        switch ($sort_option) {
            case 'name_az':
                // Sắp xếp theo tên A-Z
                $query = "SELECT * FROM mathang ORDER BY TenMH ASC";
                break;
            case 'name_za':
                // Sắp xếp theo tên Z-A
                $query = "SELECT * FROM mathang ORDER BY TenMH DESC";
                break;
            case 'price_asc':
                // Sắp xếp theo giá thấp đến cao
                $query = "SELECT * FROM mathang ORDER BY GiaBan ASC";
                break;
            case 'price_desc':
                // Sắp xếp theo giá cao đến thấp
                $query = "SELECT * FROM mathang ORDER BY GiaBan DESC";
                break;
            default:
                // Mặc định không có sắp xếp
                $query = "SELECT * FROM mathang";
                break;
        }
    }

    // Thực hiện truy vấn
    $result = mysqli_query($conn, $query);

    // Kiểm tra và hiển thị danh sách sản phẩm nếu có
    if (mysqli_num_rows($result) > 0) {
        echo '<div class="product-container">';
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
        echo "</div>";
    } else {
        echo "Không tìm thấy sản phẩm!";
    }

    // Include footer file
    include 'footer.php';
    ?>
    </div>

</body>