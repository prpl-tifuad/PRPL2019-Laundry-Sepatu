<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
 session_start();
    $s=$_SESSION['s'];
?>
	<div class="container">
		<div class="content">
			<h2>Form Pemesanan</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 137 ditekan
				$id_pelanggan	 = $_POST['id_pelanggan'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$alamat		     = $_POST['alamat'];
				$no_telepon		 = $_POST['no_telepon'];
				$jumlah_sepatu	 = $_POST['jumlah_sepatu'];
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM pelangan WHERE id_pelanggan='$id_pelanggan'"); // query untuk memilih entri dengan id_pelanggan terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah id_pelanggan yang akan ditambahkan tidak ada dalam database
					// <a href="order.php?id=$i" >Order</a>
						$insert = mysqli_query($koneksi, "INSERT INTO pelangan (id_pelanggan, nama, jenis_kelamin,  alamat, no_telepon,jumlah_sepatu) VALUES('$id_pelanggan','$nama', '$jenis_kelamin',  '$alamat', '$no_telepon', '$jumlah_sepatu')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							
							// echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pelanggan Berhasil Di Simpan.</div>'; // maka tampilkan 'Data Karyawan Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pelanggan Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Data Karyawan Gagal Di simpan!'
						}
					
				}else{ // mengecek jika id_pelanggan yang akan ditambahkan sudah ada dalam database
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Id Sudah Ada..!</div>'; // maka tampilkan 'NIK Sudah Ada..!'
				}
			}
			
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
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
				<div class="form-group">
					<label class="col-sm-3 control-label">Jumlah sepatu</label>
					<div class="col-sm-3">
						<input type="text" name="jumlah_sepatu" class="form-control" placeholder="jumlah_sepatu" required>
					</div>
				</div>
				
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Order" data-toggle="tooltip" >
						<a href="Layanan.html" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
	 <?php
      $cart = unserialize(serialize($_SESSION['cart']));
      $_SESSION['cart']=$cart;
      $_SESSION['s']=$s;
    ?>
<?php 
include("footer.php"); // memanggil file footer.php

?>