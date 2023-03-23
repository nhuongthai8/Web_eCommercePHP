<?php
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include("connectdb.php");
        $usern=$_POST['username'];
        $pass=$_POST['password'];

        $sql="select * from `admin` where username='$usern' and password='$pass'";
        $result=mysqli_query($con,$sql);

        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                $login=1;
                session_start();
                $_SESSION['username']=$usern;
                header('location:indexAd.php');
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../js/bootstrap.min.js"></script>
    <title>Login Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Company's Logo Here</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <?php
    if($login){
        echo '<div class="alert alert-success" role="alert">
        <strong>Đăng nhập thành công!</strong>
      </div>';
    }
    ?>
    <?php
    if($invalid){
        echo '<div class="alert alert-danger" role="alert">
        <strong>Đăng nhập không thành công!</strong>, sai tài khoản hoặc mật khẩu!
      </div>';
    }
    ?>
    <section class="vh-100 my-5">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://www.go.ooo/img/bg-img/Login.jpg" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="post">
                        <h1 style="text-align: center; padding-bottom: 10px">ADMIN LOGIN</h1>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control form-control-lg" name="username" autocomplete="off"/>
                            <label class="form-label" for="form3Example3">Tên đăng nhập</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" class="form-control form-control-lg" name="password" />
                            <label class="form-label" for="form3Example4">Mật khẩu</label>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include("footerAd.php");
    ?>
</body>

</html>