
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Mutasi Stok</li>
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
                Mutasi Stok
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
                <form action="<?php echo $action ?>" method="post" class="form-pembelian">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-xs-3" style="padding-right:0px;">
                          <div class="form-group">
                            <label>No Faktur</label>
                            <input type="text" class="form-control" name="nofaktur" id="nofaktur" value="<?php echo $faktur ?>" placeholder="No Faktur" disabled>
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
                        <div class="col-xs-3">
                          <div class="form-group">
                            <label>Gudang <?php echo form_error('cabang') ?></label>
                            <select style="width:100%;" name="cabang" id="cabang">
                              <option value="">-- Pilih Gudang --</option>
                            <?php foreach ($data_gudang as $key): ?>
                              <option value="<?php echo $key->id ?>"><?php echo $key->nama_gudang ?></option>
                            <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-3">
                          <div class="form-group">
                            <label>Gudang Tujuan <?php echo form_error('cabang2') ?></label>
                            <select style="width:100%;" name="cabang2" id="cabang2">
                              <option value="">-- Pilih Gudang --</option>
                            <?php foreach ($data_gudang as $key): ?>
                              <option value="<?php echo $key->id ?>"><?php echo $key->nama_gudang ?></option>
                            <?php endforeach ?>
                            </select>
                            </select>
                          </div>
                        </div>
                        <!-- <div class="col-xs-2" style="padding-left:0px;">
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
                        </div> -->
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
                            <th width="100">Stok Cabang Asal</th>
                            <th width="100">Jumlah Stok Dipindah</th>
                            <th width="10"></th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                          <tr>
                            <th colspan="3" class="text-right">TOTAL</th>
                            <th class="text-right"><span class="total"></span><input type="hidden" name="total" class="total val"></th>
                            <th rowspan="3"></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <input type="hidden" name="faktur" value="<?php echo $faktur ?>">
                      <button type="button" class="btn btn-primary btn-submit">Simpan</button>
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
                url: '<?php echo base_url() ?>admin/penjualan_retail/json_produk',
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
              url: '<?php echo base_url() ?>admin/mutasi_stok/tambah_temp',
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

          $(".btn-submit").click(function(e) {
            e.preventDefault();
            var invalidDate = 0;
            var validasiExpire = new Promise((resolve,reject)=>{
              $(".expire_date").each(function(){
                var expire_date = $(this).val().length;
                if(expire_date<10){
                  invalidDate++;
                }
              });
              resolve(invalidDate);
            })
            validasiExpire.then((_)=>{
              if(invalidDate>0){
                alert("Silahkan cek tanggal expired terlebih dahulu. Format harus dd-mm-yyyy");
              }else{
                $('.form-pembelian').submit();
              }
            })
          });

          function cekcabangsama() {
            var c1 = $('#cabang').val();
            var c2 = $('#cabang2').val();
            if (c1 == c2) {
              alert('Cabang tidak boleh sama');
              return false;
            } else {
              return true;
            }
          }

          $("#cabang").on("change", function(e) {
            if (cekcabangsama()) {
              listTemp();
            } else {
              $('#cabang[value=""]').prop('selected', true);
            }
          });

          $("#cabang2").on("change", function(e) {
            if (!cekcabangsama()) {
              $('#cabang2[value=""]').prop('selected', true);
            }
          });


          var total = 0; 

          function listTemp() {
            total = 0;
            $('[type="submit"]').attr("disabled", "disabled");
            var cabang = $('#cabang').val();
            $.ajax({
              url: '<?php echo base_url() ?>admin/mutasi_stok/list_temp',
              type: 'post',
              data: 'cabang='+cabang,
              success: function(response){
                total = 0;
                $('[type="submit"]').removeAttr("disabled");
                if (response.status=="ok") {
                  $("tbody").html(response.data);
                  jqueryTemp();
                }
              }, error: function() {
                total = 0;
                $('[type="submit"]').removeAttr("disabled");
              }
            });
          }
          listTemp();


          function hitungtotal() {
            total = 0;
            $('.jumlah').each(function(){
              var val = jNumber($(this).val())*1;
              total += val;
            });
            $(".total").html(numberWithCommas(total.toString()));
          }

          function jqueryTemp() {
            total = 0;
            hitungtotal();
            $(".numbering").on("keyup", function(){
              var val = jNumber($(this).val());
              $(this).val(numberWithCommas(val));
            });
            $(".editable").on("change", function(){
              var id = $(this).attr('data-id');
              hitungtotal();
            });
            $(".jumlah").on("change", function(){
              var id = $(this).attr('data-id');
              var val = jNumber($(this).val());
              // alert(id+' = '+val);
              updateTemp(id, 'jumlah='+val);
            });
            function updateTemp(id, data) {
              $('.editable').attr('readonly', 'readonly');
              $.ajax({
                url: '<?php echo base_url() ?>admin/mutasi_stok/update_temp',
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
                url: '<?php echo base_url() ?>admin/mutasi_stok/hapus_temp',
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
