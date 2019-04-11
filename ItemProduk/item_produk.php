<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
		
        
</head>
<body>

<div class="container">
	<h1 align="center">Menu</h1>
	<div class="table-responsive">
	<table id="mytable" class="table table-bordred table-striped" >
		 <thead>
		<tr >
			<th >Kode</th>
			<th >Layanan</th>
			<th >Waktu</th>
			<th >Harga</th>
			<th >Tools</th>
			</tr>
	
		</thead>
		<?php
		include 'config.php';
		$query = mysqli_query($connect,"SELECT * FROM item_produk");
		while ($row = mysqli_fetch_array($query)) {
		?>
		 <tbody>
		<tr > 
			<td ><?php echo $row['kode'];?></td><!--namaatribut-->
			<td ><?php echo $row['layanan'];?></td>
			<td ><?php echo $row['waktu'];?></td>
			<td ><?php echo $row['harga'];?></td>
			<td >
			<a href="update.php?id=<?php echo $row['kode']; ?>"<button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>

			</a><a href="delete.php?id=<?php echo $row['kode']; ?> "<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>

			</a><a href="insert.php?id=<?php echo $row['kode']; ?>"<button class="btn btn-success btn-xs" data-title="plus" data-toggle="modal" data-target="#plus" ><span class="glyphicon glyphicon-plus"></span></button>
</a></td>
			
				
			
				
		
		</tr>
			 </tbody>
		<?php

	}
	?>
	</table>

</body>
</html>