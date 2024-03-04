
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Data</li>
              <li class="active">Piutang</li>
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
                Piutang
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="<?php echo $action; ?>" method="post">
                    <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko" value="<?php echo $id_toko; ?>" />
                    <div class="form-group">
                        <label for="varchar">No Faktur <?php echo form_error('no_faktur') ?></label>
                        <input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Pembeli <?php echo form_error('id_pembeli') ?></label>
                        <select name="id_pembeli" id="id_pembeli" class="form-control" >
                          <?php foreach ($data_pembeli as $key):
                          if ($key->id_member==$id_pembeli) { ?>
                            <option selected value="<?php echo $key->id ?>"><?php echo $key->nama ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $key->id ?>"><?php echo $key->nama ?></option>
                          <?php } ?>                        
                          <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="double">Jumlah Hutang <?php echo form_error('jumlah_hutang') ?></label>
                        <input type="text" class="form-control" name="jumlah_hutang" id="jumlah_hutang" placeholder="Jumlah Hutang" value="<?php echo number_format($jumlah_hutang,0,',','.'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="double">Jumlah Bayar <?php echo form_error('jumlah_bayar') ?></label>
                        <input type="text" class="form-control" placeholder="Jumlah Bayar" value="<?php echo number_format($jumlah_bayar,0,',','.') ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="double">Bayar <?php echo form_error('jumlah_bayar') ?></label>
                        <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" placeholder="Bayar" value="" />
                    </div>
                    <div class="form-group">
                        <label for="double">Sisa Hutang <?php echo form_error('sisa') ?></label>
                        <input type="text" class="form-control" name="sisa" id="sisa" placeholder="Sisa Hutang" value="<?php echo $sisa; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Tanggal <?php echo form_error('tanggal') ?></label>
                        <input type="text" class="form-control" name="tanggal" id="datepicker1" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Deadline <?php echo form_error('deadline') ?></label>
                        <input type="text" class="form-control" name="deadline" id="datepicker2" placeholder="Deadline" value="<?php echo $deadline; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('admin/piutang2') ?>" class="btn btn-default">Cancel</a>
                </form>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<!-- JQUERY -->
<script>
jQuery(function($){
  var hitung = function(){
    var jumlah_hutang = $("#jumlah_hutang").val().replace(/\./g,'');
    var jumlah_bayar = $("#jumlah_bayar").val().replace(/\./g,'');
    var sisa = (jumlah_hutang*1-<?php echo $jumlah_bayar*1 ?>) - jumlah_bayar*1;
    $("#jumlah_hutang").val(number_format(jumlah_hutang*1,0,',','.'));
    $("#jumlah_bayar").val(number_format(jumlah_bayar*1,0,',','.'));
    $("#sisa").val(number_format(sisa*1,0,',','.'));
  };
  $("#jumlah_hutang, #jumlah_bayar").keyup(function(){
    hitung();
  });
});
</script>
<!-- JQUERY -->