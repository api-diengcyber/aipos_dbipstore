<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
            </li>
            <li class=""><?php echo $this->uri->segment(1);?></li>
            <li class="active"><?php echo $this->uri->segment(2);?></li>
        </ul><!-- /.breadcrumb -->

        
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <?php foreach($per_group as $group => $data_laporan){?>
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

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->