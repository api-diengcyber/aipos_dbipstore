
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Laba Rugi</li>
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
                Laba Rugi
                
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
                    
                <div class="row">
                  <div class="col-xs-6">
                    <br>
                    <table style="width:100%;">
                      <tr>
                        <th></th>
                        <th></th>
                      </tr>
                      <?php
                      $saldo_pendapatan = 0;
                      foreach ($data_pendapatan->result() as $key_pendapatan):
                        $saldo_awal = 0;
                        foreach ($data_saldo_awal->result() as $key_saldo_awal) {
                          if($key_saldo_awal->id_akun == $key_pendapatan->id){
                            $saldo_awal = $key_saldo_awal->saldo * -1;
                          }
                        }
                        $saldo = 0;
                        foreach ($data_saldo->result() as $key_saldo) {
                          if($key_saldo->id_akun == $key_pendapatan->id){
                            $saldo = $key_saldo->saldo * -1;
                          }
                        }
                        $saldo_akhir = $saldo;
                        //$saldo_akhir = $saldo_awal + $saldo;
                        $saldo_pendapatan += $saldo_akhir;

                        $space = "";
                        for ($i = 0; $i < strlen($key_pendapatan->kode); $i++) {
                          $space .= "&nbsp;&nbsp;";
                        }
                      ?>
                        <tr>
                          <td><?php echo $space.$key_pendapatan->kode ?> <b><?php echo $key_pendapatan->akun ?></b></td>
                          <td>Rp <span style="float:right;"><?php echo number_format($saldo_akhir,0,',','.') ?></span></td>
                        </tr>
                      <?php endforeach ?>
                      <tr>
                        <td colspan="2"><div class="hr hr1 hr-dotted"></div></td>
                      </tr>
                      <tr>
                        <th>Laba / Rugi Kotor</th>
                        <th>Rp <span style="float:right;"><?php echo number_format($saldo_pendapatan,0,',','.') ?></span></th>
                      </tr>
                      <tr>
                        <td colspan="2"><div class="hr hr1 hr-dotted"></div></td>
                      </tr>
                      <?php
                      $saldo_beban = 0;
                      foreach ($data_biaya->result() as $key_biaya):
                        $saldo_awal = 0;
                        foreach ($data_saldo_awal->result() as $key_saldo_awal) {
                          if($key_saldo_awal->id_akun == $key_biaya->id){
                            $saldo_awal = $key_saldo_awal->saldo;
                          }
                        }
                        $saldo = 0;
                        foreach ($data_saldo->result() as $key_saldo) {
                          if($key_saldo->id_akun == $key_biaya->id){
                            $saldo = $key_saldo->saldo;
                          }
                        }
                        // $saldo_akhir = $saldo_awal + $saldo;
                        $saldo_akhir = $saldo;
                        $saldo_beban += $saldo_akhir;

                        $space = "";
                        for ($i = 0; $i < strlen($key_biaya->kode); $i++) {
                          $space .= "&nbsp;&nbsp;";
                        }
                      ?>
                        <tr>
                          <td><?php echo $space.$key_biaya->kode ?> <b><?php echo $key_biaya->akun ?></b></td>
                          <td>Rp <span style="float:right;"><?php echo number_format($saldo_akhir,0,',','.') ?></span></td>
                        </tr>
                      <?php endforeach ?>
                      <tr>
                        <td colspan="2"><div class="hr hr1 hr-dotted"></div></td>
                      </tr>
                      <tr>
                        <th>Total Beban Biaya</th>
                        <th>Rp <span style="float:right;"><?php echo number_format($saldo_beban,0,',','.') ?></span></th>
                      </tr>
                      <tr>
                        <td colspan="2"><div class="hr hr1 hr-dotted"></div></td>
                      </tr>
                      <?php
                      $labarugi = $saldo_pendapatan - $saldo_beban;
                      ?>
                      <tr>
                        <th>Laba / Rugi </th>
                        <th>Rp <span style="float:right;"><?php echo number_format($labarugi,0,',','.') ?></span></th>
                      </tr>
                    </table>
                  </div>
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
          $("#formPeriode").submit();
      })
      .prev().on(ace.click_event, function(){
          $(this).next().focus();
      });
  });
</script>
<!-- JQUERY -->