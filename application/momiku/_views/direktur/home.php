
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
                <div class="col-md-4">
                    <a href="<?php echo base_url('admin/home/login_direktur');?>" class="btn btn-primary">KE HALAMAN ADMIN PENJUALAN</a>
                </div>
              </div>
            </div><!-- /.page-header -->

            <div class="widget-box widget-color-dark" id="recent-box" >
              <div class="widget-header">
                <h4 class="widget-title bigger lighter smaller">
                  <i class="ace-icon fa fa-signal"></i>LAPORAN ORDER SALES
                </h4>
                <div class="widget-toolbar no-border">
                  <ul class="nav nav-tabs" id="recent-tab">
                    <li class="active">
                      <a data-toggle="tab" href="#hari-ini-order-tab">HARI INI</a>
                    </li>
                    <li>
                      <a data-toggle="tab" href="#per-hari-order-tab">BULAN INI</a>
                    </li>
                    <li>
                      <a data-toggle="tab" href="#per-bulan-order-tab">TAHUN INI</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget-body">
                <div class="widget-main padding-4">
                  <div class="tab-content padding-8">
                    <div id="hari-ini-order-tab" class="tab-pane active">
                      <div class="alert alert-info">
                        <h4>Filter</h4>
                        <div class="row">
                          <div class="col-md-3">
                            <label>Berdasarkan Media</label>
                            <select name="media" id="" class="form-control">
                              <option value="">Pilih</option>
                              <?php foreach ($pil_media as $media) { ?>
                              <option value="<?php echo $media->id;?>"><?php echo $media->media;?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <h4>Grafik</h4>
                          <canvas sytle="height:600px" id="grafik_order_hari_ini"></canvas>
                        </div>
                        <div class="col-md-6">
                          <h4>Persentase</h4>
                          <div class="alert">
                            <?php foreach ($data_order_hari_ini['data'] as $data) {?>
                            <div>
                              <h5><?php echo $data['media'] ?></h5>
                              <?php
                              $progress = 0;
                              if ($data_order_hari_ini['total'] > 0) {
                                $progress = round($data['jumlah']/$data_order_hari_ini['total']*100);
                              }
                              ?>
                              <div class="row">
                                <div class="col-xs-10">
                                  <div class="progress" data-percent="<?php echo $progress;?>%">
                                    <div class="progress-bar progress-bar-<?php echo $data['scheme']?>" style="width:<?php echo $progress;?>%;"></div>
                                  </div>
                                </div>
                                <div class="col-xs-2">
                                  <?php echo $data['jumlah'].'/'.$data_order_hari_ini['total'];?>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                      <?php foreach ($data_order_hari_ini['data'] as $data) {?>
                        <div class="col-md-2 col-xs-6" style="margin-bottom:10px;">
                          <div class="alert alert-info alert-<?php echo $data['scheme'];?>">
                            <h4><?php echo $data['jumlah'];?></h4>
                            <?php echo $data['media'];?>
                          </div>
                        </div>
                      <?php } ?>
                      </div>
                    </div>
                    <div id="per-hari-order-tab" class="tab-pane">
                      <div class="alert alert-info">
                        <h4>Filter</h4>
                        <div class="row">
                          <div class="col-md-3">
                            <label>Berdasarkan Media</label>
                            <select name="media" id="" class="form-control">
                              <option value="">Pilih</option>
                              <?php foreach ($pil_media as $media) { ?>
                              <option value="<?php echo $media->id;?>"><?php echo $media->media;?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <!-- <div class="col-md-3"><select name="" id="" class="form-control"></select></div>
                          <div class="col-md-3"><select name="" id="" class="form-control"></select></div> -->
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <h4>Grafik</h4>
                          <canvas sytle="height:600px"id="grafik_order_per_hari"></canvas>
                        </div>
                        <div class="col-md-6">
                          <h4>Persentase</h4>
                          <div class="alert">
                            <?php foreach ($data_order_per_hari['data'] as $data) {?>
                            <div>
                              <h5><?php echo $data['media'] ?></h5>
                              <?php
                              $progress = 0;
                              if ($data_order_per_hari['total'] > 0) {
                                $progress = round($data['jumlah']/$data_order_per_hari['total']*100);
                              }
                              ?>
                              <div class="row">
                                <div class="col-xs-10">
                                  <div class="progress" data-percent="<?php echo $progress;?>%">
                                    <div class="progress-bar progress-bar-<?php echo $data['scheme']?>" style="width:<?php echo $progress;?>%;"></div>
                                  </div>
                                </div>
                                <div class="col-xs-2">
                                  <?php echo $data['jumlah'].'/'.$data_order_per_hari['total'];?>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                      <?php foreach ($data_order_per_hari['data'] as $data) {?>
                        <div class="col-md-2 col-xs-6" style="margin-bottom:10px;">
                          <div class="alert alert-info alert-<?php echo $data['scheme'];?>">
                            <h4><?php echo $data['jumlah'];?></h4>
                            <?php echo $data['media'];?>
                          </div>
                        </div>
                      <?php } ?>
                      </div>
                    </div>
                    <div id="per-bulan-order-tab" class="tab-pane">
                      <div class="alert alert-info">
                        <h4>Filter</h4>
                        <div class="row">
                          <div class="col-md-3">
                            <label>Berdasarkan Media</label>
                            <select name="media" id="" class="form-control">
                              <option value="">Pilih</option>
                              <?php foreach ($pil_media as $media) { ?>
                              <option value="<?php echo $media->id;?>"><?php echo $media->media;?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <!-- <div class="col-md-3">
                            <select name="" id="" class="form-control"></select>
                          </div>
                          <div class="col-md-3">
                            <select name="" id="" class="form-control"></select>
                          </div> -->
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <h4>Grafik</h4>
                          <canvas sytle="height:600px"id="grafik_order_per_bulan"></canvas>
                        </div>
                        <div class="col-md-6">
                          <h4>Persentase</h4>
                          <div class="alert">
                            <?php foreach ($data_order_per_bulan['data'] as $data) {?>
                            <div>
                              <h5><?php echo $data['media'] ?></h5>
                              <?php
                              $progress = 0;
                              if ($data_order_per_bulan['total'] > 0) {
                                $progress = round($data['jumlah']/$data_order_per_bulan['total']*100);
                              }
                              ?>
                              <div class="row">
                                <div class="col-xs-10">
                                  <div class="progress" data-percent="<?php echo $progress ?>%">
                                    <div class="progress-bar progress-bar-<?php echo $data['scheme']?>" style="width:<?php echo $progress ?>%;"></div>
                                  </div>
                                </div>
                                <div class="col-xs-2">
                                  <?php echo $data['jumlah'].'/'.$data_order_per_bulan['total'];?>
                                </div>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                      <?php foreach ($data_order_per_bulan['data'] as $data) {?>
                        <div class="col-md-2 col-xs-6" style="margin-bottom:10px;">
                          <div class="alert alert-info alert-<?php echo $data['scheme'];?>">
                            <h4><?php echo $data['jumlah'];?></h4>
                            <?php echo $data['media'];?>
                          </div>
                        </div>
                      <?php } ?>
                      </div>
                    </div>
                  </div>
                </div><!-- /.widget-main -->
              </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
            <div class="widget-box widget-color-dark" id="recent-box" style="margin-top:30px">
              <div class="widget-header">
                <h4 class="widget-title bigger lighter smaller">
                  <i class="ace-icon fa fa-signal"></i>LAPORAN AKTIVITAS SALES
                </h4>
              </div>
              <div class="widget-body">
                <div class="widget-main padding-0">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th rowspan="3">NO</th>
                        <th rowspan="3">TANGGAL</th>
                        <th rowspan="3">NAMA CS</th>
                        <th colspan="3">AKTIVITAS</th>
                        <th colspan="8">MEDIA</th>
                      </tr>
                      <tr>
                        <th rowspan="2">LEADS</th>
                        <th rowspan="2">CLOSING</th>
                        <th rowspan="2">TOTALAN</th>
                        <th colspan="2">WA</th>
                        <th colspan="2">SHOPEE</th>
                        <th colspan="2">TOKOPEDIA</th>
                        <th colspan="2">COD</th>
                      </tr>
                      <tr>
                        <th>(HS)</th>
                        <th>(GC)</th>
                        <th>(HS)</th>
                        <th>(GC)</th>
                        <th>(HS)</th>
                        <th>(GC)</th>
                        <th>(HS)</th>
                        <th>(GC)</th>
                      </tr>
                    </thead>
                    <?php $no = 1;foreach ($data_aktivitas as $activitas) { ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $activitas->tanggal;?></td>
                      <td><?php echo $activitas->nama_cs;?></td>
                      <td><?php echo $activitas->leads;?></td>
                      <td><?php echo $activitas->closing;?></td>
                      <td><?php echo $activitas->totalan;?></td>
                      <td><?php echo $activitas->wa_hs;?></td>
                      <td><?php echo $activitas->wa_dc;?></td>
                      <td><?php echo $activitas->shopee_hs;?></td>
                      <td><?php echo $activitas->shopee_gc;?></td>
                      <td><?php echo $activitas->tokopedia_hs;?></td>
                      <td><?php echo $activitas->tokopedia_gc;?></td>
                      <td><?php echo $activitas->cod_hs;?></td>
                      <td><?php echo $activitas->cod_gc;?></td>
                    </tr>
                    <?php } ?>
                  </table>
                </div><!-- /.widget-main -->
              </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
            
            <div class="widget-box widget-color-dark" style="margin-top:30px">
              <div class="widget-header">
              INFORMASI direktur
              </div>
              <div class="widget-body">
                <div class="widget-main">
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
                                    <a data-toggle="tab" href="#kasir-tab">KASIR</a>
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
                                  <div id="kasir-tab" class="tab-pane">
                                    <canvas id="grafik_kasir"></canvas>
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

                        <?php if($id_modul!='1' && $id_modul!='2' && $id_modul!='5') { ?>
                          <div class="widget-box widget-color-blue">
                            <div class="widget-header widget-header-flat">
                              <h4 class="widget-title bigger lighter">
                                <i class="ace-icon fa fa-signal"></i>
                                Laba Rugi Bulan Ini
                              </h4>
                              <div class="widget-toolbar">
                                <a href="#" data-action="collapse">
                                  <i class="ace-icon fa fa-chevron-up"></i>
                                </a>
                              </div>
                            </div>

                            <div class="widget-body">
                              <div class="widget-main ">
                                <table style="width:100%;">
                                  <tr>
                                    <th width="58"></th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                  <?php
                                  $saldo_pendapatan = 0;
                                  foreach ($data_pendapatan->result() as $key_pendapatan):
                                    $saldo_awal = 0;
                                    foreach ($data_saldo_awal->result() as $key_saldo_awal) {
                                      if($this->session->userdata('is_pusat')=="1"){
                                        if($key_saldo_awal->id_akun == $key_pendapatan->id){
                                          $saldo_awal = $key_saldo_awal->saldo * -1;
                                        }
                                      }else{
                                        if($key_saldo_awal->id_toko == $id_toko){
                                          if($key_saldo_awal->id_akun == $key_pendapatan->id){
                                            $saldo_awal = $key_saldo_awal->saldo * -1;
                                          }
                                        }
                                      }
                                    }
                                    $saldo = 0;
                                    foreach ($data_saldo->result() as $key_saldo) {
                                      if($this->session->userdata('is_pusat')=="1"){
                                        if($key_saldo->id_akun == $key_pendapatan->id){
                                          $saldo = $key_saldo->saldo * -1;
                                        }
                                      }else{
                                        if($key_saldo->id_toko == $id_toko){
                                          if($key_saldo->id_akun == $key_pendapatan->id){
                                            $saldo = $key_saldo->saldo * -1;
                                          }
                                        }
                                      }
                                    }
                                    $saldo_akhir = $saldo_awal + $saldo;
                                    $saldo_pendapatan += $saldo_akhir;
                                  ?>
                                    <tr>
                                      <td><?php echo $key_pendapatan->kode ?></td>
                                      <td><?php echo $key_pendapatan->akun ?></td>
                                      <td>Rp <span style="float:right;"><?php echo number_format($saldo_akhir,0,',','.') ?></span></td>
                                    </tr>
                                  <?php endforeach ?>
                                  <tr>
                                    <td colspan="3"><div class="hr hr1 hr-dotted"></div></td>
                                  </tr>
                                  <tr>
                                    <th colspan="2">Laba / Rugi Kotor</th>
                                    <th>Rp <span style="float:right;"><?php echo number_format($saldo_pendapatan,0,',','.') ?></span></th>
                                  </tr>
                                  <tr>
                                    <td colspan="3"><div class="hr hr1 hr-dotted"></div></td>
                                  </tr>
                                  <?php
                                  $saldo_beban = 0;
                                  foreach ($data_biaya->result() as $key_biaya):
                                    $saldo_awal = 0;
                                    foreach ($data_saldo_awal->result() as $key_saldo_awal) {
                                      if($this->session->userdata('is_pusat') == "1"){
                                          if($key_saldo_awal->id_akun == $key_biaya->id){
                                            $saldo_awal = $key_saldo_awal->saldo;
                                          }
                                      }else{
                                        if($key_saldo_awal->id_toko == $id_toko){
                                          if($key_saldo_awal->id_akun == $key_biaya->id){
                                            $saldo_awal = $key_saldo_awal->saldo;
                                          }
                                        }
                                      }
                                    }
                                    $saldo = 0;
                                    foreach ($data_saldo->result() as $key_saldo) {
                                      if($this->session->userdata('is_pusat') == "1"){
                                        if($key_saldo->id_akun == $key_biaya->id){
                                          $saldo = $key_saldo->saldo;
                                        }
                                      }else{
                                        if($key_saldo->id_toko == $id_toko){
                                          if($key_saldo->id_akun == $key_biaya->id){
                                            $saldo = $key_saldo->saldo;
                                          }
                                        }
                                      }
                                    }
                                    $saldo_akhir = $saldo_awal + $saldo;
                                    $saldo_beban += $saldo_akhir;
                                  ?>
                                    <tr>
                                      <td><?php echo $key_biaya->kode ?></td>
                                      <td><?php echo $key_biaya->akun ?></td>
                                      <td>Rp <span style="float:right;"><?php echo number_format($saldo_akhir,0,',','.') ?></span></td>
                                    </tr>
                                  <?php endforeach ?>
                                  <tr>
                                    <td colspan="3"><div class="hr hr1 hr-dotted"></div></td>
                                  </tr>
                                  <tr>
                                    <th colspan="2">Total Beban Biaya</th>
                                    <th>Rp <span style="float:right;"><?php echo number_format($saldo_beban,0,',','.') ?></span></th>
                                  </tr>
                                  <tr>
                                    <td colspan="3"><div class="hr hr1 hr-dotted"></div></td>
                                  </tr>
                                  <?php
                                  $labarugi = $saldo_pendapatan - $saldo_beban;
                                  ?>
                                  <tr>
                                    <th colspan="2">Laba / Rugi </th>
                                    <th>Rp <span style="float:right;"><?php echo number_format($labarugi,0,',','.') ?></span></th>
                                  </tr>
                                </table>
                              </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                          </div><!-- /.widget-box -->
                          <?php } else { ?>

                          <div class="widget-box widget-color-blue">
                            <div class="widget-header widget-header-flat">
                              <h4 class="widget-title bigger lighter">
                                <i class="ace-icon fa fa-signal"></i>
                                Laba Rugi Hari Ini
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
                                      <th>No Faktur</th>
                                      <th>Jam</th>
                                      <th>Nominal</th>
                                      <th>Laba</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php 
                                  $jml_nominal = 0;
                                  $jml_laba = 0;
                                  foreach ($orders_hari_ini as $key): 
                                  ?>
                                  <tr>
                                    <td><?php echo $key->no_faktur ?></td>
                                    <td><?php echo $key->tgl_order ?></td>
                                    <td>Rp <span style='float:right;'><?php echo number_format($key->nominal,0,',','.') ?></span></td>
                                    <td>Rp <span style='float:right;'><?php echo number_format($key->laba,0,',','.') ?></span></td>
                                  </tr>
                                  <?php 
                                  $jml_nominal += $key->nominal;
                                  $jml_laba += $key->laba;
                                  endforeach;
                                  ?>
                                  </tbody>
                                  <tfoot>
                                    <tr style='font-weight:bold;'>
                                      <td colspan="2"><center>JUMLAH</center></td>
                                    <td>Rp <span style='float:right;'><?php echo number_format($jml_nominal,0,',','.') ?></span></td>
                                    <td>Rp <span style='float:right;'><?php echo number_format($jml_laba,0,',','.') ?></span></td>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                          </div><!-- /.widget-box -->
                          <?php }; ?>
                          <div class="space"></div>
                        </div><!-- /.col -->


                        <div class="col-sm-5">
                          <div class="infobox infobox-orange infobox-large infobox-dark" style="width:48%!important;margin-bottom:2px">
                            <div class="infobox-data">
                              <div class="infobox-content">Total Pembelian</div>
                              <div class="infobox-content"><h5>Rp. <?php echo number_format($total_pembelian->total,0,',','.'); ?></h5></div>
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
                              <div class="infobox-content" style="margin-top:-10px;"><<?php echo $heading ?>>Rp.<?php echo number_format($laba_hari_ini->jml_laba,0,',','.'); ?> (Netto) <br>Rp.<?php echo number_format(($laba_hari_ini->jml_laba*(10/100))+$laba_hari_ini->jml_laba,0,',','.'); ?> (PPn)</<?php echo $heading ?>></div>
                            </div>
                          </div>
                          <div class="infobox infobox-blue infobox-large infobox-dark" style="width:48%!important;margin-bottom:2px">
                            <div class="infobox-chart">
                              <span class="sparkline" data-values="5,4,3,3,5,4,6,6"></span>
                            </div>
                            <div class="infobox-data">
                              <div class="infobox-content">Bulan ini</div>
                              <?php
                              $heading = 'h5';
                              if (strlen(number_format($laba_bulan_ini->jml_laba,0,',','.')) > 8) {
                                $heading = 'h6';
                              }
                              ?>
                              <div class="infobox-content" style="margin-top:-10px;"><<?php echo $heading ?>>Rp.<?php echo number_format($laba_bulan_ini->jml_laba,0,',','.'); ?> (Netto) <br>Rp.<?php echo number_format(($laba_bulan_ini->jml_laba*(10/100))+$laba_bulan_ini->jml_laba,0,',','.'); ?> (PPn)</<?php echo $heading ?>></div>
                            </div>
                          </div>
                          <div class="infobox infobox-grey infobox-large infobox-dark" style="width:48%!important;margin-bottom:2px">
                            <div class="infobox-icon">
                              <i class="ace-icon fa fa-download"></i>
                            </div>
                            <div class="infobox-data">
                              <div class="infobox-content">Total</div>
                              <?php
                              $heading = 'h5';
                              if (strlen(number_format($laba_total->jml_laba,0,',','.')) > 8) {
                                $heading = 'h6';
                              }
                              ?>
                              <div class="infobox-content" style="margin-top:-10px;"><<?php echo $heading ?>>Rp.<?php echo number_format($laba_total->jml_laba,0,',','.'); ?> (Netto) <br>Rp.<?php echo number_format(($laba_total->jml_laba*(10/100))+$laba_total->jml_laba,0,',','.'); ?> (PPn)</<?php echo $heading ?>></div>
                            </div>
                          </div>

                      <div class="row" style="margin-top:20px;">
                        <div class="col-xs-12">
                          <div class="infobox infobox-blue2 infobox-large infobox-dark">
                            <div class="infobox-icon">
                              <i class="ace-icon fa fa-upload"></i>
                            </div>
                            <div class="infobox-data">
                              <div class="infobox-content">Piutang</div>
                              <div class="infobox-content"><h4>Rp.<?php echo number_format($total_piutang->total*1,0,',','.'); ?></h4></div>
                            </div>
                          </div>
                          <div class="infobox infobox-red infobox-large infobox-dark">
                            <div class="infobox-icon">
                              <i class="ace-icon fa fa-download"></i>
                            </div>
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
              </div>
              </div>
            </div>
            <div class="panel panel-info">
              <div class="panel-heading">INFORMASI PRODUKSI</div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                      <div class="space-6"></div>

                      <div class="col-sm-7">
                        <div style="margin-bottom:20px">
                            <h4>Stok Bahan Baku(Gudang)</h4>
                              <?php foreach ($data_stok_bahan as $key) { ?>
                              <div class="infobox infobox-red">
                                <div class="infobox-icon">
                                  <i class="ace-icon fa fa-database"></i>
                                </div>
                                <div class="infobox-data">
                                  <span class="infobox-data-number"><?php echo $key->stok*1 ?></span>
                                  <div class="infobox-content"><?php echo $key->nama_produk; ?></div>
                                </div>
                              </div>
                              <?php } ?>
                              <div>
                                <a href="<?php echo base_url() ?>produksi/stok/bahan" class="btn btn-primary btn-block">
                                  Selengkapnya
                                </a>
                              </div>
                        </div>
                        <div style="margin-bottom:20px">
                            <h4>Stok Produksi</h4>
                              <?php foreach ($data_stok_produksi as $key) { ?>
                              <div class="infobox infobox-green">
                                <div class="infobox-icon">
                                  <i class="ace-icon fa fa-database"></i>
                                </div>
                                <div class="infobox-data">
                                  <span class="infobox-data-number"><?php echo $key->stok*1 ?></span>
                                  <div class="infobox-content" style="font-size:11px;"><?php echo $key->nama_produk; ?></div>
                                </div>
                              </div>
                              <?php } ?>
                              <div>
                                <a href="<?php echo base_url() ?>produksi/stok/produksi" class="btn btn-primary btn-block">
                                  Selengkapnya
                                </a>
                              </div>
                        </div>
                        
                        <?php if ($id_modul == '2') { ?>
                        <!-- <div id="client">
                        </div> -->
                        <?php }; ?>
                        
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

                      <div class="row">
                        <div class="col-md-6">
                          <div class="widget-box widget-color-blue">
                            <div class="widget-header widget-header-flat">
                              <h4 class="widget-title bigger lighter">
                                <i class="ace-icon fa fa-exchange"></i>
                                Sinkronisasi
                              </h4>
                              <div class="widget-toolbar">
                                <a href="#" data-action="collapse">
                                  <i class="ace-icon fa fa-chevron-up"></i>
                                </a>
                              </div>
                            </div>
                            <div class="widget-body" style="padding:10px">
                              Last Sync : <br>
                              <span class="label label-primary"><?php echo $this->session->userdata('last_sync'); ?></span><br>
                              Next Sync : <br>
                              <span class="label label-primary"><?php echo $this->session->userdata('next_sync'); ?></span><br>
                              <a href="<?php echo base_url() ?>sync2019" target="_blank" class="btn btn-success btn-xs" style="margin-top:5px"><i class="fa fa-exchange"></i> Sync Now</a>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="widget-box widget-color-blue">
                            <div class="widget-header widget-header-flat">
                              <h4 class="widget-title bigger lighter">
                                <i class="ace-icon fa fa-list"></i>
                                Informasi Server
                              </h4>
                              <div class="widget-toolbar">
                                <a href="#" data-action="collapse">
                                  <i class="ace-icon fa fa-chevron-up"></i>
                                </a>
                              </div>
                            </div>
                            <div class="widget-body">
                              <div class="widget-main">
                                <div class="clearfix">
                                  <table class="table table-hover table-striped table-bordered">
                                    <tr>
                                      <th>Waktu Server</th>
                                      <td colspan="3" id="waktu_server"></td>
                                    </tr>
                                    <tr>
                                      <th>IP Lokal</th>
                                      <td><?php echo getHostByName(php_uname('n')); ?></td>
                                      <th id="status" colspan="2" align="right"></th>
                                    </tr>
                                  </table>
                                  <script>
                                    var url = '<?php echo base_url("home/sys_info");?>';
                                    $.ajax({
                                    url:url,
                                    //data:'data=data',
                                    success:function(response){
                                      var json_parse = JSON.parse(response);
                                      $('#cpu').html(json_parse[0].cpu);
                                      $('')
                                    }
                                    })
                                    $(document).ready(function(){
                                      time();
                                      function time(){
                                        $.ajax({
                                          type: 'GET',
                                          cache: false,
                                          url: location.href,
                                          complete: function (req, textStatus) {
                                            var dateString = req.getResponseHeader('Date');
                                            if (dateString.indexOf('GMT') === -1) {
                                              dateString += ' GMT';
                                            }
                                            var date = new Date(dateString).toLocaleString();
                                            $('#waktu_server').text(date);
                                            window.setTimeout(time, 1000);
                                          }
                                          });
                                      }
                                    });
                                    if(navigator.onLine){
                                    $.getJSON('https://aipos.id/ip.php', function(data) {
                                      $('#status').html('<label class="badge badge-success">Online</label>  '+data.data.ip);
                                    });
                                    } else {
                                      $('#status').html('<label class="badge badge-danger">INTERNET OFFLINE</label>');
                                  }
                                  </script>
                                </div>
                              </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                          </div><!-- /.widget-box -->
                        </div>
                      </div>

                      <div class="space"></div>

                        <!-- <div class="widget-box widget-color-orange">
                          <div class="widget-header widget-header-flat">
                            <h4 class="widget-title bigger lighter">
                              <i class="ace-icon fa fa-list"></i>
                              Daftar Kasir
                            </h4>
                            <div class="widget-toolbar">
                              <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                              </a>
                            </div>
                          </div>
                          <div class="widget-body">
                            <div class="widget-main">
                              <div class="clearfix">
                                <?php foreach ($kasir as $key_kasir):
                                $url_gambar = base_url().'assets/foto/'.$key_kasir->foto;
                                if(date('d-m-Y') == date('d-m-Y', $key_kasir->last_login)){
                                  $ket = '<span class="label label-info label-sm arrowed-in arrowed-in-right">online</span>';
                                } else {
                                  $ket = "<span class='label label-danger label-sm'>offline</span>";
                                }
                                ?>
                                  <div class="itemdiv memberdiv">
                                    <div class="user">
                                      <?php if(!empty($key_kasir->foto)){ ?>
                                      <img alt="null" src="<?php echo $url_gambar ?>" height="40" width="40" />
                                      <?php } else { ?>
                                      <img alt="null" src="<?php echo base_url()."assets/foto/default.png" ?>" height="40" width="40" />
                                      <?php }; ?>
                                    </div>
                                    <div class="body">
                                      <div class="name">
                                        <a href="#"><?php echo $key_kasir->first_name." ".$key_kasir->last_name ?></a>
                                      </div>
                                      <div class="time">
                                        <i class="ace-icon fa fa-clock-o"></i>
                                        <span class="green"><?php 
                                            $tglaktif = strtotime(date('d-m-Y', $key_kasir->last_login));
                                            if($tglaktif>0){
                                              echo date('d-m-Y', $key_kasir->last_login)."</span>";
                                            }
                                            ?>
                                      </div>
                                      <div>
                                        <?php echo $ket; ?>
                                      </div>
                                    </div>
                                  </div>
                                <?php endforeach ?>
                              </div>
                            </div>
                          </div>
                        </div> -->

                        <div class="widget-box widget-color-dark" id="recent-box">
                          <div class="widget-header">
                            <h4 class="widget-title bigger lighter smaller">
                              <i class="ace-icon fa fa-signal"></i>GRAFIK
                            </h4>
                            <div class="widget-toolbar no-border">
                              <ul class="nav nav-tabs" id="recent-tab">
                                <li class="active">
                                  <a data-toggle="tab" href="#bulan-ini-tab">BULAN INI</a>
                                </li>
                                <li>
                                  <a data-toggle="tab" href="#tahun-ini-tab">TAHUN INI</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="widget-body">
                            <div class="widget-main padding-4">
                              <div class="tab-content padding-8">
                                <div id="bulan-ini-tab" class="tab-pane active">
                                  <canvas id="grafik_bulan_ini"></canvas>
                                </div><!-- /.#member-tab -->
                                <div id="tahun-ini-tab" class="tab-pane">
                                  <canvas id="grafik_tahun_ini"></canvas>
                                </div>
                              </div>
                            </div><!-- /.widget-main -->
                          </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->

                    <div class="space"></div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
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

        var grafik_hari_ini = $("#grafik_order_hari_ini");
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

        var grafik_bulan_ini = $("#grafik_order_per_hari");
        var grafikBulanIni = new Chart(grafik_bulan_ini, {
            type: 'line',
            data: {
                labels: <?php echo $label_order_per_hari ?>,
                datasets: [{
                    label: 'Grafik Penjualan Per Hari',
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

        var grafik_per_bulan = $("#grafik_order_per_bulan");
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
    });
    </script>
