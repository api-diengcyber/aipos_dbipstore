
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active"><?php echo lang('create_user_heading');?></li>
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
                <?php echo lang('create_user_heading');?>
                <!--
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                </small>
              -->
              </h1>
            </div><!-- /.page-header -->

              <div id="infoMessage"><?php echo $message;?></div>
                  <?php echo form_open("auth/create_user");?>

                        <p>
                              <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                              <?php echo form_input($first_name);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                              <?php echo form_input($last_name);?>
                        </p>
                        
                        <?php
                        if($identity_column!=='email') {
                            echo '<p>';
                            echo lang('create_user_identity_label', 'identity');
                            echo '<br />';
                            echo form_error('identity');
                            echo form_input($identity);
                            echo '</p>';
                        }
                        ?>

                        <p>
                              <?php echo lang('create_user_company_label', 'company');?> <br />
                              <?php echo form_input($company);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_email_label', 'email');?> <br />
                              <?php echo form_input($email);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_phone_label', 'phone');?> <br />
                              <?php echo form_input($phone);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_password_label', 'password');?> <br />
                              <?php echo form_input($password);?>
                        </p>

                        <p>
                              <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                              <?php echo form_input($password_confirm);?>
                        </p>


                        <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>

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