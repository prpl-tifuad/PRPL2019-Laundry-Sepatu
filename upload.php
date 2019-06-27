<?php 
  $kode =$_POST['kode'];
  $jumlah_sepatu =$_POST['jumlah_sepatu'];
  $id_pelanggan =$_POST['id_pelanggan'];
  $nama =$_POST['nama'];
  $jenis_kelamin =$_POST['jenis_kelamin'];
  $alamat =$_POST['alamat'];
  $no_telepon =$_POST['no_telepon'];
  $harga =$_POST['harga'];
  $total = $jumlah_sepatu * $harga;

  include 'koneksi.php';
  $pelanggan = mysqli_query($koneksi, "INSERT INTO `pelangan`(`id_pelanggan`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES ('$id_pelanggan','$nama','$jenis_kelamin','$alamat','$no_telepon')");
  if ($pelanggan ) {
    $insert = mysqli_query($koneksi,"INSERT INTO `transaksi`(`id_transaksi`,`kode`, `id_pelanggan`, `jumlah_sepatu`, `total`) VALUES ('','$kode','$id_pelanggan','$jumlah_sepatu','$total')");
    if ($insert) {
      header('location:Layanan.php?pesan=berhasil');
    }
  }
 ?>