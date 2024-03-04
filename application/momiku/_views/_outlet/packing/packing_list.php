
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
                PACKING ORDER
              </h1>
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
                <form action="<?php echo base_url('outlet/packing/proses_packing');?>" method="post">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th style="text-align:center" width="40"><i class="fa fa-plus"></i></th>
                            <th>NO INVOICE <br> TANGGAL</th>
                            <th>INFO CS</th>
                            <th>INFO PENERIMA</th>
                            <th>HARGA</th>
                            <th>DETAIL ORDER</th>
                            <th width="250">STATUS <br> RESI</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;foreach ($data_order as $order_sales): ?>
                      <tr>
                        <td><input type="checkbox" name="checked_packing[]" id="" value="<?php echo $order_sales->id_order;?>" class="form-control"></td>
                        <td>
                            <?php echo $order_sales->no_invoice ?> <br>
                            <?php echo $order_sales->tanggal ?>
                        </td>
                        <td width="250">
                            <b>Nama CS : </b> <?php echo $order_sales->nama_cs ?><br>
                            <b>No HP CS : </b> <?php echo $order_sales->no_hp_cs ?>
                        </td>
                        <td>
                            <b>Nama Penerima : </b> <?php echo $order_sales->nama_penerima ?><br>
                            <b>No HP Penerima : </b> <?php echo $order_sales->no_hp ?><br>
                            <b>Alamat Penerima : </b> <?php echo $order_sales->no_hp ?>
                        </td>
                        <td>
                            <b>HARGA : </b> <?php echo 'Rp '.number_format($order_sales->harga,0,',','.'); ?><br>
                            <b>ONGKIR : </b> <?php echo 'Rp '.number_format($order_sales->ongkir,0,',','.'); ?>
                        </td>
                        <td>
                          <h6><b>HERBASKIN : </b> <?php echo $order_sales->hs ?></h6>
                          <h6><b>GRACILLI : </b> <?php echo $order_sales->gc ?></h6>
                        </td>
                        <td>
                          <ul class="list-unstyled">
                            <li>
                              <button class="btn btn-block btn-round btn-success btn-sm" disabled><?php echo $order_sales->status ?></button>
                            </li>
                            <li style="padding:5px 0px;">
                              <button type="button" class="input-resi btn btn-block btn-round btn-primary btn-sm" data-resi="<?php echo $order_sales->no_resi;?>" data-id = "<?php echo $order_sales->id_order;?>">MASUKAN RESI</button>
                            </li>
                          </ul>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                <style>
                    .btn-floated {
                        position:fixed;
                        bottom:5vh;
                        right:5vw;
                        z-index:999;
                        padding:20px;
                        background:#0089ff;
                        border:none;
                        border-radius:10px;
                        color:white;
                        font-size:20px;
                    }
                </style>
                <button class="btn-floated" type="submit">
                    <i class="fa fa-gift"></i>
                    CETAK LABEL
                </button>
                </form>

                <div class="modal fade" id="modal-resi">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">NO RESI</h4>
                      </div>
                      <form action="<?php echo base_url('outlet/packing/proses_kirim');?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                            <input type="hidden" name="id_order" id="id_order">
                            <input type="text" name="no_resi" id="no_resi" class="form-control">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Resi</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                

                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                
                <script>
                  $(document).ready(function(){
                    $('.input-resi').click(function(){
                      let id_order = $(this).attr('data-id');
                      let no_resi = $(this).attr('data-resi');
                      
                      $("#no_resi").val(no_resi);
                      $("#id_order").val(id_order);

                      $('#modal-resi').modal('show');
                    });
                  });
                </script>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->