
      <div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed">
        <script type="text/javascript">
          try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
          <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
              <i class="ace-icon fa fa-plus-square"> </i>
            </button>
            <button class="btn btn-warning">
              <i class="ace-icon fa fa-money"></i>
            </button>
            <button class="btn btn-danger">
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
            <a href="<?php echo base_url() ?>gudang">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>
          
          <li class="<?php if(isset($active_pembelian_create) || isset($active_retur_pembelian_create) || isset($active_stok_awal)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-gift"></i>
              <span class="menu-text">
                Pembelian
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_pembelian_create)){ echo $active_pembelian_create;}; ?> highlight">
                <!-- <a href="<?php echo base_url() ?>gudang/pembelian_retail/create"> -->
                <a href="<?php echo base_url() ?>gudang/pembelian">
                  <i class="menu-icon fa fa-gift"></i>
                  <span class="menu-text"> Pembelian Barang </span>
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_retur_pembelian_create)){ echo $active_retur_pembelian_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>gudang/retur">
                  <i class="menu-icon fa fa-list"></i>
                  Retur Pembelian
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="<?php if(isset($active_verifikasi)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-shopping-cart"></i>
              <span class="menu-text">
                Order Sales
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_verifikasi)){ echo $active_verifikasi;}; ?> highlight">
                <a href="<?php echo base_url() ?>gudang/order_sales">
                  <i class="menu-icon fa fa-shopping-cart"></i>
                  <span class="menu-text"> Verifikasi Cancel COD</span>
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <!-- <li class="<?php if(isset($active_produk) || isset($active_kategori_produk) || isset($active_stok_produk) || isset($active_diskon_produk) || isset($active_satuan_produk) || isset($active_produk_kadaluarsa)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-inbox"></i>
              <span class="menu-text"> Manajemen Produk </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php if(isset($active_produk)){ echo $active_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>gudang/produk_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_kategori_produk)){ echo $active_kategori_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>gudang/kategori_produk_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kategori Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_satuan_produk)){ echo $active_satuan_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>gudang/satuan_produk">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Satuan Produk
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li> -->

          <li class="<?php if(isset($active_lap_stok_produk) || isset($active_lap_stok_mati) || isset($active_lap_penjualan) || isset($active_lap_pembelian) || isset($active_lap_piutang) || isset($active_lap_hutang) || isset($active_retur_penjualan) || isset($active_retur_pembelian)  || isset($active_lap_kasir) || isset($active_lap_bukubesar_1) || isset($active_lap_bukubesar_2)  || isset($active_lap_neraca) || isset($active_lap_labarugi) || isset($active_lap_salesman)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan </span>
          
              <b class="arrow fa fa-angle-down"></b>
            </a>
          
            <b class="arrow"></b>
          
            <ul class="submenu">
              <li class="<?php if(isset($active_lap_stok_produk)){ echo $active_lap_stok_produk;}; ?> highlight">
                  <a href="<?php echo base_url() ?>gudang/laporan_retail/stok_produk">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Stok Produk 
                  </a>
                  <b class="arrow"></b>
                </li>
            
                <li class="<?php if(isset($active_lap_stok_mati)){ echo $active_lap_stok_mati;}; ?> highlight">
                  <a href="<?php echo base_url() ?>gudang/laporan_retail/stok_mati">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Stok Mati
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