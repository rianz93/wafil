<div class="form-tambah" style="background: lightblue; margin-top: 10px; padding-bottom: 5px
; padding-top: 5px; width: 	50%; border-radius: 20px "  align="center">
<h2 align="center">TAMBAH PRODUK</h2>
	


	

<form role="form" id="formInput" method="POST" style="height: 280px; width: 480px">
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
			 
			 <input type="number" name="quantity_isi_ulang" id="quantity_isi_ulang" class="form-control textbox harga_input" placeholder="Quantity Isi Ulang">

			 <input type="hidden" name="id_product" id="id_product" value="<?php echo $kode_id;?>">

		 </div>
		 <label for="form_galon" style="margin-top: 10px;">GALON</label>
		 <div id="form_galon" style="display: flex; justify-content: space-between;">
			  <input type="number" name="harga_galon" id="harga_galon" class="form-control textbox harga_input" placeholder="Harga Galon" style="margin-right: 4px;">
			 
			 <input type="number" name="quantity_galon" id="quantity_galon" class="form-control textbox harga_input" placeholder="Quantity Galon">
		 </div>
	 </div>



	<button type="submit" style="margin-bottom: 10px" name="btn-simpan" class="btn btn-primary btn-block" formaction="insert_input_product.php">Tambah</button>

</form>
	
</div>

	
