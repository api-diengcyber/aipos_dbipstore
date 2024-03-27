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
			margin: 0;
			width:58mm;
			size: 58mm 100mm;
		}
		@media print{
			@page{
				margin: 0;
				width:58mm;
				size: 58mm 100mm;
			}
			body{
				margin: 0;
				width:58mm;
			}
		}
		@font-face {
		    font-family: Merchant Copy;
		    src: url('<?php echo base_url() ?>assets/fonts/Merchant_Copy.ttf');
		}
		body{
			font-family:Merchant Copy!important;
			font-size:12px!important;
			margin:0px;
			width:58mm;
		}
		h2{
			margin:0px!important;
		}
		#divider{
			border:1px solid black!important;
		}
		#divider-dotted{
			border:1px dotted black!important;
		}
		#space{
			margin:10px!important;
		}
		#panelBarang{
			border-collapse: collapse!important;
			width:100%!important;
			text-align: left;
		}
		#panelBarang tr th{
			border:0px dotted black!important;
			padding:1px!important;
			text-align: left;
		}
		#panelBarang tr td{
			border:0px dotted black!important;
			padding:1px!important;
			text-align: left;
		}
	</style>
	<script>
	setTimeout(function(){ window.close(); }, 1000);
	</script>
</head>
<body onload="<?php if($print == '1'){ echo 'print()'; } ?>">
	<div style="text-align:center;margin:0px;padding:0px;">
		<?php
		if($orders->pembayaran == "1"){
			$pembayaran = "tunai";
		} else if($orders->pembayaran == "2"){
			$pembayaran = "kredit";
		} else if($orders->pembayaran == "3"){
			$pembayaran = "deposit";
		} else {
			$pembayaran = "";
		}
		?>

		<!-- <h5 style="margin-left:0px;margin-right:0px;"><?php // echo $toko->nama_toko ?></h5> -->
		<table style="width: 100%;text-align:center;">
			<tr>
				<td rowspan="2" style="padding:5px;"><img src="<?php echo base_url() ?>assets/images/gemilang_io.jpg" width="50" /></td>
				<td><b><?php echo $toko->nama_toko ?><br><?php echo $toko->alamat ?></b><br>Telp : <?php echo $toko->telp ?></td>
			</tr>
		</table>
		<div style="width:100%;border-bottom:1px solid black;margin-top:2px;margin-bottom:2px;padding:2px;"></div>

		<div style="text-align:left;">
			<table style="width:100%;font-size:11px;">
				<tr>
					<td colspan="2"><?php echo $orders->no_faktur ?></td>
					<td style="text-align:right;"><?php echo $orders->tgl_order ?></td>
				</tr>
				<tr>
					<td colspan="2">Kasir: <?php echo $nama_kasir ?></td>
					<td style="text-align:right;"><?php echo $orders->jam_order ?></td>
				</tr>
				<?php if (!empty($nama_pembeli) && $nama_pembeli != "null") { ?>
				<tr>
					<td colspan="3">Pembeli: <?php echo $nama_pembeli ?></td>
				</tr>
				<?php } ?>
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
		<table id="panelBarang">
			<tr>
				<th style="width:3mm;"></th>
				<th style="width:15mm;"></th>
				<th style="width:20mm;text-align:right;"></th>
				<th style="width:20mm;text-align:right;"></th>
			</tr>
			<?php
			$no=1;
			$total_harga = 0;
			foreach ($orders_detail as $key_orders_detail):
				if ($key_orders_detail->jumlah > 0) {
				// 	$fsubtotal = !empty($key_orders_detail->subtotal) ? $key_orders_detail->subtotal : $key_orders_detail->sub_total;
					$fsubtotal = $key_orders_detail->jumlah * ($key_orders_detail->harga_jual - $key_orders_detail->potongan);
					$total_harga += $fsubtotal;
					$diskon_produk = ($key_orders_detail->diskon_produk/100) * $key_orders_detail->harga_jual * $key_orders_detail->jumlah;
			?>
				<tr>
					<td colspan="3"><?php echo $key_orders_detail->nama_produk ?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php echo $key_orders_detail->jumlah ?></td>
					<td><span style="float:right;"><?php echo number_format($key_orders_detail->harga_jual,0,',','.') ?><?php echo ($key_orders_detail->diskon*1 > 0 ? '('.$key_orders_detail->diskon.'%)' : '') ?></span></td>
					<td><span style="float:right;"><?php echo number_format($fsubtotal*1,0,',','.') ?></span></td>
				</tr>
			<?php
					$no++;
				}
			endforeach;
			?>
			<tr>
				<th colspan="4" style="padding:5px;">
		<div style="width:100%;border-bottom:1px solid black;margin-top:2px;margin-bottom:2px;padding:2px;"></div></th>
			</tr>
			<!-- <tr>
				<th colspan="3"><span style="float:right;">Total</span></th>
				<th><span style="float:right;"><?php // echo number_format($total_harga,0,',','.') ?></span></th>
			</tr> -->
			<?php if($opsi_diskon == 1){
				if(isset($pembeli->diskon)){
				$total_harga = $total_harga - ($total_harga * $pembeli->diskon/100);
				echo '<tr>
						<td colspan="3"><span style="float:right;">Diskon</span></td>
						<td><span style="float:right;">'.number_format($orders->diskon_member,0,',','.').'</span></td>
					  </tr>';
				}
			}
			$ket_k = 'Kembali';
			$kembali = $bayar - $total_harga;
			if ($orders->pembayaran == "2") {
			  if ($kembali < 0) {
				$ket_k = 'Kurang';
			  	$kembali = $kembali*-1;
			  }
			} else {
			  if ($kembali < 0) {
			  	$kembali = 0;
			  }
			}
			?>
			<tr>
				<th colspan="3"><span style="float:right;">Total</span></th>
				<th><span style="float:right;"><?php echo number_format($total_harga,0,',','.') ?></span></th>
			</tr>
			<tr>
				<td colspan="3"><span style="float:right;">Bayar</span></td>
				<td><span style="float:right;"><?php echo number_format($bayar,0,',','.') ?></span></td>
			</tr>
			<tr>
				<td colspan="3"><span style="float:right;"><?php echo $ket_k ?></span></td>
				<td><span style="float:right;"><?php echo number_format($kembali,0,',','.') ?></span></td>
			</tr>
		</table>

		<center>
		<div style="font-size: 11px;margin-top:14px;"><?php echo $ucapan ?></div>
		</center>

	</div>
</body>
</html>