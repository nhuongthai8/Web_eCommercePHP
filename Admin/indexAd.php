<?php
include("yeucauloginAd.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../js/bootstrap.min.js"></script>
    <title>Trang Quản Lý</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="indexAd.php">Company's Logo Here</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="indexAd.php">DASH BOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexAd.php?lietkesp">QL SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexAd.php?lietkelsp">QL LOẠI SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexAd.php?lietkedh">QL ĐƠN HÀNG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexAd.php?lietkehsx">QL HÃNG SẢN XUẤT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexAd.php?lietkekh">QL KHÁCH HÀNG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="indexAd.php?lietkead">QL ADMIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div class="container">
        <?php
        if (isset($_GET['lietkesp'])) {
            echo'<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH SẢN PHẨM</h1>';
            include("./modules/qlsanpham/lietkeSp.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkelsp'])) {
            echo'<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH LOẠI SẢN PHẨM</h1>';
            include("./modules/qlloaisanpham/lietkeLsp.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkedh'])) {
            echo'<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH ĐƠN HÀNG</h1>';
            include("./modules/qldonhang/lietkeDh.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkehsx'])) {
            echo'<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH HÃNG SẢN XUẤT</h1>';
            include("./modules/qlhangsanxuat/lietkeHsx.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkekh'])) {
            echo'<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH SẢN KHÁCH HÀNG</h1>';
            include("./modules/qlkhachhang/lietkeKh.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkead'])) {
            echo'<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH ADMIN</h1>';
            include("./modules/qltaikhoanadmin/lietkeAd.php");
        }
        ?>
    </div>
    <?php
    include("footerAd.php");
    ?>
</body>

</html>