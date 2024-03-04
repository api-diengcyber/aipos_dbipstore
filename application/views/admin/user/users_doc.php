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
            foreach ($akun_data as $akun)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $akun->id_toko ?></td>
		      <td><?php echo $akun->ip_address ?></td>
		      <td><?php echo $akun->username ?></td>
		      <td><?php echo $akun->password ?></td>
		      <td><?php echo $akun->salt ?></td>
		      <td><?php echo $akun->email ?></td>
		      <td><?php echo $akun->activation_code ?></td>
		      <td><?php echo $akun->forgotten_password_code ?></td>
		      <td><?php echo $akun->forgotten_password_time ?></td>
		      <td><?php echo $akun->remember_code ?></td>
		      <td><?php echo $akun->created_on ?></td>
		      <td><?php echo $akun->last_login ?></td>
		      <td><?php echo $akun->active ?></td>
		      <td><?php echo $akun->first_name ?></td>
		      <td><?php echo $akun->last_name ?></td>
		      <td><?php echo $akun->company ?></td>
		      <td><?php echo $akun->phone ?></td>
		      <td><?php echo $akun->level ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>