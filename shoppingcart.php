<?php
session_start();


?>
<p>Giỏ hàng</p>
<?php
if(isset($_SESSION['cart'])){
    echo'<pre>';
    print_r($_SESSION['cart']);
    echo'</pre>';
}

?>