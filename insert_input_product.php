<?php 
	require_once("configuration.php");

	if ($_SERVER['REQUEST_METHOD'] =='POST'){

		$random = 11;
		$autoincrement = implode("",mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) from product")));

		$id_product = $random.sprintf("%02d",$autoincrement+1);
		$name_product = $_POST['name_product'];
		$expired_date = $_POST['expired_date'];
		$product_pic = $_POST['product_pic'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];

		$sql = "INSERT INTO product VALUES ('$id_product','$name_product','$expired_date','$product_pic','$quantity','$price')";


		if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);
        header("index.php?halaman=produk");
		exit();
    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($rsult);
        mysqli_close($conn);
    }
	}


 ?>