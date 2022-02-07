<?php
 
 if (isset($_POST["nama_dokter"])) 
 {
 		
	$koneksi = new PDO("mysql:host=localhost;dbname=medis", "root", "");
	$kode_dokter = uniqid();
	
	for ($count=0; $count < count($_POST["kode_dokter"]); $count++)
	{ 
		$query = "INSERT INTO dokter (kode_dokter, nama_dokter, tgl_lahir, alamat_dokter, telepon_dokter, tarif, nama_poli)
		VALUES (:kode_dokter, :nama_dokter, :tgl_lahir, :alamat_dokter, :telepon_dokter, :tarif, :nama_poli)";

		$statement = $koneksi -> prepare($query);
		$statement->execute(
			array(
					':kode_dokter'	=> $_POST["kode_dokter"][$count],
					':nama_dokter'	=> $_POST["nama_dokter"][$count],
					':tgl_lahir'	=> $_POST["tgl_lahir"][$count],
					':alamat_dokter'	=> $_POST["alamat_dokter"][$count],
					':telepon_dokter'	=> $_POST["telepon_dokter"][$count],
					':tarif'	=> $_POST["tarif"][$count]
					)
				);
			}
			$result = $statement->fetchAll();
			if (isset($result)) 
			{
				echo "oke";
			}
 }
?>