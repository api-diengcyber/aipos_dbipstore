
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan CS</li>
              <li class="active">Laporan Aktivitas CS</li>
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
                Laporan Aktivitas CS
              </h1>
            </div><!-- /.page-header -->
            
            <style>
            @media print {
              body * {
                visibility: hidden;
              }
              #section-to-print, #section-to-print * {
                visibility: visible;
              }
              #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
              }
            }
            </style>

            <?php
            $exawal = explode("-", $awal_periode);
            $s_awal_periode = $exawal[2].'-'.$exawal[1].'-'.$exawal[0];
            $exakhir = explode("-", $akhir_periode);
            $s_akhir_periode = $exakhir[2].'-'.$exakhir[1].'-'.$exakhir[0];
            ?>
            <form action="" method="post">
            <div class="alert alert-info">
                <h4>FILTER</h4>
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-3">
                    <!--<h6>Pilih Bulan</h6>-->
                    <!--<input type="text" name="bulan" id="datepicker1" value="<?php echo $bulan;?>">-->
                    <h6>Pilih Periode</h6>
                    <input type="text" class="" name="periode" id="id-date-range-picker-4" style="width:240px;" value="<?php echo $s_awal_periode." - ".$s_akhir_periode ?>" autocomplete="off" />
                    <input type="hidden" id="awal_periode" name="awal_periode" value="<?php echo $awal_periode ?>">
                    <input type="hidden" id="akhir_periode" name="akhir_periode" value="<?php echo $akhir_periode ?>">
                    </div>
                    <div class="col-md-2">
                    <h6>&nbsp;</h6>
                    <button class="btn btn-primary btn-sm">PROSES FILTER</button>
                    </div>
                </div>
            </div>
            </form>

            <div class="row">
              <div class="col-xs-12" id="section-to-print">
                <!-- PAGE CONTENT BEGINS -->
                <?php foreach($data_aktivitas as $group => $data) { ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="9" class="text-center"><?php echo $group;?></th>
                        </tr>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th rowspan="2">KODE CS</th>
                            <th rowspan="2">KODE CS</th>
                            <th rowspan="2">LEADS</th>
                            <th rowspan="2">TOTALAN</th>
                            <th colspan="<?php echo count($data_produk) ?>" class="text-center">CLOSING</th>
                            <th rowspan="2" class="text-center">TOTAL CLOSING</th>
                            <th rowspan="2" class="text-center">PRESENTASE</th>
                        </tr>
                        <tr>
                          <?php foreach ($data_produk as $key) : ?>
                            <th class="text-center"><?php echo $key->nama_produk ?></th>
                          <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $jml_leads = 0;
                        $jml_totalan = 0;
                        // $jml_herbaskin = 0;
                        // $jml_gracilli = 0;
                        
                        $jml_produk = array();
                        foreach ($data_produk as $key) :
                          $jml_produk[$key->kode_produk] = 0;
                        endforeach;

                        $jml_closing = 0;
                        $jml_presentase = 0;
                        foreach ($data as $item) : 

                          $item->closing = 0;
                          $subjml_produk = array();
                          foreach ($data_produk as $key) :
                            $row_jml = $this->db->select('SUM(od.jumlah) AS jml')
                                              ->from('orders o')
                                              ->join('orders_detail od', 'o.id_orders_2=od.id_orders_2')
                                              ->where('od.id_orders_2 > 0')
                                              ->where('o.id_sales', $item->id_cs)
                                              ->where('od.id_produk', $key->id_produk_2)
                                              ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                              ->get()->row();
                            $subjml_produk[$key->kode_produk] = 0;
                            if ($row_jml) {
                              $subjml_produk[$key->kode_produk] = $row_jml->jml;
                            }
                            $jml_produk[$key->kode_produk] += $subjml_produk[$key->kode_produk];
                            $item->closing += $subjml_produk[$key->kode_produk];
                          endforeach;

                          $closing_jml = $item->closing;
                          $presentase = 0;
                          if (!empty($item->leads)) {
                            // $presentase = round((($item->gracilli + $item->herbaskin) / $item->leads)*100,2);
                            $presentase = round(($closing_jml / $item->leads)*100,2);
                          }
                          $jml_leads += $item->leads;
                          $jml_totalan += $item->totalan;
                          // $jml_herbaskin += $closing_hs;
                          // $jml_gracilli += $closing_gc;
                          $jml_closing += $closing_jml;
                          $jml_presentase += $presentase;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $item->last_nama_cs;?></td>
                            <td><?php echo $item->nama_cs;?></td>
                            <td class="text-center"><?php echo $item->leads;?></td>
                            <td class="text-center"><?php echo $item->totalan;?></td>
                            <?php foreach ($data_produk as $key) : ?>
                            <td class="text-center"><?php echo $subjml_produk[$key->kode_produk];?></td>
                            <?php endforeach ?>
                            <td class="text-center"><?php echo $closing_jml;?>&nbsp;&nbsp;<a href="<?php echo base_url() ?>admin/laporan_cs/detail_aktivitas_total_sistem/<?php echo $item->id_cs ?>/<?php echo $awal_periode ?>/<?php echo $akhir_periode ?>" class="btn btn-primary btn-xs">Detail</a></td>
                            <td class="text-center"><?php echo $presentase ;?> %</td>
                        </tr>
                        <?php 
                            $i++;
                        endforeach;
                        $avg_presentase = 0;
                        if ($jml_presentase != 0 && $i-1 != 0) {
                          $avg_presentase = round($jml_presentase/($i-1), 2);
                        }
                        ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3" class="text-right">TOTAL</th>
                        <th class="text-center"><?php echo $jml_leads ?></th>
                        <th class="text-center"><?php echo $jml_totalan ?></th>
                        <?php foreach ($data_produk as $key) : ?>
                        <th class="text-center"><?php echo $jml_produk[$key->kode_produk] ?></th>
                        <?php endforeach; ?>
                        <th class="text-center"><?php echo $jml_closing ?></th>
                        <th class="text-center"><?php echo $avg_presentase ?> %</th>
                      </tr>
                    </tfoot>
                </table>
                <?php } ?>

                <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
                
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-inverse btn-print"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
                
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->
      
      <script>
      $(document).ready(function(){
          $(".btn-print").click(function(){
              window.print();
          });
          $('input[id=id-date-range-picker-4]').daterangepicker({
            'applyClass' : 'btn-sm btn-success',
            'cancelClass' : 'btn-sm btn-default',
            locale: {
              applyLabel: 'Apply',
              cancelLabel: 'Cancel',
              format: 'DD-MM-YYYY',
            },
            startDate:'<?php echo $s_awal_periode ?>',
            endDate:'<?php echo $s_akhir_periode ?>',
          },
          function(start, end, label){
            $("#awal_periode").val(start.format('YYYY-MM-DD'));
            $("#akhir_periode").val(end.format('YYYY-MM-DD'));
            // $("#formPeriode").submit();
          })
          .prev().on(ace.click_event, function(){
            $(this).next().focus();
          });
      });
      </script>