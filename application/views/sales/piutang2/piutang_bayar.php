
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
                  <div class="row">
                    <!-- <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="varchar">No Faktur <?php // echo form_error('no_faktur') ?></label>
                            <input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur" value="<?php // echo $no_faktur; ?>" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="int">Pembeli <?php // echo form_error('id_pembeli') ?></label>
                            <select name="id_pembeli" id="id_pembeli" class="form-control" disabled>
                              <?php // foreach ($data_pembeli as $key):
                              // if ($key->id_member==$id_pembeli) { ?>
                                <option selected value="<?php // echo $key->id ?>"><?php // echo $key->nama ?></option>
                              <?php // } else { ?>
                                <option value="<?php // echo $key->id ?>"><?php // echo $key->nama ?></option>
                              <?php // } ?>                        
                              <?php // endforeach ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="varchar">Tanggal Hutang <?php // echo form_error('tanggal') ?></label>
                            <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal Hutang" value="<?php // echo $tanggal; ?>" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="varchar">Deadline <?php // echo form_error('deadline') ?></label>
                            <input type="text" class="form-control" name="deadline" id="deadline" placeholder="Deadline" value="<?php // echo $deadline; ?>" readonly />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="double">Hutang <?php // echo form_error('jumlah_hutang') ?></label>
                            <input type="text" class="form-control text-right" name="jumlah_hutang" id="jumlah_hutang" placeholder="Jumlah Hutang" value="<?php // echo number_format($jumlah_hutang,0,',','.'); ?>" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="double">Total Bayar <?php // echo form_error('jumlah_bayar') ?></label>
                            <input type="text" class="form-control text-right" name="jumlah_bayar" id="jumlah_bayar" placeholder="Jumlah Bayar" value="<?php // echo number_format($jumlah_bayar*1,0,',','.') ?>" readonly />
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="double">Tanggal Bayar <?php echo form_error('tgl_bayar') ?></label>
                        <input type="text" class="form-control" name="tgl_bayar" id="datepicker1" placeholder="dd-mm-yyyy" value="<?php echo $tgl_bayar ?>" />
                      </div>
                      <div class="form-group">
                        <label for="int">Pembeli <?php echo form_error('id_pembeli') ?></label>
                        <input type="hidden" name="id_pembeli" id="id_pembeli" value="<?php echo $id_pembeli ?>">
                        <select class="form-control" disabled>
                          <?php foreach ($data_pembeli as $key):
                          if ($key->id_member==$id_pembeli) { ?>
                            <option selected value="<?php echo $key->id ?>"><?php echo $key->nama ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $key->id ?>"><?php echo $key->nama ?></option>
                          <?php } ?>                        
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="double">Bayar <?php echo form_error('bayar') ?></label>
                            <input type="text" class="form-control text-right" name="bayar" id="bayar" placeholder="Bayar" value="<?php echo $bayar ?>" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="double">Sisa Hutang <?php echo form_error('sisa') ?></label>
                            <input type="text" class="form-control text-right" name="sisa" id="sisa" placeholder="Sisa Hutang" value="<?php echo number_format($sisa*1,0,',','.'); ?>" readonly />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="double">Keterangan <?php echo form_error('ket') ?></label>
                        <textarea name="ket" class="form-control" id="ket" rows="4" placeholder="Keterangan"><?php echo $ket ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top:10px;">
                    <div class="col-md-12 text-center">
                      <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                      <a href="<?php echo site_url('admin/piutang2/read/').$id_pembeli ?>" class="btn btn-success">Lihat</a>
                      <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                      <a href="<?php echo site_url('admin/piutang2') ?>" class="btn btn-default">Cancel</a>
                    </div>
                  </div>
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
    // var jumlah_hutang = $("#jumlah_hutang").val().replace(/\./g,'');
    var jumlah_bayar = $("#bayar").val().replace(/\./g,'')*1;
    $("#bayar").val(number_format(jumlah_bayar*1,0,',','.'));
    // var sisa = (jumlah_hutang*1-<?php // echo $jumlah_bayar*1 ?>) - jumlah_bayar*1;
    // $("#jumlah_hutang").val(number_format(jumlah_hutang*1,0,',','.'));
    // $("#bayar").val(number_format(jumlah_bayar*1,0,',','.'));
    var sisa = <?php echo $sisa*1 ?>-jumlah_bayar;
    $("#sisa").val(number_format(sisa*1,0,',','.'));
  };
  $("#bayar").keyup(function(){
    hitung();
  });
});
</script>
<!-- JQUERY -->