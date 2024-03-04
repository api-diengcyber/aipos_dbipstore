<?php 
$nama_area = "";
foreach ($data_kota as $key):
  if ($id_kota==$key->id) {
    $nama_area = $key->nama_kota;
  }
endforeach;
if ($print!="true") { ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Laporan Piutang Rekap</li>
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
                Laporan Piutang Rekap
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                
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
                          <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Area</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="id_kota" id="id_kota">
                                <option value="">-- Pilih Kota --</option>
                                <?php
                                $nama_area = "";
                                foreach ($data_kota as $key):
                                  if ($id_kota==$key->id) {
                                    $nama_area = $key->nama_kota;
                                  }
                                ?>
                                <option value="<?php echo $key->id ?>" <?php echo $id_kota==$key->id?"selected":"" ?>><?php echo $key->nama_kota ?></option>
                              <?php endforeach ?>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-primary">Proses</button>
                          <?php if ($print!="true") { ?>
                          <a target="_blank" href="<?php echo base_url() ?>outlet/laporan_piutang/rekap_area?print=true" class="btn btn-inverse">Cetak</a>
                          <?php } ?>
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
                    <?php
                    $res_member_from_piutang = $this->db->select('p.id_pembeli, p.tanggal, m.kode, m.nama, m.alamat, m.telp')
                                                        ->from('piutang p')
                                                        ->join('member m', 'p.id_pembeli=m.id_member AND p.id_toko=m.id_toko')
                                                        ->where('p.id_toko', $id_toko)
                                                        ->where('DATE(CONCAT(SUBSTRING(p.tanggal,7,4),"-",SUBSTRING(p.tanggal,4,2),"-",SUBSTRING(p.tanggal,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                                        ->where('m.id_kota', $id_kota)
                                                        // ->where('p.jumlah_bayar > 0') // test
                                                        ->group_by('p.id_pembeli')
                                                        ->order_by('m.nama', 'asc')
                                                        ->order_by('p.id_pembeli', 'asc')
                                                        ->get()->result();
                    ?>
                    <!-- div.dataTables_borderWrap -->

                    <div class="table-responsive">
                      <?php if ($print=="true") { ?>
                      <div class="text-center">
                         <h1 style="margin-top:15px;margin-bottom:5px;">Laporan Piutang Rekap per Area</h1>
                         <h4 style="margin-top:10px;margin-bottom:5px;">Periode : <?php echo $awal_periode ?> - <?php echo $akhir_periode ?></h4>
                         <h4 style="margin-top:0px;">Area : <?php echo $nama_area ?></h4>
                      </div>
                      <?php } ?>
                      <table id="mytable" class="table table-striped table-bordered table-hover">
                        <thead>
                         <tr>
                          <th rowspan="2" width="10">No</th>
                          <th rowspan="2">Kode Member</th>
                          <th rowspan="2">Nama Member</th>
                          <th rowspan="2" class="text-center">Saldo Awal</th>
                          <th colspan="2" class="text-center">Mutasi</th>
                          <th rowspan="2" class="text-center">Saldo Akhir</th>
                         </tr>
                         <tr>
                           <th class="text-center">Penambahan Piutang</th>
                           <th class="text-center">Pembayaran Piutang</th>
                         </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $total_saldo_awal = 0;
                        $total_piutang = 0;
                        $total_bayar = 0;
                        $total_saldo_akhir = 0;
                        foreach ($res_member_from_piutang as $key_m):
                          $row_bl_bayar = $this->db->select('SUM(pb.bayar) AS jml_bayar')
                                                ->from('piutang_bayar pb')
                                                ->join('piutang p', 'p.id_piutang=pb.id_piutang AND p.id_toko=pb.id_toko')
                                                ->where('pb.id_toko', $id_toko)
                                                ->where('p.id_pembeli', $key_m->id_pembeli)
                                                ->where('DATE(CONCAT(SUBSTRING(pb.tgl,7,4),"-",SUBSTRING(pb.tgl,4,2),"-",SUBSTRING(pb.tgl,1,2))) < "'.$awal_periode.'"')
                                                ->get()->row();
                          $row_bl_piutang = $this->db->select('SUM(p.jumlah_hutang) AS jml_piutang')
                                                  ->from('piutang p')
                                                  ->where('p.id_toko', $id_toko)
                                                  ->where('p.id_pembeli', $key_m->id_pembeli)
                                                  ->where('DATE(CONCAT(SUBSTRING(p.tanggal,7,4),"-",SUBSTRING(p.tanggal,4,2),"-",SUBSTRING(p.tanggal,1,2))) < "'.$awal_periode.'"')
                                                  ->get()->row();
                          $jml_bl_piutang = 0;
                          $jml_bl_bayar = 0;
                          if ($row_bl_piutang) {
                            $jml_bl_piutang = $row_bl_piutang->jml_piutang;
                          }
                          if ($row_bl_bayar) {
                            $jml_bl_bayar = $row_bl_bayar->jml_bayar;
                          }
                          $saldo_awal = $jml_bl_piutang-$jml_bl_bayar;
                          $row_bayar = $this->db->select('SUM(pb.bayar) AS jml_bayar')
                                                ->from('piutang_bayar pb')
                                                ->join('piutang p', 'p.id_piutang=pb.id_piutang AND p.id_toko=pb.id_toko')
                                                ->where('pb.id_toko', $id_toko)
                                                ->where('p.id_pembeli', $key_m->id_pembeli)
                                                ->where('DATE(CONCAT(SUBSTRING(pb.tgl,7,4),"-",SUBSTRING(pb.tgl,4,2),"-",SUBSTRING(pb.tgl,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                                ->get()->row();
                          $row_piutang = $this->db->select('SUM(p.jumlah_hutang) AS jml_piutang')
                                                  ->from('piutang p')
                                                  ->where('p.id_toko', $id_toko)
                                                  ->where('p.id_pembeli', $key_m->id_pembeli)
                                                  ->where('DATE(CONCAT(SUBSTRING(p.tanggal,7,4),"-",SUBSTRING(p.tanggal,4,2),"-",SUBSTRING(p.tanggal,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                                  ->get()->row();
                          $jml_piutang = 0;
                          $jml_bayar = 0;
                          if ($row_piutang) {
                            $jml_piutang = $row_piutang->jml_piutang;
                          }
                          if ($row_bayar) {
                            $jml_bayar = $row_bayar->jml_bayar;
                          }
                          $saldo_akhir = $saldo_awal+($jml_piutang-$jml_bayar);
                          $total_saldo_awal += $saldo_awal;
                          $total_piutang += $jml_piutang;
                          $total_bayar += $jml_bayar;
                          $total_saldo_akhir += $saldo_akhir;
                        ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $key_m->kode ?></td>
                            <td><?php echo $key_m->nama ?></td>
                            <td class="text-right"><?php echo number_format($saldo_awal,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($jml_piutang,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($jml_bayar,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($saldo_akhir,0,',','.') ?></td>
                          </tr>
                        <?php
                          $no++;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="3" class="text-center">TOTAL</th>
                            <th class="text-right"><?php echo number_format($total_saldo_awal,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_piutang,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_bayar,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_saldo_akhir,0,',','.') ?></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <?php if ($print!="true") { ?>


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
  });
</script>
<!-- JQUERY -->

<?php } ?>