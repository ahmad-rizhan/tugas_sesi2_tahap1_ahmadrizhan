
<?php
session_start();
include 'koneksi-user.php';
?>

<!doctype html>
<html lang="en">

<head>
	<title>Tables | Klorofil - Free Bootstrap Dashboard Template</title>
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
		
		
		<style type="text/css">
			.x {
			  margin: 0 30px;
			  background-color: #fff;
			  border: 3px solid transparent;
			  padding: 10px;
			  border-radius: 10px;
			  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			          box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			}
			.y {
			  padding-top: 10px; 
			  margin-top: 0;
			  margin-bottom: 20px;
			  font-weight: 300; 
			}
			.col-md-4 {
				padding: 15px;
				margin-bottom: 30px;
				border-radius: 30px;	
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
			tfoot{
				font-size: 18px;
				padding-top: 20px;
			}

			li a.active {
			    color: white;
			    background-color: #666;
			    
			}
		</style>

			<div class="main-content">
				<div class="row">

					<div class="panel-heading">
						<center><b><h2>KWITANSI</h2></b></center>
						<hr>
					</div>

						<?php
							$ambil = $koneksi->query("SELECT * FROM bayar 
							INNER JOIN pasien ON bayar.id_pasien=pasien.id_pasien
							INNER JOIN dokter ON bayar.id_dokter=dokter.id_dokter WHERE id_bayar='$_GET[id]'"); 
							$detail = $ambil ->fetch_assoc();
						?>

						<div class="col-md-4" style="background-color: #e3ecfe;">
							<div class="panel-body">
								
								<table class="table table-hover">
									<tr>
										<th>No. Pembayaran</th>
										<th> <?php echo $detail['id_bayar']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Tanggal Pembayaran</th>
										<th> <?php echo $detail['tanggal_bayar']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Total</th>
										<th>Rp. <?php echo number_format($detail['total_bayar']); ?></th>
									</tr>
								</table>	
							</div>							
						</div>
						<div class="col-md-4" style="background-color: #e1e6ff;">							
							<div class="panel-body">
								<table class="table table-hover">
									<tr>
										<th>Nama Pasien</th>
										<th> <?php echo $detail['nama_pasien']; ?></th>
									</tr>
									<br>
									<tr>
										<th>TTL</th>
										<th> <?php echo $detail['lahir_pasien']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Keluhan</th>
										<th><?php echo $detail['keluhan']; ?></th>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-4" style="background-color: #e3ecfe;">
							
							<div class="panel-body">
								<table class="table table-hover">
									<tr>
										<th>Nama Dokter</th>
										<th> <?php echo $detail['nama_dokter']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Spesialis</th>
										<th><?php echo $detail['spesialis']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Diagnosa Dokter</th>
										<th> <?php echo  $detail['diagnosa']; ?></th>
									</tr>
								</table>
								
							</div>
				
						</div>
					</div>
					
				
								<div class="x">
									<div class="panel-body">	
									
										<table class="table table-hover">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Obat</th>
												<th>Harga Obat</th>
												<th>Jumlah</th>
												<th>Subtotal</th>
												
											</tr>
										</thead>
										<tbody>

											<?php $no=1; ?>
											<?php $ambil = $koneksi ->query("SELECT * FROM pembayaran_obat INNER JOIN obat ON pembayaran_obat.id_obat=obat.id_obat WHERE id_bayar='$_GET[id]'");?>
											<?php while ($pecah = $ambil -> fetch_assoc()){ 
											?>

											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $pecah["nama_obat"]; ?></td>
												<td><?php echo number_format($pecah["harga_obat"]); ?></td>
												<td><?php echo $pecah["jumlah"]; ?></td>
												<td>Rp. <?php echo number_format($pecah["harga_obat"]*$pecah["jumlah"]); ?></td>
											</tr>
											<?php $no++;  ?>
											<?php } ?>
										</tbody>
										<tfoot>
											<br>
											<th colspan="4">Biaya Resep Obat</th>
											
											<th>
												Rp. <?php echo number_format($detail['biaya_resep']);?>
											</th>
											
										</tfoot>
										<tfoot>
											<th colspan="4">Biaya Pelayanan</th>
											<th>
												Rp. <?php echo number_format($detail['tarif']);?>
											</th>
										</tfoot>
										
									</table>
									
									<div class="row">
										<div class="col-md-7">
											<div class="alert alert-info">
												<p>
													Silahkan melakukan pembayaran Sebesar Rp. <?php echo number_format($detail['total_bayar']); ?>
													
												</p>
											</div>
										</div>
										<div class="col-md-5">
											<a href="data-pembayaran.php" class="btn btn-success btn-lg"><i class="fa fa-thumbs-up"></i></a>
										</div>

									</div>
								</div>
							</div>
							<br>
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
