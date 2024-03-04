
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Menu</li>
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
                Menu
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form action="<?php echo base_url() ?>admin/pil_menu/update_action" method="post">
                  <button type="submit" class="btn btn-info">Simpan perubahan</button>

                  <?php 
                  // echo "<pre>";
                  // print_r ($data_pil_menu);
                  // echo "</pre>";
                  ?>

                  <table class="table table-bordered table-condensed table-striped" style="margin-top: 10px;">
                    <thead>
                      <tr>
                        <th width="20">No</th>
                        <th>Parent menu</th>
                        <th>Menu</th>
                        <th>Icon</th>
                        <th>Variabel active</th>
                        <th>Controller</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; foreach($data_pil_menu as $key) : ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td style="padding:0px;">
                          <select name="id_parent[<?php echo $key->id ?>]" style="width:100%;color:#333;border:none;">
                            <option value="">#</option>
                          <?php foreach ($data_parent as $key2) : ?>
                            <option value="<?php echo $key2->id ?>" <?php echo $key2->id==$key->id_parent ? "selected" : "" ?>><?php echo $key2->nama_menu ?></option>
                          <?php endforeach ?>
                          </select>
                        </td>
                        <td style="padding:0px;"><input type="text" class="form-control" name="nama_menu[<?php echo $key->id ?>]" value="<?php echo $key->nama_menu ?>" style="border:none;color:#333;" /></td>
                        <td style="padding:0px;"><input type="text" class="nama_icon" name="nama_icon[<?php echo $key->id ?>]" value="<?php echo $key->icon ?>" data-id="<?php echo $key->id ?>" style="border:none;color:#333;" />&nbsp;&nbsp;<span class="test-icon" data-id="<?php echo $key->id ?>"><i class="fa fa-<?php echo $key->icon ?>"></i></span></td>
                        <td style="padding:0px;"><input type="text" class="form-control" name="var_active[<?php echo $key->id ?>]" value="<?php echo $key->var_active ?>" style="border:none;color:#333;" /></td>
                        <td style="padding:0px;"><input type="text" class="form-control" name="controller[<?php echo $key->id ?>]" value="<?php echo $key->controller ?>" style="border:none;color:#333;" /></td>
                        <td class="text-center"><a href="<?php echo base_url() ?>admin/pil_menu/delete/<?php echo $key->id ?>" onclick="return confirm('Are you sure ?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></a></td>
                      </tr>
                    <?php $no++; endforeach; ?>
                    </tbody>
                  </table>
                </form>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <script>
      $(document).ready(function(){
        $(".nama_icon").on("keyup", function(){
          var id = $(this).attr('data-id');
          var nama_icon = $(this).val();
          $('.test-icon[data-id="'+id+'"]').html('<i class="fa fa-'+nama_icon+'"></i>');
        });
      });
      </script>