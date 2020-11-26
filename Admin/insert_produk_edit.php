<?php 
	require_once("configuration.php");

if ($_SERVER['REQUEST_METHOD'] =='POST'){

		$id_product   =   $_GET['id'];
		$quantity     =   $_POST[$id_product.'quantity'];
		$price        =   $_POST[$id_product.'price'];

		
		$sql = "   UPDATE product 
                   SET     quantity    =   '$quantity',     
                           price       =   '$price' 
                   WHERE   id_product  =   '$id_product' ";


		if ( mysqli_query($conn, $sql) ) {
                $result["success"] = "1";
                $result["message"] = "success";

                echo json_encode($result);
                mysqli_close($conn);

                $kembali = '&id='.$_POST['header_userID'].'&nama_product='.$_POST['header_kategori'];


                echo "  <script type='text/javascript'>
                        alert('Berhasil memasukkan produk!');
                        document.location='index.php?halaman=produk_edit';
                        </script>";

                header('Location: index.php?halaman=produk_edit'.$kembali.'&berhasil=1'.'');
    		    exit();

        }else {

                $result["success"] = "0";
                $result["message"] = "error";

                echo json_encode($result);
                mysqli_close($conn);
        }
	}


 ?>