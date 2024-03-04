
      <div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success" onclick="location.href='<?php echo base_url() ?>produk_retail/create'">
              <i class="ace-icon fa fa-plus-square"> </i>
            </button>
            <button class="btn btn-warning" onclick="location.href='<?php echo base_url() ?>laporan_retail/penjualan'">
              <i class="ace-icon fa fa-money"></i>
            </button>
            <button class="btn btn-danger" onclick="location.href='<?php echo base_url() ?>user_retail'">
              <i class="ace-icon fa fa-cogs"></i>
            </button>
          </div>

          <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
          </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">

          <?php
          $res = $this->Pil_menu_model->get_menu($this->userdata->level);
          foreach ($res as $key) : 
            if (empty($key->id_parent)) {
              $jml_sub = 0;
              $sub_html = '';
              foreach ($res as $key2) {
                if ($key2->id_parent == $key->id) {
                  $jml_sub++;
                  $act = '';
                  if (!empty($key2->var_active)) {
                    eval('if (isset($'.$key2->var_active.')) { $act = "active"; }');
                  }
                  $sub_html .= '
                  <li class="'.$act.' highlight">
                    <a href="'.base_url().'page?url='.base_url().$key2->controller.'">
                      <i class="menu-icon fa fa-caret-right"></i>
                      '.$key2->nama_menu.'
                    </a>
                    <b class="arrow"></b>
                  </li>';
                }
              }
              $elclass = '';
              $barrow = '';
              $act = '';
              if (!empty($key->var_active)) {
                eval('if (isset($'.$key->var_active.')) { $act = "active"; }');
              }
              $href = base_url().'page?url='.base_url().$key->controller;
              if ($jml_sub > 0) { // jika ada sub menu
                $elclass = 'dropdown-toggle';
                $barrow = '<b class="arrow fa fa-angle-down"></b>';
                eval('if ('.$key->var_active_menu.') { $act = "active open"; }');
                $href = '#';
              }
              echo '
              <li class="'.$act.' highlight">
                <a href="'.$href.'" class="'.$elclass.'">
                  <i class="menu-icon fa fa-'.$key->icon.'"></i>
                  <span class="menu-text"> '.$key->nama_menu.'</span>
                  '.$barrow.'
                </a>
                <b class="arrow"></b>
              ';
              if ($jml_sub > 0) {
                echo '<ul class="submenu">'.$sub_html.'</ul>';
              }
              echo '</li>';

            } else {
              $jml_sub = 0;
              foreach ($res as $key2) {
                if ($key2->id == $key->id_parent) {
                  $jml_sub = 1;
                }
              }
              if ($jml_sub == 0) {
                $act = '';
                if (!empty($key->var_active)) {
                  eval('if (isset($'.$key->var_active.')) { $act = "active"; }');
                }
                echo '
                <li class="highlight">
                  <a href="'.base_url().'page?url='.base_url().$key->controller.'">
                    <i class="menu-icon fa fa-'.$key->icon.'"></i>
                    '.$key->nama_menu.'
                  </a>
                  <b class="arrow"></b>
                </li>
                ';
              }
            }
          endforeach;
          ?>
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

      </div>