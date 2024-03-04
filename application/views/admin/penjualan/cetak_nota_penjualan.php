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
			size: 58mm 100mm;*/
		}
		@media print{
			@page{
				margin: 0;
				width:58mm;
				size: 58mm 100mm;*/
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
			font-size:15px!important;
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
		<h2 style="margin-left:0px;margin-right:0px;"><?php echo $toko->nama_toko ?></h2>
		<b><?php echo $toko->alamat ?></b><br>
		<b>Telp : <?php echo $toko->telp ?></b><br>
		<div style="width:100%;border-top:1px solid black;border-bottom:1px solid black;margin-top:5px;margin-bottom:2px;padding:2px;"></div>
		<div style="text-align:left;">
			<table style="width:100%;">
				<tr>
					<th></th>
					<th width="2"></th>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td>No Faktur</td>
					<td>:</td>
					<td><?php echo $orders->no_faktur ?></td>
					<td rowspan="3" style="vertical-align:top;text-align:right;"><?php echo $orders->tgl_order ?><br><?php echo $orders->jam_order ?></td>
				</tr>
				<tr>
					<td>Kasir</td>
					<td>:</td>
					<td><?php echo $nama_kasir ?></td>
				</tr>
				<tr>
					<td>Pembeli</td>
					<td>:</th>
					<td><?php echo $nama_pembeli ?></td>
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
		<span style="float:left;">Produk</span>
		<table id="panelBarang">
			<tr>
				<th style="width:3mm;">No.</th>
				<th style="width:15mm;">Jumlah</th>
				<th style="width:20mm;text-align:right;">Harga (Diskon)</th>
				<th style="width:20mm;text-align:right;">Subtotal</th>
			</tr>
			<?php
			$no=1;
			$total_harga = 0;
			foreach ($orders_detail as $key_orders_detail):
				$total_harga += $key_orders_detail->subtotal;
				$diskon_produk = ($key_orders_detail->diskon_produk/100) * $key_orders_detail->harga_jual * $key_orders_detail->jumlah;
			?>
				<tr>
					<td><?php echo $no ?>)</td>
					<td colspan="3"><?php echo $key_orders_detail->nama_produk ?></td>
				</tr>
				<tr>
					<td></td>
					<td><?php echo $key_orders_detail->jumlah ?></td>
					<td><span style="float:right;"><?php echo number_format($key_orders_detail->harga_jual,0,',','.') ?><?php echo ($key_orders_detail->diskon*1 > 0 ? '('.$key_orders_detail->diskon.'%)' : '') ?></span></td>
					<td><span style="float:right;"><?php echo number_format($key_orders_detail->subtotal*1,0,',','.') ?></span></td>
				</tr>
			<?php
			$no++;
			endforeach;?>
			<tr>
				<th colspan="4" style="padding:5px;"><hr></th>
			</tr>
			<tr>
				<th colspan="3"><span style="float:right;">Total Harga</span></th>
				<th><span style="float:right;">Rp <?php echo number_format($total_harga,0,',','.') ?></span></th>
			</tr>
			<?php if($opsi_diskon == 1){
				if(isset($pembeli->diskon)){
				$total_harga = $total_harga - ($total_harga * $pembeli->diskon/100);
				echo '<tr>
						<th colspan="3"><span style="float:right;">Diskon Member</span></th>
						<th><span style="float:right;">Rp '.number_format($key_orders_detail->diskon_member,0,',','.').'</span></th>
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
				<th colspan="3"><span style="float:right;">Total Yang Harus Di Bayar</span></th>
				<th><span style="float:right;">Rp <?php echo number_format($total_harga,0,',','.') ?></span></th>
			</tr>
			<tr>
				<th colspan="3"><span style="float:right;">Pembayaran <?php echo $pembayaran ?></span></th>
				<th><span style="float:right;">Rp <?php echo number_format($bayar,0,',','.') ?></span></th>
			</tr>
			<tr>
				<th colspan="3"><span style="float:right;"><?php echo $ket_k ?></span></th>
				<th><span style="float:right;">Rp <?php echo number_format($kembali,0,',','.') ?></span></th>
			</tr>
		</table>

		<div id="space"></div>
		<div id="space"></div>

		<center>
		<?php echo $ucapan ?>

		<div id="space"></div>

		Aplikasi kasir dibuat www.diengcyber.com
		</center>

	</div>
</body>
</html>