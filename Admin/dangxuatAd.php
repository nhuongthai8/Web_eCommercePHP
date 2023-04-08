<?php
session_start();
unset($_SESSION['username']);
echo"<script>window.open('./loginAd.php','_self')</script>";
?>