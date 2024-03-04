
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Data</li>
              <li class="active">Hutang</li>
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
                Hutang <?php echo $button ?>
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  overview &amp; stats
                </small>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="<?php echo $action; ?>" method="post">
                    <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko" value="<?php echo $id_toko; ?>" />
                    <input type="hidden" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" />
                    <div class="form-group">
                        <label for="varchar">Tgl <?php echo form_error('tgl') ?></label>
                        <input type="text" class="form-control" name="tgl" id="datepicker1" placeholder="Tgl" value="<?php echo $tgl; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">No Faktur <?php echo form_error('no_faktur') ?></label>
                        <input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur" value="<?php echo $no_faktur; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Barcode <?php echo form_error('barcode') ?></label>
                        <input type="text" class="form-control" name="barcode" id="barcode" placeholder="Barcode" value="<?php echo $barcode; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Barang <?php echo form_error('barang') ?></label>
                        <input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="double">Hutang <?php echo form_error('hutang') ?></label>
                        <input type="text" class="form-control" name="hutang" id="hutang" placeholder="Hutang" value="<?php echo $hutang; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="double">Bayar <?php echo form_error('bayar') ?></label>
                        <input type="text" class="form-control" name="bayar" id="bayar" placeholder="Bayar" value="<?php echo $bayar; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="double">Kurang <?php echo form_error('kurang') ?></label>
                        <input type="text" class="form-control" name="kurang" id="kurang" placeholder="Kurang" value="<?php echo $kurang; ?>" readonly />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('outlet/hutang_retail') ?>" class="btn btn-default">Cancel</a>
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
      var hutang = $("#hutang").val().replace(/\./g,'');
      var bayar = $("#bayar").val().replace(/\./g,'');
      var kurang = hutang - bayar;
      $("#hutang").val(tandaPemisahTitik(hutang));
      $("#bayar").val(tandaPemisahTitik(bayar));
      $("#kurang").val(tandaPemisahTitik(kurang));
    };

    $("#hutang, #bayar").keyup(function(){
      hitung();
    });
  });
</script>
<!-- JQUERY -->