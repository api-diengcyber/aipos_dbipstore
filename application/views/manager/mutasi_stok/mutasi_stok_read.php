
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Mutasi Stok</li>
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
                Mutasi Stok
              </h1>
            </div><!-- /.page-header -->

            <style>
            .editable {
              background-color: yellow!important;
              color: #000!important;
            }
            </style>

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-xs-3" style="padding-right:0px;">
                          <div class="form-group">
                            <label>No Faktur</label>
                            <input type="text" class="form-control" name="nofaktur" id="nofaktur" value="<?php echo $faktur ?>" placeholder="No Faktur">
                          </div>
                        </div>
                        <div class="col-xs-3">
                          <div class="form-group">
                            <label>Tanggal Masuk</label>
                            <input type="text" class="form-control" name="tgl" id="" placeholder="dd-mm-yyyy" value="<?php echo $tgl ?>">
                          </div>
                        </div>
                      <!-- </div>
                      <div class="row"> -->
                        <div class="col-xs-3">
                          <div class="form-group">
                            <label>Cabang Asal<?php echo form_error('cabang') ?></label>
                            <select class="form-control" name="cabang" id="cabang">
                              <option value="">-- Pilih Cabang --</option>
                            <?php $cb1 = ''; foreach ($data_cabang as $key):
                                if ($key->id_users==$user_asal) {
                                  $cb1 = $key->first_name.' '.$key->last_name;
                                }
                              ?>
                              <option value="<?php echo $key->id_users ?>" <?php echo $key->id_users==$user_asal?"selected":"" ?>><?php echo $key->first_name.' '.$key->last_name ?></option>
                            <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-xs-3">
                          <div class="form-group">
                            <label>Cabang Tujuan <?php echo form_error('cabang2') ?></label>
                            <select class="form-control" name="cabang2" id="cabang2">
                              <option value="">-- Pilih Cabang --</option>
                            <?php $cb2 = ''; foreach ($data_cabang as $key):
                                if ($key->id_users==$user_tujuan) {
                                  $cb2 = $key->first_name.' '.$key->last_name;
                                }
                              ?>
                              <option value="<?php echo $key->id_users ?>" <?php echo $key->id_users==$user_tujuan?"selected":"" ?>><?php echo $key->first_name.' '.$key->last_name ?></option>
                            <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th width="10">No</th>
                            <th width="450">Nama Produk</th>
                            <!-- <th width="100">Stok Cabang Asal</th> -->
                            <th width="100">Jumlah Stok Dipindah</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $jml = 0;
                        foreach ($data_mutasi as $key) : ?>
                        <tr>
                          <td><?php echo $no ?></td>
                          <td><?php echo $key->nama_produk ?></td>
                          <td class="text-center"><?php echo $key->jumlah ?></td>
                        </tr>
                        <?php
                        $jml += $key->jumlah;
                        $no++;
                        endforeach;
                        ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th colspan="2" class="text-right">TOTAL</th>
                            <th class="text-center"><?php echo $jml ?></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-4 text-center">
                        (<?php echo $cb1 ?>)
                        <br><br><br><br>
                        <br><br>
                        (.....................................)
                    </div>
                    <div class="col-xs-4 text-center">
                        (<?php echo $cb2 ?>)
                        <br><br><br><br>
                        <br><br>
                        (.....................................)
                    </div>
                    <div class="col-xs-4 text-center">
                        (Gudang)
                        <br><br><br><br>
                        <br><br>
                        (.....................................)
                    </div>
                  </div>
                  
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <script>
        window.print();
      </script>