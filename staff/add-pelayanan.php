<?php

session_start();
// Mendapatkan id produk dari url 
$id_pelayanan = $_GET['id'];

//jika sudah ada produk itu dikeranjang, maka produknya di tambah 1


if (isset($_SESSION['pembayaran2'][$id_pelayanan]))
{
	$_SESSION['pembayaran2'][$id_pelayanan] =+1;
}

else  
{
	$_SESSION['pembayaran2'][$id_pelayanan] = 1;
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<script>alert('List Pelayanan berhasil Ditambahkan');</script>";
echo "<script>location='pembayaran2.php'</script>";
?>
