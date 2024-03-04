
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li>Jurnal</li>
              <li class="active">Buat Jurnal</li>
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
                Buat Jurnal Manual
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php
                if (!empty($this->session->userdata('message'))) {
                  echo '<div style="margin-top:10px;margin-bottom:10px;width:100%;text-align:center;">'.$this->session->userdata('message').'</div>';
                }
                ?>
                <form action="<?php echo $action ?>" method="post">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Tanggal <?php echo form_error('tgl') ?></label>
                        <input type="text" class="form-control" name="tgl" id="datepicker1" value="<?php echo $tgl ?>" placeholder="dd-mm-yyyy" />
                      </div>
                      <div class="form-group">
                        <label>Kode Jurnal <?php echo form_error('kode') ?></label>
                        <input type="text" class="form-control" name="kode" id="kode" value="<?php echo $kode ?>" placeholder="Kode Jurnal" />
                      </div>
                      <div class="form-group">
                        <label>Keterangan <?php echo form_error('keterangan') ?></label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" rows="4"><?php echo $keterangan ?></textarea>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <table id="tabeldata" class="table table-bordered">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th width="350">Akun</th>
                            <th width="170" class="text-center">Debet</th>
                            <th width="170" class="text-center">Kredit</th>
                          </tr>
                        </thead>
                        <tbody></tbody>  
                        <tfoot>
                          <tr>
                            <th colspan="2" class="text-center">TOTAL</th>
                            <th class="text-right total_debet">0</th>
                            <th class="text-right total_kredit">0</th>
                          </tr>
                        </tfoot>
                      </table>
                      <button type="button" class="btn btn-primary btn-xs" id="btn-tambah"><i class="ace-icon fa fa-plus"></i> Tambah</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="checkbox">
                        <label style="padding-left:10px;">
                          <input name="simpan_pola" type="checkbox" class="ace" value="1" />
                          <span class="lbl"> Simpan fungsi ini</span>
                        </label>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<?php 
$i = 0;
$dm = array();
foreach ($data_manual as $key):
  if (!empty($dm[$key->kode]) && is_array($dm[$key->kode])) {
    $dm[$key->kode][$i] = $key->id_akun;
  } else {
    $i = 0;
    $dm[$key->kode] = array();
    $dm[$key->kode][$i] = $key->id_akun;
  }
  $i++;
endforeach;
$dm2 = array();
foreach($dm as $key => $value):
  // echo "<pre>";
  // print_r ($key);
  // echo "</pre>";
  // $dm2[] = array(
  //   'value' => $key,
  // );
endforeach;
?>
<script>
var data_manual = <?php echo json_encode($dm) ?>;
var data_akun = <?php echo json_encode($data_akun) ?>;
$(document).ready(function(){
  $("#kode").autocomplete({
    source: [{
      value: 1,
      label: 'A'
    }]
  });
  $("#kode").on("keyup", function(){
    var val = $(this).val();
    val = val.split(' ').join('-');
    $(this).val(val.toUpperCase());
  });
  var akun_option = '<select name="akun[]" class="form-control" style="border:none;">'
  for (var item in data_akun) {
    akun_option += '<option value="'+data_akun[item].id+'">'+data_akun[item].kode+' ---- '+data_akun[item].akun+'</option>';
  }
  akun_option += '</select>';
  var i = 0;
  $("#btn-tambah").on("click", function(){
    $("#tabeldata tbody").append(`
      <tr>
        <td>${i+1}</td>
        <td style="padding:0px;">${akun_option}</td>
        <td style="padding:0px;"><input type="text" name="debet[]" class="form-control text-right numbering val_debet" style="border:none;" placeholder="0" /></td>
        <td style="padding:0px;"><input type="text" name="kredit[]" class="form-control text-right numbering val_kredit" style="border:none;" placeholder="0" /></td>
      </tr>
    `);
    actTable();
    i++;
  });
  function actTable() {
    $(".numbering").on("keyup", function(e){
      // e.stopImmediatePropagation();
      var val = jNumber($(this).val());
      $(this).val(numberWithCommas(val));
    });
    $(".val_debet, .val_kredit").on("keyup", function(e){
      // e.stopImmediatePropagation();
      totalFunction();
    });
    $(".val_debet, .val_kredit").on("change", function(e){
      // e.stopImmediatePropagation();
      totalFunction();
    });
  }
  function totalFunction() {
    var debet = 0;
    $(".val_debet").each(function(){
      var val = jNumber($(this).val());
      debet += val*1;
    });
    var kredit = 0;
    $(".val_kredit").each(function(){
      var val = jNumber($(this).val());
      kredit += val*1;
    });
    $(".total_debet").html(numberWithCommas(debet.toString()));
    $(".total_kredit").html(numberWithCommas(kredit.toString()));
  }
});
</script>