
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan CS</li>
              <li class="active">Laporan Bulanan</li>
            </ul><!-- /.breadcrumb -->

            
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
                Laporan Bulanan
              </h1>
            </div><!-- /.page-header -->
            
            <style>
            @media print {
              body * {
                visibility: hidden;
              }
              #section-to-print, #section-to-print * {
                visibility: visible;
              }
              #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
              }
            }
            </style>

            <form action="" method="post">
            <div class="alert alert-info">
                <h4>FILTER</h4>
                <div class="row" style="margin-bottom: 10px">
                    
                    <div class="col-md-2">
                    <h6>Bulan</h6>
                    <select name="bulan" id="" class="form-control">
                      <option value="all">Pilih Bulan</option>
                      <?php foreach($data_bulan as $b){?>
                      <option value="<?php echo sprintf('%02d',$b->id);?>" <?php if(sprintf('%02d',$b->id) == $bulan){ echo 'selected'; } ?>><?php echo $b->bulan;?></option>
                      <?php } ?>
                    </select>
                    </div>

                    <div class="col-md-2">
                    <h6>Tahun</h6>
                    <select name="tahun" id="" class="form-control">
                        <option value="">Pilih</option>
                        <?php 
                        $start = date('Y') - 5;
                        for($i = $start;$i <= date('Y')+5;$i++){ ?>
                        <option value="<?php echo $i;?>"  <?php if($i == $tahun){ echo 'selected'; } ?>><?php echo $i;?></option>
                        <?php } ?>
                    </select>
                    </div>

                    <div class="col-md-2">
                    <h6>&nbsp;</h6>
                    <button class="btn btn-primary btn-sm">PROSES FILTER</button>
                    </div>
                </div>
            </div>
            </form>

            <div class="row">
              <div class="col-xs-12" id="section-to-print">
                <!-- PAGE CONTENT BEGINS -->
                <div class="table-responsive">
                          
                  <?php
                  foreach($data_aktivitas as $key) {
                    $jml_leads = 0;
                    $jml_totalan = 0;
                    $array_jml_media = array();
                    $array_jml_produk = array();
                    $jml_sub = 0;
                  ?>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th rowspan="2" width="100" class="text-center">BULAN</th>
                        <th rowspan="2" class="text-center">MINGGU KE</th>
                        <th rowspan="2">PRODUK</th>
                        <th class="text-center">LEADS</th>
                        <th class="text-center">TOTALAN</th>
                        <?php 
                        $csp = (count($key['data_produk'])/count($data_media));
                        foreach ($data_media as $key_m) : ?>
                        <th colspan="<?php echo $csp; ?>" class="text-center"><?php echo $key_m->media ?></th>
                        <?php endforeach; ?>
                        <th colspan="<?php echo $csp ?>" class="text-center">CLOSING</th>
                        <th class="text-center">TOTAL CLOSING</th>
                      </tr>
                      <tr>
                        <th></th>
                        <th></th>
                        <?php foreach ($data_media as $key_m) :
                        foreach ($data_gpc as $k_g) {
                        ?>
                        <th><?php echo $k_g->group ?></th>
                        <?php }; endforeach; 
                        foreach ($data_gpc as $k_g) {?>
                        <th><?php echo $k_g->group ?></th>
                        <?php }; ?>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 0;
                      foreach ($key['data_produk'] as $dtp) {
                        $no++;
                        $jml_leads += $dtp['leads'];
                        $jml_totalan += $dtp['totalan'];
                      ?>
                      <tr>
                        <?php
                        if ($no == 1) {
                          echo '<td rowspan="'.($key['count_weeks']*2).'" style="vertical-align:middle;">'.$dtp['nama_bulan'].'</td>';
                        }
                        if ($dtp['kode_produk'] == "GC") {
                          echo '<td rowspan="2" class="text-center" style="vertical-align:middle;">'.$dtp['week'].'</td>';
                        }
                        ?>
                        <td class="text-center"><?php echo $dtp['kode_produk'] ?></td>
                        <td class="text-center"><?php echo $dtp['leads'] ?></td>
                        <td class="text-center"><?php echo $dtp['totalan'] ?></td>
                        <?php
                        $id_group = $dtp['id_produk'];
                        $sub_closing = 0;
                        $array_jml = array();
                        foreach ($data_media as $key_m) :
                          foreach ($data_gpc as $k_g) :
                            $nom = 0;
                            $row = $that->get_jumlah_order($dtp['week_start'], $dtp['week_end'], $key_m->id, $id_group, $k_g->id_produk);
                            if ($row) {
                              $nom = $row->jml;
                            }
                            $gp = $id_group."-".$k_g->id_produk;
                            if (empty($array_jml[$gp])) {
                              $array_jml[$gp] = 0;
                            }
                            $array_jml[$gp] += $nom;
                            $sub_closing += $nom;
                            if (empty($array_jml_media[$key_m->id."-".$k_g->id_produk])) {
                              $array_jml_media[$key_m->id."-".$k_g->id_produk] = 0;
                            }
                            $array_jml_media[$key_m->id."-".$k_g->id_produk] += $nom;
                            if (empty($array_jml_produk[$k_g->id_produk])) {
                              $array_jml_produk[$k_g->id_produk] = 0;
                            }
                            $array_jml_produk[$k_g->id_produk] += $nom;
                        ?>
                        <td class="text-center"><?php echo $nom ?><!--  (<?php // echo $dtp['week_start'].", ".$dtp['week_end'].", ".$key_m->id.", ".$dtp['id_produk'].", ".$k_g->id_produk ?>) --></td>
                        <?php
                          endforeach;
                        endforeach;
                        foreach ($data_gpc as $k_g): ?>
                        <td class="text-center"><?php echo $array_jml[$id_group."-".$k_g->id_produk] ?></td>
                        <?php
                          endforeach;
                        $jml_sub += $sub_closing;
                        ?>
                        <td class="text-center"><?php echo $sub_closing ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3"></th>
                        <th class="text-center"><?php echo $jml_leads ?></th>
                        <th class="text-center"><?php echo $jml_totalan ?></th>
                        <?php foreach ($data_media as $key_m) :
                        foreach ($data_gpc as $k_g) {
                        ?>
                        <th class="text-center"><?php echo $array_jml_media[$key_m->id."-".$k_g->id_produk] ?></th>
                        <?php }; endforeach; 
                        foreach ($data_gpc as $k_g) { ?>
                        <th class="text-center"><?php echo $array_jml_produk[$k_g->id_produk] ?></th>
                        <?php }; ?>
                        <th class="text-center"><?php echo $jml_sub ?></th>
                      </tr>
                    </tfoot>
                  </table>
                  <?php } ?>

                </div>

                <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
                
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->