
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Pengaturan</li>
              <li class="">Akuntansi</li>
              <li class="active">Retail</li>
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
                Pengaturan Retail
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="tabbable">
                      <ul class="nav nav-tabs" id="myTab">
                        
                        <li class="active">
                          <a data-toggle="tab" data-kode="RT-PENJUALAN-TUNAI" href="#RT">
                            <i class="green ace-icon fa fa-lock bigger-120"></i>
                            RT-PENJUALAN-TUNAI
                          </a>
                        </li>
                        
                        <li class="">
                          <a data-toggle="tab" data-kode="RT-PENJUALAN-KREDIT" href="#RT">
                            <i class="green ace-icon fa fa-lock bigger-120"></i>
                            RT-PENJUALAN-KREDIT
                          </a>
                        </li>
                        
                        <li class="">
                          <a data-toggle="tab" data-kode="RT-PENJUALAN-DEPOSIT" href="#RT">
                            <i class="green ace-icon fa fa-lock bigger-120"></i>
                            RT-PENJUALAN-DEPOSIT
                          </a>
                        </li>
                        
                        <li class="">
                          <a data-toggle="tab" data-kode="RT-PEMBELIAN-TUNAI" href="#RT">
                            <i class="blue ace-icon fa fa-lock bigger-120"></i>
                            RT-PEMBELIAN-TUNAI
                          </a>
                        </li>
                        
                        <li class="">
                          <a data-toggle="tab" data-kode="RT-PEMBELIAN-HUTANG" href="#RT">
                            <i class="blue ace-icon fa fa-lock bigger-120"></i>
                            RT-PEMBELIAN-HUTANG
                          </a>
                        </li>

                      </ul>

                      <div class="tab-content">

                        <div id="RT" class="tab-pane fade in active">
                          <form id="formPanel">
                            <input type="hidden" name="id_toko" id="id_toko" value="<?php echo $id_toko ?>">
                            <input type="hidden" name="kode" id="kode" value="RT-PENJUALAN-TUNAI">
                            <div class="row">
                            <div class="col-xs-6">
                              <b>DEBET : </b>
                              <div id="sDebet"></div>
                            </div>
                            <div class="col-xs-6">
                              <b>KREDIT : </b>
                              <div id="sKredit"></div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="hr hr10"></div>
                            <div class="col-xs-6">
                              <div class="form-group">
                                <label for="">Akun</label>
                                <select class="form-control" name="akun">
                                  <option value="">-- Pilih Akun --</option>
                                  <?php foreach ($data_akun as $key): ?>
                                    <option value="<?php echo $key->id ?>"><?php echo $key->kode ?> -- <?php echo $key->akun ?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="">Bagian</label>
                                <br>
                                <input type="radio" name="bagian" value="1"> Debet | 
                                <input type="radio" name="bagian" value="2"> Kredit
                              </div>
                              <div class="form-group">
                                <label for="">Level</label>
                                <select class="form-control" name="level">
                                  <?php foreach ($data_level->result() as $key): ?>
                                    <option value="<?php echo $key->id ?>"><?php echo $key->level ?></option>
                                  <?php endforeach ?>
                                </select>
                              </div>
                            </div>
                            </div>
                            <div class="hr hr10 hr-dotted"></div>
                            <button type="submit" class="btn btn-primary btn-app btn-xs">Simpan</button>
                          </form>
                        </div>

                      </div>
                    </div>

                  </div><!-- /.col -->

                </div><!-- /.row -->

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

    var addFuncDelete = function(){
      var t = $("[data-id]").length;
      if(t > 0){
        $("[data-id]").click(function(){
          var id = $(this).attr("data-id");
          $.ajax({
            url: '<?php echo base_url() ?>produksi/retail/hapus_pengaturan',
            type: 'post',
            data: 'id='+id,
            success: function(response){
              tampil();
            }
          });
        });
      }
    };

    var tampil = function(){
      var id_toko = $("#id_toko").val();
      var kode = $("#kode").val();
      $.ajax({
        url: '<?php echo base_url() ?>produksi/retail/lihat_pengaturan',
        type: 'post',
        data: 'id_toko='+id_toko+'&kode='+kode,
        success: function(response){
          var parsed_data = JSON.parse(response);
          var data = parsed_data.data;
          $("#sDebet").html("");
          $("#sKredit").html("");
          for(var i = 0; i < data.length; i++) {
            if(typeof(data[i].debet) != 'undefined'){
              // debet //
              $("#sDebet").append(data[i].debet);
            }
            if(typeof(data[i].kredit) != 'undefined'){
              // kredit //
              $("#sKredit").append(data[i].kredit);
            }
          }
          addFuncDelete();
        },
        error: function(e){
          alert("Error");
        }
      });
    };

    tampil();

    $("[data-kode]").click(function(){
      var kode = $(this).attr("data-kode");
      $("#kode").val(kode);
      $("#sDebet").html("");
      $("#sKredit").html("");
      tampil();
    });

    $("#formPanel").submit(function(e){
      e.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url: '<?php echo base_url() ?>produksi/retail/simpan_pengaturan',
        type: 'post',
        data: data,
        success: function(response){
          tampil();
        }
      });
    });

  });
</script>