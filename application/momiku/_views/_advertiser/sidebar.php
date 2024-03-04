
      <div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success" advertiser="location.href='<?php echo base_url() ?>produk_retail/create'">
              <i class="ace-icon fa fa-plus-square"> </i>
            </button>
            <!--
            <button class="btn btn-info" advertiser="location.href='<?php echo base_url() ?>retail/stok_produk'">
              <i class="ace-icon fa fa-exchange"></i>
            </button>
            -->
            <button class="btn btn-warning" advertiser="location.href='<?php echo base_url() ?>laporan_retail/penjualan'">
              <i class="ace-icon fa fa-money"></i>
            </button>
            <button class="btn btn-danger" advertiser="location.href='<?php echo base_url() ?>user_retail'">
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
            <a href="<?php echo base_url() ?>advertiser">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>

          <!-- <li class="<?php if(isset($active_laporan_adv)){ echo $active_laporan_adv;}; ?>">
            <a href="<?php echo base_url() ?>advertiser/akun_iklan">
              <i class="menu-icon fa fa-users"></i>
              <span class="menu-text"> Akun Iklan </span>
            </a>
            <b class="arrow"></b>
          </li> -->

          <li class="<?php if(isset($active_laporan_adv)){ echo $active_laporan_adv;}; ?>">
            <a href="<?php echo base_url() ?>advertiser/laporan_adv">
              <i class="menu-icon fa fa-bar-chart"></i>
              <span class="menu-text"> Manage Laporan</span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_per_group)){ echo $active_per_group;}; ?>">
            <a href="<?php echo base_url() ?>advertiser/laporan_adv/per_group">
              <i class="menu-icon fa fa-bar-chart"></i>
              <span class="menu-text"> Laporan Per Group </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_grand_all_team)){ echo $active_grand_all_team;}; ?>">
            <a href="<?php echo base_url() ?>advertiser/laporan_adv/grand_all_team">
              <i class="menu-icon fa fa-bar-chart"></i>
              <span class="menu-text"> Laporan Grand Total</span>
            </a>
            <b class="arrow"></b>
          </li>

        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>