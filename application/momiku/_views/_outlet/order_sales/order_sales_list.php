
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
                <form action="" method="post">
                <div class="alert alert-info">
                  <h4>FILTER</h4>
                  <div class="row" style="margin-bottom: 10px">
                      <div class="col-md-2">
                        <h6>Dari Tanggal</h6>
                        <input type="text" name="dari" id="datepicker1" value="<?php echo $dari;?>">
                      </div>
                      <div class="col-md-2">
                        <h6>Sampai Tanggal</h6>
                        <input type="text" name="sampai" id="datepicker2" value="<?php echo $sampai;?>">
                      </div>
                      <div class="col-md-2">
                        <h6>Berdasarkan Status</h6>
                        <select name="status" id="" class="form-control">
                          <option value="">Pilih Status</option>
                          <option value="SEMUA" <?php if($status == "SEMUA"){ echo 'selected'; } ?>>SEMUA</option>
                          <option value="1" <?php if($status == 1){ echo 'selected'; } ?>>Menunggu Diproses</option>
                          <option value="2" <?php if($status == 2){ echo 'selected'; } ?>>Diproses</option>
                          <option value="3" <?php if($status == 3){ echo 'selected'; } ?>>Dikirim</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <h6>&nbsp;</h6>
                        <button class="btn btn-primary btn-sm">PROSES FILTER</button>
                      </div>
                  </div>
                </div>
                </form>
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th width="80px">NO</th>
                            <th>NO INVOICE <br> TANGGAL</th>
                            <th width="100">INFO CS</th>
                            <th>INFO PENERIMA</th>
                            <th>HARGA</th>
                            <th>DETAIL ORDER</th>
                            <th width="200">KETERANGAN</th>
                            <th width="200">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;foreach ($data_order as $order_sales): ?>
                      <tr>
                        <td><?php echo $no++;?></td>
                        <td>
                            <?php echo $order_sales->no_invoice ?> <br>
                            <?php echo $order_sales->tanggal ?>
                        </td>
                        <td>
                            <?php echo $order_sales->nama_cs ?><br>
                            <?php echo $order_sales->no_hp_cs ?>
                        </td>
                        <td>
                            <?php echo $order_sales->nama_penerima ?><br>
                            <?php echo $order_sales->no_hp ?><br>
                            <?php echo $order_sales->no_hp ?>
                        </td>
                        <td>
                            HARGA : <?php echo 'Rp '.number_format($order_sales->harga,0,',','.'); ?><br>
                            <!-- <b>ONGKIR : </b> <?php echo 'Rp '.number_format($order_sales->ongkir,0,',','.'); ?> -->
                        </td>
                        <td>
                          <h6><b>HERBASKIN : </b> <?php echo $order_sales->hs ?></h6>
                          <h6><b>GRACILLI : </b> <?php echo $order_sales->gc ?></h6>
                        </td>
                        <td>
                          <ul class="list-unstyled">
                            <li>
                              MEDIA : <?php echo $order_sales->media;?>
                            </li>
                            <?php if($order_sales->media == "Whatsapp"){ ?>
                            <li>BSU TRANSFER : </li>
                            <li>BANK : </li>
                            <li>SELISIH : </li>
                            <?php } ?>
                            <?php if($order_sales->media == "Shopee"){ ?>
                            <li>ONGKIR : </li>
                            <li>SELISIH : </li>
                            <li>SALDO : </li>
                            <?php } ?>
                            <?php if($order_sales->media == "Tokopedia"){ ?>
                            <li>ONGKIR : </li>
                            <li>SELISIH : </li>
                            <li>SALDO : </li>
                            <?php } ?>
                            <?php if($order_sales->media == "COD"){ ?>
                            <li>BIAYA COD : </li>
                            <?php } ?>
                          </ul>
                        </td>
                        <td>
                          STATUS : <?php echo $order_sales->status ?> <br>
                          <?php if($order_sales->id_status == 1) {?>
                          <a href="<?php echo base_url('outlet/order_sales/verifikasi_pembayaran/'.$order_sales->id_order);?>" class="btn btn btn-primary btn-block btn-sm">VERIFIKASI PEMBAYARAN</a>
                          <?php } else if($order_sales->id_status == 2) { ?>
                          <a href="<?php echo base_url('outlet/order_sales/packing/'.$order_sales->id_order);?>" class="btn btn btn-success btn-block btn-sm">PROSES PACKING</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->