
      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs ace-save-state breadcrumbs-fixed" id="breadcrumbs">
            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
              </li>
              <li class="">Pengaturan</li>
              <li class="active">Data Akun</li>
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
                Akun
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-6">
                <!-- PAGE CONTENT BEGINS -->
                  <div style="height:700px;margin:auto;overflow:auto;">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                        <?php
                        $i = 1;
                        foreach ($akun_level_1 as $lv1):
                            echo "
                            <li class='dd-item item-red' style='cursor:pointer;' data-id='".$lv1->id."' data-kode-akun='".$lv1->kode."' data-nama-akun='".$lv1->akun."'>
                                <div class='dd-handle'>
                                    <label class='label label-danger'>".$lv1->kode."</label> ".$lv1->akun."";
                                    if(!empty($lv1->id_toko)){
                                    echo "
                                    <div class='pull-right action-buttons'>
                                        <a class='red' onclick='return konfimasi()' href='".base_url()."admin/akun_retail/delete/".$lv1->id."'>
                                            <i class='ace-icon fa fa-trash-o bigger-130'></i>
                                        </a>
                                    </div> ";
                                    }
                            echo "
                                </div>
                            ";
                            echo "<ol class='dd-list'>"; // ul level 2
                            foreach ($akun_level_2 as $lv2):
                                if($lv1->kode == substr($lv2->kode,0,strlen($lv1->kode))){
                                    echo "
                                    <li class='dd-item item-orange' style='cursor:pointer;' data-id='".$lv2->id."' data-kode-akun='".$lv2->kode."' data-nama-akun='".$lv2->akun."'>
                                        <div class='dd-handle'>
                                            <label class='label label-warning'>".$lv2->kode."</label> ".$lv2->akun."";
                                            if(!empty($lv2->id_toko)){
                                            echo "
                                            <div class='pull-right action-buttons'>
                                                <a class='red' onclick='return konfimasi()' href='".base_url()."admin/akun_retail/delete/".$lv2->id."'>
                                                    <i class='ace-icon fa fa-trash-o bigger-130'></i>
                                                </a>
                                            </div> ";
                                            }
                                    echo "
                                        </div>
                                    ";
                                    echo "<ol class='dd-list'>"; // ul level 3
                                    foreach ($akun_level_3 as $lv3):
                                        if($lv2->kode == substr($lv3->kode,0,strlen($lv2->kode))){
                                            echo "
                                            <li class='dd-item item-green' style='cursor:pointer;' data-id='".$lv3->id."' data-kode-akun='".$lv3->kode."' data-nama-akun='".$lv3->akun."'>
                                                <div class='dd-handle'>
                                                    <label class='label label-success'>".$lv3->kode."</label> ".$lv3->akun."";
                                                    if(!empty($lv3->id_toko)){
                                                    echo "
                                                    <div class='pull-right action-buttons'>
                                                        <a class='red' onclick='return konfimasi()' href='".base_url()."admin/akun_retail/delete/".$lv3->id."'>
                                                            <i class='ace-icon fa fa-trash-o bigger-130'></i>
                                                        </a>
                                                    </div> ";
                                                    }
                                            echo "
                                                </div>
                                            ";
                                            echo "<ol class='dd-list'>"; // ul level 4
                                            foreach ($akun_level_4 as $lv4):
                                                if($lv3->kode == substr($lv4->kode,0,strlen($lv3->kode))){
                                                    echo "
                                                    <li class='dd-item item-blue2' style='cursor:pointer;' data-id='".$lv4->id."' data-kode-akun='".$lv4->kode."' data-nama-akun='".$lv4->akun."'>
                                                        <div class='dd-handle'>
                                                            <label class='label label-info'>".$lv4->kode."</label> ".$lv4->akun."";
                                                            if(!empty($lv4->id_toko)){
                                                            echo "
                                                            <div class='pull-right action-buttons'>
                                                                <a class='red' onclick='return konfimasi()' href='".base_url()."admin/akun_retail/delete/".$lv4->id."'>
                                                                    <i class='ace-icon fa fa-trash-o bigger-130'></i>
                                                                </a>
                                                            </div> ";
                                                            }
                                                    echo "
                                                        </div>";
														echo "<ol class='dd-list'>"; // ul level 5
														foreach ($akun_level_5 as $lv5):
															if($lv4->kode == substr($lv5->kode,0,strlen($lv4->kode))){
																echo "
																<li class='dd-item item-blue' style='cursor:pointer;' data-id='".$lv5->id."' data-kode-akun='".$lv5->kode."' data-nama-akun='".$lv5->akun."'>
																	<div class='dd-handle'>
																		<label class='label label-primary'>".$lv5->kode."</label> ".$lv5->akun."";
																		if(!empty($lv5->id_toko)){
																		echo "
																		<div class='pull-right action-buttons'>
																			<a class='red' onclick='return konfimasi()' href='".base_url()."admin/akun_retail/delete/".$lv5->id."'>
																				<i class='ace-icon fa fa-trash-o bigger-130'></i>
																			</a>
																		</div> ";
																		}
																echo "
																	</div>
																</li>
																";
																$i++;
															}
														endforeach;
														echo "</ol>"; // ul level 5
													echo "
                                                    </li>
                                                    ";
                                                    $i++;
                                                }
                                            endforeach;
                                            echo "</ol>"; // ul level 4
                                            echo "</li>";
                                            $i++;
                                        }
                                    endforeach;
                                    echo "</ol>"; // ul level 3
                                    echo "</li>";
                                    $i++;
                                }
                            endforeach;
                            echo "</ol>"; // ul level 2
                            echo "</li>";
                            $i++;
                        endforeach;
                        ?>
                        </ol>
                    </div>
                  </div>
                <div class="hr hr32 hr-dotted"></div>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
              <div class="col-sm-6">
                <!-- PAGE CONTENT BEGINS -->
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                    <input type="hidden" name="id_toko" id="id_toko" value="<?php echo $id_toko ?>">
                    <div class="form-group">
                        <label for="">Parent <?php echo form_error("parent") ?></label>
                        <input type="text" class="form-control" name="parent" id="parent" value="<?php echo $parent ?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="">Kode Parent <?php echo form_error("kode_parent") ?></label>
                        <input type="text" class="form-control" name="kode_parent" id="kode_parent" value="<?php echo $kode_parent ?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="">Kode Akun <?php echo form_error("kode_akun") ?></label>
                        <input type="text" class="form-control" name="kode_akun" id="kode_akun" value="<?php echo $kode_akun ?>" readonly >
                    </div>
                    <div class="form-group">
                        <label for="">Nama Akun <?php echo form_error("nama_akun") ?></label>
                        <input type="text" class="form-control" name="nama_akun" id="nama_akun" value="<?php echo $nama_akun ?>">
                    </div>
                    <button type="reset" class="btn btn-app btn-danger">Batal</button>
                    <button type="submit" class="btn btn-app btn-primary">Simpan</button>
                </form>

                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

<!-- JQUERY -->
<script type="text/javascript">

    function konfirmasi(){
        konf = confirm("Apaka Ingin menghapus data?");
        if(konf==true){
            return true;
        } else {
            return false;
        }
    }

    jQuery(function($){

        //$('.dd').nestable();
    
        $('.dd-handle a').on('mousedown', function(e){
            e.stopPropagation();
        });
        
        $('[data-rel="tooltip"]').tooltip();
        
        $("[data-id]").click(function(e){
            e.stopPropagation();
            var id = $(this).attr("data-id");
            var kode_akun = $(this).attr("data-kode-akun");
            var nama_akun = $(this).attr("data-nama-akun");
            $.ajax({
                url: '<?php echo base_url() ?>admin/akun_retail/kode_baru',
                type: 'post',
                data: 'parent='+kode_akun,
                success: function(response){
                    var parsed_data = JSON.parse(response);
                    var kode_baru = parsed_data.kode;
                    $("#parent").val(nama_akun);
                    $("#kode_parent").val(kode_akun);
                    $("#kode_akun").val(kode_baru);
                    $("#nama_akun").focus();
                }
            });
        });

    });
</script>
<!-- JQUERY -->
