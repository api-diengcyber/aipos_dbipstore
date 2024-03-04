
      <div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success" produksi="location.href='<?php echo base_url() ?>produk_retail/create'">
              <i class="ace-icon fa fa-plus-square"> </i>
            </button>
            <!--
            <button class="btn btn-info" produksi="location.href='<?php echo base_url() ?>retail/stok_produk'">
              <i class="ace-icon fa fa-exchange"></i>
            </button>
            -->
            <button class="btn btn-warning" produksi="location.href='<?php echo base_url() ?>laporan_retail/penjualan'">
              <i class="ace-icon fa fa-money"></i>
            </button>
            <button class="btn btn-danger" produksi="location.href='<?php echo base_url() ?>user_retail'">
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
            <a href="<?php echo base_url() ?>manager">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_order_cs)){ echo $active_order_cs;}; ?>">
            <a href="<?php echo base_url() ?>manager/laporan_cs">
              <i class="menu-icon fa fa-edit"></i>
              <span class="menu-text"> Laporan Order CS </span>
            </a>
            <b class="arrow"></b>
          </li>
          
          <li class="<?php if(isset($active_aktivitas_cs)){ echo $active_aktivitas_cs;}; ?>">
            <a href="<?php echo base_url() ?>manager/laporan_cs/aktivitas">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan Aktivitas CS </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_pegawai) || isset($active_pelanggan) || isset($active_kota) || isset($active_penjualan) || isset($active_supplier) || isset($active_pembelian) || isset($active_piutang) || isset($active_hutang) || isset($active_pil_penjualan_lainnya)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-hdd-o"></i>
              <span class="menu-text">
                Manajemen Data
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_pegawai)){ echo $active_pegawai;}; ?> highlight">
                <a href="<?php echo base_url() ?>manager/pegawai_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Salesman
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_pelanggan)){ echo $active_pelanggan;}; ?> highlight">
                <a href="<?php echo base_url() ?>manager/member_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pelanggan
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>
          
          
          <li class="<?php if(isset($active_per_group) || isset($active_grand_all_team)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-hdd-o"></i>
              <span class="menu-text">
                Laporan Advertiser
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_per_group)){ echo $active_per_group;}; ?> highlight">
                <a href="<?php echo base_url() ?>manager/laporan_adv/per_group">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Laporan Per Group
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_grand_all_team)){ echo $active_grand_all_team;}; ?> highlight">
                <a href="<?php echo base_url() ?>manager/laporan_adv/grand_all_team">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Laporan Grand Total
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>