<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
</head>
<body>

<?php
$orders_detail = $this->db->select('od.*, pr.nama_produk, o.no_faktur, o.pembeli, o.bukan_member, o.id_sales, o.tgl_order, o.jam_order, m.nama AS nama_member')
						  ->from('orders_detail od')
						  ->join('(SELECT * FROM produk_retail WHERE id_toko="'.$data_login['id_toko'].'") AS pr', 'od.id_produk=pr.id_produk_2')
						  ->join('(SELECT * FROM orders WHERE id_toko="'.$data_login['id_toko'].'") AS o', 'od.id_orders_2=o.id_orders_2')
						  ->join('(SELECT * FROM member WHERE id_toko="'.$data_login['id_toko'].'") AS m', 'o.pembeli=m.id_member', 'left')
						  ->where('od.id_toko', $data_login['id_toko'])
						  ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "2019-01-01" AND "2019-01-31"')
						  // ->where('o.pembeli!=','null')
						  // ->where('o.id_sales > 0')
						  ->order_by('od.id_orders_2', 'asc')
						  ->get()->result();
?>
<table border="1">
	<tr>
		<td>No</td>
		<td>id_orders_2</td>
		<td>no_faktur</td>
		<td>tgl_order</td>
		<td>id_pembeli</td>
		<td>nama_member</td>
		<td>bukan_member</td>
		<td>id_sales</td>
		<td>nama_produk</td>
		<td>subtotal</td>
	</tr>
	<?php
	$no = 0; 
	$total = 0;
	$tidak_ada_toko = 0;
	foreach ($orders_detail as $key):
	$no++;
	$style = '';
	if ($key->pembeli*1 == 0) {
		$tidak_ada_toko++;
		$style = 'background-color:red;color:white;';
	}
	?>
	<tr style="<?php echo $style ?>">
		<td><?php echo $no ?></td>
		<td><?php echo $key->id_orders_2 ?></td>
		<td><?php echo $key->no_faktur ?></td>
		<td><?php echo $key->tgl_order." ".$key->jam_order ?></td>
		<td>p-<?php echo $key->pembeli ?></td>
		<td><?php echo $key->nama_member ?></td>
		<td><?php echo $key->bukan_member ?></td>
		<td>s-<?php echo $key->id_sales ?></td>
		<td><?php echo $key->nama_produk ?></td>
		<td align="right"><?php echo $key->subtotal ?></td>
	</tr>
	<?php 
	$total+=$key->subtotal;
	endforeach ?>
	<tr>
		<td colspan="9" align="right">TOTAL</td>
		<td align="right"><?php echo $total ?></td>
	</tr>
	<tr>
		<td colspan="9" align="right">TIDAK ADA TOKO</td>
		<td align="right">
			<?php echo $tidak_ada_toko ?> / <?php echo $no ?><br>
			<?php
			$persen = (100/$no)*$tidak_ada_toko;
			echo $persen."%";
			?>
		</td>
	</tr>
</table>
</body>
</html>