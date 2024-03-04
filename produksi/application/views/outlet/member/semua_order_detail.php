
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Data Order Detail</li>
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
              <h1><?php echo $row_sales_temp->nama ?></h1>
              <h4 style="margin-left: 8px;"><i class="ace-icon fa fa-home"></i> <?php echo $row_sales_temp->alamat ?></h4>
              <h4 style="margin-left: 8px;"><i class="ace-icon fa fa-calendar"></i> <?php echo $row_sales_temp->tgl ?></h4>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <form action="" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label no-padding-right col-md-2">Pilih Jenis</label>
                    <div class="col-md-10">
                      <select name="jenis" class="form-control" onchange="this.form.submit()">
                        <option value=""> - SEMUA</option>
                        <option value="1" <?php echo $jenis==1 ? "selected" : "" ?>>Belum diproses admin</option>
                        <option value="2" <?php echo $jenis==2 ? "selected" : "" ?>>Diproses admin</option>
                        <option value="3" <?php echo $jenis==3 ? "selected" : "" ?>>Sudah ada faktur</option>
                        <option value="4" <?php echo $jenis==4 ? "selected" : "" ?>>Transaksi dibatalkan</option>
                      </select>
                    </div>
                  </div>
                </form>
                <?php if (count($data_sales_temp) > 0) { ?>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="5">No</th>
                        <th>Produk</th>
                        <th width="5" class="text-center">Qty</th>
                        <th width="10" class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $total = 0;
                      foreach ($data_sales_temp as $key):
                        $ket_selesai = "<span class='badge badge-danger'>Belum ada faktur</span>";
                        if ($key->selesai==1) {
                          $ket_selesai = "<span class='badge badge-primary'>Sudah ada faktur</span>";
                        } else if ($key->selesai==2) {
                          $ket_selesai = "<span class='badge badge-warning'>Transaksi dibatalkan</span>";
                        }
                        if ($key->acc_admin==0) {
                          $ket_selesai = "<span class='badge badge-inverse'>Belum diproses</span>";
                        }
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $key->nama_produk ?></td>
                        <td class="text-center"><?php echo number_format($key->jumlah,0,',','.') ?></td>
                        <td class="text-center"><?php echo $ket_selesai ?></td>
                      </tr>
                      <?php $total+=$key->jumlah; $no++; endforeach ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th class="text-right" colspan="2">TOTAL</th>
                        <th class="text-right"><?php echo number_format($total,0,',','.') ?></th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                <?php } else { ?>
                <div class="alert alert-info">
                  <i class="ace-icon fa fa-info-circle"></i> Data tidak ada
                </div>
                <?php } ?>
                </div>
                <a href="<?php echo base_url() ?>outlet/member_retail/semua_order" class="btn btn-primary">Kembali</a>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.page-content -->
      </div>
    </div><!-- /.main-content -->