
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
            <a href="<?php echo base_url() ?>produksi">
              <i class="menu-icon fa fa-tachometer"></i>
              <span class="menu-text"> Dashboard </span>
            </a>
            <b class="arrow"></b>
          </li>

          <li class="<?php if(isset($active_produksi) || isset($active_inkubasi) || isset($active_pengemasan) || isset($active_produk_jadi) || isset($active_stok_inkubasi)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-gift"></i>
              <span class="menu-text">
                Produksi
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_produksi)){ echo $active_produksi;}; ?> highlight">
                <!-- <a href="<?php echo base_url() ?>pembelian_retail/create"> -->
                <a href="<?php echo base_url() ?>produksi/produksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  <span class="menu-text"> Pengolahan </span>
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_inkubasi)){ echo $active_inkubasi;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/inkubasi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Inkubasi
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_pengemasan)){ echo $active_pengemasan;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/pengemasan">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pengemasan
                </a>
                <b class="arrow"></b>
              </li>

               <li class="<?php if(isset($active_produk_jadi)){ echo $active_produk_jadi;}; ?> highlight">
                <a href="<?php echo base_url() ?>">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Retur Produksi
                </a>
                <b class="arrow"></b>
              </li>

               <li class="<?php if(isset($active_stok_inkubasi)){ echo $active_stok_inkubasi;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/stok_inkubasi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Inkubasi
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <!-- <li class="<?php // if(isset($active_penjualan_create) || isset($active_penjualan_sales) || isset($active_retur_penjualan_create) || isset($active_retur_penjualan_manual_create)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-shopping-cart"></i>
              <span class="menu-text">
                Penjualan
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
              <li class="<?php // if(isset($active_penjualan_create)){ echo $active_penjualan_create;}; ?> highlight">
                <a id="bPenjualan" href="<?php // echo base_url() ?>produksi/penjualan_retail/create">
                  <i class="menu-icon fa fa-shopping-cart"></i>
                  <span class="menu-text"> Penjualan</span>
                </a>
                <b class="arrow"></b>
              </li>
               <li class="<?php // if(isset($active_penjualan_sales)){ echo $active_penjualan_sales;}; ?> highlight">
                <a href="<?php // echo base_url() ?>produksi/penjualan_retail/orders_sales_group">
                  <i class="menu-icon fa fa-list"></i>
                  Penjualan dari sales
                </a>
                <b class="arrow"></b>
              </li> 
              <li class="<?php // if(isset($active_retur_penjualan_create)){ echo $active_retur_penjualan_create;}; ?> highlight">
                <a href="<?php // echo base_url() ?>produksi/retur_jual">
                  <i class="menu-icon fa fa-list"></i>
                  Retur Penjualan
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li> -->
          
          <li class="<?php if(isset($active_pembelian_create) || isset($active_retur_pembelian_create) || isset($active_stok_awal)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-bookmark-o"></i>
              <span class="menu-text">
                Pembelian
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_pembelian_create)){ echo $active_pembelian_create;}; ?> highlight">
                <!-- <a href="<?php echo base_url() ?>produksi/pembelian_retail/create"> -->
                <a href="<?php echo base_url() ?>produksi/pembelian">
                  <i class="menu-icon fa fa-caret-right"></i>
                  <span class="menu-text"> Pembelian Barang </span>
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_retur_pembelian_create)){ echo $active_retur_pembelian_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/retur">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Retur Pembelian
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>

          <li class="<?php if(isset($active_akun) || isset($active_pengaturan_transaksi) || isset($active_pil_transaksi) || isset($active_buat_jurnal) || isset($active_jurnal_kas_create) || isset($active_jurnal_create) || isset($active_jurnal_list)){ echo 'active open';}; ?> highlight">
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
                <a href="<?php echo base_url() ?>produksi/akun_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Akun
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_pengaturan_transaksi)){ echo $active_pengaturan_transaksi;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/pengaturan_transaksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pengaturan Transaksi
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_pil_transaksi)){ echo $active_pil_transaksi;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/pil_transaksi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pilihan Transaksi
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_buat_jurnal)){ echo $active_buat_jurnal;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/jurnal_retail/buat_jurnal">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buat Jurnal
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_jurnal_create)){ echo $active_jurnal_create;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/jurnal/create">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buat Jurnal Manual
                </a>
                <b class="arrow"></b>
              </li>
    
              <li class="<?php if(isset($active_jurnal_list)){ echo $active_jurnal_list;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/jurnal">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Jurnal
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
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

          <li class="<?php if(isset($active_karyawan) || isset($active_gaji_pegawai) || isset($active_presensi)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-user"></i>
              <span class="menu-text">
                Manajemen Kary.
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_karyawan)){ echo $active_karyawan;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/karyawan">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Karyawan
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_presensi)){ echo $active_presensi;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/presensi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Data Presensi
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_gaji_pegawai)){ echo $active_gaji_pegawai;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/gaji_pegawai">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Gaji Pegawai
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
                <a href="<?php echo base_url() ?>produksi/laporan_retail/stok_produk">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Produk
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_stok_mati)){ echo $active_lap_stok_mati;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/stok_mati">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Stok Mati
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_penjualan)){ echo $active_lap_penjualan;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/penjualan">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Penjualan
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_lap_pembelian)){ echo $active_lap_pembelian;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/pembelian">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Pembelian
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_piutang)){ echo $active_lap_piutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/piutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Piutang
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_hutang)){ echo $active_lap_hutang;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/hutang">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Hutang
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_kasir)){ echo $active_lap_kasir;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/kasir">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Kasir
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_1)){ echo $active_lap_bukubesar_1;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/buku_besar_1">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 1
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_bukubesar_2)){ echo $active_lap_bukubesar_2;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/buku_besar_2">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Buku Besar 2
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_neraca)){ echo $active_lap_neraca;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/neraca">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Neraca
                </a>
                <b class="arrow"></b>
              </li>
          
              <li class="<?php if(isset($active_lap_labarugi)){ echo $active_lap_labarugi;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/laporan_retail/labarugi">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Laba Rugi
                </a>
                <b class="arrow"></b>
              </li>
              
            </ul>
          </li>

          <li class="<?php if(isset($active_lap2_stok_produk) || isset($active_lap2_stok_mati) || isset($active_lap2_penjualan) || isset($active_lap2_pembelian) || isset($active_lap2_piutang) || isset($active_lap2_hutang) || isset($active_retur_penjualan) || isset($active_retur_pembelian)  || isset($active_lap2_kasir) || isset($active_lap2_bukubesar_1) || isset($active_lap2_bukubesar_2)  || isset($active_lap2_neraca) || isset($active_lap2_labarugi) || isset($active_lap2_salesman) || isset($active_lap2)){ echo 'active open';}; ?> highlight">
            <a href="<?php echo base_url() ?>produksi/laporan">
              <i class="menu-icon fa fa-list"></i>
              <span class="menu-text"> Laporan Tambahan </span>
            </a>
          </li>

          <li class="<?php if(isset($active_reset) || isset($active_printer) || isset($active_migrasi) || isset($active_lain_lain)){ echo 'active open';}; ?> highlight">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-cog"></i>
              <span class="menu-text"> Pengaturan </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">

              <li class="<?php if(isset($active_reset)){ echo $active_reset;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/reset_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Reset Data
                </a>
                <b class="arrow"></b>
              </li>

              <li class="<?php if(isset($active_printer)){ echo $active_printer;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/printer_retail">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Printer
                </a>
                <b class="arrow"></b>
              </li>
              
              <li class="<?php if(isset($active_lain_lain)){ echo $active_lain_lain;}; ?> highlight">
                <a href="<?php echo base_url() ?>produksi/retail/lain_lain">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Lain-lain
                </a>
                <b class="arrow"></b>
              </li>

            </ul>
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
          <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
      </div>