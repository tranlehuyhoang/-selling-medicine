

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
</head>

<body>
    <?php include_once 'header.php' ?>
    <?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if(isset($_POST['cart'])){
    if (count($_SESSION['cart'])==0){
        $cartmini = ['img' => $_POST['img'], 'nameProduct' => $_POST['nameProduct'], 'price' => $_POST['price'], 'quantity' => $_POST['quantity'], 'total' => ($_POST['price']*$_POST['quantity']),'MaMH' => $_GET['MaMH']];
        $_SESSION['cart'][] = $cartmini;
    }else{
        $check = 0;
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $item = $_SESSION['cart'][$i];
            if ($_GET['MaMH'] == $item['MaMH']) {
                $_SESSION['cart'][$i]['quantity'] = $_POST['quantity'] + $item['quantity'];
                $_SESSION['cart'][$i]['total'] = $_SESSION['cart'][$i]['quantity']*$item['price'];
                $check = 1;
                break;
            }
        }
        if ($check == 0) {
        $cartmini = ['img' => $_POST['img'], 'nameProduct' => $_POST['nameProduct'], 'price' => $_POST['price'], 'quantity' => $_POST['quantity'], 'total' => ($_POST['price']*$_POST['quantity']),'MaMH' => $_GET['MaMH']];
        $_SESSION['cart'][] = $cartmini;
        }
    }
    echo"<script>alert('Đã thêm vào giỏ hàng')</script>";
}
print_r($_SESSION['cart']);
?>
    <div class="card-wrapper">
        <div>
            <div class="card">
                <!-- card left -->
                <div class="product-imgs">
                    <div class="img-display">
                        <div class="img-showcase">
                            <?php
                        if (isset($_GET['MaMH'])) {
                            $product_id = $_GET['MaMH'];
                    
                            // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
                            $sql = "SELECT * FROM MATHANG WHERE MaMH = '$product_id'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Lấy đường dẫn hình ảnh từ cột HINH trong bảng
                                    $product_image = $row['HINH']; // Đường dẫn hình ảnh

                                    // Hiển thị hình ảnh sản phẩm trong thẻ <img>
                                    echo "<img src='$product_image' alt='Product Image'>";
                                }
                            } else {
                                echo "Không tìm thấy sản phẩm.";
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card right -->
        <div class="product-content">
            <?php
        if (isset($_GET['MaMH'])) {
            $product_id = $_GET['MaMH'];
        
            // Truy vấn SQL để lấy thông tin sản phẩm từ bảng MATHANG
            $sql = "SELECT * FROM MATHANG INNER JOIN tonkho ON MATHANG.MaMH=tonkho.MaMH  WHERE MATHANG.MaMH = '$product_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Lấy thông tin sản phẩm từ cột trong bảng
                    $product_name = $row['TenMH']; // Tên sản phẩm
                    $product_price = $row['GiaBan']; // Giá sản phẩm
                    $product_description = $row['MoTa']; // Mô tả sản phẩm
                    $HINH = $row['HINH']; // Mô tả sản phẩm
                    $SoLuongTon = $row['SoLuongTon']; // Mô tả sản phẩm

                    // Hiển thị thông tin sản phẩm lên trang web
                    echo "<h2 class='product-title'>$product_name</h2>";
                    echo "<div class='product-price'>";
                    echo "<p class='new-price'><span>$product_price VND</span></p>";
                    echo "</div>";
                    echo "<div class='product-detail'>";
                    echo "<h2>Thông tin về sản phẩm:</h2>";
                    echo "<p>$product_description</p>";
                    echo "</div>";
                    echo'
                    <form action="" method="POST">
                    <div class="purchase-info">';
                    if(count($_SESSION['cart'])>0){
                        $check=true;
                    foreach ($_SESSION['cart'] as $key) {
                        if($key['MaMH']==$_GET['MaMH']){
                            if($key['quantity']==$SoLuongTon){
                                echo'Hết sản phẩm';
                            }else{
                                echo'
                        Còn '.$SoLuongTon-$key['quantity'].' sản phẩm trong kho
                        <br>
                        <input type="number" name="quantity" min="1" max="'.$SoLuongTon-$key['quantity'].'" value="1"/>';
                        echo'
                        <input type="text" name="nameProduct" value="'.$product_name.'" hidden>
                        <input type="number" name="price" value="'.$product_price.'" hidden>
                        <input type="text" name="img" value="'.$HINH.'" hidden>
                        <button type="submit" name="cart" class="btn">
                            Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                    </form>';
                            }
                            $check=false;
                        }
                    }
                    if($check){
                        if($SoLuongTon>0){
                            echo'
                            Còn '.$SoLuongTon.' sản phẩm trong kho
                            <br>
                            <input type="number" name="quantity" min="1" max="'.$SoLuongTon.'" value="1"/>';
                            echo'
                            <input type="text" name="nameProduct" value="'.$product_name.'" hidden>
                            <input type="number" name="price" value="'.$product_price.'" hidden>
                            <input type="text" name="img" value="'.$HINH.'" hidden>
                            <button type="submit" name="cart" class="btn">
                                Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                        </form>';
                        }else{
                            echo'Hết sản phẩm';
                        }
                    }
                }else{
                    if($SoLuongTon>0){
                        echo'
                        Còn '.$SoLuongTon.' sản phẩm trong kho
                        <br>
                        <input type="number" name="quantity" min="1" max="'.$SoLuongTon.'" value="1"/>';
                        echo'
                        <input type="text" name="nameProduct" value="'.$product_name.'" hidden>
                        <input type="number" name="price" value="'.$product_price.'" hidden>
                        <input type="text" name="img" value="'.$HINH.'" hidden>
                        <button type="submit" name="cart" class="btn">
                            Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i>
                        </button>
                    </div>
                    </form>';
                    }else{
                        echo'Hết sản phẩm';
                    }
                }
                }
            } else {
                echo "Không tìm thấy sản phẩm.";
            }
        }
        $conn->close(); // Đóng kết nối đến cơ sở dữ liệu
        ?>



           

            <div class="social-links">
                <p>Chia sẻ: </p>
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="#">
                    <i class="fab fa-pinterest"></i>
                </a>
            </div>
        </div>
    </div>
    </div>

    <?php include_once 'footer.php' ?>
</body>

</html>