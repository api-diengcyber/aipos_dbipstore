
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
              <li class="active">Jurnal</li>
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
                Pengaturan Jurnal
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-5">
                <!-- PAGE CONTENT BEGINS -->
                
                <?php foreach ($pil_jurnal as $key): ?>
                <button href="#" class="btn btn-block btn-inverse" data-id="<?php echo $key->id ?>" data-name="<?php echo $key->nama_jurnal ?>">
                  <span style="float:left;">
                  <i class="ace-icon fa fa-pencil-square-o bigger-230"></i>
                  <?php echo $key->nama_jurnal ?>
                  </span>
                </button>
                <?php endforeach ?>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
              <div class="col-xs-7">
                <!-- PAGE CONTENT BEGINS -->
                <div id="panelData" style="display:none;">
                  <div class="alert alert-warning red">
                    <input type="hidden" name="id_pil_jurnal" id="id_pil_jurnal">
                    <input type="hidden" name="id_toko" id="id_toko" value="<?php echo $id_toko ?>">
                    <h4><b><span id="judul"></span></b></h4>
                    <div class="hr hr3 hr-dotted"></div>
                    <h5>DEBET</h5>
                    <div id="data_debet"></div>
                    <select class="form-control" name="debet" id="debet">
                      <option value="">-- Tambah Debet --</option>
                      <?php foreach ($akun as $key): ?>
                      <option value="<?php echo $key->id ?>"><?php echo $key->kode ?> -- <?php echo $key->akun ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="hr hr3 hr-dotted"></div>
                    <h5>KREDIT</h5>
                    <div id="data_kredit"></div>
                    <select class="form-control" name="kredit" id="kredit">
                      <option value="">-- Tambah Kredit --</option>
                      <?php foreach ($akun as $key): ?>
                      <option value="<?php echo $key->id ?>"><?php echo $key->kode ?> -- <?php echo $key->akun ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="hr hr3 hr-dotted"></div>
                  </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<!-- JQUERY -->
<script>
  jQuery(function($){

    var tampil = function(id){
      var nama_jurnal = $("[data-id="+id+"]").attr("data-name");
      var id_toko = $("#id_toko").val();
      $.ajax({
        url: '<?php echo base_url() ?>outlet/pengaturan_jurnal/data',
        type: 'post',
        data: 'id='+id+'&id_toko='+id_toko,
        success: function(response){
          var parsed_data = JSON.parse(response);
          $("#panelData").show();
          $("#judul").html(nama_jurnal);
          $("#data_debet").html(parsed_data.data_debet);
          $("#data_kredit").html(parsed_data.data_kredit);
          $("[data-id]").removeAttr('disabled');
          $("[data-id="+id+"]").attr('disabled','disabled');
          $("#id_pil_jurnal").val(id);
          addFuncDeleteAkun();
        },
        error: function(e){
          $("#panelData").hide();
        }
      });
    };

    $("[data-id]").click(function(){
      var id = $(this).attr("data-id");
      $("#data_debet").html("");
      $("#data_kredit").html("");
      $("#debet").val("");
      $("#kredit").val("");
      tampil(id);
    });

    // tambah data debet //
    $("#debet").change(function(){
      var id_pil_jurnal = $("#id_pil_jurnal").val();
      var id_toko = $("#id_toko").val();
      var id_debet = $(this).val();
      $(this).attr("disabled","disabled");
      $.ajax({
        url: '<?php echo base_url() ?>outlet/pengaturan_jurnal/create_action',
        type: 'post',
        data: 'id_toko='+id_toko+'&id_pil_jurnal='+id_pil_jurnal+'&id_akun='+id_debet+'&debet=1&kredit=0',
        success: function(response){
          $("#debet").removeAttr("disabled");
          tampil(id_pil_jurnal);
        }
      });
    });

    // tambah data kredit //
    $("#kredit").change(function(){
      var id_pil_jurnal = $("#id_pil_jurnal").val();
      var id_toko = $("#id_toko").val();
      var id_kredit = $(this).val();
      $(this).attr("disabled","disabled");
      $.ajax({
        url: '<?php echo base_url() ?>outlet/pengaturan_jurnal/create_action',
        type: 'post',
        data: 'id_toko='+id_toko+'&id_pil_jurnal='+id_pil_jurnal+'&id_akun='+id_kredit+'&debet=0&kredit=1',
        success: function(response){
          $("#kredit").removeAttr("disabled");
          tampil(id_pil_jurnal);
        }
      });
    });

    var addFuncDeleteAkun = function(){
      $("[data-button-id]").click(function(){
        var id_pil_jurnal = $("#id_pil_jurnal").val();
        var id_pengaturan = $(this).attr("data-button-id");
        $.ajax({
          url: '<?php echo base_url() ?>outlet/pengaturan_jurnal/delete/'+id_pengaturan,
          success: function(response){
            tampil(id_pil_jurnal);
          }
        });
      });
    };

  });
</script>
<!-- JQUERY -->