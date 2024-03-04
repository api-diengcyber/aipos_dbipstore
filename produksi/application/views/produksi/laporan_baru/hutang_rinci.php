<?php if ($print!="true") { ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Rinci Laporan Hutang</li>
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
                Rinci Laporan Hutang
                
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
                          <button type="submit" class="btn btn-primary">Proses</button>
                          <?php if ($print!="true") { ?>
                          <a target="_blank" href="<?php echo base_url() ?>produksi/laporan_hutang/rekap?print=true" class="btn btn-inverse">Cetak</a>
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
                    $res_group = $this->db->select('SUM(j.debet) AS jml_debet, SUM(j.kredit) AS jml_kredit, a.akun, s.id_supplier, s.nama_supplier, fr.no_faktur, fr.tgl, h.deadline')
                                      ->from('(SELECT j.*, u.id_cabang FROM jurnal j JOIN users u ON j.id_users=u.id_users AND j.id_toko=u.id_toko) AS j')
                                      ->join('faktur_retail fr', 'j.id_proses=fr.id_faktur AND j.id_users=fr.id_users AND j.id_toko=fr.id_toko')
                                      ->join('hutang h', 'j.id_hutang=h.id AND j.id_users=h.id_users AND j.id_toko=h.id_toko')
                                      ->join('akun a', 'j.id_akun=a.id')
                                      ->join('supplier s', 'a.uid=s.id_supplier AND s.id_users=j.id_users AND s.id_toko=j.id_toko')
                                      ->where('j.id_toko', $id_toko)
                                      ->where('j.id_cabang', $id_cabang)
                                      ->where('SUBSTRING(a.kode, 1, 4) = ', '2.01')
                                      ->where('a.parent', 'supplier')
                                      ->where('DATE(CONCAT(SUBSTRING(j.tgl, 7, 4), "-", SUBSTRING(j.tgl, 4, 2), "-", SUBSTRING(j.tgl, 1, 2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                      ->group_by('s.id_supplier')
                                      ->get()->result();
                    ?>
                    <!-- div.dataTables_borderWrap -->

                    <div class="table-responsive">
                      <?php if ($print=="true") { ?>
                      <div class="text-center">
                         <h1 style="margin-top:15px;margin-bottom:5px;">Rinci Laporan Hutang</h1>
                         <h4 style="margin-top:0px;">Periode : <?php echo $awal_periode ?> - <?php echo $akhir_periode ?></h4>
                      </div>
                      <?php } ?>
                      <table id="mytable" class="table table-striped table-bordered table-hover">
                        <thead>
                         <tr>
                           <th width="10">No</th>
                           <th>Kode<br>Supplier</th>
                           <th>Nama<br>Supplier</th>
                           <th>Tgl<br>Faktur</th>
                           <th>No<br>Faktur</th>
                           <th>Jumlah</th>
                           <th>Tgl<br>Jatuh Tempo</th>
                           <th>Tgl<br>Bayar</th>
                           <th>No<br>Bukti Bayar</th>
                           <th>Jumlah<br>Bayar</th>
                           <th>Saldo<br>Hutang</th>
                         </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $total_jumlah = 0;
                        $total_bayar = 0;
                        $total_hutang = 0;
                        foreach ($res_group as $key_group):
                          $show_number = true;
                          $res = $this->db->select('SUM(j.debet) AS jml_debet, SUM(j.kredit) AS jml_kredit, a.akun, s.id_supplier, s.nama_supplier, fr.no_faktur, fr.tgl, h.deadline, h.id AS id_hutang, h.hutang, h.kurang, IF(hb.bayar IS NOT NULL, SUM(hb.bayar), h.bayar) AS total_bayar')
                                          ->from('jurnal j')
                                          ->join('faktur_retail fr', 'j.id_proses=fr.id_faktur AND j.id_toko=fr.id_toko')
                                          ->join('hutang h', 'j.id_hutang=h.id AND j.id_toko=h.id_toko')
                                          ->join('hutang_bayar hb', 'h.id=hb.id_hutang AND h.id_toko=hb.id_toko', 'left')
                                          ->join('akun a', 'j.id_akun=a.id')
                                          ->join('supplier s', 'a.uid=s.id_supplier AND s.id_toko=j.id_toko')
                                          ->where('j.id_toko', $id_toko)
                                          ->where('SUBSTRING(a.kode, 1, 4) = ', '2.01')
                                          ->where('a.parent', 'supplier')
                                          ->where('DATE(CONCAT(SUBSTRING(j.tgl, 7, 4), "-", SUBSTRING(j.tgl, 4, 2), "-", SUBSTRING(j.tgl, 1, 2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                          ->where('s.id_supplier', $key_group->id_supplier)
                                          ->group_by('fr.id_faktur')
                                          ->get()->result();
                          $sub_jumlah = 0;
                          $sub_bayar = 0;
                          $sub_hutang = 0;
                          foreach ($res as $key):
                            $row_last_bayar = $this->db->where('id_toko', $id_toko)->where('id_hutang', $key->id_hutang)->order_by('DATE(CONCAT(SUBSTRING(tgl_bayar,7,4),"-",SUBSTRING(tgl_bayar,4,2),"-",SUBSTRING(tgl_bayar,1,2))) DESC')->order_by('id', 'desc')->get('hutang_bayar')->row();
                            $id_bayar = "";
                            $tgl_bayar = "";
                            $bayar = 0;
                            // $sisa = 0;
                            if ($row_last_bayar) {
                              $id_bayar = $row_last_bayar->id;
                              $tgl_bayar = $row_last_bayar->tgl_bayar;
                              $bayar = $row_last_bayar->bayar;
                              // $sisa = $row_last_bayar->sisa;
                            }
                            $sub_jumlah += $key->hutang;
                            $sub_bayar += $key->total_bayar;
                            $sub_hutang += $key->kurang;
                        ?>
                          <tr>
                            <td><?php echo $show_number?$no:""; ?></td>
                            <td><?php echo $key->id_supplier ?></td>
                            <td><?php echo $key->nama_supplier ?></td>
                            <td><?php echo $key->tgl ?></td>
                            <td><?php echo $key->no_faktur ?></td>
                            <td class="text-right"><?php echo number_format($key->hutang,0,',','.') ?></td>
                            <td><?php echo $key->deadline ?></td>
                            <td><?php echo $tgl_bayar ?></td>
                            <td><?php echo $id_bayar ?></td>
                            <td class="text-right"><?php echo number_format($key->total_bayar,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($key->kurang,0,',','.') ?></td>
                          </tr>
                        <?php 
                          $show_number = false;
                          endforeach;
                          $total_jumlah += $sub_jumlah;
                          $total_bayar += $sub_bayar;
                          $total_hutang += $sub_hutang;
                        ?>
                          <tr>
                            <th colspan="5" class="text-center">TOTAL <?php echo $key->nama_supplier ?></th>
                            <th class="text-right"><?php echo number_format($sub_jumlah,0,',','.') ?></th>
                            <th colspan="3"></th>
                            <th class="text-right"><?php echo number_format($sub_bayar,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($sub_hutang,0,',','.') ?></th>
                          </tr>
                        <?php 
                          $no++;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr style="background-color: yellow;">
                            <th colspan="5" class="text-center">GRAND TOTAL</th>
                            <th class="text-right"><?php echo number_format($total_jumlah,0,',','.') ?></th>
                            <th colspan="3"></th>
                            <th class="text-right"><?php echo number_format($total_bayar,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_hutang,0,',','.') ?></th>
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