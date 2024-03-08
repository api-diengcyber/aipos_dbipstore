<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Timeseries Produk</title>
  <style>
  body {
    font-size: 13px;
  }
  .text-center {
    text-align: center;
  }
  .text-right {
    text-align: right;
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  td, th {
    padding: 4px;
  }
  </style>
</head>
<body onload="print()">
  <table border="1">
    <thead>
      <tr>
        <th rowspan="2" width="70">No</th>
        <th rowspan="2" width="350">Toko</th>
        <th rowspan="2" width="100">Telp</th>
        <th rowspan="2" width="300">Principal</th>
        <th rowspan="2" width="300">Produk</th>
        <?php 
        $array_jumlah = array();
        for ($i = $month_start*1; $i <= $month_end*1; $i++):
          $array_jumlah[$i]['dibeli'] = 0;
          $array_jumlah[$i]['nominal'] = 0;
        ?>
        <th colspan="2" width="200" class="text-center"><?php echo ucfirst(strtolower($array_month[$i])) ?> <?php echo $tahun ?></th>
        <?php endfor; ?>
      </tr>
      <tr>
        <?php for ($i = $month_start*1; $i <= $month_end*1; $i++): ?>
        <th width="100" class="text-center">Dibeli</th>
        <th width="100" class="text-center">Nominal</th>
        <?php endfor; ?>
      </tr>
    </thead>
    <tbody>
    <?php 
    $no = 0; 
    $current_toko = '';
    $current_principal = '';
    foreach ($data_produk_jual as $key):
      $toko = $key->nama."<br>".$key->alamat;
      if ($toko=="<br>") {
        $toko = "Tidak ada sales";
      }
      if ($current_toko==$toko) {
        $tampil_toko = false;
        $style = 'border-top:0px solid white !important;border-bottom:0px solid white !important;';
        if ($current_principal==$key->nama_kategori) {
          $tampil_principal = false;
          $style_principal = $style;
        } else {
          $tampil_principal = true;
          $style_principal = 'border-bottom:0px solid white !important;';
        }
      } else {
        $tampil_toko = true;
        $tampil_principal = true;
        $style = 'border-bottom:0px solid white !important;';
        $style_principal = $style;
        $no++;
      }
    ?>
      <tr>
        <td style="<?php echo $style ?>vertical-align:top;"><?php echo ($tampil_toko) ? $no : "" ?></td>
        <td style="<?php echo $style ?>vertical-align:top;"><?php echo ($tampil_toko) ? $toko : "" ?></td>
        <td style="<?php echo $style ?>vertical-align:top;"><?php echo ($tampil_toko) ? $key->telp : "" ?></td>
        <td style="<?php echo $style_principal ?>"><?php echo ($tampil_principal) ? $key->nama_kategori : "" ?></td>
        <td style="vertical-align:top;"><?php echo $key->nama_produk ?></td>
        <?php 
        for ($i = $month_start*1; $i <= $month_end*1; $i++):
          $detail = (Object) $that->get_detail($key->id_produk_2, $key->id_member, $i, $tahun);
          $array_jumlah[$i]['dibeli']+=$detail->dibeli;
          $array_jumlah[$i]['nominal']+=$detail->nominal;
        ?>
        <td class="text-right"><span <?php echo ($detail->dibeli > 0) ? "" : "style='color:red;'" ?>><?php echo $detail->dibeli ?></span></td>
        <td class="text-right"><span <?php echo ($detail->nominal > 0) ? "" : "style='color:red;'" ?>><?php echo number_format($detail->nominal,0,',','.') ?></span></td>
        <?php endfor; ?>
      </tr>
    <?php 
      $current_toko = $toko;
      $current_principal = $key->nama_kategori;
    endforeach;
    ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5" class="text-right">JUMLAH</th>
        <?php for ($i = $month_start*1; $i <= $month_end*1; $i++) : ?>
        <th class="text-right"><?php echo $array_jumlah[$i]['dibeli']*1 ?></th>
        <th class="text-right"><?php echo number_format($array_jumlah[$i]['nominal']*1,0,',','.') ?></th>
        <?php endfor; ?>
      </tr>
    </tfoot>
  </table>
</body>
</html>