<?php 
	$ambil = $conn->query("	SELECT DISTINCT name_category_product 
							FROM product  
							WHERE user_id = '$kode_id'");
 ?>
 <div style="display: flex; justify-content: space-between;">

	<h2 align="center">KATEGORI PRODUK</h2>
	<button style="height: 50px; margin-top:10px;" class="btn btn-primary" onclick="openTambahProduk()">TAMBAH PRODUK</button>

</div>

<hr>
	
	

<div class="produk_katalog" >

	<?php while($pecah = $ambil->fetch_assoc()){  ?>
			<a href="index.php?halaman=produk_edit&id=<?php echo $kode_id?>&nama_product=<?php echo $pecah['name_category_product']; ?>">
				<img class = "image_produk" src="assets/img/<?php echo $pecah['name_category_product']; ?>.png" alt="" >
			</a>
	<?php } ?>

</div>


	

<!-- FORM TAMBAH PRODUK -->
<div class="form-tambah" id="form-tambah" style="
	background: #ADD8F1; 
	margin-top: 10px;
	padding-bottom:5px; 
	padding-top: 5px; 
	width: 	50%; 
	border-radius:20px"  align="center">

<h2 align="center">TAMBAH PRODUK</h2>
<form role="form" id="formInput" method="POST" style="height: 320px; width: 480px;" align="center">
	<div class="form-group form-group-lg has-feedback">
		 <label for="name_product">MERK PRODUK</label>
		 <select name="name_category_product" id="" class="form-control select">
		 	<option value="AQUA">AQUA</option>
		 	<option value="AKE">AKE</option>
		 	<option value="CLUB">CLUB</option>
		 	<option value="PRIMA">PRIMA</option>
		 	<option value="DEPOT">DEPOT</option>
		 </select>

		 <label for="form_isi_ulang" style="margin-top: 10px;">ISI ULANG</label>
		 <div id="form_isi_ulang" style="display: flex; justify-content: space-between;">
		 
			 <input type="number" name="harga_isi_ulang" id="harga_isi_ulang" class="form-control textbox harga_input" placeholder="Harga Isi Ulang" style="margin-right: 4px;">
			 
			 <input type="number" name="quantity_isi_ulang" id="quantity_isi_ulang" class="form-control textbox harga_input" placeholder="Quantity Isi Ulang" >

			 <input type="hidden" name="id_product" id="id_product" value="<?php echo $kode_id;?>">

		 </div>
		 <label for="form_galon" style="margin-top: 10px;">GALON</label>
		 <div id="form_galon" style="display: flex; justify-content: space-between;">
			  <input type="number" name="harga_galon" id="harga_galon" class="form-control textbox harga_input" placeholder="Harga Galon" style="margin-right: 4px;">
			 
			 <input type="number" name="quantity_galon" id="quantity_galon" class="form-control textbox harga_input" placeholder="Quantity Galon">
			 
		 </div>
	 </div>



	<button type="submit" style="margin-bottom: 10px" name="btn-simpan" class="btn btn-primary btn-block" formaction="insert_input_product.php">Tambah</button>
	<button class="btn btn-danger btn-block" onclick="closeTambahProduk()">Tutup</button>

</form>
	
</div>




<!-- <br>
<button style="margin-bottom: 7px " class="btn btn-primary" onclick="location.href='index.php?halaman=produk_tambah'">TAMBAH PRODUK</button>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID PRODUK</th>
			<th>NAMA PRODUK</th>
			<th>EXPIRE</th>
			<th>GAMBAR </th>
			<th>KUANTITAS</th>
			<th>HARGA</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil = $conn->query("SELECT * FROM product");
		$i = 1;
		while($pecah = $ambil->fetch_assoc()){;
		 
		 ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $pecah['id_product']; ?></td>
			<td><?php echo $pecah['name_product']; ?></td>
			<td><?php echo $pecah['expired_date']; ?></td>
			<td><?php echo $pecah['product_pic']; ?></td>
			<td><?php echo $pecah['quantity']; ?></td>
			<td><?php echo "Rp.".number_format($pecah['price'],2,'.','.'); ?></td>
			
			<td><a class="btn btn-info" href="index.php?halaman=produk_edit&id=<?php echo $pecah['id_product'];?>">edit</a></td>
		</tr>
	<?php $i++;} ?>
	</tbody>
</table> -->