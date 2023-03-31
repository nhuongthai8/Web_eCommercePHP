<?php

$con=new mysqli('localhost','root','','webbanhangphp');
if(!$con){
    die(mysqli_error($con));
}

session_start();

//thêm
if(isset($_POST['addtocart'])){
    // session_destroy();
    $idsp = $_GET['idsp'];
    $soluong = 1;
    $sql = "select * from sanpham where idSP = '".$idsp."' limit 1";
    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product = array(array('TenSP'=>$row['TenSP'],'idsp' => $idsp,'Soluong' => $soluong,'GiaSP' => $row['GiaSP'],
            'HinhSP' => $row['HinhSP']));
        //kiểm tra session tồn tại
        if(isset($_SESSION['cart'])){
            $found = false;
            foreach($_SESSION['cart'] as $cart_items){
                //nếu dữ liệu trùng
                if($cart_items['idsp']==$idsp){
                    $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $cart_items['Soluong']+1,
                    'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']); 
                    $found = true;
                }
                //không trùng
                else{
                    $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $cart_items['Soluong'],
                    'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
                }
            }
            if($found == false){
                //liên kết 2 mảng product vs new_product
                $_SESSION['cart'] = array_merge($product,$new_product);
            }else{
                $_SESSION['cart'] = $product;
            }
        }else{
            $_SESSION['cart'] = $new_product;
        }    
    }
   header('Location: ../shoppingcart.php');
}

//thêm số lượng sản phẩm
if(isset($_GET['adjust'])){
    $idsp = $_GET['adjust'];
    foreach($_SESSION['cart'] as $cart_items){
        if($cart_items['idsp']!=$idsp){
            $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $cart_items['Soluong'],
                'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
            $_SESSION['cart'] = $product;
        }
        else{
            $tangsoluong = $cart_items['Soluong']+1;
            if($cart_items['Soluong']<99){
                $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $tangsoluong,
                    'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
            }else{
                $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $cart_items['Soluong'],
                    'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location: ../shoppingcart.php');
}
//giảm số lượng sản phẩm
if(isset($_GET['minus'])){
    $idsp = $_GET['minus'];
    foreach($_SESSION['cart'] as $cart_items){
        if($cart_items['idsp']!=$idsp){
            $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $cart_items['Soluong'],
                'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
            $_SESSION['cart'] = $product;
        }
        else{
            $giamsoluong = $cart_items['Soluong']-1;
            if($cart_items['Soluong']>1){
                $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $giamsoluong,
                    'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
            }else{
                // $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $cart_items['Soluong'],
                //     'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
                if ($item['Soluong'] == 1) {
                    unset($cart_items[$key]);
                }
            }
            $_SESSION['cart'] = $product;
        }
    }
    header('Location: ../shoppingcart.php');
}

//xóa
if(isset($_SESSION['cart'])&& isset($_GET['delete_item'])){
    $idsp = $_GET['delete_item'];
    foreach($_SESSION['cart'] as $cart_items){
        if($cart_items['idsp']!=$idsp){
            $product[]= array('TenSP'=>$cart_items['TenSP'],'idsp' => $cart_items['idsp'],'Soluong' => $cart_items['Soluong'],
                'GiaSP' => $cart_items['GiaSP'],'HinhSP' => $cart_items['HinhSP']);
        }

    $_SESSION['cart'] = $product;
    header('Location: ../shoppingcart.php');
    }
}

//xóa tất cả
if(isset($_POST['remove_all_items'])){
    echo '<script>alert("Đã xóa tất cả sản phẩm trong giỏ hàng!");</script>';
    echo '<script>alert("Vui lòng thêm sản phẩm để truy cập giỏ hàng!"); window.location.href = "../sanpham.php";</script>';
    unset($_SESSION['cart']);
}

//tiếp tục mua
if(isset($_POST['continue_shopping'])){
    header('Location: ../sanpham.php');
}

?>