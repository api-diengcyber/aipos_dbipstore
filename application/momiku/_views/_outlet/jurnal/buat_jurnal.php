
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Jurnal</li>
              <li class="active">Buat Jurnal</li>
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
                Buat Jurnal
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                    </div>
                </div>

                <form action="<?php echo $action; ?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="varchar">Pilihan Transaksi <?php echo form_error('id_pil_transaksi') ?></label>
                          <select name="id_pil_transaksi" id="id_pil_transaksi" class="form-control">
                            <option value="">-- Pilih Transaksi --</option>
                          <?php foreach ($data_pil_transaksi as $key): ?>
                            <option value="<?php echo $key->id ?>" <?php echo $key->id_pil_transaksi==$id_pil_transaksi?"selected":"" ?> data-kode="<?php echo preg_replace('/[^\p{L}\p{N}\s]/u', '', $key->kode_transaksi) ?>"><?php echo preg_replace('/[^\p{L}\p{N}\s]/u', '', $key->kode_transaksi) ?>. <?php echo $key->nama_transaksi ?></option>
                          <?php endforeach ?>
                          </select>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="varchar">No Jurnal <?php echo form_error('no_jurnal') ?></label>
                              <input type="text" class="form-control" name="no_jurnal" id="no_jurnal" placeholder="No Jurnal" value="<?php echo $no_jurnal; ?>" readonly />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="varchar">Tanggal <?php echo form_error('tgl') ?></label>
                              <input type="text" class="form-control" name="tgl" id="datepicker1" placeholder="Tanggal" value="<?php echo $tgl; ?>" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="varchar">Nominal <?php echo form_error('nominal') ?></label>
                          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal" value="<?php echo $nominal; ?>" />
                      </div>
                      <div class="form-group">
                          <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
                          <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" rows="4"><?php echo $keterangan; ?></textarea>
                      </div>
                    </div>
                  </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
const numberWithCommas = (x) => {
  var parts = x.toString().split(".");
  parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  return parts.join(",");
}
function jNumber(nums) {
  if (typeof(nums)!=='undefined') {
    return nums.toString().split(' ').join('').split('.').join('').split(',').join('.');
  } else {
    return 0;
  }
}
$(document).ready(function(){
  var kode_before = $("#no_jurnal").val();
  var no_jurnal = 0;
  if (typeof(kode_before.split('-')[1])!=="undefined") {
    no_jurnal = kode_before.split('-')[1];
  }
  $("#id_pil_transaksi").on("change", function(){
    var kode = $(this).find(':selected').attr('data-kode');
    $(this).attr("disabled", "disabled");
    getNoFaktur(kode);
  });
  function nominalFormat() {
    var nominal = $("#nominal").val();
    nominal = jNumber(nominal);
    $("#nominal").val(numberWithCommas(nominal));
  }
  nominalFormat();
  $("#nominal").on("keyup", function(){
    nominalFormat();
  });
  function getNoFaktur(text) {
    $.ajax({
      url: '<?php echo base_url() ?>outlet/jurnal_retail/generate_kode',
      type: 'post',
      data: 'text='+text,
      success: function(response) {
        $("#id_pil_transaksi").removeAttr("disabled");
        if (response.status=="ok") {
          $("#no_jurnal").val(response.kode);
        }
      }
    });
  }
});
</script>