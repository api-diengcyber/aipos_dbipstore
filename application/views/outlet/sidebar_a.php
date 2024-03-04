
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

          <li class="<?php if(isset($active_home)){ echo $active_home;}; ?> highlight">
            <a href="<?php echo base_url() ?>admin">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_akun) || isset($active_pengaturan_transaksi) || isset($active_pil_transaksi) || isset($active_buat_jurnal) || isset($active_jurnal_kas_create) || isset($active_jurnal_create) || isset($active_jurnal_list) || isset($active_peny_jurnal)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-flag"></i>
              <span class="menu-text">
                Jurnal
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

              <li class="<?php if(isset($active_akun)){ echo $active_akun;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/akun_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Akun
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_pengaturan_transaksi)){ echo $active_pengaturan_transaksi;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/pengaturan_transaksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pengaturan Transaksi
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_pil_transaksi)){ echo $active_pil_transaksi;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/pil_transaksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pilihan Transaksi
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_buat_jurnal)){ echo $active_buat_jurnal;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/jurnal_retail/buat_jurnal">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buat Jurnal
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_jurnal_create)){ echo $active_jurnal_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/jurnal/create">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buat Jurnal Manual
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_jurnal_list)){ echo $active_jurnal_list;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/jurnal">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Jurnal
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_peny_jurnal)){ echo $active_peny_jurnal;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/penyesuaian_jurnal">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penyesuaian Jurnal
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
          </li>


          <li class="<?php if(isset($active_pegawai) || isset($active_pelanggan) || isset($active_kota) || isset($active_penjualan) || isset($active_supplier) || isset($active_pembelian) || isset($active_piutang) || isset($active_hutang) || isset($active_validasi) || isset($active_pil_penjualan_lainnya) || isset($active_piutang2) || isset($active_bank)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-hdd-o"></i>
              <span class="menu-text">
                Manajemen Data
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_piutang)){ echo $active_piutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/piutang_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang Marketplace
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_piutang2)){ echo $active_piutang2;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/piutang2">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang Reseller
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_hutang)){ echo $active_hutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/hutang_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hutang
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
          </li>


          <li class="<?php if(isset($active_lap_stok_produk) || isset($active_lap_stok_mati) || isset($active_lap_penjualan) || isset($active_lap_pembelian) || isset($active_lap_piutang) || isset($active_lap_piutang_c) || isset($active_lap_hutang) || isset($active_retur_penjualan) || isset($active_retur_pembelian)  || isset($active_lap_kasir) || isset($active_lap_bukubesar_1) || isset($active_lap_bukubesar_2)  || isset($active_lap_neraca) || isset($active_lap_labarugi) || isset($active_lap_salesman) || isset($active_lap_retur_penjualan)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan </span>
          
              <b class="arrow fa fa-angle-down"></b>
            </a>
          
            <b class="arrow"></b>
          
            <ul class="submenu">
              
              <li class="<?php if(isset($active_lap_stok_produk)){ echo $active_lap_stok_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/stok_produk">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Produk 
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_stok_mati)){ echo $active_lap_stok_mati;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/stok_mati">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Mati
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_penjualan)){ echo $active_lap_penjualan;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/penjualan">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penjualan
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_lap_pembelian)){ echo $active_lap_pembelian;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/pembelian">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pembelian
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_retur_penjualan)){ echo $active_lap_retur_penjualan;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retur">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Retur Penjualan
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_piutang_c)){ echo $active_lap_piutang_c;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_piutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pelunasan Marketplace
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_piutang)){ echo $active_lap_piutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/piutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang Reseller
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_hutang)){ echo $active_lap_hutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/hutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hutang
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_kasir)){ echo $active_lap_kasir;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/kasir">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kasir
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_1)){ echo $active_lap_bukubesar_1;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/buku_besar_1">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 1
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_2)){ echo $active_lap_bukubesar_2;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/buku_besar_2">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 2
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_neraca)){ echo $active_lap_neraca;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/neraca">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Neraca
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_labarugi)){ echo $active_lap_labarugi;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/laporan_retail/labarugi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Laba Rugi
                </a>
                <b class="arrow"></b>
              </li>
              
            </ul>
          </li>

          <li class="<?php if(isset($active_lap2_stok_produk) || isset($active_lap2_stok_mati) || isset($active_lap2_penjualan) || isset($active_lap2_pembelian) || isset($active_lap2_piutang) || isset($active_lap2_hutang) || isset($active_retur_penjualan) || isset($active_retur_pembelian)  || isset($active_lap2_kasir) || isset($active_lap2_bukubesar_1) || isset($active_lap2_bukubesar_2)  || isset($active_lap2_neraca) || isset($active_lap2_labarugi) || isset($active_lap2_salesman) || isset($active_lap2)){ echo 'active open';}; ?> highlight">
            <a href="<?php echo base_url() ?>admin/laporan">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan Tambahan </span>
            </a>
          </li>


        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>