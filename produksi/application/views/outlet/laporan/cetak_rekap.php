<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cetak Rekap Penjualan</title>
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
<body>
	<div class="main">
		<h2><?php echo $toko->nama_toko ?></h2>
		<span><?php echo $toko->alamat ?> - <?php echo $toko->telp ?></span>
		<div class="space"></div>
		<h3>Rekap Penjualan</h3>
		BULAN <span><?php echo $bulan ?> <?php echo $tahun ?></span>
	      <table class="table" border="1">
	        <thead>
	          <tr>
	              <th>No</th>
	              <th>Penjualan
	              </th>
	              <th>Produk</th>
	              <th>HPP/Jual</th>
	              <th>Diskon</th>
	              <th>Jml</th>
	              <th>Total HPP/Total Bayar</th>
	              <th>Diskon Member</th>
	              <th>Laba Bersih</th>
	          </tr>
	        </thead>
	        <tbody>
		        	<?php $i = 1;foreach ($data_order as $do): 
		        		if(!empty($do->pembeli)){
		        			$nama = $do->nama_kustomer.' - '.$do->alamat_pembeli;
		        		}else{
		        			$nama = $do->bukan_member;
		        		}
		        	?>
	        		<?php 
	        			$data_order_detail = $this->db->select('orders_detail.*, produk_retail.nama_produk')
	        										  ->from('orders_detail')
	        										  ->join('produk_retail', 'produk_retail.id_produk_2=orders_detail.id_produk')
	        										  ->join('pembelian', 'pembelian.id_produk=orders_detail.id_produk')
	        										  ->where('orders_detail.id_orders_2', $do->id_orders_2)
	        										  ->where('produk_retail.id_toko = '.$toko->id)
	        										  ->group_by('orders_detail.id_orders')
	        										  ->get()->result();
	        			$data_produk = "";
	        			$data_hpp_jual = "";
	        			$data_diskon = "";
	        			$data_jml = "";
	        			$data_total = "";
        				foreach ($data_order_detail as $dod):
        					$data_produk .= $dod->nama_produk.'<br><br>';
        					$data_hpp_jual .= number_format($dod->harga_satuan,0,',','.').'<br>'.number_format($dod->harga_jual,0,',','.').'<br>';
        					$data_diskon .= number_format($dod->potongan,0,',','.').'<br>('.$dod->diskon.' %) <br>';
        					$data_jml .= $dod->jumlah.' <br><br>';
        					$data_total .= number_format($dod->harga_satuan*$dod->jumlah,0,',','.').' <br>'.number_format($dod->subtotal,0,',','.').'<br>';
        				endforeach;
	        		?>
	        		<tr>
	        			<td><?php echo $i; ?></td>
	        			<td align="left" valign="top"><?php echo $do->tgl_order.' '.$do->jam_order.'<br> Faktur : '.$do->no_faktur.'<br> Kasir : '.$do->first_name.'<br> Pembeli : '.$nama;?></td>
	        			<td>
	        				<?php echo $data_produk ?>
	        			</td>
	        			<td>
	        				<?php echo $data_hpp_jual ?>
	        			</td>
	        			<td>
	        				<?php echo $data_diskon ?>
	        			</td>
	        			<td>
	        				<?php echo $data_jml ?>
	        			</td>
	        			<td>
	        				<?php echo $data_total ?>
	        			</td>
	        			<td>
	        				<?php echo number_format($do->diskon_member,0,',','.') ?>
	        			</td>
	        			<td>
	        				<?php echo number_format($do->laba_bersih,0,',','.') ?>
	        			</td>
	        			
	        		</tr>
	        	<?php $i++;endforeach ?>
	        </tbody>
	      </table>
	      <br>
	      <br>
	      <div style="float:right;">
	      	Dicetak pada tanggal : <?php echo date('d-m-Y H:i:s') ?>
	      </div>
	</div>
</body>
</html>