
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
            <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_penjualan_create) || isset($active_orde_sales) || isset($lp) || isset($active_penjualan_sales) || isset($active_retur_penjualan_create) || isset($active_retur_penjualan_manual_create ) || isset($active_order_sales)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-shopping-cart"></i>
              <span class="menu-text">
                Penjualan
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php if(isset($active_order_sales)){ echo $active_order_sales;}; ?> highlight">
                <a id="bOrderSales" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/order_sales">
                  <i class="menu-icon fa fa-arrow-right"></i>
                  <span class="menu-text"> Order Sales</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_order_sales_diterima)){ echo $active_order_sales_diterima;}; ?> highlight">
                <a id="bOrderSales" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/order_sales/diterima">
                  <i class="menu-icon fa fa-shopping-cart"></i>
                  <span class="menu-text"> Order Sales Diterima</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_penjualan_create)){ echo $active_penjualan_create;}; ?> highlight">
                <a id="bPenjualan" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/penjualan_retail/create">
                  <i class="menu-icon fa fa-shopping-cart"></i>
                  <span class="menu-text"> Penjualan</span>
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_retur_penjualan_create)){ echo $active_retur_penjualan_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/returjual">
                  <i class="menu-icon fa fa-list"></i>
                  Retur Penjualan
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_retur_penjualan_manual_create)){ echo $active_retur_penjualan_manual_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/retur_jual2/create">
                  <i class="menu-icon fa fa-list"></i>
                  Retur Penjualan Manual
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
          </li>

          <li class="<?php if(isset($active_pembelian_create) || isset($active_retur_pembelian_create)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-gift"></i>
              <span class="menu-text"> Pembelian </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

              <li class="<?php if(isset($active_pembelian_create)){ echo $active_pembelian_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/pembelian/create">
                  <i class="menu-icon fa fa-caret-right"></i>
                  <span class="menu-text"> Pembelian Barang </span>
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_retur_pembelian_create)){ echo $active_retur_pembelian_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>admin/retur/create">
                  <i class="menu-icon fa fa-caret-right"></i>
                  <span class="menu-text"> Retur Pembelian </span>
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
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
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/akun_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Akun
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_pengaturan_transaksi)){ echo $active_pengaturan_transaksi;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/pengaturan_transaksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pengaturan Transaksi
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_pil_transaksi)){ echo $active_pil_transaksi;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/pil_transaksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pilihan Transaksi
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_buat_jurnal)){ echo $active_buat_jurnal;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/jurnal_retail/buat_jurnal">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buat Jurnal
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_jurnal_create)){ echo $active_jurnal_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/jurnal/create">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buat Jurnal Manual
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_jurnal_list)){ echo $active_jurnal_list;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/jurnal">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Jurnal
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_peny_jurnal)){ echo $active_peny_jurnal;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/penyesuaian_jurnal">
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

              <li class="<?php if(isset($active_pegawai)){ echo $active_pegawai;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/pegawai_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Salesman
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_pelanggan)){ echo $active_pelanggan;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/member_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pelanggan
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_penjualan)){ echo $active_penjualan;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/penjualan_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penjualan
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_supplier)){ echo $active_supplier;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/supplier_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Supplier
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_bank)){ echo $active_bank;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/pil_bank">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Bank
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_piutang)){ echo $active_piutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/piutang_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang Marketplace
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_piutang2)){ echo $active_piutang2;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/piutang2">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang Reseller
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_hutang)){ echo $active_hutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/hutang_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hutang
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_validasi)){ echo $active_validasi;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/validasi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Validasi Data
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
          </li>


          <li class="<?php if(isset($active_produk) || isset($active_kategori_produk) || isset($active_stok_produk) || isset($active_diskon_produk) || isset($active_satuan_produk) || isset($active_produk_kadaluarsa) || isset($active_penyesuaian_stok)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-inbox"></i>
              <span class="menu-text"> Manajemen Produk </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php if(isset($active_produk)){ echo $active_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/produk_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_kategori_produk)){ echo $active_kategori_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/kategori_produk_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kategori Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_satuan_produk)){ echo $active_satuan_produk;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/satuan_produk">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Satuan Produk
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_penyesuaian_stok)){ echo $active_penyesuaian_stok;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/penyesuaian_stok">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penyesuaian Stok
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
          </li>


          <li class="<?php if(isset($active_gudang) || isset($active_stok_gudang) || isset($active_mutasi_stok)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-home"></i>
              <span class="menu-text"> Manajemen Gudang </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_mutasi_stok)){ echo $active_mutasi_stok;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/mutasi_stok">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Mutasi Stok
                </a>
                <b class="arrow"></b>
              </li>

              <!-- <li class="<?php if(isset($active_gudang)){ echo $active_gudang;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/gudang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Gudang
                </a>
                <b class="arrow"></b>
              </li> -->

              <li class="<?php if(isset($active_stok_gudang)){ echo $active_stok_gudang;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/stok_gudang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Stok
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
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/stok_produk">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Produk 
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_stok_mati)){ echo $active_lap_stok_mati;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/stok_mati">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Mati
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_penjualan)){ echo $active_lap_penjualan;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/penjualan">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penjualan
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_lap_pembelian)){ echo $active_lap_pembelian;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/pembelian">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pembelian
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_retur_penjualan)){ echo $active_lap_retur_penjualan;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retur">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Retur Penjualan
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_piutang_c)){ echo $active_lap_piutang_c;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_piutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pelunasan Marketplace
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_piutang)){ echo $active_lap_piutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/piutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang Reseller
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_hutang)){ echo $active_lap_hutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/hutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hutang
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_kasir)){ echo $active_lap_kasir;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/kasir">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kasir
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_1)){ echo $active_lap_bukubesar_1;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/buku_besar_1">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 1
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_2)){ echo $active_lap_bukubesar_2;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/buku_besar_2">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 2
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_neraca)){ echo $active_lap_neraca;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/neraca">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Neraca
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_labarugi)){ echo $active_lap_labarugi;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_retail/labarugi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Laba Rugi
                </a>
                <b class="arrow"></b>
              </li>
              
            </ul>
          </li>

          <li class="<?php if(isset($active_lap2_stok_produk) || isset($active_lap2_stok_mati) || isset($active_lap2_penjualan) || isset($active_lap2_pembelian) || isset($active_lap2_piutang) || isset($active_lap2_hutang) || isset($active_retur_penjualan) || isset($active_retur_pembelian)  || isset($active_lap2_kasir) || isset($active_lap2_bukubesar_1) || isset($active_lap2_bukubesar_2)  || isset($active_lap2_neraca) || isset($active_lap2_labarugi) || isset($active_lap2_salesman) || isset($active_lap2)){ echo 'active open';}; ?> highlight">
            <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan Tambahan </span>
            </a>
          </li>

          <li class="<?php if(isset($active_group_cs) || isset($active_group_produk_cs)){ echo 'active open';}; ?> highlight">
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
                <a id="goupCs" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/group_cs">
                  <i class="menu-icon fa fa-shopping-cart"></i>
                  <span class="menu-text"> Group Advertising CS</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_group_produk_cs)){ echo $active_group_produk_cs;}; ?> highlight">
                <a id="goupCs" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/group_produk_cs">
                  <i class="menu-icon fa fa-shopping-cart"></i>
                  <span class="menu-text"> Group Produk CS</span>
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="<?php if(isset($active_aktivitas_cs) || isset($active_aktivitas_total_cs) || isset($active_aktivitas_total_cs_sistem) || isset($active_aktivitas_bulanan) || isset($active_aktivitas_harian)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-clipboard"></i>
              <span class="menu-text">
                Laporan Aktivitas CS
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php if(isset($active_aktivitas_cs)){ echo $active_aktivitas_cs;}; ?> highlight">
                <a id="goupCs" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_cs/aktivitas">
                  <i class="menu-icon fa fa-clipboard"></i>
                  <span class="menu-text"> Laporan CS</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_aktivitas_total_cs)){ echo $active_aktivitas_total_cs;}; ?> highlight">
                <a id="goupCs" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_cs/aktivitas_total">
                  <i class="menu-icon fa fa-clipboard"></i>
                  <span class="menu-text"> Laporan Total</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_aktivitas_total_cs_sistem)){ echo $active_aktivitas_total_cs_sistem;}; ?> highlight">
                <a id="goupCs" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_cs/aktivitas_total_sistem">
                  <i class="menu-icon fa fa-clipboard"></i>
                  <span class="menu-text"> Laporan Total By System</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_aktivitas_bulanan)){ echo $active_aktivitas_bulanan;}; ?> highlight">
                <a id="goupCs" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_cs/aktivitas_bulanan">
                  <i class="menu-icon fa fa-clipboard"></i>
                  <span class="menu-text"> Laporan Bulanan</span>
                </a>
                <b class="arrow"></b>
              </li>
              <li class="<?php if(isset($active_aktivitas_harian)){ echo $active_aktivitas_harian;}; ?> highlight">
                <a id="goupCs" href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_cs/aktivitas_harian">
                  <i class="menu-icon fa fa-clipboard"></i>
                  <span class="menu-text"> Laporan Harian</span>
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="<?php if(isset($active_order_cs)){ echo $active_order_cs;}; ?>">
            <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/laporan_cs">
              <i class="menu-icon fa fa-edit"></i>
              <span class="menu-text"> Laporan Order CS </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_packing)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-gift"></i>
              <span class="menu-text">
                Packing
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php if (isset($active_packing) || isset($active_dikirim)) { echo $active_packing; }; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/packing">
                  <i class="menu-icon fa fa-gift"></i>
                  <span class="menu-text"> Packing Order </span>
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="<?php if(isset($active_unduh_excel)){ echo 'active open';}; ?> highlight">
            <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/excel">
              <i class="menu-icon fa fa-file"></i>
              <span class="menu-text">
                Unduh Excel
              </span>
            </a>
          </li>

          <li class="<?php if(isset($active_user) || isset($active_toko) || isset($active_reset) || isset($active_pengaturan_jurnal) || isset($active_pengaturan_retail) || isset($active_pengaturan_jurnal) || isset($active_konversi) || isset($active_printer) || isset($active_migrasi) || isset($active_lain_lain)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-cog"></i>
              <span class="menu-text"> Pengaturan </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">

              <li class="<?php if(isset($active_printer)){ echo $active_printer;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/printer_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Printer
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_user)){ echo $active_user;}; ?> highlight">
                <a href="<?php echo base_url() ?>page?url=<?php echo base_url() ?>admin/user_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pengguna
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