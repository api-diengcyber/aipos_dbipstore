
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan CS</li>
              <li class="active">Laporan Aktivitas CS</li>
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
                Laporan Aktivitas CS
              </h1>
            </div><!-- /.page-header -->

            <form action="" method="post">
            <div class="alert alert-info">
                <h4>FILTER</h4>
                <div class="row" style="margin-bottom: 10px">
                  <div class="col-md-2">
                    <h6>Nama CS</h6>
                    <select name="id_users" id="" class="form-control">
                      <option value="">Pilih CS</option>
                      <?php foreach($data_cs as $cs):?>
                      <option value="<?php echo $cs->id_users;?>" <?php if($id_users == $cs->id_users){ echo 'selected';}?>><?php echo $cs->first_name;?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <h6>Bulan</h6>
                    <select name="bulan" id="" class="form-control">
                      <option value="">Pilih Bulan</option>
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
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php foreach($data_aktivitas as $nama_cs => $data){?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th colspan="15" class="text-center"><?php echo $nama_cs;?></th>
                        </tr>
                        <tr>
                        <th rowspan="3">NO</th>
                        <th rowspan="3">TANGGAL</th>
                        <th rowspan="3">NAMA CS</th>
                        <th colspan="3" class="text-center">AKTIVITAS</th>
                        <th colspan="9" class="text-center">MEDIA</th>
                        </tr>
                        <tr>
                        <th rowspan="2" class="text-center">LEADS</th>
                        <th rowspan="2" class="text-center">CLOSING</th>
                        <th rowspan="2" class="text-center">TOTALAN</th>
                        <?php 
                        $jml_produk = count($data_produk);
                        foreach ($data_media as $keym): ?>
                        <th colspan="<?php echo $jml_produk ?>" class="text-center"><?php echo strtoupper($keym->media) ?></th>
                        <?php endforeach ?>
                        <th rowspan="2" class="text-center"></th>
                        </tr>
                        <tr>
                        <?php 
                        $array_var = array();
                        foreach ($data_media as $keym):
                          foreach ($data_produk as $keyp): 
                            $var = strtolower($keym->media.'_'.$keyp->kode_produk);
                            $array_var[$var] = 0;
                        ?>
                        <th class="text-center">(<?php echo strtoupper($keyp->kode_produk) ?>)</th>
                        <?php 
                          endforeach;
                        endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    $jml_leads = 0;
                    $jml_closing = 0;
                    $jml_totalan = 0;
                    foreach ($data as $activitas) {
                      $act_array = (array) $activitas;
                      $jml_leads += $activitas->leads;
                      $jml_closing += $activitas->closing;
                      $jml_totalan += $activitas->totalan;
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $activitas->tanggal;?></td>
                        <td><?php echo $activitas->nama_cs;?></td>
                        <td class="text-center"><?php echo $activitas->leads;?></td>
                        <td class="text-center"><?php echo $activitas->closing;?></td>
                        <td class="text-center"><?php echo $activitas->totalan;?></td>

                        <?php 
                        foreach ($array_var as $keyv => $valuev):
                          $array_var[$keyv] += $act_array[$keyv];
                        ?>
                        <td class="text-center"><?php echo $act_array[$keyv];?></td>
                        <?php endforeach; ?>

                        <td class="text-center">
                          <a href="<?php echo base_url() ?>leadercs/laporan_cs/update_aktivitas/<?php echo $activitas->id ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                          <a onclick="return confirm('Are you sure?')" href="<?php echo base_url() ?>leadercs/laporan_cs/aktivitas_delete/<?php echo $activitas->id ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <th colspan="3" class="text-center">JUMLAH</th>
                        <th class="text-center"><?php echo $jml_leads;?></th>
                        <th class="text-center"><?php echo $jml_closing;?></th>
                        <th class="text-center"><?php echo $jml_totalan;?></th>
                        <?php foreach ($array_var as $keyv => $valuev): ?>
                        <th class="text-center"><?php echo $valuev;?></th>
                        <?php endforeach; ?>
                        <th></th>
                    </tr>
                    </tbody>
                    </table>
                <?php } ?>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->