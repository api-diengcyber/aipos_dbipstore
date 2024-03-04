
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Jurnal</li>
              <li class="active">Piutang</li>
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
                Pembayaran Piutang
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-6">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo $action ?>" method="post">
                    <?php
                    if(!empty($data_piutang)){
                      $id_piutang = $data_piutang['id_piutang'];
                      $id_pembeli = $data_piutang['id_pembeli'];
                    } else {
                      $id_piutang = "";
                      $id_pembeli = "";
                    }
                    ?>
                    <input type="hidden" name="id_piutang" id="id_piutang" value="<?php echo $id_piutang ?>">
                    <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko" value="<?php echo $id_toko; ?>" />
                    <div class="form-group">
                        <label for="varchar">Tgl <?php echo form_error("tgl") ?></label>
                        <input type="text" class="form-control" name="tgl" id="datepicker1" placeholder="Tgl" value="<?php echo $tgl; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Kode</label>
                        <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode" value="<?php echo $kode; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Akun Debet</label>
                        <select class="form-control" name="debet" id="debet" placeholder="Debet" >
                          <option value="">-- Pilih Akun Debet --</option>
                          <?php echo $data_akun_debet ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Akun Kredit</label>
                        <select class="form-control" name="kredit" id="kredit" placeholder="Kredit" >
                          <option value="">-- Pilih Akun Kredit --</option>
                          <?php echo $data_akun_kredit ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Pembeli</label>
                        <select name="pembeli" id="pembeli" class="form-control" <?php if(!empty($id_pembeli)){ echo "disabled"; } ?> >
                          <option value="">-- Pilih Pembeli --</option>
                        <?php
                        foreach ($data_pembeli as $key):
                        if($key->id == $id_pembeli){
                        ?>
                            <option selected value="<?php echo $key->id ?>"><?php echo $key->nama ?> - <?php echo $key->alamat ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $key->id ?>"><?php echo $key->nama ?> - <?php echo $key->alamat ?></option>
                        <?php
                        }
                        endforeach;
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Saldo Piutang</label>
                        <input type="text" class="form-control" name="saldo_piutang" id="saldo_piutang" placeholder="Saldo Piutang" value="<?php echo $saldo_piutang ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Faktur</label>
                        <input type="text" class="form-control" name="faktur" id="faktur" placeholder="Faktur" value="<?php echo $faktur ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nominal</label>
                        <input type="text" class="form-control text-right" name="nominal" id="nominal" placeholder="0" value="<?php echo $nominal; ?>" />
                    </div>

                    <button type="button" id="bBatal" class="btn btn-app btn-danger" disabled>
                      <i class="ace-icon fa fa-trash bigger-230"></i>
                      Batal
                    </button>
                    <button href="#" class="btn btn-app btn-inverse">
                      <i class="ace-icon fa fa-floppy-o bigger-230"></i>
                      Simpan
                    </button>

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

    $("#nominal, #nominalTambah1, #nominalTambah2, #nominalTambah3").keyup(function(){
      var nominal = $(this).val().replace(/\./g,'');
      $(this).val(tandaPemisahTitik(nominal));
    });

    $("#pembeli").change(function(){
      var id_pembeli = $(this).val();
      $.ajax({
        url: '<?php echo base_url() ?>produksi/jurnal_retail/saldo_piutang',
        type: 'post',
        data: 'id_pembeli='+id_pembeli,
        success: function(response){
          var parsed_data = JSON.parse(response);
          var saldo_piutang = parsed_data.saldo_piutang;
          $("#saldo_piutang").val(tandaPemisahTitik(saldo_piutang));
        },
        error: function(e){
        }
      });
    });

  });
</script>
<!-- JQUERY -->