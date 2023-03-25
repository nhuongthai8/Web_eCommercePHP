<?php
    include("includes/connectdb.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang Chủ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="js/bootstrap.min.js"></script>
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

    <!--Hết Slide show-->
    <!--Xuất sản phẩm cập nhật mới nhất-->
    <div class="container p-3 my-3 bg-dark text-white">
        <h1 style="text-align: center;">SẢN PHẨM MỚI NHẤT</h1>
    </div>
    <div class="container p-4 my-5 border">
        <div class="row">
            <?php getSPmoi() ?>
        </div>
    </div>
    <!----------------------------------->
    <!--Banner show sản phẩm-->
    <div class="container p-3 my-3 bg-dark text-white">
        <h1 style="text-align: center;">SẢN PHẨM HOT</h1>
    </div>
    <div class="container p-5 my-5 border">
        <div class="row">
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container p-3 my-3 bg-dark text-white">
        <h1 style="text-align: center;">SẢN PHẨM ĐƯỢC TÌM KIẾM NHIỀU NHẤT</h1>
    </div>
    <div class="container p-5 my-5 border">
        <div class="row">
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width:200px">
                    <img class="card-img-top" src="images/bg4.png" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">John Doe</h4>
                        <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                        <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--hết Banner show sản phẩm-->
    <!-- Footer -->
    <?php
    include("includes/footer.php");
    ?>
    <!-- Footer -->


</body>

</html>