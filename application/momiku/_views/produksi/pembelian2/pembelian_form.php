
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Pembelian Barang</li>
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
                Pembelian
              </h1>
            </div><!-- /.page-header -->

            <style>
            .editable {
              background-color: yellow!important;
              color: #000!important;
            }
            </style>

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo base_url() ?>produksi/pembelian/create_action" method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-xs-3" style="padding-right:0px;">
                          <div class="form-group">
                            <label>No Faktur</label>
                            <input type="text" class="form-control" name="nofaktur" id="nofaktur" placeholder="No Faktur" disabled>
                          </div>
                        </div>
                        <div class="col-xs-3">
                          <div class="form-group">
                            <label>Tanggal Masuk <?php echo form_error('tgl') ?></label>
                            <input type="text" class="form-control" name="tgl" id="datepicker1" placeholder="dd-mm-yyyy" value="<?php echo $tgl ?>">
                          </div>
                        </div>
                      <!-- </div>
                      <div class="row"> -->
                        <div class="col-xs-4">
                          <div class="form-group">
                            <label>Supplier <?php echo form_error('supplier') ?></label>
                            <select class="form-control" name="supplier" id="supplier">
                              <option value="">-- Pilih Supplier --</option>
                            <?php foreach ($data_supplier as $key): ?>
                              <option value="<?php echo $key->id_supplier ?>"><?php echo $key->nama_supplier ?></option>
                            <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-2" style="padding-left:0px;">
                          <div class="row">
                            <div class="col-xs-12">
                              <label>Pembayaran</label>
                              <div class="form-group">
                                <select class="form-control" name="pembayaran" id="pembayaran">
                                  <option value="0">TUNAI</option>
                                  <option value="1">HUTANG / KREDIT</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-12" id="panel-jatuh-tempo" style="display: none;">
                              <div class="form-group">
                                <input type="text" class="form-control" name="jatuh_tempo" id="datepicker2" placeholder="dd-mm-yyyy" value="<?php echo date('d-m-Y') ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="term" id="term" placeholder="Cari Produk" style="font-size:20px;padding:10px 6px 10px 6px;height:38px;">
                      </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th width="450">Nama Produk</th>
                            <th width="120">Expire Date</th>
                            <th width="100">Harga Satuan</th>
                            <th width="100">Jumlah</th>
                            <th width="100">Diskon (%)</th>
                            <th width="200">Subtotal</th>
                            <th width="10"></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <th colspan="6" class="text-right">TOTAL</th>
                            <th class="text-right"><span class="total"></span><input type="hidden" name="total" class="total val"><input type="hidden" name="total_bruto" class="bruto val"></th>
                            <th rowspan="3"></th>
                          </tr>
                          <!-- <tr>
                            <th colspan="6" class="text-right">PPN 10%</th>
                            <th class="text-right"><span class="nominal-ppn"></span><input type="hidden" name="nominal_ppn" class="nominal-ppn val"></th>
                          </tr>
                          <tr>
                            <th colspan="6" class="text-right">TOTAL + PPN</th>
                            <th class="text-right"><span class="total-ppn"></span><input type="hidden" name="total_ppn" class="total-ppn val"></th>
                          </tr> -->
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
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

      <script type="text/javascript">
        $(document).ready(function(){
          $("#term").autocomplete({
            source: function(request, response){
              $.ajax({
                url: '<?php echo base_url() ?>produksi/penjualan_retail/json_produk',
                type: 'post',
                data: 'term='+request.term+'&tgl=<?php echo date("Y-m-d") ?>',
                success: function(data){
                  response($.map(data, function (value, key) {
                    return {
                      value: value.value,
                      label: value.label,
                    };
                  }));
                }
              });
            },
            minLength: 1,
            delay: 0,
            autoFocus: true,
            select: function(event, ui){
              $('#term').val(ui.item.label);
              addTemp(ui.item.value);
              return false;
            }
          });

          function addTemp(barcode) {
            $('#term').attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/pembelian/tambah_temp',
              type: 'post',
              data: 'barcode='+barcode,
              success: function(response){
                $('#term').removeAttr("disabled");
                $('#term').val("");
                listTemp();
              }, error: function() {
                $('#term').removeAttr("disabled");
                $('#term').val("");
              }
            });
          }

          $("#pembayaran").on("change", function(e) {
            var val = $(this).val();
            if (val*1==0) {
              $("#panel-jatuh-tempo").hide();
            } else {
              $("#panel-jatuh-tempo").show();
            }
          });

          function listTemp() {
            $('[type="submit"]').attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/pembelian/list_temp',
              type: 'get',
              success: function(response){
                $('[type="submit"]').removeAttr("disabled");
                if (response.status=="ok") {
                  $("tbody").html(response.data);
                  jqueryTemp();
                }
              }, error: function() {
                $('[type="submit"]').removeAttr("disabled");
              }
            });
          }
          listTemp();

          function jqueryTemp() {
            function hitungtotal() {
              var total = 0;
              var arr_bruto = {};
              $('.subtotal').each(function(){
                var val = jNumber($(this).text())*1;
                total += val;
              });
              var oi = 0;
              $('.harga_satuan').each(function(){
                var val = jNumber($(this).val())*1;
                if (typeof(arr_bruto[oi])==="undefined") {
                  arr_bruto[oi] = {};
                }
                arr_bruto[oi]['harga_satuan'] = val;
                oi++;
              });
              oi = 0;
              $('.jumlah').each(function(){
                var val = jNumber($(this).val())*1;
                if (typeof(arr_bruto[oi])==="undefined") {
                  arr_bruto[oi] = {};
                }
                arr_bruto[oi]['jumlah'] = val;
                oi++;
              });
              var total_bruto = 0;
              for (let item in arr_bruto) {
                total_bruto += arr_bruto[item]['harga_satuan']*arr_bruto[item]['jumlah'];
              }
              var nominal_ppn = total>0?(10/100)*total:0;
              var total_ppn = total+nominal_ppn;
              $(".total").html(numberWithCommas(total.toString()));
              $(".nominal-ppn").html(numberWithCommas(nominal_ppn.toString()));
              $(".total-ppn").html(numberWithCommas(total_ppn.toString()));
              $(".total.val").val(numberWithCommas(total.toString()));
              $(".nominal-ppn.val").val(numberWithCommas(nominal_ppn.toString()));
              $(".total-ppn.val").val(numberWithCommas(total_ppn.toString()));
              $(".bruto.val").val(numberWithCommas(total_bruto.toString()));
            }
            hitungtotal();
            function hitungsubtotal(id) {
              var expire_date = $('.expire_date[data-id="'+id+'"]').val();
              var harga_satuan = jNumber($('.harga_satuan[data-id="'+id+'"]').val())*1;
              var jumlah = jNumber($('.jumlah[data-id="'+id+'"]').val())*1;
              var diskon = jNumber($('.diskon[data-id="'+id+'"]').val())*1;
              var total = harga_satuan*jumlah;
              var diskon_nominal = total*(diskon/100);
              var subtotal = total-diskon_nominal;
              $('.subtotal[data-id="'+id+'"]').html(numberWithCommas(subtotal.toString()));
              hitungtotal();
              updateTemp(id, 'expire_date='+expire_date+'&harga_satuan='+harga_satuan+'&jumlah='+jumlah+'&diskon='+diskon+'&total='+total+'&diskon_nominal='+diskon_nominal+'&subtotal='+subtotal);
            }
            $(".numbering").on("keyup", function(){
              var val = jNumber($(this).val());
              $(this).val(numberWithCommas(val));
            });
            $(".editable").on("change", function(){
              var id = $(this).attr('data-id');
              hitungsubtotal(id);
            });
            function updateTemp(id, data) {
              $('.editable').attr('readonly', 'readonly');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pembelian/update_temp',
                type: 'post',
                data: 'id='+id+'&'+data,
                success: function(response){
                  $('.editable').removeAttr('readonly');
                }, error: function(){
                  $('.editable').removeAttr('readonly');
                }
              });
            }
            function setDatepicker(mindate) {
              $(".expire_date").datepicker("destroy");
              $(".expire_date").datepicker({
                showOtherMonths: true,
                selectOtherMonths: false,
                dateFormat: "dd-mm-yy",
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                minDate: mindate,
                beforeShow: function() {
                  var datepicker = $(this).datepicker( "widget" );
                  setTimeout(function(){
                    var buttons = datepicker.find('.ui-datepicker-buttonpane').find('button');
                    buttons.eq(0).addClass('btn btn-xs');
                    buttons.eq(1).addClass('btn btn-xs btn-success');
                    buttons.wrapInner('<span class="bigger-110" />');
                  }, 0);
                }
              });
            }
            setDatepicker(new Date());
            $('input[name="tgl"]').on("change", function(e){
              e.stopImmediatePropagation();
              var val = $(this).val();
              var spl = val.split('-');
              var d = spl[0];
              var m = spl[1]!=null?spl[1]:'';
              var y = spl[2]!=null?spl[2]:'';
              setDatepicker(new Date(y, (m*1)-1, d));
              $(".expire_date").val('');
            });
            $(".btn-hapus-temp").on("click", function(e){
              e.stopImmediatePropagation();
              var that = $(this);
              that.attr("disabled", "disabled");
              var id = that.attr('data-id');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pembelian/hapus_temp',
                type: 'post',
                data: 'id='+id,
                success: function(response) {
                  listTemp();
                }, error: function() {
                  listTemp();
                }
              });
            });
          }
        });
      </script>
