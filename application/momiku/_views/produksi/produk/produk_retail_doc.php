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
        <h2>Produk_retail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Barcode</th>
		<th>Kategori</th>
		<th>Nama Produk</th>
		<th>Deskripsi</th>
		<th>Harga 1</th>
		<th>Harga 2</th>
		<th>Harga 3</th>
		<th>Stok</th>
		<th>Satuan</th>
		<th>Mingros</th>
		<th>Diskon</th>
		<th>Dibeli</th>
		
            </tr><?php
            foreach ($produk_retail_data as $produk_retail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $produk_retail->barcode ?></td>
		      <td><?php echo $produk_retail->nama_kategori ?></td>
		      <td><?php echo $produk_retail->nama_produk ?></td>
		      <td><?php echo $produk_retail->deskripsi ?></td>
		      <td><?php echo $produk_retail->harga_1 ?></td>
		      <td><?php echo $produk_retail->harga_2 ?></td>
		      <td><?php echo $produk_retail->harga_3 ?></td>
		      <td><?php echo $produk_retail->stok ?></td>
		      <td><?php echo $produk_retail->satuan_produk ?></td>
		      <td><?php echo $produk_retail->mingros ?></td>
		      <td><?php echo $produk_retail->diskon ?></td>
		      <td><?php echo $produk_retail->dibeli ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>