<?php session_start(); ?>
<?php include 'koneksi-user.php'; ?>
<?php
//mendapatkan id obat dari url
$id_obat = $_GET["id"];

//query ambil data

$ambil = $koneksi->query("SELECT * FROM obat WHERE id_obat='$id_obat'");
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
		<
		<li><a href="add-pasien.php"><b>Home</b></a></li>
		<li><a href="data-pasien.php">Data Pasien</a></li>
		<li><a href="data-dokter.php">Data Dokter</a></li>
		
		<li><a href="data-pembayaran.php" >Data Pembayaran</a></li>
		<li><a href="logout.php" >Logout</a></li>
	</ul>

<div class="title">
	<h1>List Obat</h1>
</div>

	<div>
	 	<h2><?php echo $detail["nama_obat"]?></h2>
  		<h4>Harga : Rp. <?php echo number_format($detail["harga_obat"]);?></h4>
  		<h4>Stok : <?php echo $detail["stok"];?></h4>
  		<form method="post">
		    <input type="number" name="jumlah" min="1" max="<?php echo $detail['stok'];?>" autofocus autocomplete="off">
			<button class="btn btn-primary" name="add">Add</button>

					<?php 
					//jika ada tombol add
					if (isset($_POST["add"])) 
					 {
					 	//mendapatkan jumlah yang diikutkan
					 	$jumlah =  $_POST["jumlah"];

					 	//masukkan ke pembayaran 
					 	$_SESSION["pembayaran"][$id_obat] = $jumlah; 
					 
					 echo "<script>alert('Obat berhasil ditambahkan');</script>";
					 echo "<script>location='pembayaran.php  ';</script>";
					}
					?>
					<h3>Kategori Obat : <?php echo $detail["kategori"];?></h3>
					<p>Keterangan Obat : <?php echo $detail["keterangan"];?></p>
  		</form>					
	</div>

</body>

<!-- Mirrored from www.w3schools.com/css/tryit.asp?filename=trycss_forms by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Mar 2016 11:04:37 GMT -->
</html>


				