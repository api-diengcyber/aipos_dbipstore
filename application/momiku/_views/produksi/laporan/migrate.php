<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Migrate <?php echo date('Y') ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table border="1">
		<tr>
			<th width="5">No</th>
			<th>Nama</th>
			<th>PKP</th>
			<th>PPN (%)</th>
			<th>Riwayat Penjualan</th>
			<th>Total Riwayat Penjualan</th>
			<th>Total PPN yang harus dibayar</th>
		</tr>
		<?php 
		$no = 1;
		$jml_total_ppn_baru = 0;
		foreach ($res_member as $key):
			if ($key->pkp=="1") {
				$key->persen_pajak = 10;
			}
			$res_orders = $this->db->select('id_orders_2, no_faktur, tgl_order, nominal')
								   ->from('orders')
								   ->where('id_toko', $data_login['id_toko'])
								   ->where('pembeli', $key->id_member)
								   ->order_by('id_orders_2', 'asc')
								   ->get()->result();
			$riwayat = '';
			$total_subtotal = 0;
			$total_ppn_baru = 0;
			foreach ($res_orders as $key_o) {
				$res_od = $this->db->select('harga_jual, harga_satuan, jumlah, jumlah_bonus, subtotal')
								   ->from('orders_detail')
								   ->where('id_toko', $data_login['id_toko'])
								   ->where('id_orders_2', $key_o->id_orders_2)
								   ->order_by('id_orders_2', 'asc')
								   ->get()->result();
				$jml_subtotal = 0;
				foreach ($res_od as $key_od) {
					$total_subtotal += $key_od->subtotal;
					$jml_subtotal += $key_od->subtotal;
				}
				$ppn_nominal = (10/100)*$jml_subtotal;
				if ($key->pkp!="1") {
					if ($key->persen_pajak > 0) {
						$ppn_nominal = ($key->persen_pajak/100)*$jml_subtotal;
					} else {
						$ppn_nominal = 0;
					}
				}

				if ($ppn_nominal > 0) {
					$row_check_jurnal = $this->db->where('id_akun', 75)->where('no_faktur', $key_o->no_faktur)->get('jurnal')->row();
					if (!$row_check_jurnal) {
				 		// INSERT PPN BARU [MARKETING] //
				 		$data_array = array(
				 			'id_toko' => $data_login['id_toko'],
				 			'kode' => 'RT-PENJUALAN-TUNAI',
				 			'tgl' => $key_o->tgl_order,
				 			'id_proses' => $key_o->id_orders_2,
				 			'id_akun' => 75,
				 			'debet' => 0,
				 			'kredit' => $ppn_nominal,
				 			'no_faktur' => $key_o->no_faktur,
				 			'keterangan' => 'Penjualan Barang Bayar Tunai',
				 		);
				 		$this->db->insert('jurnal', $data_array);
				 		// END INSERT //
					}
				}
				
				$total_ppn_baru += $ppn_nominal;
		 		$jml_subtotal_ppn = $jml_subtotal+$ppn_nominal;
				$riwayat .= 'TGL ORDER : '.$key_o->tgl_order.'<br>';
				$riwayat .= 'TOTAL SUB : '.number_format($jml_subtotal,0,',','.').'<br>';
				$riwayat .= 'NO PPN SUB : '.number_format($ppn_nominal,0,',','.').'<br>';
				$riwayat .= 'TOTAL+PPN : '.number_format($jml_subtotal_ppn,0,',','.').'<br>';
				$riwayat .= '<hr>';
			}
			$jml_total_ppn_baru += $total_ppn_baru;
			if ($total_ppn_baru > 0) :
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $key->nama ?></td>
			<td><?php echo $key->pkp ?></td>
			<td><?php echo $key->persen_pajak*1 ?>%</td>
			<td><?php echo $riwayat ?></td>
			<td><?php echo number_format($total_subtotal,0,',','.') ?></td>
			<td><?php echo number_format($total_ppn_baru,0,',','.') ?></td>
		</tr>
		<?php 
			endif;
		$no++;
		endforeach;
		?>
	</table>
	<hr><br>
	<b>TOTAL PPN BARU : <?php echo number_format($jml_total_ppn_baru,0,',','.') ?></b>
	<br><br><br>
</body>
</html>