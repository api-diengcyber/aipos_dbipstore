
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Manajemen Produk</li>
              <li class="active">Penyesuaian Stok</li>
            </ul><!-- /.breadcrumb -->

            
          </div>

          <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
              </div>

              <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <div class="pull-left">
                      <select id="skin-colorpicker" class="hide">
                        <?php echo $theme_option ?>
                        
                        
                        
                      </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                    <label class="lbl" for="ace-settings-add-container">
                      Inside
                      <b>.container</b>
                    </label>
                  </div>
                </div><!-- /.pull-left -->

                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                  </div>
                </div><!-- /.pull-left -->
              </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->

            <div class="page-header">
              <h1>
                Penyesuaian Stok
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row" style="margin-bottom: 10px">
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

                <form method="post" action="<?php echo $action ?>">
                  <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" class="form-control" name="tgl" value="<?php echo $tgl ?>" id="datepicker1" placeholder="dd-mm-yyyy" />
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="form-group">
                          <select class="form-control" name="cabang" id="cabang" required>
                            <option value="">-- Pilih Gudang --</option>
                            <?php foreach ($data_cabang as $val) : ?>
                            <option value="<?php echo $val->id_users ?>"><?php echo $val->first_name.' '.$val->last_name ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-primary">Proses</button>
                    </div>
                    <div class="col-md-4">
                    </div>
                  </div>
                </form>
                
                <div class="table-responsive">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                      <tr>
                        <th width="20px">No</th>
                        <th>Tgl SO</th>
                        <th>Cabang</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach ($data_so as $key) : ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $key->tgl_so ?></td>
                        <td><?php echo $key->first_name.' '.$key->last_name ?></td>
                        <td>
                          <?php if ($key->status == "1") { ?>
                          <a href="#" class="btn btn-primary btn-xs" disabled>Edit Stok</a>&nbsp;&nbsp;
                          <a href="#" class="btn btn-primary btn-xs" disabled>Verifikasi Data</a>&nbsp;&nbsp;
                          <?php } else { ?>
                          <a href="<?php echo base_url() ?>admin/penyesuaian_stok/edit/<?php echo $key->id ?>" class="btn btn-primary btn-xs">Edit Stok</a>&nbsp;&nbsp;
                          <a href="<?php echo base_url() ?>admin/penyesuaian_stok/simpan/<?php echo $key->id ?>" class="btn btn-primary btn-xs">Verifikasi Data</a>&nbsp;&nbsp;
                          <?php } ?>
                          <a href="<?php echo base_url() ?>admin/penyesuaian_stok/lihat/<?php echo $key->id ?>" class="btn btn-primary btn-xs">Lihat Data SO</a>&nbsp;&nbsp;
                          <a href="<?php echo base_url() ?>admin/penyesuaian_stok/unduh_excel/<?php echo $key->id ?>" class="btn btn-success btn-xs">Download Excel</a>&nbsp;&nbsp;
                          <button type="button" class="btn btn-inverse btn-xs btn-import-excel" data-id="<?php echo $key->id ?>">Import Excel</button>
                        </td>
                      </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<!-- Modal -->
<div id="mdl_import" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo base_url() ?>admin/penyesuaian_stok/import_excel" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import Excel</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" class="input-id-so">
          <div class="form-group">
            <label for="">File Excel</label>
            <input type="file" name="file" value="" required />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
jQuery(function($){
  $(".btn-import-excel").click(function(){
    var id = $(this).attr('data-id');
    $('.input-id-so').val(id);
    $("#mdl_import").modal('show');
  });
});
</script>
