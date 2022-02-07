<?php

session_start();
// Mendapatkan id produk dari url 
$id_obat = $_GET['id'];

//jika sudah ada produk itu dikeranjang, maka produknya di tambah 1


if (isset($_SESSION['pembayaran'][$id_obat]))
{
	$_SESSION['pembayaran'][$id_obat] +=1;
}

else  
{
	$_SESSION['pembayaran'][$id_obat] = 1;
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<script>alert('Obat berhasil Ditambahkan');</script>";
echo "<script>location='pembayaran.php'</script>";
?>
