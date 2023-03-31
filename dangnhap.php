<?php
$login=0;
$invalid=0;
session_start();
include("includes/connectdb.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
        $usern=$_POST['Username'];
        $pass=md5($_POST['Password']);
        $sql = "select * from khachhang where Username = '" . $usern . "' and Password = '" . $pass . "' limit 1";
        $result=mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                $login=1;
                $_SESSION['Username']=$usern;
                header('location:index.php');
            }else{
                $invalid=1;
            }
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
    <title>Đăng Ký Tài Khoản Mua Hàng</title>
</head>
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>

<body>
    <!--Navbar-->
    <?php
    include("includes/header.php");
    ?>
    <!--Navbar-->
    <!--Login-->
    <br>
    <br>
    <?php
    if($invalid){
        echo '<div class="alert alert-danger" role="alert">
        <strong>Đăng nhập không thành công!</strong>!
      </div>';
    }
    ?>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://www.go.ooo/img/bg-img/Login.jpg" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post" action="">
                        <h1 style="text-align: center;">Đăng Nhập Vào Hệ Thống</h1><br>
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Sử dụng tài khoản khác</p>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Hoặc</p>
                        </div>
    
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg" name="Username" />
                            <label class="form-label" for="form3Example3">Tài khoản</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" class="form-control form-control-lg" name="Password" />
                            <label class="form-label" for="form3Example4">Mật khẩu</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Ghi nhớ
                                </label>
                            </div>
                            <a href="#!" class="text-body">Đặt lại mật khẩu</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a href="dangky.php" class="link-danger">Đăng ký tại đây</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Login-->
    <!--Footer-->
    <?php
    include("includes/footer.php");
    ?>
    <!--Footer-->
</body>

</html>