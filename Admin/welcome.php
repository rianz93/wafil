
<?php 


	$sqldatalokasi 		= "	SELECT * FROM location 
							WHERE user_id = '$kode_id'";
 	$ambildatalokasi 	= $conn 			-> query($sqldatalokasi);
 	$data_lokasi 		= $ambildatalokasi  -> fetch_assoc();

 	// mengambil latitude dan longtitude toko
 	$latitude 			= $data_lokasi['latitude_location'];
 	$longtitude 		= $data_lokasi['longtitude_location'];

 ?>
	
	<div class="nama_toko">
		<h3 class="text-uppercase">Toko <?php echo $data_toko['user_first_name'] ; ?></h3>
	</div>
		
	<hr >

	<!-- container map -->
	<div id="map">
	</div>

	<?php include 'map.php'; ?>
