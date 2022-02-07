<?php
session_start();
include 'koneksi-user.php';
?>


<!doctype html>
<html lang="en">

<head>
	<title>List-Bayar | TesKlinik</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../admin/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../admin/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../admin/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../admin/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../admin/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../admin/assets/img/favicon.png">
	
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		

		<style type="text/css">
			.x {
			  margin: 0 30px;
			  padding: 10px;
			  background-color: #fff;
			  border: 3px solid transparent;
			  border-radius: 10px;
			  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			          box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			}
			.y {
			  padding-top: 10px; 
			  margin-top: 0;
			  margin-bottom: 20px;
			  font-weight: 300; }
			h1{
				text-align: center;
			}
			.z {
			  
			  padding: 20px 20px;
			  margin: 0 750px;
			  border: 5px solid transparent;
			  border-radius: 20px;
			}
			
			ul {
			    list-style-type: none;
			    margin: 7px;
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
		
			<ul>		
				
				<li><a href="add-pasien.php"><b>Home</b></a></li>
				<li><a href="data-pasien.php">Data Pasien</a></li>
				<li><a href="data-dokter.php">Data Dokter</a></li>
				
				<li><a href="data-pembayaran.php" >Data Pembayaran</a></li>
				<li><a href="logout.php" >Logout</a></li>
			</ul>
			<div class="main-content">

							<!-- TABLE HOVER -->
							
								<div class="x">
									<div class="panel-heading">
										<center><b><h2>Biaya Obat</h2></b></center>
									</div>
									<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Obat</th>
												<th>Harga Obat</th>
												<th>Jumlah Obat</th>
												<th>Subharga Obat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $nomor=1;
											// variabel nomor
											?> 
											
											<?php foreach ($_SESSION['pembayaran'] as $id_obat => $jumlah): ?> 

												<!-- menampilkan produk  yg sedang diperluangkan berdasarkan id_produk-->

												<?php
												$ambil = $koneksi->query("SELECT * FROM obat WHERE id_obat='$id_obat'");
												$pecah = $ambil->fetch_assoc();
												
												$subharga = $pecah["harga_obat"]*$jumlah;	
												?>

											<tr>
												<td><?php echo $nomor; ?></td>
												<td><?php echo $pecah["nama_obat"];?></td>
												<td>Rp. <?php echo number_format($pecah["harga_obat"]);?></td>
												<td><?php echo $jumlah ;?></td>
												
												<td>Rp. <?php echo number_format($subharga);?></td>
												<td>
													<a href="hapus-list-obat.php?id=<?php echo $id_obat ?>" class="btn btn-danger btn-xs">Hapus</a>
												</td>
											</tr>
											<?php
											$nomor++;
											?>
											<?php endforeach ?>
										</tbody>
										
									</table>
									</div>
									
									<a href="biaya-obat.php" class="btn btn-default ">Tambah Obat</a>
									<a href="bayar.php" class="btn btn-success " >Lanjutkan Bayar</a>
								</div>
								
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2022. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>