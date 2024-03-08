<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
            </li>
            <li class=""><?php echo $this->uri->segment(1);?></li>
            <li class="active"><?php echo $this->uri->segment(2);?></li>
        </ul><!-- /.breadcrumb -->

        
        </div>

        <div class="page-content">

            <div class="page-header">
              <h1>
                Grafik Laba (Rugi)
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">

                  <form method="post" action="">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Bulan</label>
                          <select class="form-control" name="bulan" id="bulan">
                            <option value="01" <?php echo $bulan=="01"?"selected":"" ?>>Januari</option>
                            <option value="02" <?php echo $bulan=="02"?"selected":"" ?>>Februari</option>
                            <option value="03" <?php echo $bulan=="03"?"selected":"" ?>>Maret</option>
                            <option value="04" <?php echo $bulan=="04"?"selected":"" ?>>April</option>
                            <option value="05" <?php echo $bulan=="05"?"selected":"" ?>>Mei</option>
                            <option value="06" <?php echo $bulan=="06"?"selected":"" ?>>Juni</option>
                            <option value="07" <?php echo $bulan=="07"?"selected":"" ?>>Juli</option>
                            <option value="08" <?php echo $bulan=="08"?"selected":"" ?>>Agustus</option>
                            <option value="09" <?php echo $bulan=="09"?"selected":"" ?>>September</option>
                            <option value="10" <?php echo $bulan=="10"?"selected":"" ?>>Oktober</option>
                            <option value="11" <?php echo $bulan=="11"?"selected":"" ?>>November</option>
                            <option value="12" <?php echo $bulan=="12"?"selected":"" ?>>Desember</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="">Tahun</label>
                          <select class="form-control" name="tahun" id="tahun">
                            <option value="2018" <?php echo $tahun==2018?"selected":"" ?>>2018</option>
                            <option value="2019" <?php echo $tahun==2019?"selected":"" ?>>2019</option>
                            <option value="2020" <?php echo $tahun==2020?"selected":"" ?>>2020</option>
                            <option value="2021" <?php echo $tahun==2021?"selected":"" ?>>2021</option>
                            <option value="2022" <?php echo $tahun==2022?"selected":"" ?>>2022</option>
                            <option value="2023" <?php echo $tahun==2023?"selected":"" ?>>2023</option>
                            <option value="2024" <?php echo $tahun==2024?"selected":"" ?>>2024</option>
                            <option value="2025" <?php echo $tahun==2025?"selected":"" ?>>2025</option>
                            <option value="2026" <?php echo $tahun==2026?"selected":"" ?>>2026</option>
                            <option value="2027" <?php echo $tahun==2027?"selected":"" ?>>2027</option>
                            <option value="2028" <?php echo $tahun==2028?"selected":"" ?>>2028</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="">Jenis</label>
                          <select class="form-control" name="jenis" id="jenis">
                            <option value="0" <?php echo $jenis==0?"selected":"" ?>>Per hari</option>
                            <option value="1" <?php echo $jenis==1?"selected":"" ?>>Bulanan</option>
                            <option value="2" <?php echo $jenis==2?"selected":"" ?>>Tahunan</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3" style="padding-top:20px;">
                        <button type="submit" class="btn btn-primary">Proses</button>
                      </div>
                    </div>
                  </form>
                  
                  <?php
                  $no = 0;
                  $array_lr = array();
                  for ($i=1; $i <= $akhir_tgl; $i++) {
                    $saldo_pendapatan = 0;
                    foreach ($data_pendapatan->result() as $key_pendapatan):
                      if ($jenis == 0) {
                        $row = $that->get_saldo(sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, $key_pendapatan->id);
                      } else if ($jenis == 1) {
                        $row = $that->get_saldo_berjalan('01-'.$bulan.'-'.$tahun, sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, $key_pendapatan->id);
                      } else {
                        $row = $that->get_saldo_berjalan('01-01-'.$tahun, sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, $key_pendapatan->id);
                      }
                      if ($row) {
                        $saldo_pendapatan += $row->saldo*-1;
                      }
                    endforeach;

                    $saldo_beban = 0;
                    foreach ($data_biaya->result() as $key_biaya):
                      if ($jenis == 0) {
                        $row = $that->get_saldo(sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, $key_biaya->id);
                      } else if ($jenis == 1) {
                        $row = $that->get_saldo_berjalan('01-'.$bulan.'-'.$tahun, sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, $key_biaya->id);
                        // $row = $that->get_saldo_berjalan_bulanan($tahun, $key_biaya->id);
                      } else {
                        $row = $that->get_saldo_berjalan('01-01-'.$tahun, sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, $key_biaya->id);
                      }
                      if ($row) {
                        $saldo_beban += $row->saldo;
                      }
                    endforeach;

                    $saldo_labarugi = 0;
                    if ($jenis == 0) {
                      $row = $that->get_saldo(sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, 14);
                    } else if ($jenis == 1) {
                      $row = $that->get_saldo_berjalan('01-'.$bulan.'-'.$tahun, sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, 14);
                    } else {
                      $row = $that->get_saldo_berjalan('01-01-'.$tahun, sprintf('%02d', $i).'-'.$bulan.'-'.$tahun, 14);
                    }
                    if ($row) {
                      $saldo_labarugi += $row->saldo;
                    }

                    $lr = $saldo_pendapatan - $saldo_beban - $saldo_labarugi;

                    if ($i > date('d') && $bulan == date('m')) {
                      $lr = 0;
                    } else {
                      $array_lr[$no] = array($i, $lr);
                      $no++;
                    }

                    // $array_lr[$no] = array($i, $lr);
                    // $no++;
                  }

                  ?>

                  <div class="row">
                    <div class="col-xs-12 text-center">
                      <!-- PAGE CONTENT BEGINS -->
                      <div style="padding-left:0px;padding-right:0px;">
                        <div class="table-responsive">
                          <div id="graf_order_hari_ini"></div>
                        </div>
                      </div>
                      <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                  </div>


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
    </div><!-- /.main-content -->

    <style>
    .data-label-1 {
      font-size: 12px;
      background: #1f9b24;
      color: #fff;
      padding: 2px 5px 2px 5px;
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
      background: #e91e63;
      color: #fff;
      padding: 2px 5px 2px 5px;
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

        // GRAFIK HARI INI //
        var ticks_xaxis = [];
        for (var i = 1; i <= <?php echo $akhir_tgl*1 ?>; i++) {
          ticks_xaxis[i] = [i, i];
        }
        var d1_hari_ini = <?php echo json_encode($array_lr) ?>;
        
        $('#graf_order_hari_ini').css({'width':'1500px' , 'height':'400px'});
        var graf_ord_hari_ini = $.plot("#graf_order_hari_ini", [
          { label: "Laba (Rugi)", data: d1_hari_ini, color: "#20e3b2"}
        ], {
          hoverable: true,
          shadowSize: 0,
          series: {
            lines: { show: true },
            points: { show: true }
          },
          xaxis: {
            min: 1,
            max: <?php echo $akhir_tgl*1 ?>,
            ticks: ticks_xaxis,
            tickDecimals: 2,
          },
          yaxis: {
            //ticks: 10,
            // min: 0,
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
            $('<div class="data-label-1">' + numberWithCommas(el[1]) + '</div>').css({
              position: 'absolute',
              left: o.left - 25,
              top: o.top - 26,
              display: 'none'
            }).appendTo(graf_ord_hari_ini.getPlaceholder()).fadeIn('slow');
          } else if (el[1]*1 == 0) {
          } else {
            $('<div class="data-label-2">' + numberWithCommas(el[1]) + '</div>').css({
              position: 'absolute',
              left: o.left - 25,
              top: o.top + 10,
              display: 'none'
            }).appendTo(graf_ord_hari_ini.getPlaceholder()).fadeIn('slow');
          }
        });
        // GRAFIK HARI INI //

    });
    </script>
