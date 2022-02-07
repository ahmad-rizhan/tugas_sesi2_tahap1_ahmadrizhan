<?php 
 session_start();
 include 'koneksi.php';
?>
<!doctype html>
<html lang="en">

<head>
	<title>Tambah - Pelayanan | TesKlinik</title>
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
		v>
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
					<h3 class="page-title">Tambah Pelayanan</h3>
					<div class="row">
		<!-- INPUT GROUPS -->
						<div class="panel">

								<br>
								<div style="padding-top: 0; padding-bottom: 15px;" class="user text-center">
										<img style="width: 100px; height: 100px;" src="assets/img/pelayanan.png" class="image-circle" alt="Avatar">
								</div>

								<div class="panel-body">
									<form method="post" action="">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-font"></i></span>
											<input class="form-control" placeholder="Nama Pelayanan" type="text" name="nama_pelayanan" autocomplete="off">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-usd"></i></span>
											<input class="form-control" placeholder="Biaya Pelayanaan" type="text" name="biaya_pelayanan" autocomplete="off">
										</div>
										<br>
										<div class="button-group">
											
												<button class="btn btn-success" name="save"><i class="fa fa-check-circle"></i> Save</button>
												<a href="data-pelayanan.php" class="btn btn-primary"><i class="fa fa-times-circle"></i> Cancel</a>
												
										</div>
									</form>
									<?php 
										if (isset($_POST['save'])) 
											
										{
											$nama_pelayanan = $_POST['nama_pelayanan'];
											$biaya_pelayanan = $_POST['biaya_pelayanan'];
											
											$sql = mysqli_query($koneksi, "INSERT INTO pelayanan
												VALUES(
												' ',
												'$nama_pelayanan',
												'$biaya_pelayanan')");
											if ($sql) {
												echo "<script>
			                      						alert('Selamat anda berhasil menambahkan data');
			                      						document.location.href = 'data-pelayanan.php';
	                    							</script>";
											}
											else{
											echo "gagal";
											echo "<br>". mysqli_error($koneksi);
										  }	
									 }
									?>
								</div>
						</div>
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