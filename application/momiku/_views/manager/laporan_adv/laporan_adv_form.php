<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
            </li>
            <li class=""><?php echo $this->uri->segment(1);?></li>
            <li class="active"><?php echo $this->uri->segment(2);?></li>
        </ul><!-- /.breadcrumb -->

        
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <h2 style="margin-top:0px"><?php echo $button ?> Laporan</h2>
                    <form action="<?php echo $action; ?>" method="post">

                        <div class="form-group">
                            <label for="double">Group CS <?php echo form_error('group_cs') ?></label>
                            <select name="id_group" id="id_group" class="form-control">
                                <option>Pilih</option>
                                <?php foreach($group_cs as $group){?>
                                <option value="<?php echo $group->id;?>" <?php if($group->id == $id_group){ echo 'selected';}?>><?php echo $group->group;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="double">Produk <?php echo form_error('data_produk') ?></label>
                            <select name="id_produk" id="id_produk" class="form-control">
                                <option>Pilih</option>
                                <?php foreach($data_produk as $produk){?>
                                <option value="<?php echo $produk->id_produk_2;?>" <?php if($produk->id_produk_2 == $id_produk){ echo 'selected';}?>><?php echo $produk->nama_produk;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal <?php echo form_error('tanggal') ?></label>
                            <input type="text" class="form-control" name="tanggal" id="datepicker1" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="double">Konversi <?php echo form_error('konversi') ?></label>
                            <input type="text" class="form-control" name="konversi" id="konversi" placeholder="Konversi" value="<?php echo $konversi; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="double">Klik <?php echo form_error('klik') ?></label>
                            <input type="text" class="form-control" name="klik" id="klik" placeholder="Klik" value="<?php echo $klik; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="double">View <?php echo form_error('view') ?></label>
                            <input type="text" class="form-control" name="view" id="view" placeholder="View" value="<?php echo $view; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="double">Anggaran <?php echo form_error('anggaran') ?></label>
                            <input type="text" class="form-control" name="anggaran" id="anggaran" placeholder="Masukan anggaran" value="<?php echo $anggaran; ?>" />
                        </div>

                        <h4>Data Akun Iklan</h4>
                        <div class="form-group">
                            <label for="double">Akun 1 <?php echo form_error('anggaran') ?></label>
                            <input type="number" class="form-control" name="akun_1" id="akun_1" placeholder="Masukan akun 1" value="<?php echo $anggaran; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="double">Akun 2 <?php echo form_error('anggaran') ?></label>
                            <input type="number" class="form-control" name="akun_2" id="akun_2" placeholder="Masukan akun 2" value="<?php echo $anggaran; ?>" />
                        </div>
                   
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('advertiser/laporan_adv') ?>" class="btn btn-default">Cancel</a>
                </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->