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
              <li class="active">Laporan Penjualan Rekap per Area</li>
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
                Laporan Penjualan Rekap per Area
                
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
                          <a target="_blank" href="<?php echo base_url() ?>produksi/laporan_penjualan/rekap_per_area?print=true" class="btn btn-inverse">Cetak</a>
                          <?php } ?>
                        </div>
                      </div>
                    </form>

                    <div class="clearfix">
                      <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="table-header">
                    </div>

                    <!-- div.table-responsive -->
                    <!-- div.dataTables_borderWrap -->
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

                    <div class="table-responsive">
                      <?php if ($print=="true") { ?>
                      <div class="text-center">
                         <h1 style="margin-top:15px;margin-bottom:5px;">Laporan Penjualan Rekap per Area</h1>
                         <h4 style="margin-top:10px;margin-bottom:5px;">Periode : <?php echo $awal_periode ?> - <?php echo $akhir_periode ?></h4>
                         <h4 style="margin-top:0px;">Area : <?php echo $nama_area ?></h4>
                      </div>
                      <?php } ?>
                      <table id="mytable" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th>Sales</th>
                            <th>Nama<br>Debitur</th>
                            <th>No<br>Faktur</th>
                            <th>Total</th>
                            <th>HPP Netto</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $total_qty = 0;
                        $total_harga_satuan = 0;
                        $total_jumlah = 0;
                        $total_diskon = 0;
                        $total_ppn = 0;
                        $total_total = 0;
                        $total_hpp = 0;
                        $total_margin = 0;
                        foreach ($data_sales_from_orders as $key_s):
                          $res_member_from_orders = $this->db->select('o.pembeli, o.bukan_member, m.nama, m.alamat, m.telp')
                                                             ->from('orders o')
                                                             ->join('member m', 'o.pembeli=m.id_member AND o.id_toko=m.id_toko', 'left')
                                                             ->where('o.id_toko', $id_toko)
                                                             ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                                             ->where('o.id_sales', $key_s->id_sales)
                                                             ->where('m.id_kota', $id_kota)
                                                             ->group_by('o.pembeli')
                                                             ->order_by('m.nama')
                                                             ->order_by('o.pembeli')
                                                             ->get()->result();
                          $show_sales = true;
                          $sub_s_qty = 0;
                          $sub_s_harga_satuan = 0;
                          $sub_s_jumlah = 0;
                          $sub_s_diskon = 0;
                          $sub_s_ppn = 0;
                          $sub_s_total = 0;
                          $sub_s_hpp = 0;
                          $sub_s_margin = 0;
                          foreach ($res_member_from_orders as $key_m):
                            $res_orders = $this->db->select('o.*')
                                                               ->from('orders o')
                                                               ->where('o.id_toko', $id_toko)
                                                               ->where('DATE(CONCAT(SUBSTRING(o.tgl_order,7,4),"-",SUBSTRING(o.tgl_order,4,2),"-",SUBSTRING(o.tgl_order,1,2))) BETWEEN "'.$awal_periode.'" AND "'.$akhir_periode.'"')
                                                               ->where('o.pembeli', $key_m->pembeli)
                                                               ->get()->result();
                            $show_pembeli = true;
                            $sub_m_qty = 0;
                            $sub_m_harga_satuan = 0;
                            $sub_m_jumlah = 0;
                            $sub_m_diskon = 0;
                            $sub_m_ppn = 0;
                            $sub_m_total = 0;
                            $sub_m_hpp = 0;
                            $sub_m_margin = 0;
                            foreach ($res_orders as $key):
                              $res_orders_detail = $this->db->select('od.*, pr.nama_produk, sp.satuan')
                                                            ->from('orders_detail od')
                                                            ->join('produk_retail pr', 'od.id_produk=pr.id_produk_2 AND od.id_toko=pr.id_toko')
                                                            ->join('satuan_produk sp', 'pr.satuan=sp.id_satuan AND pr.id_toko=sp.id_toko')
                                                            ->where('od.id_toko', $id_toko)
                                                            ->where('od.id_orders_2', $key->id_orders_2)
                                                            ->get()->result();
                              $show_faktur = true;
                              $sub_od_qty = 0;
                              $sub_od_harga_satuan = 0;
                              $sub_od_jumlah = 0;
                              $sub_od_diskon = 0;
                              $sub_od_ppn = 0;
                              $sub_od_total = 0;
                              $sub_od_hpp = 0;
                              $sub_od_margin = 0;
                              foreach ($res_orders_detail as $key_od):
                                $jumlah = $key_od->jumlah*$key_od->harga_jual;
                                $diskon_nominal = $jumlah-$key_od->subtotal;
                                $ppn_nominal = (10/100)*$key_od->subtotal;
                                $total = $key_od->subtotal+$ppn_nominal;
                                $hpp_netto = $key_od->harga_satuan*$key_od->jumlah;
                                $margin = ($total-$hpp_netto)/$hpp_netto*100;

                                $sub_od_qty += $key_od->jumlah;
                                $sub_od_harga_satuan += $key_od->harga_jual;
                                $sub_od_jumlah += $jumlah;
                                $sub_od_diskon += $diskon_nominal;
                                $sub_od_ppn += $ppn_nominal;
                                $sub_od_total += $key_od->subtotal+$ppn_nominal;
                                $sub_od_hpp += $hpp_netto;
                                $sub_od_margin += $margin;
                              endforeach;
                        ?>
                          <tr>
                            <td><?php echo $show_sales?$no:"" ?></td>
                            <td><?php echo $show_sales?($key_s->first_name." ".$key_s->last_name):"" ?></td>
                            <td><?php echo $show_pembeli?$key_m->nama:"" ?></td>
                            <td><?php echo $show_faktur?$key->no_faktur:"" ?></td>
                            <th class="text-right"><?php echo number_format($sub_od_total,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($sub_od_hpp,0,',','.') ?></th>
                          </tr>
                        <?php
                              $sub_m_qty += $sub_od_qty;
                              $sub_m_harga_satuan += $sub_od_harga_satuan;
                              $sub_m_jumlah += $sub_od_jumlah;
                              $sub_m_diskon += $sub_od_diskon;
                              $sub_m_ppn += $sub_od_ppn;
                              $sub_m_total += $sub_od_total;
                              $sub_m_hpp += $sub_od_hpp;
                              $sub_m_margin += $sub_od_margin;
                              $show_sales = false;
                              $show_pembeli = false;
                            endforeach;
                            if (count($res_orders) > 1) {
                        ?>
                          <tr>
                            <th colspan="2"></th>
                            <th colspan="2" class="text-left">SUBTOTAL <?php echo $key_m->nama ?></th>
                            <th class="text-right"><?php echo number_format($sub_m_total,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($sub_m_hpp,0,',','.') ?></th>
                          </tr>
                        <?php
                            }
                            $sub_s_qty += $sub_m_qty;
                            $sub_s_harga_satuan += $sub_m_harga_satuan;
                            $sub_s_jumlah += $sub_m_jumlah;
                            $sub_s_diskon += $sub_m_diskon;
                            $sub_s_ppn += $sub_m_ppn;
                            $sub_s_total += $sub_m_total;
                            $sub_s_hpp += $sub_m_hpp;
                            $sub_s_margin += $sub_m_margin;
                            $show_sales = false;
                          endforeach;
                        ?>
                          <tr style="background-color: #5eff5e;">
                            <th></th>
                            <th colspan="3" class="text-left">SUBTOTAL <?php echo $key_s->first_name." ".$key_s->last_name ?></th>
                            <th class="text-right"><?php echo number_format($sub_s_total,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($sub_s_hpp,0,',','.') ?></th>
                          </tr>
                        <?php 
                          $no++;
                          $total_qty += $sub_s_qty;
                          $total_harga_satuan += $sub_s_harga_satuan;
                          $total_jumlah += $sub_s_jumlah;
                          $total_diskon += $sub_s_diskon;
                          $total_ppn += $sub_s_ppn;
                          $total_total += $sub_s_total;
                          $total_hpp += $sub_s_hpp;
                          $total_margin += $sub_s_margin;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr style="background-color:#337ab7;color:#fff;">
                            <th colspan="4">GRAND TOTAL AREA <?php echo $nama_area ?> PERIODE <?php echo $awal_periode ?> - <?php echo $akhir_periode ?></th>
                            <th class="text-right"><?php echo number_format($total_total,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_hpp,0,',','.') ?></th>
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