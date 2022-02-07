<?php
session_start();
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM tbl_pendaftaran WHERE no_daftar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM tbl_pendaftaran WHERE no_daftar='$_GET[id]'");
echo "<script>alert('Yakin Data dihapus')</script>";
echo "<script>location='transaksi-pendaftaran.php';</script>";

?>   