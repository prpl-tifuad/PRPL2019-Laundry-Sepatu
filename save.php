<?php
	include 'koneksi.php';

				$id_pelanggan	 = $_POST['id_pelanggan'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$alamat		     = $_POST['alamat'];
				$no_telepon		 = $_POST['no_telepon'];
				$jumlah_sepatu	 = $_POST['jumlah_sepatu'];
				$jenis_sepatu	 = $_POST['jenis_sepatu'];
				$harga			 = $_POST['harga'];
				$layanan		 = $_POST['layanan'];
				$total			 = $_POST['total'];
				$kode 			 = $_POST['kode'];
				

				$insert = mysqli_query($koneksi, "INSERT INTO pelangan VALUES('$id_pelanggan','$nama', '$jenis_kelamin',  '$alamat', '$no_telepon', '$jumlah_sepatu', '$jenis_sepatu')"); // query untuk menambahkan data ke dalam database

						mysqli_query($koneksi,$insert);

						$insert2 ="SELECT * from item_produk where harga = '$harga', layanan = '$layanan'";
						$data = mysqli_query($koneksi,$insert2);
						$item_produk = mysqli_fetch_object($data);
						// echo $kacamata->kode_kacamata." dan ".$kacamata->harga_kacamata;
						$total = 0;
						$total = $layanan * $jumlah_sepatu;
						$insert3 = "INSERT INTO transaksi values('$item_produk->kode', '$id_pelanggan', '$total')";
						mysqli_query($koneksi, $insert3);

	echo "Koneksi BERHASIL HORE";
	// echo "<a href ='input.php'>Lihat Hasil</a>";
	header('location:layanan.html');

?>	