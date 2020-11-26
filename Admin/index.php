<?php require_once("configuration.php"); 
session_start();
$_SESSION['user_id']  =   "200506006";

$kode_id              =   $_SESSION['user_id'];
$sqldatatoko          =   "SELECT * FROM user
                           WHERE user_id = '$kode_id'";
$ambildatatoko        =   $conn          ->  query($sqldatatoko);
$data_toko            =   $ambildatatoko ->  fetch_assoc();

$sqldatalokasi        =   " SELECT * FROM location 
                            WHERE user_id = '$kode_id'";
$ambildatalokasi      =   $conn             -> query($sqldatalokasi);
$data_lokasi          =   $ambildatalokasi  -> fetch_assoc();

  // mengambil latitude dan longtitude toko
$latitude             =   $data_lokasi['latitude_location'];
$longtitude           =   $data_lokasi['longtitude_location'];

$profilSql            =   " SELECT * FROM user
                            WHERE user_id = '$kode_id' ";
$profildata           =   $conn         -> query($profilSql);
$ambilprofildata      =   $profildata   -> fetch_assoc();
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wafil </title>
    <!-- ICON WAFIL -->
    <link rel="icon" href="assets/drawable/logo.png">
	   <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
  
</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Vendor</a> 
            </div>
<div style="
color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;
display: flex;">  
<h5  class="" style="margin-right: 10px" ><strong> SALDO : </strong> Rp <?php echo number_format($data_toko['user_balance'],2,'.','.'); ?> </h5>

<button class="btn btn-primary square-btn-adjust" style="margin-right: 10px" onclick="openForm()" >Top Up</button>

<!-- FORM TOP UP -->
<div class="form-popup" id="topUpForm">
  <form action="topupVendor.php?id=<?php  echo $kode_id; ?>" class="form-container" method="POST" onsubmit="return validateTopUp()">
    <h3 align="center">TOP UP</h3>

    <label for="nama_user" style="color:  #000000;">Nama</label>
    <p name="nama_user" style="color:  #000000; margin-top: -15px"><?php echo $data_toko['user_first_name']; ?></p>
    
    <label for="nominal_topup" style="color:  #000000;" ><b>Masukan Nominal</b></label>
    <input type="number" placeholder="Cth: 20000" name="nominal_topup" id="nominal_topup" required>
    <div style="color: #ff0000; margin-top: -20px; margin-bottom: 20px;" id="errorTopUp"></div>

    <button type="submit" class="btn btn-primary">Permintaan Top Up</button>

    <button type="button" class="btn cancel" onclick="closeForm()">Tutup</button>
  </form>
</div>

<a href="Login.php" class="btn btn-danger square-btn-adjust">Logout</a>

 </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li><a  href="index.php?halaman=profile"><i class="fa fa-dashboard fa-3x"></i> Profile</a></li>
                     
                    <li><a  href="index.php?halaman=produk"><i class="fa fa-dashboard fa-3x"></i> Produk</a></li>

                    <li><a  href="index.php?halaman=order"><i class="fa fa-dashboard fa-3x"></i> Order</a></li>

                     
                    
                         
                </ul>
               
            </div>
            
        </nav>  

        <!-- /. NAV SIDE  -->
        
        <div id="page-wrapper" >

            <div id="page-inner"  >
              
            <?php 
               if (isset($_GET['halaman'])) {
                   if ($_GET['halaman']=="profile") {           
                       include 'profile.php';
                   }
                   elseif ($_GET['halaman']=="produk") {
                       include 'produk.php';
                   }
                   elseif ($_GET['halaman']=="order") {
                        include 'order.php';
                    }
                   elseif ($_GET['halaman']=="produk_tambah") {
                        include "input_product.php";
                    }
                   elseif ($_GET['halaman']=="produk_edit") {
                        include "produk_edit.php";
                    }
                   elseif ($_GET['halaman']=="orderdetail") {
                        include "orderDetail.php";
                   }
                   
               }
               else{
                include 'welcome.php';
               }
              ?>
                
              </div>

             <!-- /. PAGE INNER  -->
             </div>
            
         <!-- /. PAGE WRAPPER  -->

        </div>
     <!-- /. WRAPPER  -->
    

    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

    
     
    <!-- map key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkPuqqypzKAmNSLLbwNg8yOX6dWfTPQm4&callback=initMap"
    async defer></script>
    
    <script>
      function openForm() {
        document.getElementById("topUpForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("topUpForm").style.display = "none";
      }   

      function validateTopUp() {
        var minimumTopUp = 10000;
        var nominalTopUp = document.getElementById("nominal_topup");
   
        if(nominalTopUp.value<minimumTopUp){
            nominalTopUp.style.border = "1px solid red";
            document.getElementById('errorTopUp').textContent = "Minimal top up harus Rp.10.000!";
            document.getElementById('errorTopUp').focus();
            return false;
        }
        
      }

      function openTambahProduk(){
        document.getElementById("form-tambah").style.display = "block";
      }

      function closeTambahProduk(){
         document.getElementById("form-tambah").style.display = "none";
      }
    </script>
  
</body>
</html>
