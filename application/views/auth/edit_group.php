

      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active"><?php echo lang('edit_group_heading');?></li>
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
                <?php echo lang('edit_group_heading');?>
                <!--
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                </small>
              -->
              </h1>
              <div id="infoMessage"><?php echo $message;?></div>
            </div><!-- /.page-header -->

				<?php echo form_open(current_url());?>

				      <p>
				            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
				            <?php echo form_input($group_name);?>
				      </p>

				      <p>
				            <?php echo lang('edit_group_desc_label', 'description');?> <br />
				            <?php echo form_input($group_description);?>
				      </p>

				      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'));?></p>

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