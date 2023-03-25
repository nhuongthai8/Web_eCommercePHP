<?php
include("connectdb.php");
//lấy loại sản phẩm trên thanh navbar
function getLSPnav()
{
    global $con;
    $sql = "select * from `loaisanpham`";
    $rs = mysqli_query($con, $sql);
    while ($row_data = mysqli_fetch_assoc($rs)) {
        $idlsp = $row_data['idLSP'];
        $tenlsp = $row_data['TenLSP'];
        echo "<a href='sanpham.php?loaisanpham=$idlsp' class='list-group-item list-group-item-action'>$tenlsp</a>";
    }
}
//lấy hãng sản xuất
function getHSXnav()
{
    global $con;
    $sql = "select * from `hangsanxuat` order by TenNSX ASC";
    $rs = mysqli_query($con, $sql);
    while ($row_data = mysqli_fetch_assoc($rs)) {
        $idhsx = $row_data['idHSX'];
        $tennsx = $row_data['TenNSX'];
        echo "<a href='sanpham.php?hangsanxuat=$idhsx' class='list-group-item list-group-item-action'>$tennsx</a>";
    }
}
//lấy sản phẩm mới nhất theo id
function getSPmoi()
{
    global $con;
    $sql = "SELECT * FROM sanpham ORDER BY idSP DESC LIMIT 6";
    $rs = mysqli_query($con, $sql);
    while ($row_data = mysqli_fetch_assoc($rs)) {
        $idsp = $row_data['idSP'];
        $tensp = $row_data['TenSP'];
        $hinhsp = $row_data['HinhSP'];
        $giasp = $row_data['GiaSP'];
        $idhsx = $row_data['idHSX'];
        $noidung = $row_data['NoiDung'];
        $idlsp = $row_data['idLSP'];
        echo "<div class='card' style='width:200px; margin-left: 10px;'>
            <img class='card-img-top' src='./Admin/products_image/$hinhsp' alt='Card image' style='width:100%; height:50%; margin-top: 10px;'>
            <div class='card-body'>
                <h4 class='card-title' style='color: red;'>$tensp</h4>
                <p class='card-text'>Giá: $giasp $</p>
            </div>
            <a href='chitietsanpham.php?idsp=$idsp?idlsp=$idlsp?idlsp=$idhsx' class='btn btn-secondary' style='margin-top: 10px; margin-bottom:10px'>Chi tiết sản phẩm</a>
            <a href='' class='btn btn-primary' style='margin-top: 10px; margin-bottom:10px'>Thêm vào giỏ</a>
        </div>";
    }
}
//lấy tất cả sản phẩm //sanpham.php
function getSPall()
{
    global $con;
    //điều kiện
    if (!isset($_GET['loaisanpham'])) {
        if (!isset($_GET['hangsanxuat'])) {
            $sql = "SELECT * FROM sanpham ORDER BY rand()";
            $rs = mysqli_query($con, $sql);
            while ($row_data = mysqli_fetch_assoc($rs)) {
                $idsp = $row_data['idSP'];
        $tensp = $row_data['TenSP'];
        $hinhsp = $row_data['HinhSP'];
        $giasp = $row_data['GiaSP'];
        $idhsx = $row_data['idHSX'];
        $noidung = $row_data['NoiDung'];
        $idlsp = $row_data['idLSP'];
                echo "<div class='card' style='width:200px; margin-left: 10px; margin-top:10px;'>
            <img class='card-img-top' src='./Admin/products_image/$hinhsp' alt='Card image' style='width:100%; height:45%; margin-top: 10px;'>
            <div class='card-body'>
                <h4 class='card-title' style='color: red;'>$tensp</h4>
                <p class='card-text'>Giá: $giasp $</p>
            </div>
            <a href='chitietsanpham.php?idsp=$idsp?idlsp=$idlsp?idlsp=$idhsx' class='btn btn-secondary' style='margin-top: 10px; margin-bottom:10px'>Chi tiết sản phẩm</a>
            <a href='' class='btn btn-primary' style='margin-top: 10px; margin-bottom:10px'>Thêm vào giỏ</a>
        </div>";
            }
        }
    }
}
//sản phẩm theo loại
function getSPtheoloai()
{
    global $con;
    //điều kiện
    if (isset($_GET['loaisanpham'])) {
        $idlsp = $_GET['loaisanpham'];
        $sql = "SELECT * FROM sanpham where idLSP=$idlsp";
        $rs = mysqli_query($con, $sql);
        $num_row = mysqli_num_rows($rs);
        if ($num_row == 0) {
            echo "<h2 class='text-danger'>Không tìm thấy sản phẩm!</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($rs)) {
            $idsp = $row_data['idSP'];
        $tensp = $row_data['TenSP'];
        $hinhsp = $row_data['HinhSP'];
        $giasp = $row_data['GiaSP'];
        $idhsx = $row_data['idHSX'];
        $noidung = $row_data['NoiDung'];
        $idlsp = $row_data['idLSP'];
            echo "<div class='card' style='width:200px; margin-left: 10px; margin-top:10px;'>
            <img class='card-img-top' src='./Admin/products_image/$hinhsp' alt='Card image' style='width:100%; height:50%; margin-top: 10px;'>
            <div class='card-body'>
                <h4 class='card-title' style='color: red;'>$tensp</h4>
                <p class='card-text'>Giá: $giasp $</p>
            </div>
            <a href='chitietsanpham.php?idsp=$idsp?idlsp=$idlsp?idlsp=$idhsx' class='btn btn-secondary' style='margin-top: 10px; margin-bottom:10px'>Chi tiết sản phẩm</a>
            <a href='' class='btn btn-primary' style='margin-top: 10px; margin-bottom:10px'>Thêm vào giỏ</a>
        </div>";
        }
    }
}
//sản phẩm theo hãng
function getSPtheohang()
{
    global $con;
    //điều kiện
    if (isset($_GET['hangsanxuat'])) {
        $idhsx = $_GET['hangsanxuat'];
        $sql = "SELECT * FROM sanpham where idHSX=$idhsx";
        $rs = mysqli_query($con, $sql);
        $num_row = mysqli_num_rows($rs);
        if ($num_row == 0) {
            echo "<h2 class='text-danger'>Không tìm thấy sản phẩm!</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($rs)) {
            $idsp = $row_data['idSP'];
        $tensp = $row_data['TenSP'];
        $hinhsp = $row_data['HinhSP'];
        $giasp = $row_data['GiaSP'];
        $idhsx = $row_data['idHSX'];
        $noidung = $row_data['NoiDung'];
        $idlsp = $row_data['idLSP'];
            echo "<div class='card' style='width:200px; margin-left: 10px; margin-top:10px;'>
            <img class='card-img-top' src='./Admin/products_image/$hinhsp' alt='Card image' style='width:100%; height:50%; margin-top: 10px;'>
            <div class='card-body'>
                <h4 class='card-title' style='color: red;'>$tensp</h4>
                <p class='card-text'>Giá: $giasp $</p>
            </div>
            <a href='chitietsanpham.php?idsp=$idsp?idlsp=$idlsp?idlsp=$idhsx' class='btn btn-secondary' style='margin-top: 10px; margin-bottom:10px'>Chi tiết sản phẩm</a>
            <a href='' class='btn btn-primary' style='margin-top: 10px; margin-bottom:10px'>Thêm vào giỏ</a>
        </div>";
        }
    }
}
//tìm kiếm
function search_sp()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $sql = "SELECT * FROM sanpham where TenSP like '%$search_data_value%'";
        $rs = mysqli_query($con, $sql);
        $num_row = mysqli_num_rows($rs);
        if ($num_row == 0) {
            echo "<h2 class='text-danger'>Không tìm thấy sản phẩm!</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($rs)) {
            $idsp = $row_data['idSP'];
            $tensp = $row_data['TenSP'];
            $hinhsp = $row_data['HinhSP'];
            $giasp = $row_data['GiaSP'];
            $idhsx = $row_data['idHSX'];
            $noidung = $row_data['NoiDung'];
            $idlsp = $row_data['idLSP'];
            echo "<div class='card' style='width:200px; margin-left: 10px; margin-top:10px;'>
            <img class='card-img-top' src='./Admin/products_image/$hinhsp' alt='Card image' style='width:100%; height:50%; margin-top: 10px;'>
            <div class='card-body'>
                <h4 class='card-title' style='color: red;'>$tensp</h4>
                <p class='card-text'>Giá: $giasp $</p>
            </div>
            <a href='chitietsanpham.php?idsp=$idsp?idlsp=$idlsp?idlsp=$idhsx' class='btn btn-secondary' style='margin-top: 10px; margin-bottom:10px'>Chi tiết sản phẩm</a>
            <a href='' class='btn btn-primary' style='margin-top: 10px; margin-bottom:10px'>Thêm vào giỏ</a>
        </div>";
        }
    }
}
//chi tiết sản phẩm
function product_details()
{
    global $con;
    //điều kiện
    if (isset($_GET['idsp'])) {
        if (!isset($_GET['loaisanpham'])) {
            if (!isset($_GET['hangsanxuat'])) {
                $pid = $_GET['idsp'];
                $sql = "SELECT sanpham.*, loaisanpham.TenLSP, hangsanxuat.TenNSX 
                        FROM sanpham 
                        JOIN loaisanpham ON sanpham.idLSP = loaisanpham.idLSP 
                        JOIN hangsanxuat ON sanpham.idHSX = hangsanxuat.idHSX 
                        WHERE sanpham.idSP='$pid'";
                $rs = mysqli_query($con, $sql);
                while ($row_data = mysqli_fetch_assoc($rs)) {
                    $idsp = $row_data['idSP'];
                    $tensp = $row_data['TenSP'];
                    $hinhsp = $row_data['HinhSP'];
                    $giasp = $row_data['GiaSP'];
                    $noidung = $row_data['NoiDung'];
                    $tenlsp = $row_data['TenLSP'];
                    $tenhsx = $row_data['TenNSX'];
                    echo "<section class='py-5'>
                        <div class='container px-4 px-lg-5 my-5'>
                            <div class='row gx-4 gx-lg-5 align-items-center'>
                                <div class='col-md-6'><img class='card-img-top mb-5 mb-md-0' src='./Admin/products_image/$hinhsp' alt='...' /></div>
                                <div class='col-md-6'>
                                    <div class='small mb-1'>SKU: $idsp</div>
                                    <h1 class='display-5 fw-bolder'>$tensp</h1>
                                    <div class='fs-5 mb-5'>
                                        <span>$ $giasp</span>
                                    </div>
                                    <div class='fs-5 mb-5'>
                                        <span>Loại sản phẩm: $tenlsp</span><br/>
                                        <span>Hãng sản xuất: $tenhsx</span>
                                    </div>
                                    <p class='lead'>$noidung</p>
                                    <div class='d-flex'>
                                        <input class='form-control text-center me-3' id='inputQuantity' type='num' value='1' style='max-width: 3rem' />
                                        <button class='btn btn-outline-dark flex-shrink-0' type='button'>
                                            <i class='bi-cart-fill me-1'></i>
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>";
                    related_products();
                }
            }
        }
        
    }
}

