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
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Toko</th>
		<th>Ip Address</th>
		<th>Username</th>
		<th>Password</th>
		<th>Salt</th>
		<th>Email</th>
		<th>Activation Code</th>
		<th>Forgotten Password Code</th>
		<th>Forgotten Password Time</th>
		<th>Remember Code</th>
		<th>Created On</th>
		<th>Last Login</th>
		<th>Active</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Company</th>
		<th>Phone</th>
		<th>Level</th>
		
            </tr><?php
            foreach ($pegawai_retail_data as $pegawai_retail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pegawai_retail->id_toko ?></td>
		      <td><?php echo $pegawai_retail->ip_address ?></td>
		      <td><?php echo $pegawai_retail->username ?></td>
		      <td><?php echo $pegawai_retail->password ?></td>
		      <td><?php echo $pegawai_retail->salt ?></td>
		      <td><?php echo $pegawai_retail->email ?></td>
		      <td><?php echo $pegawai_retail->activation_code ?></td>
		      <td><?php echo $pegawai_retail->forgotten_password_code ?></td>
		      <td><?php echo $pegawai_retail->forgotten_password_time ?></td>
		      <td><?php echo $pegawai_retail->remember_code ?></td>
		      <td><?php echo $pegawai_retail->created_on ?></td>
		      <td><?php echo $pegawai_retail->last_login ?></td>
		      <td><?php echo $pegawai_retail->active ?></td>
		      <td><?php echo $pegawai_retail->first_name ?></td>
		      <td><?php echo $pegawai_retail->last_name ?></td>
		      <td><?php echo $pegawai_retail->company ?></td>
		      <td><?php echo $pegawai_retail->phone ?></td>
		      <td><?php echo $pegawai_retail->level ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>