
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Buku Besar</li>
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
                Buku Besar 1
                
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

                  <form method="post" id="formCetak" class="form-horizontal" action="<?php echo base_url() ?>laporan_retail/cetak_buku_besar_1">
                    <input type="hidden" id="awal_periode2" name="awal_periode" value="<?php echo $awal_periode ?>">
                    <input type="hidden" id="akhir_periode2" name="akhir_periode" value="<?php echo $akhir_periode ?>">
                    <button type="submit" id="bCetak" class="btn btn-danger">Cetak</button>
                  </form>

                  <?php
                  $i=1;
                  foreach ($data_akun->result() as $akun):
                    $saldo_awal = 0;
                    $current_id_akun = 0;
                    foreach ($data_saldo_awal->result() as $key_saldo) {
                      if($key_saldo->id_akun == $akun->id){
                        $current_id_akun = $akun->id;
                        $saldo_awal = $key_saldo->saldo;
                      }
                    }
                    $ak = substr($akun->kode,0,1);
                    if($ak=='2' || $ak=='3'){
                      $saldo_awal = $saldo_awal * -1;
                    }else{
                      $saldo_awal = $saldo_awal;
                    }
                    if ($level=="5") {
                      $ppn_keluaran = 0;
                      $ppn_keluaran_baru = 0;
                      if ($current_id_akun==67) { // KAS BESAR
                        foreach ($data_saldo_awal->result() as $key_saldo) :
                          if ($key_saldo->id_akun == 59) { // PPN LAMA [ADMIN]
                            $ppn_keluaran += $key_saldo->saldo*-1;
                          }
                          if ($key_saldo->id_akun == 75) { // PPN BARU [MARKETING]
                            $ppn_keluaran_baru += $key_saldo->saldo*-1;
                          }
                        endforeach;
                        $saldo_awal = $saldo_awal - $ppn_keluaran + $ppn_keluaran_baru;
                      }
                    }
                  ?>
                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                      <b><?php echo $akun->kode ?> | <?php echo $akun->akun ?></b>
                    </div>
                    <div>
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="2" class="center">No</th>
                            <th>Tanggal</th>
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                        </thead>
                        <tbody>
                          <tr>
                            <th colspan="4" class="text-right">Saldo Awal</th>
                            <th colspan="2">Rp <span style="float:right;"><?php echo number_format($saldo_awal,0,',','.') ?></span></th>
                          </tr>
                          <?php
                          $no=1;
                          $debet = 0;
                          $kredit = 0;
                          $current_id_akun = 0;
                          foreach ($data_jurnal as $jurnal):
                          if ($jurnal->id_akun == $akun->id) {
                            $current_id_akun = $jurnal->id_akun;
                          ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $jurnal->tgl ?></td>
                              <td><?php echo $jurnal->kode ?></td>
                              <td><?php echo $jurnal->keterangan ?></td>
                              <td>Rp <span style="float:right;"><?php echo number_format($jurnal->debet,0,',','.') ?></span></td>
                              <td>Rp <span style="float:right;"><?php echo number_format($jurnal->kredit,0,',','.') ?></span></td>
                            </tr>
                          <?php
                          $debet += $jurnal->debet;
                          $kredit += $jurnal->kredit;
                          $no++;
                          }
                          endforeach;
                          if ($ak=='2' || $ak=='3') {
                            $total = ($debet - $kredit) * -1 ;
                          } else {
                            $total = $debet - $kredit ;
                          }
                          $total = $debet - $kredit ;
                          $saldo_akhir = $saldo_awal + $total;
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="4" class="text-right">Jumlah</th>
                            <th>Rp <span style="float:right;"><?php echo number_format($debet,0,',','.') ?></span></th>
                            <th>Rp <span style="float:right;"><?php echo number_format($kredit,0,',','.') ?></span></th>
                          </tr>
                          <?php
                          $ppn_keluaran = 0;
                          $ppn_keluaran_baru = 0;
                          if ($level=="5") {
                          $ppn_keluaran = 0;
                          $ppn_keluaran_baru = 0;
                          if ($current_id_akun==67) { // KAS BESAR
                          foreach ($data_jurnal as $jurnal):
                            if ($jurnal->id_akun == 59) { // PPN LAMA [ADMIN]
                              $ppn_keluaran += $jurnal->kredit;
                            }
                            if ($jurnal->id_akun == 75) { // PPN BARU [MARKETING]
                              $ppn_keluaran_baru += $jurnal->kredit;
                            }
                          endforeach;
                          $saldo_akhir = $saldo_akhir-$ppn_keluaran+$ppn_keluaran_baru;
                          ?>
                          <tr>
                            <th colspan="4" class="text-right">PPN Keluaran yang harus dibayar</th>
                            <th colspan="2">Rp <span style="float:right;"><?php echo number_format($ppn_keluaran_baru,0,',','.') ?></span></th>
                          </tr>
                          <?php } } ?>
                          <tr>
                            <th colspan="4" class="text-right">Total</th>
                            <th colspan="2">Rp <span style="float:right;"><?php echo number_format($total-$ppn_keluaran+$ppn_keluaran_baru,0,',','.') ?></span></th>
                          </tr>
                          <tr>
                            <th colspan="4" class="text-right">Saldo</th>
                            <th colspan="2">Rp <span style="float:right;"><?php echo number_format($saldo_akhir,0,',','.') ?></span></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <div class="hr hr20 hr-dotted"></div>
                  <?php $i++; endforeach ?>


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