<?php
include('includes/connectdb.php');
session_start();
if(!isset($_SESSION['Username'])){
    echo '<script>alert("Vui lòng đăng nhập để thanh toán!"); window.location.href = "./dangnhap.php";</script>';
}
$usern = $_SESSION['Username'];
$code_cart = rand(0,9999);
$insert_cart = "insert into giohang(Username, cart_code, cart_status) values ('".$usern."','".$code_cart."',1)";
$cart_query = mysqli_query($con,$insert_cart);
if($insert_cart){
    foreach($_SESSION['cart'] as $key => $value){
        $idsp = $value['idsp'];
        $soluong = $value['Soluong'];
        $insert_order_detail = "insert into giohang_detail(cart_code, idSP, Soluong) values ('".$code_cart."','".$idsp."','".$soluong."')";
        mysqli_query($con,$insert_order_detail);
    }
}
echo '<script>alert("Cảm ơn bạn đã mua hàng, chúng tôi sẽ xử lý trong thời gian sớm nhất!"); window.location.href = "index.php";</script>';
unset($_SESSION['cart']);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<br>
<br>
<br>



    
</body>
</html>