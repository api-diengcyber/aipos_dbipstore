<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="#">Home</a>
            </li>
            <li class=""><?php echo $this->uri->segment(1);?></li>
            <li class="active"><?php echo $this->uri->segment(2);?></li>
        </ul><!-- /.breadcrumb -->

        
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <h2 style="margin-top:0px">Group CS <?php echo $button ?></h2>
                    <form action="<?php echo $action; ?>" method="post">
                        <div class="form-group">
                            <label for="varchar">Nama Group <?php echo form_error('group') ?></label>
                            <input type="text" class="form-control" name="group" id="group" placeholder="Group" value="<?php echo $group; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="varchar">CS <?php echo form_error('cs') ?></label>
                            <select name="id_cs[]" id="" class="form-control" multiple>
                                <?php foreach($data_sales as $cs){?>
                                <option value="<?php echo $cs->id_users;?>"><?php echo $cs->first_name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                        <a href="<?php echo site_url('group_cs') ?>" class="btn btn-default">Cancel</a>
                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->