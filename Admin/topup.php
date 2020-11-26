<?php 
	require_once("configuration.php"); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
	<table class="table table-bordered" style="border-color: solid black; height: 50%; width: 50%;" align="center">
	<thead>
		<tr>
		<th>Nama</th>
		<th>Nominal</th>
		<th>Tombol Verifikasi</th>
		</tr>
	</thead>
	<?php 
		$ambil	= $conn -> query("SELECT user.user_id, user.user_first_name, topup.nominal 
								  FROM topup 
								  inner join user 
								  on topup.user_id = user.user_id");
	 	
	 ?>

	<tr>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<td><?php echo $pecah['user_first_name']; ?></td>
		<td><?php echo $pecah['nominal']; ?></td>
		<td>
			<form action="" method="GET">
			<input type="hidden" name="token" value="<?php echo $pecah['user_id'].'.'.$pecah['nominal']; ?>">
			<button class="btn btn-primary" formaction="http://carexports.uk/wan_api/v1/payment/topUp.php?token=<?php echo $pecah['user_id'].'.'.$pecah['nominal']; ?>">Verifikasi</button>
			</form>
		</td>
		
	</tr>
	<?php } ?>
	</table>
</body>
</html>