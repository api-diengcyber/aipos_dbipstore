
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Beban</li>
              <li class="active">
                <?php if($type=='non_karyawan'){
                  echo "Beban Non Karyawan";
                }else{
                  echo "
                  Beban Karyawan
                  
                  ";
                }?> </li>
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
                <?php if($type=='non_karyawan'){
                  echo "Beban Non Karyawan";
                }else{
                  echo "
                  Beban Karyawan
                  
                  ";
                }?>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

    		        <table class="table">
        				    <!-- <tr><td>Username</td><td><?php echo $username; ?></td></tr>
        				    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
        				    <tr><td>Salt</td><td><?php echo $salt; ?></td></tr>
        				    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
        				    <tr><td>Activation Code</td><td><?php echo $activation_code; ?></td></tr>
        				    <tr><td>Forgotten Password Code</td><td><?php echo $forgotten_password_code; ?></td></tr>
        				    <tr><td>Forgotten Password Time</td><td><?php echo $forgotten_password_time; ?></td></tr>
        				    <tr><td>Remember Code</td><td><?php echo $remember_code; ?></td></tr>
        				    <tr><td>Created On</td><td><?php echo $created_on; ?></td></tr>
        				    <tr><td>Last Login</td><td><?php echo $last_login; ?></td></tr> -->
        				    <!-- <tr><td>Active</td><td><?php echo $active; ?></td></tr> -->
        				    <!-- <tr><td>Company</td><td><?php echo $company; ?></td></tr> -->
                    <?php if($type=='non_karyawan'){?>
                      <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>

                      <?php
                    }else{?>
                    <tr><td>First Name</td><td><?php echo $first_name; ?></td></tr>
        				    <tr><td>Last Name</td><td><?php echo $last_name; ?></td></tr>
        				    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
                    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
                    <?php
                    
                    }?>


        				    
        				    <tr><td>Beban Per</td><td><?php echo $beban_per; ?></td></tr>
        				    <tr><td>Nominal</td><td><?php echo number_format( $nominal); ?></td></tr>
        				    <tr><td></td><td><a href="<?php echo site_url('admin/pegawai_beban/'.$type) ?>" class="btn btn-default">Cancel</a></td></tr>
        				</table>

                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->