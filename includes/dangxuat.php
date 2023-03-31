<?php
session_start();
unset($_SESSION['Username']);
echo"<script>window.open('../index.php','_self')</script>";
?>