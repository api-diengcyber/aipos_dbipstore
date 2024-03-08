<?php if ($print!="true") { ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Laporan Kas Harian</li>
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
                Laporan Kas Harian
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                    <form method="post" id="formPeriode" class="form-horizontal" action="">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right">Tanggal</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="tgl" value="<?php echo $tgl ?>" id="datepicker1" placeholder="dd-mm-yyyy">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <button type="submit" class="btn btn-primary">Proses</button>
                          <?php if ($print!="true") { ?>
                          <a target="_blank" href="<?php echo base_url() ?>admin/laporan_kas/harian?print=true" class="btn btn-inverse">Cetak</a>
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
                    <div class="table-responsive">
                      <?php if ($print=="true") { ?>
                      <div class="text-center">
                         <h1 style="margin-top:15px;margin-bottom:5px;">Laporan Kas Harian</h1>
                         <h4 style="margin-top:0px;">Tanggal : <?php echo $tgl ?></h4>
                      </div>
                      <?php } ?>
                      <table id="mytable" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th rowspan="2" width="10">No</th>
                            <th rowspan="2" class="text-center">Uraian</th>
                            <th rowspan="2" class="text-center">Saldo<br>Awal</th>
                            <th colspan="2" class="text-center">Mutasi</th>
                            <th rowspan="2" class="text-center">Saldo<br>Akhir</th>
                          </tr>
                          <tr>
                            <th class="text-center">Masuk</th>
                            <th class="text-center">Keluar</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $total_saldo_awal = 0;
                        $total_masuk = 0;
                        $total_keluar = 0;
                        $total_saldo_akhir = 0;
                        foreach ($data_pil_transaksi as $key):
                          $row_bl = $this->db->select('SUM(j.debet) AS masuk, SUM(j.kredit) AS keluar')
                                          ->from('jurnal j')
                                          ->join('akun a', 'j.id_akun=a.id AND SUBSTRING(a.kode,1,7)="1.01.03"')
                                          ->where('j.id_transaksi', $key->id_pil_transaksi)
                                          ->where('DATE(CONCAT(SUBSTRING(j.tgl,7,4),"-",SUBSTRING(j.tgl,4,2),"-",SUBSTRING(j.tgl,1,2))) < "'.$s_tgl.'"')
                                          ->get()->row();
                          $masuk_bl = 0;
                          $keluar_bl = 0;
                          if ($row_bl) {
                            $masuk_bl = $row_bl->masuk;
                            $keluar_bl = $row_bl->keluar;
                          }
                          $saldo_awal = $masuk_bl-$keluar_bl;
                          $row = $this->db->select('SUM(j.debet) AS masuk, SUM(j.kredit) AS keluar')
                                          ->from('jurnal j')
                                          ->join('akun a', 'j.id_akun=a.id AND SUBSTRING(a.kode,1,7)="1.01.03"')
                                          ->where('j.id_transaksi', $key->id_pil_transaksi)
                                          ->where('j.tgl', $tgl)
                                          ->get()->row();
                          $masuk = 0;
                          $keluar = 0;
                          if ($row) {
                            $masuk = $row->masuk;
                            $keluar = $row->keluar;
                          }
                          $saldo_akhir = $saldo_awal+($masuk-$keluar);
                          $total_saldo_awal += $saldo_awal;
                          $total_masuk += $masuk;
                          $total_keluar += $keluar;
                          $total_saldo_akhir += $saldo_akhir;
                        ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $key->nama_transaksi ?></td>
                            <td class="text-right"><?php echo number_format($saldo_awal,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($masuk,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($keluar,0,',','.') ?></td>
                            <td class="text-right"><?php echo number_format($saldo_akhir,0,',','.') ?></td>
                          </tr>
                        <?php 
                          $no++;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="2"></th>
                            <th class="text-right"><?php echo number_format($total_saldo_awal,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_masuk,0,',','.') ?></th>
                            <th class="text-right"><?php echo number_format($total_keluar,0,',','.') ?></th>
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

<?php } ?>