
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Penjualan</li>
              <li class="active">Retur Penjualan</li>
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
                Retur Penjualan
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
                      <label for="varchar">Faktur Penjualan</label>
                      <input type="hidden" name="id_faktur" id="id_faktur" />
                      <input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur" />
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="varchar">No Retur <?php echo form_error('no_retur') ?></label>
                      <input type="text" class="form-control" name="no_retur" id="tampil_no_retur" placeholder="No Retur" value="-" readonly />
                    </div>
                  </div>
                </div>
                <div class="row panel-other" style="display:none;">
                  <div class="col-md-12">
                    <div class="form-group">
                      <span id="panel-pembayaran"></span>&nbsp;&nbsp;<span id="panel-ket"></span>
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
                            <th width="80" class="text-center">Disk. 1(%)</th>
                            <th width="80" class="text-center">Disk. 2(%)</th>
                            <th width="80" class="text-center">Disk. 3(%)</th>
                            <th width="120" class="text-center">Harga Satuan</th>
                            <th width="100" class="text-center">Jumlah Jual</th>
                            <th width="100" class="text-center">Jumlah Retur</th>
                            <th width="120" class="text-center">Subtotal</th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <th colspan="8" class="text-right">Total</th>
                            <th class="text-right"><span class="total">0</span></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <button type="submit" class="btn btn-primary" disabled>Simpan</button>
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
      $(document).ready(function(){
        $("#no_faktur").autocomplete({
          source: function(request, response){
            $.ajax({
              url: '<?php echo base_url() ?>outlet/retur_jual/json_cari_faktur',
              type: 'post',
              data: 'term='+request.term,
              success: function(res) {
                if (res.status=="ok") {
                  response($.map(res.data, function (value, key) {
                    return {
                      value: value.value,
                      label: value.label,
                    };
                  }));
                } else {
                  alert("Error");
                }
              }
            });
          },
          minLength: 1,
          delay: 0,
          autoFocus: true,
          select: function(event, ui){
            $("#id_faktur").val(ui.item.value);
            $("#no_faktur").val(ui.item.label);
            $("#no_faktur").attr("disabled", "disabled");
            $('[type="submit"]').attr("disabled", "disabled");
            dataPenjualan(ui.item.value);
            return false;
          }
        });
        function dataPenjualan(id) {
          $(".panel-other").hide();
          $("#mytable>tbody").html('');
          $.ajax({
            url: '<?php echo base_url() ?>outlet/retur_jual/tabelTemp',
            type: 'post',
            data: 'id='+id,
            success: function(response) {
              $("#no_faktur").removeAttr("disabled");
              $('[type="submit"]').removeAttr("disabled");
              if (response.status=="ok") {
                $(".panel-other").show();
                var orders = response.data.orders;
                var piutang = response.data.piutang;
                var html_pembayaran = '', html_ket = '';
                if (orders.pembayaran=="2") {
                  html_pembayaran = '<span class="badge badge-danger">Hutang</span>';
                  var kp = '';
                  if (piutang.sisa*1 < 1) {
                    kp = ', <span class="badge badge-primary">Lunas</span>';
                  }
                  html_ket = 'Jatuh Tempo: <b>'+piutang.deadline+'</b>, Total Hutang: <b>'+numberWithCommas(piutang.jumlah_hutang.toString())+'</b>, Kurang: <b>'+numberWithCommas(piutang.sisa.toString())+'</b>'+kp;
                } else if (orders.pembayaran=="1") {
                  html_pembayaran = '<span class="badge badge-primary">Tunai</span>';
                }
                $("#panel-pembayaran").html(html_pembayaran);
                $("#panel-ket").html(html_ket);
                $("#mytable>tbody").html(response.data.html);
                action();
              } else {
                alert("Error");
              }
            }
          });
        }
        function action() {
          $(".jumlah").on('keyup', function(e){
            e.stopImmediatePropagation();
            var val = jNumber($(this).val())*1;
            $(this).val(numberWithCommas(val.toString()));
            $('[type="submit"]').attr("disabled", "disabled");
          });
          $(".jumlah").on('change', function(e){
            e.stopImmediatePropagation();
            var id = $(this).attr("data-id");
            var val = jNumber($(this).val())*1;
            var jumlah_jual = jNumber($('.jumlah_jual[data-id="'+id+'"]').text())*1;
            var harga_satuan = jNumber($('.harga_satuan[data-id="'+id+'"]').text())*1;
            if (val > jumlah_jual) {
              val = jumlah_jual;
              $(this).val(numberWithCommas(val.toString()));
            }
            var subtotal = val*harga_satuan;
            $('.subtotal[data-id="'+id+'"]').text(numberWithCommas(subtotal.toString()));
            $('[type="submit"]').removeAttr("disabled");
            hitungtotal();
          });
          hitungtotal();
        }
        function hitungtotal() {
          var total = 0;
          $('.subtotal').each(function(){
            var val = jNumber($(this).text())*1;
            total += val;
          });
          if (total>0) {
            $('[type="submit"]').removeAttr("disabled");
          } else {
            $('[type="submit"]').attr("disabled", "disabled");
          }
          $('.total').text(numberWithCommas(total.toString()));
        }
      });
      </script>