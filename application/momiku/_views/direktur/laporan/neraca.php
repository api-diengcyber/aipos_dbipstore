
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan</li>
              <li class="active">Neraca</li>
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
                Neraca
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                    <form method="post" id="formPeriode" class="form-horizontal" action="<?php echo base_url() ?>laporan_retail/neraca">
                      <div class="form-group">
                        <label class="col-sm-1 control-label no-padding-right">Per</label>
                        <div class="col-sm-3">
                          <div class="pos-rel">
                              <input class="form-control" type="text" name="per" id="datepicker1" value="<?php echo $per ?>" />
                          </div>
                        </div>
                      </div>
                    </form>

                    <div class="hr hr1"></div>
                    
                    <div class="row">
                      <div class="col-xs-6">
                        <?php
                        $saldo_activa = 0;
                        foreach ($data_activa->result() as $key_activa):
                          $saldo = 0;
                          $current_id_akun = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if($key_saldo->id_akun == $key_activa->id){
                              $current_id_akun = $key_activa->id;
                              $saldo = $key_saldo->saldo;
                            }
                          }
                          if ($level=="5") {
                            $ppn_keluaran = 0;
                            $ppn_keluaran_baru = 0;
                            if ($current_id_akun==67) { // KAS BESAR
                            foreach ($data_saldo->result() as $key_saldo):
                              if ($key_saldo->id_akun == 59) { // PPN LAMA [ADMIN]
                                $ppn_keluaran += $key_saldo->saldo*-1;
                              }
                              if ($key_saldo->id_akun == 75) { // PPN BARU [MARKETING]
                                $ppn_keluaran_baru += $key_saldo->saldo*-1;
                              }
                            endforeach;
                            }
                            $saldo = $saldo - $ppn_keluaran + $ppn_keluaran_baru;
                          }
                          $border = 0;
                          if($saldo != 0){
                            $border = 1;
                            $tampil_saldo = number_format($saldo,0,',','.');
                          } else {
                            $tampil_saldo = "";
                          }
                          $saldo_activa += $saldo;
                          $ml = 0;
                          if (strlen($key_activa->kode) > 9) {
                            $ml = 60;
                          } else if (strlen($key_activa->kode) > 5) {
                            $ml = 40;
                          } else if (strlen($key_activa->kode) > 3) {
                            $ml = 20;
                          }
                        ?>
                        <div style="padding:2px;border-bottom:<?php echo $border ?>px dotted #999;margin-left: <?php echo $ml ?>px">
                          <span><?php echo $key_activa->kode ?></span>
                          <span><b><?php echo $key_activa->akun ?></b></span>
                          <span style="float:right;"><?php echo $tampil_saldo ?></span></span>
                        </div>
                        <?php endforeach; ?>
                      </div>
                      <div class="col-xs-6">
                        <?php 
                        $saldo_pasiva = 0;
                        foreach ($data_pasiva->result() as $key_pasiva):
                          $saldo = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if($key_saldo->id_akun == $key_pasiva->id){
                              $saldo = $key_saldo->saldo * -1;
                            }
                          }
                          $border = 0;
                          if($saldo != 0){
                            $border = 1;
                            $tampil_saldo = number_format($saldo,0,',','.');
                          } else {
                            $tampil_saldo = "";
                          }
                          $saldo_pasiva += $saldo;
                          $ml = 0;
                          if (strlen($key_pasiva->kode) > 9) {
                            $ml = 60;
                          } else if (strlen($key_pasiva->kode) > 5) {
                            $ml = 40;
                          } else if (strlen($key_pasiva->kode) > 3) {
                            $ml = 20;
                          }
                        ?>
                        <div style="padding:2px;border-bottom:<?php echo $border ?>px dotted #999;margin-left: <?php echo $ml ?>px">
                          <span><?php echo $key_pasiva->kode ?></span>
                          <span><b><?php echo $key_pasiva->akun ?></b></span>
                          <span style="float:right;"><?php echo $tampil_saldo ?></span></span>
                        </div>
                        <?php endforeach ?>
                        <?php
                        $saldo_pendapatan = 0;
                        foreach ($data_pendapatan->result() as $key_pendapatan):
                          $saldo = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if($key_saldo->id_akun == $key_pendapatan->id){
                              $saldo = $key_saldo->saldo * -1;
                            }
                          }
                          $saldo_pendapatan += $saldo;
                        endforeach;
                        $saldo_beban = 0;
                        foreach ($data_biaya->result() as $key_biaya):
                          $saldo = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if($key_saldo->id_akun == $key_biaya->id){
                              $saldo = $key_saldo->saldo;
                            }
                          }
                          $saldo_beban += $saldo;
                        endforeach;
                        $labarugi = $saldo_pendapatan - $saldo_beban;
                        ?>
                          <div style="padding:2px;border-bottom:1px dotted #999;margin-left: <?php echo $ml ?>px">
                            <span>2.05</span>
                            <span><b>Laba / Rugi</b></span>
                            <span style="float:right;"><?php echo number_format($labarugi,0,',','.') ?></span></span>
                          </div>
                      </div>
                    </div>

                    <div class="hr hr1"></div>

                    <div class="row">
                      <div class="col-xs-6">
                        <b>Rp <span style="float:right;"><?php echo number_format($saldo_activa,0,',','.') ?></b></span>
                      </div>
                      <div class="col-xs-6">
                        <b>Rp <span style="float:right;"><?php echo number_format($saldo_pasiva + $labarugi,0,',','.') ?></b></span>
                      </div>
                    </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<!-- JQUERY -->
<script type="text/javascript">
  jQuery(function($) {
    
    $("#datepicker1").datepicker({
      showOtherMonths: true,
      selectOtherMonths: false,
      dateFormat: "dd-mm-yy",
      //isRTL:true,
      
      changeMonth: true,
      changeYear: true,
      
      showButtonPanel: true,
      beforeShow: function() {
        //change button colors
        var datepicker = $(this).datepicker( "widget" );
        setTimeout(function(){
          var buttons = datepicker.find('.ui-datepicker-buttonpane')
          .find('button');
          buttons.eq(0).addClass('btn btn-xs');
          buttons.eq(1).addClass('btn btn-xs btn-success');
          buttons.wrapInner('<span class="bigger-110" />');
        }, 0);
      },

      onSelect: function(){
        $("#formPeriode").submit();
      }
    });
  });
</script>
<!-- JQUERY -->