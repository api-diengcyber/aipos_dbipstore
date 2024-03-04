
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Penjualan</li>
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
                Laporan Penjualan
              </h1>
            </div><!-- /.page-header -->
            
            <?php

            $chk_hari = "";
            $chk_bulan = "";

            if($per_laporan=='hari'){
              $tgl = date('d-m-Y');
              $chk_hari = "checked";

            } else if($per_laporan=='bulan') {
              $chk_bulan = "checked";

            } else {
              $tgl = date('d-m-Y');
              $chk_hari = "checked";

            }
            ?>

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                    <form method="post" id="formPeriode" class="form-horizontal" action="">
                      <div class="form-group">
                        <div class="col-sm-2">
                          <div class="radio">
                            <label>
                              <input name="per_laporan" type="radio" class="ace" value="hari" <?php echo $chk_hari; ?> onclick='this.form.submit()' />
                              <span class="lbl"> Hari ini </span>
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input name="per_laporan" type="radio" class="ace" value="bulan" <?php echo $chk_bulan; ?> onclick='this.form.submit()' />
                              <span class="lbl"> Periode</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="pos-rel"><br>
                            <div class="row">
                              <div class="col-xs-8 col-sm-11">
                                <div class="input-daterange input-group">
                                  <input type="text" class="input-sm form-control" id="datepicker1" name="awal_periode" value="<?php echo $awal_periode ?>" onchange="this.form.submit()" />
                                  <span class="input-group-addon">
                                    <i class="fa fa-exchange"></i>
                                  </span>
                                  <input type="text" class="input-sm form-control" id="datepicker2" name="akhir_periode" value="<?php echo $akhir_periode ?>" onchange="this.form.submit()" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>

                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                    </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div class="table-responsive">
                      <table id="" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="2" class="center">No</th>
                            <th>No Faktur</th>
                            <?php if($id_modul!=1){?>
                            <th>Pembayaran</th>
                            <?php }; ?>
                            <th>Tgl Order</th>
                            <th>Jam Order</th>
                            <th>Nominal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no=1;
                          $total_nominal = 0;
                          $total_laba = 0;
                          foreach ($contents as $key):
                          if($key->pembayaran=="1"){
                              $pembayaran = "TUNAI";
                          } else if($key->pembayaran=="2"){
                              $pembayaran = "KREDIT";
                          } else if($key->pembayaran=="3"){
                              $pembayaran = "DEPOSIT";
                          } else{
                              $pembayaran = "";
                          }
                          ?>
                          <tr>
                            <td class="center"><?php echo $no ?></td>
                            <td><a href="<?php echo base_url() ?>laporan_retail/detail_faktur/<?php echo $key->no_faktur ?>"><?php echo $key->no_faktur ?></a></td>
                            <?php if($id_modul!=1){?>
                            <td><?php echo $pembayaran ?></td>
                            <?php }; ?>
                            <td><?php echo $key->tgl_order ?></td>
                            <td><?php echo $key->jam_order ?></td>
                            <td>Rp <span style='float:right;'><?php echo number_format($key->nominal,0,',','.') ?></span></td>
                          </tr>
                          <?php
                          $total_nominal += $key->nominal;
                          $total_laba += $key->laba;
                          $no++;
                          endforeach;
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <?php if($id_modul!=1){?>
                            <td colspan="5" class="text-right"><font color="red">JUMLAH</td>
                            <?php } else { ?>
                            <td colspan="4" class="text-right"><font color="red">JUMLAH</td>
                            <?php }; ?>
                            <td><font color="red">Rp <span style='float:right;'><?php echo number_format($total_nominal,0,',','.') ?></span></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>


                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<!-- JQUERY -->
<script>
  jQuery(function($){
  });
</script>
<!-- JQUERY -->