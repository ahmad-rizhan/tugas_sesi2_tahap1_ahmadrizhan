<?php
session_start();
	include 'koneksi.php';

	$keyword = $_POST["keyword"];

	$semuadata=array();
	$ambil = $koneksi->query
				("SELECT * FROM bayar 
					INNER JOIN pasien ON bayar.id_pasien=pasien.id_pasien
					INNER JOIN dokter ON bayar.id_dokter=dokter.id_dokter 
					WHERE nama_pasien LIKE '%$keyword%'
					OR tanggal_bayar LIKE '%$keyword%'
					OR nama_dokter LIKE '%$keyword%'
					OR spesialis LIKE '%$keyword%'");
	while ($pecah=$ambil->fetch_assoc())
	{
		$semuadata[] = $pecah;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search - Data Pembayaran | TesKlinik</title>
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
					<form class="navbar-form navbar-right" action="search-pembayaran.php" method="POST">
						<div class="input-group">
							<input type="text" name="keyword" value="" class="form-control" placeholder="Search Data ..." autocomplete="off" autofocus>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary" name="cari">Search</button>
							</span>
						</div>
					</form>		
						<br>
					<h3 class="page-title">Pencarian Data Pembayaran</h3>

							<!-- TABLE HOVER -->
							<div class="panel">

								<div class="panel-heading">
									<div class="row">
										<div class="col-md-6">
											<h6 class="panel-title">
												<div class="alert alert-info">Hasil Pencarian : <?php echo $keyword;?>		
												</div>
											</h6>
										</div>
										<div class="col-md-12">
											<?php if (empty($semuadata)): ?>
											<div class="alert alert-danger">Pencarian data "<?php echo $keyword;?>" tidak ditemukan</div>
											<?php endif ?>
										</div>
									</div>			
								</div>

								<div class="panel-body">	
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>No.</th>
												<th>Tanggal Pembayaran</th>
												<th>Nama Pasien</th>
												<th>Nama Dokter</th>
												<th>Spesialis</th>
												<th>Jasa Dokter</th>
												<th>Biaya Obat</th>
												<th>Total Pembayaran</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>

											<?php $no=1;?>
											<?php foreach ($semuadata as $key => $value): ?>
												
											
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo $value["tanggal_bayar"]; ?></td>
												<td><?php echo $value["nama_pasien"]; ?></td>
												<td><?php echo $value["nama_dokter"]; ?></td>
												<td><?php echo $value["spesialis"]; ?></td>
												<td>Rp. <?php echo number_format($value["tarif"]); ?></td>
												<td>Rp. <?php echo number_format($value["biaya_resep"]); ?></td>
												<td>Rp. <?php echo number_format($value["total_bayar"]); ?></td>
												<td>
													<a href="print-pembayaran.php?id=<?php echo $value['id_bayar']; ?>" class="btn btn-warning"><i class="fa fa-print"></i> </a>
													<a href="detail-pembayaran.php?id=<?php echo $value['id_bayar']; ?>" class="btn btn-info"><i class="fa fa-info"></i></a>
												</td>
												
											</tr>
											<?php $no++;  ?>
											<?php endforeach ?>
										</tbody>				
									</table>
									<a href="data-biaya.php" class="btn btn-default btn-lg"><i class="">Cancel</i></a>
								</div>
							</div>
					</div>
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