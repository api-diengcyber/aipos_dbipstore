<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
      font-size: 12px;
    }
    .table {
      border: 1px solid #000;
      border-collapse: collapse;
      width:100%;
    }
    .table tr th {
      border: 1px solid #000;
      padding: 2px;
    }
    .table tr td {
      border: 1px solid #000;
      padding: 2px;
    }
    ul {
      padding: 0px 0px 0px 5px;
      margin: 0px;
    }
    ul li {
      padding: 0px;
      list-style: none;
    }
    .text-center {
      text-align: center;
    }
    </style>
  </head>
  <body>

      <div class="text-center">
        <h2>LAPORAN ORDER CS</h2>
      </div>
  
      <table class="table" id="mytable">

          <thead>
            <th width="80px">NO</th>
            <th>NO INV. <br> TANGGAL</th>
            <th width="100">INFO CS</th>
            <th>INFO PENERIMA</th>
            <th>HARGA</th>
            <th>DETAIL ORDER</th>
            <th width="200">KETERANGAN</th>
            <th width="200">ACTION</th>
          </thead>

          <tbody>
            <?php 
            $no = 1;
            
            $total_harga = 0;
            $total_hs = 0;
            $total_gc = 0;
            $total_ongkir = 0;
            $total_cod = 0;
            $total_nominal = 0;
            
            $array_ket_nama = array();
            $array_ket_media = array();
            
            foreach ($data_order as $order_sales):
                $total_harga += $order_sales->harga;
                $total_hs += $order_sales->hs*1;
                $total_gc += $order_sales->gc*1;
                $total_cod += $order_sales->biaya_lain;
                $total_ongkir += $order_sales->ongkir;
                $total_nominal += $order_sales->nominal;
                
                if (empty($array_ket_nama[$order_sales->nama_cs])) {
                    $array_ket_nama[$order_sales->nama_cs] = array(
                        'harga' => 0,
                        'hs' => 0,
                        'gc' => 0,
                    );
                }
                $array_ket_nama[$order_sales->nama_cs]['harga'] += $order_sales->harga;
                $array_ket_nama[$order_sales->nama_cs]['hs'] += $order_sales->hs;
                $array_ket_nama[$order_sales->nama_cs]['gc'] += $order_sales->gc;
                
                if (empty($array_ket_media[$order_sales->media])) {
                    $array_ket_media[$order_sales->media] = array(
                        'nominal' => 0,
                        'selisih' => 0,
                        'ongkir' => 0,
                        'saldo' => 0,
                        'biaya_lain' => 0,
                    );
                }
                $array_ket_media[$order_sales->media]['nominal'] += $order_sales->nominal;
                $array_ket_media[$order_sales->media]['selisih'] += $order_sales->selisih;
                $array_ket_media[$order_sales->media]['ongkir'] += $order_sales->ongkir;
                $array_ket_media[$order_sales->media]['saldo'] += $order_sales->saldo;
                $array_ket_media[$order_sales->media]['biaya_lain'] += $order_sales->biaya_lain;
            ?>
            <tr>
              <td class="text-center"><?php echo $no++;?></td>
              <td>
                <div>
                  <?php echo $order_sales->no_invoice ?>
                </div>
                <?php echo $order_sales->tanggal ?>
              </td>
              <td>
                <div><?php echo $order_sales->nama_cs ?></div>
                <?php echo $order_sales->no_hp_cs ?>
              </td>
              <td>
                <div><?php echo $order_sales->nama_penerima ?></div>
                <div><?php echo $order_sales->no_hp ?></div>
              </td>
              <td>
                  <?php echo 'Rp '.number_format($order_sales->harga,0,',','.'); ?>
              </td>
              <td>
                <h6 style="margin:0px;"><b>HERBASKIN : </b> <?php echo $order_sales->hs ?></h6>
                <h6 style="margin:0px;"><b>GRACILLI : </b> <?php echo $order_sales->gc ?></h6>
              </td>
              <td>
                <ul class="list-unstyled">
                  <li>
                    MEDIA : <?php echo $order_sales->media;?>
                  </li>
                  <?php if($order_sales->media == "Whatsapp"){ ?>
                  <li>BSU TRANSFER : Rp <?php echo number_format($order_sales->nominal,0,',','.'); ?></li>
                  <li>BANK : <?php echo $order_sales->nama_bank; ?></li>
                  <li>SELISIH : Rp <?php echo number_format($order_sales->selisih,0,',','.'); ?></li>
                  <li>ONGKIR : <?php echo $order_sales->ongkir;?></li>
                  <?php } ?>
                  <?php if($order_sales->media == "Shopee"){ ?>
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
                  <li>ONGKIR : <?php echo $order_sales->ongkir;?></li>
                  <li>BIAYA COD : <?php echo $order_sales->biaya_lain;?></li>
                  <li>TOTAL : <?php echo $order_sales->nominal+$order_sales->ongkir+$order_sales->biaya_lain;?></li>
                  <?php } ?>
                </ul>
              </td>
              <td>
                STATUS : <?php echo $order_sales->status ?> <br>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
              <tr>
                  <th colspan="4">TOTAL</th>
                  <th>Rp <?php echo number_format($total_harga,0,',','.') ?></th>
                  <th>
                    <h6 style="margin:0px;"><b>HERBASKIN : </b> <?php echo $total_hs ?></h6>
                    <h6 style="margin:0px;"><b>GRACILLI : </b> <?php echo $total_gc ?></h6>
                  </th>
                  <th>
                    <h6 style="margin:0px;"><b>TOTAL ONGKIR : </b> <?php echo number_format($total_ongkir,0,',','.') ?></h6>
                    <h6 style="margin:0px;"><b>BIAYA COD : </b> <?php echo number_format($total_cod,0,',','.') ?></h6>
                  </th>
                  <th></th>
              </tr>
          </tfoot>
      </table>
      <!--
      <div style="margin-top:10px;">
          <div style="width:40%;margin-right:5px;">
              <table border="1" class="table">
                  <thead>
                      <tr>
                          <th>Nama CS</th>
                          <th>Harga</th>
                          <th>Detail Order</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach($array_ket_nama as $value => $key): ?>
                      <tr>
                          <td><?php echo $value ?></td>
                          <td>Rp <?php echo number_format($key['harga']*1,0,',','.') ?></td>
                          <td>
                            <h6 style="margin:0px;"><b>HERBASKIN : </b> <?php echo $key['hs'] ?></h6>
                            <h6 style="margin:0px;"><b>GRACILLI : </b> <?php echo $key['gc'] ?></h6>
                          </td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
          
          <div style="width:40%;margin-right:5px;">
              <table border="1" class="table">
                  <thead>
                      <tr>
                          <th>Media</th>
                          <th>Detail</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach($array_ket_media as $value => $key): ?>
                      <tr>
                          <td><?php echo $value ?></td>
                          <td></td>
                      </tr>
                      <?php endforeach ?>
                  </tbody>
              </table>
          </div>
              
      </div>
      -->

      <div style="text-align:right;width:100%;">
        <table style="float:right;">
          <tr>
            <td class="text-center" style="padding:50px;">LEADER</td>
          </tr>
          <tr>
            <td>(..............................................)
      <br><br><br><br><br></td>
          </tr>
        </table>
         <table style="float:right;">
          <tr>
            <td class="text-center" style="padding:50px;">ADMIN</td>
          </tr>
          <tr>
            <td>(..............................................)
      <br><br><br><br><br></td>
          </tr>
        </table>
         <table style="float:right;">
          <tr>
            <td class="text-center" style="padding:50px;">GUDANG</td>
          </tr>
          <tr>
            <td>(..............................................)
      <br><br><br><br><br></td>
          </tr>
        </table>
      </div>


  </body>
</html>