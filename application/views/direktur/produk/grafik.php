
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Grafik Data</li>
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
                Grafik Penjualan
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12 text-center">
                <!-- PAGE CONTENT BEGINS -->
                <div style="padding-left:0px;padding-right:0px;">
                  <h3 style="margin-top:0px;">Hari Ini</h3>
                  <div class="table-responsive">
                    <div id="graf_order_hari_ini"></div>
                  </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div>
            <div class="hr hr-dotted hr32"></div>
            <div class="row">
              <div class="col-xs-12 text-center">
                <div style="padding-left:0px;padding-right:0px;">
                  <h3 style="margin-top:0px;">Bulan Ini</h3>
                  <div class="table-responsive">
                    <div id="graf_order_bulan_ini"></div>
                  </div>
                </div>
              </div>
            </div><!-- /.row -->

            <div class="hr hr32 hr-double"></div>
            
            <div class="row" style="margin-top: 50px;">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="infobox infobox-orange infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px">
                      <div class="infobox-icon" style="margin-top:5px;">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data">
                        <div class="infobox-content">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Toko
                          </h5>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="infobox infobox-blue infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px">
                      <div class="infobox-icon" style="margin-top:5px">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data" >
                        <div class="infobox-content" style="max-width:none">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Produk
                          </h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <form action="" method="post" class="form-horizontal">
                  <div class="col-md-4">
                    <select name="id_member" class="form-control" onchange="this.form.submit()">
                      <option value="">SEMUA</option>
                      <?php foreach ($data_member as $key): ?>
                      <option value="<?php echo $key->id ?>" <?php echo $key->id==$id_member ? "selected" : "" ?>><?php echo $key->nama ?> - <?php echo $key->alamat ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select name="id_produk" class="form-control" onchange="this.form.submit()">
                      <option value="">SEMUA</option>
                      <?php foreach ($data_produk as $key): ?>
                      <option value="<?php echo $key->id_produk_2 ?>" <?php echo $key->id_produk_2==$id_produk ? "selected" : "" ?>><?php echo $key->nama_produk ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <input type="hidden" name="start_periode" id="start_periode" value="<?php echo $start_periode ?>">
                    <input type="hidden" name="end_periode" id="end_periode" value="<?php echo $end_periode ?>">
                    <input type="text" class="form-control" name="periode" id="periode">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="row" style="margin-top:10px;">
              <div class="col-xs-12">
                <div class="table-responsive">
                  <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th width="5">No</th>
                        <th>Produk</th>
                        <th width="100">Dibeli</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1; foreach ($data_produk_jual as $key): ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <td><?php echo $key->terjual ?></td>
                      </tr>
                      <?php $no++; endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 text-center">
                <h3>Produk Terjual</h3>
                <div class="table-responsive"> 
                  <div id="graf_order"></div>
                </div>
              </div>
            </div>

            <div class="hr hr10 hr-double"></div>

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

    <style>
    .data-label-1 {
      font-size: 12px;
      background: #2196F3;
      color: #fff;
      padding: 5px 10px 5px 10px;
      border-radius: 5px;
      box-shadow: 0px 0px 2px 0px silver;
      border: 1px solid #fff;
      cursor: pointer;
      transition: all .15s ease-in-out;
    }
    .data-label-1:hover {
      z-index: 1000;
      box-shadow: 0px 0px 5px 0px #555;
      font-size: 16px;
    }
    .data-label-2 {
      font-size: 12px;
      background: #20e3b2;
      color: #fff;
      padding: 5px 10px 5px 10px;
      border-radius: 5px;
      box-shadow: 0px 0px 2px 0px silver;
      border: 1px solid #fff;
      cursor: pointer;
      transition: all .15s ease-in-out;
    }
    .data-label-2:hover {
      z-index: 1000;
      box-shadow: 0px 0px 5px 0px #555;
      font-size: 16px;
    }
    </style>
    
    <!--[if lte IE 8]>
      <script src="<?php echo base_url()?>assets/js/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url()?>assets/js/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.sparkline.index.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.flot.resize.min.js"></script>

    <script>
    jQuery(function($){

        $("#myTable").dataTable();

        $('input[id="periode"]').daterangepicker({
            'applyClass' : 'btn-sm btn-success',
            'cancelClass' : 'btn-sm btn-default',
            locale: {
              applyLabel: 'Apply',
              cancelLabel: 'Cancel',
              format: 'DD-MM-YYYY',
            },
            startDate:'<?php echo $start_periode ?>',
            endDate:'<?php echo $end_periode ?>',
        },
        function(start, end, label){
            $("#start_periode").val(start.format("DD-MM-YYYY"));
            $("#end_periode").val(end.format("DD-MM-YYYY"));
            $("form").submit();
        })
        .prev().on(ace.click_event, function(){
            $(this).next().focus();
        });

        $('.easy-pie-chart.percentage').each(function() {
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
            barColor: barColor,
            chartRangeMin:$(this).data('min') || 0
           });
        });
        
        // GRAFIK HARI INI //
        var ticks_xaxis = [];
        for (var i = 7; i <= 24; i++) {
          ticks_xaxis[i] = [i, "Jam "+i.toFixed(2)];
        }
        var d1_hari_ini = [];
        var d2_hari_ini = [];
        <?php foreach ($orders_hari_ini as $key): ?>
            d1_hari_ini.push([<?php echo str_replace(':','.',$key->jam)*1 ?>, <?php echo round($key->nominal) ?>]);
            d2_hari_ini.push([<?php echo str_replace(':','.',$key->jam)*1 ?>, <?php echo round($key->laba) ?>]);
        <?php endforeach ?>
        $('#graf_order_hari_ini').css({'width':'1500px' , 'height':'400px'});
        var graf_ord_hari_ini = $.plot("#graf_order_hari_ini", [
          { label: "Order", data: d1_hari_ini, color: "#2196F3"},
          { label: "Laba", data: d2_hari_ini, color: "#20e3b2"},
        ], {
          hoverable: true,
          shadowSize: 0,
          series: {
            lines: { show: true },
            points: { show: false }
          },
          xaxis: {
            min: 7,
            max: 24,
            ticks: ticks_xaxis,
            tickDecimals: 2,
          },
          yaxis: {
            //ticks: 10,
            min: 0,
            //max: 100,
            tickDecimals: 0,
          },
          grid: {
            backgroundColor: {colors: ["#C9D6FF", "#E2E2E2"]},
            borderWidth: 1,
            borderColor:'#fff'
          }
        });
        $.each(graf_ord_hari_ini.getData()[0].data, function(i, el) {
          var o = graf_ord_hari_ini.pointOffset({x: el[0], y: el[1]});
          if (el[1]*1 > 0) {
            $('<div class="data-label-1">' + tandaPemisahTitik(el[1]) + '</div>').css( {
            position: 'absolute',
            left: o.left - 25,
            top: o.top - 25,
            display: 'none'
            }).appendTo(graf_ord_hari_ini.getPlaceholder()).fadeIn('slow');
          }
        });
        $.each(graf_ord_hari_ini.getData()[1].data, function(i, el){
          var o = graf_ord_hari_ini.pointOffset({x: el[0], y: el[1]});
          if (el[1]*1 > 0) {
            $('<div class="data-label-2">' + tandaPemisahTitik(el[1]) + '</div>').css( {
            position: 'absolute',
            left: o.left - 25,
            top: o.top - 25,
            display: 'none'
            }).appendTo(graf_ord_hari_ini.getPlaceholder()).fadeIn('slow');
          }
        });
        // GRAFIK HARI INI //
      
        // GRAFIK BULAN INI //
        var ticks_xaxis = [];
        for (var i = 1; i <= <?php echo (date('t')*1)+1 ?>; i++) {
          ticks_xaxis[i] = [i, "Hari "+i];
        }
        var d1_bulan_ini = [];
        var d2_bulan_ini = [];
        <?php 
        for ($i=1; $i <= date("d"); $i++) {
          $tgl = "0";
          $nominal = 0;
          $laba = 0;
          foreach ($orders_bulan_ini as $key):
            if($i==str_replace(':','.',$key->tgl)*1){
              $tgl = str_replace(':','.',$key->tgl)*1;
              $nominal = $key->nominal;
              $laba = $key->laba;
            }
          endforeach;
          if($i == $tgl){ ?>
            d1_bulan_ini.push([<?php echo str_replace(':','.',$tgl)*1 ?>, <?php echo round($nominal) ?>]);
            d2_bulan_ini.push([<?php echo str_replace(':','.',$tgl)*1 ?>, <?php echo round($laba) ?>]);
        <?php } else { ?>
            //d1_bulan_ini.push([<?php //echo str_replace(':','.',$i)*1 ?>, <?php //echo 0 ?>]);
            //d2_bulan_ini.push([<?php //echo str_replace(':','.',$i)*1 ?>, <?php //echo 0 ?>]);
        <?php } } ?>

        $('#graf_order_bulan_ini').css({'width':'1500px' , 'height':'400px'});
        var graf_ord_bulan_ini = $.plot("#graf_order_bulan_ini", [
          { label: "Order", data: d1_bulan_ini, color: "#2196F3"},
          { label: "Laba", data: d2_bulan_ini, color: "#20e3b2"},
        ], {
          hoverable: true,
          shadowSize: 0,
          series: {
            lines: { show: true },
            points: { show: false }
          },
          xaxis: {
            min: 01,
            max: <?php echo (date('t')*1)+1 ?>,
            ticks: ticks_xaxis,
            tickDecimals: 0,
          },
          yaxis: {
            //ticks: 10,
            min: 0,
            //max: 100,
            tickDecimals: 0,
          },
          grid: {
            backgroundColor: { colors: [ "#C9D6FF", "#E2E2E2" ] },
            borderWidth: 1,
            borderColor:'#fff'
          }
        });
        $.each(graf_ord_bulan_ini.getData()[0].data, function(i, el){
          var o = graf_ord_bulan_ini.pointOffset({x: el[0], y: el[1]});
          if (el[1]*1 > 0) {
            $('<div class="data-label-1">' + tandaPemisahTitik(el[1]) + '</div>').css( {
            position: 'absolute',
            left: o.left - 25,
            top: o.top - 25,
            display: 'none'
            }).appendTo(graf_ord_bulan_ini.getPlaceholder()).fadeIn('slow');
          }
        });
        $.each(graf_ord_bulan_ini.getData()[1].data, function(i, el){
          var o = graf_ord_bulan_ini.pointOffset({x: el[0], y: el[1]});
          if (el[1]*1 > 0) {
            $('<div class="data-label-2">' + tandaPemisahTitik(el[1]) + '</div>').css( {
            position: 'absolute',
            left: o.left - 25,
            top: o.top - 25,
            display: 'none'
            }).appendTo(graf_ord_bulan_ini.getPlaceholder()).fadeIn('slow');
          }
        });
        // GRAFIK BULAN INI //
      
        // GRAFIK ORDER //
        var d1_orders = [];
        <?php
        $selisih_hari = (strtotime($end_periode) - strtotime($start_periode)) / (60 * 60 * 24);
        $tgl_tampil = $start_periode;
        $hari = substr($start_periode, 0, 2)*1;
        for ($i=1; $i <= $selisih_hari; $i++) {
          $terjual = 0;
          foreach ($data_produk_jual_tgl as $key) {
            if ($key->tgl_order==$tgl_tampil) {
              $terjual = $key->terjual*1;
            }
          }
          if ($terjual > 0) {
            echo "d1_orders.push([".$hari.", ".$terjual."]);";
          }
          $tgl_tampil = date('d-m-Y', strtotime($start_periode.' +'.$i.' days'));
          $hari++;
        }
        ?>
        var ticks_xaxis = [];
        for (var i = <?php echo substr($start_periode, 0, 2)*1 ?>; i <= <?php echo $hari+1 ?>; i++) {
          ticks_xaxis[i] = [i, "Hari "+i];
        }
        $('#graf_order').css({'width':'1500px' , 'height':'400px'});
        var graf_order = $.plot("#graf_order", [
          { label: "Terjual", data: d1_orders, color: "#2196F3"},
        ], {
          hoverable: true,
          shadowSize: 0,
          series: {
            lines: { show: true },
            points: { show: false }
          },
          xaxis: {
            min: <?php echo substr($start_periode, 0, 2)*1 ?>,
            max: <?php echo $hari+1 ?>,
            tickDecimals: 0,
            ticks: ticks_xaxis,
          },
          yaxis: {
            //ticks: 10,
            min: 0,
            //max: 100,
            tickDecimals: 0,
          },
          grid: {
            backgroundColor: { colors: [ "#C9D6FF", "#E2E2E2" ] },
            borderWidth: 1,
            borderColor:'#fff'
          }
        });
        $.each(graf_order.getData()[0].data, function(i, el){
          var o = graf_order.pointOffset({x: el[0], y: el[1]});
          if (el[1]*1 > 0) {
            $('<div class="data-label-1">' + tandaPemisahTitik(el[1]) + '</div>').css({
            position: 'absolute',
            left: o.left - 25,
            top: o.top - 25,
            display: 'none'
            }).appendTo(graf_order.getPlaceholder()).fadeIn('slow');
          }
        });
        // GRAFIK ORDER //

    });
    </script>
