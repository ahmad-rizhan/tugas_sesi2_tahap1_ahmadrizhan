<?php
session_start();
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM tbl_user WHERE id_user='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM tbl_user WHERE id_user ='$_GET[id]'");
echo "<script>alert('Yakin Data dihapus')</script>";
echo "<script>location='data-petugas.php';</script>";

?>   