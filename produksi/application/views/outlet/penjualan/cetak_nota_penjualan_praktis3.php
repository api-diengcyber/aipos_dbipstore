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
			margin: 0px 20px 0px 0px;
			width: 94%;
		}
		@media print{
			@page{
				margin: 0px 20px 0px 0px;
				width: 94%;
			}
			body{
				margin: 0px 20px 0px 0px;
				width: 94%;
			}
		}
		@font-face {
		    font-family: Merchant Copy;
		    src: url('<?php echo base_url() ?>assets/fonts/Merchant_Copy.ttf');
		}
		body.ppt{
			font-family:Tahoma!important;
			/* font-family:Arial!important; */
			font-size:12px!important;
			margin: 0px 20px 0px 0px;
			width: 94%;
			background-color: #fff;
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
			margin: 10px!important;
		}
		#panelBarang{
			border-collapse: collapse!important;
			width:100%!important;
			text-align: left;
		}
		#panelBarang tr th{
			border:0px dotted black!important;
			padding:3px!important;
			text-align: left;
		}
		#panelBarang tr td{
			border: 0px dotted black!important;
			padding: 3px!important;
			text-align: left;
		}
		.ppt > * {
			font-family:Tahoma!important;
		}
	</style>
	<script>
	setTimeout(function(){ window.close(); }, 1000);
	</script>
