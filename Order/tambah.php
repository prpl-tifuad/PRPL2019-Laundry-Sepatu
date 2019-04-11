<?php 
include("header.php"); // memanggil file header.php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Pelanggan &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" pada baris 137 ditekan
				$id_pelanggan	 = $_POST['id_pelanggan'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat		     = $_POST['alamat'];
				$no_telepon		 = $_POST['no_telepon'];
				$jumlah_sepatu	 = $_POST['jumlah_sepatu'];
				$jenis_sepatu	 = $_POST['jenis_sepatu'];
				
				
				$cek = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'"); // query untuk memilih entri dengan nik terpilih
				if(mysqli_num_rows($cek) == 0){ // mengecek apakah nik yang akan ditambahkan tidak ada dalam database
					
						$insert = mysqli_query($koneksi, "INSERT INTO pelanggan (id_pelanggan, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telepon,jumlah_sepatu,jenis_sepatu) VALUES('$id_pelanggan','$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telepon', '$jumlah_sepatu', '$jenis_sepatu')") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($insert){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Pelanggan Berhasil Di Simpan.</div>'; // maka tampilkan 'Data Karyawan Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Pelanggan Gagal Di simpan!</div>'; // maka tampilkan 'Ups, Data Karyawan Gagal Di simpan!'
						}
					
				}else{ // mengecek jika nik yang akan ditambahkan sudah ada dalam database
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
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
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
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis sepatu</label>
					<div class="col-sm-2">
						<select name="jenis_sepatu" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Sneakers">Sneakers</option>
							<option value="Espradilles">Espradilles</option>
							<option value="Boots">Boots</option>
							<option value="Flat_shoes">Flat shoes</option>
                            <option value="High_heels">High heels</option>
							<option value="Oxford">Oxford</option>
							<option value="Leavers">Leavers</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php

?>