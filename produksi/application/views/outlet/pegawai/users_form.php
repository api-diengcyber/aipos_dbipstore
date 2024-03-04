
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active">Salesman</li>
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
                Salesman
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_toko" id="id_toko" placeholder="Id Toko" value="<?php echo $id_toko; ?>" />
                    <div class="form-group">
                        <label for="varchar">Nama Sales <?php echo form_error('first_name') ?></label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Email <?php echo form_error('email') ?></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" <?php echo !empty($id) ? "" : "" ?> />
                    </div>
                    <div class="form-group">
                        <label for="varchar">No HP <?php echo form_error('phone') ?></label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Password <?php echo form_error('password') ?></label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Confirm Password <?php echo form_error('confirm_password') ?></label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="<?php echo ""; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Data Toko</label>
                        <select multiple="" class="chosen-select form-control" name="data_toko[]" id="form-field-select-4" data-placeholder="Data Toko">
                            <?php $no = 1; foreach ($data_toko as $key) { ?>
                            <option value="<?php echo $key->id_member ?>" <?php echo $key->id_sales!='0' ? 'selected' : '' ?>><?php echo  $key->nama ?></option>
                            <?php $no++; } ?>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <input type="hidden" name="id_users" value="<?php echo !empty($id_users) ? $id_users : 0 ; ?>" /> 
                    <input type="hidden" name="level" value="4" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('outlet/pegawai_retail') ?>" class="btn btn-default">Cancel</a>
                </form>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->


<script>
$(document).ready(function(){
  if(!ace.vars['touch']) {
      $('.chosen-select').chosen({allow_single_deselect:true});
  }
});
</script>