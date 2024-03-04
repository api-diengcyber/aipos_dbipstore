
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Dashboard</li>
            </ul><!-- /.breadcrumb -->
            <!-- <div id="google_translate_element"></div>
            <script>
              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pagelanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, 'google_translate_element');
              }
            </script>
             <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>  -->
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
              <div class="row">
                <div class="col-md-4">
                  <h1>
                    Dashboard
                  </h1> 
                </div>
                <div class="col-md-4">
                  <?php if($is_pusat){ ?>
                  <form action="" method="post">
                    <select name="cabang" id="cabang" class="form-control" onchange="this.form.submit()">
                       <option value="<?php echo $id_toko_pusat ?>">-- Pusat --</option>
                       <?php foreach ($data_cabang as $dc): ?>
                          <option value="<?php echo $dc->id_cabang ?>" <?php if($this->session->userdata('id_toko') == $dc->id_cabang){ echo 'selected'; } ?>><?php echo $dc->nama_toko ?></option>
                       <?php endforeach ?>
                    </select>
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div><!-- /.page-header -->
            
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="space-6"></div>

                  <div class="col-sm-7">
                    
                    <?php if ($id_modul == '2') { ?>

                    <?php }; ?>

                    <div class="row" style="margin:0px;margin-bottom:20px">
                      <div class="col-md-3" style="padding:0px">
                        <div style="width:100%;border:0px" class="infobox infobox-green">
                          <div class="infobox-icon">
                            <i class="ace-icon fa fa-cart-plus"></i>
                          </div>

                          <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $produk_terjual->jumlah*1 ?></span>
                            <div class="infobox-content">Total Produk Terjual</div>
                          </div>

                          <div class="stat stat-success"></div>
                        </div>
                      </div>
                      <div class="col-md-3" style="padding:0px">
                        <div style="width:80%;border:0px;background:transparent!important" class="infobox infobox-blue">
                          <div class="infobox-icon">
                            <i class="ace-icon fa fa-archive"></i>
                          </div>

                          <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $produk->jml*1 ?></span>
                            <div class="infobox-content">Jumlah Item Produk</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3" style="padding:0px">
                        <div style="width:80%;border:0px" class="infobox infobox-red">
                          <div class="infobox-icon">
                            <i class="ace-icon fa fa-database"></i>
                          </div>
                          <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $total_stok->jml_stok*1 ?></span>
                            <div class="infobox-content">Semua Stok</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3" style="padding:0px">
                        <div style="width:80%;border:0px" class="infobox infobox-orange2">
                          <div class="infobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
                          </div>
                          <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo count($orders) ?></span>
                            <div class="infobox-content">Order Hari ini</div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php if ($id_modul == '5') { ?>
                    <div class="infobox infobox-green2">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-glass"></i>
                      </div>
                      <div class="infobox-data">
                        <span class="infobox-data-number"><?php echo count($produk_kadaluarsa) ?></span>
                        <div class="infobox-content">Produk Kadaluarsa</div>
                      </div>
                    </div>
                    <?php } ?>


                    <div class="space"></div>

                    <div class="widget-box widget-color-dark" id="recent-box" style="margin-top:20px">
                      <div class="widget-header">
                        <h4 class="widget-title bigger lighter smaller">
                          <i class="ace-icon fa fa-signal"></i>GRAFIK
                        </h4>
                        <div class="widget-toolbar no-border">
                          <ul class="nav nav-tabs" id="recent-tab">
                            <li class="active">
                              <a data-toggle="tab" href="#hari-ini-tab">HARI INI</a>
                            </li>
                            <li>
                              <a data-toggle="tab" href="#bulan-ini-tab">BULAN INI</a>
                            </li>
                            <li>
                              <a data-toggle="tab" href="#tahun-tab">TAHUN INI</a>
                            </li>
                            <li>
                              <a data-toggle="tab" href="#kasir-tab">SALES</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main padding-4">
                          <div class="tab-content padding-8">
                            <div id="hari-ini-tab" class="tab-pane active">
                              <canvas id="grafik_hari_ini"></canvas>
                            </div>
                            <div id="bulan-ini-tab" class="tab-pane">
                              <canvas id="grafik_bulan_ini"></canvas>
                            </div><!-- /.#member-tab -->
                            <div id="tahun-tab" class="tab-pane">
                              <canvas id="grafik_tahun"></canvas>
                            </div>
                            <div id="kasir-tab" class="tab-pane">
                              <canvas id="grafik_sales"></canvas>
                            </div>
                          </div>
                        </div><!-- /.widget-main -->
                      </div><!-- /.widget-body -->
                    </div><!-- /.widget-box -->

                <div class="space"></div>
                  <div class="widget-box widget-color-red">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title bigger lighter">
                          <i class="ace-icon fa fa-list"></i>
                          Jatuh Tempo Pembelian
                        </h4>
                        <div class="widget-toolbar">
                          <div class="row">
                            <div class="col-xs-9">
                              <form action="" method="post">
                                <select name="tempo_pemb" id="" class="form-control" style="height:30px;margin-top:3px" onchange="this.form.submit()">
                                  <option value="7" <?php if($tempo_pemb == '7'){ echo 'selected'; } ?>>Minggu Ini</option>
                                  <option value="14" <?php if($tempo_pemb == '14'){ echo 'selected'; } ?>>2 Minggu Lagi</option>
                                  <option value="30" <?php if($tempo_pemb == '30'){ echo 'selected'; } ?>>Bulan Ini</option>
                                  <option value="90" <?php if($tempo_pemb == '90'){ echo 'selected'; } ?>>Tri Wulan</option>
                                </select>
                              </form>
                            </div>
                            <div class="col-xs-3">
                                <a href="#" data-action="collapse">
                                  <i class="ace-icon fa fa-chevron-up" style="color:white"></i>
                                </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main no-padding">
                          <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th width="200px">No Faktur</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Total</th>
                                    <th>DP</th>
                                    <th>Bayar</th>
                                </thead>
                                <tbody>
                                  <?php foreach ($tempo_pembelian as $tp):
                                    if($tp->total_hutang > 0){
                                    ?>
                                    <tr>
                                      <td>
                                        <a href="<?php echo base_url('pembelian_retail/transaksi_faktur/').$tp->id ?>" class="label label-warning" style="margin-bottom:5px">
                                          <?php echo $tp->no_faktur ?>
                                        </a>
                                        <label for="" class="label label-primary">
                                          Suplier : <?php echo $tp->nama_supplier ?>
                                        </label>
                                      </td>
                                      <td><?php echo $tp->deadline ?></td>
                                      <td>
                                        <?php echo $tp->total; ?> Total Pembelian <br>
                                        <?php echo $tp->tot_hutang; ?> Total Hutang
                                      </td>
                                      <td><?php echo $tp->dp ?></td>
                                      <td><?php echo $tp->total_hutang ?></td>
                                    </tr>
                                  <?php } endforeach ?>
                                </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                  </div>
                <div class="space"></div>
                    <div class="widget-box widget-color-green">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title bigger lighter">
                          <i class="ace-icon fa fa-list"></i>
                          Jatuh Tempo Penjualan
                        </h4>
                        <div class="widget-toolbar">
                          <div class="row">
                            <div class="col-xs-9">
                              <form action="" method="post">
                                <select name="tempo_penj" id="" class="form-control" style="height:30px;margin-top:3px" onchange="this.form.submit()">
                                  <option value="7" <?php if($tempo_penj == '7'){ echo 'selected'; } ?>>Minggu Ini</option>
                                  <option value="14" <?php if($tempo_penj == '14'){ echo 'selected'; } ?>>2 Minggu Lagi</option>
                                  <option value="30" <?php if($tempo_penj == '30'){ echo 'selected'; } ?>>Bulan Ini</option>
                                  <option value="90" <?php if($tempo_penj == '90'){ echo 'selected'; } ?>>Tri Wulan</option>
                                </select>
                              </form>
                            </div>
                            <div class="col-xs-3">
                                <a href="#" data-action="collapse">
                                  <i class="ace-icon fa fa-chevron-up" style="color:white"></i>
                                </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="widget-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="margin-bottom:0px">
                                <thead>
                                    <th>No Faktur</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Total</th>
                                    <!--<th>DP</th>-->
                                    <th>Bayar</th>
                                </thead>
                                <tbody>
                                  <?php foreach ($piutang_penjualan as $pp): ?>
                                    <tr>
                                      <td>
                                        <a class="label label-warning" style="margin-bottom:5px" href="<?php echo base_url('laporan_retail/detail_faktur/').$pp->no_faktur ?>">
                                          <?php echo $pp->no_faktur ?>
                                        </a> <br>
                                        <label for="" class="label label-primary">Pembeli : <?php echo $pp->nama ?></label>
                                      </td>
                                      <td><?php echo $pp->deadline ?></td>
                                      <td><?php echo $pp->jumlah_hutang; ?></td>
                                      <!--<td></td>-->
                                      <td><?php echo $pp->jumlah_bayar ?></td>
                                    </tr>
                                  <?php endforeach ?>
                                </tbody>
                            </table>
                          </div>
                      </div>
                  </div>
                <div class="space"></div>

                    <div class="space"></div>
                  </div><!-- /.col -->


                  <div class="col-sm-5">
                    <div class="infobox infobox-orange infobox-large infobox-dark" style="width:48%!important;margin-bottom:2px">
                      <div class="infobox-data">
                        <div class="infobox-content">Total Persediaan</div>
                        <div class="infobox-content"><h5>Rp. <?php echo number_format($persediaan,0,',','.'); ?></h5></div>
                      </div>
                    </div>
                    <div class="infobox infobox-green infobox-large infobox-dark" style="width:48%!important;margin-bottom:2px">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data">
                        <div class="infobox-content">Hari ini</div>
                        <?php
                        $heading = 'h5';
                        if (strlen(number_format($laba_hari_ini->jml_laba,0,',','.')) > 8) {
                          $heading = 'h6';
                        }
                        ?>
                        <div class="infobox-content" style="margin-top:-10px;"><<?php echo $heading ?>>Rp.<?php echo number_format(($laba_hari_ini->jml_laba*(10/100))+$laba_hari_ini->jml_laba,0,',','.'); ?></<?php echo $heading ?>></div>
                      </div>
                    </div>

                <div class="row" style="margin-top:20px;">
                  <div class="col-xs-12">
                    <div class="infobox infobox-blue2 infobox-large infobox-dark" style="width:48%">
                      <div class="infobox-icon">
                        <i class="ace-icon fa fa-upload"></i>
                      </div>
                      <div class="infobox-data">
                        <div class="infobox-content">Piutang</div>
                        <div class="infobox-content"><h4>Rp.<?php echo number_format($total_piutang->total*1,0,',','.'); ?></h4></div>
                      </div>
                    </div>
                    <div class="infobox infobox-red infobox-large infobox-dark" style="width:48%">
                      <div class="infobox-data">
                        <div class="infobox-content">Hutang</div>
                        <div class="infobox-content"><h4>Rp.<?php echo number_format($total_hutang->total*1,0,',','.'); ?></h4></div>
                      </div>
                    </div>
                  </div>
                </div>

                  <div class="space"></div>

                    <div class="widget-box widget-color-purple">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title bigger lighter">
                          <i class="ace-icon fa fa-list"></i>
                          Produk Terlaris Hari Ini
                        </h4>
                        <div class="widget-toolbar">
                          <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                          </a>
                        </div>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main no-padding">
                          <table class="table table-bordered table-striped">
                            <thead class="thin-border-bottom">
                              <tr>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Nama Produk
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Harga
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Dibeli
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($produk_terlaris_hari_ini as $key): ?>
                              <tr>
                                <td><?php echo $key->nama_produk ?></td>
                                <td>
                                  <b class="green">Rp <?php echo number_format($key->harga_1,0,',','.') ?></b>
                                </td>
                                <td class="center">
                                  <span class="label label-info arrowed"><?php echo number_format($key->jumlah,0,',','.') ?></span>
                                </td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                          </table>
                        </div><!-- /.widget-main -->
                      </div><!-- /.widget-body -->
                    </div><!-- /.widget-box -->
                  <div class="space"></div>

                    <div class="widget-box widget-color-orange">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title bigger lighter">
                          <i class="ace-icon fa fa-list"></i>
                          Produk Expired Bulan Ini
                        </h4>
                        <div class="widget-toolbar">
                          <div class="row">
                            <div class="col-md-6">
                              <a href="<?php echo base_url('retail/produk_kadaluarsa') ?>" class="btn btn-xs btn-primary">Detail</a>
                            </div>
                            <div class="col-md-6">
                              <a href="#" data-action="collapse" class="pull-right" style="color:white">
                                <i class="ace-icon fa fa-chevron-up"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main no-padding">
                          <table class="table table-bordered table-striped">
                            <thead class="thin-border-bottom">
                              <tr>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Faktur
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Nama Produk
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Tgl Expire
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($produk_expired as $key): ?>
                              <tr>
                                <td>
                                  <?php echo $key->no_faktur ?>
                                </td>
                                <td>
                                  <?php echo $key->nama_produk ?>
                                </td>
                                <td class="center">
                                  <?php echo $key->tgl_expire ?>
                                </td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                          </table>
                        </div><!-- /.widget-main -->
                      </div><!-- /.widget-body -->
                    </div><!-- /.widget-box -->
                <div class="space"></div>

                    <div class="widget-box widget-color-green2">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title bigger lighter">
                          <i class="ace-icon fa fa-star"></i>
                          Produk Terlaris
                        </h4>
                        <div class="widget-toolbar">
                          <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                          </a>
                        </div>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main no-padding">
                          <table class="table table-bordered table-striped">
                            <thead class="thin-border-bottom">
                              <tr>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Nama Produk
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Harga
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Dibeli
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($produk_terlaris as $key): ?>
                              <tr>
                                <td><?php echo $key->nama_produk ?></td>
                                <td>
                                  <b class="green">Rp <?php echo number_format($key->harga_1,0,',','.') ?></b>
                                </td>
                                <td class="center">
                                  <span class="label label-lg label-warning arrowed-in arrowed-in-right"><?php echo number_format($key->dibeli,0,',','.') ?></span>
                                </td>
                              </tr>
                            <?php endforeach ?>
                            </tbody>
                          </table>
                        </div><!-- /.widget-main -->
                      </div><!-- /.widget-body -->
                    </div><!-- /.widget-box -->

                <div class="space"></div>

                    <div class="widget-box  widget-color-dark">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title bigger lighter">
                          <i class="ace-icon fa fa-upload"></i>
                          Penjualan Terakhir
                        </h4>
                        <div class="widget-toolbar">
                          <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                          </a>
                        </div>
                      </div>
                      <div class="widget-body">
                        <div class="widget-main no-padding">
                          <table class="table table-bordered table-striped">
                            <thead class="thin-border-bottom">
                              <tr>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>No Faktur
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Tgl Order
                                </th>
                                <th>
                                  <i class="ace-icon fa fa-caret-right blue"></i>Nominal
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data_order_terakhir as $key_da) :?>
                              <tr>
                                <td><?php echo $key_da->no_faktur ?></td>
                                <td><?php echo $key_da->tgl_order ?></td>
                                <td>Rp <span style="float:right;"><?php echo number_format($key_da->nominal,0,',','.') ?></span></td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div><!-- /.widget-main -->
                      </div><!-- /.widget-body -->
                    </div><!-- /.widget-box -->

                <div class="space"></div>

                <!-- PAGE CONTENT ENDS -->
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.main-content -->
    <style>
      .data-label-1{
        font-size: 10px;
        padding: 2px;
        background: rgba(90, 200, 90, .4);
        color:black;
      }
      .data-label-1:hover{
        font-size: 13px;
        background-color: #44EE44;
        z-index: 1000;
      }
      .data-label-2{
        font-size: 10px;
        padding: 2px;
        background: rgba(230, 30, 30, .4);
      }
      .data-label-2:hover{
        font-size: 13px;
        background-color: #EE5555;
        color: white;
        z-index: 1000;
      }
    </style>

    <!--[if lte IE 8]>
      <script src="<?php echo base_url()?>assets/js/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url()?>assets/js/chart.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.sparkline.index.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.resize.min.js"></script>

    <script>
    jQuery(function($){

        $("<div id='tooltip'></div>").css({
          position: "absolute",
          display: "none",
          border: "1px solid #fdd",
          padding: "2px",
          "background-color": "#fee",
          opacity: 0.80,
          color: "black",
          "font-weight": "bold",
        }).appendTo("body");

        $('.easy-pie-chart.percentage').each(function(){
          var $box = $(this).closest('.infobox');
          var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
          var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
          var size = parseInt($(this).data('size')) || 50;
          $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size/10),
            animate: ace.vars['old_ie'] ? false : 1000,
            size: size
          });
        });
      
        $('.sparkline').each(function(){
          var $box = $(this).closest('.infobox');
          var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
          $(this).sparkline('html',
                  {
                    tagValuesAttribute:'data-values',
                    type: 'bar',
                    barColor: barColor ,
                    chartRangeMin:$(this).data('min') || 0
                  });
        });

        /* GRAFIK ORDER HARI INI */
        <?php
          $label_order_hari_ini = json_encode($grafik_order_hari_ini['label']);
          $data_order_hari_ini = json_encode($grafik_order_hari_ini['value']);
        ?>

        var grafik_hari_ini = $("#grafik_hari_ini");
        var garikHariIni = new Chart(grafik_hari_ini, {
            type: 'line',
            data: {
                labels: <?php echo $label_order_hari_ini ?>,
                datasets: [{
                    label: 'Grafik Penjualan Hari Ini',
                    data: <?php echo $data_order_hari_ini ?>,
                    backgroundColor: [
                        'rgba(255,132,99, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,132,99, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        /* GRAFIK ORDER HARI INI */
      
        /* GRAFIK ORDER PER HARI */
        <?php
          $label_order_per_hari = json_encode($grafik_order_per_hari['label']);
          $data_order_per_hari = json_encode($grafik_order_per_hari['value']);
        ?>

        var grafik_bulan_ini = $("#grafik_bulan_ini");
        var grafikBulanIni = new Chart(grafik_bulan_ini, {
            type: 'line',
            data: {
                labels: <?php echo $label_order_per_hari ?>,
                datasets: [{
                    label: 'Grafik Penjualan Bulan Ini',
                    data: <?php echo $data_order_per_hari ?>,
                    backgroundColor: [
                        'rgba(255,132,99, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,132,99, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        /* GRAFIK ORDER PER HARI */

        /* GRAFIK ORDER PER BULAN */
        <?php
          $label_order_per_bulan = json_encode($grafik_order_per_bulan['label']);
          $value_order_per_bulan = json_encode($grafik_order_per_bulan['value']);
        ?>

        var grafik_per_bulan = $("#grafik_tahun");
        var grafikPerBUlan = new Chart(grafik_per_bulan, {
            type: 'line',
            data: {
                labels: <?php echo $label_order_per_bulan ?>,
                datasets: [{
                    label: 'Grafik Penjualan Per Bulan',
                    data: <?php echo $value_order_per_bulan ?>,
                    backgroundColor: [
                      'rgba(255,132,99, 0.2)',
                    ],
                    borderColor: [
                      'rgba(255,132,99, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        /* GRAFIK ORDER PER BULAN */

        /* GRAFIK ORDER PER KASIR */
        <?php
          $label_order_per_kasir = json_encode($grafik_order_per_kasir['label']);
          $value_order_per_kasir = json_encode($grafik_order_per_kasir['value']);

          $arr_bg = array();
          $arr_brc = array();
          for ($i=0; $i < count($grafik_order_per_kasir['label']); $i++) { 
            $arr_bg[] = 'rgba(255,132,99, 0.2)';
            $arr_brc[] = 'rgba(255,132,99, 1)';
          }
        ?>

        var grafik_per_bulan = $("#grafik_sales");
        var grafikPerBUlan = new Chart(grafik_per_bulan, {
            type: 'bar',
            data: {
              labels: <?php echo $label_order_per_kasir ?>,
              datasets: [{
                label: 'Grafik Penjualan Per Kasir',
                data: <?php echo $value_order_per_kasir ?>,
                backgroundColor: <?php echo json_encode($arr_bg) ?>,
                borderColor: <?php echo json_encode($arr_brc) ?>,
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero:true,
                  }
                }],
                xAxes: [{
                  ticks: {
                    autoSkip: false
                  }
                }]
              }
            }
        });
        /* GRAFIK ORDER PER KASIR */
    });
    </script>
