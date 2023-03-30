<?php
include("connectdb.php");
include("webfunction.php");
session_start();
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
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
                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'>".$_SESSION['Username']."</a>
                    <ul class='dropdown-menu'>
                      <li><a class='dropdown-item' href='tintuc.php'>Chỉnh sửa thông tin</a></li>
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