
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
                    <h6>Dari Tanggal</h6>
                    <input type="text" name="dari" id="datepicker1" value="<?php echo $dari;?>">
                    </div>
                    <div class="col-md-2">
                    <h6>Sampai Tanggal</h6>
                    <input type="text" name="sampai" id="datepicker2" value="<?php echo $sampai;?>">
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
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th rowspan="3">NO</th>
                        <th rowspan="3">TANGGAL</th>
                        <th rowspan="3">NAMA CS</th>
                        <th colspan="3">AKTIVITAS</th>
                        <th colspan="8">MEDIA</th>
                        </tr>
                        <tr>
                        <th rowspan="2">LEADS</th>
                        <th rowspan="2">CLOSING</th>
                        <th rowspan="2">TOTALAN</th>
                        <th colspan="2">WA</th>
                        <th colspan="2">SHOPEE</th>
                        <th colspan="2">TOKOPEDIA</th>
                        <th colspan="2">COD</th>
                        </tr>
                        <tr>
                        <th>(HS)</th>
                        <th>(GC)</th>
                        <th>(HS)</th>
                        <th>(GC)</th>
                        <th>(HS)</th>
                        <th>(GC)</th>
                        <th>(HS)</th>
                        <th>(GC)</th>
                        </tr>
                    </thead>
                    <?php $no = 1;foreach ($data_aktivitas as $activitas) { ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $activitas->tanggal;?></td>
                        <td><?php echo $activitas->nama_cs;?></td>
                        <td><?php echo $activitas->leads;?></td>
                        <td><?php echo $activitas->closing;?></td>
                        <td><?php echo $activitas->totalan;?></td>
                        <td><?php echo $activitas->wa_hs;?></td>
                        <td><?php echo $activitas->wa_dc;?></td>
                        <td><?php echo $activitas->shopee_hs;?></td>
                        <td><?php echo $activitas->shopee_gc;?></td>
                        <td><?php echo $activitas->tokopedia_hs;?></td>
                        <td><?php echo $activitas->tokopedia_gc;?></td>
                        <td><?php echo $activitas->cod_hs;?></td>
                        <td><?php echo $activitas->cod_gc;?></td>
                    </tr>
                    <?php } ?>
                    </table>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->