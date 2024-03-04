
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Pengolahan Baru</li>
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
                Pengolahan Baru
              </h1>
            </div><!-- /.page-header -->

            <style>
            .editable {
              background-color: yellow!important;
              color: #000!important;
            }
            .box {
              padding: 15px 10px 15px 10px;
              border: 1px solid #000;
              margin-bottom: 5px;
            }
            .box h4 {
              margin: 0px 2px 2px 2px;
            }
            .sub-title {
              font-weight: bold;
              font-size: 17px;
            }
            </style>

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo base_url() ?>produksi/produksi/update_action" method="post">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="row">
                          <div class="col-md-3">
                            <h4>1. DATA UMUM</h4>
                            <div class="sub-title">GK-FSOP-17</div>
                            <div class="form-group" style="margin-top:8px;">
                              <label>Tanggal produksi <?php echo form_error('tgl') ?></label>
                              <input type="text" class="form-control" name="tgl" id="datepicker1" placeholder="dd-mm-yyyy" value="<?php echo $tgl ?>">
                            </div>
                          </div>
                          <div class="col-md-9">
                            <div class="form-group">
                              <label>Karyawan <?php echo form_error('karyawan') ?></label>
                              <select class="form-control" name="karyawan[]" id="karyawan" multiple>
                                <option value="">-- Pilih Karyawan --</option>
                                <?php foreach ($data_karyawan as $key): ?>
                                <option value="<?php echo $key->id_users ?>" <?php echo !empty($data_karyawan_produksi[$key->id_users])?"selected":"" ?>><?php echo $key->first_name ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <p>Karyawan Masuk : <?php echo $karyawan_masuk*1 ?>, Tidak Masuk : <?php echo $karyawan_tidak_masuk*1 ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>2. BAHAN BAKU</h4>
                            <div class="form-group" style="margin-top: 10px;">
                              <input type="text" class="form-control" name="term" id="term" placeholder="Tambah Bahan Baku" style="font-size:20px;padding:10px 6px 10px 6px;height:38px;">
                            </div>
                            <table id="mytable" class="table table-bordered">
                              <thead>
                                <tr>
                                  <th width="10">No</th>
                                  <th width="450">Nama Produk</th>
                                  <th width="100">Sisa kemarin</th>
                                  <th width="100">Ambil baru</th>
                                  <th width="100">Sisa</th>
                                  <th width="100">Rusak</th>
                                  <th width="100">Terpakai</th>
                                  <th width="10"></th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                              <tfoot>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>3. PENGUPASAN</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Mulai <?php echo form_error('pengupasan_mulai') ?></label>
                                  <input type="text" class="form-control" name="pengupasan_mulai" id="pengupasan_mulai" value="<?php echo $pengupasan_mulai ?>" />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Selesai <?php echo form_error('pengupasan_selesai') ?></label>
                                  <input type="text" class="form-control" name="pengupasan_selesai" id="pengupasan_selesai" value="<?php echo $pengupasan_selesai ?>" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>4. PENGEPRESAN</h4>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Mulai <?php echo form_error('pengepresan_mulai') ?></label>
                                  <input type="text" class="form-control" name="pengepresan_mulai" id="pengepresan_mulai" value="<?php echo $pengepresan_mulai ?>" />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Selesai <?php echo form_error('pengepresan_selesai') ?></label>
                                  <input type="text" class="form-control" name="pengepresan_selesai" id="pengepresan_selesai" value="<?php echo $pengepresan_selesai ?>" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4 style="margin-bottom:8px;">CATATAN LAIN-LAIN <?php echo form_error('catatan') ?></h4>
                            <textarea name="catatan" id="catatan" cols="30" rows="4" class="form-control" placeholder="Tulis catatan"><?php echo $catatan ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top:10px;">
                    <div class="col-md-6">
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                      <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
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
          /*var set_dp = {
            showOtherMonths: true,
            selectOtherMonths: false,
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            beforeShow: function() {
              //change button colors
              var datepicker = $(this).datepicker( "widget" );
              setTimeout(function(){
                var buttons = datepicker.find('.ui-datepicker-buttonpane')
                .find('button');
                buttons.eq(0).addClass('btn btn-xs');
                buttons.eq(1).addClass('btn btn-xs btn-success');
                buttons.wrapInner('<span class="bigger-110" />');
              }, 0);
            }
          };
          $("#pengupasan_mulai").datepicker(set_dp);
          $("#pengupasan_selesai").datepicker(set_dp);
          $("#pengepresan_mulai").datepicker(set_dp);
          $("#pengepresan_selesai").datepicker(set_dp);*/

          function widgetTimePicker(e) {
            e.timepicker({
              minuteStep: 1,
              showSeconds: true,
              showMeridian: false,
              disableFocus: true,
              icons: {
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down'
              }
            }).on('focus', function() {
              e.timepicker('showWidget');
            }).next().on(ace.click_event, function(){
              $(this).prev().focus();
            });
          }
          widgetTimePicker($("#pengupasan_mulai"));
          widgetTimePicker($("#pengupasan_selesai"));
          widgetTimePicker($("#pengepresan_mulai"));
          widgetTimePicker($("#pengepresan_selesai"));

          $("#term").autocomplete({
            source: function(request, response){
              $.ajax({
                url: '<?php echo base_url() ?>produksi/produksi/ajax_produk',
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
              url: '<?php echo base_url() ?>produksi/produksi/tambah_temp_update',
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

          function listTemp() {
            $('[type="submit"]').attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/produksi/list_temp_update',
              type: 'get',
              success: function(response){
                $('[type="submit"]').removeAttr("disabled");
                if (response.status=="ok") {
                  $("#mytable tbody").html(response.data);
                  jqueryTemp();
                }
              }, error: function() {
                $('[type="submit"]').removeAttr("disabled");
              }
            });
          }
          listTemp();

          function jqueryTemp() {
            $(".editable").on("change", function(){
              var id = $(this).attr('data-id');
              var sisa_kemarin = $('.sisa_kemarin[data-id="'+id+'"]').val()*1;
              var ambil_baru = $('.ambil_baru[data-id="'+id+'"]').val()*1;
              var sisa = $('.sisa[data-id="'+id+'"]').val()*1;
              var rusak = $('.rusak[data-id="'+id+'"]').val()*1;
              var terpakai = $('.terpakai[data-id="'+id+'"]').val()*1;
              updateTemp(id, 'sisa_kemarin='+sisa_kemarin+'&ambil_baru='+ambil_baru+'&sisa='+sisa+'&rusak='+rusak+'&terpakai='+terpakai);
            });
            function updateTemp(id, data) {
              $('.editable').attr('readonly', 'readonly');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/produksi/update_temp_update',
                type: 'post',
                data: 'id='+id+'&'+data,
                success: function(response){
                  $('.editable').removeAttr('readonly');
                  listTemp();
                }, error: function(){
                  $('.editable').removeAttr('readonly');
                }
              });
            }
            $(".btn-hapus-temp").on("click", function(e){
              e.stopImmediatePropagation();
              var that = $(this);
              that.attr("disabled", "disabled");
              var id = that.attr('data-id');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/produksi/hapus_temp_update',
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
