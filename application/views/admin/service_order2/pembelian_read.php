
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Pembelian</li>
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
                Pembelian
              </h1>
            </div><!-- /.page-header -->


            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                
                <table class="table">
                  <tr><th>ID Faktur</th><th><?php echo $id_faktur; ?></th></tr>
                 
                  <tr>
                    <th>
                      Pembayaran
                    </th>
                    <?php if($pembayaran==1){?>
                    <th>
                      TUNAI
                    </th>
                        <?php
                      } else { ?>
                      <th>
                        <p>KREDIT</p>
                        <p>DP <span>: Rp. <?=number_format($dp)?></span></p>
                        <p>KURANG <span>: Rp. <?=number_format($kurang)?></span></p>
                      </th>
                      
                      <?php
                      }
                      ?>
                  </tr>
                  
                  <tr><th>Total Bayar</th><th>Rp. <?php echo number_format($total_bayar); ?></th></tr>
                  
              </table>

                <h3>Detail Pembelian</h3>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
              <div class="col-xs-12">
                  <table class="table">
                    <tr>
                      <th>No</th>
                      <th>Tgl Masuk</th>
                      <th>Tgl Expire</th>
                      <th>Kode</th>
                      <th>Nama Bahan</th>
                      <th>Satuan</th>
                      <th>Harga Satuan</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th>Diskon</th>
                      <th>Sub Total</th>
                    </tr>
                    <?php
                    $total = 0;
                      $no=1;
                      // echo $id;
                        $detailData = $this->db->select('p.*,b.kode as kode_bahan,b.nama as nama_bahan,s.satuan,pd.tgl_masuk,pd.tgl_expire,pd.harga_satuan,pd.jumlah,pd.total_harga,pd.diskon,pd.subtotal')
                                      ->from('pembelian p')
                                      ->join('pembelian_detail pd','pd.id_pembelian=p.id_pembelian')
                                      ->join('bahan b','b.id_bahan=pd.id_bahan')
                                      ->join('satuan s','s.id_satuan=b.id_satuan')
                                      ->where('p.id_toko',$id_toko)
                                      ->where('pd.id_toko',$id_toko)
                                      ->where('b.id_toko',$id_toko)
                                      ->where('s.id_toko',$id_toko)
                                      ->where('p.id',$id)
                                      ->get()
                                      ->result();
                     foreach($detailData as $d){
                      
                     
                      ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?=$d->tgl_masuk?></td>
                      <td><?=$d->tgl_expire?></td>
                      <td><?=$d->kode_bahan?></td>
                      <td><?=$d->nama_bahan?></td>
                      <td><?=$d->satuan?></td>
                      <td>Rp. <?=number_format($d->harga_satuan)?></td>
                      <td><?=$d->jumlah?></td>
                      <td>Rp. <?=number_format($d->total_harga)?></td>
                      <td><?=$d->diskon?> %</td>
                      <td>
                        <b>
                          Rp. 
                          <?=number_format($d->subtotal)?>
                        </b>
                      </td>
                    </tr>
                  
                    <?php 
                      $tot = $total+=$d->subtotal;
                      } ?>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <b>
                          Total
                        </b>
                      </td>
                      <td>
                        <b>
                         Rp. <?=number_format($tot)?>
                        </b>
                      </td>
                    </tr>
                    <tr><td><a href="<?php echo site_url('admin/pembelian') ?>" class="btn btn-default">Cancel</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  </table>
              </div>
            </div>
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->