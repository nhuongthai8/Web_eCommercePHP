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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Trang Quản Lý</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="indexAd.php">Teckie</a>
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
                <ul class="navbar-nav justify-content-end">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='indexAd.php'>XIN CHÀO " . strtoupper($_SESSION['username']) . "</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='indexAd.php?dangxuat'>ĐĂNG XUẤT</a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div class="container">
        <?php
        if (isset($_GET['lietkesp'])) {
            echo '<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH SẢN PHẨM</h1>';
            include("./modules/qlsanpham/lietkeSp.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkelsp'])) {
            echo '<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH LOẠI SẢN PHẨM</h1>';
            include("./modules/qlloaisanpham/lietkeLsp.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkedh'])) {
            echo '<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH ĐƠN HÀNG</h1>';
            include("./modules/qldonhang/lietkeDh.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkehsx'])) {
            echo '<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH HÃNG SẢN XUẤT</h1>';
            include("./modules/qlhangsanxuat/lietkeHsx.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkekh'])) {
            echo '<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH SẢN KHÁCH HÀNG</h1>';
            include("./modules/qlkhachhang/lietkeKh.php");
        }
        ?>
        <?php
        if (isset($_GET['lietkead'])) {
            echo '<h1 style="text-align: center; margin-top: 20px;">DANH SÁCH ADMIN</h1>';
            include("./modules/qltaikhoanadmin/lietkeAd.php");
        }
        ?>
        <?php
        if (isset($_GET['dangxuat'])) {
            include("./dangxuatAd.php");
        }
        ?>
    </div>

    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart1"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div> -->
    <br>

    <?php
    include("footerAd.php");
    ?>

    <script>
        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


</body>

</html>