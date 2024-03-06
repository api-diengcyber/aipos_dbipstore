<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>
                <li class="">Data Stok</li>
                <li class="active">Mutasi Stok</li>
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
                    Mutasi Stok
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Tgl <?php echo form_error('tgl') ?></label>
                            <input type="text" class="form-control" name="tgl" id="datepicker2" placeholder="Tgl" value="<?php echo $tgl; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Asal <?php echo form_error('id_users_asal') ?></label>
                            <input type="text" class="form-control" name="nama_users_asal" id="nama_users_asal" placeholder="Asal" value="" />
                            <input type="hidden" name="id_users_asal" id="id_users_asal" value="<?php echo $id_users_asal; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Produk <?php echo form_error('id_produk') ?></label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Produk" value="" />
                            <input type="hidden" name="id_produk" id="id_produk" value="<?php echo $id_produk; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="int">Tujuan <?php echo form_error('id_users_tujuan') ?></label>
                            <input type="text" class="form-control" name="nama_users_tujuan" id="nama_users_tujuan" placeholder="Tujuan" value="" />
                            <input type="hidden" name="id_users_tujuan" id="id_users_tujuan" value="<?php echo $id_users_tujuan; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                        <a href="<?php echo site_url('admin/produk_retail_mutasi') ?>" class="btn btn-default">Cancel</a>
                    </form>
                    <div class="hr hr32 hr-dotted"></div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->

<script>
    $(document).ready(function() {
        $("#nama_produk").autocomplete({
            source: function(request, response) {
                $('input[name="nama_produk"]').css({
                    'border-color': '#bbb'
                });
                $('input[name="id_produk"]').val('');
                $.ajax({
                    url: '<?php echo base_url() ?>admin/produk_retail_mutasi/get_user_produk',
                    type: 'post',
                    data: {
                        'term': request.term,
                        'id_users': $('input[name="id_users_asal"]').val(),
                    },
                    success: function(data) {
                        response($.map(data, function(value, key) {
                            return {
                                value: value.id_produk_2,
                                label: value.nama_produk + ' (' + value.deskripsi + ')',
                                data: value,
                                id_produk: value.id_produk_2,
                            };
                        }));
                    }
                });
            },
            minLength: 1,
            delay: 0,
            autoFocus: true,
            select: function(event, ui) {
                $('input[name="nama_produk"]').val(ui.item.label);
                $('input[name="id_produk"]').val(ui.item.id_produk);
                $('input[name="nama_produk"]').css({
                    'border-color': 'green'
                });
                return false;
            }
        });

        $("#nama_users_asal").autocomplete({
            source: function(request, response) {
                $('input[name="nama_users_asal"]').css({
                    'border-color': '#bbb'
                });
                $('input[name="id_users_asal"]').val('');
                $.ajax({
                    url: '<?php echo base_url() ?>admin/produk_retail_mutasi/get_user_cabang',
                    type: 'post',
                    data: {
                        'term': request.term,
                        'not_id_users': $('input[name="id_users_tujuan"]').val(),
                        'restrict_produk': 1,
                    },
                    success: function(data) {
                        response($.map(data, function(value, key) {
                            return {
                                value: value.id_users,
                                label: value.first_name + " " + value.last_name,
                                data: value,
                            };
                        }));

                    }
                });
            },
            minLength: 1,
            delay: 0,
            autoFocus: true,
            select: function(event, ui) {
                $('input[name="nama_users_asal"]').val(ui.item.label);
                $('input[name="id_users_asal"]').val(ui.item.value);
                $('input[name="nama_users_asal"]').css({
                    'border-color': 'green'
                });
                return false;
            }
        });

        $("#nama_users_tujuan").autocomplete({
            source: function(request, response) {
                $('input[name="nama_users_tujuan"]').css({
                    'border-color': '#bbb'
                });
                $('input[name="id_users_tujuan"]').val('');
                $.ajax({
                    url: '<?php echo base_url() ?>admin/produk_retail_mutasi/get_user_cabang',
                    type: 'post',
                    data: {
                        'term': request.term,
                        'not_id_users': $('input[name="id_users_asal"]').val(),
                    },
                    success: function(data) {
                        response($.map(data, function(value, key) {
                            return {
                                value: value.id_users,
                                label: value.first_name + " " + value.last_name,
                                data: value,
                            };
                        }));

                    }
                });
            },
            minLength: 1,
            delay: 0,
            autoFocus: true,
            select: function(event, ui) {
                $('input[name="nama_users_tujuan"]').val(ui.item.label);
                $('input[name="id_users_tujuan"]').val(ui.item.value);
                $('input[name="nama_users_tujuan"]').css({
                    'border-color': 'green'
                });
                return false;
            }
        });
    });
</script>