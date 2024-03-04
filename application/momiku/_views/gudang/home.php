
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
              </div>
            </div><!-- /.page-header -->
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                <div class="row">
                  <div class="space-6"></div>

                  <div class="col-sm-7">
                  <div class="row" style="margin:0px;margin-bottom:20px">
                      <div class="col-md-4" style="padding:0px">
                        <div class="infobox infobox-blue">
                          <div class="infobox-icon">
                            <i class="ace-icon fa fa-archive"></i>
                          </div>
                          <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $produk->jml*1 ?></span>
                            <div class="infobox-content">Jumlah Item Produk</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4" style="padding:0px">
                        <div class="infobox infobox-red">
                          <div class="infobox-icon">
                            <i class="ace-icon fa fa-database"></i>
                          </div>
                          <div class="infobox-data">
                            <span class="infobox-data-number"><?php echo $total_stok->jml_stok*1 ?></span>
                            <div class="infobox-content">Semua Stok</div>
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

                    <div class="widget-box widget-color-dark" id="recent-box">
                      <div class="widget-header">
                        <h4 class="widget-title bigger lighter smaller">
                          <i class="ace-icon fa fa-signal"></i>GRAFIK STOK PRODUK
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
                  </div>


                  <div class="col-sm-5">
                    <div class="infobox infobox-blue infobox-large infobox-dark" style="height:auto!important;width:49.4%!important;margin-bottom:2px">
                      <div class="infobox-data">
                        <div class="infobox-content">Perkiraan Pengeluaran</div>
                        <div class="infobox-content" style="margin-top:-10px;">
                        </div>
                      </div>
                    </div>
                    <div class="infobox infobox-orange infobox-large infobox-dark" style="height:auto!important;width:49.4%!important;margin-bottom:2px">
                      <div class="infobox-data">
                        <div class="infobox-content">Perkiraan Pendapatan</div>
                        <div class="infobox-content" style="margin-top:-10px;">
                        </div>
                      </div>
                    </div>

                    <div class="row" style="margin-top:20px;">
                      <div class="col-xs-12">
                        <div class="infobox infobox-blue2 infobox-large infobox-dark" style="width:49.2%">
                          <div class="infobox-icon">
                            <i class="ace-icon fa fa-upload"></i>
                          </div>
                          <div class="infobox-data">
                            <div class="infobox-content"></div>
                            <div class="infobox-content"></h4></div>
                          </div>
                        </div>
                        <div class="infobox infobox-red infobox-large infobox-dark" style="width:49.2%">
                          <div class="infobox-icon">
                            <i class="ace-icon fa fa-download"></i>
                          </div>
                          <div class="infobox-data">
                            <div class="infobox-content"></div>
                            <div class="infobox-content"><h4></h4></div>
                          </div>
                        </div>
                      </div>
                    </div>

                  <div class="space"></div>

                    <div class="widget-box widget-color-orange">
                      <div class="widget-header widget-header-flat">
                        <h4 class="widget-title bigger lighter">
                          <i class="ace-icon fa fa-list"></i>
                          Produk Kadaluarsa
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
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
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
      
        /* GRAFIK HARI INI */
        <?php
        $grafik_label_hari = array();
        $grafik_data_hari = array();
        $i = 0;
        foreach ($data_stok as $key):
          $grafik_label_hari[$i] = str_replace(':','.',$key->jam)*1;
          $grafik_data_hari[$i] = $key->nominal*1;
          $i++;
        endforeach;
        $json_grafik_label_hari = json_encode($grafik_label_hari);
        $json_grafik_data_hari = json_encode($grafik_data_hari);
        ?>

        var grafik_hari_ini = $("#grafik_hari_ini");
        var grafikHariIni = new Chart(grafik_hari_ini, {
            type: 'line',
            data: {
                labels: <?php echo $json_grafik_label_hari ?>,
                datasets: [{
                    label: 'Grafik Penjualan Hari Ini',
                    data: <?php echo $json_grafik_data_hari ?>,
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
        /* GRAFIK HARI INI */
      

        /* GRAFIK BULAN INI */
        var data = {
          labels:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
          datasets: [
              {
                  label: "Pengeluaran",
                  backgroundColor: "rgba(255, 0, 0, 0.15)",
                  borderColor: "rgba(255, 0, 0, 0.15)",
                  pointColor: "rgba(255, 0, 0, 0.15)",
                  pointborderColor: "#fff",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(255, 0, 0, 0.15)",
                  data: [2089, 2884, 1822,1855, 2096, 1686, 1805, 1405, 1564, 1230, 1258, 1266]
              },
              {
                  label: "Perkiraan Pendapatan",
                  backgroundColor: "rgba(151,187,205,0.2)",
                  borderColor: "rgba(151,187,205,1)",
                  pointColor: "rgba(151,187,205,1)",
                  pointborderColor: "#fff",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(151,187,205,1)",
                  data: [1913, 1604, 2111, 1643, 1463, 1574, 1357, 1538, 1538, 1564, 1561, 1632]
              }
          ]
        };
        var options = {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.05)",
            scaleGridLineWidth : 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : false,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 20,
            datasetStroke : true,
            datasetStrokeWidth : 2,
            datasetFill : true,
        };

        var ctx = $("#grafik_bulan_ini");
        var grafikBulanIni = new Chart(ctx,{
          type:"line",
          data:data,
          options:options
        });
        /* GRAFIK BULAN INI */

      
        /* GRAFIK TAHUN INI */
        var data = {
          labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            datasets: [
                {
                    label: "Pengeluaran",
                    backgroundColor: "rgba(255, 0, 0, 0.15)",
                    borderColor: "rgba(255, 0, 0, 0.15)",
                    pointColor: "rgba(255, 0, 0, 0.15)",
                    pointborderColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(255, 0, 0, 0.15)",
                    data: [2089, 2884, 1822,1855, 2096, 1686, 1805, 1405, 1564, 1230, 1258, 1266]
                },
                {
                    label: "Perkiraan Pendapatan",
                    backgroundColor: "rgba(151,187,205,0.2)",
                    borderColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointborderColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [1913, 1604, 2111, 1643, 1463, 1574, 1357, 1538, 1538, 1564, 1561, 1632]
                }
            ]
        };
        var options = {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.05)",
            scaleGridLineWidth : 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : false,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 20,
            datasetStroke : true,
            datasetStrokeWidth : 2,
            datasetFill : true,
        };

        var ctx = $("#grafik_tahun_ini");
        var grafikTahunIni = new Chart(ctx,{
          type:"line",
          data:data,
          options:options
        });
        /* GRAFIK TAHUN INI */
    });
    </script>
