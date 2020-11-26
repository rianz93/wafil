<?php 
	require_once("configuration.php");

	if ($_SERVER['REQUEST_METHOD'] =='POST'){

		$user_id 				= 	$_POST['id_product'];
		$name_category_product 	= 	$_POST['name_category_product'];
		

		$autoincrement = implode("",mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) from product 				where user_id = '$user_id'")));

		$cek_isi_ulang = $conn -> query("SELECT * FROM `product` 
										 WHERE 	`user_id`				= '$user_id' 
										 AND 	`name_product` 			= 'Isi Ulang' 
										 AND 	`name_category_product` = '$name_category_product'");


		$cek_galon 	   = $conn -> query("SELECT * FROM `product` 
										 WHERE 	`user_id`				= '$user_id' 
										 AND 	`name_product` 			= 'Isi Ulang + Galon' 
										 AND 	`name_category_product` = '$name_category_product'");

		

		$id_product 		= 	$user_id.sprintf("%03d",$autoincrement+1);
		$count_isi_ulang 	= 	mysqli_num_rows($cek_isi_ulang);
		$count_galon 		= 	mysqli_num_rows($cek_galon);

		$harga_isi_ulang 	= 	$_POST['harga_isi_ulang'];
		$quantity_isi_ulang = 	$_POST['quantity_isi_ulang'];


		$harga_galon 		= 	$_POST['harga_galon'];
		$quantity_galon 	= 	$_POST['quantity_galon'];

		$message     		=	"";
		$message2			=	"";

		if (empty($harga_isi_ulang) || empty($quantity_isi_ulang) ){ 
				$count_isi_ulang++;
				$message 		= "Anda tidak mengisi kategori isi ulang ";
		}
		if (empty($harga_galon) || empty($quantity_galon) ) {
				$count_galon++;
				$message2		= "Anda tidak mengisi kategori galon ";
		}


	$sql_isi_ulang = "	INSERT INTO product
						VALUES ('$id_product', 		
								'$name_category_product',
								'Isi Ulang',   		
								'$quantity_isi_ulang',
								'$harga_isi_ulang', 
								'$user_id')";

		
	if ($count_isi_ulang == 0) {
		if ( mysqli_query($conn, $sql_isi_ulang) ) {
	        $result["success"] = "1";
	        $result["message"] = "success";

	      	$id_product 	   = $user_id.sprintf("%03d",$autoincrement+2);

	      	echo json_encode($result);
    	} 
	}else {
			$message = $message."Anda telah memasukkan kategori Isi ulang";
			echo "<script type='text/javascript'>alert('$message');</script>";
	}

	$sql_galon = "	INSERT INTO product 
					VALUES ('$id_product', 
							'$name_category_product',
							'Isi Ulang + Galon', 
							'$quantity_galon', 
							'$harga_galon', 
							'$user_id')";

	if ($count_galon == 0) {
		if (mysqli_query($conn, $sql_galon)) {

    		$result["success"] = "1";
	        $result["message"] = "success";

	        echo json_encode($result);
			mysqli_close($conn); 	
		}
	}else{
		$message2 = $message2."Anda telah memasukkan kategori Galon";
		echo "<script type='text/javascript'>alert('$message2');</script>";
	}
    	
	
	// header("Location: index.php?halaman=produk",true,);	
	echo "	<script type='text/javascript'>
			alert('Berhasil memasukkan produk!');
			document.location='index.php?halaman=produk';
			</script>	";
   		
	}


 ?>