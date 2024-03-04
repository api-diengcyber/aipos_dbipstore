
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Data</li>
              <li class="active">Piutang</li>
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
                Piutang
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                  <div class="col-md-6">
                    <table class="table">
                        <tr><td>No Faktur</td><td><?php echo $no_faktur; ?></td></tr>
                        <tr><td>Tanggal Piutang</td><td><?php echo $tanggal; ?></td></tr>
                        <tr><td>Deadline</td><td><?php echo $deadline; ?></td></tr>
                        <tr><td>Pembeli</td><td><?php echo $nama_member; ?> (<?php echo $alamat_member ?>)</td></tr>
                        <tr><td>Jumlah Hutang</td><td><?php echo number_format($jumlah_hutang,0,',','.'); ?></td></tr>
                        <tr><td>Jumlah Bayar</td><td><?php echo number_format($jumlah_bayar,0,',','.'); ?></td></tr>
                        <tr><td>Sisa</td><td><?php echo number_format($sisa,0,',','.'); ?></td></tr>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="10">No</th>
                          <th>Tgl</th>
                          <th>Ket</th>
                          <th class="text-center">Bayar</th>
                          <th class="text-center">Sisa</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach ($data_bayar as $key):
                      ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $key->tgl ?></td>
                          <td><?php echo $key->ket ?></td>
                          <td class="text-right"><?php echo number_format($key->bayar,0,',','.') ?></td>
                          <td class="text-right"><?php echo number_format($key->sisa,0,',','.') ?></td>
                        </tr>
                      <?php 
                        $no++;
                      endforeach;
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <a href="<?php echo site_url('outlet/piutang_retail') ?>" class="btn btn-default">Cancel</a>
                  </div>
                </div>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->