<?php  
$id_user 			  = $_GET['id_user'];
$shopping_cart_status = $_GET['status'];
 
$sqlorderDET = "SELECT * FROM `shopping_cart` 
				WHERE `id_service_product` 
				LIKE '$kode_id%'
				AND `id_user` 				= '$id_user' 
				AND `shopping_cart_status`  = '$shopping_cart_status'";
$fetchDET 	 = $conn -> query($sqlorderDET);
$fetchLOC	 = $conn -> query($sqlorderDET);	

$sqltableDET = "SELECT * FROM `shopping_cart` 
				INNER JOIN product on 
				shopping_cart.id_service_product = product.id_product
				WHERE `id_service_product`
				LIKE '$kode_id%'
				AND `id_user` 				= '$id_user' 
				AND `shopping_cart_status`  = '$shopping_cart_status'
				";
$fetchtableDET 	= $conn 		 -> query($sqltableDET);





$simpanLOC = $fetchLOC -> fetch_assoc();

?>
<div id="map">	
</div>
<div>
	<form action="">
	<h4>Item List</h4>
	<table class="table table-dark">
	<thead>
		<tr>
			<th>NO</th>
			<th>Merk</th>
			<th>Jenis</th>
			<th>Harga</th>
			<th>Quantity</th>
		</tr>
	</thead>
	<?php
	$i 			= 1;
	$subtotal   = 0;
	while($simpantableDET = $fetchtableDET -> fetch_assoc()){
	 ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $simpantableDET['name_category_product']; ?></td>
		<td><?php echo $simpantableDET['name_product']; ?></td>
		<td><?php echo $simpantableDET['price']; ?></td>
		<td><?php echo "X".$simpantableDET['shopcart_qty']; ?></td>
	</tr>
	<?php $i++;
		  $subtotal = $subtotal+($simpantableDET['price']*$simpantableDET['shopcart_qty']);
		  
	} 
	$delivery 		= 5000;
	$delivery		= ceil($delivery+($subtotal/40));
	$subtotal 		= $subtotal+$delivery;

	?>
	</table>
	</form>

	<p style="margin-top: -23px; margin-left: 10px;" align="left">
		<strong>
			<?php echo "Harga Pengantaran&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp; &nbsp;".$delivery; ?>
		</strong>
	</p>
	<p style="margin-top: -23px; margin-left: 10px;" align="left">
		<strong>
			<?php echo "SUBTOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; ".$subtotal; ?>
		</strong>
	</p>
	
	

	<button class="btn btn-success" style="width: 200px; margin-left: 10px;">Terima Pesanan</button>
	<br>
	<button class="btn btn-danger" style="width: 200px; margin-left: 10px; margin-top: 10px;">Cancel Pesanan</button>
</div>
<?php include 'mapRoute.php' ?>