
      <div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success" leadercs="location.href='<?php echo base_url() ?>produk_retail/create'">
              <i class="ace-icon fa fa-plus-square"> </i>
            </button>
            <!--
            <button class="btn btn-info" leadercs="location.href='<?php echo base_url() ?>retail/stok_produk'">
              <i class="ace-icon fa fa-exchange"></i>
            </button>
            -->
            <button class="btn btn-warning" leadercs="location.href='<?php echo base_url() ?>laporan_retail/penjualan'">
              <i class="ace-icon fa fa-money"></i>
            </button>
            <button class="btn btn-danger" leadercs="location.href='<?php echo base_url() ?>user_retail'">
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

          <li class="<?php if(isset($active_home)){ echo $active_home;}; ?> highlight">
            <a href="<?php echo base_url() ?>leadercs">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_group_cs)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-shopping-cart"></i>
              <span class="menu-text">
                Manajemen Sales
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php if(isset($active_group_cs)){ echo $active_group_cs;}; ?> highlight">
                <a id="goupCs" href="<?php echo base_url() ?>leadercs/group_cs">
                  <i class="menu-icon fa fa-shopping-cart"></i>
                  <span class="menu-text"> Group CS</span>
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="<?php if(isset($active_order_cs)){ echo $active_order_cs;}; ?>">
            <a href="<?php echo base_url() ?>leadercs/laporan_cs">
              <i class="menu-icon fa fa-edit"></i>
              <span class="menu-text"> Laporan Order CS </span>
            </a>
            <b class="arrow"></b>
          </li>
          
          <li class="<?php if(isset($active_aktivitas_cs)){ echo $active_aktivitas_cs;}; ?>">
            <a href="<?php echo base_url() ?>leadercs/laporan_cs/aktivitas">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan Aktivitas CS </span>
            </a>
            <b class="arrow"></b>
          </li>

        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>