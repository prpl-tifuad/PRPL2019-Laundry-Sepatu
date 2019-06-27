<?php
$n=(mysqli_query($koneksi, "SELECT COUNT(*) as 'jumlah' FROM item_produk"))->fetch_array();
$jumlah=$n['jumlah'];

for($i = 0; $i<$jumlah; $i++){


    $order[$i]=(mysqli_query($koneksi, "SELECT item_produk.kode as 'kode', item_produk.layanan as 'layanan',item_produk.waktu as 'waktu', item_produk.harga as 'harga', fotoproduk.nama_foto as 'nama_foto' FROM item_produk JOIN fotoproduk  ON item_produk.id_foto=fotoproduk.id_foto && kode=$i+10"))->fetch_array();

}
?>