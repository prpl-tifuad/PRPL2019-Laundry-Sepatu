
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
       <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaksi</title>
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
                <a class="navbar-brand" >Low's Cleaner</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
        <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
          </li>
        
          
                    <li>
                        <a  href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a   href="Data_Pelanggan.php"><i class="fa fa-desktop fa-3x"></i> Data Pelanggan</a>
                    </li>
               <li  >
                        <a   class="active-menu" href="transaksi.php"><i class="fa fa-bar-chart-o fa-3x"></i>Transaksi</a>
                    </li> 
          
                
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Hallo para Admin Laundry Sepatu </h5>
                    </div>
                </div> 

                <div class="container">
    <div class="content">
      
      <hr />
       

      
      <!-- bagian ini untuk memfilter data berdasarkan status -->
      <form class="form-inline" method="get">
        <input class="form-control" name="cari"></input>
        <button class="btn btn-danger" type="submit">CARI</button>
      </form> <!-- end filter -->
      <br />
      <!-- memulai tabel responsive -->
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <tr>
            <th>Nama</th>
            <th>Layanan</th>
            <th>Harga</th>
            <th>Jumlah sepatu</th>
            <th>Total</th>
          </tr>
      <?php
        include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $cek = mysqli_query($koneksi, "SELECT pelangan.nama as nama, item_produk.layanan as layanan, item_produk.harga as harga, transaksi.jumlah_sepatu as jumlah_sepatu, transaksi.total as total from transaksi join item_produk on transaksi.kode = item_produk.kode join pelangan on transaksi.id_pelanggan = pelangan.id_pelanggan WHERE pelangan.nama like '%$cari%'"); // query jika filter dipilih
            echo "<button class='btn border-danger' style='margin-bottom:10px;'>Mencari data : $cari</button>";
          }else{
        $cek = mysqli_query($koneksi, "SELECT pelangan.nama as nama, item_produk.layanan as layanan, item_produk.harga as harga, transaksi.jumlah_sepatu as jumlah_sepatu, transaksi.total as total from transaksi join item_produk on transaksi.kode = item_produk.kode join pelangan on transaksi.id_pelanggan = pelangan.id_pelanggan"); // query untuk memilih entri dengan nik yang dipilih
            }while($row = mysqli_fetch_array($cek)){ // fetch query yang sesuai ke dalam array
              $row['total'] = $row['harga']*$row['jumlah_sepatu'];
              echo '
              <tr>
                <td>'.$row['nama'].'</td>
                <td>'.$row['layanan'].'</td>
                <td>'.$row['harga'].'</td>
                <td>'.$row['jumlah_sepatu'].'</td>
                <td>'.$row['total'].'</td>
                <td>';
            }
          ?>
        </table>
      </div> <!-- /.table-responsive -->
    </div> <!-- /.content -->
  </div> <!-- /.container -->

                 
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>