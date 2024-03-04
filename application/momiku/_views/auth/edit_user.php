

      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active"><?php echo lang('edit_user_heading');?></li>
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
                <?php echo lang('edit_user_heading');?>
              </h1><?php echo lang('edit_user_subheading');?>
              <div id="infoMessage"><?php echo $message;?></div>
            </div><!-- /.page-header -->

              <?php echo form_open(uri_string());?>

                    <p>
                          <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                          <?php echo form_input($first_name);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                          <?php echo form_input($last_name);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_company_label', 'company');?> <br />
                          <?php echo form_input($company);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                          <?php echo form_input($phone);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_password_label', 'password');?> <br />
                          <?php echo form_input($password);?>
                    </p>

                    <p>
                          <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                          <?php echo form_input($password_confirm);?>
                    </p>

                    <?php if ($this->ion_auth->is_admin()): ?>

                        <h3><?php echo lang('edit_user_groups_heading');?></h3>
                        <?php foreach ($groups as $group):?>
                            <label class="checkbox">
                            <?php
                                $gID=$group['id'];
                                $checked = null;
                                $item = null;
                                foreach($currentGroups as $grp) {
                                    if ($gID == $grp->id) {
                                        $checked= ' checked="checked"';
                                    break;
                                    }
                                }
                            ?>
                            <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                            <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                            </label>
                        <?php endforeach?>

                    <?php endif ?>

                    <?php echo form_hidden('id', $user->id);?>
                    <?php echo form_hidden($csrf); ?>

                    <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

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
