<?php
include("includes/connectdb.php");
include("includes/yeucaulogin.php");
if (isset($_POST['submit'])) {
    $name = $_POST['HoTen'];
    $mail = $_POST['Email'];
    $tieude = $_POST['TieuDe'];
    $noidung = $_POST['NoiDung'];

    if (!$con) {
        die(mysqli_error($con));
    } else {
        $sql = "insert into `lienhe`(HoTen,Email,TieuDe,NoiDung,date) values('$name','$mail','$tieude','$noidung',NOW())";
        $result = mysqli_query($con, $sql);
        echo"<script>alert('Gửi thông tin liên hệ thành công!')</script>";
        echo"<script>window.open('lienhe.php','_self')</script>";
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
    <title>Liên Hệ</title>
</head>

<body>
    <?php
    include("includes/header.php");
    ?>
    <br>
    <div class="container p-4 my-5 border">
        <h2 style="text-align:center; ">Liên Hệ Với Chúng Tôi</h2>

        <section class="mb-4">
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                a matter of hours to help you.</p>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <form id="contact-form" name="contact-form" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="name" class="">Họ tên</label>
                                    <input type="text" id="name" name="HoTen" class="form-control" value="<?php echo isset($_SESSION['HoTen']) ? $_SESSION['HoTen'] : ''; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <label for="email" class="">Email</label>
                                    <input type="text" id="email" name="Email" class="form-control" value="<?php echo isset($_SESSION['Email']) ? $_SESSION['Email'] : ''; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="md-form mb-0">
                                    <label for="subject" class="">Tiêu đề</label>
                                    <input type="text" id="subject" name="TieuDe" class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="md-form">
                                    <label for="message">Nội dung</label>
                                    <textarea type="text" id="message" name="NoiDung" rows="2" class="form-control md-textarea" autocomplete="off"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-md-left mt-3">
                        <button class="btn btn-primary" name="submit" type="submit">Gửi</button>
                    </div>
                    </form>
                    
                    <div class="status"></div>
                </div>
                <div class="col-md-3 text-center">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.9141219697926!2d106.72120611462299!3d10.817883892293422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175289d8022b943%3A0x355113b7b0af8aaa!2zMTQwLzExIELDrG5oIFF14bubaSwgUGjGsOG7nW5nIDI3LCBCw6xuaCBUaOG6oW5oLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1680528904719!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div style="display: inline-block;">

                </div>
            </div>
        </section>
    </div>
    <!--Section: Contact v.2-->
    <?php
    include("includes/footer.php");
    ?>
</body>

</html>