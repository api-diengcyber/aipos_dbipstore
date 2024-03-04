<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0'>
	<meta http-equiv='X-UA-Compatible' content='IE=9; IE=8; IE=7; IE=EDGE' />
	<title>Cetak Nota Penjualan</title>
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
		#panelBarang{
			border-collapse: collapse;
			width:100%;
		}
		#panelBarang tr th{
			border:1px dotted black;
			padding:4px;
		}
		#panelBarang tr td{
			border:1px dotted black;
			padding:4px;
		}
	</style>
	<script>
	setTimeout(function(){ window.close(); }, 1000);
	</script>
</head>
<body onload="<?php if($print == '1'){ echo 'print()'; } ?>">
	<center>
		<h2><?php echo $toko->nama_toko ?></h2>
		<span><?php echo $toko->alamat ?> - <?php echo $toko->telp ?></span>
		<hr id="divider">
		<?php
		if($orders->pembayaran == "1"){
			$pembayaran = "TUNAI";
		} else if($orders->pembayaran == "2"){
			$pembayaran = "KREDIT";
		} else if($orders->pembayaran == "3"){
			$pembayaran = "DEPOSIT";
		} else {
			$pembayaran = "";
		}

		if($pembeli){
			$nama_pembeli = $pembeli->nama;
		} else {
			$nama_pembeli = "-------";
		}
		?>
		<div style="text-align:left;">
			<table style="width:100%;">
				<tr>
					<th width="60"></th>
					<th width="2"></th>
					<th></th>
				</tr>
				<tr>
					<td>No Faktur</td>
					<td>:</td>
					<td><?php echo $orders->no_faktur ?></td>
				</tr>
				<tr>
					<td>Tgl Order</td>
					<td>:</td>
					<td><?php echo $orders->tgl_order ?> <?php echo $orders->jam_order ?></td>
				</tr>
				<tr>
					<td>Pembeli</td>
					<td>:</th>
					<td><?php echo $nama_pembeli ?></td>
				</tr>
				<tr>
					<td>Pembayaran</td>
					<td>:</td>
					<td><?php echo $pembayaran ?></td>
				</tr>
				<?php if($piutang){ ?>
				<tr>
					<td>Jatuh Tempo</td>
					<td>:</td>
					<td><?php echo $piutang->deadline ?></td>
				</tr>
				<?php } ?>
				<?php if($orders->pembayaran == "3"){ ?>
				<tr>
					<td>Deposit</td>
					<td>:</td>
					<td><?php echo number_format($pembeli->deposit,0,',','.') ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
		<div id="space"></div>
		<table id="panelBarang">
			<tr>
				<th>No</th>
				<th>Barang</th>
				<th>Harga (Rp)</th>
				<th>Jumlah</th>
				<th>Diskon</th>
				<th>Sub Total (Rp)</th>
			</tr>
			<?php
			$no=1;
			$total_harga = 0;
			foreach ($orders_detail as $key_orders_detail):
				$total_harga += $key_orders_detail->subtotal;
				$diskon_produk = ($key_orders_detail->diskon_produk/100) * $key_orders_detail->harga_jual * $key_orders_detail->jumlah;
			?>
				<tr>
					<td><center><?php echo $no ?></center></td>
					<td><?php echo $key_orders_detail->nama_produk ?></td>
					<td><span style="float:right;"><?php echo number_format($key_orders_detail->harga_jual,0,',','.') ?>,-</span></td>
					<td><center><?php echo $key_orders_detail->jumlah ?></center></td>
					<td><span style="float:right;"><?php echo number_format($key_orders_detail->potongan*1,0,',','.') ?>,-</span></td>
					<td><span style="float:right;"><?php echo number_format($key_orders_detail->subtotal*1,0,',','.') ?>,-</span></td>
				</tr>
			<?php
			$no++;
			endforeach;?>
			<tr>
				<th colspan="5"><span style="float:right;">Total Harga</span></th>
				<th><span style="float:right;"><?php echo number_format($total_harga,0,',','.') ?>,-</span></th>
			</tr>
			<?php if($opsi_diskon == 1){
				if(!empty($pembeli->diskon)){
				$total_harga = $total_harga - ($total_harga * $pembeli->diskon/100);
				echo '<tr>
						<th colspan="5"><span style="float:right;">Diskon Member</span></th>
						<th><span style="float:right;">'.number_format($key_orders_detail->diskon_member,0,',','.').'</span></th>
					  </tr>';
				}
			}
			$kembali = $bayar - $total_harga;
			?>
			<tr>
				<th colspan="5"><span style="float:right;">Total Yang Harus Di Bayar</span></th>
				<th><span style="float:right;"><?php echo number_format($total_harga,0,',','.') ?>,-</span></th>
			</tr>
			<tr>
				<th colspan="5"><span style="float:right;">Bayar</span></th>
				<th><span style="float:right;"><?php echo number_format($bayar,0,',','.') ?>,-</span></th>
			</tr>
			<tr>
				<th colspan="5"><span style="float:right;">Kembali</span></th>
				<th><span style="float:right;"><?php echo number_format($kembali,0,',','.') ?>,-</span></th>
			</tr>
		</table>

		<div id="space"></div>
		<div style="float:right;">
			<table>
				<tr>
					<td><center><?php echo $user->first_name ?></center></td>
				</tr>
				<tr>
					<td><br><br><br></td>
				</tr>
				<tr>
					<td><center>(................................)</center></td>
				</tr>
			</table>
		</div>

	</center>
</body>
</html>