
<?php
session_start();
	include 'koneksi-user.php';
?>

<!DOCTYPE html>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Welcome User | TesKlinik</title>
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
	<link rel="apple-touch-icon" sizes="76x76" href="../admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../admin/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<?php
			$ambil = $koneksi->query("SELECT * FROM tbl_user 
			INNER JOIN tbl_lvl ON tbl_user.id_level=tbl_lvl.id_level WHERE id_user= '$_GET[id]'"); 
			$detail = $ambil ->fetch_assoc();
		?>

		
		<style type="text/css">
			
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
			tr,td,h2{
				color: blue;

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

			.row {
				padding: 10px 175px;
				margin: 25px 100px;
				
			}
			.col-md-12{
				padding-top: 10px;
				padding-bottom: 10px;
				padding-left: 75px;
				padding-right: 75px;
				border: 3px solid #e3ece7;
				border-radius: 10px;	
			}
			.a{
				text-align: right;
			}
			
		</style>
		
		<ul>		
			
			<li><a href="add-pasien.php"><b>Home</b></a></li>
			<li><a href="data-pasien.php">Data Pasien</a></li>
			<li><a href="data-dokter.php">Data Dokter</a></li>
			
			<li><a href="data-pembayaran.php" >Data Pembayaran</a></li>
			<li><a href="logout.php" >Logout</a></li>
		</ul>
		<div class="vertical-align-wrap">

				<div class="content">
					<div class="row">
						<div class="col-md-12" style="background-color: #e3ecfe;">
							<div class="user text-center">
								<h2 class="name">Welcome User</h2>
									
								<img style="width: 100px; height: 100px;" src="../admin/assets/img/kepsek.png" class="img-circle" alt="Avatar">
								<table class="table table-hover">
									<tr>
										<th>First Name </th>
										<th class="a"> <?php echo $detail['first_name']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Last Name </th>
										<th class="a"> <?php echo $detail['last_name']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Email</th>
										<th class="a"> <?php echo $detail['email']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Phone </th>
										<th class="a"> <?php echo $detail['phone']; ?></th>
									</tr>
									<br>
									<tr>
										<th>Username</th>
										<th class="a"> <?php echo  $detail['user']; ?></th>
									</tr>
								</table>		
							</div>
						</div>
					</div>
				</div>
		
		</div>
	</div>
</div>
	<!-- Javascript -->
	<script src="../admin/assets/vendor/jquery/jquery.min.js"></script>
	<script src="../admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../admin/assets/vendor/toastr/toastr.min.js"></script>
	<script src="..admin/assets/scripts/klorofil-common.js"></script>
	<!-- END WRAPPER -->
</body>

</html>
