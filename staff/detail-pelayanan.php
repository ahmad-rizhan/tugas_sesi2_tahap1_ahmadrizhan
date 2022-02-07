<?php session_start(); ?>
<?php include 'koneksi-user.php'; ?>
<?php
//mendapatkan id produk dari url
$id_pelayanan = $_GET["id"];

//query ambil data

$ambil = $koneksi->query("SELECT * FROM obat WHERE id_pelayanan='$id_pelayanan'");
$detail = $ambil->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<style>
input[type=number]{
    width: 80%;
    padding: 12px 10px;
    margin: 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    width: 15%;
    background-color: #4CAF50;
    color: white;
    padding: 12px 10px;
    margin: 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}
div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
    margin: 10px 300px;

}
.title{
    border-radius: 5px;
    background-color: transparent;
    padding: 0;
    margin: 10px 300px;
}
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			border: 2px solid #e7e7e7;
			background-color: #f3f3f3;
			}

			li {
			    float: left;
			}

			li a {
			    display: block;
			    color: #666;
			    text-align: center;
			    padding: 24px 30px;
			    text-decoration: none;
			}

			li a:hover:not(.active) {
			    background-color: #ddd;
			    color: #666;
			}

			li a.active {
			    color: white;
			    background-color: #666;
			    
			}


</style>
<body>
	<ul>		
		<li><a class="active" href="add-pasien.php">Home</a></li>	
		<li><a href="data-pasien.php">Data Pasien</a></li>
		<li><a href="data-dokter.php">Data Dokter</a></li>
		
		<li><a href="data-pembayaran.php" >Data Pembayaran</a></li>
		<li><a href="logout.php" >Logout</a></li>
	</ul>

<div class="title">
	<h1>Detail Obat</h1>
</div>

<div>
  <h2><?php echo $detail["nama_pelayanan"]?></h2>
  <h4>Harga : Rp. <?php echo number_format($detail["harga_pelayanan"]);?></h4>

  <form method="post">
    <input type="number" name="jumlah" min="1" autofocus autocomplete="off">
	<button  name="add">Add</button>

					<?php 
					//jika ada tombol beli
					if (isset($_POST["add"])) 
					 {
					 	//mendapatkan jumlah yang diikutkan
					 	$jumlah =  $_POST["jumlah"];

					 	//masukkan ke keranjang belanja 
					 	$_SESSION["bayar2"][$id_pelayanan] = $jumlah; 
					 
					 echo "<script>alert('Obat berhasil ditambahkan');</script>";
					 echo "<script>location='bayar2.php  ';</script>";
					}
					?>
					
  </form>

					
</div>

</body>

<!-- Mirrored from www.w3schools.com/css/tryit.asp?filename=trycss_forms by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:04:37 GMT -->
</html>


				