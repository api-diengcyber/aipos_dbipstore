<?php if ($print!=true) { ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li>Jurnal</li>
              <li class="active">Jurnal</li>
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
                Jurnal
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php
                if (!empty($this->session->userdata('message'))) {
                  echo '<div style="margin-top:10px;margin-bottom:10px;width:100%;text-align:center;">'.$this->session->userdata('message').'</div>';
                }
                ?>
                
                    <form method="post" id="formPeriode" class="form-horizontal" action="">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Periode</label>
                            <div class="col-sm-9">
                              <div class="pos-rel">
                                  <input type="hidden" id="awal_periode" name="awal_periode" value="<?php echo $awal_periode ?>">
                                  <input type="hidden" id="akhir_periode" name="akhir_periode" value="<?php echo $akhir_periode ?>">
                                  <input class="form-control" type="text" name="periode" id="id-date-range-picker-1" value="0" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button type="submit" name="submit" value="1" class="btn btn-primary">Proses</button>
                          <button type="submit" name="submit" value="2" class="btn btn-default">Cetak</button>
                        </div>
                      </div>
                    </form>

                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                    </div>

                    <?php } else { ?>
                    <style>
                    #mytable {
                      border-collapse: collapse;
                    }
                    #mytable tr th {
                      border: 1px solid #333;
                      padding: 2px;
                    }
                    #mytable tr td {
                      border: 1px solid #333;
                      padding: 2px;
                    }
                    .text-right {
                      text-align: right;
                    }
                    .text-left {
                      text-align: left;
                    }
                    .text-center {
                      text-align: center;
                    }
                    table {
                      width: 100%;
                    }
                    thead {
                      display: table-header-group;
                    }
                    #headone {
                      display: table-row-group;
                    }
                    tfoot {
                      display: table-row-group;
                    }
                    </style>
                    <script>window.print()</script>
                    <?php } ?>

                    <!-- div.table-responsive -->
                    <!-- div.dataTables_borderWrap -->
                    <div class="table-responsive">
                      <?php if ($print=="true") { ?>
                      <div class="text-center">
                         <h1 style="margin-top:15px;margin-bottom:5px;">Laporan Jurnal</h1>
                         <h4 style="margin-top:10px;margin-bottom:5px;">Periode : <?php echo $awal_periode ?> - <?php echo $akhir_periode ?></h4>
                      </div>
                      <?php } ?>
                      <table id="mytable" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th rowspan="2" width="10">No</th>
                            <th rowspan="2" width="100" class="text-center">Tanggal</th>
                            <th rowspan="2" width="110">Kode</th>
                            <th rowspan="2" width="190">Akun</th>
                            <th rowspan="2" width="200">Keterangan</th>
                            <th colspan="2" class="text-center">Nominal</th>
                            <?php if ($print!=true) { ?>
                            <th rowspan="2" width="10"></th>
                            <?php } ?>
                          </tr>
                          <tr>
                            <th width="120" class="text-center">Debet</th>
                            <th width="120" class="text-center">Kredit</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $total_debet = 0;
                        $total_kredit = 0;
                        $last_kode = '';
                        foreach ($data_jurnal as $key):
                          $show_kode = $key->kode==$last_kode?false:true;
                          $row = $this->db->select('j.*, COUNT(j.id) AS jml')
                                          ->from('jurnal j')
                                          ->join('akun a', 'j.id_akun=a.id')
                                          ->where('j.id_toko', $id_toko)
                                          ->where('DATE(CONCAT(SUBSTRING(j.tgl,7,4),"-",SUBSTRING(j.tgl,4,2),"-",SUBSTRING(j.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                          ->where('j.kode', $key->kode)
                                          ->get()->row();
                          $jml_sub = 0;
                          if ($row) {
                            $jml_sub = $row->jml;
                          }
                        ?>
                          <tr>
                            <?php if ($show_kode) { ?><td rowspan="<?php echo $jml_sub ?>"><?php echo $no ?></td><?php } ?>
                            <?php if ($show_kode) { ?><td rowspan="<?php echo $jml_sub ?>" class="text-center"><?php echo $key->tgl ?></td><?php } ?>
                            <?php if ($show_kode) { ?><td rowspan="<?php echo $jml_sub ?>"><?php echo $key->kode ?></td><?php } ?>
                            <td><?php echo $key->akun ?></td>
                            <?php if ($show_kode) { ?><td rowspan="<?php echo $jml_sub ?>"><?php echo $key->keterangan ?></td><?php } ?>
                            <td class="text-right"><?php echo number_format($key->debet,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($key->kredit,0,',','.') ?></td>
                            <?php if ($print!=true) { ?>
                            <td class="text-center"><a onclick="return confirm('Are you sure ? ')" href="<?php echo base_url() ?>admin/jurnal/delete/<?php echo $key->id ?>" class="btn btn-danger btn-xs"><i class="ace-icon fa fa-trash"></i></a></td>
                            <?php } ?>
                          </tr>
                        <?php 
                          if ($show_kode) {
                            $no++;
                          }
                          $total_debet += $key->debet;
                          $total_kredit += $key->kredit;
                          $last_kode = $key->kode;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="5" class="text-center">TOTAL</th>
                            <th class="text-right"><?php echo number_format($total_debet,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_kredit,0,',','.') ?></th>
                            <?php if ($print!=true) { ?>
                            <th></th>
                            <?php } ?>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <?php if ($print!=true) { ?>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<!-- JQUERY -->
<script>
<?php
$exawal = explode("-", $awal_periode);
$s_awal_periode = $exawal[2].'-'.$exawal[1].'-'.$exawal[0];
$exakhir = explode("-", $akhir_periode);
$s_akhir_periode = $exakhir[2].'-'.$exakhir[1].'-'.$exakhir[0];
?>
jQuery(function($){
  $('input[id=id-date-range-picker-1]').daterangepicker({
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

  $('button[type="submit"]').on("click", function(){
    var val = $(this).val()*1;
    if (val==2) {
      $("#formPeriode").attr("target", "_blank");
    } else {
      $("#formPeriode").removeAttr("target");
    }
  });
});
</script>
<!-- JQUERY -->

<?php } ?>