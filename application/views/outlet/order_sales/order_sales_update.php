
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Salesman</li>
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
                ORDER SALES 
              </h1>
              <?php if(!empty($message)){?>
              <?php echo $message;?>
              <?php } ?>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                <form action="<?php echo $action ?>" method="post">
                  <div class="row">
                    <div class="col-md-6">
                                           <div class="form-group">
                        <label for="">Bank </label>
                        <select name='bank' class="form-control">
                            <option value='0' <?php echo $bank=="0"?"selected":"" ?>>COD</option>
                            <option value='1' <?php echo $bank=="1"?"selected":"" ?>>BRI</option>
                            <option value='3' <?php echo $bank=="3"?"selected":"" ?>>BCA</option>
                            <option value='4' <?php echo $bank=="4"?"selected":"" ?>>MANDIRI</option>
                            
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Nama Penerima <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $nama ?>" placeholder="Nama Penerima" />
                      </div>
                      <div class="form-group">
                        <label for="">Alamat <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $alamat ?>" placeholder="Alamat" />
                      </div>
                      <div class="form-group">
                        <label for="">No HP <?php echo form_error('no_hp') ?></label>
                        <input type="text" class="form-control" name="no_hp" value="<?php echo $no_hp ?>" placeholder="No HP" />
                      </div>
                      <div class="form-group">
                        <label for="">Harga GC <?php echo form_error('harga_gc') ?></label>
                        <input type="text" class="form-control" name="harga_gc" value="<?php echo $harga_gc ?>" placeholder="Harga GC" />
                      </div>
                      <div class="form-group">
                        <label for="">Qty GC <?php echo form_error('qty_gc') ?></label>
                        <input type="text" class="form-control" name="qty_gc" value="<?php echo $qty_gc ?>" placeholder="Qty GC" />
                      </div>
                      <div class="form-group">
                        <label for="">Harga HS <?php echo form_error('harga_hs') ?></label>
                        <input type="text" class="form-control" name="harga_hs" value="<?php echo $harga_hs ?>" placeholder="Harga HS" />
                      </div>
                      <div class="form-group">
                        <label for="">Qty HS <?php echo form_error('qty_hs') ?></label>
                        <input type="text" class="form-control" name="qty_hs" value="<?php echo $qty_hs ?>" placeholder="Qty HS" />
                      </div>
                      <div class="form-group">
                        <label for="">Harga Total <?php echo form_error('harga') ?></label>
                        <input type="text" class="form-control" name="harga" value="<?php echo $harga ?>" placeholder="Harga Total" />
                      </div>
                      <div class="form-group">
                        <label for="">Ongkir <?php echo form_error('ongkir') ?></label>
                        <input type="text" class="form-control" name="ongkir" value="<?php echo $ongkir ?>" placeholder="Ongkir" />
                      </div>
                      <div class="form-group">
                        <label for="">Biaya COD <?php echo form_error('biaya_lain') ?></label>
                        <input type="text" class="form-control" name="biaya_lain" placeholder="Isikan Jika COD" />
                      </div>
                      <div class="form-group">
                        <label for="">Transfer <?php echo form_error('transfer') ?></label>
                        <input type="text" class="form-control" name="nominal" value="<?php echo $nominal ?>" placeholder="Transfer" />
                      </div> 
                      <div class="form-group">
                        <label for="">Selisih <?php echo form_error('selisih') ?></label>
                        <input type="text" class="form-control" name="selisih" value="<?php echo $selisih ?>" placeholder="Selisih" />
                      </div> 
                    </div>
                  </div>

                  <input type="hidden" name="id_order" value="<?php echo $id_order ?>" />
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

                </form>
                
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                
                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->

            <script>
            $(document).ready(function(){
              
              function hitungTotal() {
                var hargaGC = $('input[name="harga_gc"]').val()*1;
                var qtyGC = $('input[name="qty_gc"]').val()*1;
                var hargaHS = $('input[name="harga_hs"]').val()*1;
                var qtyHS = $('input[name="qty_hs"]').val()*1;
                var total = (hargaGC*qtyGC) + (hargaHS*qtyHS);
                $('input[name="harga"]').val(total);
              }

              $('input[name="harga_gc"],input[name="qty_gc"],input[name="harga_hs"],input[name="qty_hs"]')
              .on('keyup', function(){
                hitungTotal();
              });

            });
            </script>

          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->