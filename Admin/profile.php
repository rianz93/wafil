<?php 


	$sqldatalokasi 		= "	SELECT * FROM location 
							WHERE user_id = '$kode_id'";
 	$ambildatalokasi 	= $conn 			-> query($sqldatalokasi);
 	$data_lokasi 		= $ambildatalokasi  -> fetch_assoc();

 	// mengambil latitude dan longtitude toko
 	$latitude 			= $data_lokasi['latitude_location'];
 	$longtitude 		= $data_lokasi['longtitude_location'];

 	$profilSql 			= "	SELECT * FROM user
 							WHERE user_id = '$kode_id' ";
 	$profildata			= $conn 		-> query($profilSql);
 	$ambilprofildata	= $profildata 	-> fetch_assoc();						

 ?>

<h2>PROFILE</h2>
<hr>
	
	<!-- container map -->
	<div id="map">
	</div>
<div class="smallDet">
	<p>|Tanggal Terdaftar : <?php echo $ambilprofildata['date_in']; ?>|</p>
	<p>|Rating : 0 out of 0 |</p>
	<p>|Transaksi berhasil : 0 out of 0 |</p>
</div>
<div class="informasiToko" align="left">
	<h4>INFORMASI TOKO</h4>
	<div class="isiInformasi" align="left">
		<p>Nama Toko &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $ambilprofildata['user_first_name']; ?></p>
		<p>Alamat Toko &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $ambilprofildata['address']; ?></p>

	</div>
</div>
<div class="informasiToko" align="left">
	<h4>KONTAK</h4>
	<div class="isiInformasi" align="left" style="">
		<p>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $ambilprofildata['user_name']; ?></p>
		<p>Nomor Telepon &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $ambilprofildata['phone_num_user']; ?></p>
	</div>
</div>

<?php include 'map.php'; ?>