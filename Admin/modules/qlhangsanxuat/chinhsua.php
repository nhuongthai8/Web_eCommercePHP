<?php
include("../../connectdb.php");
$id = $_GET['chinhsuaid'];
$sql = "select * from `hangsanxuat` where idHSX=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['TenNSX'];
$pic = $row['HinhNSX'];

if (isset($_POST['submit'])) {
    $name = $_POST['TenNSX'];
    $pic = $_POST['HinhNSX'];

    $sql = "update `hangsanxuat` set idHSX=$id, TenNSX='$name', HinhNSX='$pic' where idHSX=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo"<script>alert('Chỉnh sửa thành công!')</script>";
        echo"<script>window.open('../../indexAd.php?lietkehsx','_self')</script>";
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa</title>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../js/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="my-5" style="text-align: center">CHỈNH SỬA THÔNG TIN</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên hãng</label>
                <input type="text" class="form-control" name="TenNSX" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hình ảnh</label>
                <input type="text" class="form-control" name="HinhNSX" value="<?php echo $pic; ?>">
            </div>
            <div class="d-flex justify-content-between bg-white mb-3" style="margin-top: 10px;">
                <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back()" class="text-light">Trở về</a></button></div>
                <div class="p-2 bg-white"></div>
                <div class="p-2 bg-white"><button type="submit" name="submit" class="btn btn-primary">Chỉnh sửa</button></div>
            </div>
        </form>
    </div>

</body>

</html>