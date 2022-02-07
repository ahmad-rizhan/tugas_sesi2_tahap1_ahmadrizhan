<?php
session_start();
include 'koneksi-user.php';

$ambil = $koneksi->query("SELECT * FROM bayar WHERE id_bayar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM bayar WHERE id_bayar ='$_GET[id]'");
echo "<script>alert('Yakin Data dihapus')</script>";
echo "<script>location='data-pembayaran.php';</script>";

?>   