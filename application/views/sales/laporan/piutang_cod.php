
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Piutang COD</li>
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
                Piutang COD
              </h1>
              <?php if (!empty($message)) { ?>
              <?php echo $message;?>
              <?php } ?>
            </div><!-- /.page-header -->

            <style>
            .alert-yellow {
              background-color: yellow!important;
              color: #000;
            }
            </style>

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form action="" method="post">
                <div class="alert alert-info">
                  <h4>FILTER</h4>
                  <div class="row" style="margin-bottom: 10px">
                      <div class="col-md-2">
                        <h6>No Invoice</h6>
                        <input type="text" name="no_invoice" id="no_invoice" value="<?php echo $no_invoice;?>">
                      </div>
                      <div class="col-md-2">
                        <h6>Dari Tanggal</h6>
                        <input type="text" name="dari" id="datepicker1" value="<?php echo $dari;?>" autocomplete="off">
                      </div>
                      <div class="col-md-2">
                        <h6>Sampai Tanggal</h6>
                        <input type="text" name="sampai" id="datepicker2" value="<?php echo $sampai;?>" autocomplete="off">
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
                            <!-- <th width="200">ACTION</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    
                      <?php
                      $no = 1+($page*100);
                      if ($page > 1) {
                        $no = $no - 100;
                      }

                      foreach ($data_order as $order_sales):
                        // $harga_hs = 0;
                        // $harga_gc = 0;
                        $harga_true = true;
                        $harga_do = 0;
                        foreach ($order_sales->detail_order as $dtkey) :
                          /* if ($dtkey->id_produk == "1") {
                            $harga_hs = $dtkey->harga;
                          }
                          if ($dtkey->id_produk == "2") {
                            $harga_gc = $dtkey->harga;
                          } */
                          $harga_do += $dtkey->harga_jual*$dtkey->jumlah;
                          
                          if ($dtkey->jumlah*1 > 0 && $dtkey->harga_jual*1 == 0) {
                            $harga_true = false;
                          }
                        endforeach;

                        if (($harga_do+$order_sales->ongkir+$order_sales->biaya_lain) != $order_sales->nominal) {
                          $harga_true = false;
                        }

                        /* if ($order_sales->hs*1 > 0 && $harga_hs*1 == 0) {
                          $harga_true = false;
                        }

                        if ($order_sales->gc*1 > 0 && $harga_gc*1 == 0) {
                          $harga_true = false;
                        } */
                        
                        if ($order_sales->media == "Whatsapp") {
                            if ($order_sales->harga+$order_sales->ongkir != $order_sales->nominal) {
                                $harga_true = false;
                            }
                        } else if ($order_sales->media == "Shopee") {
                            if ($order_sales->harga+$order_sales->ongkir != $order_sales->nominal) {
                                $harga_true = false;
                            }
                        } else if ($order_sales->media == "Tokopedia") {
                            if ($order_sales->harga+$order_sales->ongkir != $order_sales->nominal) {
                                $harga_true = false;
                            }
                        } else if ($order_sales->media == "COD") {
                        }

                        $tr_style = '';
                        
                        if ($order_sales->jml_sama > 1) {
                          $tr_style = 'background-color:yellow;';
                        }
                        if (!$harga_true) {
                          $tr_style = 'background-color:red;color:#fff;';
                        }

                      ?>
                      <tr style="<?php echo $tr_style ?>">
                        <td><?php echo $no++;?></td>
                        <td>
                          <?php echo $order_sales->no_invoice ?> <br>
                          <?php echo $order_sales->tanggal ?> <br>
                        </td>
                        <td>
                          <?php echo $order_sales->nama_cs.str_replace("Momiku", "", $order_sales->last_nama_cs) ?><br>
                          <?php echo $order_sales->no_hp_cs ?>
                        </td>
                        <td>
                          <?php echo $order_sales->nama_penerima ?><br>
                          <?php echo $order_sales->no_hp ?>
                        </td>
                        <td>
                            HARGA : <?php echo 'Rp '.number_format($order_sales->harga,0,',','.'); ?><br>
                            <!-- <b>ONGKIR : </b> <?php echo 'Rp '.number_format($order_sales->ongkir,0,',','.'); ?> -->
                            <?php foreach ($order_sales->detail_order as $key_do) { ?>
                            <?php echo strtoupper($key_do->kode_produk) ?> : <?php echo 'Rp '.number_format($key_do->harga_jual,0,',','.'); ?><br>
                            <?php } ?>
                            ONGKIR : <?php echo 'Rp '.number_format($order_sales->ongkir,0,',','.'); ?><br>
                        </td>
                        <td>
                          <?php foreach ($order_sales->detail_order as $key_do) { ?>
                          <h6><b><?php echo $key_do->nama_produk ?> : </b> <?php echo $key_do->jumlah ?></h6>
                          <?php } ?>
                          <h6><b>KETERANGAN :</b> <?php echo $order_sales->keterangan; ?></h6>
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
                            <?php if ($order_sales->media == "Shopee") { ?>
                            <li>ONGKIR : <?php echo $order_sales->ongkir;?></li>
                            <li>SELISIH : <?php echo $order_sales->selisih;?></li>
                            <li>SALDO : <?php echo $order_sales->nominal;?></li>
                            <?php } ?>
                            <?php if($order_sales->media == "Tokopedia"){ ?>
                            <li>ONGKIR : <?php echo $order_sales->ongkir;?></li>
                            <li>SELISIH : <?php echo $order_sales->selisih;?></li>
                            <li>SALDO : <?php echo $order_sales->nominal;?></li>
                            <?php } ?>
                            <?php if($order_sales->media == "COD"){ ?>
                            <li>BIAYA COD : <?php echo $order_sales->biaya_lain;?></li>
                            <li>TOTAL : <?php echo $order_sales->nominal;?></li>
                            <?php } ?>
                          </ul>
                        </td>
                        <!-- <td>
                          <button type="button" class="btn btn-primary btn-proses" data-id="<?php echo $order_sales->id_order ?>">Proses Lunas</button>
                        </td> -->
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                </table>
                
                <div class="pull-right" style="style="margin-top:50px">
                    <?php echo $pagination;?>
                </div>


                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <form method="post" action="<?php echo base_url() ?>admin/order_sales/konfirmasi_delete">
                        <!-- <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Modal Header</h4>
                        </div> -->
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id_order" />
                          <button type="submit" class="btn btn-primary">Hapus</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                
                <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                
                <script>

                    $(document).ready(function() {
                      $('#mytable').DataTable({
                        "paging": false,
                        "info": false,
                      });

                      $(".btn-delete-mdl").on("click", function(){
                        var id_order = $(this).attr('data-id');
                        $('input[name="id_order"]').val(id_order);
                        $("#myModal").modal("show");
                      });
                      
                      $(".btn-verifikasi-bayar").on("click", function(){
                        $(this).attr("disabled", "disabled");
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


      <script>
      $(document).ready(function(){
        $(".btn-proses").on("click", function(){
          var id = $(this).attr('data-id');
          var a = confirm('Are you sure ? ');
          if (a) {
            window.location.href = '<?php echo base_url() ?>admin/piutang_retail/lunas_action/'+id;
          }
        });
      });
      </script>