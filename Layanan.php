<?php
  include 'koneksi.php';
  include 'produk.php'; 
?>

<html lang="en">
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="shop.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #f5f5f5">
  
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 20px;">
  <a class="navbar-brand" href="#">LOW'S CLEANER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Home.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.html">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Layanan.php">Layanan <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <div class="ml-auto">
        <button class="btn btn-success" onclick="window.location.href='Login/index.php?action=login'">Login</button>
        <button class="btn btn-danger" onclick="window.location.href='Login/index.php'">Register</button>
    </div>
  </div>
</nav>
                    <!-- PRODUCT -->  
      <div class="container" >
        <?php 
          if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            if ($pesan == 'berhasil'){ ?>
              <div class="alert alert-success" role="alert">
                <b>Data Berhasil di Masukan</b>
              </div><?php  
              # code...
            }
          }
            # code...
         ?>
    <div class="row justify-content-md-center">
      <?php for ($i=0; $i < $jumlah; $i++) { 
        if ($i == "0" or $i=="1" or $i == "2" or $i == "3" or $i == "4") {
       ?>
        <div class="col product">
          <div class="card" style="width: 14rem;">
              <h3 class="card-title" align="center"><?= $order[$i]['layanan']?> </h3>
            <?= "<img src='img/".$order[$i]['nama_foto']."' class='card-img-top thumbnail'>" ?>
            <div class="card-body">
              <p class="card-title" align="center"><?= $order[$i]['waktu']?> </p>
                 <font color="red"><h4 class="card-title" align="center" color="red" ><?= 'Rp',$order[$i]['harga'],',-'?> </h4></font>
    <a href="form.php?kode=<?=$i+10 ?>" class="btn btn-primary"><i class="material-icons">OrderNow</i></a>
            </div>
          </div>
        </div>
      <?php } 
      }?>
    </div>
  </div>
</body>
</html>

