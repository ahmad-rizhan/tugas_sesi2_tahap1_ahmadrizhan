<?php
session_start();
include 'koneksi.php';
 $ambil=$koneksi->query("SELECT * FROM obat WHERE id_obat='$_GET[id]'");
	 $pecah=$ambil->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
	<title>Update - Obat | TesKlinik</title>
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
									<h3 class="" style="text-align: center;">Update Obat</h3>
								</div>

								<div class="panel-body">
									<form class="" action="" method="post">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-font"></i></span>
											<input class="form-control" value="<?php echo $pecah['nama_obat']; ?>" type="text" name="nama_obat">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-medkit"></i></span>
											<select class="form-control" name="kategori">
												<option value="Kapsul"  <?php if (isset($kategori) && $kategori=="Kapsul") echo "selected";?>>Kapsul</option>
												<option value="Pil"  <?php if (isset($kategori) && $kategori=="Pil") echo "selected";?>>Pil</option>
												<option value="Sirup"  <?php if (isset($kategori) && $kategori=="Sirup") echo "selected";?>>Sirup</option>
												<option value="Tetes"  <?php if (isset($kategori) && $kategori=="Tetes") echo "selected";?>>Tetes</option>
												<option value="Antibiotik"  <?php if (isset($kategori) && $kategori=="Antibiotik") echo "selected";?>>Antibiotik</option>
										</select>
										</div>
							
										<br>

										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-usd"></i></span>
											<input class="form-control" value="<?php echo $pecah['harga_obat']; ?>" name="harga_obat" type="text">
										</div>
										<br>

										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-folder-open-o"></i></span>
											<input class="form-control" value="<?php echo $pecah['stok']; ?>" name="stok" type="text">
										</div>
										<br>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-align-left"></i></span>
											<textarea placeholder="<?php echo $pecah['keterangan']; ?>" class="form-control" value="<?php echo $pecah['keterangan']; ?>" rows="4" name="keterangan"></textarea>
										</div>
										<br>
				
										<div class="button-group">
											
												<button name="update" class="btn btn-default"><i class="fa fa-pencil"></i> Update</button>
												<a href="data-obat.php" class="btn btn-primary"><i class="fa fa-times-circle"></i> Cancel</a>
										</div>
									</form>
																	
										<?php
											if (isset($_POST['update'])) 
											{
												
												$koneksi->query("UPDATE obat SET 
													nama_obat='$_POST[nama_obat]',
													kategori='$_POST[kategori]',
													harga_obat='$_POST[harga_obat]',
													stok = '$_POST[stok]',
													keterangan = '$_POST[keterangan]'
													WHERE id_obat='$_GET[id]'");
												
												
												echo "<script> alert('Data Obat berhasil diubah');</script>";
												echo "<script>location='data-obat.php';</script>";
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