//sản phẩm liên quan
function related_products()
{
    global $con;
    if (isset($_GET['idlsp']) && isset($_GET['idsp'])) {
        $cate_id = mysqli_real_escape_string($con, $_GET['idlsp']);
        $product_id = mysqli_real_escape_string($con, $_GET['idsp']);
        $sql = "SELECT * FROM sanpham WHERE idLSP ='$cate_id' and idSP != '$product_id' LIMIT 6";
        $rs = mysqli_query($con, $sql);
        if ($rs) {
            echo "<h3>Related products</h3>";
            echo "<div class='row'>";
            while ($row_data = mysqli_fetch_assoc($rs)) {
                $idsp = $row_data['idSP'];
                $tensp = $row_data['TenSP'];
                $hinhsp = $row_data['HinhSP'];
                $giasp = $row_data['GiaSP'];
                echo "
                <div class='col mb-4'>
                    <div class='card h-100'>
                        <img class='card-img-top' src='./Admin/products_image/$hinhsp' alt='...' style='width:100%; height:45%;'/>
                        <div class='card-body p-4'>
                            <div class='text-center'>
                                <h5 class='fw-bolder'>$tensp</h5>
                                $giasp
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                            <div class='text-center'><a class='btn btn-outline-dark mt-auto' href='#'>View options</a></div>
                        </div>
                    </div>
                </div>";
            }
            echo "</div>";
        }
    }
}

?>


