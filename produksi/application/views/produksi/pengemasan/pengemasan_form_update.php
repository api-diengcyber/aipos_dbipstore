
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Pengemasan Baru</li>
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
                Pengemasan Baru
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
                <form action="<?php echo base_url() ?>produksi/pengemasan/update_action" method="post">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="row">
                          <div class="col-md-3">
                            <h4>1. DATA UMUM</h4>
                            <div class="sub-title">GK-FSOP-17</div>
                            <div class="form-group" style="margin-top:8px;">
                              <label>Tanggal pengemasan <?php echo form_error('tgl') ?></label>
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
                            <h4>2. PERSIAPAN PENGEMASAN</h4>
                            <!-- <div class="form-group">
                              <label>Ambil data produksi</label>
                              <div class="row">
                                <div class="col-md-6">
                                  <input type="text" class="form-control" name="tgl_produksi" id="datepicker2" value="<?php // echo $tgl_produksi ?>">
                                </div>
                                <div class="col-md-6">
                                  <button type="button" class="btn btn-primary btn-xs" id="btn-produksi-barang">Lihat data</button>
                                </div>
                              </div>
                            </div> -->
                            <div id="panel_produksi"></div>
                          </div>
                        </div>
                      </div>
                       <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>3. PENGEMASAN</h4>
                            <table class="table table-bordered" id="table_barang">
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
                            </table>
                          </div>
                        </div>
                      </div>
                       <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>4. PRODUK JADI</h4>
                            <table class="table table-bordered" id="table_barang_jadi">
                              <thead>
                                <tr>
                                  <th width="10">No</th>
                                  <th width="450">Nama Produk</th>
                                  <th width="100">Stok</th>
                                  <th width="10"></th>
                                </tr>
                              </thead>
                              <tbody></tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>PROGRESS</h4> <?php echo form_error('progress') ?>
                            <div class="row">
                              <div class="col-md-2">
                                <div class="radio">
                                  <label>
                                    <input name="progress" type="radio" class="ace" value="20" <?php echo $progress==20?"checked":"" ?> />
                                    <span class="lbl"> 20 %</span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="radio">
                                  <label>
                                    <input name="progress" type="radio" class="ace" value="40" <?php echo $progress==40?"checked":"" ?> />
                                    <span class="lbl"> 40 %</span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="radio">
                                  <label>
                                    <input name="progress" type="radio" class="ace" value="60" <?php echo $progress==60?"checked":"" ?> />
                                    <span class="lbl"> 60 %</span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="radio">
                                  <label>
                                    <input name="progress" type="radio" class="ace" value="80" <?php echo $progress==80?"checked":"" ?> />
                                    <span class="lbl"> 80 %</span>
                                  </label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <div class="radio">
                                  <label>
                                    <input name="progress" type="radio" class="ace" value="100" <?php echo $progress==100?"checked":"" ?> />
                                    <span class="lbl"> 100 %</span>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>CATATAN LAIN-LAIN</h4>
                            <textarea name="catatan" id="catatan" cols="30" rows="4" class="form-control" placeholder="Tulis catatan"><?php echo $catatan ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                      <p>Belum bisa edit</p>
                      <!-- <button type="submit" class="btn btn-primary btn-block" disabled="disabled">Simpan Perubahan</button> -->
                    </div>
                  </div>
                </form>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Data Produksi <span class="modal_tgl_inkubasi"></span></h4>
            </div>
            <div class="modal-body">
              <div class="table-responsive">
                <table class="table table-bordered table-stripped" id="table-review">
                  <thead>
                    <tr>
                      <th>Produk</th>
                      <th>Keranjang</th>
                      <th>Cup</th>
                      <th>Rusak</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_inkubasi" id="id_inkubasi">
              <button type="button" class="btn btn-primary btn-add-inkubasi" data-dismiss="modal">Tambahkan data</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        $(document).ready(function(){
          $("#btn-produksi-barang").on("click", function(){
            var tgl = $('input[name="tgl_produksi"]').val();
            $(".modal_tgl_inkubasi").text(tgl);
            $(".btn-add-inkubasi").attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/pengemasan/list_produksi',
              type: 'post',
              data: 'tgl='+tgl,
              success: function(response){
                if (response.status=="ok") {
                  $("#table-review tbody").html(response.data);
                  $("#id_inkubasi").val(response.id_inkubasi);
                  $(".btn-add-inkubasi").removeAttr("disabled");
                } else {
                  $("#table-review tbody").html('');
                  $("#id_inkubasi").val('');
                }
              },
              error: function(){
                $("#table-review tbody").html('');
                $("#id_inkubasi").val('');
              }
            });
            $("#myModal").modal("show");
          });
          $(".btn-add-inkubasi").on("click", function(){
            var id_inkubasi = $("#id_inkubasi").val();
            $.ajax({
              url: '<?php echo base_url() ?>produksi/pengemasan/add_inkubasi_update',
              type: 'post',
              data: 'id='+id_inkubasi,
              success: function(response) {
                $("#myModal").modal("hide");
                listTempBahan();
              },
              error: function() {
                listTempBahan();
              }
            });
          });
          function listTempBahan() {
            $('[type="submit"]').attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/pengemasan/list_temp_update',
              type: 'get',
              success: function(response){
                $('[type="submit"]').removeAttr("disabled");
                if (response.status=="ok") {
                  $("#panel_produksi").html(response.data);
                  jqueryTempBahan();
                }
              }, error: function() {
                $('[type="submit"]').removeAttr("disabled");
              }
            });
          }
          listTempBahan();
          function jqueryTempBahan() {
            $("#table_produksi .editable").on("change", function(){
              var id = $(this).attr('data-id');
              var cup = $('.cup[data-id="'+id+'"]').val()*1;
              var rusak = $('.rusak[data-id="'+id+'"]').val()*1;
              updateTempBahan(id, 'cup='+cup+'&rusak='+rusak);
            });
            function updateTempBahan(id, data) {
              $('#table_produksi .editable').attr('readonly', 'readonly');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pengemasan/update_temp_bahan_update',
                type: 'post',
                data: 'id='+id+'&'+data,
                success: function(response){
                  listTempBahan();
                  $('#table_produksi .editable').removeAttr('readonly');
                }, error: function(){
                  $('#table_produksi .editable').removeAttr('readonly');
                }
              });
            }
            $("#table_produksi .btn-hapus-temp").on("click", function(e){
              e.stopImmediatePropagation();
              var that = $(this);
              that.attr("disabled", "disabled");
              var id = that.attr('data-id');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pengemasan/hapus_temp_update',
                type: 'post',
                data: 'id='+id,
                success: function(response) {
                  listTempBahan();
                }, error: function() {
                  listTempBahan();
                }
              });
            });
          }
          function listTempPengemasan() {
            $('[type="submit"]').attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/pengemasan/list_temp_pengemasan_update',
              type: 'get',
              success: function(response){
                $('[type="submit"]').removeAttr("disabled");
                if (response.status=="ok") {
                  $("#table_barang tbody").html(response.data);
                  jqueryTempPengemasan();
                }
              }, error: function() {
                $('[type="submit"]').removeAttr("disabled");
              }
            });
          }
          listTempPengemasan();
          function jqueryTempPengemasan() {
            $("#table_barang .editable").on("change", function(){
              var id = $(this).attr('data-id');
              var ambil_baru = $('.ambil_baru[data-id="'+id+'"]').val()*1;
              var sisa = $('.sisa[data-id="'+id+'"]').val()*1;
              var rusak = $('.rusak[data-id="'+id+'"]').val()*1;
              updateTempPengemasan(id, 'ambil_baru='+ambil_baru+'&sisa='+sisa+'&rusak='+rusak);
            });
            function updateTempPengemasan(id, data) {
              $('#table_barang .editable').attr('readonly', 'readonly');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pengemasan/update_temp_update',
                type: 'post',
                data: 'id='+id+'&'+data,
                success: function(response){
                  listTempPengemasan();
                  $('#table_barang .editable').removeAttr('readonly');
                }, error: function(){
                  $('#table_barang .editable').removeAttr('readonly');
                }
              });
            }
            $("#table_barang .btn-hapus-temp").on("click", function(e){
              e.stopImmediatePropagation();
              var that = $(this);
              that.attr("disabled", "disabled");
              var id = that.attr('data-id');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pengemasan/hapus_temp_update',
                type: 'post',
                data: 'id='+id,
                success: function(response) {
                  listTempPengemasan();
                }, error: function() {
                  listTempPengemasan();
                }
              });
            });
          }
          function listTempBarangJadi() {
            $('[type="submit"]').attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/pengemasan/list_temp_produk_update',
              type: 'get',
              success: function(response){
                $('[type="submit"]').removeAttr("disabled");
                if (response.status=="ok") {
                  $("#table_barang_jadi tbody").html(response.data);
                  jqueryTempBarangJadi();
                }
              }, error: function() {
                $('[type="submit"]').removeAttr("disabled");
              }
            });
          }
          listTempBarangJadi();
          function jqueryTempBarangJadi() {
            $("#table_barang_jadi .editable").on("change", function(){
              var id = $(this).attr('data-id');
              var cup = $('.cup[data-id="'+id+'"]').val()*1;
              updateTempBarangJadi(id, 'cup='+cup);
            });
            function updateTempBarangJadi(id, data) {
              $('#table_barang_jadi .editable').attr('readonly', 'readonly');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pengemasan/update_temp_produk_update',
                type: 'post',
                data: 'id='+id+'&'+data,
                success: function(response){
                  listTempBarangJadi();
                  $('#table_barang_jadi .editable').removeAttr('readonly');
                }, error: function(){
                  $('#table_barang_jadi .editable').removeAttr('readonly');
                }
              });
            }
            $("#table_barang_jadi .btn-hapus-temp").on("click", function(e){
              e.stopImmediatePropagation();
              var that = $(this);
              that.attr("disabled", "disabled");
              var id = that.attr('data-id');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/pengemasan/hapus_temp_update',
                type: 'post',
                data: 'id='+id,
                success: function(response) {
                  listTempBarangJadi();
                }, error: function() {
                  listTempBarangJadi();
                }
              });
            });
          }
        });
      </script>
