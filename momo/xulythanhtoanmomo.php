<?php
header('Content-type: text/html; charset=utf-8');
include '../config.php';
session_start();
if(isset($_POST['checkout'])){
    $total=$_POST['total'];
    $method='MOMO QR';
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
    }
    unset($_SESSION['cart']);
}
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}


$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua Mã MoMo";
$amount = "10000";
$orderId = time() ."";
$redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
$ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
$extraData = "";


    

    $requestId = time() . "";
    $requestType = "captureWallet";
    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array('partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature);
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
?>