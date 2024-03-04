
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="active"><?php echo lang('deactivate_heading');?></li>
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
                <?php echo lang('deactivate_heading');?>
                <!--
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                </small>
            	-->
              </h1>
            </div><!-- /.page-header -->

				<?php echo form_open("auth/deactivate/".$user->id);?>

				  <p>
				  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
				    <input type="radio" name="confirm" value="yes" checked="checked" />
				    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
				    <input type="radio" name="confirm" value="no" />
				  </p>

				  <?php echo form_hidden($csrf); ?>
				  <?php echo form_hidden(array('id'=>$user->id)); ?>

				  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

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

