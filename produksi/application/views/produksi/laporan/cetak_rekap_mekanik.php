<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Rekap Pekerjaan</title>
	<style>
		body{
			font-family: sans-serif;
			font-size: 12px;
		}
		h2{
			margin: 0px;
		}
		.main{
			width: 100%;
			text-align: center;
		}
		.space{
			padding: 10px;
		}
		.table{
			width: 100%;
			border-color: black;
			border-width: 1px;
			border-collapse: collapse;
			margin-top: 10px;
		}
		.table thead th{
			padding: 8px;
		}
		.table tbody td{
			padding: 4px;
		}
	</style>
</head>
<body onload="print()">
	<div class="main">
		<h2><?php echo $toko->nama_toko ?></h2>
		<span><?php echo $toko->alamat ?> - <?php echo $toko->telp ?></span>
		<div class="space"></div>
		<h3>Rekap Pekerjaan <?php echo $nama_mekanik; ?></h3>
		BULAN <span><?php echo $bulan ?> <?php echo $tahun ?></span>
	      <table class="table" border="1">
	        <thead>
	          <tr>
	              <th>No</th>
	              <th>Tanggal</th>
	              <th>Pekerjaan</th>
	              <th>No Plat</th>
	          </tr>
	        </thead>
	        <tbody>
	        	<?php $i = 1;foreach ($detail_order as $data): ?>
	        	<tr>
	        		<td><?php echo $i; ?></td>
	        		<td><?php echo $data->tgl_order ?> <?php echo $data->jam_order ?></td>
	        		<td><?php echo $data->nama_produk ?></td>
	        		<td><?php echo $data->plat; ?></td>
	        	</tr>
	        	<?php $i++;endforeach ?>
	        </tbody>
	      </table>
	</div>
</body>
</html>