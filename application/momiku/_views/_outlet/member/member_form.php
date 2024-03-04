
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Data</li>
              <li class="active">Pelanggan</li>
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
                Pelanggan
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="<?php echo $action; ?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <?php if (!empty($id)) { ?>
                      <div class="form-group">
                          <label for="varchar">Kode <?php echo form_error('kode') ?></label>
                          <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" />
                      </div>
                      <?php } else { ?>
                      <div class="form-group">
                          <label for="varchar">Kode <?php echo form_error('kode') ?></label>
                          <div class="input-group">
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" readonly />
                            <span class="input-group-addon" style="padding:0px;margin:0px;border:0px;">
                            <input type="text" class="form-control" name="custom_code" value="" style="width:50px;" maxlength="3" />
                            </span>
                          </div>
                      </div>
                      <?php } ?>
                      <div class="form-group">
                          <label for="varchar">Sales <?php echo form_error('id_sales') ?></label>
                          <select class="form-control" name="id_sales" id="id_sales">
                            <option value="">-- Pilih Sales --</option>
                            <?php foreach ($data_sales as $key): ?>
                              <option value="<?php echo $key->id_users; ?>" <?php echo $key->id_users==$id_sales ? "selected" : "" ; ?>><?php echo $key->first_name.' '.$key->last_name ?></option>
                            <?php endforeach ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Kota <?php echo form_error('id_kota') ?></label>
                          <select class="form-control" name="id_kota" id="id_kota">
                          <?php foreach ($data_kota as $key): ?>
                            <option value="<?php echo $key->id ?>" <?php echo $key->id==$id_kota?"selected":"" ?>><?php echo $key->nama_kota ?></option>
                          <?php endforeach ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="varchar">Pilihan Harga <?php echo form_error('id_pil_harga') ?></label>
                          <select class="form-control" name="id_pil_harga" id="id_pil_harga">
                            <option value="1" <?php echo $id_pil_harga=="1"?"selected":"" ?>>Harga produksi</option>
                            <option value="2" <?php echo $id_pil_harga=="2"?"selected":"" ?>>Harga Reseller Kecil</option>
                            <option value="3" <?php echo $id_pil_harga=="3"?"selected":"" ?>>Harga Reseller Besar</option>
                            <option value="4" <?php echo $id_pil_harga=="4"?"selected":"" ?>>Harga Agen Kecil</option>
                            <option value="5" <?php echo $id_pil_harga=="5"?"selected":"" ?>>Harga Agen Besar</option>
                            <option value="6" <?php echo $id_pil_harga=="6"?"selected":"" ?>>Harga Luar Kota / Online</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="varchar">Telp <?php echo form_error('telp') ?></label>
                          <input type="number" class="form-control" name="telp" id="telp" placeholder="Telp" value="<?php echo $telp; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Diskon ( % ) <?php echo form_error('diskon') ?></label>
                          <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Diskon" value="<?php echo $diskon; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Faktur Pajak</label>
                          <select class="form-control" name="pkp" id="pkp">
                            <option value="0" <?php echo $pkp==0 ? "selected" : "" ?>>Faktur Pajak Manual</option>
                            <option value="1" <?php echo $pkp==1 ? "selected" : "" ?>>Kena Faktur Pajak 10%</option>
                          </select>
                      </div>
                      <div class="form-group panelPersenPajak" style="display:none;">
                          <label for="varchar">Isi Faktur Pajak (%)</label>
                          <input type="text" class="form-control" name="persen_pajak" id="persen_pajak" placeholder="Faktur Pajak (%)" value="<?php echo $persen_pajak; ?>" />
                      </div>
                    </div>
                  </div>

                  <div class="row" style="margin-top: 20px;">
                    <div class="col-xs-12 text-center">
                      <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                      <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                      <a href="<?php echo site_url('outlet/member_retail') ?>" class="btn btn-default">Cancel</a>
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

<script>
$(document).ready(function(){
  function checkPkp() {
    var pkp = $("#pkp").find(":selected").val();
    if (pkp*1==1) {
      $(".panelPersenPajak").hide();
      $("#persen_pajak").val(0);
    } else {
      $(".panelPersenPajak").show();
      // $("#persen_pajak").focus();
    }
  }
  checkPkp();
  $("#pkp").on("change", function(){
    checkPkp();
  });
});
</script>