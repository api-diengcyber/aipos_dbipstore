
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Principal Detail Produk</li>
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
                Detail Pembeli Produk
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <h4><?php echo $data_produk->nama_produk ?></h4>
                <p>Periode <?php echo $start_periode ?> - <?php echo $end_periode ?></p>
                
                <div class="row">
                  <div class="col-xs-12">
                    <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th rowspan="2" width="60">No</th>
                          <th rowspan="2">Nama</th>
                          <?php for ($i = $month_start*1; $i <= $month_end*1; $i++) : ?>
                          <th colspan="2" class="text-center"><?php echo $array_month[$i] ?> <?php echo $tahun ?></th>
                          <?php endfor; ?>
                        </tr>
                        <tr>
                          <?php 
                          $array_jumlah = array();
                          for ($i = $month_start*1; $i <= $month_end*1; $i++):
                            $array_jumlah[$i]['jumlah'] = 0;
                            $array_jumlah[$i]['nominal'] = 0;
                          ?>
                          <th width="130" class="text-center">Jumlah</th>
                          <th width="130" class="text-center">Nominal</th>
                          <?php 
                          endfor;
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1; 
                      foreach ($data_detail as $key):
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $key->nama ?><br><?php echo $key->alamat ?><br><?php echo $key->telp ?><br><i><?php echo $key->first_name ?></i></td>
                          <?php 
                          for ($i = $month_start*1; $i <= $month_end*1; $i++) :
                            $row_det_month = $this->db->select('SUM(od.jumlah) AS jumlah, SUM(od.jumlah_bonus) AS jumlah_bonus, SUM(od.subtotal) AS total, m.nama, m.alamat, m.telp, o.pembeli, u.first_name')
                                      ->from('orders_detail od')
                                      ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko="'.$data_login['id_toko'].'"')
                                      ->join('member m', 'm.id_member=o.pembeli AND m.id_toko="'.$data_login['id_toko'].'"', 'left')
                                      ->join('users u', 'o.id_sales=u.id_users AND u.id_toko="'.$data_login['id_toko'].'"', 'left')
                                      ->where('od.id_toko', $data_login['id_toko'])
                                      ->where('od.id_produk', $id_produk)
                                      ->where('o.pembeli IS NOT NULL')
                                      ->where('o.pembeli', $key->pembeli)
                                      ->where('SUBSTRING(o.tgl_order,7,4)', $tahun)
                                      ->where('SUBSTRING(o.tgl_order,4,2)', sprintf('%02d', $i))
                                      ->order_by('m.nama', 'asc')
                                      ->get()->row();
                            $jumlah = 0;
                            $nominal = 0;
                            if ($row_det_month) {
                              $jumlah = $row_det_month->jumlah;
                              $nominal = $row_det_month->total;
                            }
                            $array_jumlah[$i]['jumlah'] += $jumlah;
                            $array_jumlah[$i]['nominal'] += $nominal;
                          ?>
                          <td class="text-right"><?php echo number_format($jumlah,0,',','.') ?></td>
                          <td class="text-right"><?php echo number_format($nominal,0,',','.') ?></td>
                          <?php endfor; ?>
                        </tr>
                      <?php
                      $no++; 
                      endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="2" class="text-right">TOTAL</th>
                          <?php for ($i = $month_start*1; $i <= $month_end*1; $i++) : ?>
                          <th class="text-right"><?php echo number_format($array_jumlah[$i]['jumlah'],0,',','.') ?></th>
                          <th class="text-right"><?php echo number_format($array_jumlah[$i]['nominal'],0,',','.') ?></th>
                          <?php endfor; ?>
                        </tr>
                      </tfoot>
                    </table>
                  </div>  
                </div>
                <br><br>
                <a href="<?php echo base_url() ?>principal" class="btn btn-primary"><< Kembali</a>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div>

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
<script>
$(document).ready(function(){
  $("#myTable").dataTable({
    "pageLength": 50
  });
});
</script>