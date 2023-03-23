<?php
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con, 'webbanhangphp');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Sản phẩm</title>
</head>

<body>
    <br>
    <br>
    <br>
    <div class="card rounded-6">
        <div class="card-body text-center bg-light">

            <h3 class="mb-3">We can offer you <span class="text-primary">the best price</span> in the market</h3>
            <p class="mb-4">And you will notice it because nothing distracts you.</p>
            <button type="button" class="btn btn-primary">Learn more</button>

        </div>
    </div>
    <!--Navbar-->
    <?php
    include("includes/header.php");
    ?>
    <!--hết Navbar-->
    <!--Slide show-->
    <?php
    include("includes/caroulse.php");
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <form class="card card-sm" method="get" action="search_product.php">
                    <div class="card-body row no-gutters align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div>
                        <!--end of col-->
                        <div class="col">
                            <input name="search_data" autocomplete="off" class="form-control form-control-lg form-control-borderless" type="search" placeholder="Nhập từ khóa hoặc sản phẩm mà bạn muốn tìm kiếm">
                        </div>
                        <!--end of col-->
                        <div class="col-auto">
                            <button name="search_data_product" class="btn btn-lg btn-success" type="submit" value="Search">Tìm kiếm</button>
                        </div>
                        <!--end of col-->
                    </div>
                </form>
            </div>
            <!--end of col-->
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-10 text-center">
                <h2>TẤT CẢ SẢN PHẨM</h2>
                <div class="row">
                    <?php
                    getSPall();
                    getSPtheoloai();
                    getSPtheohang();
                    search_sp()
                    ?>
                </div>
            </div>
            <div class="col-2 text-center">
                <h4>LOẠI SẢN PHẨM</h4>
                <div class="list-group">
                    <?php getLSPnav() ?>
                </div>
                <br>
                <h4>HÃNG SẢN XUẤT</h4>
                <div class="list-group">
                    <?php
                    getHSXnav();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- Footer -->

</body>

</html>