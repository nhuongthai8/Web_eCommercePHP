<?php
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include("includes/connectdb.php");
        $fname=$_POST['HoTen'];
        $usern=$_POST['Username'];
        $pass=md5($_POST['Password']);
        $mail=$_POST['Email'];

        $sql="select * from `khachhang` where Username='$usern'";
        $result=mysqli_query($con,$sql);
        if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                // echo 'Username đã tồn tại, vui lòng chọn Username khác';
                $user=1;
            }else{
                $sql="insert into `khachhang`(HoTen,Username,Password,Email) values('$fname','$usern','$pass','$mail')";
                $result=mysqli_query($con,$sql);
                if($result){
                    // echo 'success';
                    $success=1;
                }else{
                    die(mysqli_error($con));
            }
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
    <title>Đăng Ký Tài Khoản</title>
</head>

<body>
    <!--Navbar-->
    <?php
    include("includes/header.php");
    ?>
    <!--Navbar-->
    <br>
    <br>
    <?php
    if($user){
        echo '<div class="alert alert-danger" role="alert">
        <strong>Username</strong> đã tồn tại, vui lòng chọn <strong>Username</strong> khác!
      </div>';
    }
    ?>
    <?php
    if($success){
        echo '<div class="alert alert-success" role="alert">
        Đăng ký tài khoản <strong>thành công</strong>!
      </div>';
    }
    ?>
    <!--Register form-->
    <section class="vh-100" style="margin-top:50px; margin-bottom:50px;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Ký Tài Khoản</p>

                                    <form class="mx-1 mx-md-4" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="HoTen"/>
                                                <label class="form-label" for="form3Example1c">Họ và tên</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" class="form-control" name="Username"/>
                                                <label class="form-label" for="form3Example1c">Tài Khoản</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" class="form-control" name="Password"/>
                                                <label class="form-label" for="form3Example4c">Mật khẩu</label>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" class="form-control" name="Email"/>
                                                <label class="form-label" for="form3Example3c">Email</label>
                                            </div>
                                        </div>

                                        <div class="text-center text-lg-start mt-4 pt-2">
                                            <button type="submit" class="btn btn-primary btn-lg">Đăng ký</button>
                                            <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản? <a href="dangnhap.php" class="link-danger">Đăng nhập tại đây</a></p>
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