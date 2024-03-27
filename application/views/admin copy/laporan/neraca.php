
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
                
                    <form method="post" id="formPeriode" class="form-horizontal" action="<?php echo base_url() ?>admin/laporan_retail/neraca">
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
                        $saldo_piutang = 0;
                        $saldo_activa = 0;
                        $saldo_activa_tetap = 0;
                        $saldo_1 = 0; $saldo_2 = 0;
                        foreach ($data_activa->result() as $key_activa):
                          $saldo = 0;
                          $current_id_akun = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if ($key_saldo->id_akun == $key_activa->id) {
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
                          if ($saldo != 0) {
                            $border = 1;
                            $tampil_saldo = number_format($saldo,0,',','.');
                          } else {
                            $tampil_saldo = "";
                          }
                          if ($saldo < 0) {
                             $tampil_saldo = $saldo*-1;
                             $tampil_saldo = "(".number_format($tampil_saldo,0,',','.').")";
                          }
                          $saldo_activa += $saldo;
                          $saldo_1 += $saldo;
                          $ml = 0;
                          if (strlen($key_activa->kode) > 11) {
                            $ml = 80;
                          } else if (strlen($key_activa->kode) > 9) {
                            $ml = 60;
                          } else if (strlen($key_activa->kode) > 5) {
                            $ml = 40;
                          } else if (strlen($key_activa->kode) > 3) {
                            $ml = 20;
                          }
                          if (strlen($key_activa->kode) > 7 && substr($key_activa->kode,0,7) == "1.01.02") {
                              $saldo_piutang += $saldo;
                          }
                          if (strlen($key_activa->kode)==7 && substr($key_activa->kode,0,7) == "1.01.02") {
                            $tampil_saldo = '<b><span class="piutang_saldo">0</span></b>';
                          }
                          if (strlen($key_activa->kode)==7 && substr($key_activa->kode,0,7) == "1.01.03") {
                            $border = 1;
                            $tampil_saldo = '<b><span class="kas_saldo">0</span></b>';
                          }
                          if (substr($key_activa->kode,0,7) == "1.01.03") {
                            $saldo_2 += $saldo;
                          }
                          if (substr($key_activa->kode,0,4) == "1.02") {
                            $saldo_activa_tetap += $saldo;
                          }
                          if (strlen($key_activa->kode)==4 && substr($key_activa->kode,0,4) == "1.02") {
                            $tampil_saldo = '<b><span class="activa_tetap">0</span></b>';
                          }
                        ?>
                        <div style="padding:2px;border-bottom:<?php echo $border ?>px dotted #999;margin-left:<?php echo $ml ?>px">
                          <span><?php echo $key_activa->kode ?></span>
                          <span><b><?php echo $key_activa->akun ?></b></span>
                          <span style="float:right;"><?php echo $tampil_saldo ?></span></span>
                        </div>
                        <?php endforeach; ?>
                      </div>
                      <div class="col-xs-6">
                        <?php 
                        $saldo_pasiva = 0;
                        $saldo_hutang = 0;
                        foreach ($data_pasiva->result() as $key_pasiva):
                          $saldo = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if ($key_saldo->id_akun == $key_pasiva->id) {
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
                          if ($saldo < 0) {
                            $tampil_saldo = $saldo*-1;
                            $tampil_saldo = "(".number_format($tampil_saldo,0,',','.').")";
                          }
                          $saldo_pasiva += $saldo;
                          $ml = 0;
                          if (strlen($key_pasiva->kode) > 11) {
                            $ml = 80;
                          } else if (strlen($key_pasiva->kode) > 9) {
                            $ml = 60;
                          } else if (strlen($key_pasiva->kode) > 5) {
                            $ml = 40;
                          } else if (strlen($key_pasiva->kode) > 3) {
                            $ml = 20;
                          }
                          if (substr($key_pasiva->kode,0,4) == "2.01") {
                            $saldo_hutang += $saldo;
                          }
                            /* if (strlen($key_pasiva->kode)==1 && substr($key_pasiva->kode,0,1) == "2") {
                            $tampil_saldo = '<b><span class="pasiva">0</span></b>';
                          } */
                        ?>
                        <div style="padding:2px;border-bottom:<?php echo $border ?>px dotted #999;margin-left: <?php echo $ml ?>px">
                          <span><?php echo $key_pasiva->kode ?></span>
                          <span><b><?php echo $key_pasiva->akun ?></b></span>
                          <span style="float:right;"><?php echo $tampil_saldo ?></span></span>
                        </div>
                        <?php if ($key_pasiva->kode == "2.01.06") { ?>
                        <div style="padding:2px;border-top:1px solid #999;margin-left: 40px">
                          <span><b>Total Hutang</b></span>
                          <span style="float:right;font-weight:bold;" class="saldo_hutang">0</span></span>
                        </div>
                        <?php } ?>
                        <?php endforeach; ?>
                        <?php
                        $saldo_pendapatan = 0;
                        foreach ($data_pendapatan->result() as $key_pendapatan):
                          $saldo = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if ($key_saldo->id_akun == $key_pendapatan->id) {
                              $saldo = $key_saldo->saldo * -1;
                            }
                          }
                          $saldo_pendapatan += $saldo;
                        endforeach;
                        $saldo_beban = 0;
                        foreach ($data_biaya->result() as $key_biaya):
                          $saldo = 0;
                          foreach ($data_saldo->result() as $key_saldo) {
                            if ($key_saldo->id_akun == $key_biaya->id) {
                              $saldo = $key_saldo->saldo;
                            }
                          }
                          $saldo_beban += $saldo;
                        endforeach;

                        $saldo_labarugi = 0;
                        foreach ($data_saldo->result() as $key_saldo) {
                          if ($key_saldo->id_akun == 14) { // laba rugi
                            $saldo_labarugi += $key_saldo->saldo;
                          }
                        }
                        
                        $labarugi = $saldo_pendapatan - $saldo_beban - $saldo_labarugi;
                        $t_labarugi = number_format($labarugi,0,',','.');
                        if ($labarugi < 0) {
                          $t_labarugi = $labarugi*-1;
                          $t_labarugi = "(".number_format($t_labarugi,0,',','.').")";
                        }
                        ?>
                          <div style="padding:2px;border-bottom:1px dotted #999;margin-left: 20px">
                            <span>2.05</span>
                            <span><b>Laba / Rugi</b></span>
                            <span style="float:right;"><?php echo $t_labarugi ?></span></span>
                          </div>
                      </div>
                    </div>

                    <div class="hr hr1"></div>
                    <?php
                    $t_sa = number_format($saldo_activa,0,',','.');
                    if ($saldo_activa < 0) {
                        $t_sa = "(".number_format($saldo_activa*-1,0,',','.').")";
                    }
                    $spl = $saldo_pasiva + $labarugi;
                    $t_spl = number_format($spl,0,',','.');
                    if ($spl < 0) {
                        $t_spl = "(".number_format($spl*-1,0,',','.').")";
                    }
                    ?>
                    <div class="row">
                      <div class="col-xs-6">
                        <b>Rp <span style="float:right;"><?php echo $t_sa ?></b></span>
                      </div>
                      <div class="col-xs-6">
                        <b>Rp <span style="float:right;"><?php echo $t_spl ?></b></span>
                      </div>
                    </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<?php
$sp = number_format($saldo_piutang,0,',','.');
if ($saldo_piutang < 0) {
  $sp = "(".number_format($saldo_piutang*-1,0,',','.').")";
}
$sk = number_format($saldo_2,0,',','.');
if ($saldo_k=2 < 0) {
  $sk = "(".number_format($saldo_2*-1,0,',','.').")";
}
$at = number_format($saldo_activa_tetap,0,',','.');
if ($saldo_activa_tetap=2 < 0) {
  $at = "(".number_format($saldo_activa_tetap*-1,0,',','.').")";
}
$spas = number_format($saldo_pasiva,0,',','.');
if ($saldo_pasiva=2 < 0) {
  $spas = "(".number_format($saldo_pasiva*-1,0,',','.').")";
}
$shut = number_format($saldo_hutang,0,',','.');
if ($saldo_hutang=2 < 0) {
  $shut = "(".number_format($saldo_hutang*-1,0,',','.').")";
}
?>
<!-- JQUERY -->
<script type="text/javascript">
  jQuery(function($) {
      
    $(".piutang_saldo").html("<?php echo $sp ?>");
    $(".kas_saldo").html("<?php echo $sk ?>");
    $(".activa_tetap").html("<?php echo $at ?>");
    // $(".pasiva").html("<?php echo $spas ?>");
    $(".saldo_hutang").html("<?php echo $shut ?>");
    
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