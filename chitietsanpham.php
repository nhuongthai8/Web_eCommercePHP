<?php
include("./includes/connectdb.php");
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
    <title>Chi Tiết Sản Phẩm</title>
</head>

<body>
    <?php
    include("includes/header.php");
    ?>
    <br><br><br>
    <div class="card rounded-6">
        <div class="card-body text-center bg-light">

            <h3 class="mb-3">We can offer you <span class="text-primary">the best price</span> in the market</h3>
            <p class="mb-4">And you will notice it because nothing distracts you.</p>
            <button type="button" class="btn btn-primary">Learn more</button>

        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-10 text-center">
                <h1>CHI TIẾT SẢN PHẨM</h1>
                <div class="row">
                    <?php
                    product_details();
                    getSPtheoloai();
                    getSPtheohang();
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
    <h2 style="text-align: center;">ĐÁNH GIÁ CỦA NGƯỜI DÙNG</h2>
    <br>
    <h2 style="text-align: center;">SẢN PHẨM CÙNG LOẠI</h2>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            related_products();
            ?>
        </div>
    </div>
    <br>
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>