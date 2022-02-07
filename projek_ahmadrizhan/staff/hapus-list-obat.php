<?php
session_start();
$id_obat = $_GET['id'];
unset($_SESSION["pembayaran"][$id_obat]);

echo "<script>alert('Data Obat telah Dihapus dari Pembayaran');</script>";
echo "<script>location='pembayaran.php';</script>";

?>