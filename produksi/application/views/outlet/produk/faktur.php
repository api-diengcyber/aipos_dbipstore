
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Produk Retail</li>
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
              	Pilih Faktur
                
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php 
                        if ($id_modul=='1') {
                          if(count($data_faktur)==0){
                            echo anchor(site_url('outlet/pembelian_retail/faktur_create'), 'Buat Faktur Baru', 'class="btn btn-primary "'); 
                          }
                         } else {
                         echo anchor(site_url('outlet/pembelian_retail/faktur_create'), 'Buat Faktur Baru', 'class="btn btn-primary "'); 
                        }
                       ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Tanggal</th>
                            <th>Faktur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data_faktur as $key): 
                    if($id_modul == '1'){
                      if($no == '1'){
                    ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->tgl ?></td>
                        <td><?php echo $key->no_faktur ?></td>
                        <td>
                          <form action="<?php echo base_url() ?>outlet/pembelian_retail/create" method="post">
                            <input type="hidden" name="id_faktur" value="<?php echo $key->id ?>">
                            <input type="hidden" name="tgl" value="<?php echo $key->tgl ?>">
                            <input type="hidden" name="no_faktur" value="<?php echo $key->no_faktur ?>">
                            <button type="submit" class="btn btn-inverse btn-xs">Tambah Transaksi</button>
                          </form>
                        </td>
                      </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->tgl ?></td>
                        <td><?php echo $key->no_faktur ?></td>
                        <td>
                          <form action="<?php echo base_url() ?>outlet/pembelian_retail/create" method="post">
                            <input type="hidden" name="id_faktur" value="<?php echo $key->id ?>">
                            <input type="hidden" name="tgl" value="<?php echo $key->tgl ?>">
                            <input type="hidden" name="no_faktur" value="<?php echo $key->no_faktur ?>">
                            <button type="submit" class="btn btn-inverse btn-xs">Tambah Transaksi</button>
                          </form>
                        </td>
                      </tr>
                    <?php
                    }
                    $no++;
                    endforeach;
                    ?>
                    </tbody>
                </table>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->