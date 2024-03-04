
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Arus Kas</li>
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
                <?php echo $j ?>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="varchar">Tgl <?php echo form_error('tgl') ?></label>
                        <input type="text" class="form-control" name="tgl" id="datepicker1" placeholder="dd-mm-yyyy" readonly value="<?php echo $tgl; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar"><span id="nama_kas"><?php echo $nama_kas ?></span> <?php echo form_error('id_akun') ?></label>
                        <select class="form-control" name="id_akun" id="id_akun">
                          <?php foreach ($data_akun as $key): ?>
                            <?php if ($key->id_akun == $id_akun) { ?>
                              <option selected value="<?php echo $key->id_akun ?>"><?php echo $key->nama_akun ?></option>
                            <?php } else { ?>
                              <option value="<?php echo $key->id_akun ?>"><?php echo $key->nama_akun ?></option>
                            <?php } ?>
                          <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nominal <?php echo form_error('nominal') ?></label>
                        <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo number_format(!empty($nominal) ?$nominal : 0,0,',','.'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Keterangan <?php echo form_error('ket') ?></label>
                        <textarea class="form-control" name="ket" id="ket" placeholder="Keterangan"><?php echo $ket ?></textarea>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <input type="hidden" name="id_kas" value="<?php echo $id_kas; ?>" />
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                    <button type="button" onclick="javascript:history.back();" class="btn btn-default">Cancel</button>
                </form>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
jQuery(function($){
  $("#id_kas").on('change', function(){
    var id_kas = $(this).val();
    var nama_kas = (id_kas==1) ? 'Nama Pendapatan' : 'Nama Pengeluaran';
    $("#nama_kas").html(nama_kas);
  });
  $("#nominal").on('keyup', function(){
    var nominal = $(this).val().replace(/\./g,'');
    $(this).val(number_format(nominal*1,0,',','.'));
  });
});
</script>