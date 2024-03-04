
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Kasir</li>
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
                Laporan Kasir
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                  <div class="row">
                    <div class="col-md-8">
                      <div class="widget-box transparent">
                        <div class="widget-body">
                          <div class="widget-main padding-4">
                            <canvas id="grafik_kasir"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="space"></div>

                  <div class="row">
                    <div class="col-xs-12">
                      <div class="widget-box widget-color-green3">
                        <div class="widget-header widget-header-flat">
                          <h4 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-upload"></i>
                            Data Penjualan
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
                                    <i class="ace-icon fa fa-caret-right blue"></i>Kasir
                                  </th>
                                  <th>
                                    <i class="ace-icon fa fa-caret-right blue"></i>Penjualan
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($data_order_per_kasir as $key) :?>
                                <tr>
                                  <td><?php echo $key->first_name." ".$key->last_name ?></td>
                                  <td><?php echo $key->jml_order ?></td>
                                </tr>
                              <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                      </div><!-- /.widget-box -->
                    </div>
                  </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

    <!-- JQUERY -->
    <script src="<?php echo base_url()?>assets/js/chart.min.js"></script>
    <script>
      jQuery(function($){
            /* GRAFIK KASIR */
            <?php
            $grafik_label_kasir = array();
            $grafik_data_kasir = array();
            $grafik_bg_kasir = array();
            $grafik_b_kasir = array();
            $i = 0;
            foreach ($data_pegawai as $key_pegawai) :
              $jml_order = 0;
              foreach ($data_group_by_users as $key_gb) {
                if ($key_pegawai->id == $key_gb->id_users) {
                  $jml_order += $key_gb->jml_order;
                }
              }
              $grafik_label_kasir[$i] = $key_pegawai->first_name.' '.$key_pegawai->last_name;
              $grafik_data_kasir[$i] = $jml_order*1;
              $grafik_bg_kasir[$i] = 'rgba(99,255,132, 0.2)';
              $grafik_b_kasir[$i] = 'rgba(99,255,132, 1)';
              $i++;
            endforeach;
            $json_grafik_label_kasir = json_encode($grafik_label_kasir);
            $json_grafik_data_kasir = json_encode($grafik_data_kasir);
            $json_grafik_bg_kasir = json_encode($grafik_bg_kasir);
            $json_grafik_b_kasir = json_encode($grafik_b_kasir);
            ?>
            var grafik_kasir = $("#grafik_kasir");
            var grafikKasir = new Chart(grafik_kasir, {
                type: 'bar',
                data: {
                    labels: <?php echo $json_grafik_label_kasir ?>,
                    datasets: [{
                        label: 'Grafik Penjualan Kasir',
                        data: <?php echo $json_grafik_data_kasir ?>,
                        backgroundColor: <?php echo $json_grafik_bg_kasir ?>,
                        borderColor: <?php echo $json_grafik_b_kasir ?>,
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
            /* GRAFIK KASIR */
      });
    </script>
    <!-- JQUERY -->