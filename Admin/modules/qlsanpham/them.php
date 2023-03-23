<?php
include("../../connectdb.php");
if (isset($_POST['submit'])) {
    $name = $_POST['TenSP'];
    $price = $_POST['GiaSP'];
    $brand = $_POST['idHSX'];
    $info = $_POST['NoiDung'];
    $idlsp = $_POST['idLSP'];
    $stt = 'true';
    //hình sản phẩm
    $pic = $_FILES['HinhSP']['name'];
    $temp_pic = $_FILES['HinhSP']['tmp_name'];

    if (!$con) {
        die(mysqli_error($con));
    } else {
        move_uploaded_file($temp_pic,"../../products_image/$pic");
        $sql = "insert into `sanpham`(TenSP,HinhSP,GiaSP,idHSX,NoiDung,idLSP,date,status) values('$name','$pic','$price','$brand','$info','$idlsp',NOW(),'$stt')";
        $result = mysqli_query($con, $sql);
        echo"<script>alert('Thêm thành công!')</script>";
        echo"<script>window.open('../../indexAd.php?lietkesp','_self')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../js/bootstrap.min.js"></script>
</head>
<body>
    <h1 class="my-5" style="text-align: center">THÊM MỚI SẢN PHẨM</h1>
    <div class="container p-4 my-5 border">
        <form method="post" enctype="multipart/form-data">
            <div class="form-group" >
                <label for="TenSP">Tên sản phẩm</label>
                <input type="text" class="form-control" name="TenSP" id="TenSP" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="HinhSP">Hình sản phẩm</label>
                <input type="file" class="form-control" name="HinhSP" id="HinhSP">
            </div>
            <div class="form-group">
                <label for="GiaSP">Giá tiền</label>
                <input type="text" class="form-control" name="GiaSP" id="GiaSP" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Hãng sản xuất</label>
                <select name="idHSX" id="" class="form-select">
                    <option value="">Chọn hãng sản xuất</option>
                    <?php
                    $select_q="select * from `hangsanxuat`";
                    $result_q=mysqli_query($con,$select_q);
                    while($row=mysqli_fetch_assoc($result_q)){
                        $hsx_id=$row['idHSX'];
                        $hsx_name=$row['TenNSX'];
                        echo"<option value='$hsx_id'>$hsx_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="NoiDung">Mô tả</label>
                <input type="text" class="form-control" name="NoiDung" id="NoiDung" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Loại sản phẩm</label>
                <select name="idLSP" id="" class="form-select">
                <option value="">Chọn loại sản phẩm</option>
                    <?php
                    $select_q="select * from `loaisanpham`";
                    $result_q=mysqli_query($con,$select_q);
                    while($row=mysqli_fetch_assoc($result_q)){
                        $lsp_id=$row['idLSP'];
                        $lsp_name=$row['TenLSP'];
                        echo"<option value='$lsp_id'>$lsp_name</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="d-flex justify-content-between bg-white mb-3" style="margin-top: 10px;">
                <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
                <div class="p-2 bg-white"></div>
                <div class="p-2 bg-white"><button type="submit" name="submit" class="btn btn-primary" style="margin-top:10px">Thêm mới</button></div>
            </div>
        </form>
    </div>

</body>

</html>