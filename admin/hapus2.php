<?php
session_start();
include 'nyambung.php';
$ambil -> $query("SELECT * FROM tb_siswa WHERE nis='$_GET[id]'");
$data = $ambil->fetch_assoc();

$connect->query("DELETE FROM tb_siswa WHERE nis ='$_GET[id]'");
echo "<script>alert('Yakin Data dihapus')</script>";
echo "<script>location='form1_tampil.php';</script>";

?>   