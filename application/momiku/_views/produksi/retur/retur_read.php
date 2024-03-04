
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Retur Pembelian</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">

            <div class="page-header">
              <h1>
                Retur Pembelian
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="varchar">Tanggal <?php echo form_error('tgl') ?></label>
                          <input type="text" class="form-control" name="tgl" id="tgl" placeholder="dd-mm-yyyy" value="<?php echo $tgl; ?>" autocomplete="off" readonly />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                          <label for="varchar">Faktur Pembelian <?php echo form_error('id_faktur') ?></label>
                          <input type="text" class="form-control" value="<?php echo $no_faktur." - ".$nama_supplier ?>" readonly />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <?php
                        $ket = '';
                        if ($pembayaran=="1") {
                          echo '<span class="badge badge-danger">Hutang</span>';
                          $ket = 'Jatuh Tempo: <b>'.$deadline.'</b>, Total Hutang: <b>'.number_format($hutang*1,0,',','.').'</b>, Kurang: <b>'.number_format($kurang*1,0,',','.').'</b>';
                        } else {
                          echo '<span class="badge badge-primary">Tunai</span>';
                        }
                        ?>&nbsp;&nbsp;<?php echo $ket ?>
                      </div>
                    </div>
                    <!-- <div class="col-md-10">
                      <div class="form-group panel-ket">
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="table-responseive">
                        <table class="table table-bordered" id="mytable">
                          <thead>
                            <tr>
                              <th width="10">No</th>
                              <th width="400">Nama Produk</th>
                              <th width="150" class="text-center">Harga Satuan Beli</th>
                              <th width="100" class="text-center">Jumlah Beli</th>
                              <th width="100" class="text-center">Jumlah Retur</th>
                              <th width="100" class="text-center">Sisa</th>
                              <th width="150" class="text-center">Subtotal</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $total = 0; 
                          $no = 1; 
                          foreach ($data_produk as $key): 
                            $subtotal=$key->harga_satuan*$key->jumlah; 
                          ?>
                            <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $key->nama_produk ?></td>
                              <td class="text-right"><?php echo number_format($key->harga_satuan*1,0,',','.') ?></td>
                              <td class="text-right"><?php echo number_format($key->jumlah_beli*1,0,',','.') ?></td>
                              <td class="text-right"><?php echo number_format($key->jumlah*1,0,',','.') ?></td>
                              <td class="text-right"><?php echo number_format(($key->jumlah_beli*1)-($key->jumlah*1),0,',','.') ?></td>
                              <td class="text-right"><?php echo number_format($subtotal,0,',','.') ?></td>
                            </tr>
                          <?php $total += $subtotal; $no++; endforeach ?>
                          </tbody>
                          <tfoot>
                            <tr>
                              <th colspan="6" class="text-right">Total</th>
                              <th class="text-right"><span class="total"><?php echo number_format($total,0,',','.') ?></span></th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>

                  <a href="<?php echo base_url() ?>produksi/retur" class="btn btn-default">Batal</a>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <script type="text/javascript">
      </script>