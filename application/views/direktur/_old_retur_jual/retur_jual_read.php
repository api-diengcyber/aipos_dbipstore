
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Retur Penjualan</li>
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
                No Retur : <?php echo $no_retur ?>
              </h1>
            </div><!-- /.page-header -->


            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="varchar">Faktur Penjualan</label>
                          <h3 style="margin:0px;">
                            <?php
                            if (!empty($no_faktur)) {
                              echo '<b style="color:blue;">'.$no_faktur.'</b>';
                            } else {
                              echo '<b style="color:red;"><i>Tidak ada / Manual</i></b>';
                            }
                            ?>
                          </h3>
                      </div>
                      <div class="form-group">
                          <label for="varchar">Pembeli</label>
                          <h3 style="margin:0px;"><?php echo $pembeli ?></h3>
                      </div>
                      <div class="form-group">
                          <label for="deskripsi">Tanggal</label>
                          <h3 style="margin:0px;"><?php echo $tgl ?></h3>
                      </div>
                      <div class="form-group">
                          <label for="int">Nominal Bayar</label><br>
                          <span><i>Termasuk diskon jika ada.</i></span>
                          <!-- <h3 style="margin:0px;">Rp <?php //echo number_format($total_ppn,0,',','.') ?></h3> -->
                          <h3 style="margin:0px;">Rp <?php echo number_format($nominal,0,',','.') ?></h3>
                      </div>
                  </div>
                  <div class="col-md-8">
                    <!-- PAGE CONTENT BEGINS -->
                      <div class="page-header">
                        <h1>Produk</h1>
                      </div>
                      <table id="" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                              <th>No</th>
                              <th>Produk</th>
                              <?php if ($level=='1') { ?>
                              <th>HPP</th>
                              <?php } ?>
                              <th>Jual</th>
                              <th>Jml</th>
                              <?php if ($level=='1') { ?>
                              <th>Total HPP</th>
                              <?php } ?>
                              <th>Potongan / pcs</th>
                              <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $no=1;
                          $total_harga = 0;
                          $sum_laba = 0;
                          foreach ($data_detail as $key):
                            $total_hpp = $key->harga_satuan * $key->jumlah;
                            $laba = $key->subtotal - $total_hpp;
                        ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $key->nama_produk ?></td>
                            <?php if ($level=='1') { ?>
                            <td>Rp. <span class="pull-right"><?php echo number_format($key->harga_satuan,0,',','.') ?></span></td>
                            <?php } ?>
                            <td>Rp. <span class="pull-right"><?php echo number_format($key->harga_jual,0,',','.') ?></span></td>
                            <td align="center"><?php echo $key->jumlah ?></td>
                            <?php if ($level=='1') { ?>
                            <td>Rp. <span class="pull-right"><?php echo number_format($total_hpp,0,',','.') ?></span></td>
                            <?php } ?>
                            <td>Rp. <span class="pull-right"><?php echo number_format($key->diskon/100 * $key->harga_jual,0,',','.') ?></span></td>
                            <td>Rp. <span class="pull-right"><?php echo number_format($key->subtotal,0,',','.') ?></span></td>
                          </tr>
                          <?php
                          $total_harga += $key->subtotal;
                          $sum_laba += $laba;
                          $no++; endforeach; ?>
                          <?php 
                          $total_harga = $total_harga;
                          $colspan = 5;
                          if ($level=='1') {
                            $colspan = 7;
                          }
                          ?>
                          <tr>
                            <th colspan="<?php echo $colspan ?>" style="text-align:right">Total Harga</th>
                            <td><?php echo 'Rp '.number_format($total_harga,0,',','.'); ?></td>
                          </tr>
                          <tr>
                            <th colspan="<?php echo $colspan ?>" style="text-align:right">Diskon Member</th>
                            <td><?php echo 'Rp '.number_format($diskon_member,0,',','.'); ?></td>
                          </tr>
                          <tr>
                            <th colspan="<?php echo $colspan ?>" style="text-align:right">Total - Diskon</th>
                            <td><?php echo 'Rp '.number_format($nominal,0,',','.'); ?></td>
                          </tr>
                          <!-- <tr>
                            <th colspan="<?php echo $colspan ?>" style="text-align:right">PPN (10%)</th>
                            <td><?php echo 'Rp '.number_format($ppn,0,',','.'); ?></td>
                          </tr>
                          <tr>
                            <th colspan="<?php echo $colspan ?>" style="text-align:right">GRAND TOTAL</th>
                            <td><?php echo 'Rp '.number_format($total_ppn,0,',','.'); ?></td>
                          </tr> -->
                        </tbody>
                      </table>
                    <!-- PAGE CONTENT ENDS -->
                  </div><!-- /.col -->

                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->