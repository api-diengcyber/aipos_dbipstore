<?php if ($print!="true") { ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Laporan Persediaan</li>
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
                Laporan Persediaan
                
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
                          <?php if ($print!="true") { ?>
                          <a target="_blank" href="<?php echo base_url() ?>admin/laporan_persediaan?print=true" class="btn btn-inverse">Cetak</a>
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
                    <!-- div.dataTables_borderWrap -->
                    <?php
                    if ($print!="true") {
                      $style1 = 'background-color:#43b733;color:#fff;border-color:#3aae2a!important;';
                      $style1_sub = 'background-color:#57d346;color:#fff;border-color:#3aae2a!important;';
                      $style2 = 'background-color:#cfbe1d;color:#fff;border-color:#c2a738!important;';
                      $style2_sub = 'background-color:#dfcf33;color:#fff;border-color:#c2a738!important;';
                    } else {
                      $style1 = 'background-color:#65da55;color:#000;border-color:#000!important;';
                      $style1_sub = 'background-color:#79f568;color:#000;border-color:#000!important;';
                      $style2 = 'background-color:#efdf4f;color:#000;border-color:#000!important;';
                      $style2_sub = 'background-color:#ffef55;color:#000;border-color:#000!important;';
                    }
                    ?>

                    <div class="table-responsive">
                      <?php if ($print=="true") { ?>
                      <div class="text-center">
                         <h1 style="margin-top:15px;margin-bottom:5px;">Laporan Persediaan</h1>
                         <h4 style="margin-top:0px;">Periode : <?php echo $awal_periode ?> - <?php echo $akhir_periode ?></h4>
                      </div>
                      <?php } ?>
                      <table id="mytable" class="table table-striped table-bordered table-hover">
                       <thead>
                         <tr>
                           <th rowspan="3" width="10">No</th>
                           <th rowspan="3">Kode<br>Barang</th>
                           <th rowspan="3">Nama<br>Barang</th>
                           <th rowspan="3">Satuan</th>
                           <th colspan="4" class="text-center" style="<?php echo $style1 ?>">Qty</th>
                           <th rowspan="3" class="text-center">HPP Netto<br>Per Satuan</th>
                           <th colspan="4" class="text-center" style="<?php echo $style2 ?>">Rupiah</th>
                         </tr>
                         <tr>
                           <th rowspan="2" class="text-center" style="<?php echo $style1 ?>">Saldo<br>Awal</th>
                           <th colspan="2" class="text-center" style="<?php echo $style1 ?>">Mutasi</th>
                           <th rowspan="2" class="text-center" style="<?php echo $style1 ?>">Saldo<br>Akhir</th>
                           <th rowspan="2" class="text-center" style="<?php echo $style2 ?>">Saldo<br>Awal</th>
                           <th colspan="2" class="text-center" style="<?php echo $style2 ?>">Mutasi</th>
                           <th rowspan="2" class="text-center" style="<?php echo $style2 ?>">Saldo<br>Akhir</th>
                         </tr>
                         <tr>
                           <th class="text-center" style="<?php echo $style1 ?>">Tambah</th>
                           <th class="text-center" style="<?php echo $style1 ?>">Kurang</th>
                           <th class="text-center" style="<?php echo $style2 ?>">Tambah</th>
                           <th class="text-center" style="<?php echo $style2 ?>">Kurang</th>
                         </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $total_hpp = 0;
                        $total_qty_awal = 0;
                        $total_qty_tambah = 0;
                        $total_qty_kurang = 0;
                        $total_qty_akhir = 0;
                        $total_rupiah_awal = 0;
                        $total_rupiah_tambah = 0;
                        $total_rupiah_kurang = 0;
                        $total_rupiah_akhir = 0;
                        foreach ($data_produk as $key):
                          $row_pembelian = $this->db->where('id_toko', $id_toko)
                                                    ->where('id_produk', $key->id_produk_2)
                                                    // ->where('DATE(CONCAT(SUBSTRING(tgl_masuk, 7, 4), "-", SUBSTRING(tgl_masuk, 4, 2), "-", SUBSTRING(tgl_masuk, 1, 2))) < "'.$awal_periode.'"') // hpp per bulan
                                                    ->order_by('DATE(CONCAT(SUBSTRING(tgl_masuk,7,4),"-",SUBSTRING(tgl_masuk,4,2),"-",SUBSTRING(tgl_masuk,1,2))) DESC')
                                                    ->order_by('id', 'desc')
                                                    ->get('pembelian')->row();
                          $hpp_satuan = 0;
                          if ($row_pembelian) {
                            $hpp_satuan = $row_pembelian->harga_satuan;
                          }
                          $total_hpp += $hpp_satuan;

                          $data_bl = $method->get_detail($key->id_produk_2, '< "'.$awal_periode.'"');
                          $data = $method->get_detail($key->id_produk_2, 'BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"');
                          $qty_bl_tambah = $data_bl->qty_beli+$data_bl->qty_retur_jual;
                          $qty_bl_kurang = $data_bl->qty_jual+$data_bl->qty_retur_beli;
                          $qty_awal = $qty_bl_tambah-$qty_bl_kurang;
                          $qty_tambah = $data->qty_beli+$data->qty_retur_jual;
                          $qty_kurang = $data->qty_jual+$data->qty_retur_beli;
                          $qty = $qty_tambah-$qty_kurang;
                          $qty_akhir = $qty_awal+$qty;

                          $rupiah_bl_tambah = $data_bl->rupiah_beli+$data_bl->rupiah_retur_beli;
                          $rupiah_bl_kurang = $data_bl->rupiah_jual+$data_bl->rupiah_retur_jual;
                          $rupiah_awal = $rupiah_bl_tambah-$rupiah_bl_kurang;
                          $rupiah_awal = $rupiah_bl_tambah-$rupiah_bl_kurang;
                          $rupiah_tambah = $data->rupiah_beli+$data->rupiah_retur_beli;
                          $rupiah_kurang = $data->rupiah_jual+$data->rupiah_retur_jual;
                          $rupiah = $rupiah_tambah-$rupiah_kurang;
                          $rupiah_akhir = $rupiah_awal+$rupiah;

                          $total_qty_awal += $qty_awal;
                          $total_qty_tambah += $qty_tambah;
                          $total_qty_kurang += $qty_kurang;
                          $total_qty_akhir += $qty_akhir;
                          $total_rupiah_awal += $rupiah_awal;
                          $total_rupiah_tambah += $rupiah_tambah;
                          $total_rupiah_kurang += $rupiah_kurang;
                          $total_rupiah_akhir += $rupiah_akhir;
                          if ($qty_tambah > 0 || $qty_kurang > 0) {
                        ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $key->id_produk_2 ?></td>
                            <td><?php echo $key->nama_produk ?></td>
                            <td><?php echo $key->nama_satuan ?></td>
                            <td class="text-right" style="<?php echo $style1_sub ?>"><?php echo number_format($qty_awal,0,',','.') ?></td>
                            <td class="text-right" style="<?php echo $style1_sub ?>"><?php echo number_format($qty_tambah,0,',','.') ?></td>
                            <td class="text-right" style="<?php echo $style1_sub ?>"><?php echo number_format($qty_kurang,0,',','.') ?></td>
                            <td class="text-right" style="<?php echo $style1_sub ?>"><?php echo number_format($qty_akhir,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($hpp_satuan,0,',','.') ?></td>
                            <td class="text-right" style="<?php echo $style2_sub ?>"><?php echo number_format($rupiah_awal,0,',','.') ?></td>
                            <td class="text-right" style="<?php echo $style2_sub ?>"><?php echo number_format($rupiah_tambah,0,',','.') ?></td>
                            <td class="text-right" style="<?php echo $style2_sub ?>"><?php echo number_format($rupiah_kurang,0,',','.') ?></td>
                            <td class="text-right" style="<?php echo $style2_sub ?>"><?php echo number_format($rupiah_akhir,0,',','.') ?></td>
                          </tr>
                        <?php
                          $no++;
                          } 
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="4" class="text-center">TOTAL</th>
                            <th class="text-right"><?php echo number_format($total_qty_awal,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_qty_tambah,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_qty_kurang,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_qty_akhir,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_hpp,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_rupiah_awal,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_rupiah_tambah,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_rupiah_kurang,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_rupiah_akhir,0,',','.') ?></th>
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
          $("#formPeriode").submit();
      })
      .prev().on(ace.click_event, function(){
          $(this).next().focus();
      });
  });
</script>
<!-- JQUERY -->

<?php } ?>