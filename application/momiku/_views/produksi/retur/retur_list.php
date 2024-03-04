
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
<!--               <li class="">Laporan</li>
              <li class="active">Retur</li> -->
              <li class="active">Retur Pembelian</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- /.nav-search -->
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
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 text-center">
                          <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                          </div>
                        </div>
                        <div class="col-md-4 text-right">
                        </div>
                    </div>
                    <form method="post" id="formPeriode" class="form-horizontal" action="">
                      <div class="row">
                        <div class="col-md-2">
                          <a href="<?php echo base_url() ?>produksi/retur/create" class="btn btn-primary">Tambah Retur</a>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right">Periode</label>
                            <div class="col-sm-4">
                              <div class="pos-rel">
                                  <input type="hidden" id="awal_periode" name="awal_periode" value="<?php echo $awal_periode ?>">
                                  <input type="hidden" id="akhir_periode" name="akhir_periode" value="<?php echo $akhir_periode ?>">
                                  <input class="form-control" type="text" name="periode" id="id-date-range-picker-1" value="0" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div>
                      <table id="mytable" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="2" class="center">No</th>
                            <th>No Faktur</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no=1;
                          foreach ($data_retur as $key):
                          ?>
                          <tr>
                            <td class="center"><?php echo $no ?></td>
                            <td><?php echo $key->no_faktur ?></td>
                            <td><?php echo $key->tgl ?></td>
                            <td><?php echo $key->nama_supplier ?></td>
                            <td class="center"><a href="<?php echo base_url() ?>produksi/retur/read/<?php echo $key->id ?>" class="btn btn-xs btn-success"><i class="ace-icon fa fa-check bigger-120"></i></a>&nbsp;&nbsp;<a onclick="javascript:return confirm('Are you sure ?')" href="<?php echo base_url() ?>produksi/retur/delete/<?php echo $key->id ?>" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash bigger-120"></i></a></td>
                          </tr>
                          <?php
                          $no++;
                          endforeach;
                          ?>
                        </tbody>
                      </table>
                    </div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<!-- JQUERY -->
<script>
  jQuery(function($){
    $("#mytable").dataTable();
    $('input[id=id-date-range-picker-1]').daterangepicker({
        'applyClass' : 'btn-sm btn-success',
        'cancelClass' : 'btn-sm btn-default',
        locale: {
          applyLabel: 'Apply',
          cancelLabel: 'Cancel',
          format: 'YYYY-MM-DD',
        },
        startDate:'<?php echo $awal_periode ?>',
        endDate:'<?php echo $akhir_periode ?>',
    },
    function(start, end, label){
        $("#awal_periode").val(start.format('YYYY-MM-DD'));
        $("#akhir_periode").val(end.format('YYYY-MM-DD'));
        $("#formPeriode").submit();
    })
    .prev().on(ace.click_event, function(){
        $(this).next().focus();
    });
  });
</script>
<!-- JQUERY -->