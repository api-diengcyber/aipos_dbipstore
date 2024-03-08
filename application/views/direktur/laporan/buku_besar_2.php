
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Buku Besar 2</li>
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
                Buku Besar 2
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                  <form method="post" id="formPeriode" class="form-horizontal" action="">
                    <div class="form-group">
                      <label class="col-sm-1 control-label no-padding-right">Periode</label>
                      <div class="col-sm-3">
                        <div class="pos-rel">
                            <input type="hidden" id="awal_periode" name="awal_periode" value="<?php echo $awal_periode ?>">
                            <input type="hidden" id="akhir_periode" name="akhir_periode" value="<?php echo $akhir_periode ?>">
                            <input class="form-control" type="text" name="periode" id="id-date-range-picker-1" value="0" />
                        </div>
                      </div>
                    </div>
                  </form>

                  <form method="post" id="formCetak" class="form-horizontal" action="<?php echo base_url() ?>laporan_retail/cetak_buku_besar_2">
                    <input type="hidden" id="awal_periode2" name="awal_periode" value="<?php echo $awal_periode ?>">
                    <input type="hidden" id="akhir_periode2" name="akhir_periode" value="<?php echo $akhir_periode ?>">
                    <button type="submit" id="bCetak" class="btn btn-danger">Cetak</button>
                  </form>

                  <div class="clearfix">
                    <div class="pull-right tableTools-container"></div>
                  </div>

                  <?php
                  $saldo_awal = 0;
                  foreach ($akun_saldo_awal as $key_akun_sa) {
                    $ak = substr($key_akun_sa->kode,0,1);
                    if($ak=='2' || $ak=='3'){
                      $ak_saldo_awal = $key_akun_sa->saldo * -1;
                    }else{
                      $ak_saldo_awal = $key_akun_sa->saldo;
                    }
                    $saldo_awal += $ak_saldo_awal;
                  }
                  if ($level=="5") {
                    $ppn_keluaran = 0;
                    $ppn_keluaran_baru = 0;
                    foreach ($akun_saldo_awal as $key_akun_sa) :
                      if ($key_akun_sa->id_akun == 59) { // PPN LAMA [ADMIN]
                        $ppn_keluaran += $key_akun_sa->saldo*-1;
                      }
                      if ($key_akun_sa->id_akun == 75) { // PPN BARU [MARKETING]
                        $ppn_keluaran_baru += $key_akun_sa->saldo*-1;
                      }
                    endforeach;
                    $saldo_awal = $saldo_awal - $ppn_keluaran + $ppn_keluaran_baru;
                  }
                  ?>
                  <div>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th colspan="3" class="text-right">Saldo Awal</th>
                          <th class="text-right"><?php echo number_format($saldo_awal,0,',','.') ?></th>
                        </tr>
                        <tr>
                          <th width="2" class="center">No</th>
                          <th>Kode</th>
                          <th>Akun</th>
                          <th>Saldo</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $i=1;
                      $total_saldo = 0;
                      foreach ($data_akun->result() as $akun):
                        $saldo = 0;
                        $current_id_akun = 0;
                        foreach ($data_saldo->result() as $key_saldo) {
                          if($key_saldo->id_akun == $akun->id){
                            $current_id_akun = $akun->id;
                            $saldo += $key_saldo->saldo;
                          }
                        }
                        if ($level=="5") {
                          $ppn_keluaran = 0;
                          $ppn_keluaran_baru = 0;
                          if ($current_id_akun==67) { // KAS BESAR
                            foreach ($data_saldo->result() as $key_saldo) :
                              if ($key_saldo->id_akun == 59) { // PPN LAMA [ADMIN]
                                $ppn_keluaran += $key_saldo->saldo*-1;
                              }
                              if ($key_saldo->id_akun == 75) { // PPN BARU [MARKETING]
                                $ppn_keluaran_baru += $key_saldo->saldo*-1;
                              }
                            endforeach;
                            $saldo = $saldo - $ppn_keluaran + $ppn_keluaran_baru;
                          }
                        }
                        $ak = substr($akun->kode,0,1);
                        if ($ak=='2' || $ak=='3') {
                          $saldo = $saldo * -1;
                        } else {
                          $saldo = $saldo;
                        }
                        $total_saldo += $saldo;
                      ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $akun->kode ?></td>
                          <td><?php echo $akun->akun ?></td>
                          <td class="text-right"><?php echo number_format($saldo,0,',','.') ?></td>
                        </tr>
                      <?php $i++; endforeach ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3" class="text-right">Total Saldo</th>
                          <th class="text-right"><?php echo number_format($total_saldo,0,',','.') ?></th>
                        </tr>
                        <?php
                        $saldo_akhir = $saldo_awal + $total_saldo;
                        ?>
                        <tr>
                          <th colspan="3" class="text-right">Saldo Akhir</th>
                          <th class="text-right"><?php echo number_format($saldo_akhir,0,',','.') ?></th>
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
      $('input[id=id-date-range-picker-1]').daterangepicker({
          'applyClass' : 'btn-sm btn-success',
          'cancelClass' : 'btn-sm btn-default',
          locale: {
            applyLabel: 'Apply',
            cancelLabel: 'Cancel',
            format: 'YYYY-MM-DD',
          },
          startDate:'<?php echo $awal_periode ?>',
          endDate:'<?php echo $akhir_periode ?>',
      },
      function(start, end, label){
          $("#awal_periode").val(start.format('YYYY-MM-DD'));
          $("#akhir_periode").val(end.format('YYYY-MM-DD'));
          $("#awal_periode2").val(start.format('YYYY-MM-DD'));
          $("#akhir_periode2").val(end.format('YYYY-MM-DD'));
          $("#formPeriode").submit();
      })
      .prev().on(ace.click_event, function(){
          $(this).next().focus();
      });
  });
</script>
<!-- JQUERY -->