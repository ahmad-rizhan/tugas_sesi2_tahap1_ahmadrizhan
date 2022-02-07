<?php
session_start();
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM obat WHERE id_obat='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM obat WHERE id_obat ='$_GET[id]'");
echo "<script>alert('Yakin Data dihapus')</script>";
echo "<script>location='data-obat.php';</script>";

?>   