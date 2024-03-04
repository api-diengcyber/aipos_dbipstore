
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan CS</li>
              <li class="active">Laporan Aktivitas CS</li>
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
                Laporan Aktivitas CS
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th colspan="4"><?php echo $nama_sales ?> - <?php echo $awal_periode ?> / <?php echo $akhir_periode ?></th>
                    </tr>
                    <tr>
                      <th width="10">No</th>
                      <th width="100">Tgl Order</th>
                      <th width="600">Detail</th>
                      <th width="10"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    $total = 0;
                    foreach ($data_detail as $key):
                      $expgb = (array) explode(",", $key->gb);
                      $res = $this->db->select('pr.nama_produk, SUM(od.jumlah) AS jml')
                                      ->from('orders_detail od')
                                      ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2')
                                      ->where('od.id_orders_2 > 0')
                                      ->where_in('od.id_orders_2', $expgb)
                                      ->group_by('od.id_produk')
                                      ->get()->result();
                      $detail = '';
                      foreach ($res as $key2) {
                        $detail .= $key2->nama_produk." : ".$key2->jml.'<br>';
                        $total += $key2->jml;
                      }
                    ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $key->tgl_order; ?></td>
                      <td><?php echo $detail ?></td>
                      <td><a href="#" class="btn_lihat_detail" data-tgl="<?php echo $key->tgl_order ?>">Lihat</a></td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="2" class="text-right">JUMLAH</th>
                      <th><?php echo $total ?></th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
                <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <form id="form_hid" action="<?php echo base_url() ?>admin/laporan_cs" method="post" target="_blank">
              <input type="hidden" name="dari" value="">
              <input type="hidden" name="sampai" value="">
              <input type="hidden" name="id_users" value="<?php echo $id_cs ?>">
            </form>
                
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
      
      <script>
      $(document).ready(function(){
        $(".btn_lihat_detail").on("click", function() {
          var tgl = $(this).attr("data-tgl");
          $('input[name="dari"]').val(tgl);
          $('input[name="sampai"]').val(tgl);
          $("#form_hid").submit();
        });
        
      });
      </script>