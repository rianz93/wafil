
<?php 
	$id 		 = $_GET['id'];
	$nama_produk = $_GET['nama_product'];
	$ambil 		 = $conn->query("SELECT * FROM product 
								WHERE `user_id`               = '$id' 
								AND   `name_category_product` = '$nama_produk'");

	if (isset($_GET['berhasil'])) echo "<script>alert('Data berhasil di ubah!');</script>";
	
 ?>


<style>
	.gambar_edit{
		height:45px;
		width: 45px;
		border: 1px solid blue;
		border-radius:10px;
		
	}

</style>

<h2 align="center">EDIT PRODUK </h2>

<div class="container" style="background: lightblue; margin-top: 30px; padding-bottom: 5px
; padding-top: 5px; border-radius:10px; height: 40%;width :700px;"  align="center">
	
<h3><?php echo 	$nama_produk; ?></h3>
<hr>

<form role="form" id="formInput" method="POST">

<div class="form-group form-group-lg has-feedback">
<?php while($simpan = $ambil->fetch_assoc()){ ?>

<div style="display:flex; justify-content: space-between;">
	
	<div class="form-group form-group-lg has-feedback">
		<label for="gambar_category" style="width: 50px; font-size: 12px; margin-bottom: 10px; "><?php 
		if($simpan['name_product']=="Isi Ulang + Galon"){
			echo"Galon";
		}else{ 
			echo $simpan['name_product'];
		} ?>
		</label>
		<img class="gambar_edit" src="assets/img/<?php 
		if($simpan['name_product']=="Isi Ulang + Galon"){
			echo"Galon";
			}else{
				echo $simpan['name_product'];
			} ?>.png" name="gambar_category" alt="">

	</div>

	<div class="form-group form-group-lg has-feedback" style="margin-left: 5px" >
		 <label for="quantity">Kuantitas</label>
		 <input type="number" name="<?php echo $simpan['id_product'].'quantity'; ?>" id="quantity" class="form-control textbox" value="<?php echo $simpan['quantity']; ?>">

	</div>

	<div class="form-group form-group-lg has-feedback" style="margin-left: 15px">
		 <label for="price">Harga Rp.</label>
		 <input type="number" name="<?php echo $simpan['id_product'].'price'; ?>" id="price" class="form-control textbox" value="<?php echo $simpan['price']; ?>">
	</div>

	 		

	<button type="submit" name="btn-simpan" class="btn btn-primary" style="height:40px; margin-top: 28px; margin-left: 15px" formaction="insert_produk_edit.php?id=<?php echo $simpan['id_product'] ; ?>">Ubah</button>
</div>
<?php } ?>
	<input type="hidden" name="header_userID" 	value="<?php echo $id; ?>">
	<input type="hidden" name="header_kategori" value="<?php echo $nama_produk; ?>">
</form>
	
</div>
