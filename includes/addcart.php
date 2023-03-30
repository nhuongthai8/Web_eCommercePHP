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



//giảm số lượng sản phẩm


//xóa

?>