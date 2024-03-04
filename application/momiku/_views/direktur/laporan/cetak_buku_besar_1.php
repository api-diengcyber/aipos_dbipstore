<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Buku Besar 1</title>
	<link rel="stylesheet" href="">
	<style>
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
		table{
			border-collapse: collapse;
		}
		table, tr, th{
			border:1px solid black;
			padding:5px;
		}
		table, tr, td{
			border:1px solid black;
			padding:5px;
		}
	</style>
</head>
<body>
	<center>
		<h2><?php echo $toko->nama_toko ?></h2>
		<span><?php echo $toko->alamat ?> - <?php echo $toko->telp ?></span>
		<hr id="divider">
		<h3>Buku Besar 1</h3>
		Periode : <span><?php echo $awal_periode ?> - <?php echo $akhir_periode ?></span>
	  <table>
		<?php
		$i=1;
		foreach ($data_akun->result() as $akun):
		$saldo_awal = 0;
        $current_id_akun = 0;
		foreach ($data_saldo_awal->result() as $key_saldo) {
		if($key_saldo->id_akun == $akun->id){
        $current_id_akun = $akun->id;
		$saldo_awal = $key_saldo->saldo;
		}
		}
		$ak = substr($akun->kode,0,1);
		if($ak=='2' || $ak=='3'){
		$saldo_awal = $saldo_awal * -1;
		}else{
		$saldo_awal = $saldo_awal;
		}
		if ($level=="5") {
		$ppn_keluaran = 0;
		$ppn_keluaran_baru = 0;
		if ($current_id_akun==67) { // KAS BESAR
		foreach ($data_saldo_awal->result() as $key_saldo) :
		if ($key_saldo->id_akun == 59) { // PPN LAMA [ADMIN]
		$ppn_keluaran += $key_saldo->saldo*-1;
		}
		if ($key_saldo->id_akun == 75) { // PPN BARU [MARKETING]
		$ppn_keluaran_baru += $key_saldo->saldo*-1;
		}
		endforeach;
		$saldo_awal = $saldo_awal - $ppn_keluaran + $ppn_keluaran_baru;
		}
		}
		?>
		<tr>
		<th colspan="7" style="text-align:left;"><h3><?php echo $akun->kode ?> | <?php echo $akun->akun ?></h3></th>
		</tr>
		<tr>
		<th width="2" class="center">No</th>
		<th>Tanggal</th>
		<th>Kode</th>
		<th>Keterangan</th>
		<th>Debet (Rp) </th>
		<th>Kredit (Rp) </th>
		<tr>
		<th colspan="4" class="text-right"><span style="float:right;">Saldo Awal</span></th>
		<th colspan="2"><span style="float:right;"><?php echo number_format($saldo_awal,0,',','.') ?></span></th>
		</tr>
		<?php
		$no=1;
		$debet = 0;
		$kredit = 0;
		$current_id_akun = 0;
		foreach ($data_jurnal as $jurnal):
		if($jurnal->id_akun == $akun->id){
        $current_id_akun = $jurnal->id_akun;
		?>
		<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $jurnal->tgl ?></td>
		<td><?php echo $jurnal->kode ?></td>
		<td><?php echo $jurnal->keterangan ?></td>
		<td><span style="float:right;"><?php echo number_format($jurnal->debet,0,',','.') ?></span></td>
		<td><span style="float:right;"><?php echo number_format($jurnal->kredit,0,',','.') ?></span></td>
		</tr>
		<?php
		$debet += $jurnal->debet;
		$kredit += $jurnal->kredit;
		$no++;
		}
		endforeach;
		if($ak=='2' || $ak=='3'){
		$total = $debet - $kredit * -1;
		}else{
		$total = $debet - $kredit;
		}
		$saldo_akhir = $saldo_awal + $total;
		?>
		<tr>
		<th colspan="4"><span style="float:right;">Jumlah</span></th>
		<th><span style="float:right;"><?php echo number_format($debet,0,',','.') ?></span></th>
		<th><span style="float:right;"><?php echo number_format($kredit,0,',','.') ?></span></th>
		</tr>
		<tr>
		<th colspan="4"><span style="float:right;">Total</span></th>
		<th colspan="2"><span style="float:right;"><?php echo number_format($total,0,',','.') ?></span></th>
		</tr>
		<?php
		if ($level=="5") {
		$ppn_keluaran = 0;
		$ppn_keluaran_baru = 0;
		if ($current_id_akun==67) { // KAS BESAR
		foreach ($data_jurnal as $jurnal):
		if ($jurnal->id_akun == 59) { // PPN LAMA [ADMIN]
		$ppn_keluaran += $jurnal->kredit;
		}
		if ($jurnal->id_akun == 75) { // PPN BARU [MARKETING]
		$ppn_keluaran_baru += $jurnal->kredit;
		}
		endforeach;
		$saldo_akhir = $saldo_akhir-$ppn_keluaran+$ppn_keluaran_baru;
		?>
		<tr>
		<th colspan="4"><span style="float:right;">PPN Keluaran yang harus dibayar</span></th>
		<th colspan="2"><span style="float:right;"><?php echo number_format($ppn_keluaran_baru,0,',','.') ?></span></th>
		</tr>
		<?php } } ?>
		<tr>
		<th colspan="4"><span style="float:right;">Saldo</span></th>
		<th colspan="2"><span style="float:right;"><?php echo number_format($saldo_akhir,0,',','.') ?></span></th>
		</tr>
		</div>
		<div id="space"></div>
		<div id="space"></div>
		<?php $i++; endforeach ?>
	  </table>
	</center>

</body>
</html>