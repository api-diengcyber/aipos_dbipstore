      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active"><?php echo lang('change_password_heading');?></li>
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
                <?php echo lang('change_password_heading');?>
                <!--
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                </small>
              -->
              </h1>
            </div><!-- /.page-header -->

                  <?php echo form_open("auth/change_password");?>

                        <p>
                              <?php echo lang('change_password_old_password_label', 'old_password');?> <br />
                              <?php echo form_input($old_password);?>
                        </p>

                        <p>
                              <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label> <br />
                              <?php echo form_input($new_password);?>
                        </p>

                        <p>
                              <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                              <?php echo form_input($new_password_confirm);?>
                        </p>

                        <?php echo form_input($user_id);?>
                        <p><?php echo form_submit('submit', lang('change_password_submit_btn'));?></p>

                  <?php echo form_close();?>

                <div class="hr hr32 hr-dotted"></div>

                <div class="row">
                </div><!-- /.row -->

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->