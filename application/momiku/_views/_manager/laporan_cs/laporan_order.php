
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Laporan CS</li>
              <li class="active">Laporan Order CS</li>
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
                Laporan Order CS
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
                            <li>BSU TRANSFER : Rp <?php echo number_format($order_sales->nominal,0,',','.');?></li>
                            <li>BANK : <?php echo $order_sales->nama_bank;?></li>
                            <li>SELISIH : Rp <?php echo number_format($order_sales->selisih,0,',','.');?></li>
                            <?php } ?>
                            <?php if($order_sales->media == "Shopee"){ ?>
                            <li>ONGKIR : <?php echo $order_sales->ongkir;?></li>
                            <li>SELISIH : <?php echo $order_sales->selisih;?></li>
                            <li>SALDO : <?php echo $order_sales->saldo;?></li>
                            <?php } ?>
                            <?php if($order_sales->media == "Tokopedia"){ ?>
                            <li>ONGKIR : <?php echo $order_sales->ongkir;?></li>
                            <li>SELISIH : <?php echo $order_sales->selisih;?></li>
                            <li>SALDO : <?php echo $order_sales->saldo;?></li>
                            <?php } ?>
                            <?php if($order_sales->media == "COD"){ ?>
                            <li>BIAYA COD : <?php echo $order_sales->biaya_lain;?></li>
                            <?php } ?>
                          </ul>
                        </td>
                        <td>
                          STATUS : <?php echo $order_sales->status ?> <br>
                          <?php if($order_sales->id_status == 1) {?>
                          <a href="<?php echo base_url('admin/order_sales/verifikasi_pembayaran/'.$order_sales->id_order);?>" class="btn btn btn-primary btn-block btn-sm">VERIFIKASI PEMBAYARAN</a>
                          <?php } else if($order_sales->id_status == 2) { ?>
                          <a href="<?php echo base_url('admin/order_sales/packing/'.$order_sales->id_order);?>" class="btn btn btn-success btn-block btn-sm">PROSES PACKING</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->