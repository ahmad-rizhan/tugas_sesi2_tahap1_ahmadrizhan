
<?php
include 'koneksi-user.php';
?>

<!doctype html>
<html lang="en">

<head>
	<title>Add-Pasien | TesKlinik</title>
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
			.row {
				padding: 30px 100px;
				margin: 25px 100px;
				
			}
			.col-md-12{
				background-color: #fff;
				padding-top: 20px;
				padding-bottom: 20px;
				padding-left: 75px;
				padding-right: 75px;
				border-radius: 15px;
				-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			}
			
			h1{
				text-align: center;
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

			<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="panel-body">
							<div style="padding-top: 0; padding-bottom: 15px;" class="user text-center">
										<img style="width: 100px; height: 100px;" src="../admin/assets/img/pasien.png" class="image-circle" alt="Avatar">
							</div>

							<form class="" method="post" action="">
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-font"></i></span>
										<input class="form-control" placeholder="Nama Pasien" type="text" name="nama_pasien" autocomplete="off" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
										<input class="form-control" placeholder="Tanggal Lahir" type="date" name="lahir_pasien" required>
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-male"></i></span>
										<input class="form-control" placeholder="Keluarga Pasien" type="text" name="keluarga_pasien" autocomplete="off" required>
									</div>
									<br>
									
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
										<textarea class="form-control" placeholder="Masukkan Alamat" rows="4" name="alamat_pasien" required></textarea>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
										<select class="form-control" name="jk_pasien" required>
											<option value="L">Laki-laki</option>
											<option value="P">Perempuan</option>
									</select>
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
										<input class="form-control" placeholder="Telepon" type="text" name="telepon_pasien" autocomplete="off" required>
									</div>
									<br>			
									<div  class="user text-right">
										<a href="data-pasien.php" class="btn btn-default"><i class="fa fa-database"></i></a>	
										<button name="add" class="btn btn-success"><i class="fa fa-check-circle"></i> Add</button>	
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

			<?php 
									if (isset($_POST['add'])) 
										
									{
										$nama_pasien = $_POST['nama_pasien'];
										$lahir_pasien = $_POST['lahir_pasien'];
										$keluarga_pasien = $_POST['keluarga_pasien'];
										$alamat_pasien = $_POST['alamat_pasien'];
										$jk_pasien = $_POST['jk_pasien'];
										$telepon_pasien = $_POST['telepon_pasien'];
										

										$sql = mysqli_query($koneksi, "INSERT INTO pasien
											VALUES(
											' ',
											'$nama_pasien',
											'$lahir_pasien',
											'$keluarga_pasien',
											'$alamat_pasien',
											'$jk_pasien',
											'$telepon_pasien')");
										if ($sql) {
											echo "<script>
		                      						alert('Selamat anda berhasil menambahkan data');
		                      						document.location.href = 'data-pasien.php';
                    							</script>";
										}
										else{
										echo "gagal";
										echo "<br>". mysqli_error($koneksi);
									  }	
								 }

								?>


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
