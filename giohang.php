<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Giỏ Hàng</title>
</head>

<body>
    <?php
    include("includes/header.php");
    ?>

    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2">Shopping Cart </span><span class="h4">(1 item in your cart)</span></p>

                    <div class="card mb-4">
                        <div class="card-body p-4">

                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="./Admin/products_image/ip13128g.jpg" class="img-fluid" alt="Generic placeholder image">
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Tên sản phẩm</p>
                                        <p class="lead fw-normal mb-0">iPad Air</p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Số lượng</p>
                                        <p class="lead fw-normal mb-0">1</p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="small text-muted mb-4 pb-2">Giá sản phẩm</p>
                                        <p class="lead fw-normal mb-0">$799</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-5">
                        <div class="card-body p-4">

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Tổng giá tiền:</span> <span class="lead fw-normal">$799</span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-light btn-lg me-2">Tiếp tục mua</button>
                        <button type="button" class="btn btn-primary btn-lg">Thanh toán</button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php
    include("includes/footer.php");
    ?>
</body>

</html>