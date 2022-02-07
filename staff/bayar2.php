<?php
session_start();

include 'koneksi-user.php';

?>


<!doctype html>
<html lang="en">

<head>
	<title>Pembayaran | Klorofil - Free Bootstrap Dashboard Template</title>
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
			  padding-top: 0;
			  padding: 0 10px;
			  border: 3px solid transparent;
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
			tfoot{
				font-size: 20px;
				padding-top: 20px;

			}
			input[type=text]{
			    width:39%;
			    padding: 8px 6px;
			    margin: 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    border-radius: 4px;
			    box-sizing: border-box;
			}
			select{
			    width:30%;
			    padding: 8px 6px;
			    margin: 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    border-radius: 4px;
			    box-sizing: border-box;
			}
			textarea{
				width: 49%;
			    padding: 8px 6px;
			    margin: 0;
			    display: inline-block;
			    border: 1px solid #ccc;
			    border-radius: 4px;
			    box-sizing: border-box;
			}
			.xy{
			
			  margin: 0 20px;
			  padding: 10px;
			  background-color: transparent;
			  border: 3px solid transparent;
			  border-radius: 10px;
			
			}
			.z {
			  margin: 0 15px;
			  padding: 20px;
			  background-color: #f3f3f8;
			  border: 2px solid #e7e7e7;
			  border-radius: 7px;
			  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			          box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
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
					
				<h1 class="y">Pembayaran</h1>
					
				<!-- TABLE HOVER -->
					<div class="z">					
						<div class="row">
							<div class="col-md-7">
							<!-- TABLE STRIPED -->
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">List Obat</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Obat</th>
												<th>Harga Obat</th>
												<th>Jumlah Obat</th>
												<th>Subharga Obat</th>
											</tr>
										</thead>
										<tbody>
											<?php $nomor=1;
											// variabel nomor
											?> 
											<?php $biaya_resep =0; ?>
											
											<?php foreach ($_SESSION['pembayaran2'] as $id_obat => $jumlah): ?> 

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
											</tr>
											<?php
											$nomor++;
											?>
											<?php $biaya_resep+=$subharga; ?>
											<?php endforeach ?>
										</tbody>
										<tfoot>
											<br>
											<th colspan="4">Biaya Resep Obat</th>
											<th>
												<input type="text" name="biaya_resep" value="Rp. <?php echo number_format($biaya_resep);?>" readonly>
												</th>
										</tfoot>
									</table>
								</div>
								</div>
							<!-- END TABLE STRIPED -->
							</div>
								<div class="col-md-5">
							<!-- TABLE HOVER -->
								<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">List Pelayanan</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Pelayanan</th>
												<th>Harga Pelayanan</th>
											</tr>
										</thead>
										<tbody>
											<?php $nomor=1;
											// variabel nomor
											?> 
											<?php $biaya_layanan =0; ?>
											<?php foreach ($_SESSION['pembayaran2'] as $id_pelayanan): ?> 

												<!-- menampilkan produk  yg sedang diperluangkan berdasarkan id_produk-->

												<?php
												$ambil = $koneksi->query("SELECT * FROM pelayanan WHERE id_pelayanan='$id_pelayanan'");
												$pecah = $ambil->fetch_assoc();
												?>

											<tr>
												<td><?php echo $nomor; ?></td>
												<td><?php echo $pecah["nama_pelayanan"];?></td>
												<td>Rp. <?php echo number_format($pecah["biaya_pelayanan"]);?></td>
											</tr>
											<?php
											$nomor++;
											?>
											<?php $biaya_layanan+=$pecah["biaya_pelayanan"]; ?>
											
											<?php endforeach ?>
										</tbody>
										<tfoot>
											<br>
											<th colspan="2">Biaya Pelayanan</th>
											<th>
												<input type="text" name="biaya_layanan" value="Rp. <?php echo number_format($biaya_layanan);?>"readonly>
												</th>
										</tfoot>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
							</div>
						</div>		
					</div>
					<br>
								
					<div class="xy">
						<form method="post" action="">
										<div class="row">
											<div class="col-md-12">
												<select name="id_pasien">
													<option>Pilih Nama Pasien</option>

													<?php 
													$ambil = $koneksi->query("SELECT * FROM pasien");
													while($perpasien=$ambil->fetch_assoc()){
													?>
													<option value=" <?php echo $perpasien["id_pasien"]; ?>">
														<?php echo $perpasien['nama_pasien'];?>
													</option>
													<?php } ?>
												</select> 	

												<input type="text" name="keluhan" placeholder="Keluhan Pasien..." autocomplete="off">

												<select name="id_dokter">
											<option value="">Pilih Dokter</option>

											<?php 
											$ambil = $koneksi->query("SELECT * FROM dokter");
											while($pertarif=$ambil->fetch_assoc()){
											?>
											<option value=" <?php echo $pertarif["id_dokter"]; ?>">
												<?php echo $pertarif['nama_dokter']?> - <?php echo $pertarif['spesialis']?> 
											</option>
											<?php } ?>
												</select>
											</div>
										</div>
										<br>
										<div  class="row">
											<div class="col-md-12">
												<textarea name="diagnosa" placeholder="Diagnosa dari Dokter ..." autocomplete="off"></textarea>
												<textarea name="resep" placeholder="Resep Obat dari Dokter ..." autocomplete="off"></textarea>
											</div>
										</div>
										<br>
										<div class="button-group">
											<button class="btn btn-info" name="checkout">Checkout</button>
										</div>
						</form>
					</div>
			</div>

		</div>

							<?php

								if (isset($_POST["checkout"])) 
								{
								$id_pasien = $_POST["id_pasien"];
								$id_dokter = $_POST["id_dokter"];
								$tanggal_bayar = date("Y-m-d");		

									$ambil = $koneksi->query("SELECT * FROM dokter WHERE id_dokter='$id_dokter'");
									$arraytarif = $ambil->fetch_assoc();
								$tarif = $arraytarif['tarif'];
								$biaya_resep = $biaya_resep;
								$biaya_layanan = $biaya_layanan;
								$keluhan = $_POST['keluhan'];
								$diagnosa = $_POST['diagnosa'];
								$resep = $_POST['resep'];
								$total_bayar = $biaya_resep + $tarif + $biaya_layanan;
					
							// 1. menyimpan data ke tabel bayar di database
								$sql = mysqli_query($koneksi, "INSERT INTO bayar
									VALUES(
									' ',
									'$id_pasien',
									'$id_dokter',	
									'$tanggal_bayar',
									'$tarif',
									'$biaya_resep',
									'$biaya_layanan',
									'$keluhan',
									'$diagnosa',
									'$resep',
									'$total_bayar')");

									//mendapatkan id pembayaran barusan
								$id_pembayaran_barusan = $koneksi->insert_id;
								foreach ($_SESSION["pembayaran2"] as $id_obat => $jumlah)
								{
									$koneksi->query("INSERT INTO pembayaran_obat(id_bayar,id_obat,jumlah)VALUES('$id_pembayaran_barusan','$id_obat','$jumlah')");
								}

								$id_pembayaran_baru = $koneksi->insert_id;
								foreach ($_SESSION["pembayaran2"] as $id_pelayanan)
								{
									$koneksi->query("INSERT INTO pembayaran_layanan(id_bayar,id_pelayanan)VALUES('$id_pembayaran_baru','$id_pelayanan')");
								}
								//mengkosongkan pembayaran obat

								unset($_SESSION["pembayaran2"]);
								//tampilan dialihkan ke kwitansi
								echo "<script>alert('pembayaran berhasil');</script>";

								echo "<script>location='detail-pembayaran2.php?id=$id_pembayaran_barusan&&detail-pembayaran2.php?id=$id_pembayaran_baru';</script>";
							}
							
					?>
												
		<!-- END MAIN -->
		<div class="clearfix">
		</div>
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