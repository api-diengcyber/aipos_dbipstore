<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penjualan_retail extends AI_Admin
{
    function __construct()
    {
      parent::__construct();
      $this->libraries('escpos');
      $this->models('Produk_retail_model, Penjualan_retail_model, Transaksi_penjualan_model, Member_retail_model, Orders_temp_retail_model, Orders_detail_retail_model, Piutang_retail_model, Pengaturan_akuntansi_model, Toko_retail_model, User_retail_model, Stok_produk_model, Pembelian_retail_model, Printer_model, Recta_print_model, Pengaturan_opsi_model:M_opsi');
      $data = $this->M_opsi->get_opsi_stok($this->userdata->id_toko);
      $this->status =  $data->opsi;
    }

    public function index()
    {
      $data = array(
        'active_penjualan' => 'active',
      );
      $this->view('penjualan/orders_list', $data);
    }
    
    public function json() {
      header('Content-Type: application/json');
      echo $this->Penjualan_retail_model->json($this->userdata->id_toko);
    }

    public function read($id)
    {
        $active = array('active_penjualan' => 'active',);
        $row = $this->Penjualan_retail_model->get_by_id($id);
        if ($row) {
            // pembayaran //
            $row_pembeli = $this->Member_retail_model->get_by_id($row->pembeli);
            if($row->pembayaran=="1"){
                $pembayaran = "TUNAI";
            } else if($row->pembayaran=="2"){
                $pembayaran = "KREDIT";
            } else if($row->pembayaran=="3"){
                $pembayaran = "DEPOSIT";
            } else {
                $pembayaran = "";
            }
            if(!empty($row_pembeli->nama)){
                $nama_pembeli = $row_pembeli->nama;
            } else {
                $nama_pembeli = "-";
            }
            $data = [
              'id_toko' => $this->userdata->id_toko,
              'nama_toko' => $this->userdata->nama_toko,
              'nama_user' => $this->userdata->email,
              'active_penjualan' => 'active',
              'id_modul' => $this->userdata->id_modul,
              'nama_modul' => $this->userdata->nama_modul,
              'id_orders' => $row->id_orders_2,
              'id_toko' => $row->id_toko,
              'id_users' => $row->id_users,
              'no_faktur' => $row->no_faktur,
              'nama_kustomer' => $row->nama_kustomer,
              'pembeli' => $nama_pembeli,
              'pembayaran' => $pembayaran,
              'deadline' => $row->deadline,
              'tgl_order' => $row->tgl_order,
              'jam_order' => $row->jam_order,
              'nominal' => $row->nominal,
              'laba' => $row->laba,
            ];
            $this->view('penjualan/orders_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penjualan_retail'));
        }
    }

    public function get_faktur()
    {
      $row = $this->Penjualan_retail_model->get_nomor($this->userdata->id_toko, date('d-m-Y'));
      if($row){
          $nomor = sprintf("%05d", $row->nomor+1);
      } else {
          $nomor = "00001";
      }
      $no_faktur_baru = "FJN".date("md").substr(date('Y'),2,2).$nomor;
    //   $no_faktur_baru = "cldaslkdasd";
      return $no_faktur_baru;
    }

    public function cek_faktur($no_faktur)
    {
        $data = array();
        $data['no_faktur'] = $this->get_faktur();

        if ($this->get_faktur() == $no_faktur) {
            // no faktur tidak berubah //
            $data['response'] = "1";
        } else {
            // no faktur berubah //
            $data['response'] = "2";
        }

        echo json_encode($data);

    }

    public function create_default_temp()
    {
        $ar_produk = [3,2,1,4,5,6,7];
        $this->db->select('pr.*');
        $this->db->from('produk_retail pr');
        $this->db->where('pr.id_toko', $this->userdata->id_toko);
        $this->db->where_in('pr.id_produk_2', $ar_produk);
        $this->db->order_by('FIELD(pr.id_produk_2, '.implode(',', $ar_produk).')');
        $array_produk = $this->db->get()->result();
        foreach ($array_produk as $key) {
            $data = [
                'id_toko' => $this->userdata->id_toko,
                'pil_harga' => '1',
                'id_users' => $this->userdata->id_users,
                'id_produk' => $key->id_produk_2,
                'jumlah' => '0',
                'harga_jual' => $key->harga_1,
            ];
            $this->Orders_temp_retail_model->insert($data);
        }
        // Mengosongkan tabel setelah loop selesai
        // $sql = "TRUNCATE TABLE orders_temp";
        // $this->db->query($sql);
    }
    
    public function trial()
    {
        $row = $this->Transaksi_penjualan_model->get_produk_beli($this->userdata->id_toko, 1)->row();
        print_r($row);
        echo "<br>";
        // $r = $this->Transaksi_penjualan_model->action_stok($this->userdata->id_toko, 1, 100);
        // print_r($r);
        
    }

    public function create($id_order = '') 
    {
      ;

//
        $no_faktur = $this->Transaksi_penjualan_model->get_faktur($this->userdata->id_toko, date('d-m-Y'), 1);


        // var_dump($id_order);
        // $this->db->delete('orders_temp');
        // $this->db->empty_table('my_table');
        $active = array('active_penjualan_create' => 'active');
        
      
            $no_faktur = $this->Transaksi_penjualan_model->get_faktur($this->userdata->id_toko, date('d-m-Y'), 1);
      
        $row = $this->db->select('COUNT(id_orders_2) AS jml')
                        ->from('orders')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('id_users', $this->userdata->id_users)
                        ->get()->row();
                        // var_dump($get_faktur,$no_faktur);
        /*$res_akun_transfer = $this->db->select('*')
                                        ->from('akun')
                                        ->where('SUBSTRING(kode,1,10)=', '1.01.03.01')
                                        ->where('LENGTH(kode) > 10')
                                        ->get()->result();*/

        $id_member = $this->input->get('id_member', true);
        $action = site_url('admin/penjualan_retail/create_action');
        $tgl_order = date("d-m-Y");
        $nama_pembeli = "";
        $alamat_pembeli = "";
        $pembayaran = 1;
        $id_media = "";
        $id_sales = "";

        // $this->create_default_temp();

        // jika ada id_order = mode edit
        $row_lo = [];
        if (!empty($id_order)) {
            $action = site_url('admin/penjualan_retail/update_action2');
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_users', $this->userdata->id_users);
            $this->db->delete('orders_temp');

            $this->db->select('o.*');
            $this->db->from('orders o');
            $this->db->where('id_orders_2', $id_order);
            $row_lo = $this->db->get()->row();
            $no_faktur = $row_lo->no_faktur;
            // $tgl_order = date('d-m-Y', strtotime($row_lo->tanggal));
            $tgl_order = $row_lo->tgl_order;

            $expbm = explode("-", $row_lo->bukan_member);
            $nama_pembeli = trim($expbm[0]);
            $alamat_pembeli = !empty($expbm[1])?trim($expbm[1]):"";
            $id_member = $row_lo->pembeli;
            $pembayaran = $row_lo->pembayaran;
            $id_media = $row_lo->media;
            $id_sales = $row_lo->id_sales;

            // cari member
            $this->db->select('*');
            $this->db->from('member');
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('LOWER(REPLACE(nama," ",""))=', strtolower(str_replace(' ','',$nama_pembeli)));
            $this->db->where('telp', $row_lo->no_hp);
            $this->db->where('SUBSTRING(LOWER(REPLACE(alamat," ","")),1,20)=', substr(strtolower(str_replace(' ','',$alamat_pembeli)),0,20));
            $this->db->order_by('(CASE WHEN nama="'.$nama_pembeli.'" THEN 1 ELSE 0 END) DESC');
            $row_member = $this->db->get()->row();
            if ($row_member) {
              $id_member = $row_member->id_member;
            } else {
              // insert member jika email tidak kosong
              if (!empty($row_lo->email)) {
                // $detail_pembeli = explode("#", $row_lo->detail_pembeli);
                $email = !empty($row_lo->email)?$row_lo->email:$row_lo->no_hp;
                $identity = $email;
                $password = "12341234";

                $last_user = $this->db->order_by('id_users','DESC')->get('users')->row();
                $additional_data = [
                  'id_users'   => $last_user->id_users+1,
                  'id_toko'    => $this->userdata->id_toko,
                  'first_name' => $nama_pembeli,
                  'last_name'  => "",
                  'company'    => "",
                  'phone'      => $row_lo->no_hp,
                  'id_cabang'  => $this->userdata->id_cabang,
                  'level'      => 6,
                ];
                $id_user = $this->ion_auth->register($identity, $password, $email, $additional_data);
                if (!empty($id_user)) {
                  $id_member = 1;
                  $row_last_member = $this->db->where('id_toko', $this->userdata->id_toko)->order_by('id_member', 'desc')->get('member')->row();
                  if ($row_last_member) {
                    $id_member = $row_last_member->id_member+1;
                  }
                  $data_insert = array(
                    'id_member' => $id_member,
                    'id_toko' => $this->userdata->id_toko,
                    'id_sales' => $row_lo->id_cs,
                    'id_users' => $id_user,
                    'kode' => '',
                    'nama' => $row_lo->nama_pembeli,
                    'alamat' => $row_lo->alamat,
                    'telp' => $row_lo->no_hp,
                    // 'tgl_lahir' => $detail_pembeli[0],
                  );
                  $this->db->insert('member', $data_insert);

                  // update pembeli/id_member orders
                  $data_upd = [
                    'pembeli' => $id_member,
                  ];
                  $this->db->where('id_orders_2', $row_lo->id_orders_2);
                  $this->db->update('orders', $data_upd);
                }
              }
            }
            
            /* echo "<pre>";
            print_r ($row_member);
            echo "</pre>"; */
            
            $this->db->select('*');
            $this->db->from('orders_detail');
            $this->db->where('id_orders_2', $id_order);
            $res_lod = $this->db->get()->result();
            foreach ($res_lod as $key) {
                $data_insert = [
                    'id_toko' => $this->userdata->id_toko,
                    'id_users' => $this->userdata->id_users,
                    'id_produk' => $key->id_produk,
                    'pil_harga' => '0',
                    'jumlah' => 1,
                    'jumlah_bonus' => '',
                    'diskon' => '',
                    'diskon2' => '',
                    'diskon3' => '',
                    'potongan' => '',
                    'harga_jual' => $key->harga_jual,
                ];
                $this->db->insert('orders_temp', $data_insert);
            }
        }

        $data = [
          'id_toko' => $this->userdata->id_toko,
          'nama_toko' => $this->userdata->nama_toko,
          'nama_user' => $this->userdata->email,
          'active_penjualan' => 'active',
          'id_modul' => $this->userdata->id_modul,
          'nama_modul' => $this->userdata->nama_modul, 
          'max_transaksi' => 10000000,
          'id_modul' => $this->userdata->id_modul,
          'button' => 'Selesai',
          'action' => $action,
          'id_order' => $id_order,
          'id_toko' => $this->userdata->id_toko,
          'id_users' => $this->userdata->id_users,
          'id_sales' => $id_sales,
          'no_faktur' => $no_faktur,
          'id_member' => $id_member,
          'nama_pembeli' => set_value('nama_pembeli', $nama_pembeli),
          'alamat_pembeli' => set_value('alamat_pembeli', $alamat_pembeli),
          'pembeli' => set_value('pembeli'),
          'pembayaran' => set_value('pembayaran', $pembayaran),
          'tgl_order' => $tgl_order,
          'nominal' => set_value('nominal'),
          'id_media' => set_value('id_media', $id_media),
          // 'data_akun_transfer' => $res_akun_transfer,
          'data_lo' => $row_lo,
          'data_media' => $this->db->get('pil_media')->result(),
          'data_bank' => $this->db->get('pil_bank')->result(),
          'data_expedisi' => $this->db->get('expedisi')->result(),
          'data_sales' => $this->db->where('id_toko', $this->userdata->id_toko)->where('level', 2)->order_by('first_name', 'asc')->get('users')->result(),
          'opsi_pilihan' => $this->M_opsi->get_opsi_pilihan($this->userdata->id_toko),
          'opsi_popup' => $this->M_opsi->get_opsi_popup($this->userdata->id_toko),
        ];
        $this->view('penjualan/form_penjualan', $data);
    }
    
    public function create_action() 
    {
        header('Content-Type: application/json');
        $data_i = [
            'id' => $this->input->post('id', true),
            'id_users' => $this->userdata->id_users,
            'date' => $this->input->post('tgl', true),
            'id_media' => $this->input->post('id_media', true),
            'id_sales' => $this->input->post('id_sales', true),
            'jam' => date('H:i:s'),
            'id_pembeli' => $this->input->post('id_pembeli', true),
            'nama_pembeli' => $this->input->post('nama_pembeli', true),
            'alamat_pembeli' => $this->input->post('alamat_pembeli', true),
            'no_hp' => $this->input->post('no_hp', true),
            'pembayaran' => $this->input->post('pembayaran', true),
            'total' => $this->input->post('total', true),
            'id_bank' => $this->input->post('id_bank', true),
            'id_expedisi' => $this->input->post('id_expedisi', true),
            'no_resi' => $this->input->post('no_resi', true),
            'biaya_cod' => $this->input->post('biaya_cod', true),
            'ongkir' => $this->input->post('ongkir', true),
            'deadline' => $this->input->post('deadline', true),
            'nominal_tunai' => $this->input->post('nominal_tunai', true),
            'nominal_transfer' => $this->input->post('nominal_transfer', true),
           
            'nominal_split' => $this->input->post('nominal_split1'),
            'total_diskon' => $this->input->post('total_diskon', true),
            'total_ppn' => $this->input->post('total_ppn', true),
            // 'ongkir' => $this->input->post('ongkir', true),
            'p_nama' => $this->input->post('p_nama', true),
            'p_alamat' => $this->input->post('p_alamat', true),
            'p_hp' => $this->input->post('p_hp', true),
            'd_nama' => $this->input->post('d_nama', true),
            'd_alamat' => $this->input->post('d_alamat', true),
            'd_hp' => $this->input->post('d_hp', true),
            'nominal_split' =>  $this->input->post('nominal_split1', true),
           
        ];
        $r = $this->Transaksi_penjualan_model->action($this->userdata->id_toko, $data_i);
        
            if($data_i['pembayaran']==4){
                $last_id = $this->db->select_max('id_orders_2', 'id_orders')
                        ->from('orders')
                        ->where('id_toko',$this->userdata->id_toko)
                        ->get()
                        ->row();
                        $data_split = [
                                    'id_orders' => $last_id->id_orders,
                                    'id_toko'   => $this->userdata->id_toko,
                                    
                                    'pembayaran' => $this->input->post('bayar_split_2'),
                                    'id_bank' => $this->input->post('bank_split_2'),
                                    'deadline' => $this->input->post('deadline_split_2'),
                                    'nominal'   =>  $this->input->post('nominal_split_2')
                                ];
                        

                        $this->db->insert('split_bayar', $data_split);
            }
        echo json_encode($r);


       
        
       
        


    }



    public function detail_faktur($faktur="")
    {
        $row_orders = $this->Penjualan_retail_model->get_by_no_faktur($faktur);
        $data = [
          'id_toko' => $this->userdata->id_toko,
          'nama_toko' => $this->userdata->nama_toko,
          'nama_user' => $this->userdata->email,
          'active_penjualan_create' => 'active',
          'id_modul' => $this->userdata->id_modul,
          'nama_modul' => $this->userdata->nama_modul,
          'faktur' => $faktur,
        ];
        $this->view('penjualan/detail_faktur', $data);
    }

    public function cetak_nota_penjualan($faktur="", $bayar = 0, $print = 1)
    {
        error_reporting(0);
        $row_orders = $this->Penjualan_retail_model->get_by_no_faktur($faktur);
        $bayar = $row_orders->bayar;
        if ($this->userdata) {

            $this->db->select("od.*, pr.barcode, pr.nama_produk, pr.harga_1, pr.harga_2, pr.harga_3, pr.diskon AS diskon_produk, pr.mingros, sp.satuan");
            $this->db->from("orders_detail od");
            // ->join("users u", "od.id_users=u.id_users AND od.id_toko=u.id_toko")
            $this->db->join("produk_retail pr", "od.id_produk = pr.id_produk_2 AND pr.id_toko = '".$this->userdata->id_toko."'");
            $this->db->join("satuan_produk sp", "pr.satuan=sp.id_satuan AND sp.id_toko = '".$this->userdata->id_toko."'", 'left');
            $this->db->where("od.id_orders_2", $row_orders->id_orders_2);
            $this->db->where("od.id_toko", $this->userdata->id_toko);
            $this->db->where("od.jumlah > 0");
            // ->where("u.id_cabang",$this->userdata->id_cabang)
            $this->db->group_by('od.id_produk');
            $res_orders_detail = $this->db->get()->result();
            
            //$row_member = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_member', $row_orders->pembeli)->get('member')->row();
            $row_member = $this->Member_retail_model->get_by_id($row_orders->pembeli);
            $pembeli = [];
            $nama_pembeli = " - ";
            $alamat_pembeli = "";
            $telp_pembeli = "";
            if ($row_member) { // MEMBER
                $pembeli = $row_member;
                $nama_pembeli = $row_member->nama;
                $alamat_pembeli = $row_member->alamat;
                $telp_pembeli = $row_member->telp;
            } else { 
                $row_orders_lain = $this->db->where('id_orders', $row_orders->id_orders_2)->get('orders_lainnya')->row();
                if ($row_orders_lain) { // PENJUALAN LAINNYA
                    $nama_pembeli = $row_orders_lain->nama_pembeli;
                } else {
                    if (!empty($row_orders->bukan_member)) {
                        $nama_pembeli = $row_orders->bukan_member;
                        $alamat_pembeli = $row_orders->alamat_pembeli;
                        $telp_pembeli = $row_orders->no_hp;
                    } else {
                        $nama_pembeli = $row_orders->pembeli;
                    }
                }
            }
            $nama_kasir = "";
            $row_user = $this->User_retail_model->get_by_id($row_orders->id_users);
            if ($row_user) {
                $nama_kasir = $row_user->first_name;
            }
            $row_ucapan = $this->db->where('id_toko', $this->userdata->id_toko)->get('ucapan')->row();
            if(!empty($row_ucapan)){
                $ucapan = $row_ucapan->ucapan;
            }else{
                $ucapan = 'Terimakasih dan Selamat Berbelanja Kembali';
            }
            $row_fn = $this->db->select('*')
                            ->from('format_nota')
                            ->where('id_toko', $this->userdata->id_toko)
                            ->where('id_users', $this->userdata->id_users)
                            ->get()->row();
            $format_nota = 'kecil';
            if ($row_fn) {
                $format_nota = $row_fn->format;
            }
            $nama_sales = "";
            $row_sales = $this->db->select('u2.first_name, u2.last_name')
                                  ->from('member m')
                                  ->join('users u', 'm.id_users=u.id_users AND u.id_toko="'.$this->userdata->id_toko.'"')
                                  ->join('users u2', 'm.id_sales=u.id_users AND u.id_toko="'.$this->userdata->id_toko.'"')
                                  ->where('m.id_toko', $this->userdata->id_toko)
                                  //->where('u.id_cabang', $this->userdata->id_cabang)
                                  ->where('m.id_member', $row_orders->pembeli)
                                  ->get()->row();
            if ($row_sales) {
                $nama_sales = $row_sales->first_name." ".$row_sales->last_name;
            }
            $data = [
                'print' => $print,
                'toko' => $this->Toko_retail_model->get_by_id($this->userdata->id_toko),
                'orders' => $row_orders,
                'orders_detail' => $res_orders_detail,
                'nama_kasir' => $nama_kasir,
                'nama_sales' => $nama_sales,
                'pembeli' => $pembeli,
                'nama_pembeli' => $nama_pembeli,
                'alamat_pembeli' => $alamat_pembeli,
                'telp_pembeli' => $telp_pembeli,
                'user' => $this->User_retail_model->get_by_id($row_orders->id_users),
                'bayar' => $bayar,
                'piutang' => $this->Piutang_retail_model->get_by_no_faktur($faktur),
                'opsi_diskon' => $this->M_opsi->get_opsi_diskon($this->userdata->id_toko)->opsi,
                'faktur' => $faktur,
                'ucapan' => $ucapan,
                //'ppn' => $this->M_opsi->get_ppn($this->userdata->id_toko)
                'ppn' => 0
            ];
            $opsi_printer = $this->M_opsi->get_opsi_printer($this->userdata->id_toko, $this->userdata->id_users)->opsi;
            if($opsi_printer == 0){ // PRINT SMARTPHONE
                $this->cetak_nota_direct_android($faktur, $bayar);
            } else if ($opsi_printer == 1) { // PRINT RECTA
                $this->cetak_nota_penjualan3($faktur, $bayar);
            } else if ($opsi_printer == 2) { // PRINT WINDOWS
                $this->_cetak_nota_wprint($format_nota, $data);
            } else if ($opsi_printer == 3) { // PRINT RECTA + SMARTPHONE
                $this->cetak_nota_penjualan3($faktur, $bayar);
                //echo '<script>window.open("'.base_url().'penjualan_retail/cetak_nota_direct_android/'.$faktur.'/'.$bayar.'", "MsgWindow2", "width=300,height=400");</script>';
                //$this->cetak_nota_direct_android($faktur, $bayar);
            } else if ($opsi_printer == 4) { // PRINT WINDOWS + SMARTPHONE
                $this->_cetak_nota_wprint($format_nota, $data);
                //echo '<script>window.open("'.base_url().'penjualan_retail/cetak_nota_direct_android/'.$faktur.'/'.$bayar.'", "MsgWindow2", "width=300,height=400");</script>';
                //$this->cetak_nota_direct_android($faktur, $bayar);
            } else { // PRINT RECTA
                $this->cetak_nota_penjualan3($faktur, $bayar);
            }
        } else {
            $this->load->view('/');
        }
    }
    public function wa_nota_penjualan($faktur="", $bayar = 0, $print = 1)
    {
    

        error_reporting(0);
        $row_orders = $this->Penjualan_retail_model->get_by_no_faktur($faktur);
        $bayar = $row_orders->bayar;
        if ($this->userdata) {

            $this->db->select("od.*, pr.barcode, pr.nama_produk, pr.harga_1, pr.harga_2, pr.harga_3, pr.diskon AS diskon_produk, pr.mingros, sp.satuan");
            $this->db->from("orders_detail od");
            // ->join("users u", "od.id_users=u.id_users AND od.id_toko=u.id_toko")
            $this->db->join("produk_retail pr", "od.id_produk = pr.id_produk_2 AND pr.id_toko = '".$this->userdata->id_toko."'");
            $this->db->join("satuan_produk sp", "pr.satuan=sp.id_satuan AND sp.id_toko = '".$this->userdata->id_toko."'", 'left');
            $this->db->where("od.id_orders_2", $row_orders->id_orders_2);
            $this->db->where("od.id_toko", $this->userdata->id_toko);
            $this->db->where("od.jumlah > 0");
            // ->where("u.id_cabang",$this->userdata->id_cabang)
            $this->db->group_by('od.id_produk');
            $res_orders_detail = $this->db->get()->result();
            
            //$row_member = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_member', $row_orders->pembeli)->get('member')->row();
            $row_member = $this->Member_retail_model->get_by_id($row_orders->pembeli);
            $pembeli = [];
            $nama_pembeli = "";
            $alamat_pembeli = "";
            $telp_pembeli = "";
            if ($row_member) { // MEMBER
                $pembeli = $row_member;
                $nama_pembeli = $row_member->nama;
                $alamat_pembeli = $row_member->alamat;
                $telp_pembeli = $row_member->telp;
            } else { 
                $row_orders_lain = $this->db->where('id_orders', $row_orders->id_orders_2)->get('orders_lainnya')->row();
                if ($row_orders_lain) { // PENJUALAN LAINNYA
                    $nama_pembeli = $row_orders_lain->nama_pembeli;
                } else {
                    if (!empty($row_orders->bukan_member)) {
                        $nama_pembeli = $row_orders->bukan_member;
                        $alamat_pembeli = $row_orders->alamat_pembeli;
                        $telp_pembeli = $row_orders->no_hp;
                    } else {
                        $nama_pembeli = $row_orders->pembeli;
                    }
                }
            }
            // var_dump($row_member,$row_orders_lain,$row_orders->bukan_member,$row_orders->alamat_pembeli);
            $nama_kasir = "";
            $row_user = $this->User_retail_model->get_by_id($row_orders->id_users);
            if ($row_user) {
                $nama_kasir = $row_user->first_name;
            }
            $row_ucapan = $this->db->where('id_toko', $this->userdata->id_toko)->get('ucapan')->row();
            if(!empty($row_ucapan)){
                $ucapan = $row_ucapan->ucapan;
            }else{
                $ucapan = 'Terimakasih dan Selamat Berbelanja Kembali';
            }
            $row_fn = $this->db->select('*')
                            ->from('format_nota')
                            ->where('id_toko', $this->userdata->id_toko)
                            ->where('id_users', $this->userdata->id_users)
                            ->get()->row();
            $format_nota = 'kecil';
            if ($row_fn) {
                $format_nota = $row_fn->format;
            }
            $nama_sales = "";
            $row_sales = $this->db->select('u2.first_name, u2.last_name')
                                  ->from('member m')
                                  ->join('users u', 'm.id_users=u.id_users AND u.id_toko="'.$this->userdata->id_toko.'"')
                                  ->join('users u2', 'm.id_sales=u.id_users AND u.id_toko="'.$this->userdata->id_toko.'"')
                                  ->where('m.id_toko', $this->userdata->id_toko)
                                  //->where('u.id_cabang', $this->userdata->id_cabang)
                                  ->where('m.id_member', $row_orders->pembeli)
                                  ->get()->row();
            if ($row_sales) {
                $nama_sales = $row_sales->first_name." ".$row_sales->last_name;
            }
            $data = [
                'print' => $print,
                'toko' => $this->Toko_retail_model->get_by_id($this->userdata->id_toko),
                'orders' => $row_orders,
                'orders_detail' => $res_orders_detail,
                'nama_kasir' => $nama_kasir,
                'nama_sales' => $nama_sales,
                'pembeli' => $pembeli,
                'nama_pembeli' => $nama_pembeli,
                'alamat_pembeli' => $alamat_pembeli,
                'telp_pembeli' => $telp_pembeli,
                'user' => $this->User_retail_model->get_by_id($row_orders->id_users),
                'bayar' => $bayar,
                'piutang' => $this->Piutang_retail_model->get_by_no_faktur($faktur),
                'opsi_diskon' => $this->M_opsi->get_opsi_diskon($this->userdata->id_toko)->opsi,
                'faktur' => $faktur,
                'ucapan' => $ucapan,
                //'ppn' => $this->M_opsi->get_ppn($this->userdata->id_toko)
                'ppn' => 0
            ];
        //   var_dump($data);
            $telp = str_replace("08", "628",  $telp_pembeli);
            $toko = $this->db->select("*")
                    ->from('toko')
                    ->where('id',$this->userdata->id_toko)
                    ->get()
                    ->row();
                    $pesan =    $data['toko']->nama_toko."\n".
                    "Telp: ".$data['toko']->telp."\n".
                    "Alamat: ".$data['toko']->alamat."\n".
                    "------------------------\n".
                    "FAKTUR PENJUALAN\n".
                    "NO FAKTUR : ". $data['orders']->no_faktur."\n". // Ubah $faktur menjadi $data['orders']->no_faktur
                    "Tgl : ".$data['orders']->tgl_order."\n". // Tanggal order dari $data['orders']
                    "Jth. Tempo : ".$data['piutang']."\n". // Tanggal hari ini
                    "------------------------\n".
                    "\n".
                    "Produk\n".
                    "\n";
        
            //    // Tambahkan detail pesanan dari $data['orders_detail']
                        foreach ($data['orders_detail'] as $product) {
                            $nama_produk = $product->nama_produk;
                            $jumlah = $product->jumlah;
                            $harga_satuan = $product->harga_jual;
                            $diskon_produk = $harga_satuan * ($product->diskon_produk / 100);
                            $diskon1 = $harga_satuan * ($product->diskon / 100);
                            $diskon2 = $harga_satuan * ($product->diskon2 / 100);
                            $diskon3 = $harga_satuan * ($product->diskon3 / 100);
                            $diskon = ($diskon1 * $jumlah) + ($diskon2 * $jumlah) + ($diskon3 * $jumlah) + ($diskon_produk * $jumlah);
                            
                            // Harga satuan setelah diskon
                            $harga_setelah_diskon = $harga_satuan - $diskon_produk - $diskon1 - $diskon2 - $diskon3;
                            
                            // Subtotal setelah diskon
                            $subtotal_setelah_diskon = $jumlah * $harga_setelah_diskon;
                            
                            // Format harga dengan titik sebagai pemisah ribuan
                            $harga_setelah_diskon_formatted = number_format($harga_setelah_diskon);

                            // Format subtotal dengan titik sebagai pemisah ribuan
                            $subtotal_setelah_diskon_formatted = number_format($subtotal_setelah_diskon);

                            // Tambahkan informasi produk dengan harga setelah diskon ke dalam pesan
                            $pesan .= "$nama_produk\n$jumlah x Rp.$harga_setelah_diskon_formatted = Rp.$subtotal_setelah_diskon_formatted\n";
                            
                            // Tambahkan diskon produk ke total harga
                            $total_harga += $subtotal_setelah_diskon;
                        }

                        // Format total harga dengan titik sebagai pemisah ribuan
                        $total_harga_formatted = number_format($total_harga);

                        // Tambahkan informasi subtotal, total harga, dan ucapan terakhir ke dalam pesan
                        $pesan .= "\nSubtotal: Rp." . $total_harga_formatted . "\n\n" . $ucapan;


                $pesan_encoded = urlencode($pesan);
        

                // Buat URL untuk membuka WhatsApp dengan pesan yang ditentukan
                $url_whatsapp = "https://wa.me/$telp?text=$pesan_encoded";

                // Membuka jendela baru dengan URL WhatsApp
                $script = "<script>window.open('$url_whatsapp', 'MsgWindow', 'width=800', 'height=800');</script>";
                echo $script;

 // $nomor_whatsapp = '6282241912303'; // Ganti dengan nomor WhatsApp yang diinginkan
        // $pesan = urlencode("FAKTUR PENJUALAN\n" .
        //                     "PHONE STORE\n" .
        //                     "FACTORY OUTLET\n" .
        //                     "Telp : 78568678678\n" .
        //                     "---------------------------------\n" .
        //                     "Kepada : -\n" .
        //                     "Telp :\n" .
        //                     "Alamat :\n" .
        //                     "Tanggal : 23-02-2024\n" .
        //                     "Jth. Tempo :\n" .
        //                     "Sales :\n" .
        //                     "----------------------------\n" .
        //                     "Product:\n" .
        //                     "SHAMPO\n1x Rp.20.000,- = Rp.20.000,-\n" .
        //                     "SABUN CUCI MUKA LO\n3x Rp.30.000,- = Rp.90.000,-\n" .
        //                     "----------------------------\n" .
        //                     "Subtotal: Rp.110.000,-\n" .
        //                     "Payment :TUNAI\n" .
        //                     "Terimakasih sudah berbelanja di toko kami");
    
        // $script = "<script>window.open('https://wa.me/$nomor_whatsapp?text=$pesan','MsgWindow', 'width=300, height=400');</script>";
        // echo $script;

            





            // $opsi_printer = $this->M_opsi->get_opsi_printer($this->userdata->id_toko, $this->userdata->id_users)->opsi;
            // if($opsi_printer == 0){ // PRINT SMARTPHONE
            //     $this->cetak_nota_direct_android($faktur, $bayar);
            // } else if ($opsi_printer == 1) { // PRINT RECTA
            //     $this->cetak_nota_penjualan3($faktur, $bayar);
            // } else if ($opsi_printer == 2) { // PRINT WINDOWS
            //     $this->_cetak_nota_wprint($format_nota, $data);
            // } else if ($opsi_printer == 3) { // PRINT RECTA + SMARTPHONE
            //     $this->cetak_nota_penjualan3($faktur, $bayar);
            //     //echo '<script>window.open("'.base_url().'penjualan_retail/cetak_nota_direct_android/'.$faktur.'/'.$bayar.'", "MsgWindow2", "width=300,height=400");</script>';
            //     //$this->cetak_nota_direct_android($faktur, $bayar);
            // } else if ($opsi_printer == 4) { // PRINT WINDOWS + SMARTPHONE
            //     $this->_cetak_nota_wprint($format_nota, $data);
            //     //echo '<script>window.open("'.base_url().'penjualan_retail/cetak_nota_direct_android/'.$faktur.'/'.$bayar.'", "MsgWindow2", "width=300,height=400");</script>';
            //     //$this->cetak_nota_direct_android($faktur, $bayar);
            // } else { // PRINT RECTA
            //     $this->cetak_nota_penjualan3($faktur, $bayar);
            // }
        } else {
            $this->load->view('/');
        }

       
    }

    private function _cetak_nota_wprint($format_nota, $data)
    {
        if ($format_nota == 'praktis2') {
            $this->load->view('admin/penjualan/cetak_nota_penjualan_praktis3', $data);
            //$this->load->view('admin/penjualan/cetak_nota_penjualan_praktis2', $data);
        } else if ($format_nota == 'praktis') {
            $this->load->view('admin/penjualan/cetak_nota_penjualan_praktis', $data);
        } else if ($format_nota == 'besar') {
            $this->load->view('admin/penjualan/cetak_nota_penjualan_besar', $data);
        } else {
            $this->load->view('admin/penjualan/cetak_nota_penjualan', $data);
        }
    }
    public function test_print(){
        echo $this->M_opsi->get_opsi_printer($this->userdata->id_toko, $this->userdata->id_users)->opsi;
    }

    public function cetak_nota_penjualan2($faktur, $bayar = 0)
    {
        $row_toko = $this->Toko_retail_model->get_by_id($this->userdata->id_toko);
        $row_orders = $this->Penjualan_retail_model->get_by_no_faktur($faktur);
        $row_fn = $this->db->select('*')
                        ->from('format_nota')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('id_users', $this->userdata->id_users)
                        ->get()->row();
        $format_nota = 'kecil';
        if ($row_fn && $row_fn->format == 'besar') {
            $format_nota = 'besar';
        }
        $bayar = $row_orders->bayar;
        $row_user = $this->User_retail_model->get_by_id($row_orders->id_users);
        $res_ord = $this->db->select("orders_detail.*, produk_retail.barcode, produk_retail.nama_produk, produk_retail.harga_1, produk_retail.harga_2, produk_retail.harga_3, produk_retail.diskon AS diskon_produk, produk_retail.mingros")
                                            ->from("orders_detail")
                                            ->join("produk_retail", "orders_detail.id_produk = produk_retail.id_produk_2 AND produk_retail.id_toko='".$this->userdata->id_toko."'")
                                            ->where("orders_detail.id_orders_2", $row_orders->id_orders_2)
                                            ->get()->result();
        $row_member = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_member', $row_orders->pembeli)->get('member')->row();
        $nama_pembeli = "";
        if ($row_member) { // MEMBER
            $nama_pembeli = $row_member->nama;
        } else { 
            $row_orders_lain = $this->db->where('id_orders', $row_orders->id_orders_2)->get('orders_lainnya')->row();
            if ($row_orders_lain) { // PENJUALAN LAINNYA
                $nama_pembeli = $row_orders_lain->nama_pembeli;
            } else {
                if (!empty($row_orders->bukan_member)) {
                    $nama_pembeli = $row_orders->bukan_member;
                } else {
                    $nama_pembeli = $row_orders->pembeli;
                }
            }
        }
        $sp = 32;
        $tampil_faktur = "Faktur: ".$row_orders->no_faktur;
        $tampil_kasir  = "Kasir : ".$row_user->first_name;
        $tampil_jam = $row_orders->jam_order;
        $tampil_tgl = $row_orders->tgl_order;
        $len_faktur = strlen($tampil_faktur);
        $len_kasir = strlen($tampil_kasir);
        $len_jam = strlen($tampil_jam);
        $len_tgl = strlen($tampil_tgl);
        $space_after_faktur = $sp - ($len_faktur + $len_tgl);
        $space_after_kasir = $sp - ($len_kasir + $len_jam);
        $is_after_faktur = "";
        for ($i=0; $i < $space_after_faktur; $i++) { 
            $is_after_faktur .= " ";
        }
        $is_after_kasir = "";
        for ($i=0; $i < $space_after_kasir; $i++) { 
            $is_after_kasir .= " ";
        }
        $ket_faktur = $tampil_faktur.$is_after_faktur.$tampil_tgl."\n".$tampil_kasir.$is_after_kasir.$tampil_jam;
        $row = $this->Printer_model->get_by_server($this->userdata->id_toko);
        if ($row) {
            $print_er = $row->printer;
        } else {
            $print_er = $this->Printer_model->default_printer;
        }

        $row_toko = $this->Toko_retail_model->get_by_id($this->session->userdata('id_toko'));
        if (!empty($row_toko->foto) && file_exists('assets/foto_toko/'.$row_toko->foto)) {
            //$logo = site_url('assets/foto_toko/'.$row_toko->foto);
            $logo = site_url('assets/foto_toko/default.gif');
        } else {
            $logo = site_url('assets/foto_toko/default.gif');
        }

        try {

            //$connector = new Escpos\PrintConnectors\WindowsPrintConnector("POS-58"); // Windows
            $connector = new Escpos\PrintConnectors\FilePrintConnector($print_er); // Linux
            //$printer = database
            //$connector = new Escpos\PrintConnectors\".$printer.";
            //$tux = new Escpos\EscposImage($logo, Escpos\Printer::IMG_DOUBLE_WIDTH | Escpos\Printer::IMG_DOUBLE_HEIGHT);
            $printer = new Escpos\Printer($connector);
            
            /* header */ 
            //$printer->selectPrintMode(Escpos\Printer::MODE_EMPHASIZED);
            $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
            //$printer->bitImageColumnFormat($tux);

            /*
            Epson TM-T88III (graphics() yes, bitimage() yes, character test works too)
            Okipos (Winbond/Nuvotron chip):
            Okipos 80 Plus III (parallel interface, (graphics() no, bitimage() no, character test works too))
            Zijiang (Chinese company, Winbond/Nuvotron used)
            ZJ-5890T (USB interface , graphics() no, bitimage () yes)
            ZJ-5870 (USB interface , graphics() no, bitimage () yes)
            NT-58H (USB interface , graphics() no, bitimage () yes)
            Xprinter (another Chinese company, higher quality than ZiJiang) (testing these in next couple days)
            XP-T58K
            XP-58III
            XP-58IIIA
            XP-58IIIK
            XP-Q800 (80mm auto cutter) all functions apart from graphics works
            XP-76IIN (label printer, 58mm)
            */
            //$printer->graphics($tux);

            $printer->setEmphasis(true);
            $printer->setTextSize(1, 1);
            $printer->text(strtoupper($row_toko->nama_toko));
            $printer->text("\n");
            $printer->setTextSize(1, 1);
            $printer->setFont(Escpos\Printer::FONT_B);
            $printer->text($row_toko->alamat.", Telp : ".$row_toko->telp);
            $printer->setEmphasis(false);
            $printer->text("\n");
            $printer->feed();
            $printer->setEmphasis(true);
            $printer->setTextSize(1, 1);
            $printer->setFont();
            $printer->text($ket_faktur);
            $printer->setEmphasis(false);
            $printer->text("================================");
            $printer->setEmphasis(false);
            /* header */

            $printer->text("\n");
            $printer->setJustification(Escpos\Printer::JUSTIFY_LEFT);
            $printer->text("Pembeli : ".$nama_pembeli);
            $printer->setEmphasis(false);
            $printer->text("\n");
            $printer->text("\n");
           
            /* isi */
            $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
            $total_harga = 0;
            foreach ($res_ord as $key) {
                /*
                if($key->mingros > 0){
                    if($key->jumlah >= $key->mingros){
                        // grosir //
                        $harga = $key->harga_2;
                    } else {
                        // biasa //
                        $harga = $key->harga_1;
                    }
                } else {
                    $harga = $key->harga_1;
                }*/
                $total_harga += $key->subtotal;

                $tampil_nm_prod = substr($key->nama_produk,0,$sp)." ";
                $tampil_jml = " ".number_format($key->harga_jual,0,',','.')."x".$key->jumlah." | ".number_format($key->potongan,0,',','.');
                $tampil_sub_tot = " Rp ".number_format($key->subtotal,0,',','.');
                $len_nm_prod = strlen($tampil_nm_prod);
                $len_jml = strlen($tampil_jml);
                $len_sub_tot = strlen($tampil_sub_tot);
                $space_after_nm_prod = $sp - ($len_nm_prod + $len_jml + $len_sub_tot);
                $is_after_nm_prod = "";
                for ($i=0; $i < $space_after_nm_prod; $i++) {
                    $is_after_nm_prod .= ".";
                }
                /* jika tidak ada space
                akan dibuat baris baru 
                */
                if($i == 0){
                    $space_after_nm_prod = $sp - $len_nm_prod;
                    $space_before_jml = $sp - ($len_jml + $len_sub_tot);
                    $is_after_nm_prod = "";
                    for ($i=0; $i < $space_after_nm_prod; $i++) { 
                        $is_after_nm_prod .= ".";
                    }
                    $is_before_jml = "";
                    for ($i=0; $i < $space_before_jml; $i++) { 
                        $is_before_jml .= ".";
                    }
                    $prod = $tampil_nm_prod.$is_after_nm_prod."\n".$is_before_jml.$tampil_jml.$tampil_sub_tot;
                } else {
                    $prod = $tampil_nm_prod.$is_after_nm_prod.$tampil_jml.$tampil_sub_tot;
                }
                /* printer */
                $printer->setJustification(Escpos\Printer::JUSTIFY_LEFT);
                $printer->setEmphasis(true);
                $printer->text($prod);
                $printer->setEmphasis(false);
                $printer->text("\n");

            }
            $printer->setFont();
            $printer->text("--------------------------------");
            $kembali = $bayar - $total_harga;
            $printer->feed();
            $printer->setJustification(Escpos\Printer::JUSTIFY_LEFT);
            $printer->setEmphasis(true);
            $tampil_tot_harga = " Rp ".number_format($total_harga,0,',','.');
            $tampil_bayar = " Rp ".number_format($bayar,0,',','.');
            $tampil_kembali = " Rp ".number_format($kembali,0,',','.');
            $len_tot_harga = strlen($tampil_tot_harga);
            $len_bayar = strlen($tampil_bayar);
            $len_kembali = strlen($tampil_kembali);
            $space_tot_harga = $sp - ($len_tot_harga + 14);
            $space_bayar = $sp - ($len_bayar + 14);
            $space_kembali = $sp - ($len_kembali + 14);
            $is_tot_harga = "";
            for ($i=1; $i <= $space_tot_harga; $i++) { 
                $is_tot_harga .= ".";
            }
            $is_bayar = "";
            for ($i=1; $i <= $space_bayar; $i++) { 
                $is_bayar .= ".";
            }
            $is_kembali = "";
            for ($i=1; $i <= $space_kembali; $i++) { 
                $is_kembali .= ".";
            }

            $printer->text("TOTAL HARGA : ".$is_tot_harga."".$tampil_tot_harga); // panjang char 14
            $printer->text("\n");
            $printer->text("BAYAR       : ".$is_bayar."".$tampil_bayar); // --
            $printer->text("\n");
            $printer->text("KEMBALI     : ".$is_kembali."".$tampil_kembali); // --
            $printer->text("\n");
            $printer->setEmphasis(false);
            $printer->feed();
            /* isi */

            /* footer */
            $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
            $printer->setEmphasis(true);
            $printer->text("Terima Kasih dan Selamat Belanja Kembali. \n");
            $printer->setEmphasis(false);
            //$printer->setJustification();
            $printer->setFont(Escpos\Printer::FONT_B);
            $printer->setEmphasis(true);
            $printer->text("\n");
            $printer->text("\n");
            //$printer->text("FOLLOW IG KAMI : @p.icecreamspace");
            //$printer->text("\n");
            $printer->text("aplikasi kasir dibuat www.diengcyber.com");
            $printer->text("\n");
            $printer->text("\n");
            $printer->setEmphasis(false);
            $printer->feed(2);
            /* footer */
            /* Close printer */
            $printer->cut();
            $printer->pulse();
            //$printer->close();
        } catch(Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }

    }
    public function cetak_nota_penjualan3($faktur, $bayar = 0){
        $row_toko = $this->Toko_retail_model->get_by_id($this->userdata->id_toko);
        $row_orders = $this->Penjualan_retail_model->get_by_no_faktur($faktur);
        $row_fn = $this->db->select('*')
                        ->from('format_nota')
                        ->where('id_toko', $this->userdata->id_toko)
                        ->where('id_users', $this->userdata->id_users)
                        ->get()->row();
        $format_nota = 'kecil';
        if ($row_fn) {
            $format_nota = $row_fn->format;
        }
        $mekanik = $this->db->select('detail_mekanik.*,users.first_name')
                            ->from('detail_mekanik')
                            ->join('users','users.id_users = detail_mekanik.id_mekanik and users.id_toko ='.$this->userdata->id_toko)
                            ->where('detail_mekanik.id_orders',$row_orders->id_orders_2)
                            ->where('detail_mekanik.id_toko',$this->userdata->id_toko)
                            ->group_by('first_name')
                            ->get()->result();
        $data_mekanik = "";
        if(count($mekanik)>0){
            foreach ($mekanik as $m) {
                $name = $m->first_name;
                if($m->level == 1){
                    $name .= '(K)';
                }
                $data_mekanik .= $name.',';
            }
        }
        $bayar = $row_orders->bayar;
        $row_user = $this->User_retail_model->get_by_id($row_orders->id_users);
        $res_ord = $this->db->select("od.*, pr.barcode, pr.nama_produk, pr.harga_1, pr.harga_2, pr.harga_3, pr.diskon AS diskon_produk, pr.mingros")
                                            ->from("orders_detail od")
                                            ->join("produk_retail pr", "od.id_produk = pr.id_produk_2 AND pr.id_toko='".$this->userdata->id_toko."'")
                                            ->where("od.id_orders_2", $row_orders->id_orders_2)
                                            ->get()->result();
        
        $row_member = $this->db->where('id_member', $row_orders->pembeli)->where('id_toko',$this->userdata->id_toko)->get('member')->row();
        $diskon_member = 0;
        if(!empty($row_member->diskon)){
        $diskon_member = $row_member->diskon;
        }
        $telp = '';
        if(!empty($row_member->telp)){
            $telp = $row_member->telp;
        }
        $nama_pembeli = "";
        $alamat_pembeli = "";
        if ($row_member) { // MEMBER
            $nama_pembeli = $row_member->nama;
            $alamat_pembeli = $row_member->alamat;
        } else { 
            $row_orders_lain = $this->db->where('id_orders', $row_orders->id_orders_2)->get('orders_lainnya')->row();
            if ($row_orders_lain) { // PENJUALAN LAINNYA
                $nama_pembeli = $row_orders_lain->nama_pembeli;
            } else {
                if (!empty($row_orders->bukan_member)) {
                    $nama_pembeli = $row_orders->bukan_member;

                } else {
                    $nama_pembeli = $row_orders->pembeli;
                }
            }
        }
        $row = $this->Printer_model->get_by_server($this->userdata->id_toko);
        if ($row) {
            $print_er = $row->printer;
        } else {
            $print_er = $this->Printer_model->default_printer;
        }
        $row_toko = $this->Toko_retail_model->get_by_id($this->session->userdata('id_toko'));
        if (!empty($row_toko->foto) && file_exists('assets/foto_toko/'.$row_toko->foto)) {
            //$logo = site_url('assets/foto_toko/'.$row_toko->foto);
            $logo = site_url('assets/foto_toko/default.gif');
        } else {
            $logo = site_url('assets/foto_toko/default.gif');
        }
        $row_ucapan = $this->db->where('id_toko', $this->userdata->id_toko)->get('ucapan')->row();
        if (!empty($row_ucapan)) {
            $ucapan = $row_ucapan->ucapan;
        } else {
            $ucapan = 'Terimakasih dan Selamat Berbelanja Kembali';
        }
        $data_print = [
            'nama_toko' => $row_toko->nama_toko,
            'alamat' => $row_toko->alamat,
            'telp' => $row_toko->telp,
            'no_faktur' => $row_orders->no_faktur,
            'tgl_order' => $row_orders->tgl_order,
            'first_name' => $row_user->first_name,
            'jam_order' => $row_orders->jam_order,
            'nama_pembeli' => $nama_pembeli,
            'res_ord' => $res_ord,
            'ucapan' => $ucapan,
        ];
        if ($format_nota == 'praktis2') {
            $this->Recta_print_model->print_recta_praktis2($data_print);
        } else if ($format_nota == 'praktis') {
            $this->Recta_print_model->print_recta_praktis($data_print);
        } else if ($format_nota == 'besar') {
            $this->Recta_print_model->print_recta_besar($data_print);
        } else {
            $this->Recta_print_model->print_recta_default($data_print);
        }
    }

    public function cetak_nota_direct_android($faktur, $bayar = 0) {
        $row_toko = $this->Toko_retail_model->get_by_id($this->userdata->id_toko);
        $row_orders = $this->Penjualan_retail_model->get_by_no_faktur($faktur);
        $mekanik = $this->db->select('detail_mekanik.*,users.first_name')
                            ->from('detail_mekanik')
                            ->join('users','users.id_users = detail_mekanik.id_mekanik and users.id_toko ='.$this->userdata->id_toko)
                            ->where('detail_mekanik.id_orders',$row_orders->id_orders_2)
                            ->where('detail_mekanik.id_toko',$this->userdata->id_toko)
                            ->group_by('first_name')
                            ->get()->result();
        $data_mekanik = "";
        if(count($mekanik) > 0){
            foreach ($mekanik as $m) {
                $name = $m->first_name;
                if($m->level == 1){
                    $name .= '(K)';
                }
                $data_mekanik .= $name.',';
            }
        }
        $bayar = $row_orders->bayar;
        $row_user = $this->User_retail_model->get_by_id($row_orders->id_users);

        $this->db->select("od.*, pr.barcode, pr.nama_produk, pr.harga_1, pr.harga_2, pr.harga_3, pr.diskon AS diskon_produk, pr.mingros");
        $this->db->from("orders_detail od");
        $this->db->join("produk_retail pr", "od.id_produk = pr.id_produk_2 AND pr.id_toko='".$this->userdata->id_toko."'");
        $this->db->where("od.id_orders_2", $row_orders->id_orders_2);
        $res_ord = $this->db->get()->result();
        
        $row_member = $this->db->where('id_member', $row_orders->pembeli)->where('id_toko',$this->userdata->id_toko)->get('member')->row();
        $diskon_member = 0;
        if(!empty($row_member->diskon)){
        $diskon_member = $row_member->diskon;
        }
        $telp = '';
        if(!empty($row_member->telp)){
            $telp = $row_member->telp;
        }
        $nama_pembeli = "";
        $alamat_pembeli = "";
        if ($row_member) { // MEMBER
            $nama_pembeli = $row_member->nama;
            $alamat_pembeli = $row_member->alamat;
        } else { 
            $row_orders_lain = $this->db->where('id_orders', $row_orders->id_orders_2)->get('orders_lainnya')->row();
            if ($row_orders_lain) { // PENJUALAN LAINNYA
                $nama_pembeli = $row_orders_lain->nama_pembeli;
            } else {
                if (!empty($row_orders->bukan_member)) {
                    $nama_pembeli = $row_orders->bukan_member;

                } else {
                    $nama_pembeli = $row_orders->pembeli;
                }
            }
        }
        $sp = 41;
        $tampil_faktur = "No. Faktur: ".$row_orders->no_faktur.' ';
        $tampil_kasir  = "Kasir     : ".$row_user->first_name.' ';
        $tampil_jam = $row_orders->jam_order;
        $tampil_tgl = $row_orders->tgl_order;
        $tampil_pembeli = "Pembeli   : ".$nama_pembeli;
        $tampil_alamat =  "Alamat   : ".$alamat_pembeli;
        $tampil_mekanik = "Mekanik   : ".$data_mekanik;
        $len_faktur = strlen($tampil_faktur);
        $len_kasir = strlen($tampil_kasir);
        $len_jam = strlen($tampil_jam);
        $len_tgl = strlen($tampil_tgl);
        $len_pembeli = strlen($tampil_pembeli);
        $space_after_faktur = $sp - ($len_faktur + $len_tgl);
        $space_after_kasir = $sp - ($len_kasir + $len_jam);
        $is_after_faktur = "";
        for ($i=0; $i < $space_after_faktur; $i++) { 
            $is_after_faktur .= " ";
        }
        $is_after_kasir = "";
        for ($i=0; $i < $space_after_kasir; $i++) { 
            $is_after_kasir .= " ";
        }
        $ket_faktur = $tampil_faktur.$is_after_faktur.$tampil_tgl."\n".$tampil_kasir.$is_after_kasir.$tampil_jam;
        $row = $this->Printer_model->get_by_server($this->userdata->id_toko);
        if ($row) {
            $print_er = $row->printer;
        } else {
            $print_er = $this->Printer_model->default_printer;
        }

        $row_toko = $this->Toko_retail_model->get_by_id($this->session->userdata('id_toko'));
        if (!empty($row_toko->foto) && file_exists('assets/foto_toko/'.$row_toko->foto)) {
            //$logo = site_url('assets/foto_toko/'.$row_toko->foto);
            $logo = site_url('assets/foto_toko/default.gif');
        } else {
            $logo = site_url('assets/foto_toko/default.gif');
        }
            $print = "<small><bold><center>";
            $print .=strtoupper($row_toko->nama_toko);
            $print .="<br><small><center>".$row_toko->alamat;
            $print .="<br><small><center>Telp : ".$row_toko->telp;
            $print .="<br><normal><small>=========================================<br><left><small>";
            $print .=$tampil_faktur.$is_after_faktur.$tampil_tgl;
            $print .="<br><small>".$tampil_kasir.$is_after_kasir.$tampil_jam;
            $print .="<br>";
            if(!empty($row_member->id_member)){
            $print .="<left><small>".$tampil_pembeli."<br><small>".$tampil_alamat;
            }else if($row_orders->bukan_member != ""){
            $print .="<left><small>".$tampil_pembeli;
            }
            $print .=" <br>";
            $print .="<left><small>Produk";
            $print .="<br><small>No. Jumlah   Harga(Diskon)       Subtotal";
           /* isi */
            $nomor =1;
            $total_harga = 0;
            foreach ($res_ord as $key) {
                 $total_harga += $key->subtotal;
                 $harga = number_format($key->harga_jual,0,',','.');
                 $tampil_tot_harga = number_format($total_harga,0,',','.');
                 $tampil_nm_prod = $nomor.')  '.substr($key->nama_produk,0,$sp);
                 $tampil_jml = '    '.$key->jumlah;
                 $diskon = '';
                 if($key->diskon > 0){
                 $diskon     = '('.$key->diskon.' %)';
                 }
                 $subtotal   = number_format($key->subtotal,0,',','.');
                 $len_diskon = strlen($diskon);
                 $len_jumlah = strlen($tampil_jml);
                 $len_sub    = strlen($subtotal);
                 $len_tot_harga = strlen($tampil_tot_harga);
                 $len_harga = strlen($harga);
                 $space_after_jumlah = 26 - ($len_jumlah + $len_diskon + $len_harga);
                 $space_before_sub   = $sp - $len_sub - 26;
                 //echo $space_before_sub;
                 $is_harga = "";
                 for($i=0; $i < $space_after_jumlah; $i++) { 
                      $is_harga .= " ";
                 }
                 $is_before_sub = "";
                 for ($i=0; $i < $space_before_sub; $i++) { 
                      $is_before_sub .= " ";
                  }
                  $print .="<br><small>".$tampil_nm_prod;
                  $print .="<br><small>".$tampil_jml.$is_harga.$harga.$diskon.$is_before_sub.$subtotal;
                $nomor ++;
            }

            $print .= '<left><bold>';

            $diskon_tot = 0;
            $diskon_produk = $key->harga_jual * $key->diskon_produk/100 * $key->jumlah;
            $od = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko);
            if($od->opsi == 1){
                $total_harus_bayar = $total_harga - ($total_harga * $diskon_member/100);
                $diskon_tot = 'Rp '.number_format($total_harga * $diskon_member/100,0,',','.');
                $tampil_total_h_bayar = " Rp ".number_format($total_harus_bayar,0,',','.');
                $kembali = $bayar - $total_harus_bayar;
            }else if($key->diskon > 0 ){
                $total_harus_bayar = $total_harga - ($total_harga * $diskon_member/100);
                $tampil_total_h_bayar = " Rp ".number_format($total_harga,0,',','.');
                $kembali = $bayar - $total_harus_bayar;
            }
            else{
                $tampil_total_h_bayar = $total_harga;
                $kembali = $bayar - $total_harga;
            }
            $diskon_total = " Rp ".number_format($diskon_tot+$diskon_produk,0,',','.');
            $tampil_bayar = " Rp ".number_format($bayar,0,',','.');
            $tampil_kembali  = " Rp ".number_format($kembali,0,',','.');
            $tampil_tot_harga = " Rp ".number_format($total_harga,0,',','.');
            $len_tot_harga   = strlen($tampil_tot_harga);
            $len_tot_diskon  = strlen($diskon_total);
            $len_tot_h_bayar = strlen($tampil_total_h_bayar);
            $len_bayar = strlen($tampil_bayar);
            $len_diskon_tot = strlen($diskon_tot);
            $len_kembali = strlen($tampil_kembali);
            $space_after_total = $sp - $len_tot_harga - 27;
            $space_after_th    = $sp - $len_tot_h_bayar - 27;
            $space_after_pembayaran = $sp - $len_bayar - 27;
            $space_after_kembali = $sp - $len_kembali - 27;
            $space_after_diskon_member = $sp - $len_diskon_tot - 27;
            //baru
            $is_after_total = "";
            for ($i=0; $i < $space_after_total; $i++) { 
                $is_after_total .= " ";
            }
            $is_after_total_harus = "";
            for ($i=0; $i < $space_after_th; $i++) { 
                $is_after_total_harus .= " ";
            }
            $is_after_p = "";
            for ($i=0; $i < $space_after_pembayaran; $i++) { 
                $is_after_p .= " ";
            }
            $is_after_kembali = "";
            for ($i=0; $i < $space_after_kembali; $i++) { 
                $is_after_kembali .= " ";
            }
            $is_after_dm = "";
            for ($i=0; $i < $space_after_diskon_member; $i++) { 
                $is_after_dm .= " ";
            }

            $print .="<br><small>                     Total ".$is_after_total.$tampil_tot_harga;
            if(!empty($row_member->id_member)){
            $print .="<br><small>             Diskon member ".$is_after_dm.$diskon_tot;
            }
            $print .="<br><small> Total yang harus di bayar ".$is_after_total_harus.$tampil_total_h_bayar;
            $print .="<br><small>          Pembayaran tunai ".$is_after_p.$tampil_bayar;
            $print .="<br><small>                   Kembali ".$is_after_kembali.$tampil_kembali;
            $print .="<br> ";
            $row_ucapan = $this->db->where('id_toko', $this->userdata->id_toko)->get('ucapan')->row();
            if(!empty($row_ucapan)){
                $ucapan = $row_ucapan->ucapan;
            }else{
                $ucapan = 'Terimakasih dan Selamat Berbelanja Kembali';
            }
            $print .="<br><center><bold><small>".$ucapan;
            $print .=" <br>";
            $print .="<small><center>Aplikasi kasir ini dibuat oleh";
            $print .="<br><small><center>www.diengcyber.com";
            $print .="<br><br>";

        echo '
        <script src="'.site_url('assets/js/jquery-2.1.4.min.js').'"></script>
        <script>
        function sendToQuickPrinter(){
            var text = "test printer<br><big>Big title<br><cut>";
            var textEncoded = encodeURI(text);
            window.location.href="quickprinter://"+textEncoded;
        }
        function sendToQuickPrinterChrome(){
            var text = "'.$print.'"; 
            var textEncoded = encodeURI(text);
            window.location.href="intent://"+textEncoded+"#Intent;scheme=quickprinter;package=pe.diegoveloper.printerserverapp;end;";
        }
        </script>
        <script>
            sendToQuickPrinterChrome();
        </script>
        ';
        
    }
    public function update($id) 
    {
        $row = $this->Penjualan_retail_model->get_by_id($id);
        if ($row) {
            $data = array(
              'id_toko' => $this->userdata->id_toko,
              'nama_toko' => $this->userdata->nama_toko,
              'nama_user' => $this->userdata->email,
              'active_penjualan' => 'active',
              'id_modul' => $this->userdata->id_modul,
              'nama_modul' => $this->userdata->nama_modul,
              'id_modul' => $this->userdata->id_modul,
              'button' => 'Simpan',
              'action' => site_url('admin/penjualan_retail/update_action'),
              'id_orders' => set_value('id_orders', $row->id_orders),
              'id_toko' => set_value('id_toko', $row->id_toko),
              'id_users' => set_value('id_users', $row->id_users),
              'no_faktur' => set_value('no_faktur', $row->no_faktur),
              'nama_kustomer' => set_value('nama_kustomer', $row->nama_kustomer),
              'pembeli' => set_value('pembeli', $row->pembeli),
              'pembayaran' => set_value('pembayaran', $row->pembayaran),
              'deadline' => set_value('deadline', $row->deadline),
              'tgl_order' => set_value('tgl_order', $row->tgl_order),
              'jam_order' => set_value('jam_order', $row->jam_order),
              'nominal' => set_value('nominal', $row->nominal),
              'laba' => set_value('laba', $row->laba),
            );
            $this->view('penjualan/orders_form_update', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penjualan_retail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_orders', TRUE));
        } else {
            $data = array(
              'id_modul' => $this->userdata->id_modul,
              'id_toko' => $this->input->post('id_toko',TRUE),
              'id_users' => $this->input->post('id_users',TRUE),
              'no_faktur' => $this->input->post('no_faktur',TRUE),
              'nama_kustomer' => $this->input->post('nama_kustomer',TRUE),
              'pembeli' => $this->input->post('pembeli',TRUE),
              'pembayaran' => $this->input->post('pembayaran',TRUE),
              'deadline' => $this->input->post('deadline',TRUE),
              'tgl_order' => $this->input->post('tgl_order',TRUE),
              'jam_order' => $this->input->post('jam_order',TRUE),
              'nominal' => $this->input->post('nominal',TRUE),
              'laba' => $this->input->post('laba',TRUE),
            );
            $this->Penjualan_retail_model->update($this->input->post('id_orders', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/penjualan_retail'));
        }
    }
    
    public function update_action2() 
    {
      header('Content-Type: application/json');
      $id = $this->input->post('id', true);
      $id_pembeli = $this->input->post('id_pembeli', true);
      $id_sales = $this->input->post('id_sales', true);
      $tgl = $this->input->post('tgl', true);
      $nama_pembeli = $this->input->post('nama_pembeli', true);
      $alamat_pembeli = $this->input->post('alamat_pembeli', true);
      $pembayaran = $this->input->post('pembayaran', true);
      $total_asli = $this->input->post('total_asli', true);
      $diskon_member = $this->input->post('diskon_member', true);
      $total = $this->input->post('total', true);
      $ppn_nominal = $this->input->post('ppn_nominal', true);
      $total_ppn = $this->input->post('total_ppn', true);
      $total_diskon = $this->input->post('total_diskon', true);
      $deadline = $this->input->post('deadline', true);
      $nominal_tunai = $this->input->post('nominal_tunai', true);
      $nominal_transfer = $this->input->post('nominal_transfer', true);
      $akun_transfer = $this->input->post('akun_transfer', true);
      $nominal_hutang = $this->input->post('nominal_hutang', true);
      $deadline2 = $this->input->post('deadline2', true);
      $ongkos_kirim = $this->input->post('ongkos_kirim', true);
      $id_media = $this->input->post('id_media', true);
      $id_bank = $this->input->post('id_bank', true);
      $id_expedisi = $this->input->post('id_expedisi', true);
      $no_resi = $this->input->post('no_resi', true);
      $biaya_cod = $this->input->post('biaya_cod', true);

      // ambil data orders
      $this->db->select('o.*');
      $this->db->from('orders o');
      $this->db->where('o.id_toko', $this->userdata->id_toko);
      $this->db->where('o.id_orders_2', $id);
      $row_o = $this->db->get()->row();

      $bukan_member = "";
      if ($id_pembeli*1==0) {
        $bukan_member = $nama_pembeli." - ".$alamat_pembeli;
      }
      if ($row_o) {
        // update data orders
        $data_update = array(
          'pembeli' => $id_pembeli,
          'diskon_member' => $diskon_member,
          'bukan_member' => $bukan_member,
          'pembayaran' => $pembayaran,
          'nominal' => $total,
          'bayar' => $total,
          'deadline' => $deadline,
          'ppn' => 0,
          'ppn_nominal' => $ppn_nominal,
          'ongkir' => $ongkos_kirim,
          'id_media' => $id_media,
          'id_bank' => $id_bank,
          'id_expedisi' => $id_expedisi,
          'no_resi' => $no_resi,
          'biaya_lain' => $biaya_cod,
        );
        $this->db->where('id_orders_2', $id);
        $this->db->update('orders', $data_update);

        // hapus tabel orders detail
        $this->db->where('id_orders_2', $id);
        $this->db->delete('orders_detail');

        // insert tabel orders detail dari temp
        $res_temp = $this->Orders_temp_retail_model->get_barang_temp($this->userdata->id_users, $this->userdata->id_toko);
      }

      $data_result = array();
      echo json_encode($res_temp);
    }
    
    public function delete($id) 
    {
        $row = $this->Penjualan_retail_model->get_by_id($id);
        if ($row) {
            $res_orders_detail = $this->db->select("od.*, pr.barcode, pr.nama_produk, pr.harga_1, pr.harga_2, pr.harga_3, pr.diskon AS diskon_produk, pr.mingros")
                                            ->from("orders_detail od")
                                            // ->join('users u', 'od.id_karyawan=u.id_users AND u.id_toko=od.id_users')
                                            ->join("produk_retail pr", "od.id_produk = pr.id_produk_2 AND pr.id_toko = '".$this->userdata->id_toko."'")
                                            ->where("od.id_orders_2", $row->id_orders_2)
                                            ->where("od.id_toko", $this->userdata->id_toko)
                                            // ->where("u.id_cabang", $this->userdata->id_cabang)
                                            ->group_by('od.id_orders')
                                            ->get()->result();
            foreach ($res_orders_detail as $key_od) {
                $data = (array)json_decode($key_od->json);
                foreach ($data as $id_pembelian => $stok_diambil) {
                    $row_pembelian = $this->db->select('p.*, sp.id AS sp_id, sp.stok, sp.stok_before')
                                              ->from('pembelian p')
                                            //   ->join('users u', 'p.id_users=u.id_users AND u.id_toko=od.id_users')
                                              ->join('stok_produk sp', 'p.id_pembelian=sp.id_pembelian AND p.id_produk=sp.id_produk AND sp.id_toko="'.$this->userdata->id_toko.'"')
                                              ->where('p.id_toko', $this->userdata->id_toko)
                                            //   ->where("u.id_cabang", $this->userdata->id_cabang)
                                              ->where('p.id_pembelian', $id_pembelian)
                                              ->get()->row();
                    if ($row_pembelian) {
                        $data_update_produk = array(
                            'stok' => $row_pembelian->stok+$stok_diambil,
                        );
                        $this->db->where('id', $row_pembelian->sp_id);
                        $this->db->update('stok_produk', $data_update_produk);
                    }
                }
                $this->db->where('id_toko', $this->userdata->id_toko);
                $this->db->where('id_orders_2', $key_od->id_orders_2);
                $this->db->delete('orders_detail');
            }
            $this->Penjualan_retail_model->delete($id, $this->userdata->id_toko);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/penjualan_retail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/penjualan_retail'));
        }
    }

    public function _rules_create() 
    {
        $this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('no_faktur', 'no faktur', 'trim|required');
        $this->form_validation->set_rules('pembeli', 'pembeli', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('id_toko', 'id toko', 'trim|required');
        $this->form_validation->set_rules('id_users', 'id users', 'trim|required');
        $this->form_validation->set_rules('no_faktur', 'no faktur', 'trim|required');
        $this->form_validation->set_rules('nama_kustomer', 'nama kustomer', 'trim|required');
        $this->form_validation->set_rules('pembeli', 'pembeli', 'trim|required');
        $this->form_validation->set_rules('pembayaran', 'pembayaran', 'trim|required');
        $this->form_validation->set_rules('deadline', 'deadline', 'trim|required');
        $this->form_validation->set_rules('tgl_order', 'tgl order', 'trim|required');
        $this->form_validation->set_rules('jam_order', 'jam order', 'trim|required');
        $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric');
        $this->form_validation->set_rules('laba', 'laba', 'trim|required|numeric');
        $this->form_validation->set_rules('id_orders', 'id_orders', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "orders.xls";
        $judul = "orders";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Toko");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Users");
        xlsWriteLabel($tablehead, $kolomhead++, "No Faktur");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kustomer");
        xlsWriteLabel($tablehead, $kolomhead++, "Pembeli");
        xlsWriteLabel($tablehead, $kolomhead++, "Pembayaran");
        xlsWriteLabel($tablehead, $kolomhead++, "Deadline");
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl Order");
        xlsWriteLabel($tablehead, $kolomhead++, "Jam Order");
        xlsWriteLabel($tablehead, $kolomhead++, "Nominal");
        xlsWriteLabel($tablehead, $kolomhead++, "Laba");

        foreach ($this->Penjualan_retail_model->get_by_id_toko($this->userdata->id_toko) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_toko);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_users);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_faktur);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_kustomer);
            xlsWriteLabel($tablebody, $kolombody++, $data->pembeli);
            xlsWriteNumber($tablebody, $kolombody++, $data->pembayaran);
            xlsWriteNumber($tablebody, $kolombody++, $data->deadline);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl_order);
            xlsWriteLabel($tablebody, $kolombody++, $data->jam_order);
            xlsWriteNumber($tablebody, $kolombody++, $data->nominal);
            xlsWriteNumber($tablebody, $kolombody++, $data->laba);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=orders.doc");

        $data = array(
            'orders_data' => $this->Penjualan_retail_model->get_by_id_toko($this->userdata->id_toko),
            'start' => 0
        );

        $this->load->view('admin/penjualan_retail/orders_doc',$data);
    }

    public function load_temp()
    {
        header("Content-type: application/json");
        $tgl = date('Y-m-d');
        $result = $this->Orders_temp_retail_model->get_barang_temp($this->userdata->id_users, $this->userdata->id_toko);
        if (count($result) == 0) {
            // $this->create_default_temp();
            //  $this->db->delete('orders_temp');
        }
        $i = 1;
        $total = 0;
        $total_diskon_nominal = 0;
        $data = array();
        foreach ($result as $key) {
            // if ($key->pil_harga=="1") { // HARGA UMUM
            //   if ($key->mingros > 0) {
            //     if($key->jumlah >= $key->mingros) {
            //       // grosir //
            //       $harga = $key->harga_2;
            //     } else {
            //       // biasa //
            //       $harga = $key->harga_1;
            //     }
            //   } else {
            //     $harga = $key->harga_1;
            //   }
            // } else if ($key->pil_harga=="2") { // HARGA GROSIR 1
            //   $harga = $key->harga_2;
            // } else if ($key->pil_harga=="3") { // HARGA GROSIR 2
            //   $harga = $key->harga_3;
            // } else if ($key->pil_harga=="4") { // HARGA RITA
            //   $harga = $key->harga_4;
            // } else if ($key->pil_harga=="5") { // HARGA RITA
            //   $harga = $key->harga_5;
            // } else if ($key->pil_harga=="6") { // HARGA RITA
            //   $harga = $key->harga_6;
            // } else {
            //   $harga = 0;
            // }
            $harga = $key->harga_jual;
            /*
            $diskon_produk = $harga*($key->diskon_produk/100);
            $diskon1 = $harga*($key->diskon/100);
            $diskon2 = $harga*($key->diskon2/100);
            $diskon3 = $harga*($key->diskon3/100);
            $diskon = ($diskon1*$key->jumlah) + ($diskon2*$key->jumlah) + ($diskon3*$key->jumlah) + ($diskon_produk*$key->jumlah);
            $sub_total = ($harga*$key->jumlah)-$diskon;
            */
            $sub_total_asli = $harga * $key->jumlah;
            $sub_total = $harga * ((100-$key->diskon_produk)/100) * ((100-$key->diskon)/100) * ((100-$key->diskon2)/100) * ((100-$key->diskon3)/100) * $key->jumlah;
            $total += $sub_total;
            $total_diskon_nominal += $sub_total_asli-$sub_total;
            $data_stok = 0;
            if($this->userdata->id_modul == '1' || $this->userdata->id_modul == '2') { // FREE / BASIC //
                $res_pembelian = $this->get_stok($key->id_produk_2, $this->userdata->id_toko);
                foreach ($res_pembelian as $key6) {
                    $data_stok += $key6->stok;
                }
            } else { // SELAIN BASIC //
                $res_pembelian = $this->get_stok($key->id_produk_2, $this->userdata->id_toko);
                foreach ($res_pembelian as $key6) {
                    // $tgl_expire = $key6->tgl_expire;
                    // $tgl_expire = $key6->tgl_expire;
                    // if(!empty($tgl_expire)){
                    //     $exexpire = explode("-", $tgl_expire);
                    //     $hr_exp = $exexpire[0];
                    //     $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                    //     $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                    //     $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                    //     if($stgl_expire <= $tgl){
                    //         // stok kadaluarsa //
                    //         $data_stok += $key6->stok;
                    //     } else {
                            $data_stok += $key6->stok;
                    //     }
                    // }
                }
            }
            $data[$i-1] = array(
                'no' => $i,
                'id_orders_temp' => $key->id_orders_temp,
                'id_produk_2' => $key->id_produk_2,
                'nama_produk' => $key->nama_produk,
                'harga_1' => $key->harga_1,
                'harga_2' => $key->harga_2,
                'harga_3' => $key->harga_3,
                'harga_4' => $key->harga_4,
                'harga_jual' => $key->harga_jual,
                'pil_harga' => $key->pil_harga*1,
                'jumlah' => empty($key->jumlah)?'':$key->jumlah,
                'jumlah_bonus' => $key->jumlah_bonus,
                'potongan' => $key->potongan,
                'harga' => $harga,
                'stok' => $data_stok,
                'diskon' => $key->diskon*1,
                'diskon2' => $key->diskon2*1,
                'diskon3' => $key->diskon3*1,
                'mingros' => $key->mingros,
                'sub_total' => $sub_total,
            );
            $i++;
        }
        $total_asli = $total;
        $diskon = 0;
        $diskon_member_nominal = 0;
        $id_member = $this->input->post('id_member', true);
        if(!empty($id_member)){
          /* validasi apakah ada member dengan id tersebut atau tidak */
          $od = $this->db->where('id_toko', $this->userdata->id_toko)->where('id_member', $id_member)->get('member');
          if($od->num_rows() != 0){
            /* jika pengaturan opsi menggunakan diskon member */
            $od_r = $od->row();
            $opsi_diskon = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko);
            if($opsi_diskon->opsi == 1){
                $diskon_member_nominal = ($total * $od_r->diskon/100);
                $total = $total - $diskon_member_nominal;
                $diskon = $od_r->diskon;
            }
          }
        }
        //$ppn = 10;
        $ppn = 0;
        $ppn_nominal = ceil(($ppn/100) * $total);
        $total_ppn = $total + $ppn_nominal;
        $dataa = array(
            'total_asli' => $total_asli,
            'total' => $total,
            'ppn' => $ppn,
            'ppn_nominal' => $ppn_nominal,
            'total_ppn' => $total_ppn,
            'diskon' => $diskon,
            'data' => $data,
            'total_diskon_nominal' => $total_diskon_nominal+$diskon_member_nominal
        );
        echo json_encode($dataa);
    }

    public function panelPenjualan()
    {  
        $tgl = date('Y-m-d');

        // PANEL BARANG //
        $panelBarang =  "
        <script src='".base_url()."assets/js/jquery-2.1.4.min.js'></script>
          <table id='dynamic-table' class='table table-striped table-bordered table-hover'>
            <thead>
              <tr>
                <th class='center' width='2'>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>";
                if($this->status == 0){
                $panelBarang .= "<th>Stok</th>";
                }
        $panelBarang .=
                "<th>Diskon 1</th>
                <th>Diskon 2</th>
                <th>Diskon 3</th>
                <th>Grosir</th>
                <th>Sub Total</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
        ";
        $result = $this->Orders_temp_retail_model->get_barang_temp($this->userdata->id_users, $this->userdata->id_toko);
        $i = 1;
        $total = 0;
        $data = array();
        foreach ($result as $key) {
            if ($key->mingros > 0) {
                if ($key->jumlah >= $key->mingros) {
                    // grosir //
                    $harga = $key->harga_2;
                } else {
                    // biasa //
                    $harga = $key->harga_1;
                }
            } else {
                $harga = $key->harga_1;
            }
            /* jika ada member */
            $hm = '';
            $id_member = $this->input->post('id_member');
            /* validasi apakah ada member dengan id tersebut atau tidak */
            $dm = $this->db->where('id_toko',$this->userdata->id_toko)->where('id_member', $id_member)->get('member');
            // PANEL BARANG //
            if ($dm->num_rows() != 0) {
                /* jika pengaturan opsi menggunakan harga 3 */
                $opsi_diskon = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko);
                if($opsi_diskon->opsi == 0){
                    $harga = $key->harga_3;
                    $hm = ' (3)';
                }
            }
            $diskon_produk = $harga*($key->diskon_produk/100);
            $diskon1 = $harga*($key->diskon/100);
            $diskon2 = $harga*($key->diskon2/100);
            $diskon3 = $harga*($key->diskon3/100);
            $diskon = ($diskon1*$key->jumlah) + ($diskon2*$key->jumlah) + ($diskon3*$key->jumlah) + ($diskon_produk*$key->jumlah);
            $sub_total = ($harga*$key->jumlah)-$diskon;
            //$row_barang = $this->Produk_retail_model->get_by_id($key->id_produk_2);

            $data_stok = 0;
            if($this->userdata->id_modul == '1' || $this->userdata->id_modul == '2') { // FREE / BASIC //
                $res_pembelian = $this->get_stok($key->id_produk_2, $this->userdata->id_toko);
                foreach ($res_pembelian as $key6) {
                    $data_stok += $key6->stok;
                }
            } else { // SELAIN BASIC //
                $res_pembelian = $this->get_stok($key->id_produk_2, $this->userdata->id_toko);
                foreach ($res_pembelian as $key6) {
                    // $tgl_expire = $key6->tgl_expire;
                    // $tgl_expire = $key6->tgl_expire;
                    // if(!empty($tgl_expire)){
                    //     $exexpire = explode("-", $tgl_expire);
                    //     $hr_exp = $exexpire[0];
                    //     $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                    //     $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                    //     $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                    //     if($stgl_expire <= $tgl){
                    //         // stok kadaluarsa //
                    //     } else {
                            $data_stok += $key6->stok;
                    //     }
                    // }
                }
            }

            $panelBarang .= "
              <tr id='rowBarang_".$key->id_orders_temp."'>
                <td class='center'>
                <input type='hidden' id='id_orders_temp_".$i."' name='id_orders_temp[]' value='".$key->id_orders_temp."'>
                <input type='hidden' id='id_produk_".$i."' name='id_produk[]' value='".$key->id_produk_2."'>
                ".$i."</td>
                
                <td>".$key->nama_produk."</td>
                <td><input id='jumlah_input' name='jumlah[]' type='text' style='width:50px;' value='".$key->jumlah."' tabindex='2' maxlength='11' autocomplete='off' /></td>
                <td>Rp <span style='float:right;'>".number_format($harga,0,',','.')."</span></td>
                ";
                 if($this->status == 0){
                $panelBarang .= "<td class='center'>".$data_stok."</td>";
                }
            $panelBarang .= "    
                <td class='center'>".$key->diskon."</td>
                <td class='center'>".$key->diskon2."</td>
                <td class='center'>".$key->diskon3."</td>
                <td class='center'>".$key->mingros."</td>
                <td>Rp <span style='float:right;'>".number_format($sub_total,0,',','.')."</span></td>
                <td>
                  <div class='action-buttons'>
                    <button type='button' class='red' id='removeBarang_".$i."' value='".$key->id_orders_temp."' tab-index='100' >
                      <i class='ace-icon fa fa-trash-o bigger-130'></i>
                    </button>
                    <button type='button' class='green' id='btn_ubah' data-id='".$key->id_orders_temp."'><i class='fa fa-pencil'></i> Ubah</button>
                  </div>
                </td>
              </tr>
            ";
            $total += $sub_total;
            $subt = $sub_total;
            $data[$key->id_orders_temp] = array(
                'nama_produk' => $key->nama_produk,
                'jumlah' => $key->jumlah,
                'harga' => $harga,
                'potongan' => $key->potongan*1,
                'potongan_persen' => $key->diskon*1,
                'potongan_persen2' => $key->diskon2*1,
                'potongan_persen3' => $key->diskon3*1,
                'total' => $subt,
            );
            $i++;
        }
        $panelBarang .= "
            </tbody>
          </table>
        ";
        // PANEL BARANG //
        // JIKA MENGGUNAKAN DISKON MEMBER

        /*jika ada member */
        $member = $this->input->post('member');
        if($member == 'true'){
            $id_member = $this->input->post('id_member');
            /* validasi apakah ada member dengan id tersebut atau tidak */
            $od = $this->db->where('id_toko',$this->userdata->id_toko)->where('id_member',$id_member)->get('member');
            if($od->num_rows() != 0){
                /* jika pengaturan opsi menggunakan diskon member */
                $od_r = $od->row();
                $opsi_diskon = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko);
                if($opsi_diskon->opsi == 1){
                    $total = $total - ($total * $od_r->diskon/100);
                }
            }
        }
        //

        // HASIL //
        $data = array(
            'panelBarang' => $panelBarang,
            'panelTotal' => number_format($total,0,',','.'),
            'data' => $data,
        );
        // HASIL //

        echo json_encode($data);
    }

    public function tableTemp()
    {
        $tgl = date('Y-m-d');

        //opsi diskon
        $od = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko)->opsi;
        $panelBarang =  "
        <style>
            #dynamic-table thead th{
                background: linear-gradient(to bottom , #9CEDFF, #5DBFDC);
                color:black;
            }
            #dynamic-table tbody tr{
                color:black;
                font-weight: bold;
                cursor: pointer;
            }
        </style>
        <script src='".base_url()."assets/js/jquery-2.1.4.min.js'></script>
          <table id='dynamic-table' class='table table-striped table-bordered table-hover'>
            <thead>
              <tr>
                <th>KETERANGAN</th>
                <th class='text-right'>KTS</th>
                <th class='text-right'>@HARGA</th>
                <th class='text-right'>TOTAL</th>
              </tr>
            </thead>
            <tbody>
        ";
        $result = $this->Orders_temp_retail_model->get_barang_temp($this->userdata->id_users, $this->userdata->id_toko);
        $i = 1;
        $total = 0;
        $data = array();
        $diskon_p = false;
        foreach ($result as $key) {
            if($key->mingros > 0){
                if($key->jumlah >= $key->mingros){
                    // grosir //
                    $harga = $key->harga_2;
                } else {
                    // biasa //
                    $harga = $key->harga_1;
                }
            } else {
                $harga = $key->harga_1;
            }
            /*jika ada member */
            $hm = '';
            $member = $this->input->post('member');
            if($member == 'true'){
                $id_member = $this->input->post('id_member');
                /* validasi apakah ada member dengan id tersebut atau tidak */
                $dm = $this->db->where('id_toko',$this->userdata->id_toko)->where('id_member',$id_member)->get('member');
                // PANEL BARANG //
                if($dm->num_rows() != 0){
                    /* jika pengaturan opsi menggunakan harga 3 */
                    $opsi_diskon = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko);
                    if($opsi_diskon->opsi == 0){
                        $harga = $key->harga_3;
                        $hm = ' (3)';
                    }
                }
            }

            $diskon_produk = $harga*($key->diskon_produk/100);
            $diskon1 = $harga*($key->diskon/100);
            $diskon2 = $harga*($key->diskon2/100);
            $diskon3 = $harga*($key->diskon3/100);
            $diskon = ($diskon1*$key->jumlah) + ($diskon2*$key->jumlah) + ($diskon3*$key->jumlah) + ($diskon_produk*$key->jumlah);
            $sub_total = ($harga*$key->jumlah)-$diskon;
            //$row_barang = $this->Produk_retail_model->get_by_id($key->id_produk_2);

            $data_stok = 0;
            if($this->userdata->id_modul == '1' || $this->userdata->id_modul == '2') { // FREE / BASIC //
                $res_pembelian = $this->Pembelian_retail_model->get_by_id_produk($key->id_produk_2, $this->userdata->id_toko);
                foreach ($res_pembelian as $key6) {
                    $data_stok += $key6->stok;
                }
            } else { // SELAIN BASIC //
                $res_pembelian = $this->Pembelian_retail_model->get_by_id_produk($key->id_produk_2, $this->userdata->id_toko);
                foreach ($res_pembelian as $key6) {
                    $tgl_expire = $key6->tgl_expire;
                    if(!empty($tgl_expire)){
                        $exexpire = explode("-", $tgl_expire);
                        $hr_exp  = $exexpire[0];
                        $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                        $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                        $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                        if($stgl_expire <= $tgl){
                            // stok kadaluarsa //
                        } else {
                            $data_stok += $key6->stok;
                        }
                    }
                }
            }
            $button = "";
            $panelBarang .= "
              <tr class='tr-touch-barang' data-id='".$key->id_orders_temp."' id='rowBarangT_".$key->id_orders_temp."'>
                <td>".$key->nama_produk."</td>
                <td align='right'>".$key->jumlah."</td>
                <td>
                    <span style='float:right;'>".number_format($harga,0,',','.').$hm."</span><br>";
            if ($key->diskon_produk > 0) {
                $t_diskon_produk = $diskon_produk*$key->jumlah;
                $panelBarang .= "<span style='float:right;'>Diskon produk (".$key->diskon_produk."%) ".number_format($diskon_produk,0,',','.')." X ".$key->jumlah." = ".number_format($t_diskon_produk,0,',','.')."</span>";
                //$diskon_p = true;
            } else if ($key->diskon > 0) {
                $t_diskon1 = $diskon1*$key->jumlah;
                $panelBarang .= "<span style='float:right;'>Diskon 1 (".$key->diskon."%) ".number_format($diskon1,0,',','.')." X ".$key->jumlah." = ".number_format($t_diskon1,0,',','.')."</span>";
            }
            if ($key->diskon2 > 0) {
                $t_diskon2 = $diskon2*$key->jumlah;
                $panelBarang .= "<br><span style='float:right;'>Diskon 2 (".$key->diskon2."%) ".number_format($diskon2,0,',','.')." X ".$key->jumlah." = ".number_format($t_diskon2,0,',','.')."</span>";
            }
            if ($key->diskon3 > 0) {
                $t_diskon3 = $diskon3*$key->jumlah;
                $panelBarang .= "<br><span style='float:right;'>Diskon 3 (".$key->diskon3."%) ".number_format($diskon3,0,',','.')." X ".$key->jumlah." = ".number_format($t_diskon3,0,',','.')."</span>";
            }
            $panelBarang .= "</td>
                <td><span style='float:right;'>".number_format($sub_total,0,',','.')."</span></td>
              </tr>
            ";
            $total += $sub_total;
            $subt = $sub_total;
            $data[$key->id_orders_temp] = array(
                'nama_produk' => $key->nama_produk,
                'jumlah' => $key->jumlah,
                'harga' => $harga,
                'potongan' => $key->potongan*1,
                'potongan_persen' => $key->diskon*1,
                'potongan_persen2' => $key->diskon2*1,
                'potongan_persen3' => $key->diskon3*1,
                'total' => $subt
            );
            $i++;
        }
        if($od == 1) {
        $id_member = $this->input->post('id_member');
        /* validasi apakah ada member dengan id tersebut atau tidak */
        $dm = $this->db->where('id_toko',$this->userdata->id_toko)->where('id_member',$id_member)->get('member');
        if($dm->num_rows() != 0){
        // PANEL BARANG //
        $p_diskon = $dm->row();
        $diskon_m = $total * $p_diskon->diskon/100;
        $panelBarang .= "
              <tr>
                <td colspan='3' style='text-align:right'>Diskon Member</td>
                <td style='text-align:right' id='sale'>
                ";
        $panelBarang .= '<span>'.$p_diskon->diskon.' % ( '.number_format($diskon_m,0,',','.').' ) </span> 
                         <input type="hidden" value="'.$diskon_m.'" id="d_m">
                </td>
              </tr>';
        }
        }
        $panelBarang .= "
            </tbody>
          </table>
        ";
        // PANEL BARANG //
        // JIKA MENGGUNAKAN DISKON MEMBER
        $id_member = $this->input->post('id_member');
        $dm = $this->db->where('id_toko',$this->userdata->id_toko)->where('id_member',$id_member)->get('member');
        if($dm->num_rows() != 0){
            $status = 'ada';
            /* jika pengaturan opsi menggunakan diskon member */
            $od_r = $dm->row();
            $opsi_diskon = $this->M_opsi->get_opsi_diskon($this->userdata->id_toko);
            if($opsi_diskon->opsi == 1){
                $total = $total - $diskon_m;
            }
        }
        // END 
        // HASIL //
        $data = array(
            'panelBarang' => $panelBarang,
            'panelTotal' => number_format($total,0,',','.'),
            'data' => $data,
            'id_member' => $this->input->post('id_member'), 
        );
        // HASIL //

        echo json_encode($data);

    }

    public function get_stok($data_id_produk, $id_toko)
    {
        $this->load->model('Mutasi_stok_model');
		$this->db->select('pr.*, sat.satuan AS satuan_produk, '.$this->Mutasi_stok_model->select_stok_mutasi());
		$this->db->from('produk_retail pr');
		$this->db->join('users u', 'pr.id_users=u.id_users AND pr.id_toko=u.id_toko');
		$this->db->join('pembelian p', 'pr.id_produk_2=p.id_produk AND p.id_users=u.id_users AND pr.id_toko=p.id_toko', 'left');
		$this->db->join('satuan_produk sat', 'pr.satuan=sat.id_satuan AND sat.id_users=u.id_users AND sat.id_toko=pr.id_toko', 'left');
		$this->Mutasi_stok_model->query_stok_mutasi($this->db, $id_toko, null, 'pr.id_produk_2');
		$this->db->where('pr.id_toko', $id_toko);
		$this->db->where('pr.id_produk_2', $data_id_produk);
		$this->db->group_by('pr.id_produk_2');
		return $this->db->get()->result();
    }

    public function insert_barang_temp($tgl='')
    {
        // status opsi stok 
        $status_stok = $this->M_opsi->get_opsi_stok($this->userdata->id_toko)->opsi;

        $barcode = $this->input->post('barcode');
        $barang = $this->input->post('barang');

        $response = "0";
        $stok = 0;
        $data_id_produk = "";
        $data_barang = "";
        $harga_jual = 0;

        $row_barcode = $this->Produk_retail_model->get_by_barcode($barcode, $this->userdata->id_toko);
        if($row_barcode){
            // jika autcomplete barcode //
            $response = "1";
            $data_id_produk = $row_barcode->id_produk_2;
            $data_barcode = $row_barcode->barcode;
            $data_barang = $row_barcode->nama_produk;
            //$stok = $row_barcode->stok;
            $harga_jual = $row_barcode->harga_jual;

        } else {
            $row_barang = $this->Produk_retail_model->get_by_nama_barang($barang, $this->userdata->id_toko);
            if($row_barang){
                // jika nama barang //
                $response = "1";
                $data_id_produk = $row_barang->id_produk_2;
                $data_barcode = $row_barang->barcode;
                $data_barang = $row_barang->nama_produk;
                //$stok = $row_barang->stok;
                $harga_jual = $row_barang->harga_jual;

            } else {
                // jika nama barang adalah barcode //
                $row_barcode = $this->Produk_retail_model->get_by_barcode($barang, $this->userdata->id_toko);
                if($row_barcode){
                    // jika barcode //
                    $response = "1";
                    $data_id_produk = $row_barcode->id_produk_2;
                    $data_barcode = $row_barcode->barcode;
                    $data_barang = $row_barcode->nama_produk;
                    //$stok = $row_barcode->stok;
                    $harga_jual = $row_barcode->harga_jual;
                }
            }
        }

        $data_stok = 0;
        if($this->userdata->id_modul == '1' || $this->userdata->id_modul == '2') { // FREE / BASIC //
            $res_pembelian = $this->get_stok($data_id_produk, $this->userdata->id_toko);
            foreach ($res_pembelian as $key) {
                $data_stok += $key->stok;
            }
        } else { // SELAIN FREE //
            $res_pembelian = $this->get_stok($data_id_produk, $this->userdata->id_toko);
            foreach ($res_pembelian as $key) {
                // $tgl_expire = $key->tgl_expire;
                // $exexpire = explode("-", $tgl_expire);
                // $hr_exp = $exexpire[0];
                // $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                // $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                // $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                // if($stgl_expire <= date('Y-m-d')){
                //     // stok kadaluarsa //
                // } else {
                    $data_stok += $key->stok;
                // }
            }
        }
        if($this->status == 1){
            $data_stok = 1000000000000;
        }
        if($this->status == 0){
            if($data_stok == 0){
                $response = '2';
            }
        }
        if(empty($data_id_produk)){
            $response = '0';
        }


        if($response=="1"){
            // jika ada barang //
            // cek barang temp //
            $row_cek = $this->Orders_temp_retail_model->cek_barang($data_id_produk, $this->userdata->id_toko, $this->userdata->id_users);
            
            if($row_cek){
                // update barang temp //
                $jumlah_baru = $row_cek->jumlah+1;
                if($this->status == 0){
                    $sisa_stok = $data_stok - $jumlah_baru;
                    if($sisa_stok < 0){
                        // jika stok telah habis //
                        $response = "2";

                    } else {
                        // stok masih ada //
                        $data = array(
                            'jumlah' => $jumlah_baru,
                        );
                        $this->Orders_temp_retail_model->update($row_cek->id_orders_temp, $data);
                    }
                }else{
                    $response = "1";
                    $data = array(
                        'jumlah' => $jumlah_baru,
                    );
                    $this->Orders_temp_retail_model->update($row_cek->id_orders_temp, $data);
                }
            } else {
                if($this->status == 0){
                    // insert barang temp //
                    if($data_stok < 0){
                        // jika stok telah habis //
                        $response = "2";

                    } else {
                        // stok masih ada //
                        $data = array(
                            'id_toko' => $this->userdata->id_toko,
                            'pil_harga' => '1',
                            'id_users' => $this->userdata->id_users,
                            'id_produk' => $data_id_produk,
                            'jumlah' => '1',
                            'harga_jual' => $harga_jual,
                        );
                        $this->Orders_temp_retail_model->insert($data);

                    }
                }else{
                     // stok masih ada //
                    $data = array(
                        'id_toko' => $this->userdata->id_toko,
                        'pil_harga' => '1',
                        'id_users' => $this->userdata->id_users,
                        'id_produk' => $data_id_produk,
                        'jumlah' => '1',
                        'harga_jual' => $harga_jual,
                    );
                    $this->Orders_temp_retail_model->insert($data);
                }
            }
            
        }

        /*
        Response : 
        #0 = untuk tidak ada barang
        #1 = tersedia
        #2 = stok habis
        #3 = barang kadaluarsa
        */
        $rdata = array(
            'response' => $response,
            'data_barang' => $data_barang,
        );
        echo json_encode($rdata);
    }
    
    public function insert_barang_temp_by_id($tgl='')
    {

        $barcode = $this->input->post('barcode', true);
        $barang = $this->input->post('barang', true);
        $id_pil_harga = ($this->input->post('id_pil_harga', true))?$this->input->post('id_pil_harga', true):1;

        $response = "0";
        $stok = 0;
        $data_id_produk = "";
        $data_barang = "";
        $data_diskon_produk = 0;
        $data_harga_produk = 0;
        $harga_jual = 0;

        $row_barcode = $this->Produk_retail_model->get_by_barcode($barcode, $this->userdata->id_toko);
        if($row_barcode){
            // jika autcomplete barcode //
            $response = "1";
            $data_id_produk = $row_barcode->id_produk_2;
            $data_barcode = $row_barcode->barcode;
            $data_barang = $row_barcode->nama_produk;
            $data_harga_produk = $row_barcode->harga_1;
            if ($id_pil_harga=="1") {
              $data_harga_produk = $row_barcode->harga_1;
            } else if ($id_pil_harga=="2") {
              $data_harga_produk = $row_barcode->harga_2;
            } else if ($id_pil_harga=="3") {
              $data_harga_produk = $row_barcode->harga_3;
            } else if ($id_pil_harga=="4") {
              $data_harga_produk = $row_barcode->harga_4;
            } else if ($id_pil_harga=="5") {
              $data_harga_produk = $row_barcode->harga_5;
            } else if ($id_pil_harga=="6") {
              $data_harga_produk = $row_barcode->harga_6;
            } else if ($id_pil_harga=="7") {
              $data_harga_produk = $row_barcode->harga_7;
            }
            //$stok = $row_barcode->stok;
            // $harga_jual = $row_barcode->harga_jual;

        } else {
            $row_barang = $this->Produk_retail_model->get_by_id_produk($barang, $this->userdata->id_toko);
            if($row_barang){
                // jika nama barang //
                $response = "1";
                $data_id_produk = $row_barang->id_produk_2;
                $data_barcode = $row_barang->barcode;
                $data_barang = $row_barang->nama_produk;
                $data_diskon_produk = $row_barang->diskon;
                //$stok = $row_barang->stok;
                $data_harga_produk = $row_barang->harga_1;
                // $harga_jual = $row_barang->harga_jual;
                if ($id_pil_harga=="1") {
                  $data_harga_produk = $row_barang->harga_1;
                } else if ($id_pil_harga=="2") {
                  $data_harga_produk = $row_barang->harga_2;
                } else if ($id_pil_harga=="3") {
                  $data_harga_produk = $row_barang->harga_3;
                } else if ($id_pil_harga=="4") {
                  $data_harga_produk = $row_barang->harga_4;
                } else if ($id_pil_harga=="5") {
                  $data_harga_produk = $row_barang->harga_5;
                } else if ($id_pil_harga=="6") {
                  $data_harga_produk = $row_barang->harga_6;
                } else if ($id_pil_harga=="7") {
                  $data_harga_produk = $row_barang->harga_7;
                }

            } else {
                // jika nama barang adalah barcode //
                $row_barcode = $this->Produk_retail_model->get_by_barcode($barang, $this->userdata->id_toko);
                if($row_barcode){
                    // jika barcode //
                    $response = "1";
                    $data_id_produk = $row_barcode->id_produk_2;
                    $data_barcode = $row_barcode->barcode;
                    $data_barang = $row_barcode->nama_produk;
                    $data_harga_produk = $row_barcode->harga_1;
                    //$stok = $row_barcode->stok;
                    // $harga_jual = $row_barcode->harga_jual;
                    if ($id_pil_harga=="1") {
                      $data_harga_produk = $row_barcode->harga_1;
                    } else if ($id_pil_harga=="2") {
                      $data_harga_produk = $row_barcode->harga_2;
                    } else if ($id_pil_harga=="3") {
                      $data_harga_produk = $row_barcode->harga_3;
                    } else if ($id_pil_harga=="4") {
                      $data_harga_produk = $row_barcode->harga_4;
                    } else if ($id_pil_harga=="5") {
                      $data_harga_produk = $row_barcode->harga_5;
                    } else if ($id_pil_harga=="6") {
                      $data_harga_produk = $row_barcode->harga_6;
                    } else if ($id_pil_harga=="7") {
                      $data_harga_produk = $row_barcode->harga_7;
                    }
                }
            }
        }

        $data_stok = 0;
        if($this->userdata->id_modul == '1' || $this->userdata->id_modul == '2') { // FREE / BASIC //
            $res_pembelian = $this->get_stok($data_id_produk, $this->userdata->id_toko);
            foreach ($res_pembelian as $key) {
                $data_stok += $key->stok;
            }
        } else { // SELAIN FREE //
            $res_pembelian = $this->get_stok($data_id_produk, $this->userdata->id_toko);
            foreach ($res_pembelian as $key) {
                // if (!empty($key->tgl_expire)) {
                //     $tgl_expire = $key->tgl_expire;
                //     $exexpire = explode("-", $tgl_expire);
                //     $hr_exp = $exexpire[0];
                //     $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                //     $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                //     $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                //     if($stgl_expire <= date('Y-m-d')){
                //         // stok kadaluarsa //
                //     } else {
                //         $data_stok += $key->stok;
                //     }
                // } else {
                    $data_stok += $key->stok;
                // }
            }
        }
        if($this->status == 1){
            $data_stok = 1000000000000;
        }
        if($this->status == 0){
            if($data_stok == 0){
                $response = '2';
            }
        }
        else {
            $response = '1';
        }

        if(empty($data_id_produk)){
            $response = '0';
        }


        if($response=="1"){
            // jika ada barang //
            // cek barang temp //
            $row_cek = $this->Orders_temp_retail_model->cek_barang($data_id_produk, $this->userdata->id_toko, $this->userdata->id_users);
            
            if($row_cek){
                // update barang temp //
                $jumlah_baru = $row_cek->jumlah+1;
                if($this->status == 0){
                    $sisa_stok = $data_stok - $jumlah_baru;
                    if($sisa_stok < 0){
                        // jika stok telah habis //
                        $response = "2";

                    } else {
                        // stok masih ada //
                        $data = array(
                            'jumlah' => $jumlah_baru,
                        );
                        $this->Orders_temp_retail_model->update($row_cek->id_orders_temp, $data);
                    }
                }else{
                    // stok masih ada //
                    $data = array(
                        'jumlah' => $jumlah_baru,
                    );
                    $this->Orders_temp_retail_model->update($row_cek->id_orders_temp, $data);
                }
            } else {
                if($this->status == 0){
                    // insert barang temp //
                    if($data_stok < 0){
                        // jika stok telah habis //
                        $response = "2";

                    } else {
                        // stok masih ada //
                        $data = array(
                            'id_toko' => $this->userdata->id_toko,
                            'id_users' => $this->userdata->id_users,
                            'id_produk' => $data_id_produk,
                            'pil_harga' => $id_pil_harga,
                            'jumlah' => '1',
                            'diskon' => $data_diskon_produk,
                            'potongan' => $data_harga_produk * $data_diskon_produk / 100,
                            'harga_jual' => $data_harga_produk,
                        );
                        $this->Orders_temp_retail_model->insert($data);

                    }
                }else{
                        // stok masih ada //
                        $data = array(
                            'id_toko' => $this->userdata->id_toko,
                            'id_users' => $this->userdata->id_users,
                            'id_produk' => $data_id_produk,
                            'pil_harga' => $id_pil_harga,
                            'jumlah' => '1',
                            'diskon' => $data_diskon_produk,
                            'potongan' => $data_harga_produk * $data_diskon_produk / 100,
                            'harga_jual' => $data_harga_produk,
                        );
                        $this->Orders_temp_retail_model->insert($data);
                }
            }
            
        }

        /*
        Response : 
        #0 = untuk tidak ada barang
        #1 = tersedia
        #2 = stok habis
        #3 = barang kadaluarsa
        */
        $rdata = array(
            'response' => $response,
            'data_barang' => $data_barang,
        );
        echo json_encode($rdata);
    }

    public function get_o_temp($id_orders_temp)
    {
        $this->db->select('ot.*, pr.harga_1, pr.harga_2, pr.harga_3, pr.harga_4, pr.harga_5, pr.harga_6');
        $this->db->from('orders_temp ot');
        $this->db->join('produk_retail pr', 'ot.id_produk=pr.id_produk_2 AND ot.id_toko=pr.id_toko');
        $this->db->where('ot.id_orders_temp', $id_orders_temp);
        return $this->db->get()->row();
    }

    public function update_temp()
    {
        header('Content-Type: application/json');
        $data_update = array();
        $field = $this->input->post('field', true);
        $id_orders_temp = $this->input->post('id_orders_temp', true);
        $value = $this->input->post('value', true);
        $row_ot = $this->get_o_temp($id_orders_temp);
        if ($row_ot) {
            $data_update = array();
            $data_update[$field] = $value*1;
            $this->db->where('id_orders_temp', $id_orders_temp);
            $this->db->update('orders_temp', $data_update);
            if ($field=="diskon" || $field=="diskon2" || $field=="diskon3") {
                $row_ot = $this->get_o_temp($id_orders_temp);
                $hb_disk = $row_ot->harga_jual * ((100-$row_ot->diskon)/100) * ((100-$row_ot->diskon2)/100) * ((100-$row_ot->diskon3)/100) * $row_ot->jumlah;
                $hb = $row_ot->harga_jual * $row_ot->jumlah;
                $potongan = $hb - $hb_disk;
                $data_update = array(
                    'potongan' => $potongan,
                );
                $this->db->where('id_orders_temp', $id_orders_temp);
                $this->db->update("orders_temp", $data_update);
            }
            if ($field=="pil_harga") {
                $harga_jual = 0;
                if ($value=="1") {
                    $harga_jual = $row_ot->harga_1;
                } else if ($value=="2") {
                    $harga_jual = $row_ot->harga_2;
                } else if ($value=="3") {
                    $harga_jual = $row_ot->harga_3;
                } else if ($value=="4") {
                    $harga_jual = $row_ot->harga_4;
                } else if ($value=="5") {
                    $harga_jual = $row_ot->harga_5;
                } else if ($value=="6") {
                    $harga_jual = $row_ot->harga_6;
                }
                $data_update = array(
                    'harga_jual' => $harga_jual,
                );
                $this->db->where('id_orders_temp', $id_orders_temp);
                $this->db->update("orders_temp", $data_update);
            }
        }
        echo json_encode($data_update);
    }

    public function update_barang_temp()
    {
        $array = array();
        $data_stok = 0;
        for ($i=0; $i < count($this->input->post('id_orders_temp')); $i++) {
            $id_orders_temp = $this->input->post('id_orders_temp')[$i];
            $id = $this->input->post('id_produk')[$i];
            $jumlah = $this->input->post('jumlah')[$i];
            $row_barcode = $this->Produk_retail_model->get_by_id_produk($id, $this->userdata->id_toko);
            $response = "0";
            if($row_barcode){

                if($this->userdata->id_modul == '1' || $this->userdata->id_modul == '2') { // FREE / BASIC //
                    $res_pembelian = $this->get_stok($row_barcode->id_produk_2, $this->userdata->id_toko);
                    foreach ($res_pembelian as $key) {
                        $data_stok += $key->stok;
                    }
                    //$data_stok = $row_barcode->stok;
                } else { // SELAIN BASIC //
                    $res_pembelian = $this->get_stok($row_barcode->id_produk_2, $this->userdata->id_toko);
                    foreach ($res_pembelian as $key) {
                        // $tgl_expire = $key->tgl_expire;
                        // if(!empty($tgl_expire)){
                        //     $exexpire = explode("-", $tgl_expire);
                        //     $hr_exp = $exexpire[0];
                        //     $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                        //     $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                        //     $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                        //     if($stgl_expire <= date('Y-m-d')){
                        //         // stok kadaluarsa //
                        //     } else {
                                $data_stok += $key->stok;
                        //     }
                        // }
                    }
                }
                if($this->status == 0){
                    $sisa_stok = $data_stok-$jumlah;
                    if($sisa_stok < 0){
                        // jika stok telah habis //
                        $response = "2";
                    } else {
                        // stok masih ada //
                        $response = "1";
                        $data = array(
                            'jumlah' => $jumlah,
                        );
                        $this->Orders_temp_retail_model->update($id_orders_temp, $data);
                    }
                }else{
                        // stok masih ada //
                        $response = "1";
                        $data = array(
                            'jumlah' => $jumlah,
                        );
                        $this->Orders_temp_retail_model->update($id_orders_temp, $data);
                }
            }
            $array[$i]['nama_produk'] = $row_barcode->nama_produk;
            $array[$i]['response'] = $response;
        }
        echo json_encode($array);
    }

    public function update_orders_temp($id)
    {
        $jumlah = $this->input->post('k', true);
        $pot_persen = $this->input->post('pot_persen', true);
        $pot_persen2 = $this->input->post('pot_persen2', true);
        $pot_persen3 = $this->input->post('pot_persen3', true);
        $pot = $this->input->post('pot', true);
        $array = array();
        $data_stok = 0;
        $response = "0";
        $row_temp = $this->db->select('*')
                             ->from('orders_temp')
                             ->where('id_toko', $this->userdata->id_toko)
                             ->where('id_orders_temp', $id)
                             ->get()->row();
        if ($row_temp) {
            $id_produk = $row_temp->id_produk;
            $row_barcode = $this->Produk_retail_model->get_by_id_produk($id_produk, $this->userdata->id_toko);
            if($row_barcode){
                if ($this->userdata->id_modul == '1' || $this->userdata->id_modul == '2') { // FREE / BASIC //
                    $res_pembelian = $this->get_stok($row_barcode->id_produk_2, $this->userdata->id_toko);
                    foreach ($res_pembelian as $key) {
                        $data_stok += $key->stok;
                    }
                    // $res_pembelian = $this->Pembelian_retail_model->get_by_id_produk($row_barcode->id_produk_2, $this->userdata->id_toko);
                    // foreach ($res_pembelian as $key) {
                    //     $data_stok += $key->stok;
                    // }
                    //$data_stok = $row_barcode->stok;
                } else { // SELAIN BASIC //
                    $res_pembelian = $this->get_stok($row_barcode->id_produk_2, $this->userdata->id_toko);
                    foreach ($res_pembelian as $key) {
                        $data_stok += $key->stok;
                    }
                    // $res_pembelian = $this->Pembelian_retail_model->get_by_id_produk($row_barcode->id_produk_2, $this->userdata->id_toko);
                    // foreach ($res_pembelian as $key) {
                    //     /*
                    //     $tgl_expire = $key->tgl_expire;
                    //     $exexpire = explode("-", $tgl_expire);
                    //     $hr_exp = $exexpire[0];
                    //     $bln_exp = !empty($exexpire[1]) ? $exexpire[1] : '';
                    //     $thn_exp = !empty($exexpire[2]) ? $exexpire[2] : '';
                    //     $stgl_expire = $thn_exp."-".$bln_exp."-".$hr_exp;
                    //     if($stgl_expire <= date('Y-m-d')){
                    //         // stok kadaluarsa //
                    //     } else {
                    //         $data_stok += $key->stok;
                    //     }*/
                    //     $data_stok += $key->stok;
                    // }
                }
                $sisa_stok = $data_stok-$jumlah;
                if($this->status == 0){
                    if($sisa_stok < 0){
                        // jika stok telah habis //
                        $response = "2";
                    } else {
                        // stok masih ada //
                        $response = "1";
                        $data = array(
                            'jumlah' => $jumlah*1,
                            'diskon' => $pot_persen*1,
                            'diskon2' => $pot_persen2*1,
                            'diskon3' => $pot_persen3*1,
                            'potongan' => $pot*1,
                        );
                        $this->Orders_temp_retail_model->update($id, $data);
                    }
                }else{
                        // stok masih ada //
                        $response = "1";
                        $data = array(
                            'jumlah' => $jumlah*1,
                            'diskon' => $pot_persen*1,
                            'diskon2' => $pot_persen2*1,
                            'diskon3' => $pot_persen3*1,
                            'potongan' => $pot*1,
                        );
                        $this->Orders_temp_retail_model->update($id, $data);
                }
            }
            $array[0]['nama_produk'] = $row_barcode->nama_produk;
        }
        $array[0]['response'] = $response;
        echo json_encode($array);
    }

    public function delete_orders_temp($id)
    {
        $row_orders_temp = $this->db->select('*')
                                    ->from('orders_temp')
                                    ->where('id_toko', $this->userdata->id_toko)
                                    ->where('id_orders_temp', $id)
                                    ->get()->row();
        if (!empty($row_orders_temp->id_orders_sales)) {
            $data_update = array(
                'selesai' => 0,
                'acc_admin' => 0,
            );
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_orders_temp', $row_orders_temp->id_orders_sales);
            $this->db->update('orders_sales_temp', $data_update);
        }
        $this->Orders_temp_retail_model->delete($id);
    }

    public function delete_orders_temp_oto()
    {
        $row = $this->Orders_temp_retail_model->get_by_top();
        $id = $row->id_orders_temp;
        $row_orders_temp = $this->db->select('*')
                                    ->from('orders_temp')
                                    ->where('id_toko', $this->userdata->id_toko)
                                    ->where('id_orders_temp', $id)
                                    ->get()->row();
        if (!empty($row_orders_temp->id_orders_sales)) {
            $data_update = array(
                'selesai' => 0,
                'acc_admin' => 0,
            );
            $this->db->where('id_toko', $this->userdata->id_toko);
            $this->db->where('id_orders_temp', $row_orders_temp->id_orders_sales);
            $this->db->update('orders_sales_temp', $data_update);
        }
        $this->Orders_temp_retail_model->delete($row->id_orders_temp);
    }

    public function json_member()
    {
        header('Content-Type: application/json');
        $term = $this->input->post('term');
        $res = $this->Member_retail_model->get_search_by_id_toko($this->userdata->id_toko, $term, 10);
        $data = array();
        $i = 0;
        foreach ($res as $key) {
            $data[$i]['value'] = $key->id_member;
            $data[$i]['label'] = $key->nama;
            $data[$i]['alamat'] = substr($key->alamat, 0, 25);
            $data[$i]['id_sales'] = $key->id_sales;
            $data[$i]['nama_sales'] = $key->first_name." ".$key->last_name; 
            $data[$i]['no_hp'] = $key->telp;    
            $i++;
        }
        echo json_encode($data);
    }

    public function json_produk($type = '')
    {
        header('Content-Type: application/json');
        $term = $this->input->post('term');
        $tgl = $this->input->post('tgl');
        $limit = 15;
        $res = $this->Produk_retail_model->get_by_search($this->userdata->id_toko, $term, $tgl, $limit, $type);
        $data = array();
        $i = 0;
        foreach ($res as $key) {
            $data[$i]['value'] = $key->barcode;
            $data[$i]['label'] = $key->nama_produk;
            $data[$i]['type'] = $type;
            $i++;
        }
        echo json_encode($data);
    }

    public function json_produk2()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $term = $this->input->post('term');
        $tgl = $this->input->post('tgl');
        $res = $this->db->select('*')
                        ->from('produk_retail')
                        ->like('barcode', $term, 'BOTH')
                        ->or_like('nama_produk', $term, 'BOTH')
                        ->limit('100')
                        ->get()->result();
        $data = array();
        $i = 0;
        foreach ($res as $key) {
            $data[$i]['value'] = $key->barcode;
            $data[$i]['label'] = $key->nama_produk;
            $i++;
        }
        echo json_encode($data);
    }
    public function data_kategori() {
        $start = $this->input->post('start');
        $limit = 12;
        $result = $this->Produk_retail_model->get_data_kat($start,$limit,$this->userdata);
        if(empty($start)){$start = 0;}
        $prev = $start-$limit;
        if($start-$limit < 0){$prev = 0;}
        $next = $start+$limit;
        if($next - $result['total'] > 0){$next = $start;}
        echo '<div class="row" style="text-align:center;margin:0px;">
                  <button class="btn btn-xs btn-round btn-kat btn-nav bdc-grey btn-blue-dark pull-left" data-np="'.$prev.'" id="prev">
                    <i class="fa fa-chevron-left"></i>
                  </button>
                  <span style="font-weight:bold">KATEGORI</span>
                  <button class="btn btn-xs btn-round btn-kat btn-nav bdc-grey btn-blue-dark pull-right" data-np="'.$next.'" id="next">
                    <i class="fa fa-chevron-right"></i>
                  </button>
              </div>
            <ul class="list-product" id="lkatP_touch">';
        foreach ($result['kategori'] as $data) {
            $start = 0;
            echo '<li class="item" id="item_touch_kategori" data-start="'.$start.'" data-id-kategori-2="'.$data->id_kategori_2.'">'.$data->nama_kategori.'</li>';
        }
        echo '</ul>';
    }
    public function data_produk_by_kat() {
        $op = $this->M_opsi->get_opsi_tProduk($this->userdata->id_toko);
        $id_kat = $this->input->post('id_kat');
        $start = $this->input->post('start');
        $limit = 16;
        $result = $this->Produk_retail_model->get_data_prod($start,$limit,$id_kat,$this->userdata->id_toko);
        if(empty($start)){$start = 0;}
        $prev = $start-$limit;
        if($start-$limit < 0){$prev = 0;}
        $next = $start+$limit;
        if($next - $result['total'] > 0){$next = $start;}
        if(!empty($result['produk'][0]->nama_kategori)){$nm_kat = $result['produk'][0]->nama_kategori;}else{$nm_kat = '';}
         echo '<div class="row" style="text-align:center;margin:0px">
                  <button class="btn btn-xs btn-round btn-nav bdc-grey btn-blue-dark pull-left" data-np="'.$prev.'" data-id-kat="'.$id_kat.'" id="prevp">
                    <i class="fa fa-chevron-left" style="position: absolute;top: 10px;left: 20px;"></i>
                  </button>
                  <span><b id="nama_kategori">'.$nm_kat.'</b></span>
                  <button class="btn btn-xs btn-round btn-nav bdc-grey btn-blue-dark pull-right" data-np="'.$next.'" data-id-kat="'.$id_kat.'" id="nextp">
                    <i class="fa fa-chevron-right" style="position: absolute;top: 10px;left: 20px;"></i>
                  </button>
                </div>
                <div class="row mobile-scroll">';
            if($op->opsi == 0){
                echo '<ul class="ace-thumbnails clearfix" style="padding: 10px;">';
                    foreach ($result['produk'] as $data) {
                    $gambar = 'default.gif';
                    if(!empty($data->gambar)){
                        $gambar = $data->gambar;
                    }
                    echo '<li id="item_touch_produk" data-barcode="'.$data->barcode.'" data-id-produk-2="'.$data->id_produk_2.'">
                            <a href="#" title="Photo Title" data-rel="colorbox" data-target=".bs-example-modal-sm" >
                                <img alt="150x150" src="'.site_url('assets/gambar_produk/'.$gambar).'" class="img-responsive img-list" />
                            </a>
                            <div class="tags">';
                          echo '<span class="label-holder">
                                    <span class="label label-primary">'.$data->nama_produk.'</span>
                                </span>';
                                /*
                                <span class="label-holder">
                                    <span class="label label-warning arrowed-in">Rp.'.number_format($data->harga_1,0,',','.').'</span>
                                </span>
                                */
                        echo '</div>
                        </li>';
                    }
                echo '</ul>';
            }else{
            echo '<ul class="list-product">';
                  foreach ($result['produk'] as $data) {
              echo '<span class="col-xs-6 lp">
                      <li class="item blue-product" style="height:53.5px;font-size:12px;overflow:hidden" id="item_touch_produk" data-barcode="'.$data->barcode.'" data-id-produk-2="'.$data->id_produk_2.'">'.$data->nama_produk.'</li>
                    </span>'; 
                    }       
            echo '</ul>';
            }
            echo '</div>';
    }
    function datamember(){
        $data = $this->db->where('id_toko',$this->userdata->id_toko)->get('member')->result();
        echo '<select id="pembeli" class="form-control pembeli" style="width:98%">';
        echo '<option value="">Pilih Member</option>';
        foreach ($data as $member) {
            echo '<option value='.$member->id_member.'>'.$member->nama.'</option>';
        }
        echo '</select>
        ';
    }
    function getMemberById(){
        $id = $this->input->post('id');
        echo json_encode($this->db->where('id_member', $id)->where('id_toko',$this->userdata->id_toko)->get('member')->row());
    }
    function addMekanikTemp(){
        $iot    = $this->input->post('id_orders_temp');//id_orders_temporary
        $id_kar = $this->input->post('id_mekanik');//semua mekanik
        $plat   = $this->input->post('plat');
        foreach ($id_kar as $ik => $id) {
            $data = array('id_orders_temp'=>$iot,'id_mekanik'=>$id , 'id_toko'=>$this->userdata->id_toko , 'plat'=>$plat);
            $insert = $this->db->insert('detail_mekanik_temp', $data);
        }
        $ikm = $this->input->post('id_ket_mekanik');//ketua mekanik
        $data_orders = array('id_ket_mekanik'=>$ikm);
        $this->db->where('id_orders_temp',$iot);
        $this->db->where('id_toko', $this->userdata->id_toko);
        $update = $this->db->update('orders_temp', $data_orders);
        $response = '';
        if($insert&&$update){
            return $response = '1';
        }
        else {
            return $response = '3'; // data gagal insert
        }

    }
    function deleteMekanikTemp(){
        $this->db->where('id_toko', $this->userdata->id_toko);
        $this->db->where('id_orders_temp', $this->input->post('id_orders_temp'));
        $this->db->delete('detail_mekanik_temp');
    }

    function _printer()
    {
        $connector = $this->Printer_model->default_connector;
        $printer = $connector."(".$this->Printer_model->default_printer.")";
        return $printer;
    }

    public function orders_sales_group()
    {
        $data_orders_sales = $this->db->select('os.id, os.tgl, os.selesai, os.acc_admin, SUM(os.jumlah) AS jumlah, m.nama, u.first_name, u.last_name')
                                      ->from('orders_sales_temp os')
                                      ->join('member m', 'os.id_member=m.id_member AND m.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                      ->join('users u', 'os.id_users=u.id_users AND level=4 AND u.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                      ->where('os.id_toko', $this->userdata->id_toko)
                                      ->where('os.acc_sales', '1')
                                      ->where('os.selesai', '0')
                                      ->order_by('os.selesai', 'asc')
                                      ->order_by('os.acc_admin', 'asc')
                                      ->order_by('DATE(CONCAT(SUBSTRING(os.tgl,7,4),"-",SUBSTRING(os.tgl,4,2),"-",SUBSTRING(os.tgl,1,2))) ASC')
                                      ->order_by('os.id_orders_temp', 'asc')
                                      ->order_by('os.id', 'asc')
                                      ->group_by('CONCAT(os.tgl,os.id_toko,os.id_member)')
                                      ->limit(1000)
                                      ->get()->result();
        $data = array(
          'id_toko' => $this->userdata->id_toko,
          'nama_toko' => $this->userdata->nama_toko,
          'nama_user' => $this->userdata->email,
          'active_penjualan_sales' => 'active',
          'id_modul' => $this->userdata->id_modul,
          'nama_modul' => $this->userdata->nama_modul,
          'data_orders_sales' => $data_orders_sales,
        );
        $this->view('penjualan/orders_sales_group', $data);
    }

    public function orders_sales($id = '')
    {
        $active = array('active_penjualan_sales' => 'active');
        if (!empty($id)) {
          $row_orders_sales = $this->db->where('id', $id)->where('id_toko', $this->userdata->id_toko)->get('orders_sales_temp')->row();
          if ($row_orders_sales) {
            $data_orders_sales = $this->db->select('os.*, p.nama_produk, m.nama, u.first_name, u.last_name')
                                          ->from('orders_sales_temp os')
                                          ->join('member m', 'os.id_member=m.id_member AND m.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                          ->join('produk_retail p', 'os.id_produk=p.id_produk_2 AND p.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                          ->join('users u', 'os.id_users=u.id_users AND level=4 AND u.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                          ->where('os.id_toko', $this->userdata->id_toko)
                                          ->where('os.tgl', $row_orders_sales->tgl)
                                          ->where('os.id_member', $row_orders_sales->id_member)
                                          ->where('os.acc_sales', '1')
                                          ->where('os.selesai', '0')
                                          ->order_by('os.selesai', 'asc')
                                          ->order_by('os.id_orders_temp', 'asc')
                                          ->order_by('os.id', 'asc')
                                          ->group_by('os.id_orders_temp')
                                          ->limit(1000)
                                          ->get()->result();
          } else {
            redirect('admin/penjualan_retail/orders_sales_group', 'refresh');
          }
        } else {
          $data_orders_sales = $this->db->select('os.*, p.nama_produk, m.nama, u.first_name, u.last_name')
                                        ->from('orders_sales_temp os')
                                        ->join('member m', 'os.id_member=m.id_member AND m.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                        ->join('produk_retail p', 'os.id_produk=p.id_produk_2 AND p.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                        ->join('users u', 'os.id_users=u.id_users AND level=4 AND u.id_toko="'.$this->userdata->id_toko.'"', 'left')
                                        ->where('os.id_toko', $this->userdata->id_toko)
                                        ->where('os.acc_sales', '1')
                                        ->where('os.selesai', '0')
                                        ->order_by('os.selesai', 'asc')
                                        ->order_by('os.id_orders_temp', 'asc')
                                        ->order_by('os.id', 'asc')
                                        ->group_by('os.id_orders_temp')
                                        ->limit(1000)
                                        ->get()->result(); 
        }
        $data = array(
          'id_toko' => $this->userdata->id_toko,
          'nama_toko' => $this->userdata->nama_toko,
          'nama_user' => $this->userdata->email,
          'active_penjualan_sales' => 'active',
          'id_modul' => $this->userdata->id_modul,
          'nama_modul' => $this->userdata->nama_modul,
          'data_orders_sales' => $data_orders_sales,
        );
        $this->view('penjualan/orders_sales', $data);
    }

    public function orders_sales_action()
    {
        $btn = $this->input->post('hapus', true);
        if (!empty($btn) && $btn=="1") {         
            $orders_sales = $this->input->post('orders_sales', true);
            if (count($orders_sales) > 0) {
                $this->db->where('id_toko', $this->userdata->id_toko);
                $this->db->where('id_users', $this->userdata->id_users);
                $this->db->delete('orders_temp');
                foreach ($orders_sales as $key => $value) {
                    $row_orders_sales = $this->db->select('*')
                                                 ->from('orders_sales_temp')
                                                 ->where('id_toko', $this->userdata->id_toko)
                                                 ->where('acc_sales', '1')
                                                 ->where('acc_admin', '0')
                                                 ->where('selesai', '0')
                                                 ->where('id_orders_temp', $value)
                                                 ->get()->row();
                    if ($row_orders_sales) {
                        $this->db->where('id', $row_orders_sales->id);
                        $this->db->delete('orders_sales_temp');
                    }
                }
                //$this->client_send_ost();
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('admin/penjualan_retail/orders_sales'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('admin/penjualan_retail/orders_sales'));
            }
        } else {          
            $orders_sales = $this->input->post('orders_sales', true);
            if (count($orders_sales) > 0) {
                $this->db->where('id_toko', $this->userdata->id_toko);
                $this->db->where('id_users', $this->userdata->id_users);
                $this->db->delete('orders_temp');
                $id_member = 0;
                foreach ($orders_sales as $key => $value) {
                    $row_orders_sales = $this->db->select('*')
                                                 ->from('orders_sales_temp')
                                                 ->where('id_toko', $this->userdata->id_toko)
                                                 ->where('acc_sales', '1')
                                                 ->where('acc_admin', '0')
                                                 ->where('selesai', '0')
                                                 ->where('id_orders_temp', $value)
                                                 ->get()->row();
                    if ($row_orders_sales) {
                        $id_member = $row_orders_sales->id_member;
                        $data_insert = array(
                            'id_orders_sales' => $row_orders_sales->id_orders_temp,
                            'id_toko' => $this->userdata->id_toko,
                            'id_users' => $this->userdata->id_users,
                            'id_produk' => $row_orders_sales->id_produk,
                            'pil_harga' => '1',
                            'jumlah' => $row_orders_sales->jumlah,
                        );
                        $this->db->insert('orders_temp', $data_insert);
                        $data_update = array('acc_admin' => '1');
                        $this->db->where('id', $row_orders_sales->id);
                        $this->db->update('orders_sales_temp', $data_update);
                    }
                }
                //$this->client_send_ost();
                $this->session->set_flashdata('message', 'Insert Record Success');
                redirect(site_url('admin/penjualan_retail/create?id_member='.$id_member));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('admin/penjualan_retail/orders_sales'));
            }
        }
    }

}

/* End of file Penjualan_retail.php */
/* Location: ./application/controllers/Penjualan_retail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-08-02 09:05:26 */
/* http://harviacode.com */
