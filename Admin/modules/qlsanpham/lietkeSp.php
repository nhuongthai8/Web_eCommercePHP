<?php
$con=new mysqli('localhost','root','','webbanhangphp');
if(!$con){
    die(mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="../../../js/bootstrap.min.js"></script>
    <title>DANH SÁCH SẢN PHẨM</title>
</head>

<body>
    <div class="container p-3 bg-white text-black">
        
    </div>
    <div class="container">
        <div class="d-flex justify-content-between bg-white mb-3">
            <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
            <div class="p-2 bg-white"></div>
            <div class="p-2 bg-white"><button class="btn btn-primary me-md-2" type="button"><a href="./modules/qlsanpham/them.php" class="text-light">Thêm mới</a></button></div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Hình sản phẩm</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Hãng sản xuất</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">ID LSP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from `sanpham`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['idSP'];
                        $name = $row['TenSP'];
                        $pic = $row['HinhSP'];
                        $price = $row['GiaSP'];
                        $nsx = $row['idHSX'];
                        $info = $row['NoiDung'];
                        $idlsp = $row['idLSP'];
                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $pic . '</td>
                        <td>' . $price . '</td>
                        <td>' . $nsx . '</td>
                        <td>' . $info . '</td>
                        <td>' . $idlsp . '</td>
                        <td>
                        <button class="btn btn-secondary"><a href="./modules/qlsanpham/chinhsua.php?chinhsuaid=' . $id . '" class="text-light">Chỉnh sửa</a></button>
                        <button class="btn btn-danger"><a href="./modules/qlsanpham/xoa.php?xoaid=' . $id . '" class="text-light">Xóa</a></button>
                        </td>
                    </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="my-5"></div>
</body>

</html>