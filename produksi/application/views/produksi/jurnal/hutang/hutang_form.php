
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Jurnal</li>
              <li class="active">Hutang</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- /.nav-search -->
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
                Bayar Hutang
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo $action ?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <input type="hidden" name="id" id="id" value="<?php echo $id_hutang ?>">
                      <input type="hidden" id="statTambah" value="0">
                      <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko" value="<?php echo $id_toko; ?>" />
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="varchar">Faktur Pembelian</label>
                            <input type="text" class="form-control" placeholder="" value="<?php echo $data_hutang->no_faktur; ?>" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="varchar">Tanggal Bayar <?php echo form_error("tgl") ?></label>
                            <input type="text" class="form-control" name="tgl" id="datepicker1" placeholder="Tgl" value="<?php echo $tgl; ?>" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                              <label for="varchar">Supplier</label>
                              <select name="supplier" id="supplier" class="form-control" disabled>
                                <option value="">-- Pilih Supplier --</option>
                              <?php foreach ($data_supplier as $key): ?>
                                  <option value="<?php echo $key->id_supplier ?>" <?php echo $key->id_supplier==$data_hutang->id_supplier?"selected":""; ?>><?php echo $key->nama_supplier ?></option>
                              <?php endforeach ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="varchar">Jatuh Tempo</label>
                            <input type="text" class="form-control" placeholder="" value="<?php echo $data_hutang->deadline; ?>" readonly />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="varchar">Akun Kas Kredit</label>
                          <select class="form-control" name="kredit" id="kredit" placeholder="Kredit" >
                            <?php echo $data_akun_kredit ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="varchar">Total Hutang</label>
                            <input type="text" class="form-control text-right" name="saldo_hutang" id="saldo_hutang" placeholder="Total Hutang" value="<?php echo number_format($data_hutang->hutang,0,',','.') ?>" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <?php 
                            $sisa_hutang = ($data_hutang->hutang-$data_hutang->dp)-$data_hutang->bayar;
                            ?>
                            <label for="varchar">Sisa Hutang</label>
                            <input type="text" class="form-control text-right" name="sisa_hutang" id="sisa_hutang" placeholder="Sisa Hutang" value="<?php echo number_format($sisa_hutang,0,',','.') ?>" readonly />
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="varchar">Nominal Bayar</label>
                          <input type="text" class="form-control text-right" name="nominal" id="nominal" placeholder="0" value="<?php echo $nominal; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Keterangan</label>
                          <textarea class="form-control" name="keterangan" id="keterangan" rows="4" placeholder="Keterangan"><?php echo $keterangan ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="text-center" style="margin-top:10px;">
                    <a href="<?php echo base_url() ?>produksi/hutang_retail/read/<?php echo $id_hutang ?>" class="btn btn-success">
                      <!-- <i class="ace-icon fa fa-trash bigger-230"></i> -->
                      Lihat
                    </a>
                    <a href="<?php echo base_url() ?>produksi/hutang_retail" class="btn btn-default">
                      <!-- <i class="ace-icon fa fa-trash bigger-230"></i> -->
                      Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                      <!-- <i class="ace-icon fa fa-floppy-o bigger-230"></i> -->
                      Simpan
                    </button>
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

  $("#nominal").keyup(function(){
    var val = jNumber($(this).val())*1;
    $(this).val(numberWithCommas(val.toString()));
    hitungsisa(val);
  });

  function hitungsisa(bayar) {
    var sisa_hutang = <?php echo $sisa_hutang*1 ?>-bayar;
    // if (sisa_hutang<0) {
    //   sisa_hutang = 0;
    // }
    $("#sisa_hutang").val(numberWithCommas(sisa_hutang.toString()));
  }

});
</script>
<!-- JQUERY -->