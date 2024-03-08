
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Timeseries Sales</li>
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

            <style>
            .btn-detail {
              cursor: pointer;
            }
            .btn-detail:hover {
              background-color: #1bb148;
              transition: all .3s ease-in-out;
              /*font-size: 15px;*/
              color: #fff;
            }
            </style>
            <div class="page-header">
              <h1>
                Timeseries Sales
              </h1>
            </div><!-- /.page-header -->
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-sm-12">
                    <div class="tabbable">
                      <ul class="nav nav-tabs" id="myTab">
                        <li class="<?php echo $tab_active=='harian' ? 'active' : '' ?>">
                          <a data-toggle="tab" href="#harian">
                            <i class="ace-icon fa fa-calendar bigger-120"></i>
                            Harian
                          </a>
                        </li>
                        <li class="<?php echo $tab_active=='mingguan' ? 'active' : '' ?>">
                          <a data-toggle="tab" href="#mingguan">
                            <i class="ace-icon fa fa-calendar bigger-120"></i>
                            Mingguan
                          </a>
                        </li>
                        <li class="<?php echo $tab_active=='bulanan' ? 'active' : '' ?>">
                          <a data-toggle="tab" href="#bulanan">
                            <i class="ace-icon fa fa-calendar bigger-120"></i>
                            Bulanan
                          </a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div id="harian" class="tab-pane fade <?php echo $tab_active=='harian' ? 'in active' : '' ?>">
                          <div class="row">
                            <div class="col-md-12">
                              <form action="" method="post">
                                <div class="form-group">
                                  <div class="col-sm-12 input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-filter"></i>
                                    </span>
                                    <select class="form-control input-md" name="pil_tanggal" id="pil_tanggal">
                                      <option value="minggu" <?php echo $pil_tanggal=="minggu" ? "selected" : "" ?>>Minggu Ini</option>
                                      <option value="bulan" <?php echo $pil_tanggal=="bulan" ? "selected" : "" ?>>Bulan Ini</option>
                                      <option value="periode" <?php echo $pil_tanggal=="periode" ? "selected" : "" ?>>Periode</option>
                                    </select>
                                    <span class="input-group-addon panelPeriode <?php echo $pil_tanggal=="periode" ? "" : "hide" ?>"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control panelPeriode <?php echo $pil_tanggal=="periode" ? "" : "hide" ?>" name="periode" id="id-date-range-picker-1" autocomplete="off">
                                    <input type="hidden" name="tab_active" value="harian">
                                    <span class="input-group-addon" style="padding: 0px; border-width: 0px;">
                                      <button type="submit" class="btn btn-primary btn-sm">Proses</button>
                                    </span>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-condensed" style="margin-bottom: 0px;">
                                  <thead>
                                    <tr>
                                      <th width="5">No</th>
                                      <th>Nama</th>
                                      <?php
                                      $array_jumlah = array();
                                      foreach ($period as $dt) {
                                        $array_jumlah[$dt->format("d-m-Y")] = 0;
                                        echo "<th width='100' class='text-center'>".$dt->format("d-m-Y")."</th>";
                                      }
                                      ?>
                                      <th class="text-center">TOTAL</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no = 1; foreach ($data_sales as $key): ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $key->first_name ?></td>
                                      <?php
                                      $sales_total = 0;
                                      foreach ($period as $dt) {
                                        $omzet = $this->Pegawai_retail_model->omzet_sales_tgl($key->id_users, $dt->format("d-m-Y"));
                                        $array_jumlah[$dt->format("d-m-Y")] += $omzet;
                                        echo "<td class='text-right btn-detail' data-tgl='".$dt->format("d-m-Y")."' data-user='".$key->id_users."'>".number_format($omzet,0,',','.')."</td>";
                                        $sales_total += $omzet;
                                      }
                                      ?>
                                      <td class="text-right btn-detail" data-tgl="<?php echo $start_periode.':'.$end_periode ?>" data-user="<?php echo $key->id_users ?>"><?php echo number_format($sales_total,0,',','.') ?></td>
                                    </tr>
                                  <?php $no++; endforeach ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td>(Tanpa Sales)</td>
                                      <?php
                                      $sales_total = 0;
                                      foreach ($period as $dt) {
                                        $omzet = $this->Pegawai_retail_model->omzet_sales_tgl("null", $dt->format("d-m-Y"));
                                        $array_jumlah[$dt->format("d-m-Y")] += $omzet;
                                        echo "<td class='text-right btn-detail' data-tgl='".$dt->format("d-m-Y")."' data-user='null'>".number_format($omzet,0,',','.')."</td>";
                                        $sales_total += $omzet;
                                      }
                                      ?>
                                      <td class="text-right btn-detail" data-tgl="<?php echo $start_periode.':'.$end_periode ?>" data-user="null"><?php echo number_format($sales_total,0,',','.') ?></td>
                                    </tr>
                                  </tbody>
                                  <tfoot>
                                    <tr style="background-color: yellow;">
                                      <th colspan="2" class="text-right">JUMLAH</th>
                                      <?php
                                      $total = 0;
                                      foreach ($period as $dt) {
                                        echo "<th class='text-right'>".number_format($array_jumlah[$dt->format("d-m-Y")],0,',','.')."</th>";
                                        $total += $array_jumlah[$dt->format("d-m-Y")];
                                      }
                                      ?>
                                      <th></th>
                                    </tr>
                                    <tr>
                                      <th colspan="2" class="text-right">TOTAL</th>
                                      <th colspan="1000" class="text-right"><?php echo number_format($total,0,',','.') ?></th>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="mingguan" class="tab-pane fade <?php echo $tab_active=='mingguan' ? 'in active' : '' ?>">
                          <div class="row">
                            <div class="col-md-12">
                              <form action="" method="post">
                                <div class="form-group">
                                  <div class="col-sm-12 input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                    <select name="m_tahun" class="form-control" autocomplete="off">
                                      <?php for ($i = 2015; $i <= 2022; $i++) : ?>
                                      <option value="<?php echo $i ?>" <?php echo $i==$m_tahun ? "selected" : "" ?>><?php echo $i ?></option>
                                      <?php endfor; ?>
                                    </select>
                                    <span class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                    <select name="m_bulan" class="form-control" autocomplete="off">
                                      <?php for ($i = 1; $i <= 12; $i++) : ?>
                                      <option value="<?php echo $i ?>" <?php echo $i==$m_bulan*1 ? "selected" : "" ?>><?php echo $array_bulan[$i] ?></option>
                                      <?php endfor; ?>
                                    </select>
                                    <input type="hidden" name="tab_active" value="mingguan">
                                    <span class="input-group-addon" style="padding:0px;border-width:0px;">
                                      <button type="submit" class="btn btn-primary btn-sm">Proses</button>
                                    </span>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-condensed" style="margin-bottom: 0px;">
                                  <thead>
                                    <tr>
                                      <th width="5">No</th>
                                      <th>Nama</th>
                                      <?php
                                      $no = 0;
                                      $array_jumlah = array();
                                      foreach ($array_mingguan as $day) {
                                        $no++;
                                        $array_jumlah[$no] = 0;
                                        $day2 = strtotime('+5 days', strtotime($day->format('d-m-Y')));
                                        $week_start = $day->format('d');
                                        $week_end = date("d", $day2);
                                        echo "<th width='100' class='text-center'>Minggu ".$no."<br>".$week_start." - ".$week_end."</th>";
                                      }
                                      ?>
                                      <th class="text-center">TOTAL</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no = 1; foreach ($data_sales as $key): ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $key->first_name ?></td>
                                      <?php
                                      $no = 0;
                                      $sales_total = 0;
                                      foreach ($array_mingguan as $day) {
                                        $no++;
                                        $day2 = strtotime('+5 days', strtotime($day->format('d-m-Y')));
                                        $week_start = $day->format('d');
                                        $week_end = date("d", $day2);
                                        $omzet = $this->Pegawai_retail_model->omzet_sales_tgl($key->id_users, $day->format("d-m-Y"), date('d-m-Y', $day2));
                                        echo "<td class='text-right btn-detail' data-tgl='".$day->format('d-m-Y').":".date('d-m-Y', $day2)."' data-user='".$key->id_users."'>".number_format($omzet,0,',','.')."</td>";
                                        $array_jumlah[$no] += $omzet;
                                        $sales_total += $omzet;
                                      }
                                      ?>
                                      <td class="text-right btn-detail" data-tgl="<?php echo $m_bulan.'-'.$m_tahun ?>" data-user="<?php echo $key->id_users ?>"><?php echo number_format($sales_total,0,',','.') ?></td>
                                    </tr>
                                  <?php $no++; endforeach ?>
                                    <tr>
                                      <td><?php echo $no+1 ?></td>
                                      <td>(Tanpa Sales)</td>
                                      <?php
                                      $no = 0;
                                      $sales_total = 0;
                                      foreach ($array_mingguan as $day) {
                                        $no++;
                                        $day2 = strtotime('+5 days', strtotime($day->format('d-m-Y')));
                                        $week_start = $day->format('d');
                                        $week_end = date("d", $day2);
                                        $omzet = $this->Pegawai_retail_model->omzet_sales_tgl("null", $day->format("d-m-Y"), date('d-m-Y', $day2));
                                        echo "<td class='text-right btn-detail' data-tgl='".$day->format('d-m-Y').":".date('d-m-Y', $day2)."' data-user='null'>".number_format($omzet,0,',','.')."</td>";
                                        $array_jumlah[$no] += $omzet;
                                        $sales_total += $omzet;
                                      }
                                      ?>
                                      <td class="text-right btn-detail" data-tgl="<?php echo $start_periode.':'.$end_periode ?>" data-user="null"><?php echo number_format($sales_total,0,',','.') ?></td>
                                    </tr>
                                  </tbody>
                                  <tfoot>
                                    <tr style="background-color: yellow;">
                                      <th colspan="2" class="text-right">JUMLAH</th>
                                      <?php
                                      $total = 0;
                                      $no = 0;
                                      foreach ($array_mingguan as $day) {
                                        $no++;
                                        echo "<th class='text-right'>".number_format($array_jumlah[$no],0,',','.')."</th>";
                                        $total += $array_jumlah[$no];
                                      }
                                      ?>
                                      <th></th>
                                    </tr>
                                    <tr>
                                      <th colspan="2" class="text-right">TOTAL</th>
                                      <th colspan="1000" class="text-right"><?php echo number_format($total,0,',','.') ?></th>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="bulanan" class="tab-pane fade <?php echo $tab_active=='bulanan' ? 'in active' : '' ?>">
                          <div class="row">
                            <div class="col-md-12">
                              <style>
                              .ui-datepicker-calendar {
                                  display: none;
                              }
                              </style>
                              <form action="" method="post">
                                <div class="form-group">
                                  <div class="col-sm-12 input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-filter"></i>
                                    </span>
                                    <select class="form-control input-md" name="pil_bulanan" id="pil_tanggal">
                                      <option value="bulan" <?php echo $pil_bulanan=="bulan" ? "selected" : "" ?>>Pilih Bulan</option>
                                      <option value="tahun" <?php echo $pil_bulanan=="tahun" ? "selected" : "" ?>>Tahun Ini</option>
                                    </select>
                                    <span class="input-group-addon panelPb <?php echo $pil_bulanan=="bulan" ? "" : "hide" ?>"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control <?php echo $pil_bulanan=="bulan" ? "" : "hide" ?>" name="start_pb" id="datepickermy" autocomplete="off" value="<?php echo $start_pb ?>">
                                    <span class="input-group-addon panelPb <?php echo $pil_bulanan=="bulan" ? "" : "hide" ?>"><i class="fa fa-arrow-right"></i></span>
                                    <input type="text" class="form-control <?php echo $pil_bulanan=="bulan" ? "" : "hide" ?>" name="end_pb" id="datepickermy2" autocomplete="off" value="<?php echo $end_pb ?>">
                                    <input type="hidden" name="tab_active" value="bulanan">
                                    <span class="input-group-addon" style="padding: 0px; border-width: 0px;">
                                      <button type="submit" class="btn btn-primary btn-sm">Proses</button>
                                    </span>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <div class="row" style="margin-top: 20px;">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped table-condensed" style="margin-bottom:0px;">
                                  <thead>
                                    <tr>
                                      <th width="5">No</th>
                                      <th class="text-center">Nama</th>
                                      <?php
                                      $array_jumlah = array();
                                      foreach ($pb_period as $dpt) {
                                        $m_bulan = $dpt->format("m")*1;
                                        $y_bulan = $dpt->format("Y")*1;
                                        $nama_bulan = $array_bulan[$m_bulan];
                                        $array_jumlah[$dpt->format("mY")] = 0;
                                        echo "<th width='150' class='text-center'>".$nama_bulan."<br>".$y_bulan."</th>";
                                      }
                                      ?>
                                      <th class="text-center">TOTAL</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php $no = 1; foreach ($data_sales as $key): ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $key->first_name ?></td>
                                      <?php
                                      $sales_total = 0;
                                      foreach ($pb_period as $dpt) {
                                        $omzet = $this->Pegawai_retail_model->omzet_sales_bulan($key->id_users, $dpt->format("m")*1, $dpt->format("Y")*1);
                                        $array_jumlah[$dpt->format("mY")] += $omzet;
                                        $sales_total += $omzet;
                                        echo "<td class='text-right btn-detail' data-user='".$key->id_users."' data-tgl='".$dpt->format("m-Y")."'>".number_format($omzet,0,',','.')."</td>";
                                      }
                                      ?>
                                      <td class="text-right btn-detail" data-tgl="<?php echo $zstart_pb.':'.$zend_pb ?>" data-user="<?php echo $key->id_users ?>"><?php echo number_format($sales_total,0,',','.') ?></td>
                                    </tr>
                                  <?php $no++; endforeach; ?>
                                    <tr>
                                      <td><?php echo $no ?></td>
                                      <td>(Tanpa Sales)</td>
                                      <?php
                                      $sales_total = 0;
                                      foreach ($pb_period as $dpt) {
                                        $omzet = $this->Pegawai_retail_model->omzet_sales_bulan("null", $dpt->format("m")*1, $dpt->format("Y")*1);
                                        $array_jumlah[$dpt->format("mY")] += $omzet;
                                        $sales_total += $omzet;
                                        echo "<td class='text-right btn-detail' data-user='null' data-tgl='".$dpt->format("m-Y")."'>".number_format($omzet,0,',','.')."</td>";
                                      }
                                      ?>
                                      <td class="text-right btn-detail" data-tgl="<?php echo $zstart_pb.':'.$zend_pb ?>" data-user="null"><?php echo number_format($sales_total,0,',','.') ?></td>
                                    </tr>
                                  </tbody>
                                  <tfoot>
                                    <tr style="background-color: yellow;">
                                      <th colspan="2" class="text-right">JUMLAH</th>
                                      <?php
                                      $total = 0;
                                      foreach ($pb_period as $dpt) {
                                        $omzet = $array_jumlah[$dpt->format("mY")];
                                        echo "<td class='text-right'>".number_format($omzet,0,',','.')."</td>";
                                        $total += $omzet;
                                      }
                                      ?>
                                      <th></th>
                                    </tr>
                                    <tr>
                                      <th colspan="2" class="text-right">TOTAL</th>
                                      <th colspan="1000" class="text-right"><?php echo number_format($total,0,',','.') ?></th>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.col -->
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
  $(".btn-detail").on("click", function(e) {
    var that = $(this);
    var user = that.attr("data-user");
    var tgl = that.attr("data-tgl");
    window.open('<?php echo base_url() ?>laporan_retail/detail_sales/'+user+'/'+tgl, '_blank');
  });
  $('select[name="pil_tanggal"]').on('change', function(){
    var val = $(this).val();
    if (val=="periode") {
      $(".panelPeriode").removeClass("hide");
    } else {
      $(".panelPeriode").addClass("hide");
    }
  });
  $('#id-date-range-picker-1').daterangepicker({
      'applyClass' : 'btn-sm btn-success',
      'cancelClass' : 'btn-sm btn-default',
      locale: {
        applyLabel: 'Apply',
        cancelLabel: 'Cancel',
        format: 'DD-MM-YYYY',
      },
      startDate: '<?php echo $start_periode ?>',
      endDate: '<?php echo $end_periode ?>',
  });
  $('select[name="pil_bulanan"]').on('change', function() {
    var val = $(this).val();
    if (val=="bulan") {
      $(".panelPb").removeClass("hide");
      $('input[name="start_pb"]').removeClass("hide");
      $('input[name="end_pb"]').removeClass("hide");
    } else {
      $(".panelPb").addClass("hide");
      $('input[name="start_pb"]').addClass("hide");
      $('input[name="end_pb"]').addClass("hide");
    }
  });
  $('#datepickermy').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'mm-yy',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
  });
  $('#datepickermy2').datepicker({
    changeMonth: true,
    changeYear: true,
    showButtonPanel: true,
    dateFormat: 'mm-yy',
    onClose: function(dateText, inst) {
      $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    }
  });
});
</script>
<!-- JQUERY -->