<?php
include("../../connectdb.php");
$id = $_GET['chinhsuaid'];
$sql = "select * from `sanpham` where idSP=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['TenSP'];
$pic = $row['HinhSP'];
$price = $row['GiaSP'];
$nsx = $row['idHSX'];
$info = $row['NoiDung'];
$idlsp = $row['idLSP'];

if (isset($_POST['submit'])) {
    $name = $_POST['TenSP'];
    $pic = $_POST['HinhSP'];
    $price = $_POST['GiaSP'];
    $nsx = $_POST['idHSX'];
    $info = $_POST['NoiDung'];
    $idlsp = $_POST['idLSP'];

    $sql = "update `sanpham` set idSP=$id, TenSP='$name', HinhSP='$pic', GiaSP='$price', idHSX='$nsx', NoiDung='$info', idLSP='$idlsp' where idSP=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo"<script>alert('Chỉnh sửa thành công!')</script>";
        echo"<script>window.open('../../indexAd.php?lietkesp','_self')</script>";
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
    <title>Tất cả sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../js/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="my-5" style="text-align: center">THÊM MỚI SẢN PHẨM</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" name="TenSP" value=<?php echo $name; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hình sản phẩm</label>
                <input type="text" class="form-control" name="HinhSP" value=<?php echo $pic; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giá tiền</label>
                <input type="text" class="form-control" name="GiaSP" value=<?php echo $price; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hãng sản xuất</label>
                <input type="text" class="form-control" name="idHSX" value=<?php echo $nsx; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <input type="text" class="form-control" name="NoiDung" value=<?php echo $info; ?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">idLSP</label>
                <input type="text" class="form-control" name="idLSP" value=<?php echo $idlsp; ?>>
            </div>
            <div class="d-flex justify-content-between bg-white mb-3" style="margin-top: 10px;">
                <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
                <div class="p-2 bg-white"></div>
                <div class="p-2 bg-white"><button type="submit" name="submit" class="btn btn-primary">Chỉnh sửa</button></div>
            </div>
        </form>
    </div>

</body>

</html>