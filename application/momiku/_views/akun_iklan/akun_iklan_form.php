<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Akun_iklan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Group <?php echo form_error('id_group') ?></label>
            <input type="text" class="form-control" name="id_group" id="id_group" placeholder="Id Group" value="<?php echo $id_group; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Akun <?php echo form_error('akun') ?></label>
            <input type="text" class="form-control" name="akun" id="akun" placeholder="Akun" value="<?php echo $akun; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('akun_iklan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>