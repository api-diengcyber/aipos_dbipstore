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
        <h2>Supplier List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Toko</th>
		<th>Nama Supplier</th>
		<th>Alamat</th>
		<th>Kota</th>
		<th>Telp</th>
		<th>Fax</th>
		<th>Cp</th>
		<th>Telp Cp</th>
		<th>Ket</th>
		
            </tr><?php
            foreach ($supplier_data as $supplier)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $supplier->id_toko ?></td>
		      <td><?php echo $supplier->nama_supplier ?></td>
		      <td><?php echo $supplier->alamat ?></td>
		      <td><?php echo $supplier->kota ?></td>
		      <td><?php echo $supplier->telp ?></td>
		      <td><?php echo $supplier->fax ?></td>
		      <td><?php echo $supplier->cp ?></td>
		      <td><?php echo $supplier->telp_cp ?></td>
		      <td><?php echo $supplier->ket ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>