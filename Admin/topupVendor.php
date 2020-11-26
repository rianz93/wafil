<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php 	
require_once("configuration.php"); 
if ($_SERVER['REQUEST_METHOD'] =='POST'){

	$autoincrement 	= 	implode("",mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) from topup ")));	
	$id 			= 	$_GET['id'];
	$nominal 		= 	$_POST['nominal_topup'];
	$id_topup 		= 	'10'.sprintf("%02d",$autoincrement+1);



	$conn->query("	INSERT INTO topup 
					VALUES ('$id_topup',
							'$id',
							'$nominal')	");

		echo "  <script type='text/javascript'>
				alert('Permintaan Top Up anda akan diproses!');
				document.location=('index.php');
				</script>";


}
 ?>
