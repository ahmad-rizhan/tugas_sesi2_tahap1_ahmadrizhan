<?php
session_start();

//menghancurkan $_SESSION["pelanggan"]


echo "<script>alert('Anda telah Logout');</script>";
echo "<script>location='../index.php';</script>";
session_destroy();
?>