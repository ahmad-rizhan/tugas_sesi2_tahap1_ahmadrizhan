
<?php
session_start();
include 'koneksi-user.php';

	$keyword = $_POST["keyword"];

	$semuadata=array();
	$ambil = $koneksi->query("SELECT * FROM bayar INNER JOIN pasien ON bayar.id_pasien=pasien.id_pasien
							INNER JOIN dokter ON bayar.id_dokter=dokter.id_dokter WHERE nama_pasien LIKE '%$keyword%' OR nama_dokter LIKE '%$keyword%'");
	while ($pecah=$ambil->fetch_assoc())
	{
		$semuadata[] = $pecah;
	}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Search-Pembayaran | TesKlinik</title>
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
			.xy{
			
			  margin: 0 20px;
			  padding: 10px;
			  background-color: transparent;
			  border: 3px solid transparent;
			  border-radius: 10px;
			
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
				<ul>		
					
					<li><a href="add-pasien.php"><b>Home</b></a></li>
					<li><a href="data-pasien.php">Data Pasien</a></li>
					<li><a href="data-dokter.php">Data Dokter</a></li>
					
					<li><a href="data-pembayaran.php" >Data Pembayaran</a></li>
					<li><a href="logout.php" >Logout</a></li>
				</ul>

				
			<div class="main-content">
				<div class="xy">
					<div class="container-fluid">
					<form class="navbar-form navbar-right" action="search-pembayaran.php" method="POST">
						<div class="input-group">
							<input type="text" name="keyword" value="" class="form-control" placeholder="Search Data ..." style=" background-color: #f3f3f3;" autocomplete="off" autofocus>
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary" name="cari">Search</button>
							</span>
						</div>
					</form>		
					</div>
					</div>
				
								<div class="x">
									<div class="panel-heading">
										<center><b><h2>Pencarian Data Obat</h2></b></center>
										<div class="row">
											<div class="col-md-4">
												<h6 class="panel-title">
												<div class="alert alert-info">Hasil Pencarian : <?php echo $keyword;?></div>
											</div>
											<div class="col-md-12">
												<?php if (empty($semuadata)): ?>
												<div class="alert alert-danger">Pencarian tidak ditemukan</div>
												<?php endif ?>
											</h6>
											</div>	
										</div>
									</div>
								
								<div class="panel-body">	
									<table class="table table-hover">
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
													<a href="print-pembayaran.php?id=<?php echo $pecah['id_bayar']; ?>" class="btn btn-warning"><i class="fa fa-print"></i> </a> | 
													<a href="detail-pembayaran.php?id=<?php echo $pecah['id_bayar']; ?>" class="btn btn-info"><i class="fa fa-info"></i></a>
												</td>
												
											</tr>
											<?php $no++;  ?>
											<?php endforeach ?>
										</tbody>
									
									</table>
									<a href="data-pembayaran.php" class="btn btn-default btn-lg"><i class="">Cancel</i></a>
								</div>
							</div>
						</div>
						<br>

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
