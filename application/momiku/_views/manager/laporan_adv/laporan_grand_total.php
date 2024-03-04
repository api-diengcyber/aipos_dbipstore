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
                    <div class="widget-box widget-color-dark" id="recent-box" style="margin-bottom:20px">
                        <div class="widget-header">
                            <h4 class="widget-title bigger lighter smaller">
                            <i class="ace-icon fa fa-users"></i>Laporan Per Group
                            </h4>
                            <div class="widget-toolbar no-border">
                            <ul class="nav nav-tabs" id="recent-tab">
                                
                            </ul>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main padding-4">
                                <table border="1" class="table table-bordered table-striped">
                                    <thead>
                                <tr>
                                    <th rowspan="3">TANGGAL</th>
                                    <th colspan="10">GRAND TOTAL ALL TEAM</th>
                                </tr>
                                <tr>
                                    <td rowspan="2">LEADS TOTAL</td>
                                    <td rowspan="2">PER WA</td>
                                    <td rowspan="2">DAILY</td>
                                    <td colspan="<?php echo count($data_grand['data_group'])+1;?>" style="text-align:center">ANGGARAN PENGIKLAN</td>
                                    <td rowspan="2">KONVERSI</td>
                                    <td rowspan="2">DASHBOARD</td>
                                    <td rowspan="2">LEADS%</td>
                                </tr>
                                <tr>
                                    <?php foreach($data_grand['data_group'] as $group){?>
                                    <td><?php echo $group->group;?></td>
                                    <?php } ?>
                                    <td>TOTAL AKUN IKLAN</td>
                                </tr>
                                </thead>
                                <?php foreach($data_grand['data_laporan'] as $laporan){?>
                                <tr>
                                    <td><?php echo $laporan->tanggal;?></td>
                                    <td><?php echo $laporan->leads;?></td>
                                    <td>Rp <?php echo number_format($laporan->per_wa,0,',','.');?></td>
                                    <td>Rp <?php echo number_format($laporan->daily,0,',','.');?></td>
                                    <?php foreach($laporan->data_adv as $group){?>
                                    <td>Rp <?php echo number_format($group->anggaran_pengiklan,0,',','.');?></td>
                                    <?php } ?>
                                    <td>Rp <?php echo number_format($laporan->total_akun,0,',','.');?></td>
                                    <td><?php echo $laporan->konversi;?></td>
                                    <td>Rp <?php echo number_format($laporan->dashboard,0,',','.');?></td>
                                    <td><?php echo $laporan->pers_leads;?> %</td>
                                </tr>
                                <?php } ?>
                                </table>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->