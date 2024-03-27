<?php if ($print!="true") { ?>

      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Analisa Produk</li>
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

            <style>
            .btn-detail {
              cursor: pointer;
            }
            .btn-detail:hover {
              background-color: #1bb148;
              transition: all .3s ease-in-out;
              /*font-size: 15px;*/
              color: #fff;
            }
            </style>
            <div class="page-header">
              <h1>
                Analisa Produk
              </h1>
            </div><!-- /.page-header -->
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="row">
                  <div class="col-md-4" style="margin-bottom:10px;"><a href="<?php echo base_url() ?>admin/analisa/produk?print=true" target="_blank" class="btn btn-primary">Print</a></div>
                  <div class="col-md-4"></div>
                </div>
                <div class="row">
                  <form action="" method="post" class="form-horizontal">
                  <div class="col-md-3">
                    <div class="infobox infobox-green infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px">
                      <div class="infobox-icon" style="margin-top:5px;">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data">
                        <div class="infobox-content" style="max-width:100%;">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Sales
                          </h5>
                        </div>
                      </div>
                    </div>
                    <select name="id_sales" class="form-control" onchange="this.form.submit()" style="margin-bottom:20px;">
                      <?php if ($data_login->level!="6") { ?>
                      <option value="">SEMUA</option>
                      <?php } ?>
                      <?php foreach ($data_sales as $key): ?>
                      <option value="<?php echo $key->id_users ?>" <?php echo $key->id_users==$id_sales ? "selected" : "" ?>><?php echo $key->first_name ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <div class="infobox infobox-purple infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px;">
                      <div class="infobox-icon" style="margin-top:5px">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data" >
                        <div class="infobox-content" style="max-width:none;">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Toko
                          </h5>
                        </div>
                      </div>
                    </div>
                    <select name="id_member" class="form-control" onchange="this.form.submit()" style="margin-bottom:20px;">
                      <option value="">SEMUA</option>
                      <?php foreach ($data_member as $key): ?>
                      <option value="<?php echo $key->id_member ?>" <?php echo $key->id_member==$id_member ? "selected" : "" ?>><?php echo $key->nama ?> | <?php echo $key->alamat ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <div class="infobox infobox-blue infobox-large infobox-dark" style="cursor:pointer;width:100%;margin-bottom:10px;">
                      <div class="infobox-icon" style="margin-top:5px">
                        <i class="ace-icon fa fa-money"></i>
                      </div>
                      <div class="infobox-data" >
                        <div class="infobox-content" style="max-width:none;">
                          <h5>
                            Penjualan <br>
                            Berdasarkan Principal
                          </h5>
                        </div>
                      </div>
                    </div>
                    <select name="id_principal" class="form-control" onchange="this.form.submit()" style="margin-bottom:20px;">
                      <?php foreach ($data_principal as $key): ?>
                      <option value="<?php echo $key->nama_principal ?>" <?php echo strtolower(str_replace(" ","",$key->nama_principal))==strtolower(str_replace(" ","",$id_principal)) ? "selected" : "" ?>><?php echo $key->nama_principal ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-3">
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
                         <h1 style="margin-top:15px;margin-bottom:15px;">Analisa Produk</h1>
                      </div>
                      <?php } ?>
                      <table class="table table-bordered" id="myTable">
                        <thead>
                          <tr>
                            <th rowspan="2" width="70">No</th>
                            <th rowspan="2" width="350">Toko</th>
                            <th rowspan="2" width="100">Telp</th>
                            <th rowspan="2" width="300">Principal</th>
                            <th rowspan="2" width="300">Produk</th>
                            <?php 
                            $array_jumlah = array();
                            for ($i = $month_start*1; $i <= $month_end*1; $i++):
                              $array_jumlah[$i]['dibeli'] = 0;
                              $array_jumlah[$i]['nominal'] = 0;
                            ?>
                            <th colspan="2" class="text-center"><?php echo strtoupper(substr($array_month[$i], 0, 3)) ?></th>
                            <?php endfor; ?>
                          </tr>
                          <tr>
                            <?php for ($i = $month_start*1; $i <= $month_end*1; $i++): ?>
                            <th width="100" class="text-center">Dibeli</th>
                            <th width="100" class="text-center">Nominal</th>
                            <?php endfor; ?>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 0; 
                        $current_toko = '';
                        $current_principal = '';
                        foreach ($data_produk_jual as $key):
                          $toko = $key->nama."<br>".$key->alamat;
                          if ($toko=="<br>") {
                            $toko = "Tidak ada sales";
                          }
                          if ($current_toko==$toko) {
                            $tampil_toko = false;
                            $style = 'border-top:0px solid white !important;border-bottom:0px solid white !important;';
                            if ($current_principal==$key->nama_kategori) {
                              $tampil_principal = false;
                              $style_principal = $style;
                            } else {
                              $tampil_principal = true;
                              $style_principal = 'border-bottom:0px solid white !important;';
                            }
                          } else {
                            $tampil_toko = true;
                            $tampil_principal = true;
                            $style = 'border-bottom:0px solid white !important;';
                            $style_principal = $style;
                            $no++;
                          }
                        ?>
                          <tr>
                            <td style="<?php echo $style ?>"><?php echo ($tampil_toko) ? $no : "" ?></td>
                            <td style="<?php echo $style ?>"><?php echo ($tampil_toko) ? $toko : "" ?></td>
                            <td style="<?php echo $style ?>"><?php echo ($tampil_toko) ? $key->telp : "" ?></td>
                            <td style="<?php echo $style_principal ?>"><?php echo ($tampil_principal) ? $key->nama_kategori : "" ?></td>
                            <td><?php echo $key->nama_produk ?></td>
                            <?php 
                            for ($i = $month_start*1; $i <= $month_end*1; $i++):
                              $detail = (Object) $that->get_detail($key->id_produk_2, $key->id_member, $i, $tahun);
                              $array_jumlah[$i]['dibeli']+=$detail->dibeli;
                              $array_jumlah[$i]['nominal']+=$detail->nominal;
                            ?>
                            <td class="text-right" <?php echo ($detail->dibeli > 0) ? "" : "style='color:red;'" ?>><?php echo $detail->dibeli ?></td>
                            <td class="text-right" <?php echo ($detail->nominal > 0) ? "" : "style='color:red;'" ?>><?php echo number_format($detail->nominal,0,',','.') ?></td>
                            <?php endfor; ?>
                          </tr>
                        <?php 
                          $current_toko = $toko;
                          $current_principal = $key->nama_kategori;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="5" class="text-right">JUMLAH</th>
                            <?php for ($i = $month_start*1; $i <= $month_end*1; $i++) : ?>
                            <th class="text-right"><?php echo $array_jumlah[$i]['dibeli']*1 ?></th>
                            <th class="text-right"><?php echo number_format($array_jumlah[$i]['nominal']*1,0,',','.') ?></th>
                            <?php endfor; ?>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <?php if ($print!="true") { ?>
                  </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<script>
$(document).ready(function() {
});
</script>
<?php } ?>