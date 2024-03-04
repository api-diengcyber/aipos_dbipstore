
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Data Stok</li>
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
                Data Stok
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-md-12">
                <!-- PAGE CONTENT BEGINS -->

                <div style="margin-bottom:10px;">
                  <div class="row">
                      <?php 
                      $arr_qty = array();
                      foreach ($data_produk_stok as $key):
                        $jml = 0;
                        $row_o = $this->Stok_gudang_model->get_qty_order($key->id_toko, $key->id_produk_2);
                        if ($row_o) {
                          $jml = $row_o->jml_jual;
                        }
                        $arr_qty[$key->id_produk_2] = $jml;
                      ?>
                      <div class="infobox infobox-green infobox-large infobox-dark col-md-3">
                        <div class="infobox-data">
                          <div class="infobox-content">Stok <?php echo $key->nama_produk ?></div>
                          <div class="infobox-content"><h5><?php echo $key->jml_stok ?></h5></div>
                        </div>
                      </div>
                      <?php endforeach; 
                       ?>
                  </div>
                </div>

                <form action="<?php echo $action ?>" method="post">
                  <?php 
                  $no = 1;
                  foreach ($data_gudang as $key):
                    $res_sg = $this->Stok_gudang_model->get_produk_by_id_gudang($key->id);
                  ?>
                  <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                      <tr>
                        <th width="10px"><?php echo $no ?></th>
                        <th><?php echo $key->nama_gudang ?></th>
                        <th width="150px" class="text-center">Jumlah</th>
                        <th width="150px" class="text-center">Sisa stok</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $array_sisa = array();
                    foreach ($res_sg as $key2):
                      $sisa = $key2->stok-$arr_qty[$key2->id_produk_2];
                      $s = $sisa;
                      if ($s < 0) {
                        $s = 0;
                      }
                    ?>
                      <tr>
                        <td></td>
                        <td><?php echo $key2->nama_produk ?></td>
                        <td class="text-center" style="padding:0px;">
                          <input type="text" class="form-control text-center input-jml" data-id="<?php echo $key2->id_produk_2 ?>" data-id-gudang="<?php echo $key->id ?>" name="id_produk[<?php echo $key->id ?>][<?php echo $key2->id_produk_2 ?>]" value="<?php echo $s ?>" />
                        </td>
                        <td class="text-center text-sisa" data-id="<?php echo $key2->id_produk_2 ?>" data-id-gudang="<?php echo $key->id ?>">0</td>
                      </tr>
                    <?php 
                      if ($sisa < 0) {
                        $arr_qty[$key2->id_produk_2] = $sisa*-1;
                      }
                    endforeach; ?>
                    </tbody>
                  </table>
                  <?php $no++; endforeach ?>

                  <div class="text-ket" style="margin-bottom:10px;">
                  </div>

                  <div>
                    <button type="submit" class="btn btn-primary" disabled>Simpan</button>
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
        function calc() {
          var arr_stok = [];
          var arr_nama = [];
          <?php foreach ($data_produk_stok as $key): ?>
            arr_stok[<?php echo $key->id_produk_2*1 ?>] = <?php echo $key->jml_stok*1 ?>;
            arr_nama[<?php echo $key->id_produk_2*1 ?>] = "<?php echo $key->nama_produk ?>";
          <?php endforeach ?>
          $(".input-jml").each(function(){
            var jml = $(this).val();
            var id_produk = $(this).attr('data-id');
            var id_gudang = $(this).attr('data-id-gudang');
            arr_stok[id_produk] -= jml*1;
            $('.text-sisa[data-id="'+id_produk+'"][data-id-gudang="'+id_gudang+'"]').html(arr_stok[id_produk]);
          });
          var ket = '';
          var t_stok = 0;
          for (var ip in arr_stok) {
            ket += ' Sisa stok '+arr_nama[ip]+' : <b>'+arr_stok[ip]+'</b><br>';
            t_stok += arr_stok[ip];
          }
          if (t_stok == 0) {
            $(".text-ket").html('');
            $('button[type="submit"]').removeAttr("disabled");
          } else {
            $(".text-ket").html(ket);
            $('button[type="submit"]').attr("disabled","disabled");
          }
        }
        $(".input-jml").on("keyup", function(){
          calc();
        });
        calc();
      });
      </script>