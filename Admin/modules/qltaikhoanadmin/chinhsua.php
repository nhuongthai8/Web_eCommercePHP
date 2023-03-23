<?php 
    include("../../connectdb.php");
    $id=$_GET['chinhsuaid'];
    $sql="select * from `admin` where idAD=$id";
    $result=mysqli_query($con,$sql);
    $row= mysqli_fetch_assoc($result);
    $name=$row['username'];
    $pass=$row['password'];
    $mail=$row['email'];

    if(isset($_POST['submit'])){
        $name=$_POST['username'];
        $pass=$_POST['password'];
        $mail= $_POST['email'];

        $sql="update `admin`set idAD=$id, username='$name', password='$pass', email='$mail' where idAD=$id";
        $result = mysqli_query($con,$sql);
        if($result){
            echo"<script>alert('Chỉnh sửa thành công!')</script>";
            echo"<script>window.open('../../indexAd.php?lietkead','_self')</script>";
        }else{
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
    <h1 class="my-5" style="text-align: center">QUẢN LÝ TÀI KHOẢN ADMIN</h1>
    <div class="container p-4 my-5 border">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" value=<?php echo$name;?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" value=<?php echo$pass;?>>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" value=<?php echo$mail;?>>
            </div>
            <button type="submit" name="submit" class="btn btn-primary" style="margin-top:10px">Chỉnh sửa</button>
        </form>
    </div>

</body>

</html>