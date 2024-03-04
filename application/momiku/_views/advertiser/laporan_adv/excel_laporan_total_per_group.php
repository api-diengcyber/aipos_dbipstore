<?php foreach($per_group as $group => $data_laporan){?>
<table border="1" style="margin-bottom:30px">
  <thead style="background:yellow" class="table table-bordered table-striped">
    <tr>
        <th rowspan="3">TANGGAL</th>
        <th colspan="9">TOTAL <?php echo $group;?></th>
    </tr>
    <tr>
        <td rowspan="2">LEADS</td>
        <td rowspan="2">Per WA</td>
        <td rowspan="2">DAILY</td>
        <td colspan="3">AKUN IKLAN</td>
        <td rowspan="2">Konversi</td>
        <td rowspan="2">Dashboard</td>
        <td rowspan="2">% LEADS</td>
    </tr>
    <tr>
        <td>1</td>
        <td>2</td>
        <td>TOTAL AKUN IKLAN</td>
    </tr>
  </thead>
  <?php foreach($data_laporan as $laporan){?>
  <tr>
    <td><?php echo $laporan->tanggal;?></td>
    <td><?php echo $laporan->leads;?></td>
    <td><?php echo $laporan->per_wa;?></td>
    <td><?php echo $laporan->daily;?></td>
    <td><?php echo $laporan->tanggal;?></td>
    <td><?php echo $laporan->akun_1;?></td>
    <td><?php echo $laporan->akun_2;?></td>
    <td><?php echo $laporan->total_akun_iklan;?></td>
    <td><?php echo round($laporan->dashboard,2);?></td>
    <td><?php echo ($laporan->pers_leads)?$laporan->pers_leads:0;?> %</td>
  </tr>
  <?php } ?>
</table>
  <?php } ?>