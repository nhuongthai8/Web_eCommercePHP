<?php
include('includes/connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include('includes/header.php');
    ?>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <div class="mb-3 p-3">
                        <h1 style="text-align: center;">Thông tin khách hàng</h1>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" value="<?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : ''; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="username" value="<?php echo isset($_SESSION['HoTen']) ? $_SESSION['HoTen'] : ''; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ''; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" value="<?php echo isset($_SESSION['Password']) ? $_SESSION['Password'] : ''; ?>" readonly>
                    </div>
                    <a href="./doimatkhau.php" class="btn btn-secondary">Đổi mật khẩu</a>
                </form>
            </div>
        </div>
    </div>


</body>

</html>