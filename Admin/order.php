<?php 
	$sqlorder 		="	SELECT DISTINCT `id_user` 
						FROM `shopping_cart` WHERE `id_service_product` 
						LIKE '$kode_id%' 
						AND `shopping_cart_status` = 2 ";

	$sqlorderOP		=" 	SELECT DISTINCT `id_user` 
						FROM `shopping_cart` WHERE `id_service_product` 
						LIKE '$kode_id%' 
						AND `shopping_cart_status` = 3";

	$fetchOrder  	= $conn -> query($sqlorder);
	$fetchOrderOP  	= $conn -> query($sqlorderOP);

 ?>

 
 

 <div class="informasiToko">
 	<form action="" name="" method="POST">
 		<h4>Order Aktif</h4>
 		<div class="">
 		<table class="table table-dark" style="width: 80%;" >
			<thead>
				<tr>
					<th style="width: 65px;">NO</th>
					<th>ID USER</th>
					<th>STATUS</th>
					<th>Aksi</th>
			</thead>
				</tr>
				<?php 
				$i=1;
				while($simpanOrder = $fetchOrder->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $simpanOrder['id_user']; ?></td>
					<td>Belum Dikonfirmasi</td>
					<td><button class="btn btn-success" formaction="index.php?halaman=orderdetail&id_user=<?php echo $simpanOrder['id_user']; ?>&status=2">Lihat Detail</button></td>
				</tr>
				<?php $i++;} ?>
		</table>
		</div>
 	</form>
 </div>



  <div class="informasiToko">
 	<form action="" name="" method="POST">
 		<h4>Order On Process</h4>
 		<div class="">
 		<table class="table table-dark" style="width: 80%;" >
			<thead>
				<tr>
					<th style="width: 65px;">NO</th>
					<th>ID USER</th>
					<th>STATUS</th>
					<th>Aksi</th>
			</thead>
				</tr>
				<?php 
				$i=1;
				while($simpanOrderOP = $fetchOrderOP->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $simpanOrderOP['id_user']; ?></td>
					<td>On Process</td>
					<td><button class="btn btn-success" formaction="index.php?halaman=orderdetail&id_user<?php echo $simpanOrderOP['id_user']; ?>&status=3">Lihat Detail</button></td>
				</tr>
				<?php $i++;} ?>
		</table>
		</div>
 	</form>
 </div>

  <div class="informasiToko">
 	<form action="" name="" method="POST">
 		<h4>Order Selesai</h4>
 		<div class="">
 		<table class="table table-dark" style="width: 80%;" >
			<thead>
				<tr>
					<th style="width: 65px;">NO</th>
					<th>ID USER</th>
					<th>STATUS</th>
					<th>Aksi</th>
			</thead>
				</tr>
				<?php 
				$i=1;
				while($simpanOrderOP = $fetchOrderOP->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $simpanOrderOP['id_user']; ?></td>
					<td>On Process</td>
					<td><button class="btn btn-success" formaction="index.php?halaman=orderdetail&id_user<?php echo $simpanOrderOP['id_user']; ?>&status=3">Lihat Detail</button></td>
				</tr>
				<?php $i++;} ?>
		</table>
		</div>
 	</form>
 </div>

 <div class="informasiToko">
 	<form action="" name="" method="POST">
 		<h4>Order Cancelled</h4>
 		<div class="">
 		<table class="table table-dark" style="width: 80%;" >
			<thead>
				<tr>
					<th style="width: 65px;">NO</th>
					<th>ID USER</th>
					<th>STATUS</th>
					<th>Aksi</th>
			</thead>
				</tr>
				<?php 
				$i=1;
				while($simpanOrderOP = $fetchOrderOP->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $simpanOrderOP['id_user']; ?></td>
					<td>On Process</td>
					<td><button class="btn btn-success" formaction="index.php?halaman=orderdetail&id_user<?php echo $simpanOrderOP['id_user']; ?>&status=3">Lihat Detail</button></td>
				</tr>
				<?php $i++;} ?>
		</table>
		</div>
 	</form>
 </div>