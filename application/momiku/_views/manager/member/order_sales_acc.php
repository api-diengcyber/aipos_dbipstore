
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Order</li>
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
                <?php echo $data_member->nama ?> >> Order Detail
              </h1>
              <h4 style="margin: 10px 10px 0px 10px"><i class="ace-icon fa fa-home"></i> <?php echo $data_member->alamat ?></h4>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="5">No.</th>
                        <th width="100">Tanggal</th>
                        <th>Produk</th>
                        <th width="100">Qty</th>
                        <th width="150">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($data_order as $key):
                      $ket_selesai = "<span class='badge badge-danger'>Belum ada faktur</span>";
                      if ($key->selesai==1) {
                        $ket_selesai = "<span class='badge badge-primary'>Sudah ada faktur</span>";
                        $row_orders = $this->db->select('o.no_faktur')
                                               ->from('orders_detail od')
                                               ->join('orders o', 'od.id_orders_2=o.id_orders_2 AND o.id_toko="'.$key->id_toko.'"')
                                               ->where('od.id_toko', $key->id_toko)
                                               ->where('od.id_orders_sales', $key->id_orders_temp)
                                               ->get()->row();
                        if ($row_orders) {
                          $faktur = $row_orders->no_faktur;
                        } else {
                          $faktur = "[Faktur Terhapus]";
                        }
                        $ket_selesai .= "<br><span class='badge badge-primary'>".$faktur."</span>";
                      } else if ($key->selesai==2) {
                        $ket_selesai = "<span class='badge badge-warning'>Transaksi dibatalkan</span>";
                      }
                      if ($key->acc_manager==0) {
                        $ket_selesai = "<span class='badge badge-inverse'>Belum diproses manager</span>";
                      }
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->tgl ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <td><?php echo $key->jumlah ?></td>
                        <td><?php echo $ket_selesai ?></td>
                      </tr>
                      <?php 
                      $no++;
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                  <a onclick="history.back()" href="#" class="btn btn-primary" style="margin-bottom:20px;">Kembali</a>
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->