<?php
session_start();
include 'koneksi.php';

$ambil=$koneksi->query("SELECT * FROM pelayanan WHERE id_pelayanan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM pelayanan WHERE id_pelayanan='$_GET[id]'");
echo "<script>alert('Yakin Data dihapus')</script>";
echo "<script>location='data-pelayanan.php';</script>";
?>