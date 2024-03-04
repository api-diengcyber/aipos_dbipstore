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
        <h2>Member List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Toko</th>
		<th>Kode</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Telp</th>
		<th>Tgl Lahir</th>
		<th>Diskon</th>
		
            </tr><?php
            foreach ($member_data as $member)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $member->id_toko ?></td>
		      <td><?php echo $member->kode ?></td>
		      <td><?php echo $member->nama ?></td>
		      <td><?php echo $member->alamat ?></td>
		      <td><?php echo $member->telp ?></td>
		      <td><?php echo $member->tgl_lahir ?></td>
		      <td><?php echo $member->diskon ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>