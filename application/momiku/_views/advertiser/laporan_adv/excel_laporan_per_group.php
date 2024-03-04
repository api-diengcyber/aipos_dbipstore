<?php  foreach ($per_group as $group => $item) {
     foreach ($item as $produk => $data_laporan) {  
     ?> 
    <h4><?php echo $produk." ".$group;?></h4>
    <table class="table table-bordered table-striped" id="mytable" border="1">
        <thead>
            <tr>
                <th rowspan="2" style="background:green;color:white">TANGGAL</th>
                <th rowspan="2" style="background:green;color:white">Leads</th>
                <th rowspan="2" style="background:green;color:white">Konversi</th>
                <th rowspan="2" style="background:green;color:white">%Leads</th>
                <th rowspan="2" style="background:green;color:white">Per WA</th>
                <th rowspan="2" style="background:green;color:white">ANGGARAN</th>
                <th rowspan="2" style="background:green;color:white">DASHBOARD</th>
                <th colspan="4">DATA</th>
            </tr>
            <tr>
                <th>klik</th>
                <th>view</th>
                <th>% View</th>
                <th>% Konversi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data_laporan as $laporan){ ?>
            <tr>
                <td><?php echo $laporan->tanggal;?></td>
                <td><?php echo $laporan->leads;?></td>
                <td><?php echo $laporan->konversi;?></td>
                <td><?php echo round($laporan->leads / $laporan->konversi * 100,2)." %";?></td>
                <td>Rp <?php echo number_format($laporan->anggaran/$laporan->leads,0,',','.');?></td>
                <td>Rp <?php echo number_format($laporan->anggaran,0,',','.');?></td>
                <td>Rp <?php echo number_format(round($laporan->anggaran/$laporan->konversi,2),0,',','.');?></td>
                <td><?php echo $laporan->klik;?></td>
                <td><?php echo $laporan->view;?></td>
                <td><?php echo round(($laporan->view/$laporan->klik)*100,2);?> %</td>
                <td><?php echo round(($laporan->konversi/$laporan->view)*100,2);?> %</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } 
}?>

<?php foreach($total_per_group as $group => $data_laporan){?>
    <table border="1" style="margin-bottom:30px" class="table table-bordered table-striped">
    <thead style="background:yellow" >
        <tr>
            <th rowspan="3">TANGGAL</th>
            <th colspan="9" style="text-align:center">TOTAL <?php echo $group;?></th>
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
        <td>Rp <?php echo number_format(round($laporan->per_wa,2),0,',','.');?></td>
        <td>Rp <?php echo number_format($laporan->daily,0,',','.');?></td>
        <td><?php echo $laporan->tanggal;?></td>
        <td>Rp <?php echo number_format($laporan->akun_1,0,',','.');?></td>
        <td>Rp <?php echo number_format($laporan->akun_2,0,',','.');?></td>
        <td>Rp <?php echo number_format($laporan->total_akun_iklan,0,',','.');?></td>
        <td>Rp <?php echo number_format(round($laporan->dashboard,2),0,',','.');?></td>
        <td><?php echo ($laporan->pers_leads)?$laporan->pers_leads:0;?> %</td>
    </tr>
    <?php } ?>
    </table>
<?php } ?>