
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Data Order</li>
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
              <h1>Data Order</h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <form action="" method="post" class="form-horizontal">
                  <div class="input-group" style="margin-bottom: 10px;">
                    <span class="input-group-addon">
                      <i class="ace-icon fa fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control" name="start_periode" id="datepicker1" value="<?php echo $start_periode ?>" autocomplete="off" />
                    <span class="input-group-addon">
                      <i class="ace-icon fa fa-arrow-right"></i>
                      <i class="ace-icon fa fa-calendar"></i>
                    </span>
                    <input type="text" class="form-control" name="end_periode" id="datepicker2" value="<?php echo $end_periode ?>" autocomplete="off" />
                    <span class="input-group-addon" style="padding: 0px;">
                      <button type="submit" class="btn btn-primary btn-xs">CARI</button>
                    </span>
                  </div>
                </form>
                <?php if (count($data_sales_temp) > 0) { ?>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="5">No</th>
                        <th width="100">Tanggal</th>
                        <th>Toko</th>
                        <th width="100" class="center">Qty</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1; 
                      $total = 0;
                      foreach ($data_sales_temp as $key):
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->tgl ?></td>
                        <td><a href="<?php echo base_url() ?>manager/member_retail/semua_order_detail/<?php echo $key->id ?>"><?php echo $key->nama ?><br><?php echo $key->alamat ?></a></td>
                        <td class="center"><?php echo number_format($key->jml_qty,0,',','.') ?></td>
                      </tr>
                      <?php $total+=$key->jml_qty; $no++; endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="text-right" colspan="3">TOTAL</th>
                        <th class="text-center"><?php echo number_format($total,0,',','.') ?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <?php } else { ?>
                <div class="alert alert-info">
                  <i class="ace-icon fa fa-info-circle"></i> Data tidak ada
                </div>
                <?php } ?>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->