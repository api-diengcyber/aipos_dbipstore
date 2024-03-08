<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Cetak Packing</title>
<style>
@media print{
    @page {
        size: landscape;
    }
    .pagebreak {
        clear: both;
        page-break-after: always;
    }
}
body {
    font-family: Arial;
    font-size: 12px;
    /* writing-mode: tb-rl; */
}
.table {
    border-collapse: collapse;
    width: 100%;
    /* border: 1px dotted #777; */
}
.table tr td {
    padding: 3px;
    /* border: 1px dotted #777; */
}
.table.table-bordered {
    border: 1px solid #000;
}
.table.table-bordered tr td {
    border: 1px solid #000;
}
.text-right {
    text-align: right;
}
.text-center {
    text-align: center;
}
.td-row-detail {
    background-color: yellow;
    padding: 14px 4px 14px 4px!important;
    font-weight: bold;
}
</style>
</head>
<body onload="print()">
<div>
<?php 
$per_hal = 4;
$no = 0;
foreach ($data_order as $key) : 
    $no++;
    $break = $no % $per_hal;
    $jml_koli = $koli[$key->id_order];
    
    // update koli orders 
    $data_update = array(
        'koli' => $jml_koli,
    );
    $this->db->where('id_toko', 158);
    $this->db->where('id_orders_2', $key->id_order);
    $this->db->update('orders', $data_update);
?>
<div style="width:calc(49% - 10px);border:1px solid #000;padding-left:10px; float: left;">
    <table class="table">
        <tr>
            <td rowspan="2" class=""><img src="<?php echo base_url() ?>assets/images/carica-logo.png" width="50"></td>
            <td colspan="4" width="450" style="background-color: yellow; padding-top:15px; vertical-align:bottom;"><b>CARICA GEMILANG</b></td>
            <td class="text-right" style="vertical-align:bottom;">No Invoice</td>
            <td width="5" style="vertical-align:bottom;">:</td>
            <td style="vertical-align:bottom;"><?php echo $key->no_invoice ?></td>
        </tr>
        <tr>
            <td colspan="4" style="background-color: yellow;"><i>Seger Manis Lezat dan Ngangeni</i></td>
            <td class="text-right">Kurir</td>
            <td>:</td>
            <td>Dakotacargo</td>
        </tr>
        <tr>
            <td>Kepada / To</td>
            <td colspan="4"></td>
            <td class="text-right">Ongkir</td>
            <td>:</td>
            <td>Rp<?php echo number_format($key->ongkir,0,'.',',') ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td width="5">:</td>
            <td colspan="2"><b><?php echo $key->nama_penerima ?></b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>No. Telepon</td>
            <td>:</td>
            <td colspan="2"><b><?php echo $key->no_hp ?></b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Alamat</td>
            <td style="vertical-align: top;">:</td>
            <td colspan="6" style="height: 40px; vertical-align: top;">
                <?php echo $key->alamat_penerima ?>
            </td>
        </tr>
        <tr>
            <td>Jumlah Order</td>
            <td>:</td>
            <td colspan="6" rowspan="5" style="padding:0px;">
            	<?php
            	$c125 = array(	
	            	'4' => '',
	            	'6' => '',
	            	'12' => '',
	            	'48' => '',
	            	'96' => '',
            	);
            	$c250 = array(	
	            	'3' => '',	
	            	'6' => '',
            	);
            	$botol6 = '';
            	$lainnya = "";
            	foreach ($key->detail_order as $key2) {
            		$nama_produk = strtolower($key2->nama_produk)." ";
            		if (strpos($nama_produk, 'cup')!==false) {
	            		if (strpos($nama_produk, '125')!==false) {
		            		if (strpos($nama_produk, '4 ')!==false) {
		            			$c125['4'] = $key2->jumlah;
		            		} else if (strpos($nama_produk, '6 ')!==false) {
		            			$c125['6'] = $key2->jumlah;
		            		} else if (strpos($nama_produk, '12 ')!==false) {
		            			$c125['12'] = $key2->jumlah;
		            		} else if (strpos($nama_produk, '48 ')!==false) {
		            			$c125['48'] = $key2->jumlah;
		            		} else if (strpos($nama_produk, '96 ')!==false) {
		            			$c125['96'] = $key2->jumlah;
		            		}
	            		} else if (strpos($nama_produk, '250')!==false) {
		            		if (strpos($nama_produk, '3 ')!==false) {
		            			$c250['3'] = $key2->jumlah;
		            		} else if (strpos($nama_produk, '6 ')!==false) {
		            			$c250['6'] = $key2->jumlah;
		            		}
	            		}
            		} else if (strpos($nama_produk, 'botol')!==false) {
	            		if (strpos($nama_produk, '6')!==false) {
	            			$botol6 = $key2->jumlah;
	            		}
            		} else {
		            	$lainnya .= $key2->nama_produk.' '.$key2->jumlah.'<br>';
            		}
            	}
            	?>
                <table class="table table-bordered">
                    <tr>
                        <td colspan="5" class="text-center">Cup 125</td>
                        <td colspan="2" class="text-center">Cup 250</td>
                        <td class="text-center">Botol</td>
                        <td rowspan="2" class="text-center">Lainnya</td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">6</td>
                        <td class="text-center">12</td>
                        <td class="text-center">48</td>
                        <td class="text-center">96</td>
                        <td class="text-center">B3</td>
                        <td class="text-center">B6</td>
                        <td class="text-center">6</td>
                    </tr>
                    <tr>
                        <td class="text-center td-row-detail"><?php echo $c125['4'] ?></td>
                        <td class="text-center td-row-detail"><?php echo $c125['6'] ?></td>
                        <td class="text-center td-row-detail"><?php echo $c125['12'] ?></td>
                        <td class="text-center td-row-detail"><?php echo $c125['48'] ?></td>
                        <td class="text-center td-row-detail"><?php echo $c125['96'] ?></td>
                        <td class="text-center td-row-detail"><?php echo $c250['3'] ?></td>
                        <td class="text-center td-row-detail"><?php echo $c250['6'] ?></td>
                        <td class="text-center td-row-detail"><?php echo $botol6 ?></td>
                        <td class="text-center td-row-detail" style="font-weight:100;"><?php echo $lainnya ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Berat</td>
            <td>:</td>
            <td width="50" class="text-right"><b>0</b></td>
            <td>Kg</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Jumlah Koli</td>
            <td>:</td>
            <td class="text-right"><b><?php echo $jml_koli*1 ?></b></td>
            <td>Koli</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Pengirim</td>
            <td>:</td>
            <td colspan="2"><?php echo $key->d_nama ?></td>
            <td colspan="3">Alamat: <?php echo $key->d_alamat ?></td>
            <td></td>
        </tr>
        <tr>
            <td>No. HP</td>
            <td>:</td>
            <td colspan="2"><?php echo $key->d_hp ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">"INGAT WONOSOBO, INGAT CARICA GEMILANG"</td>
            <td colspan="2" class="text-right" style="font-size: 10px;">Packing Date</td>
            <td class="text-right"><?php echo (date('m')*1).'/'.date('d/y') ?></td>
        </tr>
    </table>
</div>
<?php if ($break == 0) { ?>
<div class="pagebreak"> </div>
<?php } ?>
<?php endforeach; ?>
</div>
</body>
</html>