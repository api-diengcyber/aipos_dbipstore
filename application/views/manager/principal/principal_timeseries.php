<?php if ($print!="true") { ?>
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Timeseries Principal</li>
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
                Timeseries Principal
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-md-4" style="margin-bottom:10px;"><a href="<?php echo base_url() ?>admin/principal/timeseries?print=true" target="_blank" class="btn btn-primary">Print</a></div>
                  <div class="col-md-4"></div>
                </div>
                <div class="row">
                  <form action="" method="post" class="form-horizontal">
                  <div class="col-md-4">
                    <div class="infobox infobox-green infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px">
                      <div class="infobox-icon" style="margin-top:5px;">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data">
                        <div class="infobox-content" style="max-width:100%;">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Principal
                          </h5>
                        </div>
                      </div>
                    </div>
                    <select name="id_principal" class="form-control" onchange="this.form.submit()" style="margin-bottom:20px;">
                      <?php if ($data_login['level']!="6") { ?>
                      <option value="">SEMUA</option>
                      <?php } ?>
                      <?php foreach ($data_principal as $key): ?>
                      <option value="<?php echo $key->id_supplier ?>" <?php echo $id_principal==$key->id_supplier ? "selected" : "" ?>><?php echo $key->nama_supplier ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <div class="infobox infobox-blue infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px;">
                      <div class="infobox-icon" style="margin-top:5px">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data" >
                        <div class="infobox-content" style="max-width:none;">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Produk
                          </h5>
                        </div>
                      </div>
                    </div>
                    <select name="id_produk" class="form-control" onchange="this.form.submit()" style="margin-bottom:20px;">
                      <option value="">SEMUA</option>
                      <?php foreach ($data_produk as $key): ?>
                      <option value="<?php echo $key->id_produk_2 ?>" <?php echo $key->id_produk_2==$id_produk ? "selected" : "" ?>><?php echo $key->nama_produk ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <div class="infobox infobox-red infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px;visibility:visible;">
                      <div class="infobox-icon" style="margin-top:5px">
                        <i class="ace-icon fa fa-calendar"></i>
                      </div>
                      <div class="infobox-data" >
                        <div class="infobox-content" style="max-width:none">
                          <h4>
                            Triwulan
                          </h4>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <select class="form-control" name="triwulan" onchange="this.form.submit()">
                          <option value="1" <?php echo $triwulan==1 ? "selected" : "" ?>>Trimester 1</option>
                          <option value="2" <?php echo $triwulan==2 ? "selected" : "" ?>>Trimester 2</option>
                          <option value="3" <?php echo $triwulan==3 ? "selected" : "" ?>>Trimester 3</option>
                          <option value="4" <?php echo $triwulan==4 ? "selected" : "" ?>>Trimester 4</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" name="tahun" onchange="this.form.submit()">
                          <?php for ($i = 2017; $i <= 2022; $i++) : ?>
                          <option value="<?php echo $i ?>" <?php echo $i==$tahun ? "selected" : "" ?>><?php echo $i ?></option>
                          <?php endfor; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-xs-12">
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
                    a {
                      color: #000;
                      text-decoration: none;
                    }
                    </style>
                    <script>window.print()</script>
                  <?php } ?>
                    <div class="table-responsive">
                      <?php if ($print=="true") { ?>
                      <div class="text-center">
                         <h1 style="margin-top:15px;margin-bottom:15px;">Timeseries Principal</h1>
                      </div>
                      <?php } ?>
                      <table class="table table-bordered" id="myTable">
                        <thead>
                          <tr>
                            <th rowspan="2" width="5">No</th>
                            <th rowspan="2" width="350">Principal</th>
                            <th rowspan="2" width="400">Produk</th>
                            <?php for ($i = $month_start*1; $i <= $month_end*1; $i++) : ?>
                            <th colspan="3" class="text-center"><?php echo $array_month[$i] ?> <?php echo $tahun ?></th>
                            <?php endfor; ?>
                          </tr>
                          <tr>
                            <?php 
                            $data_jumlah = array();
                            for ($i = $month_start*1; $i <= $month_end*1; $i++):
                              $data_jumlah[$i]['dibeli'] = 0;
                              $data_jumlah[$i]['nominal'] = 0;
                              $data_jumlah[$i]['persen'] = 0;
                              $data_jumlah[$i]['total_nominal'] = 0;
                            ?>
                            <th width="150" class="text-center">Dibeli</th>
                            <th width="150" class="text-center">Nominal</th>
                            <th width="150" class="text-center">%</th>
                            <?php endfor; ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach ($data_produk_jual as $key):
                            for ($i = $month_start*1; $i <= $month_end*1; $i++):
                              $detail = $that->get_detail($key->id_produk_2, $i, $tahun);
                              $data_jumlah[$i]['total_nominal'] += $detail->nominal;
                            endfor;
                          endforeach;
                          /////////////////////////////////
                          $no = 1;
                          $total = 0; 
                          foreach ($data_produk_jual as $key):
                          ?>
                          <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $key->nama_supplier." - ".$key->nama_kategori ?></td>
                            <td><a href="<?php echo base_url() ?>admin/principal/detail_produk/<?php echo $key->id_produk_2 ?>/<?php echo $zstart_date ?>/<?php echo $zend_date ?>/trimester"><?php echo $key->nama_produk ?></a></td>
                            <?php 
                            for ($i = $month_start*1; $i <= $month_end*1; $i++):
                              $detail = (Object) $that->get_detail($key->id_produk_2, $i, $tahun);
                              $persen = 0;
                              if ($detail->nominal*1 > 0) {
                                $persen = ($detail->nominal*1/$data_jumlah[$i]['total_nominal'])*100;
                              }
                              $data_jumlah[$i]['dibeli'] += $detail->dibeli;
                              $data_jumlah[$i]['nominal'] += $detail->nominal;
                              $data_jumlah[$i]['persen'] += $persen;
                            ?>
                            <td class="text-center"><?php echo $detail->dibeli ?></td>
                            <td class="text-right"><?php if ($detail->nominal*1 > 0) { echo '<a href="'.base_url().'principal/detail_produk/'.$key->id_produk_2.'/01-'.sprintf("%02d", $i).'-'.$tahun.'/31-'.sprintf("%02d", $i).'-'.$tahun.'">'; } ?><?php echo number_format($detail->nominal*1,0,'.',',') ?><?php if ($detail->nominal*1 > 0) { echo "</a>"; } ?></td>
                            <td class="text-center"><?php echo number_format($persen,2,',','.') ?> %</td>
                            <?php endfor; ?>
                          </tr>
                          <?php $no++; endforeach; ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="3" class="text-right">TOTAL</th>
                            <?php for ($i = $month_start*1; $i <= $month_end*1; $i++) : ?>
                            <th class="text-center"><?php echo $data_jumlah[$i]['dibeli'] ?></th>
                            <th class="text-right"><?php echo number_format($data_jumlah[$i]['nominal'],0,',','.') ?></th>
                            <th class="text-center"><?php echo $data_jumlah[$i]['persen'] ?> %</th>
                            <?php endfor; ?>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <?php if ($print=="true") { ?>
                  </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div>

            <div class="hr hr10 hr-double"></div>

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
$(document).ready(function(){
  $("#myTable").dataTable({
    "pageLength": 50
  });
});
</script>
<?php } ?>