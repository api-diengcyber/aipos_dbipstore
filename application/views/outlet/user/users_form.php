
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Pengaturan</li>
              <li class="active">Data User</li>
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
                Users <?php echo $button ?>
                
              </h1>
            </div><!-- /.page-header -->

            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <!-- PAGE CONTENT BEGINS -->

                    <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko" value="<?php echo $id_toko; ?>" />
                    <div class="form-group">
                        <label for="varchar">Email <?php echo form_error('email') ?></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" <?php echo $ro_email; ?> />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Depan <?php echo form_error('first_name') ?></label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Belakang <?php echo form_error('last_name') ?></label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" ><?php echo $alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="varchar">No Hp <?php echo form_error('phone') ?></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Password <?php if($button=='Update'){ ?> Baru <?php }; ?> <?php echo form_error('password_baru') ?></label>
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Password <?php if($button=='Update'){ ?> Baru <?php }; ?>" value="<?php echo $password_baru; ?>" />
                        <?php if($button=='Update'){ ?><font style="color:red;">* diisi jika ingin mengubah password</font><?php }; ?>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Level <?php echo form_error('level') ?></label>
                        <select name="level" id="level" class="form-control"> 
                          <?php foreach ($pil_level as $p_level) { ?>
                          <option value="<?php echo $p_level->id;?>" <?php if($level == $p_level->id) { echo 'selected'; } ?>><?php echo $p_level->level;?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <input type="hidden" name="fotolama" value="<?php echo $foto; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('admin/user_retail') ?>" class="btn btn-default">Cancel</a>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
            </form>
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->



<script>
jQuery(function($){
    $('#foto').ace_file_input({
      style: 'well',
      btn_choose: 'Drop files here or click to choose',
      btn_change: null,
      no_icon: 'ace-icon fa fa-cloud-upload',
      droppable: true,
      thumbnail: 'small'//large | fit
      //,icon_remove:null//set null, to hide remove/reset button
      /**,before_change:function(files, dropped) {
        //Check an example below
        //or examples/file-upload.html
        return true;
      }*/
      /**,before_remove : function() {
        return true;
      }*/
      ,
      preview_error : function(filename, error_code) {
        //name of the file that failed
        //error_code values
        //1 = 'FILE_LOAD_FAILED',
        //2 = 'IMAGE_LOAD_FAILED',
        //3 = 'THUMBNAIL_FAILED'
        //alert(error_code);
      }
  
    }).on('change', function(){
      //console.log($(this).data('ace_input_files'));
      //console.log($(this).data('ace_input_method'));
    });
});
</script>