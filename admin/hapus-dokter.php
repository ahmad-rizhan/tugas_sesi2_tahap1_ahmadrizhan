<?php
session_start();
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM dokter WHERE id_dokter='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM dokter WHERE id_dokter ='$_GET[id]'");
echo "<script>alert('Yakin Data dihapus')</script>";
echo "<script>location='data-dokter.php';</script>";

?>   