<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("includes/connectdb.php");
    $usern = $_POST['Username'];
    $pass_cu = md5($_POST['Password_cu']);
    $pass_moi = md5($_POST['Password_moi']);

    $sql = "select * from `khachhang` where Username='" . $usern . "' and Password = '" . $pass_cu . "'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $sql_update = mysqli_query($con, "update khachhang set Password = '" . $pass_moi . "'");
        echo '<script>alert("Đổi mật khẩu thành công!"); window.location.href = "index.php";</script>';
    } else {
        echo '<script>alert("Mật khẩu cũ không trùng nhau, vui lòng nhập lại!"); window.location.href = "doimatkhau.php";</script>';
    }
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
    <title>Đăng Mật Khẩu</title>
</head>

<body>
    <!--Navbar-->
    <?php
    include("includes/header.php");
    ?>
    <!--Navbar-->
    <br>
    <br>
    <!--Register form-->
    <section class="vh-100" style="margin-top:50px; margin-bottom:50px;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đổi Mật Khẩu</p>

                                    <form class="mx-1 mx-md-4" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="Username" value="<?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : ''; ?>" readonly/>
                                                <label class="form-label" for="form3Example4c">Username</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="Password_cu" />
                                                <label class="form-label" for="form3Example4c">Mật khẩu cũ</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="Password_moi" />
                                                <label class="form-label" for="form3Example3c">Mật khẩu mới</label>
                                            </div>
                                        </div>

                                        <div class="text-center text-lg-start mt-4 pt-2">
                                            <button type="submit" class="btn btn-primary btn-lg">Xác nhận</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://rsvpify.com/wp-content/uploads/2021/06/Custom-Question-Customization.png" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Register form-->
    <!--Footer-->
    <?php
    include("includes/footer.php");
    ?>
    <!--Footer-->
</body>

</html>