<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0'>
	<meta http-equiv='X-UA-Compatible' content='IE=9; IE=8; IE=7; IE=EDGE' />
	<title>AIPOS Cetak Stok Produk</title>
	<link rel="stylesheet" href="">
	<style>
		@page{
			margin: 0px;
			size: 210mm 330mm;
		}
		@media print{
			@page{
				margin-left: 0px;
				size: 210mm 330mm;
			}
		}
		body{
			font-family:sans-serif;
			font-size:12px;
		}
		h2{
			margin:0px;
		}
		#divider{
			border:1px solid black;
		}
		#divider-dotted{
			border:1px dotted black;
		}
		#space{
			margin:10px;
		}
		.table{
			border-collapse: collapse;
			width:100%;
		}
		.table tr th{
			border:1px solid black;
			padding:4px;
		}
		.table tr td{
			border:1px solid black;
			padding:4px;
		}
	</style>
	<script>
	setTimeout(function(){ window.close(); }, 1000);
	</script>
</head>
<body onload="<?php if ($print == '1') { echo 'print()'; } ?>">
	<center>
		<h2><?php echo $toko->nama_toko ?></h2>
		<span><?php echo $toko->alamat ?> - <?php echo $toko->telp ?></span>
		<br>
		<b>CETAK STOK PRODUK</b>
	</center>
	<br>
	<table class="table">
	<thead>
	  <tr>
	    <th width="2" class="center">No</th>
	    <th>Barcode</th>
	    <th>Nama Produk</th>
	    <th>Stok</th>
	    <th>Satuan</th>
	    <th>Harga 1</th>
	    <th>Harga 2</th>
	    <th>Harga 3</th>
	  </tr>
	</thead>
	<tbody>
	  <?php
	  $no = 1;
	  $total_stok = 0;
	  foreach ($contents as $key):
	  ?>
	  <tr>
	    <td class="center"><?php echo $no ?></td>
	    <td><?php echo $key->barcode ?></td>
	    <td><?php echo $key->nama_produk ?></td>
	    <td class="center"><?php echo $key->stok ?></td>
	    <td><?php echo $key->satuan_produk ?></td>
	    <td>Rp <span style="float:right;"><?php echo number_format($key->harga_1,0,',','.') ?></span></td>
	    <td>Rp <span style="float:right;"><?php echo number_format($key->harga_2,0,',','.') ?></span></td>
	    <td>Rp <span style="float:right;"><?php echo number_format($key->harga_3,0,',','.') ?></span></td>
	  </tr>
	  <?php
	  $total_stok += $key->stok;
	  $no++;
	  endforeach;
	  ?>
	</tbody>
	<tfoot>
	  <tr>
	    <td colspan="3" class="text-right">JUMLAH</td>
	    <td><center><?php echo number_format($total_stok,0,',','.') ?></center></td>
	    <td></td>
	    <td></td>
	    <td></td>
	    <td></td>
	  </tr>
	</tfoot>
	</table>
</body>
</html>