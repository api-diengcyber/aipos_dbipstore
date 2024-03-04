<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Buku Besar 2</title>
	<link rel="stylesheet" href="">
	<style>
		body{
			font-family:sans-serif;
			font-size:12px;
		}
		h2{
			margin:0px;
		}
		#divider{
			border:1px solid black;
		}
		#divider-dotted{
			border:1px dotted black;
		}
		#space{
			margin:10px;
		}
		table{
			border-collapse: collapse;
		}
		table, tr, th{
			border:1px solid black;
			padding:5px;
		}
		table, tr, td{
			border:1px solid black;
			padding:5px;
		}
	</style>
</head>
<body>
	<center>
		<h2><?php echo $toko->nama_toko ?></h2>
		<span><?php echo $toko->alamat ?> - <?php echo $toko->telp ?></span>
		<hr id="divider">
		<h3>Buku Besar 2</h3>
		Periode : <span><?php echo $awal_periode ?> - <?php echo $akhir_periode ?></span>
		<div id="space"></div>
	      <?php
          $saldo_awal = 0;
          foreach ($akun_saldo_awal as $key_akun_sa) {
            $ak = substr($key_akun_sa->kode,0,1);
            if($ak=='2' || $ak=='3'){
              $ak_saldo_awal = $key_akun_sa->saldo * -1;
            }else{
              $ak_saldo_awal = $key_akun_sa->saldo;
            }
            $saldo_awal += $ak_saldo_awal;
          }
          if ($level=="5") {
            $ppn_keluaran = 0;
            $ppn_keluaran_baru = 0;
            foreach ($akun_saldo_awal as $key_akun_sa) :
              if ($key_akun_sa->id_akun == 59) { // PPN LAMA [ADMIN]
                $ppn_keluaran += $key_akun_sa->saldo*-1;
              }
              if ($key_akun_sa->id_akun == 75) { // PPN BARU [MARKETING]
                $ppn_keluaran_baru += $key_akun_sa->saldo*-1;
              }
            endforeach;
            $saldo_awal = $saldo_awal - $ppn_keluaran + $ppn_keluaran_baru;
          }
	      ?>
	        <table>
	          <thead>
	            <tr>
	              <th colspan="3"><span style="float:right;">Saldo Awal</span></th>
	              <th><span style="float:right;"><?php echo number_format($saldo_awal,0,',','.') ?></span></th>
	            </tr>
	            <tr>
	              <th width="2" class="center">No</th>
	              <th>Kode</th>
	              <th>Akun</th>
	              <th>Saldo (Rp) </th>
	            </tr>
	          </thead>
	          <tbody>
	          <?php
	          $i=1;
	          $total_saldo = 0;
	          foreach ($data_akun->result() as $akun):
	            $saldo = 0;
                $current_id_akun = 0;
	            foreach ($data_saldo->result() as $key_saldo) {
	              if($key_saldo->id_akun == $akun->id){
                    $current_id_akun = $akun->id;
	                $saldo += $key_saldo->saldo;
	              }
	            }
                if ($level=="5") {
                  $ppn_keluaran = 0;
                  $ppn_keluaran_baru = 0;
                  if ($current_id_akun==67) { // KAS BESAR
                    foreach ($data_saldo->result() as $key_saldo) :
                      if ($key_saldo->id_akun == 59) { // PPN LAMA [ADMIN]
                        $ppn_keluaran += $key_saldo->saldo*-1;
                      }
                      if ($key_saldo->id_akun == 75) { // PPN BARU [MARKETING]
                        $ppn_keluaran_baru += $key_saldo->saldo*-1;
                      }
                    endforeach;
                    $saldo = $saldo - $ppn_keluaran + $ppn_keluaran_baru;
                  }
                }
	            $ak = substr($akun->kode,0,1);
	            if($ak=='2' || $ak=='3'){
	              $saldo = $saldo * -1;
	            }else{
	              $saldo = $saldo;
	            }
	            $total_saldo += $saldo;
	          ?>
	            <tr>
	              <td><?php echo $i ?></td>
	              <td><?php echo $akun->kode ?></td>
	              <td><?php echo $akun->akun ?></td>
	              <td><span style="float:right;"><?php echo number_format($saldo,0,',','.') ?></span></td>
	            </tr>
	          <?php $i++; endforeach ?>
	          </tbody>
	          <tfoot>
	            <tr>
	              <th colspan="3"><span style="float:right;">Total Saldo</span></th>
	              <th><span style="float:right;"><?php echo number_format($total_saldo,0,',','.') ?></span></th>
	            </tr>
	            <?php
	            $saldo_akhir = $saldo_awal + $total_saldo;
	            ?>
	            <tr>
	              <th colspan="3"><span style="float:right;">Saldo Akhir</span></th>
	              <th><span style="float:right;"><?php echo number_format($saldo_akhir,0,',','.') ?></span></th>
	            </tr>
	          </tfoot>
	        </table>

	</center>

</body>
</html>