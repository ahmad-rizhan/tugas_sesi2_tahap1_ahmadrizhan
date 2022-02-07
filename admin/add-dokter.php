<?php 
	
	$koneksi = new PDO("mysql:host=localhost;dbname=medis", "root", "");

	function fill_unit_select_box($koneksi)
	{
		$output = '';
		$query = "SELECT * FROM poliklinik ORDER BY nama_poli ASC";
		$statement = $koneksi -> prepare($query);
		$statement -> execute();
		$result = $statement->fetchAll();
		foreach ($result as $row)
		{
			$output .= '<option value="'.$row["nama_poli"].'">'.$row["nama_poli"].'</option>';
		}
		return $output;
	}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Tambah Pasien | by. Klorofil - Free Bootstrap Dashboard Template</title>
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
				<a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
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
						<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						

						<li><a href="page-profile.php" class=""><i class="fa fa-user-circle"></i> <span>Admin</span></a></li>

						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Data User</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="data-pasien.php" class="">Data Pasien</a></li>
									<li><a href="data-dokter.php" class="">Data Dokter</a></li>
									<li><a href="data-petugas.php" class="">Data Petugas</a></li>
								</ul>
							</div>
						</li>

						<li><a href="data-poli.php" class=""><i class="fa fa-h-square"></i> <span>Data Poli</span></a></li>

						<li><a href="data-obat.php" class=""><i class="fa fa-plus-square"></i> <span>Data Obat</span></a></li>

						<li><a href="data-biaya.php" class=""><i class="fa fa-usd"></i> <span>Data Biaya</span></a></li>

						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
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
					<h3 class="page-title">Tambah Dokter</h3>
					<div class="row">
		<!-- INPUT GROUPS -->
							<div class="panel">
								<div class="panel-body">
									<a href="data-dokter.php" class="btn btn-primary"><i class="fa fa-times-circle"></i> Cancel</a>

								</div>

								<div class="panel-body">
									<span id="error"></span>
									<form action="" id="insert_form">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-id-badge"></i></span>
										<input class="form-control" placeholder="Kode Dokter" type="text" name="kode_dokter[]">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-font"></i></span>
										<input class="form-control" placeholder="Nama Dokter" type="text" name="nama_dokter[]">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
										<input class="form-control" placeholder="Tanggal Lahir" type="date" name="tgl_lahir[]">
									</div>
									<br>
									

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
										<textarea class="form-control" placeholder="Masukkan Alamat" rows="4" name="alamat_dokter[]"></textarea>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										<input class="form-control" placeholder="Telepon" type="text" name="telepon_dokter[]">
									</div>
									<br>
								
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-usd"></i></span>
										<input class="form-control" placeholder="tarif" type="text" name="tarif[]">
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-usd"></i></span>
										
										<select name="nama_poli[]" class="form-control">
											<option value="">Pilih Nama Poli</option>
											<?php echo fill_unit_select_box($koneksi);?>
										</select> 
									</div>


									<br>
									<div class="input-group">
										
											<button class="btn btn-success" name="save"><i class="fa fa-check-circle"></i> Save</button>
											
									</div>
								</form>
								<script>
									$(document).ready(function(){
										$('##insert_form').on('save',function(event){
											event.preventDefault();
											var error = '';
											$('.kode_dokter').each(function(){
												var count = 1;
												  if ($(this).val() == '') {
												  	error = "<p>Masukkan Kode Dokter</p>";
												  	return false;
												  }
											});
											$('.nama_dokter').each(function(){
												var count = 1;
												if ($(this).val() == '') {
												  	error = '<p>Masukkan Nama Dokter "+count+"</p>';
												  	return false;
												  }
											});
											$('.tgl_lahir').each(function(){
												var count = 1;
												  if ($(this).val() == '') {
												  	error = "<p>Masukkan Tanggal Lahir</p>";
												  	return false;
												  }
												  count = count + 1;
											});
											$('.alamat_dokter').each(function(){
												var count = 1;
												  if ($(this).val() == '') {
												  	error = "<p>Masukkan Alamat Dokter</p>";
												  	return false;
												  }
											});
											$('.telepon_dokter').each(function(){
												var count = 1;
												  if ($(this).val() == '') {
												  	error = "<p>Masukkan Telepon Dokter</p>";
												  	return false;
												  }
											});
											$('.tarif').each(function(){
												var count = 1;
												  if ($(this).val() == '') {
												  	error = "<p>Masukkan Tarif</p>";
												  	return false;
												  }
											});
											$('.nama_poli').each(function(){
												var count = 1;
												  if ($(this).val() == '') {
												  	error = "<p>Pilih Nama Spesialis</p>";
												  	return false;
												  }
											});

											var form_data = $(this).serialize();
											if (error == '')
											{
												$.ajax({
													url: "insert-dokter.php",
													method:"POST",
													data : form_data,
													success:function(data) {
														if (data == ok) {
															$('error').html('<div class="alert alert-succes">Data Tersimpan</div>');
														}
													}
												});
											}
											else
											{
												$('#error').html('<div class="alert alert-danger">' +error+'</div>');
											}
										});
									});
								</script>
								</div>
							</div>
							<!-- END INPUT GROUPS -->
							</div>
	

			</div>
			<!-- END MAIN CONTENT -->
			
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
