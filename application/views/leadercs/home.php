
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
                            <select name="media_per_hari" id="" class="form-control">
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
                            <select name="media_per_bulan" id="" class="form-control">
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
                        'rgba(33,150,243, 0.2)',
                    ],
                    borderColor: [
                        'rgba(33,150,243, 1)',
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
            type: 'bar',
            data: {
                labels: <?php echo $label_order_per_bulan ?>,
                datasets: [{
                    label: 'Grafik Penjualan Per Bulan',
                    data: <?php echo $value_order_per_bulan ?>,
                    backgroundColor: [
                        'rgba(33,150,99, 0.6)',
                    ],
                    borderColor: [
                        'rgba(33,150,99, 1)',
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
