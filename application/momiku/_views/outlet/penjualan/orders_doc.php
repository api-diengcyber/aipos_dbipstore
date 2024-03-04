<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Orders List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Toko</th>
		<th>Id Users</th>
		<th>No Faktur</th>
		<th>Nama Kustomer</th>
		<th>Pembeli</th>
		<th>Pembayaran</th>
		<th>Deadline</th>
		<th>Tgl Order</th>
		<th>Jam Order</th>
		<th>Nominal</th>
		<th>Laba</th>
		
            </tr><?php
            foreach ($penjualan_retail_data as $penjualan_retail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $penjualan_retail->id_toko ?></td>
		      <td><?php echo $penjualan_retail->id_users ?></td>
		      <td><?php echo $penjualan_retail->no_faktur ?></td>
		      <td><?php echo $penjualan_retail->nama_kustomer ?></td>
		      <td><?php echo $penjualan_retail->pembeli ?></td>
		      <td><?php echo $penjualan_retail->pembayaran ?></td>
		      <td><?php echo $penjualan_retail->deadline ?></td>
		      <td><?php echo $penjualan_retail->tgl_order ?></td>
		      <td><?php echo $penjualan_retail->jam_order ?></td>
		      <td><?php echo $penjualan_retail->nominal ?></td>
		      <td><?php echo $penjualan_retail->laba ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>