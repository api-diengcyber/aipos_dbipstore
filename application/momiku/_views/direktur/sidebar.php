
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
            <a href="<?php echo base_url() ?>produksi">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_pegawai) || isset($active_member) || isset($active_supplier) || isset($active_piutang) || isset($active_hutang)){ echo 'active open';}; ?> highlight">
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
                <a href="<?php echo base_url() ?>produksi/pegawai_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Salesman
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_member)){ echo $active_member;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/member_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Member
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_supplier)){ echo $active_supplier;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/supplier_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Supplier
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_piutang)){ echo $active_piutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/piutang_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_hutang)){ echo $active_hutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/hutang_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hutang
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
          </li>

          <li class="<?php if(isset($active_produk) || isset($active_kategori_produk) || isset($active_satuan_produk) || isset($active_stok_bahan) || isset($active_stok_produksi)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-inbox"></i>
              <span class="menu-text"> Manajemen Produk </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php if(isset($active_produk)){ echo $active_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/produk_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_kategori_produk)){ echo $active_kategori_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/kategori_produk_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kategori Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_satuan_produk)){ echo $active_satuan_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/satuan_produk">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Satuan Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_stok_bahan)){ echo $active_stok_bahan;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/stok/bahan">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Bahan
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_stok_produksi)){ echo $active_stok_produksi;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/stok/produksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Produksi
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
          </li>
          <li class="<?php if(isset($active_lap_stok_produk) || isset($active_lap_stok_mati) || isset($active_lap_penjualan) || isset($active_lap_pembelian) || isset($active_lap_piutang) || isset($active_lap_hutang) || isset($active_retur_penjualan) || isset($active_retur_pembelian)  || isset($active_lap_kasir) || isset($active_lap_bukubesar_1) || isset($active_lap_bukubesar_2)  || isset($active_lap_neraca) || isset($active_lap_labarugi) || isset($active_lap_salesman)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan </span>
          
              <b class="arrow fa fa-angle-down"></b>
            </a>
          
            <b class="arrow"></b>
          
            <ul class="submenu">
              
              <li class="<?php if(isset($active_lap_stok_produk)){ echo $active_lap_stok_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/stok_produk">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Produk 
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_stok_mati)){ echo $active_lap_stok_mati;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/stok_mati">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Mati
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_penjualan)){ echo $active_lap_penjualan;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/penjualan">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penjualan
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_lap_pembelian)){ echo $active_lap_pembelian;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/pembelian">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pembelian
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_piutang)){ echo $active_lap_piutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/piutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_hutang)){ echo $active_lap_hutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/hutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hutang
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_kasir)){ echo $active_lap_kasir;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/kasir">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kasir
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_1)){ echo $active_lap_bukubesar_1;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/buku_besar_1">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 1
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_2)){ echo $active_lap_bukubesar_2;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/buku_besar_2">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 2
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_neraca)){ echo $active_lap_neraca;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/neraca">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Neraca
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_labarugi)){ echo $active_lap_labarugi;}; ?> highlight">
                <a href="<?php echo base_url() ?>direktur/laporan_retail/labarugi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Laba Rugi
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