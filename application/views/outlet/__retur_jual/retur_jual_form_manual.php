
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Penjualan</li>
              <li class="active">Retur Penjualan Manual</li>
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
                Retur Penjualan Manual
              </h1>
            </div><!-- /.page-header -->


            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form action="<?php echo $action ?>" method="post">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="varchar">Tanggal Retur <?php echo form_error('tgl_retur') ?></label>
                      <input type="text" class="form-control" name="tgl_retur" id="datepicker1" placeholder="Tgl Retur" value="<?php echo $tgl_retur; ?>" />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="varchar">Jenis</label>
                      <select class="form-control" name="jenis" id="jenis">
                        <option value="0">Bukan Member</option>
                        <option value="1">Member</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="varchar">Nama Pembeli</label>
                      <input type="hidden" name="id_pembeli" id="id_pembeli"/>
                      <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" placeholder="Nama Pembeli" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th width="350">Nama Produk</th>
                            <th width="120" class="text-center">Harga Satuan</th>
                            <th width="100" class="text-center">Jumlah Sisa Retur</th>
                            <th width="100" class="text-center">Jumlah Retur</th>
                            <th width="120" class="text-center">Subtotal</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <th colspan="5" class="text-right">Total</th>
                            <th class="text-right"><span class="total">0</span></th>
                          </tr>
                          <tr>
                            <th colspan="5" class="text-right">PPN (10%)</th>
                            <th class="text-right"><span class="ppn">0</span></th>
                          </tr>
                          <tr>
                            <th colspan="5" class="text-right">Total + PPN</th>
                            <th class="text-right"><span class="total_ppn">0</span></th>
                          </tr>
                        </tfoot>
                      </table>
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

<script>
var data_pembeli = [
  <?php foreach ($data_pembeli as $key): ?>
  { 
    value:<?php echo $key->id_member ?>, 
    label: "<?php echo $key->nama.' - '.$key->alamat ?>", 
    alamat: "<?php echo $key->alamat ?>",
    <?php if (!empty($key->id_sales)) { ?>
    id_sales: <?php echo $key->id_sales ?>,
    nama_sales: "<?php echo $key->first_name." ".$key->last_name ?>",
    <?php } ?>
  },
  <?php endforeach ?>
];
$(document).ready(function(){
  var var_data_pembeli = [];
  $("#jenis").on('change', function(){
    var jenis = $(this).val();
    if (jenis*1==1) {
      var_data_pembeli = data_pembeli;
    } else {
      var_data_pembeli = [];
    }
    $("#id_pembeli").val('');
    $("#nama_pembeli").val('');
    setTimeout(() => {
      $("#nama_pembeli").focus();
    }, 800);
    $("#nama_pembeli").autocomplete({
      source: var_data_pembeli,
      delay: 0,
      autoFocus: true,
      select: function(event, ui){
        event.preventDefault();
        $("#id_pembeli").val(ui.item.value);
        $('#nama_pembeli').val(ui.item.label);
      }
    });
  });
  $("#jenis").trigger('change');
  function source_nama_barang(request, response){
    $.ajax({
      url: '<?php echo base_url() ?>outlet/penjualan_retail/json_produk',
      type: 'post',
      data: 'term='+request.term+'&tgl=<?php echo date("Y-m-d") ?>',
      success: function(data) {
        response($.map(data, function (value, key) {
          return {
            value: value.value,
            label: value.label,
          };
        }));
      }
    });
  }
  $("#nama_barang").autocomplete({
    source: source_nama_barang,
    minLength: 1,
    delay: 0,
    autoFocus: true,
    select: function(event, ui) {
      $("#nama_barang").val(ui.item.label);
      $("#nama_barang").attr('disabled', 'disabled');
      insertTemp(ui.item.value);
      return false;
    }
  });
  function insertTemp(barcode) {
    $.ajax({
      url: '<?php echo base_url() ?>retur_jual/insert_temp_manual',
      type: 'post',
      data: 'barcode='+barcode,
      success: function(response) {
        refreshTemp();
      }, error: function() {
        $("#nama_barang").removeAttr('disabled');
        $("#nama_barang").val('');
      }
    });
  }
  function refreshTemp() {
    $("#nama_barang").attr('disabled', 'disabled');
    // $("#mytable>tbody").html('');
    $.ajax({
      url: '<?php echo base_url() ?>retur_jual/tabelTempManual',
      type: 'get',
      success: function(response) {
        $("#nama_barang").removeAttr('disabled');
        $("#nama_barang").val('');
        if (response.status=='ok') {
          $("#mytable>tbody").html(response.html);
          $(".total").html(numberWithCommas(response.total));
          $(".ppn").html(numberWithCommas(response.ppn_nominal));
          $(".total_ppn").html(numberWithCommas(response.total_ppn));
          action();
        }
      }, error: function() {
        $("#nama_barang").removeAttr('disabled');
        $("#nama_barang").val('');
      }
    });
  }
  refreshTemp();
  function action() {
    $('.harga').on('keyup', function(){
      var val = jNumber($(this).val());
      $(this).val(numberWithCommas(val.toString()));
    });
    $('.harga').on('change', function(){
      var val = jNumber($(this).val());
      var id = $(this).attr('data-id');
      updateTemp('id='+id+'&harga='+val);
    });
    $('.jumlah').on('change', function(){
      var val = $(this).val();
      var id = $(this).attr('data-id');
      updateTemp('id='+id+'&jumlah='+val);
    });
  }
  function updateTemp(params) {
    $.ajax({
      url: '<?php echo base_url() ?>retur_jual/update_temp_manual',
      type: 'post',
      data: params,
      success: function(response) {
        refreshTemp();
      }
    });
  }
});
</script>