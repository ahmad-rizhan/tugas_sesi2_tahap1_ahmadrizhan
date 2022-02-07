<?php
session_start();
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM pasien WHERE id_pasien='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM pasien WHERE id_pasien ='$_GET[id]'");
echo "<script>alert('Data Terhapus')</script>";
echo "<script>location='data-pasien.php';</script>";

?>   