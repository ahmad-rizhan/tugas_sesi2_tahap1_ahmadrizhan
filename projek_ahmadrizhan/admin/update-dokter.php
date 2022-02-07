<?php 
 session_start();
 include 'koneksi.php';
  $ambil=$koneksi->query("SELECT * FROM dokter WHERE id_dokter='$_GET[id]'");
	 $pecah=$ambil->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
	<title>Update - Dokter | TesKlinik</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				KLINIK
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-success update-pro" href="logout.php" title="LOGOUT"><i class="fa fa-power-off"></i> <span> LogOut</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/kepsek.png" class="img-circle" alt="Avatar"> <span><?php print_r($_SESSION['user']) ?></span></a>
							
						</li>
					</ul>
				</div>


			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
				<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="dashboard.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>						

						<li><a href="data-petugas.php" class=""><i class="fa fa-user-o"></i> <span>Data Petugas</span></a></li>

						<li><a href="data-pasien.php" class=""><i class="fa fa-table"></i> <span>Data Pasien</span></a></li>

						<li><a href="data-dokter.php" class=""><i class="fa fa-stethoscope"></i> <span>Data Dokter</span></a></li>

						<li><a href="data-pelayanan.php" class=""><i class="fa fa-bed"></i> <span>Data Pelayanan</span></a></li>

						<li><a href="data-obat.php" class=""><i class="fa fa-medkit"></i> <span>Data Obat</span></a></li>

						<li><a href="data-biaya.php" class=""><i class="fa fa-usd"></i> <span>Data Pembayaran</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
		<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-heading">
									<center><h3 class="">Update Dokter</h3></center>
								</div>

								<div class="panel-body">
									<form method="post" action="">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-font"></i></span>
											<input class="form-control" value="<?php echo $pecah['nama_dokter']; ?>" type="text" name="nama_dokter">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
											<input class="form-control" value="<?php echo $pecah['lahir_dokter']; ?>" type="date" name="lahir_dokter">
										</div>
										<br>
									
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
											<textarea placeholder="<?php echo $pecah['alamat']; ?>" class="form-control" value="<?php echo $pecah['alamat']; ?>" rows="4" name="alamat"></textarea>
										</div>
										<br>

										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone"></i></span>
											<input class="form-control" value="<?php echo $pecah['telepon']; ?>" type="text" name="telepon">
										</div>
										<br>
									
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-usd"></i></span>
											<input class="form-control" value="<?php echo $pecah['tarif']; ?>" type="text" name="tarif">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
											<input class="form-control" value="<?php echo $pecah['spesialis']; ?>" type="text" name="spesialis">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-align-left"></i></span>
											<textarea placeholder="<?php echo $pecah['keterangan']; ?>" class="form-control" value="<?php echo $pecah['keterangan']; ?>" rows="4" name="keterangan"></textarea>
										</div>
										<br>
										<div class="button-group">
											
												<button class="btn btn-default" name="update"><i class="fa fa-check-circle"></i> Update</button>
												<a href="data-dokter.php" class="btn btn-primary"><i class="fa fa-times-circle"></i> Cancel</a>

										</div>
									</form>
									<?php
										if (isset($_POST['update'])) 
										{
											
											$koneksi->query("UPDATE dokter SET
												nama_dokter='$_POST[nama_dokter]',
												lahir_dokter='$_POST[lahir_dokter]',
												alamat='$_POST[alamat]',
												telepon='$_POST[telepon]',
												tarif = '$_POST[tarif]',
												spesialis = '$_POST[spesialis]',
												keterangan = '$_POST[keterangan]' 
												WHERE 
												id_dokter='$_GET[id]'");
											
											
											echo "<script> alert('Data Dokter berhasil diubah');</script>";
											echo "<script>location='data-dokter.php';</script>";
										}
									
									?>
								</div>
							</div>
							<!-- END INPUT GROUPS -->
					</div>
				</div>
			<!-- END MAIN CONTENT -->
			</div>	
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