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
    <title>DANH SÁCH ĐƠN HÀNG</title>
</head>

<body>
    <div class="container">
    <div class="d-flex justify-content-between bg-white mb-3">
            <div class="p-2 bg-white"><button class="btn btn-secondary"><a href="#" onclick="history.back();" class="text-light">Trở về</a></button></div>
            <div class="p-2 bg-white"></div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Mã Code</th>
                    <th scope="col">Tình Trạng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from `giohang`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['idGH'];
                        $usern = $row['Username'];
                        $code = $row['cart_code'];
                        $stt = $row['cart_status'];
                        echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $usern . '</td>
                        <td>' . $code . '</td>
                        <td>' . $stt . '</td>
                        <td>
                        <button class="btn btn-danger"><a href="./modules/qldonhang/xoa.php?xoaid=' . $id . '" class="text-light">Xóa</a></button>
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