
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
                
                <form action="<?php echo $action ?>" method="post">

                  <div class="row" style="margin-bottom:7px;">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                    </div>
                  </div>

                  <div class="row" style="margin-bottom: 90px;">
                    <?php foreach ($data_users as $key) { ?>
                    <div class="col-xs-4 widget-container-col">
                      <div class="widget-box widget-color-red2" id="widget-box-2" style="margin-bottom:20px;">
                        <div class="widget-header">
                          <h5 class="widget-title bigger lighter">
                            <i class="ace-icon fa fa-check-square-o"></i>
                            <?php echo $key->level ?>
                          </h5>
                        </div>
                        <div class="widget-body" style="height:400px;overflow-y:scroll;overflow-x:hidden;">
                          <div class="widget-main no-padding">
                            <div class="control-group">
                              <div class="col-xs-12">
                              <?php 
                              $r = array();
                              $array_menu = explode(',', $key->menus);
                              foreach ($array_menu as $key_menu) {
                                if (!empty($key_menu)) {
                                  $r[$key_menu] = true;
                                }
                              }
                              foreach ($data_pil_menu as $key2) : ?>
                              <div class="checkbox">
                                <label>
                                  <?php 
                                  if ($key2->level > 1) {
                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                  }
                                  ?>
                                  <input name="list_menu[<?php echo $key->id ?>][<?php echo $key2->id ?>]" type="checkbox" class="ace checklist-menu" <?php echo !empty($r[$key2->id]) ? 'checked' : '' ?> value="1" data-id-level="<?php echo $key->id ?>" data-id-menu="<?php echo $key2->id ?>" data-id-parent="<?php echo $key2->id_parent ?>" />
                                  <span class="lbl"> <i class="fa fa-<?php echo $key2->icon ?>"></i> <?php echo $key2->nama_menu ?></span>
                                </label>
                              </div>
                              <?php endforeach ?>
                              </div>
                            </div>

                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </form>
                
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <script>
      $(document).ready(function(){
        $(".checklist-menu").on("change", function(){
          var level = $(this).attr('data-id-level');
          var menu = $(this).attr('data-id-menu');
          var check = $(this).is(':checked');
          $('.checklist-menu[data-id-level="'+level+'"][data-id-parent="'+menu+'"]').prop('checked', check);
        });
      });
      </script>