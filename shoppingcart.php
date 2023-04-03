<?php
include("./includes/connectdb.php");
include("./includes/webfunction.php");
session_start();

if (empty($_SESSION['cart'])) {
    echo '<script>alert("Vui lòng thêm sản phẩm vào giỏ hàng!"); window.location.href = "sanpham.php";</script>';
}
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
    <title>Giỏ Hàng</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Company's Logo Here</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tintuc.php">TIN TỨC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lienhe.php">LIÊN HỆ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gioithieu.php">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sanpham.php">SẢN PHẨM</a>
                    </li>
                </ul>
                <ul class="navbar-nav justify-content-end">
                    <?php
                    if (!isset($_SESSION['Username'])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='dangnhap.php'>ĐĂNG NHẬP</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='dangky.php'>ĐĂNG KÝ</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'>XIN CHÀO " . strtoupper($_SESSION['Username']) . "</a>
                    <ul class='dropdown-menu'>
                      <li><a class='dropdown-item' href='thongtinkhachhang.php'>Thông tin cá nhân</a></li>
                      <li><a class='dropdown-item' href='doimatkhau.php'>Đổi mật khẩu</a></li>
                      <li><hr class='dropdown-divider'></li>
                      <li><a class='dropdown-item' href='./includes/dangxuat.php'>Đăng xuất</a></li>
                    </ul>
                  </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="shoppingcart.php">GIỎ HÀNG</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="vh-50" style="padding-bottom: 50px; position: relative; z-index: 1;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2">Giỏ hàng của bạn </span><span class="h4">(<?php echo count($_SESSION['cart']); ?> sản phẩm trong giỏ hàng)</span></p>

                    <?php
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cart_item) {
                    ?>
                            <div class="card mb-1">
                                <div class="card-body p-1">
                                    <div class="row align-items-center">
                                        <div class="col-md-1">
                                            <img style="max-width: 100%; height: auto;" src="./Admin/products_image/<?php echo $cart_item['HinhSP']; ?>" class="img-fluid" alt="<?php echo $cart_item['TenSP']; ?>">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-0">Tên sản phẩm</p>
                                                <p class="lead fw-normal mb-0"><?php echo $cart_item['TenSP']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-0">Số lượng</p>
                                                <p class="lead fw-normal mb-0">
                                                <div class="btn-group" role="group">
                                                    <a href="includes/cart.php?minus=<?php echo $cart_item['idsp'] ?>" class="btn btn-danger"><i class="fas fa-minus"></i></a>
                                                    <span class="btn btn-outline-secondary"><?php echo $cart_item['Soluong']; ?></span>
                                                    <a href="includes/cart.php?adjust=<?php echo $cart_item['idsp'] ?>" class="btn btn-info"><i class="fas fa-plus"></i></a>
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-0">Giá sản phẩm</p>
                                                <p class="lead fw-normal mb-0">$<?php echo $cart_item['GiaSP']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="small text-muted mb-4 pb-0">Tổng giá</p>
                                                <p class="lead fw-normal mb-0">$<?php echo $cart_item['Soluong'] * $cart_item['GiaSP']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-center">
                                            <div class='d-flex'>
                                                <a class="btn btn-info flex-shrink-0 me-2" href="includes/cart.php?edit_item=<?php echo $cart_item['idsp'] ?>">Chỉnh sửa</a>
                                                <a class="btn btn-danger flex-shrink-0" href="includes/cart.php?delete_item=<?php echo $cart_item['idsp'] ?>">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                    <div class="card mb-5">
                        <div class="card-body p-4">

                            <form action="includes/cart.php" method="POST" class="float-start">
                                <input class='btn btn-danger flex-shrink-0' type='submit' value='Xóa tất cả' name='remove_all_items'>
                            </form>

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Tổng số lượng:</span> <span class="lead fw-normal"><?php echo calculate_total_quantity(); ?> sản phẩm</span>
                                </p>
                            </div>

                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Tổng giá tiền:</span> <span class="lead fw-normal">$<?php echo calculate_total_price(); ?></span>
                                </p>
                            </div>

                        </div>
                    </div>

                    <form class="d-flex justify-content-end align-items-center" action="includes/cart.php" method="POST">
                        <button type="submit" class="btn btn-primary btn-lg me-2" name="continue_shopping">Tiếp tục mua</button>
                        <a href="./checkout.php" class="btn btn-success btn-lg me-2">Thanh Toán</a>

                        <!-- PayPal button code -->
                        <div id="paypal-button-container"></div>
                    </form>





                </div>
            </div>
        </div>
    </section>
    <?php
    function calculate_total_price()
    {
        $total_price = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart_item) {
                $total_price += ($cart_item['GiaSP'] * $cart_item['Soluong']);
            }
        }
        return $total_price;
    }
    function calculate_total_quantity()
    {
        $total_quantity = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $cart_item) {
                $total_quantity += $cart_item['Soluong'];
            }
        }
        return $total_quantity;
    }
    ?>

    <footer class="text-center text-lg-start bg-dark text-white">
        <!-- Section: Social media -->
        <div class="container p-4 pb-0 text-center">
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <!-- Google -->
                <a class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>
                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                <!-- Linkedin -->
                <a class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>
        </div>
        <!-- Section: Social media -->
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5 ">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3 text-secondary"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3 text-secondary"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-secondary"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->
    </footer>

    <script src="https://www.paypal.com/sdk/js?client-id=AR8BbUycnhf6ELgt8GTMzhRK5aiDI5Fvr8M6EEbg3l084xID7f_t5B2K_nqZ4huqe1eRJ6HlGlTq1wqd"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // Set up the transaction
                return actions.order.create({
                    purchase_units: [{
                        description: 'Your order',
                        amount: {
                            value: '<?php echo calculate_total_price(); ?>' // pass the total amount to PayPal
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                // Capture the funds from the transaction
                return actions.order.capture().then(function(details) {
                    // Call your server to save the transaction
                    return fetch('/paypal-transaction-complete', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    }).then(function(response) {
                        // Display a success message
                        alert('Payment successful!');
                        // Redirect to checkout.php after payment completion
                        window.location.href = './checkout.php';
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>

    <!-- End of PayPal button code -->

</body>

</html>