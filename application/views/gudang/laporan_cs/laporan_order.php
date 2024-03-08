
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
                    <input type="text" name="dari" id="datepicker1" value="<?php echo $dari;?>" autocomplete="off" />
                    </div>
                    <div class="col-md-2">
                    <h6>Sampai Tanggal</h6>
                    <input type="text" name="sampai" id="datepicker2" value="<?php echo $sampai;?>" autocomplete="off" />
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
                        
                            <th width="80px">NO</th>
                            <th>NO INVOICE <br> TANGGAL</th>
                            <th width="100">INFO CS</th>
                            <th>INFO PENERIMA</th>
                            <th>HARGA</th>
                            <th>DETAIL ORDER</th>
                            <th width="200">KETERANGAN</th>
                            <th width="200">ACTION</th>
                        
                    </thead>
                    <tbody>
                      <?php $i = 1;foreach ($data_order as $order_sales): ?>
                      <tr>
                        <td><?php echo $i;?></td>
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
                             <?php echo $order_sales->alamat_penerima ?><br>
                            <?php echo $order_sales->no_hp ?>
                        </td>
                        <td>
                            HARGA : <?php echo 'Rp '.number_format($order_sales->harga,0,',','.'); ?><br>
                            <?php foreach ($order_sales->detail_order as $key_do) { ?>
                            HARGA <?php echo strtoupper($key_do->kode_produk) ?> : <?php echo 'Rp '.number_format($key_do->harga_jual,0,',','.'); ?><br>
                            <?php } ?>
                            <b>ONGKIR : </b> <?php echo 'Rp '.number_format($order_sales->ongkir,0,',','.'); ?>
                        </td>
                        <td>
                          <?php foreach ($order_sales->detail_order as $key_do) { ?>
                          <h6><b><?php echo $key_do->nama_produk ?> : </b> <?php echo $key_do->jumlah ?></h6>
                          <?php } ?>
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
                          <?php if($order_sales->id_status == 1) { ?>
                          <a href="<?php echo base_url('admin/laporan_cs/update/'.$order_sales->id_order);?>" class="btn btn btn-warning btn-sm">EDIT</a> <br>
                          <?php } ?>
                          <?php if($order_sales->id_status == 3 && $order_sales->id_media >= 2) {?>
                          <a href="#cancel-<?php echo $order_sales->id_order;?>" data-toggle="collapse" class="btn btn btn-danger btn-block btn-sm">CANCEL ORDER</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <tr class="collapse" id="cancel-<?php echo $order_sales->id_order;?>">
                          <td colspan="8">
                            <div>
                              <h3 style="margin:0px">Pilih Produk</h3>
                              <table class="table table-bordered">
                                <thead>
                                  <th>No</th>
                                  <th>Produk</th>
                                  <th>Jumlah</th>
                                </thead>
                                <tbody>
                                  <?php $no=1;foreach($order_sales->detail_order as $order){?>
                                    <tr>
                                      <td><?php echo $no++;?></td>
                                      <td><?php echo $order->nama_produk;?></td>
                                      <td><input type="number" class="form-control jumlah-<?php echo $order_sales->id_order;?>" data-id="<?php echo $order->id_produk_2;?>" value="<?php echo $order->jumlah;?>"></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              <div class="pull-right">
                                  <button class="btn btn-danger btn-cancel" data-id="<?php echo $order_sales->id_order;?>">
                                    Request Cancel
                                  </button>
                              </div>
                            </div>
                          </td>
                      </tr>
                      <?php $i++;endforeach ?>
                    </tbody>
                </table>

                <div class="text-right" style="margin-top:5px">
                    <?php echo $pagination;?>
                </div>

                
                <form action="<?php echo base_url() ?>admin/laporan_cs/cetak_laporan" method="post" target="_blank">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label col-xs-1 no-padding-right" for="">Per</label>
                        <div class="col-xs-5">
                          <input type="text" class="form-control" name="tgl" id="datepicker3" value="<?php echo date('d-m-Y') ?>" autocomplete="off" />
                        </div>
                        <div class="col-xs-5">
                          <button type="submit" class="btn btn-inverse btn-sm">Print</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>


              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      

      <script>
        $(document).ready(function(){
          $(".btn-cancel").click(function(){

            let formData = new FormData();

            let el = $(this),
                id_order = el.attr('data-id');
            let jumlah = $(`.jumlah-${id_order}`);

            let dataProduk = [];
            jumlah.each((index,el)=>{
              let data_id = el.getAttribute("data-id");
              let jumlah = el.getAttribute("value");
              dataProduk.push({id_produk:data_id,jumlah:jumlah});
            })
            
            formData.append('produk',JSON.stringify(dataProduk));
            formData.append('id_order',id_order);

            $.ajax({
              type: "POST",
              url: "<?php echo base_url('admin/laporan_cs/action_req_retur_jual');?>",
              data: formData,
              processData: false,
              contentType: false,
              success: function (response) {
                window.location.reload();
              },
              error: function(){
                alert("Gagal menyimpan data, code:ERRREQCANCEL");
              }
            });
          })
        });
      </script>