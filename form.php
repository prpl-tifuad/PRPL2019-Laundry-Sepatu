<?php
  include 'koneksi.php';
    $kode=$_GET['kode'];
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
 <!-- Data Pelanggan -->
 <form class="form-horizontal" action="upload.php" method="POST">
  <?php 
    include 'koneksi.php';
    $query = mysqli_query($koneksi,"select * from item_produk where kode = '$kode'");
    $data = mysqli_fetch_array($query);
    $nama_produk = $data['layanan'];
    $harga = $data['harga'];
    $kode = $data['kode'];
  ?>
    <input type="text" name="kode" value="<?= $kode  ?>" hidden>
    <input type="text" name="harga" value="<?= $harga  ?>"hidden>
        <div class="form-group">
          <label class="col-sm-3 control-label">layanan</label>
          <div class="col-sm-2">
            <input type="text" name="layanan" class="form-control" placeholder="id_pelanggan" value="<?= $nama_produk  ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Jumlah Sepatu</label>
          <div class="col-sm-2">
            <input type="text" name="jumlah_sepatu" class="form-control" placeholder="jumlah_sepatu">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Id_pelanggan</label>
          <div class="col-sm-2">
            <input type="text" name="id_pelanggan" class="form-control" placeholder="id_pelanggan" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Nama</label>
          <div class="col-sm-4">
            <input type="text" name="nama" class="form-control" placeholder="Nama" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Jenis Kelamin</label>
          <div class="col-sm-2">
            <select name="jenis_kelamin" class="form-control" required>
              <option value=""> ----- </option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Alamat</label>
          <div class="col-sm-3">
            <textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">No Telepon</label>
          <div class="col-sm-3">
            <input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
          </div>
        </div>
        </div>
             
          </div>
              
          <input type="submit" value="Next" class="btn btn-primary">

      </div> 
    </div>
  </form>

  <!-- <div class="buttonnext"> -->
  <!-- <a href="alathiking2.php"><button type="button" class="btn btn-success">Next</button></a> -->
  <!-- </div> -->
</body>
</html>