</head>
<?php
if ($piutang) {
}
?>
<body style="padding:10px;" onload="print()" class="ppt">
	<br><br>
	<table>
		<tr>
			<td style="padding-left:10px;"><img src="<?php echo base_url() ?>assets/images/logo_carica.png" height="60px" alt=""></td>
			<td style="vertical-align: top; padding-left:10px;">
				<h3 style="margin-left:0px;margin-right:0px;margin-bottom:5px;margin-top:0px"><?php echo $toko->nama_toko ?></h3>
				<span style="font-size:13px"><?php echo $toko->alamat ?></span><br>
				<span style="font-size:13px">Telp : 0</span>
			</td>
		</tr>
	</table>
	<table style='margin-top:5px;margin-bottom:10px;'>
		<tr>
			<td style="padding-left:10px;">Kepada</td>
			<td>:</td>
			<td><?php echo $nama_pembeli ?></td>
		</tr>
		<tr>
			<td style="padding-left:10px;">Telp</td>
			<td>:</td>
			<td><?php echo $telp_pembeli ?></td>
		</tr>
		<tr>
			<td style="padding-left:10px;">Alamat</td>
			<td>:</td>
			<td><?php echo $alamat_pembeli ?></td>
		</tr>
	</table>
	<table style='margin-top:5px; float:right; margin-top: -120px; margin-right: 30px;'>
		<tr>
			<th colspan="3" align="left"><h3 style="margin-top:0px;margin-bottom:7px;">FAKTUR PENJUALAN</h3></th>
		</tr>
		<tr>
			<td>No Faktur</td>
			<td>:</td>
			<td><?php echo $orders->no_faktur ?></td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td><?php echo $orders->tgl_order ?></td>
		</tr>
		<tr>
			<td>Jth. Tempo</td>
			<td>:</td>
			<td><?php echo $piutang->deadline ?></td>
		</tr>
		<tr>
			<td>Sales</td>
			<td>:</td>
			<td><?php echo $nama_sales ?></td>
		</tr>
	</table>
	<table style="border-collapse:collapse;width:95vw">
		<thead style="border-bottom:solid 1px black" align="left">
			<th width="10">#</th>
			<th width="80">Item ID</th>
			<th>Nama Item</th>
			<th width="30" align="center">Qty</th>
			<th width="50" align="center">Qty Bns</th>
			<th width="40" align="center">Satuan</th>
			<th width="70" align="right">Harga</th>
			<th width="50" align="right">Disc 1</th>
			<th width="50" align="right">Disc 2</th>
			<th width="50" align="right">Disc 3</th>
			<th width="70" align="right">Total</th>
		</thead>
		<tbody>
			<?php
			$no=1;
			$total_harga = 0;
			$diskon = 0;
			foreach ($orders_detail as $key):
	            $diskon_produk = $key->harga_jual*($key->diskon_produk/100);
	            $diskon1 = $key->harga_jual*($key->diskon/100);
	            $diskon2 = $key->harga_jual*($key->diskon2/100);
	            $diskon3 = $key->harga_jual*($key->diskon3/100);
	            $diskon = ($diskon1*$key->jumlah) + ($diskon2*$key->jumlah) + ($diskon3*$key->jumlah) + ($diskon_produk*$key->jumlah);
				$total_harga += $key->subtotal;
			?>
			<tr style="border-bottom:solid 1px black">
				<td><?php echo $no ?></td>
				<td><?php echo $key->barcode ?></td>
				<td><?php echo $key->nama_produk ?></td>
				<td align="center"><?php echo $key->jumlah ?></td>
				<td align="center"><?php echo $key->jumlah_bonus ?></td>
				<td align="center"><?php echo $key->satuan ?></td>
				<td align="right"><?php echo number_format($key->harga_jual,0,',','.') ?></td>
				<td align="right">
					<?php echo $key->diskon*1 > 0 ? number_format($key->diskon,2,',','.').'%' : 0 ?>
				</td>
				<td align="right">
					<?php echo $key->diskon2*1 > 0 ? number_format($key->diskon2,2,',','.').'%' : 0 ?>
				</td>
				<td align="right">
					<?php echo $key->diskon3*1 > 0 ? number_format($key->diskon3,2,',','.').'%' : 0 ?>
				</td>
				<td align="right"><?php echo number_format($key->subtotal,0,',','.') ?></td>
			</tr>
			<?php 
			$no++;
			$diskon += $key->diskon + $key->diskon2 + $key->diskon3;
			endforeach;
			$total_harga = $total_harga + $orders->ongkir;
			$ppn_nominal = $total_harga * (10 / 100);
			$total_ppn = $total_harga + $ppn_nominal;
			$diskon_member = ($orders->diskon_member*1/100) * $total_ppn;
			$total_netto = $total_ppn - $diskon_member;
			?>
			<tr>
				<td colspan="10"></td>
			</tr>
			<tr>
				<td colspan="7" style="vertical-align: top;">
					<table style="width:100%">
						<tr>
							<td style="vertical-align: top;">Note</td>
							<td style="vertical-align: top;" align="right">:</td>
							<td>Pembayaran dg Cheque/Giro dianggap lunas setelah dapat dicairkan.</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>Faktur Asli mirip Bukti Sah Penagihan/Pelunasan. Pastikan Anda menyimpannya</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>dengan baik setelah melakukan pelunasan.</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>Barang yang sudah dibayar lunas tidak dapat diretur.</td>
						</tr>
					</table>
				</td>
				<td colspan="3">
					<table style="width:100%">
						<tr>
							<td>Grand Total</td>
							<td>:</td>
							<td align="right"><?php echo number_format($total_harga-$orders->ongkir,0,',','.') ?></td>
						</tr>
						<?php if ($piutang) { ?>
						<tr>
							<td>Bayar</td>
							<td>:</td>
							<td align="right"><?php echo number_format($piutang->jumlah_bayar,0,',','.') ?></td>
						</tr>
						<tr>
							<td>Kurang</td>
							<td>:</td>
							<td align="right"><?php echo number_format($piutang->sisa,0,',','.') ?></td>
						</tr>
						<?php } ?>
						<tr>
							<td>Discount</td>
							<td>:</td>
							<td align="right"><?php echo $orders->diskon_member*1 ?>%</td>
						</tr>
						<!-- <tr>
							<td>PPN</td>
							<td>:</td>
							<td align="right"><?php //echo $ppn->opsi ?>%</td>
						</tr> -->
						<!-- <tr>
							<td>Total Netto</td>
							<td>:</td>
							<td align="right"><?php //echo number_format($total_netto,0,',','.') ?></td>
						</tr> -->
						<?php if ($orders->ongkir > 0) { ?>
						<tr>
							<td>Ongkos kirim</td>
							<td>:</td>
							<td align="right"><?php echo number_format($orders->ongkir,0,',','.') ?></td>
						</tr>
						<?php } ?>
						<tr>
							<td>Total</td>
							<td>:</td>
							<td align="right"><?php echo number_format($total_harga,0,',','.') ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</tbody>		
	</table>
	<table style="width:60%;text-align:center;">
	  <tr>
	  	<td style="vertical-align: top;">Diterima<br><br><br></td>
	  	<td style="vertical-align: top;">Hormat Kami<br><br><br></td>
	  </tr>
	</table>
</body>
</html>