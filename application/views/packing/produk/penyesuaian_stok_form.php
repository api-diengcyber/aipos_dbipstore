
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Produk</li>
              <li class="active">Penyesuaian Stok</li>
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
                Penyesuaian Stok
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

                <form method="post" action="<?php echo $action ?>">
                  <div class="form-group">
                    <label for="">Tanggal <?php echo form_error('tgl_penyesuaian') ?></label>
                    <input type="text" class="form-control" name="tgl_penyesuaian" id="tgl_penyesuaian" value="<?php echo $tgl_penyesuaian ?>" placeholder="dd-mm-yyyy" readonly />
                  </div>
                  <div class="form-group">
                    <label for="">Produk <?php echo form_error('id_produk') ?></label>
                    <select class="form-control" name="id_produk" id="id_produk">
                      <option value="">-- Pilih Produk --</option>
                      <?php foreach ($data_produk as $key): ?>
                      <option value="<?php echo $key->id_produk_2 ?>" data-stok="<?php echo $key->jml_stok ?>"><?php echo $key->nama_produk ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="ket_stok"></div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Stok <?php echo form_error('stok') ?></label>
                        <input type="text" class="form-control" name="stok" id="stok" value="<?php echo $stok ?>" placeholder="Stok" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Penyesuaian Stok</label>
                        <input type="text" class="form-control" name="pstok" id="pstok" value="" placeholder="Penyesuaian Stok" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Keterangan <?php echo form_error('keterangan') ?></label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?php echo $keterangan ?>" placeholder="Keterangan" />
                  </div>
                  
                  <div style="margin-top:20px;">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url() ?>admin/penyesuaian_stok" class="btn btn-default">Batal</a>
                  </div>

                </form>
                
                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


      <script>
      $(document).ready(function(){
        var stok_act = 0;

        $("#stok").on('keyup', function(){
          var val = $(this).val()*1;
          var pstok = (stok_act*1)+val;
          $("#pstok").val(pstok);
        });

        $("#id_produk").on("change", function(){
          var val = $(this).val()*1;
          var stok = $(this).find(':selected').attr('data-stok');
          stok_act = stok;
          if (val > 0) {
            $(".ket_stok").html('<div style="margin-bottom:10px;font-weight:bold;">Stok saat ini : '+stok+'</div>');
            $("#stok").keyup();
          } else {
            $(".ket_stok").html('');
          }
        });
        $("#id_produk").trigger("change");

      });
      </script>