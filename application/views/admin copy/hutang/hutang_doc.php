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
        <h2>Hutang List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tgl</th>
		<th>Id Toko</th>
		<th>Id Users</th>
		<th>No Faktur</th>
		<th>Barcode</th>
		<th>Barang</th>
		<th>Hutang</th>
		<th>Bayar</th>
		<th>Kurang</th>
		
            </tr><?php
            foreach ($hutang_retail_data as $hutang_retail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $hutang_retail->tgl ?></td>
		      <td><?php echo $hutang_retail->id_toko ?></td>
		      <td><?php echo $hutang_retail->id_users ?></td>
		      <td><?php echo $hutang_retail->no_faktur ?></td>
		      <td><?php echo $hutang_retail->barcode ?></td>
		      <td><?php echo $hutang_retail->barang ?></td>
		      <td><?php echo $hutang_retail->hutang ?></td>
		      <td><?php echo $hutang_retail->bayar ?></td>
		      <td><?php echo $hutang_retail->kurang ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>