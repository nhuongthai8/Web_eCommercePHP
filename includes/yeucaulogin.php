<?php
session_start();
if(!isset($_SESSION['Username'])){
    header('location:dangnhap.php');
}
?>