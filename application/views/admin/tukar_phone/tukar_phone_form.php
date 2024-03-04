<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="">Tukar Tambah</li>
                <li class="active">Tambah baru</li>
            </ul><!-- /.breadcrumb -->


        </div>

        <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <?php echo $theme_option ?>



                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>
                    </div><!-- /.pull-left -->

                    <div class="pull-left width-50">
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>
                    </div><!-- /.pull-left -->
                </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <div class="page-header">
                <h1>
                    Tukar Tambah
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="varchar">Tanggal Transaksi <?php echo form_error('tgl_order') ?></label>
                        <input type="text" name="tgl" class="form-control input-2" id="tgl" placeholder="Tanggal Transaksi" value="" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="varchar">Sales <?php echo form_error('id_sales') ?></label>
                        <select name="id_sales" class="form-control" id="tgl">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row m-switch">
                <div class="col-xs-2">
                    <div class="form-group">
                        <select class="form-control status_member input-2" style="width:100%;">
                            <option value="1">BUKAN MEMBER</option>
                            <option value="2">MEMBER</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                        <input type="text" class="form-control nama_pembeli input-2" autocomplete="off" value="" placeholder="Nama Pembeli" />
                    </div>
                </div>
                <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                        <input type="text" class="form-control alamat_pembeli input-2" autocomplete="off" value="" placeholder="Alamat Pembeli" />
                    </div>
                </div>
                <div class="col-xs-3" style="padding-left:0px;">
                    <div class="form-group">
                        <input type="text" class="form-control no_hp input-2" autocomplete="off" value="" placeholder="No HP" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h4 style="margin-bottom:0px;"><i class="fa fa-arrow-down"></i> Beli</h4>
                    <div class="hr hr10 hr-dotted"></div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control alamat_pembeli input-2" autocomplete="off" value="" placeholder="IMEI" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control alamat_pembeli input-2" autocomplete="off" value="" placeholder="Nama Produk" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control alamat_pembeli input-2" autocomplete="off" value="" placeholder="Kategori Produk" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 style="margin-bottom:0px;"><i class="fa fa-arrow-up"></i> Jual</h4>
                    <div class="hr hr10 hr-dotted"></div>
                    <input type="text" class="form-control alamat_pembeli input-2" autocomplete="off" value="" placeholder="Cari Produk" />
                </div>
            </div><!-- /.row -->
            <div class="hr hr10 hr-dotted"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="varchar">Pembayaran <?php echo form_error('pembayaran') ?></label>
                        <select class="form-control input-2" style="width:100%;">
                            <option value="1">TUNAI</option>
                            <option value="2">TRANSFER</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="varchar">Nominal Bayar <?php echo form_error('bayar_jual') ?></label>
                        <input type="text" name="bayar_jual" class="form-control input-2" id="tgl" placeholder="Nominal Bayar" value="" />
                    </div>
                </div>
            </div>
            <div class="hr hr32 hr-dotted"></div>
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->