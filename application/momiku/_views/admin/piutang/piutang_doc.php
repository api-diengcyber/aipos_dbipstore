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
        <h2>Piutang</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Toko</th>
		<th>No Faktur</th>
		<th>Id Pembeli</th>
		<th>Jumlah Hutang</th>
		<th>Jumlah Bayar</th>
		<th>Sisa</th>
		<th>Tanggal</th>
		<th>Deadline</th>
		
            </tr><?php
            foreach ($piutang_retail_data as $piutang_retail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $piutang_retail->id_toko ?></td>
		      <td><?php echo $piutang_retail->no_faktur ?></td>
		      <td><?php echo $piutang_retail->id_pembeli ?></td>
		      <td><?php echo $piutang_retail->jumlah_hutang ?></td>
		      <td><?php echo $piutang_retail->jumlah_bayar ?></td>
		      <td><?php echo $piutang_retail->sisa ?></td>
		      <td><?php echo $piutang_retail->tanggal ?></td>
		      <td><?php echo $piutang_retail->deadline ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>