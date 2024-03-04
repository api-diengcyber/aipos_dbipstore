
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Inkubasi Baru</li>
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
                Inkubasi Baru
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
                <form action="<?php echo base_url() ?>produksi/inkubasi/create_action" method="post">
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
                                <option value="<?php echo $key->id_users ?>" selected><?php echo $key->first_name ?></option>
                                <?php endforeach ?>
                              </select>
                            </div>
                            <p>Karyawan Masuk : <?php echo count($data_karyawan) ?>, Tidak Masuk : <?php echo $karyawan_total-count($data_karyawan) ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="box">
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>2. HASIL PRODUKSI</h4>
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th width="10">No</th>
                                  <th width="450">Nama Produk</th>
                                  <th width="120">Keranjang</th>
                                  <th width="100">Cup</th>
                                  <th width="100">Rusak</th>
                                  <th width="200">Total</th>
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
                            <h4>CATATAN LAIN-LAIN</h4> <?php echo form_error('catatan') ?>
                            <textarea name="catatan" id="catatan" cols="30" rows="4" class="form-control" placeholder="Tulis catatan"><?php echo $catatan ?></textarea>
                          </div>
                        </div>
                      </div>
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
          function listTemp() {
            $('[type="submit"]').attr("disabled", "disabled");
            $.ajax({
              url: '<?php echo base_url() ?>produksi/inkubasi/list_temp',
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
            $(".editable").on("change", function(){
              var id = $(this).attr('data-id');
              var keranjang = $('.keranjang[data-id="'+id+'"]').val()*1;
              var cup = $('.cup[data-id="'+id+'"]').val()*1;
              var rusak = $('.rusak[data-id="'+id+'"]').val()*1;
              var total = $('.total[data-id="'+id+'"]').val()*1;
              updateTemp(id, 'keranjang='+keranjang+'&cup='+cup+'&rusak='+rusak+'&total='+total);
            });
            function updateTemp(id, data) {
              $('.editable').attr('readonly', 'readonly');
              $.ajax({
                url: '<?php echo base_url() ?>produksi/inkubasi/update_temp',
                type: 'post',
                data: 'id='+id+'&'+data,
                success: function(response){
                  listTemp();
                  $('.editable').removeAttr('readonly');
                }, error: function(){
                  $('.editable').removeAttr('readonly');
                }
              });
            }
          }
        });
      </script>
