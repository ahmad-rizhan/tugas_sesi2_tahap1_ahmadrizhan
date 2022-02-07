<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
	<title>Data - Pelayanan | TesKlinik</title>
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
					<form class="navbar-form navbar-right" action="search-pelayanan.php" method="post">
						<div class="input-group">
							<input type="text" name="keyword" value="" class="form-control" placeholder="Search Data ..." autocomplete="off" autofocus>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary" name="cari">Search</button>
							</span>
						</div>
					</form>		
					<br>
						
					<h3 class="page-title">Data Biaya</h3>
					
							<!-- TABLE HOVER -->
							<div class="panel">

								<div class="panel-heading">
									<a href="tambah-pelayanan.php" class="btn-default btn">
										<h6 class="panel-title"><i class="fa fa-bed" aria-hidden="true"></i> Tambah Pelayanan</h6>
									</a>		
								</div>
								
								<div class="panel-body">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>No.</th>
												<th>Nama Pelayanan</th>
												<th>Biaya Pelayanan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no=1; ?>
											<?php $ambil = $koneksi ->query("SELECT * FROM pelayanan");?>
											<?php while ($pecah = $ambil -> fetch_assoc()){ 
											?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $pecah["nama_pelayanan"]; ?>
												</td>
												<td>Rp. <?php echo number_format($pecah["biaya_pelayanan"]); ?></td>
												
												<td>
													<a href="update-pelayanan.php?id=<?php echo $pecah['id_pelayanan']; ?>" class="btn-warning btn"><i class="fa fa-pencil"></i>
													</a> 
													| 
													<a href="hapus-pelayanan.php?id=<?php echo $pecah['id_pelayanan']; ?>" class="btn-danger btn"><i class="fa fa-trash"></i>
													</a>
													
												</td>
											</tr>
											<?php $no++;  ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
				</div>
			</div>
		</div>

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
